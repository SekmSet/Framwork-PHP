<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance;

    public static function databse_connexion()
    {
        $dsn = 'mysql:dbname=pie_php;host=127.0.0.1';
        $user = 'root';
        $password = 'Obrigada';

        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
                echo 'Connexion échouée : ' . $e->getMessage();
            }
        }


        return self::$instance;
    }
}
