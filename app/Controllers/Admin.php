<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Files\File;

class Admin extends BaseController
{
    protected $pengguna, $db, $helpers = ['form', 'url'];

    public function __construct()
    {
        // Load necessary models, libraries, or helpers here
        $db = \Config\Database::connect();
        $pengguna = new UserModel();
    }

    public function index()
    {
        // Get all users from the database
        $users = new UserModel();
        $user = auth()->user();
        $pengguna = $users->findAll();

        // Pass the users data to the view
        $data = [
            'title' => 'Users | SGCommunity',
            'users' => $users,
            'user' => $user,
            'pengguna' => $pengguna
        ];
        return view('admins/index', $data);

    }

    public function create()
    {
        $data = [
            'title' => 'Register | SGCommunity'
        ];

        return view('admins/addUsers', $data);

    }

    public function store()
    {
        $users = auth()->getProvider();
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT); // **Hash the password before saving!**

        $user = new User([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'user_image' => 'default.svg',
            'active' => 1
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Check if user is created successfully
        if (!$user) {
            return redirect()->to('/admin')->with('error', 'Failed to create user');
        }


        $users->addToDefaultGroup($user);

        // Save auth_groups_users
        $group_id = $this->request->getVar('role');
        if ($group_id !== null) {
            $user->addGroup($group_id);
        } else {
            $user->addGroup('user');
        }


        // Redirect to the user index page
        return redirect()->to('/admin')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $users = new UserModel();
        $user = $users->find($id);

        if ($user->inGroup('superadmin', 'admin')) {
            $name = "admin";
        } elseif ($user->inGroup('user')) {
            $name = "user";
        } elseif ($user->inGroup('pedagang')) {
            $name = "pedagang";
        }

        if ($user) {
            $data = [
                'title' => 'User Details | SGCommunity',
                'user' => $user,
                'name' => $name
            ];
            return view('admins/detail', $data);
        } else {
            return redirect()->to('/users')->with('error', 'User not found');
        }

    }

    public function edit($id)
    {
        $users = new UserModel();
        $user = $users->find($id);
        $info = auth()->user();

        if ($user) {
            $data = [
                'info' => $info,
                'title' => 'Edit User | SGCommunity',
                'user' => $user
            ];
            return view('admins/editUser', $data);
        } else {
            return redirect()->to('/users')->with('error', 'User not found');
        }
    }

    public function perbarui()
    {
        $id = $this->request->getVar('id');
        $username = $this->request->getVar('username');
        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        $users = auth()->getProvider();

        $user = $users->findById($id);

        // Handle file upload only if a file is present
        $file = $this->request->getFile('user_image');
        if (!$file->hasMoved()) {
            // Validate file extension and size (uncomment for validation)
            if (!$file->isValid()) {
                session()->setFlashdata('error', 'Invalid file format or size.');
                return redirect()->to('/admin');
            }

            // Generate a unique filename and move the uploaded file
            $filename = uniqid('user-') . '.' . $file->getClientExtension();
            $file->move('./img/profile', $filename);

            // Update user data with the new image filename
            $user->fill([
                'username' => $username,
                'fullname' => $fullname,
                'email' => $email,
                'user_image' => $filename,
                'password' => $password
            ]);
        } else {
            // If no file is uploaded, only update other fields
            $user->fill([
                'username' => $username,
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password
            ]);
        }

        $users->save($user);

        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/admin');
    }



    public function upload()
    {
        $img = $this->request->getFile('img');
        d($img);
        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];
            return redirect()->to('/admin')->with('success', 'User updated successfully', $data);
        }
    }

    public function delete($id)
    {
        $users = new UserModel();
        $user = $users->find($id);

        if ($user) {
            $users->delete($id);
            return redirect()->to('/admin')->with('success', 'User deleted successfully');
        } else {
            return redirect()->to('/admin')->with('error', 'User not found');
        }
    }
}
