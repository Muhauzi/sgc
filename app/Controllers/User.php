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

    public function update()
    {
        $id = $this->request->getVar('id');
        if (! user_id() == $id) {
            return redirect()->back()->with('error', 'Tidak DApat Menyimpan Perubahan Profile');
        }
        $username = $this->request->getVar('username');
        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user_image = $this->request->getFile('user_image');
        $nohp = $this->request->getVar('nohp');
        $users = auth()->getProvider();

        $user = $users->findById($id);

        $user->fill([
            'username' => $username,
            'fullname' => $fullname,
            'nohp' => $nohp,
            'email' => $email,
            'password' => $password,
        ]);

        // Check if a new image file was uploaded
        if ($user_image->isValid() && !$user_image->hasMoved()) {
            // Generate a unique filename for the uploaded image
            $newFileName = $user_image->getRandomName();
            
            // Move the uploaded image to the desired directory
            $user_image->move(ROOTPATH . 'public/img/profile', $newFileName);
            
            // Update the user's image field with the new filename
            $user->user_image = $newFileName;
        }

        $users->save($user);

        return redirect()->back()->with('success', 'Berhasil Menyimpan Perubahan Profile');
    }

    public function help()
    {
        $users = new UserModel();

        $admin = $users->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                       ->where('auth_groups_users.group', 'admin')
                       ->findAll();
        

        $data = [
            'title' => 'Help | SGCommunity',
            'admin' => $admin,
        ];
        return view('users/help/kontak', $data);
    }

    
}

