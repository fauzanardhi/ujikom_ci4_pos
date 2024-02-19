<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{

    function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        return view('v_register');
    }
}
