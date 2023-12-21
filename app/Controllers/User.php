<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        // Get all users from the database
        $users = new UserModel();
        $user = auth()->user();

        // Pass the users data to the view
        $data = [
            'title' => 'Users | SGCommunity',
            'users' => $users,
            'user' => $user
        ];
        return view('users/index', $data);
    }
}
