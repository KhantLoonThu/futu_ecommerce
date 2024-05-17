<?php

use Admin\Controlller\SubcategoryController;

include_once __DIR__ . '/../../controller/SubcategoryConroller.php';
include_once __DIR__ . '/../../../layouts/admin/config.php';

$id = intval($_GET['id']);
$subcategory_controller = new SubcategoryController();
$status = $subcategory_controller->deleteSubcategory($id);
if ($status) {
    header('Location: ./index.php?sub_delete_success=true');
    exit;
} else {
    header('Location: ./index.php?sub_delete_success=false');
}
