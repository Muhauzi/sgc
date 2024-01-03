<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models\UserModel;

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

        // Pass the users data to the view
        $data = [
            'title' => 'Home',
            'users' => $users,
            'user' => $user
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
        return view('users/dashboard/profile', $data);
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

