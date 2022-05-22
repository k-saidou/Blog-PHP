<?php

namespace App\DataBase;

// importe PDO
use PDO;
use PDOException;

class DataBase extends PDO
{
    // Instance class
    private static $intance;

    // Information connexion
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'blog_php';

    private function __construct()
    {
        // DSN connect
        $dsn = 'mysql:host='. self::DBHOST . 'dbname=' . self::DBNAME;
       
        // Call the construct
        try {
            parent::__construct($dsn, self::DBUSER, self::DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                
            if ($pdo) {
                echo "Connecter à la base de donnée $dbname réussi";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}