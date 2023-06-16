<?php

namespace Class;

include_once __DIR__ . "/../DB/Database.php";

use Db\Database;

class Register

{
    protected $username;
    protected $email;
    protected $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public function register($username, $email, $password)
    {
        $dbh = Database::createDBConnection();

        $query = $dbh->prepare("INSERT 
INTO `users` (`username`, `email`, `password`) VALUES (?,?,?) 
");

        $query->execute([$username, $email, $password]);
    }
}
