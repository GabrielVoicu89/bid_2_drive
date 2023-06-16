<?php

namespace Db;

use PDO;

abstract class Database
{
    const ADDRESS = "mysql:dbname=autobase;host:127.0.0.1;port:3306";
    const USER = "root";
    const PASSWORD = "";

    /**
     * Création d'un connexion à la base de données
     */
    public static function createDBConnection()
    {
        return new PDO(self::ADDRESS, self::USER, self::PASSWORD);
    }
}
