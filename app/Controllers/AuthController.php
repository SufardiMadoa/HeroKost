<?php

namespace App\Controllers;

use App\Models\Users;

class AuthController extends BaseController
{
    public function register()
    {
        return view('pages/auth/signup');
    }

    public function saveRegister()
    {
        $userModel = new Users();
        $data      = [
            'nama_user'       => $this->request->getPost('nama_user'),
            'email_user'      => $this->request->getPost('email_user'),
            'kata_sandi_user' => password_hash($this->request->getPost('kata_sandi_user'), PASSWORD_DEFAULT),
            'no_telepon_user' => $this->request->getPost('no_telepon_user'),
            'role'            => 'pengguna',
        ];
        $userModel->save($data);

        return redirect()->to('/login');
    }

    public function login()
    {
        return view('pages/auth/login');
    }

    public function authLogin()
    {
        // Proses login
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
