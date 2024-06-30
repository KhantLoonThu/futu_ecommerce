<?php

use App\Controllers\AuthController;
use Firebase\JWT\JWT;

include_once __DIR__ . "/../../vendor/firebase/php-jwt/src/JWT.php";

// This section is describing headers for CROS.
// header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// call the controller
include_once __DIR__ . "/../../app/controllers/AuthController.php";

// define controller
$auth_controller = new AuthController();

// define methods
$requestMethod = $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

// Helper function to handle responses
function handleResponse($response)
{
    echo json_encode($response);
    exit();
}


function generateJWT($adminId, $secret_key)
{
    $payload = [
        'iat' => time(),
        'nbf' => time(),
        'exp' => time() + 3600, // 1 hour expiration
        'data' => [
            'adminId' => $adminId
        ]
    ];
    return JWT::encode($payload, $secret_key, 'HS256');
}


// Authentication endpoint
if ($uri[5] == 'auth_admin') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);
            $email = $data['email'];
            $password = $data['password'];
            $secret_key = "d8b9cf94200447051aa1149f076438e63a7446b1e13872af0d9a50fd2dd2e53b";

            // Sending to the method to verify admin credentials
            $admin = $auth_controller->authenticate($email, $password);
            if ($admin) {
                $token = generateJWT($admin['id'], $secret_key);
                $response = ['status' => 200, 'token' => $token];
            } else {
                $response = ['status' => 401, 'message' => 'Unauthorized'];
            }
            break;
        default:
            $response = ['status' => 405, 'message' => 'Method Not Allowed'];
            break;
    }
    handleResponse($response);
}
