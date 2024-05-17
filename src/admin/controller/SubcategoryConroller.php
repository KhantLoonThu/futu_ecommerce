<?php

namespace Admin\Controlller;

use Admin\Model\Subcategory;

include_once __DIR__ . "/../model/Subcategory.php";

class SubcategoryController
{
    private $subcategory;

    public function __construct()
    {
        $this->subcategory = new Subcategory();
    }

    public function getAllSubcategory()
    {
        return $this->subcategory->getAllSubcategory();
    }

    public function getAllSubcategoryWithCategory()
    {
        return $this->subcategory->getAllSubcategoryWithCategory();
    }

    // create
    public function getExistingSubcategory($subcategory_name, $category_id)
    {
        return $this->subcategory->getExistingSubcategory($subcategory_name, $category_id);
    }

    public function putSubcategory($subcategory_name, $category_id)
    {
        return $this->subcategory->putSubcategory($subcategory_name, $category_id);
    }
    // end create

    // edit
    public function getCurrentSubcategory($id, $cate_id)
    {
        return $this->subcategory->getCurrentSubcategory($id, $cate_id);
    }
    public function updateSubcategory($id, $subcategory_name, $category_id)
    {
        var_dump($category_id);
        return $this->subcategory->updateSubcategory($id, $subcategory_name, $category_id);
    }
    // end edit

    // delete
    public function deleteSubcategory($id)
    {
        return $this->subcategory->deleteSubcategory($id);
    }
}
