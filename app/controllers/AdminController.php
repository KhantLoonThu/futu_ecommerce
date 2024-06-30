<?php

namespace App\Controllers;

use App\Models\Admin;

include_once __DIR__ . "/../models/Admin.php";

class AdminController
{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function getCurrentAdmin($email)
    {
        $admin = $this->admin->getCurrentAdmin($email);
        if ($admin) {
            return ['status' => 200, 'data' => $admin];
        } else {
            return ['status' => 404, 'message' => 'Admin not found'];
        }
    }

    // public function putTheAdmin($name, $email, $password, $admin_role)
    // {
    //     $this->admin->putTheAdmin($name, $email, $password, $admin_role);
    // }
}
