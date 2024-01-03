<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models\UserModel;
use App\Models\TokoModel;
use App\Models\ProdukModel;

class User extends BaseController
{
    public function __construct()
    {
        
        
    }
    public function index()
    {
        // Get all users from the database
        $users = new UserModel();
        $user = auth()->user();

        // Get all toko from the database
        $tokos = new TokoModel();
        $toko = $tokos->findAll();

        // Get all produk from the database
        $produks = new ProdukModel();
        $produk = $produks->findAll();

        // Pass the users data to the view
        $data = [
            'title' => 'Home',
            'users' => $users,
            'user' => $user,
            'tokos' => $toko,
            'toko' => $toko,
            'produks' => $produk,
            'produk' => $produk
        ];
        return view('users/index', $data);
    }

    public function profile()
    {
        $user = auth()->user();
        $data = [
            'title' => 'Profile | SGCommunity',
            'user' => $user
        ];
        return view('users/profile', $data);
    }

    public function editProfile()
    {
        $user = auth()->user();
        $data = [
            'title' => 'Edit Profile | SGCommunity',
            'user' => $user
        ];
        return view('users/edit_profile', $data);
    }
}

