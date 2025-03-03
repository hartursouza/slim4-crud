<?php 

namespace App\Traits;

use PDOException;

trait Read
{
    public function findAll()
    {
        try {
            $query = $this->connection->query('select * from ' . $this->table);
            return $query->fetchAll(); 
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function findBy($field, $value, $fetchAll = false)
    {
        try {
            $stmt = $this->connection->prepare("select * from {$this->table} where {$field} = (:field)");
            $stmt->bindValue(':field', $value);
            $stmt->execute();
            return $fetchAll ? $stmt->fetchAll() : $stmt->fetch();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}