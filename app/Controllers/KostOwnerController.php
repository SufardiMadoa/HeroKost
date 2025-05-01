<?php

namespace App\Controllers;

use App\Models\Kost;
use App\Models\Users;
use CodeIgniter\Controller;

class KostOwnerController extends Controller
{
  protected $usersModel;
  protected $kostModel;

  public function __construct()
  {
    $this->usersModel = new Users();
    $this->kostModel  = new Kost();
  }

  /**
   * Menampilkan daftar pemilik kost beserta kost yang dimiliki
   */
  public function index()
  {
    // Query untuk mendapatkan data pemilik kost dan kost yang dimiliki
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->select('users.id_user as id_pemilik_kost, users.nama_user as username, users.email_user as email, kost.id_kost, kost.nama_kost');
    $builder->join('kost', 'kost.id_user = users.id_user', 'left');
    $builder->where('users.role', 'pemilik');  // Filter hanya pemilik kost
    $query                = $builder->get();
    $data['pemilik_kost'] = $query->getResultArray();

    return view('pages/admin/owner/index', $data);
  }

  /**
   * Tampilkan form untuk menambah pemilik kost
   */
  public function create()
  {
    return view('admin/tambah_pemilik_kost');
  }

  /**
   * Proses penambahan pemilik kost
   */
  public function store()
  {
    $validation = \Config\Services::validation();

    $rules = [
      'nama_user'       => 'required|min_length[3]',
      'email_user'      => 'required|valid_email|is_unique[users.email_user]',
      'kata_sandi_user' => 'required|min_length[6]',
      'no_telepon_user' => 'required|numeric',
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Data untuk tabel users
    $userData = [
      'nama_user'       => $this->request->getPost('nama_user'),
      'email_user'      => $this->request->getPost('email_user'),
      'kata_sandi_user' => password_hash($this->request->getPost('kata_sandi_user'), PASSWORD_DEFAULT),
      'no_telepon_user' => $this->request->getPost('no_telepon_user'),
      'role'            => 'pemilik',
      'created_at'      => date('Y-m-d H:i:s'),
    ];

    // Simpan ke database
    $this->usersModel->insert($userData);

    // Jika ada informasi kost yang dimasukkan
    if ($this->request->getPost('nama_kost')) {
      $userId = $this->usersModel->getInsertID();

      $kostData = [
        'id_user'        => $userId,
        'nama_kost'      => $this->request->getPost('nama_kost'),
        'alamat_kost'    => $this->request->getPost('alamat_kost') ?? '',
        'harga_kost'     => $this->request->getPost('harga_kost') ?? 0,
        'lokasi'         => $this->request->getPost('lokasi') ?? '',
        'kontak'         => $this->request->getPost('kontak') ?? '',
        'deskripsi_kost' => $this->request->getPost('deskripsi_kost') ?? '',
        'created_at'     => date('Y-m-d H:i:s'),
      ];

      $this->kostModel->insert($kostData);
    }

    return redirect()->to('/admin/pemilik-kost')->with('message', 'Pemilik kost berhasil ditambahkan');
  }

  /**
   * Tampilkan form untuk mengedit pemilik kost
   */
  public function edit($id)
  {
    $data['user'] = $this->usersModel->find($id);

    if (!$data['user']) {
      return redirect()->to('/admin/pemilik-kost')->with('error', 'Pemilik kost tidak ditemukan');
    }

    // Ambil data kost yang dimiliki oleh user ini
    $data['kost'] = $this->kostModel->where('id_user', $id)->findAll();

    return view('admin/edit_pemilik_kost', $data);
  }

  /**
   * Proses update data pemilik kost
   */
  public function update($id)
  {
    $validation = \Config\Services::validation();

    $rules = [
      'nama_user'       => 'required|min_length[3]',
      'email_user'      => 'required|valid_email',
      'no_telepon_user' => 'required|numeric',
    ];

    // Cek apakah email berubah, jika ya, pastikan unik
    $user = $this->usersModel->find($id);
    if ($user['email_user'] != $this->request->getPost('email_user')) {
      $rules['email_user'] .= '|is_unique[users.email_user]';
    }

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Data untuk update user
    $userData = [
      'nama_user'       => $this->request->getPost('nama_user'),
      'email_user'      => $this->request->getPost('email_user'),
      'no_telepon_user' => $this->request->getPost('no_telepon_user'),
      'updated_at'      => date('Y-m-d H:i:s'),
    ];

    // Jika password diubah
    if ($this->request->getPost('kata_sandi_user')) {
      $userData['kata_sandi_user'] = password_hash($this->request->getPost('kata_sandi_user'), PASSWORD_DEFAULT);
    }

    // Update data user
    $this->usersModel->update($id, $userData);

    return redirect()->to('/admin/pemilik-kost')->with('message', 'Data pemilik kost berhasil diperbarui');
  }

  /**
   * Hapus pemilik kost
   */
  public function delete($id)
  {
    // Cek apakah pemilik memiliki kost
    $kost = $this->kostModel->where('id_user', $id)->findAll();

    if (!empty($kost)) {
      // Jika ada kost terkait, hapus kost terlebih dahulu
      foreach ($kost as $k) {
        $this->kostModel->delete($k['id_kost']);
      }
    }

    // Hapus user
    $this->usersModel->delete($id);

    return redirect()->to('/admin/pemilik-kost')->with('message', 'Pemilik kost berhasil dihapus');
  }

  /**
   * Lihat detail kost yang dimiliki
   */
  public function viewKost($id)
  {
    $data['kost'] = $this->kostModel->getKostWithOwner($id);

    if (!$data['kost']) {
      return redirect()->to('/admin/pemilik-kost')->with('error', 'Kost tidak ditemukan');
    }

    // Ambil fasilitas dan gambar kost
    $data['fasilitas'] = $this->kostModel->getFasilitas($id);
    $data['gambar']    = $this->kostModel->getGambar($id);

    return view('admin/detail_kost', $data);
  }
}
