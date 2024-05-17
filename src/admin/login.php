<?php
session_start();

use Admin\Controlller\AdminController;

include_once __DIR__ . '/controller/AdminController.php';

$admin_controller = new AdminController();
$admin = $admin_controller->getAllAdmin();

// print_r($admin);
# print r successfully worked

// getting form data
if (isset($_POST['login'])) {
    // init error
    $error = false;

    // validation for email
    if (!empty($_POST['email'])) {
        $email = trim(strtolower($_POST['email']));
    } else {
        $error = true; // if eamil is empty, error true
        $email_error = 'Please Fill Admin\'s Email!';
    }

    if (!empty($_POST['password'])) {
        $password = trim(strtolower($_POST['password']));
    } else {
        $error = true; // if password is empty, error true
        $password_error = 'Please Fill Admin\'s Password!';
    }

    if (!$error) {
        if ($admin[0]['email'] == $email && $admin[0]['pwd'] == $password) {
            $_SESSION['main_admin'] = $admin;
            header('location:index.php');
        } else {
            $error = true;
            $email_error = 'Wrong Email';
            $password_error = 'Wrong Password';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futu Ecommerce</title>
    <script src="https://kit.fontawesome.com/ec00f89d6d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/style.css">
</head>

<body class="bg-gray-600">


    <div class="max-w-screen-sm mx-auto h-screen flex justify-center items-center">
        <div class="p-[20px] bg-gray-100 w-full rounded-lg">
            <h2 class="text-center text-[28px] font-semibold mb-[30px]">
                Admin Login
            </h2>
            <div class="grid grid-cols-2 gap-10 flex items-center">
                <div class="">
                    <img class="rounded-xl" src="../../public/images/login.jpg" alt="login image">
                </div>
                <div>
                    <form action="" method="post">
                        <div class="mt-2">
                            <input placeholder="Email" type="email" name="email" id="admin-email" class="w-full rounded-lg mt-[10px] py-3 px-5 border-2 border-gray-900 focus:outline-none focus:ring-4 focus:ring-purple-400 transition-all ease-linear duration-300 focus:border-purple-600" value="<?php if (isset($email)) echo $email ?>">
                            <span class="mt-3 text-red-700">
                                <?php if (isset($email_error))  echo $email_error ?>
                            </span>
                        </div>
                        <div class="mt-4">
                            <input placeholder="Password" type="password" name="password" id="admin-password" class="w-full rounded-lg mt-[10px] py-3 px-5 border-2 border-gray-900 focus:outline-none focus:ring-4 focus:ring-purple-400 transition-all ease-linear duration-300 focus:border-purple-600" value="<?php if (isset($password)) echo $password ?>">
                            <span class="mt-3 text-red-700">
                                <?php if (isset($password_error))  echo $password_error ?>
                            </span>
                        </div>
                        <div class="mt-8">
                            <button name="login" class="w-full py-4 bg-purple-900 text-white rounded-lg">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>