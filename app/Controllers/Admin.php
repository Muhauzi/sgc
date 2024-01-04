<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Files\File;
use App\Models\TokoModel;
use Config\Validation;

class Admin extends BaseController
{
    protected $pengguna, $db, $helpers = ['form', 'url'];

    protected $validator;

    public function __construct()
    {
        // Load necessary models, libraries, or helpers here
        $db = \Config\Database::connect();
        $pengguna = new UserModel();
        $validator = \Config\Services::validation();
    }

    public function index()
    {
        if (!auth()->user()->can('admin.access')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
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
        if (!auth()->user()->can('users.create')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $data = [
            'title' => 'Register | SGCommunity'
        ];

        return view('admins/addUsers', $data);

    }

    public function store()
    {
        // Validation rules
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ];

        // Run validation
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Salah bang');
        }

        if (!auth()->user()->can('users.create')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }

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
        if (!auth()->user()->can('users.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
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
        if (!auth()->user()->can('users.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
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
        if (!auth()->user()->can('users.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $id = $this->request->getVar('id');
        $username = $this->request->getVar('username');
        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $role = $this->request->getVar('role');
        $users = auth()->getProvider();

        $user = $users->findById($id);

        // Handle the file upload
        $file = $this->request->getFile('user_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $randomNumber = rand(0, 16777215);
            $newName = dechex($randomNumber) . '.' . $file->getExtension();
            $user_image = 'user-' . $newName;
            $file->move('./img/profile/', $user_image);

            // Delete previous user_image
            $previousImage = $user->user_image;
            if ($previousImage && file_exists('./img/profile/' . $previousImage)) {
                unlink('./img/profile/' . $previousImage);
            }
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
            'group' => $role
        ]);

        $users->save($user);
        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        if (!auth()->user()->can('users.delete')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $users = new UserModel();
        $user = $users->find($id);

        if ($user) {
            $users->delete($id);
            return redirect()->to('/admin')->with('success', 'User deleted successfully');
        } else {
            return redirect()->to('/admin')->with('error', 'User not found');
        }
    }


    //Admin Toko Section
    public function toko()
    {
        if (!auth()->user()->can('admin.access')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }

        $tokoModel = new TokoModel();
        // $toko = $tokoModel->findAll();
        $tokos = $tokoModel->getTokoWithFullname();

        $data = [
            'title' => 'Toko | SGCommunity',
            // 'toko' => $toko,
            'tokos' => $tokos
        ];

        return view('admins/toko/index', $data);
    }

    public function tambahkan_toko()
    {
        if (!auth()->user()->can('users.create')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $usersm = new UserModel();
        $users = $usersm->findAll();
        $data = [
            'title' => 'Tambahkan Toko | SGCommunity',
            'users' => $users
        ];

        return view('admins/toko/tambah', $data);
    }

    public function tambah_toko()
    {
        
        if (!auth()->user()->can('users.create')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $tokoModel = new TokoModel();

        // Validation rules
        $rules = [
            'nama_toko' => 'required|min_length[3]|max_length[50]',
            'alamat_toko' => 'required|min_length[3]|max_length[50]',
            'telepon_toko' => 'required|min_length[3]|max_length[50]',
            'owner' => 'required'
        ];

        // Run validation
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Salah bang');
        }

        // Get the input data from the form
        $namaToko = $this->request->getVar('nama_toko');
        $alamatToko = $this->request->getVar('alamat_toko');
        $teleponToko = $this->request->getVar('telepon_toko');
        $idUser = $this->request->getVar('owner'); 

        // Create a new toko record
        $tokoData = [
            'nama_toko' => $namaToko,
            'alamat_toko' => $alamatToko,
            'nohp_toko' => $teleponToko,
            'user_id' => $idUser // Add id_user to the tokoData array
        ];
        $tokoModel->insert($tokoData);
        // d($tokoData);
        

        session()->setFlashdata('success', 'Toko berhasil ditambahkan');
        return redirect()->to('/admin/toko');
    }

    public function edit_toko($id)
    {
        if (!auth()->user()->can('users.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $tokoModel = new TokoModel();
        $toko = $tokoModel->find($id);
        
        $usersm = new UserModel();
        $users = $usersm->findAll();

        $pemilik = $tokoModel->getTokoWithFullnameById($id);

        if ($toko) {
            $data = [
                'title' => 'Edit Toko | SGCommunity',
                'toko' => $toko,
                'users' => $users,
                'pemilik' => $pemilik
            ];
            return view('admins/toko/edit', $data);
        }
    }

    public function perbarui_toko(){
        if (!auth()->user()->can('users.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $id = $this->request->getVar('id');
        $namaToko = $this->request->getVar('nama_toko');
        $alamatToko = $this->request->getVar('alamat_toko');
        $deskripsiToko = $this->request->getVar('deskripsi_toko');
        $teleponToko = $this->request->getVar('telepon_toko');
        $idUser = $this->request->getVar('owner');

        $tokoModel = new TokoModel();

        $toko = $tokoModel->find($id);

        // Handle the file upload
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $randomNumber = rand(0, 16777215);
            $newName = dechex($randomNumber) . '.' . $file->getExtension();
            $foto = 'toko-' . $newName;
            $file->move('./img/toko/', $foto);

            // Delete previous user_image
            $previousImage = $toko->foto;
            if ($previousImage && file_exists('./img/toko/' . $previousImage)) {
                unlink('./img/toko/' . $previousImage);
            }
        } else {
            $foto = $toko['foto']; // keep the old image if no new image is uploaded
        }

        // save updated data
        $toko = [
            'nama_toko' => $namaToko,
            'alamat_toko' => $alamatToko,
            'deskripsi' => $deskripsiToko,
            'nohp_toko' => $teleponToko,
            'foto' => $foto,
            'user_id' => $idUser
        ];

        $res = $tokoModel->update($id, $toko);

        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/admin/toko');
    }

    public function delete_toko($id)
    {
        if (!auth()->user()->can('users.delete')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $tokoModel = new TokoModel();
        $toko = $tokoModel->find($id);

        if ($toko) {
            $tokoModel->delete($id);
            return redirect()->to('/admin/toko')->with('success', 'Toko berhasil dihapus');
        } else {
            return redirect()->to('/admin/toko')->with('error', 'Toko tidak ditemukan');
        }
    }

    public function detail_toko($id)
    {
        if (!auth()->user()->can('users.edit')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        $tokoModel = new TokoModel();
        $toko = $tokoModel->find($id);
        $pemilik = $tokoModel->getTokoWithFullnameById($id);

        if ($toko) {
            $data = [
                'title' => 'Detail Toko | SGCommunity',
                'pemilik' => $pemilik,
                'toko' => $toko
            ];
            return view('admins/toko/detail', $data);
        } else {
            return redirect()->to('/admin/toko/detail')->with('error', 'Toko tidak ditemukan');
        }
    }


}
