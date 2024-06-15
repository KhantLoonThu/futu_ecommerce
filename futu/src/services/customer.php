<?php
// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}
// Response to the client

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo json_encode(["message" => "Request received"]); // to know if the server is work

    # sending to the database 
    try {
        $input = file_get_contents("php://input");
        $data = json_decode($input, true);
        // echo (json_encode($data));
        // $firstName = $data['firstName'];
        // $lastName = $data['lastName'];
        // $birthDate = $data['birthDate'];
        // $phoneNumber = $data['phoneNumber'];
        // $address = $data['address'];
        // $city = $data['city'];
        // $state = $data['state'];
        // $country = $data['country'];
        // $email = $data['email'];
        // $password = $data['password'];

        // Initialize image errors array
        $imageErrors = [];

        # Check if image is uploaded
        // if (isset($_FILES['image'])) {
        //     $file = $_FILES['image'];
        //     $filename = $file['name'];
        //     $filetype = $file['type'];
        //     $filetmp = $file['tmp_name'];
        //     $fileerror = $file['error'];
        //     $filesize = $file['size'];
        //     $allowedTypes = ['jpeg', 'jpg', 'png', 'webp', 'svg', 'docs'];
        //     $fileExtArray = explode(".", $filename);
        //     $fileExt = strtolower(end($fileExtArray));
        //     $fname = time() . "." . $fileExt;

        //     // Check for errors during upload
        //     if ($fileerror == 0) {
        //         // Check file type
        //         if (in_array($fileExt, $allowedTypes)) {
        //             // Check file size
        //             if ($filesize < 2000000) {
        //                 // Move uploaded file to destination
        //                 $destination = __DIR__ . "/../assets/images/$fname";
        //                 if (move_uploaded_file($filetmp, $destination)) {
        //                     // Image uploaded successfully
        //                 } else {
        //                     $imageErrors[] = 'Failed to move uploaded file.';
        //                 }
        //             } else {
        //                 $imageErrors[] = 'Your file size is too large.';
        //             }
        //         } else {
        //             $imageErrors[] = 'Your file extension is not allowed.';
        //         }
        //     } else {
        //         $imageErrors[] = 'There was an error uploading your file.';
        //     }
        // } else {
        //     $imageErrors[] = 'No file was uploaded.';
        // }

        // # If there are image errors, throw an exception
        // if (!empty($imageErrors)) {
        //     throw new Exception(implode("\n", $imageErrors));
        // }

        // if ($data) {
        //     $connection = new PDO('mysql:host=localhost;db_name=futu_example;', 'root', '');

        //     $sql = "INSERT INTO customers (first_name, last_name, birth_date, phone_number, address, city, state, country, email, password) VALUES (:first_name, :last_name, :birth_date, :phone_number, :address, :city, :state, :country, :email, :password)'";
        // }
        echo json_encode($data);
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Error: ' . $e->getMessage(),
        ]);
    }
} else {
    echo "Failed";
}
