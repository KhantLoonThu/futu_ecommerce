<?php


use App\Controllers\AdminController;

// This section is describing headers for CROS.
# header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// call the controller
include_once __DIR__ . "/../app/controllers/AdminController.php";

// define controller
$admin_controller = new AdminController();

// define methods
$requestMethod = $_SERVER["REQUEST_METHOD"]; // POST, GET, PUT, DELETE
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// echo $uri;
$uri = explode('/', $uri); // Making array by '/'
// print_r($uri);


// Helper function to handle responses
function handleResponse($response)
{
    echo json_encode($response);
    exit();
}

// admin routes
if ($uri[4] == 'admins') {
    switch ($requestMethod) {
        case "GET":
            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                $response = $admin_controller->getCurrentAdmin($email);
                // $response = $uri;
            }
            break;
        default:
            $response = ['status' => 405, 'message' => 'Method Not Allowed'];
            break;
    }
    handleResponse($response);
}
