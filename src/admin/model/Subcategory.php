<?php

namespace Admin\Model;

use Admin\Include\Database\Database;

include_once __DIR__ . "/../include/db.php";

class Subcategory
{
    private $con;

    public function getAllSubcategory()
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM sub_categories";
        $statement = $this->con->prepare($sql);
        if ($statement->execute()) {
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }
    }

    public function getAllSubcategoryWithCategory()
    {
        $this->con = Database::connect();
        $sql = "SELECT sub_categories.*, categories.name as category_name, categories.id as parent_category_id FROM sub_categories JOIN categories ON sub_categories.category_id = categories.id";
        $statement = $this->con->prepare($sql);
        if ($statement->execute()) {
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }
    }

    // create
    public function getExistingSubcategory($subcategory_name, $category_id)
    {
        $this->con = Database::connect();
        $sql = "SELECT count(*) as total FROM sub_categories WHERE name = :subcategory_name AND category_id = :category_id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":subcategory_name", $subcategory_name);
        $statement->bindParam(":category_id", $category_id);
        if ($statement->execute()) {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function putSubcategory($subcategory_name, $category_id)
    {
        $this->con = Database::connect();
        $sql = "INSERT INTO sub_categories(name, category_id) VALUES(:subcategory_name, :category_id)";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":subcategory_name", $subcategory_name);
        $statement->bindParam(":category_id", $category_id);
        return $statement->execute();
    }
    // end create

    // edit
    public function getCurrentSubcategory($id, $cate_id)
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM sub_categories WHERE id = :id AND category_id = :cate_id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":cate_id", $cate_id);
        if ($statement->execute()) {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function updateSubcategory($id, $subcategory_name, $category_id)
    {
        $this->con = Database::connect();
        $sql = "UPDATE sub_categories SET name = :subcategory_name, category_id = :category_id WHERE id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':subcategory_name', $subcategory_name);
        $statement->bindParam(':category_id', $category_id);
        return $statement->execute();
    }
    // end edit

    // delete
    public function deleteSubcategory($id)
    {
        $this->con = Database::connect();
        $sql_for_valid = "SELECT count(*) as total FROM products WHERE subcategory_id = :id";
        $statement_for_valid = $this->con->prepare($sql_for_valid);
        $statement_for_valid->bindParam(":id", $id);
        if ($statement_for_valid->execute()) {
            $product_count = $statement_for_valid->fetch(\PDO::FETCH_ASSOC);
            if (!$product_count['total'] > 0) {
                $sql = "UPDATE sub_categories SET archive = 1 WHERE id = :id";
                $statement = $this->con->prepare($sql);
                $statement->bindParam(":id", $id);
                return $statement->execute();
            }
        }
    }
}
