<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LogoutController extends BaseController
{
    public function index()
    {
         session_start();
        // unset($_SESSION['email'],
        // $_SESSION['password'],
        // $_SESSION['type']
        // ) ;
        session_destroy();
        return redirect()->to('/Home');
    }
}
