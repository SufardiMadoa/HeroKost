<?php

namespace App\Controllers;

use App\Models\GambarKost;
use App\Models\Kost;
use App\Models\Users;

class AdminController extends BaseController
{
    protected $kostModel;
    protected $gambarKostModel;
    protected $fasilitasKostModel;

    public function __construct()
    {
        $this->kostModel       = new Kost();
        $this->gambarKostModel = new GambarKost();
    }

    private function getGambarUtama($id_kost)
    {
        $gambarModel = new \App\Models\GambarKost();  // pastikan namespace-nya benar
        return $gambarModel->where('id_kost', $id_kost)->orderBy('id_gambar', 'ASC')->first();
    }

    public function dashboard()
    {
        $kosts           = $this->kostModel->findAll();
        $kostsWithGambar = [];

        foreach ($kosts as $kost) {
            $kost['gambar_utama'] = $this->getGambarUtama($kost['id_kost']);
            $kostsWithGambar[]    = $kost;
        }
        $kostModel = new Kost();
        $userModel = new Users();

        $data = [
            'title'     => 'Kelola Daftar Kost',
            'kosts'     => $kostsWithGambar,
            'totalKost' => $kostModel->countAll(),
            'totalUser' => $userModel->where('role', 'pengguna')->countAllResults(),
        ];
        return view('pages/admin/dashboard', $data);
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

    public function pemilikKosts()
    {
        return view('pages/admin/pemilikKost/index');
    }
}
