<?php

use App\Controllers\CategoryController;

// This section is describing headers for CROS.
# header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// call the controller
include_once __DIR__ . "/../app/controllers/CategoryController.php";

// define controller
$category_controller = new CategoryController();

// define methods
$requestMethod = $_SERVER["REQUEST_METHOD"]; // POST, GET, PUT, DELETE
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri); // Making array by '/'
// echo json_encode($uri);

// Helper function to handle responses
function handleResponse($response)
{
    echo json_encode($response);
    exit();
}

// Categories
if ($uri[4] == 'categories') {
    switch ($requestMethod) {
        case 'GET':
            // if (isset($uri[4])) {
            //     $id = (int) $uri[4];
            //     // $response = $category_controller->getCurrentCategory($id);
            //     # get categories by id
            // } else {
            $response = $category_controller->getAllCategories();
            # get all products
            // }
            break;
        case 'POST':
            $category = json_decode(file_get_contents('php://input'), true);
            // $response = $category_controller->putCategory($category);
            # send the products to the database and return true or false 
            break;
        case 'PUT':
            $id = (int) $uri[3];
            $data = json_decode(file_get_contents('php://input'), true);
            # $response = $category_controller->updateCategory($id, $data['name']);
            break;
        case 'DELETE':
            $id = (int) $uri[3];
            # $response = $category_controller->deleteCategory($id);
            break;
        default:
            $response = ['status' => 405, 'message' => 'Method Not Allowed'];
            break;
    }
    handleResponse($response);
    // echo json_encode($uri);
}
