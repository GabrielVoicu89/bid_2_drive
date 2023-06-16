<?php

namespace Class;

include_once __DIR__ . "/../DB/Database.php";

use Db\Database;
use PDO;

class Login
{


    protected $username;
    protected $password;
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function login($username)
    {
        $dbh = Database::createDBConnection();

        $query = $dbh->prepare("SELECT * FROM `users` 
WHERE `username` = ?
");
        $query->execute([$username]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);


        if (count($result) > 0) {
            $password = $result[0]['password'];
            if ($password === $this->password) {
                header("Location: auctions.index.php");
                die();
            } else {
                echo "<div class='alert alert-danger'>Password does not match.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Username does not exist.</div>";
        }
    }
}
