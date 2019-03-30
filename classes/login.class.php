<?php
require_once("user.class.php");
require_once("auth.class.php");

class Login
{
    private $auth;
    private $database;

    public function __construct()
    {
        $this->auth = new Auth(); // Import Auth class upon creation of new Login class
        $this->database = new Database(); // Import Database class upon creation of new Login class
    }
    /**
     * Attempts to login the user
     * 
     * @param string $_username The username
     * @param string $_password The password
     * 
     * @return bool
     */
    public function login($_username, $_password)
    {
        $user = $this->database->find($_username, $_password);
        if ($user) {
            $this->auth->login($user);
            return true;
        }
        return false;
    }
    /**
     * Destroys the Auth session
     * 
     * @return void
    */
    public function logout()
    {
        $this->auth->logout();
    }
}
