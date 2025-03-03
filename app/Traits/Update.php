<?php 

namespace App\Traits;

use PDOException;

trait Update
{
    private string $columnsAndValues = '';
    private string $conditionString = '';

    public function update(array $createFieldsAndValues, array $condition)
    {
        try {
            if (count($createFieldsAndValues) > 0) {
                foreach($createFieldsAndValues as $field => $value) {
                    if (is_string($value)) {
                        $value = "'{$value}'";
                    }
                    $this->columnsAndValues .= "{$field} = {$value}, ";
                }
            }

            foreach ($condition as $field => $value) {
                $this->conditionString .= "{$field} = {$value}";
            }
            
            $this->columnsAndValues = removeLastCharacter($this->columnsAndValues);

            $sql = sprintf('UPDATE %s SET %s WHERE %s',
            $this->table,
            $this->columnsAndValues,
            $this->conditionString
             );
        
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}