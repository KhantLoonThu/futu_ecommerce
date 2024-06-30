<?php

namespace App\Controllers;

use App\Models\Auth;

include_once __DIR__ . "/../models/Auth.php";

class AuthController
{
    private $auth;

    public function __construct()
    {
        $this->auth = new Auth();
    }

    public function authenticate($email, $password)
    {
        //
        return $this->auth->authenticate($email, $password);
    }
}
