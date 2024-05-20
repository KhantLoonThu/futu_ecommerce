<?php

namespace Admin\Model;

use Admin\Include\Database\Database;

include_once __DIR__ . '/../include/db.php';

class Category
{
    private $con;

    public function getAllCategories()
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM categories";
        $statement = $this->con->prepare($sql);
        if ($statement->execute()) {
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }
    }

    public function getExistingCategory($category)
    {
        $this->con = Database::connect();
        $sql = "SELECT count(*) as total FROM categories WHERE name = :category";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':category', $category);
        if ($statement->execute()) {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function putCategory($category)
    {
        $this->con = Database::connect();
        $sql = "INSERT INTO categories(name) VALUE(:category)";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":category", $category);
        return $statement->execute();
    }

    public function getCurrentCategory($category)
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM categories WHERE id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':id', $category);
        if ($statement->execute()) {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function updateCategory($id, $name)
    {
        $this->con = Database::connect();
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        return $statement->execute();
    }

    public function deleteCategory($id)
    {
        $this->con = Database::connect();
        $sql_for_valid = "SELECT count(*) as total FROM sub_categories WHERE category_id = :id";
        $statement_for_valid = $this->con->prepare($sql_for_valid);
        $statement_for_valid->bindParam(":id", $id);
        if ($statement_for_valid->execute()) {
            $subcategories_count = $statement_for_valid->fetch(\PDO::FETCH_ASSOC);
            if (!($subcategories_count['total'] > 0)) {
                $sql = "UPDATE categories SET archive = 1 WHERE id = :id";
                $statement = $this->con->prepare($sql);
                $statement->bindParam(":id", $id);
                return $statement->execute();
            }
        }
    }
}
