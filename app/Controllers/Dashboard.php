<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Authorization\AuthorizationTrait;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;


class Dashboard extends BaseController
{

    public function index()
    {
        $users = new UserModel();
        $user = auth()->user();
        $pengguna = $users->findAll();

        // Pass the users data to the view
        $data = [
            'title' => 'Dashboard | SGCommunity',
            'users' => $users,
            'user' => $user,
            'pengguna' => $pengguna
        ];
        $user = auth()->user(); 
        if ($user->inGroup('superadmin')) { // Use $this->in_groups() instead of in_groups()
            return view('admins/index', $data);
        } elseif ($user->inGroup('admin')) { // Use $this->in_groups() instead of in_groups()
            return view('admins/index', $data);
        } elseif ($user->inGroup('user')) { // Use $this->in_groups() instead of in_groups()
            return view('users/dashboard/profile', $data);
        }
    }
}
