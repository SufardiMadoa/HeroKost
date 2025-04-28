<?php

namespace App\Controllers;

use App\Models\Kost;
use App\Models\Users;

class AdminController extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function manageUsers()
    {
        $userModel     = new Users();
        $data['users'] = $userModel->findAll();
        return view('admin/manage_users', $data);
    }

    public function manageKosts()
    {
        $kostModel     = new Kost();
        $data['kosts'] = $kostModel->findAll();
        return view('admin/manage_kosts', $data);
    }
}
