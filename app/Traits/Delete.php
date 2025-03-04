<?php 

namespace App\Traits;

use PDOException;

trait Delete
{
    public function delete($field, $value)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM {$this->table} WHERE {$field} = :{$field}");
            $stmt->bindValue($field, $value);
            return $stmt->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}