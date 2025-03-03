<?php 

namespace App\Traits;

use PDOException;

trait Update
{
    private string $columnsAndValues = '';
    private string $conditionString = '';

    public function update(array $updatedFieldsAndValues, array $condition)
    {
        foreach(array_keys($updatedFieldsAndValues) as $field) {
            $this->columnsAndValues .= "{$field} = :{$field}, ";
        }

        foreach (array_keys($condition) as $field) {
            $this->conditionString .= "{$field} = :{$field}";
        }
            
        $this->columnsAndValues = removeLastCharacter($this->columnsAndValues);

        $sql = sprintf('UPDATE %s SET %s WHERE %s',
            $this->table,
            $this->columnsAndValues,
            $this->conditionString
        );

        $bind = array_merge($updatedFieldsAndValues, $condition);
        
        try {
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute($bind);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}