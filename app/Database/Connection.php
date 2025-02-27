<?php 

namespace App\Database;

use PDO;
use PDOException;

class Connection
{
    private static $pdo;

    public static function connection() 
    {
        if(static::$pdo)
        {
            return static::$pdo;
        }   
        
        try {
            static::$pdo = new PDO('mysql:host=slim4-mysql-1;port=3306;dbname=slim4', 'slim', 'password', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);            
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }

        return static::$pdo;
    }
}