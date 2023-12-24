<?php

namespace App\Controllers;
use App\Helpers\Functions;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login | SGCommunity'
        ];
        return view('admins/login', $data);
    }
}
