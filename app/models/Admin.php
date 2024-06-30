<?php

namespace App\Models;

use Config\Database;
use PDO;

include_once __DIR__ . "/../../config/database.php";

class Admin
{
    private $connection;

    public function getCurrentAdmin($email)
    {
        //
        $this->connection = Database::connect();
        $sql = "SELECT * FROM admins WHERE email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /*
    this function is putting the admin into database. No need to use anymore so I commented out.
    public function putTheAdmin($name, $email, $password, $admin_role)
    {
        //
        $hashedPassword = strval(password_hash($password, PASSWORD_BCRYPT));

        $this->connection = Database::connect();
        $sql = "INSERT INTO Admins (name, email, password, admin_role) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $name);
        $statement->bindParam(2, $email);
        $statement->bindParam(3, $hashedPassword);
        $statement->bindParam(4, $admin_role);
        if ($statement->execute()) {
            echo $name . "is successfully added";
        } else {
            echo $name . "adding failed";
        }
    }
    */
}
