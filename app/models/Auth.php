<?php

namespace App\Models;

include_once __DIR__ . "/../../config/database.php";

use Config\Database;
use Exception;
use PDO;

class Auth
{
    private $connection;

    public function authenticate($email, $password)
    {
        try {
            $this->connection = Database::connect();

            $sql = "SELECT * FROM admins WHERE email = :email";
            $statement = $this->connection->prepare($sql);

            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->execute();

            $admin = $statement->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($password, $admin['password'])) {
                // Password matches, return admin data
                return $admin;
            } else {
                // Invalid credentials
                return false;
            }
        } catch (Exception $e) {
            error_log("Database error: " . $e->getMessage());
        } finally {
            $this->connection = null;
        }
    }
}
