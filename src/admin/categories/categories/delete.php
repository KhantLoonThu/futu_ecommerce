<?php

session_start();

use Admin\Controlller\CategoryController;

include_once __DIR__ . '/../../../layouts/admin/config.php';
include_once __DIR__ . '/../../controller/CategoryController.php';

$admin = $_SESSION['main_admin'];
if (!isset($_SESSION['main_admin'])) {
    header("location:" . BASE_URL . "/admin/login.php"); // Redirect to login page if not logged in
    exit;
}

$id = intval($_GET['id']);
$category_controller = new CategoryController();
$status = $category_controller->deleteCategory($id);
if ($status) {
    // Send response to index page using session
    $_SESSION['delete_success'] = true;
} else {
    $_SESSION['delete_success'] = false;
}

// Redirect back to index page
header("Location: ./index.php");
exit;
