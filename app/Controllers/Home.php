<?php

namespace App\Controllers;
use App\Helpers\Functions;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | SGCommunity'
        ];
        return view('users/index', $data);
    }
}
