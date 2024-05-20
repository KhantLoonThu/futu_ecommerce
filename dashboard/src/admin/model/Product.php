<?php

namespace Admin\Model;

use Admin\Include\Database\Database;

include_once __DIR__ . '/../include/db.php';

class Product
{
    private $con;

    public function getAllProducts()
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM products";
        $statement = $this->con->prepare($sql);
        if ($statement->execute()) {
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }
    }
    // sending default 50 quantity to my database
    // public function getAllProducts()
    // {
    //     $this->con = Database::connect();
    //     $sql = "SELECT * FROM products";
    //     $statement = $this->con->prepare($sql);

    //     if ($statement->execute()) {
    //         $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
    //         foreach ($results as $result) {
    //             if ($result['quantity'] == null) {
    //                 // Log the product being processed
    //                 error_log("Processing product ID: " . $result['id']);

    //                 // Check if subcategory_id exists in the sub_categories table
    //                 $subcategoryId = $result['subcategory_id'];
    //                 $sqlCheck = "SELECT COUNT(*) FROM sub_categories WHERE id = :subcategory_id";
    //                 $statementCheck = $this->con->prepare($sqlCheck);
    //                 $statementCheck->bindParam(":subcategory_id", $subcategoryId, \PDO::PARAM_INT);
    //                 $statementCheck->execute();
    //                 $count = $statementCheck->fetchColumn();

    //                 if ($count > 0) {
    //                     // Only insert if subcategory_id exists
    //                     $sql1 = "UPDATE products SET quantity = :quantity WHERE id = :product_id";
    //                     $statement1 = $this->con->prepare($sql1);
    //                     $quantity = 50;
    //                     $productId = $result['id'];
    //                     $statement1->bindParam(":quantity", $quantity, \PDO::PARAM_INT);
    //                     $statement1->bindParam(":product_id", $productId, \PDO::PARAM_INT);
    //                     $statement1->execute();
    //                     error_log("Updated product ID: " . $productId);
    //                 } else {
    //                     // Handle the case where the subcategory_id does not exist
    //                     error_log("Invalid subcategory_id: $subcategoryId for product ID: " . $result['id']);
    //                 }
    //             }
    //         }
    //         return $results;
    //     } else {
    //         // Log if the query fails
    //         error_log("Failed to execute main query: " . implode(", ", $statement->errorInfo()));
    //     }
    // }


    public function getSubcategoriesForProducts($id)
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM sub_categories WHERE category_id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            $results =  $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }
    }

    // create
    public function getExistingProduct($product_name, $subcategory_id)
    {
        $this->con = Database::connect();
        $sql = "SELECT count(*) as total FROM products WHERE name = :product_name AND subcategory_id = :subcategory_id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":product_name", $product_name);
        $statement->bindParam(":subcategory_id", $subcategory_id);
        if ($statement->execute()) {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function putProduct($product_name, $product_price, $fname, $product_description, $product_quantity, $category_id, $subcategory_id)
    {
        $this->con = Database::connect();
        $sql = "INSERT INTO products(name, price, image, description, quantity, category_id, subcategory_id)
        VALUES(:product_name, :product_price, :fname, :product_description, :product_quantity, :category_id, :subcategory_id)";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":product_name", $product_name);
        $statement->bindParam(":product_price", $product_price);
        $statement->bindParam(":fname", $fname);
        $statement->bindParam(":product_description", $product_description);
        $statement->bindParam(":product_quantity", $product_quantity);
        $statement->bindParam(":category_id", $category_id);
        $statement->bindParam(":subcategory_id", $subcategory_id);
        return $statement->execute();
    }
    // end create

    // edit 
    public function getCurrentProduct($id, $category_id, $subcategory_id)
    {
        $this->con = Database::connect();
        $sql = "SELECT * FROM products WHERE id = :id AND category_id = :category_id AND subcategory_id = :subcategory_id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":category_id", $category_id);
        $statement->bindParam(":subcategory_id", $subcategory_id);
        if ($statement->execute()) {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function updateProduct($id, $product_name, $product_price, $fname, $product_description, $product_quantity, $category_id, $subcategory_id)
    {
        $this->con = Database::connect();
        $sql = "UPDATE products SET name = :product_name, price = :product_price, image = :fname, description = :product_description, quantity = :product_quantity, category_id = :category_id, subcategory_id = :subcategory_id WHERE id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":product_name", $product_name);
        $statement->bindParam(":product_price", $product_price);
        $statement->bindParam(":fname", $fname);
        $statement->bindParam(":product_description", $product_description);
        $statement->bindParam(":product_quantity", $product_quantity);
        $statement->bindParam(":category_id", $category_id);
        $statement->bindParam(":subcategory_id", $subcategory_id);
        return $statement->execute();
    }

    public function updateProductWithoutImage($id, $product_name, $product_price, $product_description, $product_quantity, $category_id, $subcategory_id)
    {
        $this->con = Database::connect();
        $sql = "UPDATE products SET name = :product_name, price = :product_price, description = :product_description, quantity = :product_quantity, category_id = :category_id, subcategory_id = :subcategory_id WHERE id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":product_name", $product_name);
        $statement->bindParam(":product_price", $product_price);
        $statement->bindParam(":product_description", $product_description);
        $statement->bindParam(":product_quantity", $product_quantity);
        $statement->bindParam(":category_id", $category_id);
        $statement->bindParam(":subcategory_id", $subcategory_id);
        return $statement->execute();
    }
    // end edit

    // delete
    public function deleteProduct($id, $subcategory_id, $category_id)
    {
        $this->con = Database::connect();

        $sql = "UPDATE products SET archive = 1 WHERE id = :id AND subcategory_id = :subcategory_id AND category_id = :category_id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id", $id, \PDO::PARAM_INT);
        $statement->bindParam(":subcategory_id", $subcategory_id, \PDO::PARAM_INT);
        $statement->bindParam(":category_id", $category_id, \PDO::PARAM_INT);
        return $statement->execute();
    }
}