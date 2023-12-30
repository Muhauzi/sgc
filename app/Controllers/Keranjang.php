<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models\UserModel;

class Keranjang extends BaseController {
    public function index()
    {
        $users = new UserModel();
        $user = auth()->user();

        $data = [
            'title' => 'Keranjang',
            'users' => $users,
            'user' => $user
        ];

        return view('users/keranjang/index', $data);
    }

    public function tambah()
    {
        // Your code for the tambah method goes here
    }

    public function hapus()
    {
        // Your code for the hapus method goes here
    }
}
