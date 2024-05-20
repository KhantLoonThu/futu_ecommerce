<?php

use Admin\Controlller\ProductController;

include_once __DIR__ . '/../../layouts/admin/config.php';
include_once __DIR__ . '/../controller/ProductController.php';

$id = intval($_GET['id']);
$subcate_id = intval($_GET['subcate_id']);
$cate_id = intval($_GET['cate_id']);
$product_controller = new ProductController();
$status = $product_controller->deleteProduct($id, $subcate_id, $cate_id);
if ($status) {
    header('Location: ./index.php?delete_product_success=true');
    exit;
} else {
    header('Location: ./index.php?delete_product_success=false');
    exit;
}