<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $fasilitasModel    = new \App\Models\Fasilitas();
        $data['fasilitas'] = $fasilitasModel->findAll();
        return view('partials/navbar') . view('/pages/owner/add', $data) . view('partials/footer');
    }

    public function recomendation(): string
    {
        return view('/partials/navbar') . view('/pages/user/rekomendasi') . view('partials/footer');
    }

    public function detailKost(): string
    {
        return view('/partials/navbar') . view('/pages/user/detailKost') . view('partials/footer');
    }
}
