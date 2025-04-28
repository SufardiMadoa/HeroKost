<?php

namespace App\Controllers;

use App\Models\Kost;

class KostController extends BaseController
{
  public function index()
  {
    $kostModel     = new Kost();
    $data['kosts'] = $kostModel->findAll();
    return view('kost/index', $data);
  }

  public function detail($id)
  {
    $kostModel    = new Kost();
    $data['kost'] = $kostModel->find($id);
    return view('kost/detail', $data);
  }

  public function create()
  {
    return view('kost/create');
  }

  public function save()
  {
    $kostModel = new Kost();
    $data      = [
      'id_user'        => session()->get('id_user'),
      'nama_kost'      => $this->request->getPost('nama_kost'),
      'alamat_kost'    => $this->request->getPost('alamat_kost'),
      'harga_kost'     => $this->request->getPost('harga_kost'),
      'deskripsi_kost' => $this->request->getPost('deskripsi_kost'),
    ];
    $kostModel->save($data);

    return redirect()->to('/kost');
  }

  public function uploadGambar($id)
  {
    // Upload foto kost berdasarkan id kost
  }
}
