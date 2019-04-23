<?php
require_once("database.class.php");

class User
{
    public $database;
    public function __construct()
    {
        $this->database = new Database(); // Import database class upon creation of new User class
    }

    /**
     * Insert a new user into the database
     * 
     * @param string $_username The username of the new user
     * @param string $_password The password of the new user
     * 
     * @return mixed
     */

    public function add($_username, $_password)
    {
        return $this->database->add($_username, $_password);
    }

    /**
     * Returns all users in the database
     * 
     * @return array
     */

    public function all()
    {
        return $this->database->all();
    }

    /**
     * Updates a users password
     * 
     * @param int $_id The id of the user you want to update
     * @param int $_password The password the user to have
     * 
     * @return mixed
     */

    public function change_password($_id, $_password)
    {
        return $this->database->update($_id, 'password', $_password);
    }
    /**
     * Deletes a user from the database
     * 
     * @param int $_id The id of the user you want to delete
     * 
     * @return mixed
     */

    public function delete($_id)
    {
        return $this->database->delete($_id);
    }

    /**
     * Checks to see if a username exists in the database
     * 
     * @param string $_username The username you're trying to verify exists or not
     * 
     * @return bool
     */

    public function check($_username)
    {
        return $this->database->usernameCheck($_username);
    }
}
