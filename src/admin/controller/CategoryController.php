<?php

namespace Admin\Controlller;

use Admin\Model\Category;

include_once __DIR__ . '/../model/Category.php';

class CategoryController
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAllCategories()
    {
        return $this->category->getAllCategories();
    }

    public function getExistingCategory($category)
    {
        return $this->category->getExistingCategory($category);
    }

    public function putCategory($category)
    {
        return $this->category->putCategory($category);
    }

    public function getCurrentCategory($id)
    {
        return $this->category->getCurrentCategory($id);
    }

    public function updateCategory($id, $name)
    {
        return $this->category->updateCategory($id, $name);
    }

    public function deleteCategory($id)
    {
        return $this->category->deleteCategory($id);
    }
}
