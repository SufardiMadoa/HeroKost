<?php

namespace App\Controllers;

use App\Models\FasilitasKost;

class FasilitasController extends BaseController
{
  public function addFasilitas($id_kost)
  {
    return view('fasilitas/add', ['id_kost' => $id_kost]);
  }

  public function saveFasilitas()
  {
    $model = new FasilitasKost();
    $data  = [
      'id_kost'      => $this->request->getPost('id_kost'),
      'id_fasilitas' => $this->request->getPost('id_fasilitas'),
    ];
    $model->save($data);

    return redirect()->to('/kost');
  }
}
