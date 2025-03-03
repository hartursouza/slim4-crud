<?php 

namespace App\Traits;

use App\Database\Connection as DatabaseConnection;
use Exception;

trait Connection
{
    private $connection;

    public function __construct()
    {
        $this->connection = DatabaseConnection::connection();

        // Verify connection
        if (!$this->connection) {
            throw new Exception("Falha na conexão com o banco de dados.");
        }
    }
}
