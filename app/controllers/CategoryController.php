<?php

namespace App\Controllers;

use App\Models\Category;

include_once __DIR__ . "/../models/Category.php";

class CategoryController
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAllCategories()
    {
        try {
            $categories = $this->category->getAllCategories();
            return ['status' => 200, 'data' => $categories];
        } catch (\Exception $e) {
            // Log the error if necessary
            // Log::error($e->getMessage());

            return ['status' => 500, 'error' => 'An error occurred while retrieving categories.'];
        }
    }
}
