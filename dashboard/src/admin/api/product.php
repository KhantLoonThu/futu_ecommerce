<?php

session_start();

use Admin\Controlller\ProductController;
use Admin\Controlller\SubcategoryController;

include_once __DIR__ . '/../../layouts/admin/config.php';
include_once __DIR__ . '/../controller/ProductController.php';
include_once __DIR__ . '/../controller/SubcategoryConroller.php';

$subcategory_controller = new SubcategoryController();
$product_controller = new ProductController();

$_SESSION['id'] = $_POST['category'];
$id = $_SESSION['id'];

$subcategories = $product_controller->getSubcategoriesForProducts($id);
echo json_encode($subcategories);
