<?php

namespace Admin\Model;

use Admin\Include\Database\Database;

include_once __DIR__ . '/../include/db.php';

class Admin
{
    private $con;

    // get admin
    public function getAllAdmin()
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM admins";
        $statement = $this->con->prepare($sql);
        if ($statement->execute()) {
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }
    }
}
