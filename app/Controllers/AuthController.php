<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authentication(){
        echo("lanjut login cuy");
    }
}
