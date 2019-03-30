<?php
class Auth
{
    /**
     * Populates auth session with user information from database
     * 
     * @param array $_user The associated array from the database pertaining to the user
     * 
     * @return void
     */
    public function login($_user = [])
    {
        $_SESSION['Auth']['user'] = $_user;
    }
    /**
     * Removes Auth session data logging out the user
     * 
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['Auth']);
    }
    /**
     * Retreives user data
     * 
     * @param string $_key (Optional) If set returns specific key value in user session
     * 
     * @return mixed
     */
    public function user($_key = null)
    {
        if (isset($_SESSION['Auth']['user'])) {
            if ($_key && array_key_exists($_key, $_SESSION['Auth']['user'])) {
                return $_SESSION['Auth']['user'][$_key];
            }

            return $_SESSION['Auth']['user'];
        }
        return false;
    }
}
