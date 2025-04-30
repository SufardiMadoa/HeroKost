<?php

namespace App\Controllers;

use App\Models\Users;

class AuthController extends BaseController
{
    // Menampilkan halaman register
    public function register()
    {
        return view('pages/auth/signup');
    }

    // Menyimpan data registrasi
    public function saveRegister()
    {
        $userModel = new Users();

        // Mengambil inputan
        $nama_user        = $this->request->getPost('nama_user');
        $email_user       = $this->request->getPost('email_user');
        $kata_sandi_user  = $this->request->getPost('kata_sandi_user');
        $confirm_password = $this->request->getPost('confirm_password');  // Menambahkan konfirmasi password

        if (empty($nama_user) || empty($email_user) || empty($kata_sandi_user) || empty($confirm_password)) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi');
        }

        // Validasi password dan konfirmasi password
        if ($kata_sandi_user !== $confirm_password) {
            return redirect()->back()->withInput()->with('error', 'Password dan konfirmasi password tidak cocok.');
        }

        // Validasi format email
        if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->with('error', 'Email tidak valid.');
        }

        // Validasi nomor telepon (Hanya jika diisi)
        if (!empty($no_telepon_user) && !preg_match('/^[0-9]{10,15}$/', $no_telepon_user)) {
            return redirect()->back()->withInput()->with('error', 'Nomor telepon tidak valid.');
        }

        // Cek apakah email sudah terdaftar

        // Simpan user baru
        $data = [
            'nama_user'       => $nama_user,
            'email_user'      => $email_user,
            'kata_sandi_user' => password_hash($kata_sandi_user, PASSWORD_DEFAULT),
            'role'            => 'pengguna',
        ];
        $userModel->save($data);

        // Sukses register
        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil. Silahkan login.');
    }

    // Menampilkan halaman login
    public function login()
    {
        return view('pages/auth/login');
    }

    // Proses autentikasi login
    public function authLogin()
    {
        $userModel = new Users();

        $email    = $this->request->getPost('email_user');
        $password = $this->request->getPost('kata_sandi_user');

        if (empty($email) || empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Email dan password wajib diisi.');
        }

        // Cari user berdasarkan email
        $user = $userModel->where('email_user', $email)->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Email tidak terdaftar.');
        }

        // Verifikasi password
        if (!password_verify($password, $user['kata_sandi_user'])) {
            return redirect()->back()->withInput()->with('error', 'Password salah.');
        }

        // Simpan data ke session
        $sessionData = [
            'id_user'    => $user['id_user'],
            'nama_user'  => $user['nama_user'],
            'email_user' => $user['email_user'],
            'role'       => $user['role'],
            'logged_in'  => true,
        ];
        session()->set($sessionData);

        // Redirect sesuai role
        if ($user['role'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        } elseif ($user['role'] === 'pemilik') {
            return redirect()->to('/pemilik');
        } else {
            return redirect()->to('/');
        }
    }

    public function registerPemilik()
    {
        return view('pages/auth/signup_pemilik');
    }

    // Menyimpan data registrasi
    public function saveRegisterPemilik()
    {
        $userModel = new Users();

        // Mengambil inputan
        $nama_user        = $this->request->getPost('nama_user');
        $email_user       = $this->request->getPost('email_user');
        $kata_sandi_user  = $this->request->getPost('kata_sandi_user');
        $confirm_password = $this->request->getPost('confirm_password');

        if (empty($nama_user) || empty($email_user) || empty($kata_sandi_user) || empty($confirm_password)) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi');
        }

        // Validasi password dan konfirmasi password
        if ($kata_sandi_user !== $confirm_password) {
            return redirect()->back()->withInput()->with('error', 'Password dan konfirmasi password tidak cocok.');
        }

        // Validasi format email
        if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->with('error', 'Email tidak valid.');
        }

        // Validasi nomor telepon (Hanya jika diisi)
        if (!empty($no_telepon_user) && !preg_match('/^[0-9]{10,15}$/', $no_telepon_user)) {
            return redirect()->back()->withInput()->with('error', 'Nomor telepon tidak valid.');
        }

        // Cek apakah email sudah terdaftar

        // Simpan user baru
        $data = [
            'nama_user'       => $nama_user,
            'email_user'      => $email_user,
            'kata_sandi_user' => password_hash($kata_sandi_user, PASSWORD_DEFAULT),
            'role'            => 'pemilik',
        ];
        $userModel->save($data);

        // Sukses register
        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil. Silahkan login.');
    }

    // Proses logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
