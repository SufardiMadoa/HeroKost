<?php

namespace App\Controllers;

use App\Models\Pembayaran;

class PembayaranController extends BaseController
{
  public function formBayar($id_kost)
  {
    return view('pembayaran/form', ['id_kost' => $id_kost]);
  }

  public function bayar()
  {
    $model = new Pembayaran();

    $bukti = $this->request->getFile('bukti_pembayaran');
    $bukti->move('uploads/bukti');

    $data = [
      'id_user'           => session()->get('id_user'),
      'id_kost'           => $this->request->getPost('id_kost'),
      'jumlah_bayar'      => $this->request->getPost('jumlah_bayar'),
      'tanggal_bayar'     => date('Y-m-d'),
      'bukti_pembayaran'  => $bukti->getName(),
      'status_pembayaran' => 'Pending',
    ];

    $model->save($data);

    return redirect()->to('/user/history');
  }


  public function pelanggan(){

    // $model = new Pembayaran();

    // $bukti = $this->request->getFile('bukti_pembayaran');
    // // $bukti->move('uploads/bukti');

    // $data = [
    //   'id_user'           => session()->get('id_user'),
    //   'id_kost'           => $this->request->getPost('id_kost'),
    //   'jumlah_bayar'      => $this->request->getPost('jumlah_bayar'),
    //   'tanggal_bayar'     => date('Y-m-d'),
    //   // 'bukti_pembayaran'  => $bukti->getName(),
    //   'status_pembayaran' => 'Pending',
    // ];

    // $model->save($data);

    return view('pages/admin/pelanggan/index');
}
}