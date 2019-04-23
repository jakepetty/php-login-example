<?php
define('__DB_FILE__', 'database.sqlite');
define('__SALT__', '121578360d6d944511c8c7e94406a92554994859');
class Database
{
    private $database;

    public function __construct()
    {

        // Check if database exists
        $new = !file_exists(__DB_FILE__);
        $this->database = new PDO('sqlite:database.sqlite', null, null, null);
        $this->database->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        // If $new is true then create required tables
        if ($new) {
            $this->install();
        }
    }

    public function add($_username, $_password)
    {
        $sql = "INSERT INTO `users` (`username`, `password`) VALUES(:username, :password);";

        $query = $this->database->prepare($sql);
        $query->bindValue(':username', $_username, 3);
        $query->bindValue(':password', sha1(__SALT__ . $_password), 3);
        $query->execute();

        return $this->lastInsertId();
    }

    public function read($_id)
    {
        
        $sql = "SELECT * FROM `users` WHERE `id` = :id";

        $query = $this->database->prepare($sql);
        $query->bindValue(':id', $_id, 1);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update($_id, $_field ='password', $_value)
    {
        
        $sql = sprintf("UPDATE `users` SET `%s` = :value WHERE `id` = :id", $_field);

        $query = $this->database->prepare($sql);
        $query->bindValue(':id', $_id, 1);
        $query->bindValue(':value', $_field == 'password' ? sha1(__SALT__ . $_value) : $_value, 3);
        $query->execute();

        return $query->rowCount();
    }

    public function delete($_id)
    {
        $sql = "DELETE FROM `users` WHERE `id` = :id;";

        $query = $this->database->prepare($sql);
        $query->bindValue(':id', $_id, 1);
        $query->execute();

        return $query->rowCount();
    }

    public function find($_username, $_password)
    {
        $sql = "SELECT `id`, `username` FROM `users` WHERE `username` = :username AND `password` = :password";

        $query = $this->database->prepare($sql);
        $query->bindValue(':username', $_username, 3);
        $query->bindValue(':password', sha1(__SALT__ . $_password), 3);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function all()
    {
        $sql = "SELECT `id`, `username` FROM `users` ORDER BY id ASC";

        $query = $this->database->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function usernameCheck($_username)
    {
        $sql = "SELECT * FROM `users` WHERE `username` = :username";

        $query = $this->database->prepare($sql);
        $query->bindValue(':username', $_username, 3);
        $query->execute();
        
        return count($query->fetchAll(PDO::FETCH_ASSOC));
    }
    public function lastInsertId($name = null)
    {
        return $this->database->lastInsertId($name);
    }
    private function dummydata()
    {
        $usernames = ["dan", "janice", "henry", "david", "adam", "ben", "tim", "sarah", "kyle", "jordan"];
        for ($i = 0; $i < 10; $i++) {
            $this->add($usernames[$i], $i);
        }
        $this->add('test', 'password');
    }
    private function install()
    {
        $this->database->exec("CREATE TABLE IF NOT EXISTS `users` (
            `id`   INTEGER PRIMARY KEY,
            `username` TEXT    NOT NULL UNIQUE,
            `password` TEXT    NOT NULL
        );");
        $this->dummydata();
    }
}
