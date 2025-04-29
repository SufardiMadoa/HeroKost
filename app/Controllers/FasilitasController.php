<?php

namespace App\Controllers;

use App\Models\Fasilitas;

class FasilitasController extends BaseController
{
  protected $fasilitasModel;

  public function __construct()
  {
    $this->fasilitasModel = new Fasilitas();
  }

  // Menampilkan daftar fasilitas
  public function index()
  {
    $fasilitas = $this->fasilitasModel->findAll();
    return view('pages/admin/fasilitas/index', ['fasilitas' => $fasilitas]);
  }

  // Menampilkan form tambah fasilitas
  public function create()
  {
    return view('pages/admin/fasilitas/add');
  }

  // Proses tambah fasilitas
  public function store()
  {
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
      'nama_fasilitas' => 'required|min_length[3]'
    ]);

    if (!$this->validate($validation->getRules())) {
      return redirect()->to('admin/fasilitas/create')->withInput()->with('errors', $this->validator->getErrors());
    }

    // Menyimpan data fasilitas
    $data = [
      'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
      'created_at'     => date('Y-m-d H:i:s'),
      'updated_at'     => date('Y-m-d H:i:s')
    ];

    $this->fasilitasModel->insert($data);

    // Mengarahkan kembali ke daftar fasilitas dengan pesan sukses
    session()->setFlashdata('success', 'Fasilitas berhasil ditambahkan');
    return redirect()->to('admin/fasilitas');
  }

  // Menampilkan form edit fasilitas
  public function edit($id)
  {
    $fasilitas = $this->fasilitasModel->find($id);
    if (!$fasilitas) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Fasilitas tidak ditemukan');
    }

    return view('pages/admin/fasilitas/update', ['fasilitas' => $fasilitas]);
  }

  // Proses update fasilitas
  public function update($id)
  {
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
      'nama_fasilitas' => 'required|min_length[3]'
    ]);

    if (!$this->validate($validation->getRules())) {
      return redirect()->to('admin/fasilitas/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    }

    // Update data fasilitas
    $data = [
      'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
      'updated_at'     => date('Y-m-d H:i:s')
    ];

    $this->fasilitasModel->update($id, $data);

    // Mengarahkan kembali ke daftar fasilitas dengan pesan sukses
    session()->setFlashdata('success', 'Fasilitas berhasil diupdate');
    return redirect()->to('admin/fasilitas');
  }

  // Menghapus fasilitas
  public function delete($id)
  {
    $this->fasilitasModel->delete($id);
    session()->setFlashdata('success', 'Fasilitas berhasil dihapus');
    return redirect()->to('admin/fasilitas');
  }
}
