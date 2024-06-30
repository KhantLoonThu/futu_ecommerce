<?php

namespace App\Models;

include_once __DIR__ . "/../../config/database.php";

use Config\Database;
use PDO;

class Category
{
    private $connection;

    public function getAllCategories()
    {
        $this->connection = Database::connect();
        $sql = "SELECT * FROM categories";
        $statement = $this->connection->prepare($sql);
        if ($statement->execute()) {
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        return [];
    }
}
