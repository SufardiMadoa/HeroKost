<?php

namespace App\Controllers;

use App\Models\Pembayaran;

class PembayaranController extends BaseController
{
  protected $pembayaranModel;
  protected $db;

  public function __construct()
  {
    $this->pembayaranModel = new Pembayaran();
    $this->db              = \Config\Database::connect();
  }

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

    return redirect()->to('/riwayat-pembayaran');
  }

  public function pelanggan()
  {
    $builder = $this->db->table('pembayaran');
    $builder->select('pembayaran.*, kost.nama_kost, users.nama_user');
    $builder->join('kost', 'pembayaran.id_kost = kost.id_kost');
    $builder->join('users', 'pembayaran.id_user = users.id_user');
    $query = $builder->get();

    $data = [
      'title'      => 'Daftar Pembayaran',
      'pembayaran' => $query->getResultArray()
    ];
    return view('pages/admin/pelanggan/index', $data);
  }

  public function edit($id = null)
  {
    if ($id === null) {
      return redirect()->to('/pembayaran')->with('error', 'ID Pembayaran tidak ditemukan');
    }

    $pembayaran = $this->pembayaranModel->find($id);

    if (!$pembayaran) {
      return redirect()->to('/pembayaran')->with('error', 'Pembayaran dengan ID: ' . $id . ' tidak ditemukan');
    }

    $data = [
      'title'      => 'Update Status Pembayaran',
      'pembayaran' => $pembayaran
    ];

    return view('pembayaran/edit', $data);
  }

  /**
   * Update payment status
   *
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function updateStatus()
  {
    $id     = $this->request->getPost('id_pembayaran');
    $status = $this->request->getPost('status_pembayaran');

    // Prepare JSON response
    $response = [
      'success' => false,
      'message' => ''
    ];

    // Validate if ID is provided
    if ($id === null) {
      $response['message'] = 'ID Pembayaran diperlukan';
      return $this->response->setJSON($response);
    }

    // Validate if payment exists
    $pembayaran = $this->pembayaranModel->find($id);
    if (!$pembayaran) {
      $response['message'] = 'Pembayaran dengan ID: ' . $id . ' tidak ditemukan';
      return $this->response->setJSON($response);
    }

    // Validate status field
    if (empty($status)) {
      $response['message'] = 'Status pembayaran diperlukan';
      return $this->response->setJSON($response);
    }

    // Valid status values
    $validStatuses = ['Pending', 'Sukses', 'Ditolak'];

    if (!in_array($status, $validStatuses)) {
      $response['message'] = 'Status tidak valid. Nilai yang diperbolehkan: ' . implode(', ', $validStatuses);
      return $this->response->setJSON($response);
    }

    // Update the status
    $data = [
      'status_pembayaran' => $status,
      'updated_at'        => date('Y-m-d H:i:s')
    ];

    if ($this->pembayaranModel->update($id, $data)) {
      $response['success'] = true;
      $response['message'] = 'Status pembayaran berhasil diperbarui';
      return $this->response->setJSON($response);
    } else {
      $response['message'] = 'Gagal memperbarui status pembayaran';
      return $this->response->setJSON($response);
    }
  }
}
