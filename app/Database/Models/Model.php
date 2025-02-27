<?php

namespace App\Database\Models;

use App\Database\Connection;
use Exception;
use PDOException;

abstract class Model
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::connection();

        // Verify connection
        if (!$this->connection) {
            throw new Exception("Falha na conexão com o banco de dados.");
        }
    }

    public function findAll()
    {
        try {
            $query = $this->connection->query('select * from ' . $this->table);
            return $query->fetchAll(); 
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}