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
        } else {
            return view('users/dashboard/profile', $data);
        }
    }

    public function editProfile()
    {
        $data = [
            'title' => 'Edit Profile | SGCommunity',
            'user' => auth()->user()
        ];
        return view('users/dashboard/editprofile', $data);
    }


    public function saveProfile()
    {
        $id = $this->request->getVar('id');
        if (!user_id() == $id) {
            return redirect()->back()->with('error', 'Tidak DApat Menyimpan Perubahan Profile');
        }
        $username = $this->request->getVar('username');
        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $role = $this->request->getVar('role');
        $users = auth()->getProvider();

        $user = $users->findById($id);

        // Handle the file upload
        $file = $this->request->getFile('user_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('./public/img/profile', $newName);
            $user_image = '/img/profile/' . $newName;
        } else {
            $user_image = $user->user_image; // keep the old image if no new image is uploaded
        }

        // If password is provided, hash it
        $password = $this->request->getVar('password');
        if ($password !== null) {
            $user->setPassword($password);
        } else {
            $password = $user->password; // keep the old password if no new password is provided
        }

        $user->fill([
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'user_image' => $user_image,
            'password' => $password,
            'role' => $role
        ]);

        $users->save($user);
        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/admin');
    }
}

