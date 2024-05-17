<?php

namespace Admin\Controlller;

use Admin\Model\Admin;

include_once __DIR__ . '/../model/Admin.php';

class AdminController
{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function getAllAdmin()
    {
        return $this->admin->getAllAdmin();
    }
}
