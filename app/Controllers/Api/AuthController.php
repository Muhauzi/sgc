<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        if (auth()->loggedIn()) {
            return redirect()->to('/user/dashboard');
        }
        $data = [
            'title' => 'Login | SGCommunity'
        ];
        return view('auth/login', $data);
    }

    public function login()
    {
        if (auth()->loggedIn()) {
            return redirect()->to('/user/dashboard');
        }

        $validationRules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $credentials = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $loginAttempt = auth()->attempt($credentials);

        if (!$loginAttempt->isOK()) {
            return redirect()->back()->with('error', $loginAttempt->reason());
        }
    }

    public function userLogout(){
        auth()->logout();
        return redirect()->to('/login');
    }
}



