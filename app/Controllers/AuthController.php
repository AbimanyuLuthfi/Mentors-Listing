<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login_index()
    {
        return view('login');
    }
    public function register_index()
    {
        return view('register');
    }

    public function authentication(){
        echo("lanjut login cuy");
    }
}
