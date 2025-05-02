<?php

namespace App\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasKost;
use App\Models\GambarKost;
use App\Models\Kost;
use App\Models\KostDetailTambahan;
use App\Models\Users;
use CodeIgniter\Controller;

class KostOwnerController extends Controller
{
  protected $usersModel;
  protected $kostModel;
  protected $fasilitasModel;
  protected $fasilitasKostModel;
  protected $kostDetailTambahanModel;
  protected $gambarKostModel;

  public function __construct()
  {
    $this->usersModel              = new Users();
    $this->kostModel               = new Kost();
    $this->fasilitasModel          = new Fasilitas();
    $this->fasilitasKostModel      = new FasilitasKost();
    $this->kostDetailTambahanModel = new KostDetailTambahan();
    $this->gambarKostModel         = new GambarKost();
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

  public function show($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    $kost = $this->kostModel->find($id);

    if (!$kost) {
      return redirect()->to('/kost')->with('error', 'Data kost tidak ditemukan');
    }

    // Verifikasi bahwa kost ini milik user yang login
    if ($kost['id_user'] != $userId) {
      return redirect()->to('/kost')->with('error', 'Anda tidak memiliki akses ke data kost ini');
    }

    // Ambil semua gambar kost
    $gambar = $this->gambarKostModel->where('id_kost', $id)->findAll();

    // Ambil fasilitas kost
    $fasilitasIds = $this->fasilitasKostModel->where('id_kost', $id)->findAll();
    $fasilitas    = [];

    foreach ($fasilitasIds as $fasilitasKost) {
      $fasilitasItem = $this->fasilitasModel->find($fasilitasKost['id_fasilitas']);
      if ($fasilitasItem) {
        $fasilitas[] = $fasilitasItem;
      }
    }

    // Ambil detail tambahan
    $detailTambahan = $this->kostDetailTambahanModel->where('kost_id', $id)->findAll();

    $data = [
      'title'          => 'Detail Kost',
      'kost'           => $kost,
      'gambar'         => $gambar,
      'fasilitas'      => $fasilitas,
      'detailTambahan' => $detailTambahan
    ];

    return view('pages/owner/detail', $data);
  }

  public function editKostOwner($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    $kost = $this->kostModel->find($id);

    if (!$kost) {
      return redirect()->to('/kost')->with('error', 'Data kost tidak ditemukan');
    }

    // Verifikasi bahwa kost ini milik user yang login
    if ($kost['id_user'] != $userId) {
      return redirect()->to('/kost')->with('error', 'Anda tidak memiliki akses ke data kost ini');
    }

    // Ambil semua fasilitas untuk checkbox
    $allFasilitas = $this->fasilitasModel->findAll();

    // Ambil fasilitas yang dimiliki kost ini
    $selectedFasilitas    = $this->fasilitasKostModel->where('id_kost', $id)->findAll();
    $selectedFasilitasIds = array_map(function ($item) {
      return $item['id_fasilitas'];
    }, $selectedFasilitas);

    // Ambil detail tambahan
    $detailTambahan = $this->kostDetailTambahanModel->where('kost_id', $id)->findAll();

    // Ambil gambar
    $gambar = $this->gambarKostModel->where('id_kost', $id)->findAll();

    $data = [
      'title'             => 'Edit Kost',
      'kost'              => $kost,
      'allFasilitas'      => $allFasilitas,
      'selectedFasilitas' => $selectedFasilitasIds,
      'detailTambahan'    => $detailTambahan,
      'gambar'            => $gambar
    ];

    return view('pages/owner/edit', $data);
  }

  // Proses update data
  public function updateKostOwner($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Verifikasi bahwa kost ini milik user yang login
    $kost = $this->kostModel->find($id);
    if (!$kost || $kost['id_user'] != $userId) {
      return redirect()->to('/kost')->with('error', 'Anda tidak memiliki akses ke data kost ini');
    }

    // Validate form input
    $rules = [
      'nama_kost'      => 'required|min_length[3]',
      'alamat_kost'    => 'required',
      'harga_kost'     => 'required|numeric',
      'deskripsi_kost' => 'required',
      'kontak'         => 'required',
      'jenis'          => 'required',
      'lokasi'         => 'required',
      'status'         => 'required',
      'fasilitas'      => 'required'
    ];

    // Validasi opsional untuk foto jika ada upload
    $files = $this->request->getFiles();
    if (!empty($files['foto_kost'][0]->getName())) {
      $rules['foto_kost'] = 'uploaded[foto_kost.0]|max_size[foto_kost.0,2048]|mime_in[foto_kost.0,image/jpg,image/jpeg,image/png]';
    }

    if (!$this->validate($rules)) {
      return redirect()->to('/pemilik/kost/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    }

    // Prepare data for update
    $data = [
      'nama_kost'      => $this->request->getPost('nama_kost'),
      'alamat_kost'    => $this->request->getPost('alamat_kost'),
      'harga_kost'     => $this->request->getPost('harga_kost'),
      'kontak'         => $this->request->getPost('kontak'),
      'jenis'          => $this->request->getPost('jenis'),
      'lokasi'         => $this->request->getPost('lokasi'),
      'status'         => $this->request->getPost('status'),
      'deskripsi_kost' => $this->request->getPost('deskripsi_kost'),
      'updated_at'     => date('Y-m-d H:i:s')
    ];

    // Update data kost
    $this->kostModel->update($id, $data);

    // Handle fasilitas kost - first delete existing then add new ones
    $this->fasilitasKostModel->where('id_kost', $id)->delete();

    $fasilitas = $this->request->getPost('fasilitas');
    if (is_array($fasilitas) && count($fasilitas) > 0) {
      foreach ($fasilitas as $idFasilitas) {
        $fasilitasData = [
          'id_kost'      => $id,
          'id_fasilitas' => $idFasilitas,
          'created_at'   => date('Y-m-d H:i:s'),
          'updated_at'   => date('Y-m-d H:i:s')
        ];
        $this->fasilitasKostModel->insert($fasilitasData);
      }
    }

    // Handle detail tambahan
    // First delete existing details
    $this->kostDetailTambahanModel->where('kost_id', $id)->delete();

    $detailLabels    = $this->request->getPost('detail_label');
    $detailDeskripsi = $this->request->getPost('detail_deskripsi');

    if (is_array($detailLabels) && is_array($detailDeskripsi) && count($detailLabels) > 0) {
      for ($i = 0; $i < count($detailLabels); $i++) {
        if (!empty($detailLabels[$i]) && !empty($detailDeskripsi[$i])) {
          $detailData = [
            'kost_id'    => $id,
            'label'      => $detailLabels[$i],
            'deskripsi'  => $detailDeskripsi[$i],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ];

          $this->kostDetailTambahanModel->insert($detailData);
        }
      }
    }

    // Handle new file uploads if any
    if (!empty($files['foto_kost'][0]->getName())) {
      $fileMultiple = $files['foto_kost'];

      foreach ($fileMultiple as $foto) {
        if ($foto->isValid() && !$foto->hasMoved()) {
          $newName = $foto->getRandomName();
          $foto->move(ROOTPATH . 'public/uploads/kost_fotos', $newName);

          $gambarData = [
            'id_kost'     => $id,
            'path_gambar' => 'uploads/kost_fotos/' . $newName,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
          ];

          $this->gambarKostModel->insert($gambarData);
        }
      }
    }

    session()->setFlashdata('success', 'Data kost berhasil diperbarui');
    return redirect()->to('/pemilik/kost');
  }

  // Hapus data kost
  public function deleteKostOwner($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Verifikasi bahwa kost ini milik user yang login
    $kost = $this->kostModel->find($id);
    if (!$kost || $kost['id_user'] != $userId) {
      return redirect()->to('/kost')->with('error', 'Anda tidak memiliki akses ke data kost ini');
    }
    // Hapus gambar terkait dari storage
    $gambar = $this->gambarKostModel->where('id_kost', $id)->findAll();
    foreach ($gambar as $g) {
      $path = ROOTPATH . 'public/' . $g['path_gambar'];
      if (file_exists($path)) {
        unlink($path);
      }
      $this->gambarKostModel->delete($g['id']);
    }

    // Hapus fasilitas kost terkait
    $this->fasilitasKostModel->where('id_kost', $id)->delete();

    // Hapus detail tambahan
    $this->kostDetailTambahanModel->where('kost_id', $id)->delete();

    // Hapus data kost
    $this->kostModel->delete($id);

    session()->setFlashdata('success', 'Data kost berhasil dihapus');
    return redirect()->to('/pemilik/kost');
  }

  // Hapus gambar kost
  public function deleteImage($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Ambil data gambar
    $gambar = $this->gambarKostModel->find($id);

    if (!$gambar) {
      return redirect()->back()->with('error', 'Gambar tidak ditemukan');
    }

    // Ambil data kost untuk verifikasi kepemilikan
    $kost = $this->kostModel->find($gambar['id_kost']);

    // Verifikasi bahwa kost ini milik user yang login
    if (!$kost || $kost['id_user'] != $userId) {
      return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus gambar ini');
    }

    // Hapus file dari storage
    $path = ROOTPATH . 'public/' . $gambar['path_gambar'];
    if (file_exists($path)) {
      unlink($path);
    }

    // Hapus data dari database
    $this->gambarKostModel->delete($id);

    return redirect()->back()->with('success', 'Gambar berhasil dihapus');
  }

  // Update status kost (ready/soldout)
  public function updateStatus()
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, berikan response error
    if (!$userId) {
      return $this->response->setJSON([
        'success' => false,
        'message' => 'Silakan login terlebih dahulu'
      ]);
    }

    $id     = $this->request->getPost('id');
    $status = $this->request->getPost('status');

    // Verifikasi bahwa kost ini milik user yang login
    $kost = $this->kostModel->find($id);
    if (!$kost || $kost['id_user'] != $userId) {
      return $this->response->setJSON([
        'success' => false,
        'message' => 'Anda tidak memiliki akses ke data kost ini'
      ]);
    }

    if (!$id || !$status) {
      return $this->response->setJSON([
        'success' => false,
        'message' => 'ID dan status diperlukan'
      ]);
    }

    $data = [
      'status'     => $status,
      'updated_at' => date('Y-m-d H:i:s')
    ];

    $updated = $this->kostModel->update($id, $data);

    return $this->response->setJSON([
      'success' => (bool) $updated,
      'message' => $updated ? 'Status berhasil diperbarui' : 'Gagal memperbarui status'
    ]);
  }

  public function showAll()
  {
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Filter kost berdasarkan id_user
    $data = [
      'title' => 'Daftar Kost Saya',
      'kosts' => $this->kostModel->where('id_user', $userId)->findAll(),
    ];

    // Ambil gambar pertama untuk setiap kost
    foreach ($data['kosts'] as &$kost) {
      $gambar            = $this->gambarKostModel->where('id_kost', $kost['id_kost'])->first();
      $kost['thumbnail'] = $gambar ? $gambar['path_gambar'] : 'uploads/kost_fotos/default.jpg';

      // Ambil fasilitas untuk setiap kost
      $fasilitasIds      = $this->fasilitasKostModel->where('id_kost', $kost['id_kost'])->findAll();
      $kost['fasilitas'] = [];

      foreach ($fasilitasIds as $fasilitasKost) {
        $fasilitas = $this->fasilitasModel->find($fasilitasKost['id_fasilitas']);
        if ($fasilitas) {
          $kost['fasilitas'][] = $fasilitas;
        }
      }
    }

    return view('pages/owner/index', $data);
  }

  /**
   * Tampilkan form untuk menambah pemilik kost
   */
  public function create()
  {
    // Validate form input
    $rules = [
      'nama_kost'      => 'required|min_length[3]',
      'alamat_kost'    => 'required',
      'harga_kost'     => 'required|numeric',
      'deskripsi_kost' => 'required',
      'kontak'         => 'required',
      'jenis'          => 'required',
      'lokasi'         => 'required',
      'status'         => 'required',
      'foto_kost'      => 'uploaded[foto_kost.0]|max_size[foto_kost.0,2048]|mime_in[foto_kost.0,image/jpg,image/jpeg,image/png]',
      'fasilitas'      => 'required'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to('/admin/kost/new')->withInput()->with('errors', $this->validator->getErrors());
    }

    // Prepare data for insertion
    $data = [
      'id_user'        => session()->get('id_user') ?? 1,
      'nama_kost'      => $this->request->getPost('nama_kost'),
      'alamat_kost'    => $this->request->getPost('alamat_kost'),
      'harga_kost'     => $this->request->getPost('harga_kost'),
      'kontak'         => $this->request->getPost('kontak'),
      'jenis'          => $this->request->getPost('jenis'),
      'lokasi'         => $this->request->getPost('lokasi'),
      'status'         => $this->request->getPost('status'),
      'deskripsi_kost' => $this->request->getPost('deskripsi_kost'),
      'created_at'     => date('Y-m-d H:i:s'),
      'updated_at'     => date('Y-m-d H:i:s')
    ];

    // Simpan data kost ke database
    $kostId = $this->kostModel->insert($data);

    // DEBUG: Log the kostId to make sure we have a valid ID
    log_message('debug', 'Kost ID created: ' . $kostId);

    // Handle fasilitas kost - checking for empty
    $fasilitas = $this->request->getPost('fasilitas');
    log_message('debug', 'Fasilitas data: ' . print_r($fasilitas, true));

    if (is_array($fasilitas) && count($fasilitas) > 0) {
      $fasilitasKostModel = new \App\Models\FasilitasKost();
      foreach ($fasilitas as $idFasilitas) {
        $fasilitasData = [
          'id_kost'      => $kostId,
          'id_fasilitas' => $idFasilitas,
          'created_at'   => date('Y-m-d H:i:s'),
          'updated_at'   => date('Y-m-d H:i:s')
        ];
        $fasilitasKostModel->insert($fasilitasData);

        // DEBUG: Log each fasilitas insertion
        log_message('debug', 'Inserting fasilitas: ' . print_r($fasilitasData, true));
      }
    } else {
      log_message('error', 'No facilities selected or facilities is not an array');
    }

    // Handle detail tambahan
    $detailLabels    = $this->request->getPost('detail_label');
    $detailDeskripsi = $this->request->getPost('detail_deskripsi');

    if (is_array($detailLabels) && is_array($detailDeskripsi) && count($detailLabels) > 0) {
      $kostDetailTambahanModel = new \App\Models\KostDetailTambahan();

      for ($i = 0; $i < count($detailLabels); $i++) {
        if (!empty($detailLabels[$i]) && !empty($detailDeskripsi[$i])) {
          $detailData = [
            'kost_id'    => $kostId,
            'label'      => $detailLabels[$i],
            'deskripsi'  => $detailDeskripsi[$i],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ];

          $kostDetailTambahanModel->insert($detailData);

          // DEBUG: Log each detail tambahan insertion
          log_message('debug', 'Inserting detail tambahan: ' . print_r($detailData, true));
        }
      }
    } else {
      log_message('info', 'No detail tambahan provided or not in proper format');
    }

    // Handle multiple file upload - improved checking
    $files = $this->request->getFiles();
    log_message('debug', 'Files structure: ' . print_r($files, true));

    if (isset($files['foto_kost'])) {
      $fileMultiple = $files['foto_kost'];

      // Make sure we're working with an array of files
      if (is_array($fileMultiple)) {
        $gambarKostModel = new \App\Models\GambarKost();

        // Debug info
        log_message('debug', 'Number of files found: ' . count($fileMultiple));

        foreach ($fileMultiple as $index => $foto) {
          // Verify this is a valid upload
          if ($foto->isValid() && !$foto->hasMoved()) {
            try {
              $newName = $foto->getRandomName();
              $foto->move(ROOTPATH . 'public/uploads/kost_fotos', $newName);

              $gambarData = [
                'id_kost'     => $kostId,
                'path_gambar' => 'uploads/kost_fotos/' . $newName,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
              ];

              $result = $gambarKostModel->insert($gambarData);

              // DEBUG: Log each successful image upload and DB insertion
              log_message('debug', 'Image #' . $index . ' uploaded: ' . $newName);
              log_message('debug', 'DB Insert result: ' . $result);
            } catch (\Exception $e) {
              // Log any errors during file upload
              log_message('error', 'Error uploading file #' . $index . ': ' . $e->getMessage());
            }
          } else {
            log_message('error', 'File at index ' . $index . ' is not valid or has moved. Is valid: '
              . ($foto->isValid() ? 'Yes' : 'No') . ', Has moved: ' . ($foto->hasMoved() ? 'Yes' : 'No'));
          }
        }
      } else {
        log_message('error', 'foto_kost is not an array of files');
      }
    } else {
      log_message('error', 'No files found in the request with name foto_kost');
    }

    // Set flash message and redirect
    session()->setFlashdata('success', 'Data kost, fasilitas, detail tambahan, dan gambar berhasil ditambahkan');
    session()->setFlashdata('success', 'Data kost, fasilitas, dan gambar berhasil ditambahkan');
    return redirect()->to('/pemilik/kost');
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
