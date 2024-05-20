<?php

namespace Admin\Controlller;

use Admin\Model\Product;

include_once __DIR__ . "/../model/Product.php";

class ProductController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function getAllProducts()
    {
        return $this->product->getAllProducts();
    }

    public function getExistingProduct($product_name, $subcategory_id)
    {
        return $this->product->getExistingProduct($product_name, $subcategory_id);
    }

    // for create
    public function getSubcategoriesForProducts($id)
    {
        return $this->product->getSubcategoriesForProducts($id);
    }
    public function putProduct($product_name, $product_price, $fname, $product_description, $product_quantity, $category_id, $subcategory_id)
    {
        return $this->product->putProduct($product_name, $product_price, $fname, $product_description, $product_quantity, $category_id, $subcategory_id);
    }
    // end for create

    // for edit
    public function getCurrentProduct($id, $category_id, $subcategory_id)
    {
        return $this->product->getCurrentProduct($id, $category_id, $subcategory_id);
    }
    public function updateProduct($id, $product_name, $product_price, $fname, $product_description, $product_quantity, $category_id, $subcategory_id)
    {
        return $this->product->updateProduct($id, $product_name, $product_price, $fname, $product_description, $product_quantity, $category_id, $subcategory_id);
    }
    public function updateProductWithoutImage($id, $product_name, $product_price, $product_description, $product_quantity, $category_id, $subcategory_id)
    {
        return $this->product->updateProductWithoutImage($id, $product_name, $product_price, $product_description, $product_quantity, $category_id, $subcategory_id);
    }
    // end edit

    // delete
    public function deleteProduct($id, $subcategory_id, $category_id)
    {
        return $this->product->deleteProduct($id, $subcategory_id, $category_id);
    }
}