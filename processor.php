<?php
session_start();

require_once("classes/login.class.php");
require_once("classes/user.class.php");
require_once("classes/flash.class.php");
require_once("classes/auth.class.php");

$login = new Login();
$flash = new Flash();
$user = new User();
$auth = new Auth();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'login': // Logs in a user

            // Check if the required form fields are available
            if (!empty($_POST['username']) && !empty($_POST['password'])) {

                $username = $_POST['username'];
                $password = $_POST['password'];

                // Login
                $user = $login->login($username, $password);

                // Check of the login failed
                if (!$user) {
                    $flash->set("Username and/or password incorrect");
                    $flash->redirect('/?page=login');
                }

                // Redirect back to the main page
                $flash->redirect();
            }

            // Redirect back to the login page
            $flash->redirect('/?page=login');
            break;
        case 'register': // Adds a user to the database and logs them in upon success

            // Check if the required form fields are available
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

                // Move fields to easier to use variables
                $username = $_POST['username'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                // Check to see if the passwords match
                if ($password != $confirm_password) {
                    $flash->set("Passwords don't match...");
                    $flash->redirect('/?page=register');
                }

                // Check if username already exists
                if ($user->check($username)) {
                    $flash->set("Username is already in use");
                    $flash->redirect('/?page=register');
                } else {

                    // Insert new user into the database
                    $id = $user->add($username, $password);

                    if ($id) {

                        // Login the new user
                        $login->login($username, $password);

                        // Redirect new user to the home page
                        $flash->redirect();
                    } else {
                        $flash->set('Something went wrong while trying to register your username and password');
                        $flash->redirect('/?page=register');
                    }
                }
            }
            break;
        case 'reset_password': // Adds a user to the database and logs them in upon success

            // Check if the required form fields are available
            if (isset($_POST['id']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

                // Move fields to easier to use variables
                $id = $_POST['id'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                // Check to see if the passwords match
                if ($password != $confirm_password) {
                    $flash->set("Passwords don't match...");
                    $flash->redirect('/?page=change_password&user_id=' . $id);
                }
                $check = $user->database->read($id);

                // Check if username already exists
                if (!$check) {
                    $flash->set("User not found");
                    $flash->redirect('/?page=change_password&user_id=' . $id);
                } else {

                    // Update user in the database
                    if ($user->change_password($id, $password)) {
                        // Redirect to the home page
                        $flash->set(sprintf("%s's password has been changed", $check['username']), 'success');
                        $flash->redirect();
                    } else {
                        $flash->set('Something went wrong while trying to register your username and password');
                        $flash->redirect('/?page=change_password&user_id=' . $id);
                    }
                }
            }
            break;
        case 'delete': // Deletes a user

            // Check if user is logged in
            if ($auth->user()) {

                // Attepts to delete the user
                $check = $user->delete($_GET['id']);

                // Checks if the user was deleted successfully or not
                if (!$check) {
                    $flash->set('Unable to delete user');
                } else {
                    $flash->set('User deleted successfully', 'success');
                }

                // Redirects the user back to the management page
                $flash->redirect();
            } else {
                $flash->set('Access Denied. Please login...');
                $flash->redirect('/?page=login');
            }
            break;
        case 'logout': // Logs the user out then redirects them to the login page
            $login->logout();
            $flash->redirect('/?page=login');
            break;
    }
}
