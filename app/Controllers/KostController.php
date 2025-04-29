<?php

namespace App\Controllers;

use App\Models\FasilitasKost;
use App\Models\GambarKost;
use App\Models\Kost;
use CodeIgniter\RESTful\ResourceController;

class KostController extends ResourceController
{
  protected $kostModel;
  protected $gambarKostModel;
  protected $fasilitasKostModel;

  public function __construct()
  {
    $this->kostModel          = new Kost();
    $this->gambarKostModel    = new GambarKost();
    $this->fasilitasKostModel = new FasilitasKost();
  }

  // Display list of all kosts (READ)
  public function index()
  {
    $data = [
      'title' => 'Kelola Daftar Kost',
      'kosts' => $this->kostModel->findAll()
    ];

    return view('pages/admin/kost/index', $data);
  }

  public function showthreeitem()
  {
    $kosts = $this->kostModel->orderBy('created_at', 'DESC')->limit(3)->find();

    // Ambil gambar utama untuk setiap kost
    foreach ($kosts as &$kost) {
      $kost['gambar_utama']     = $this->kostModel->getGambarUtama($kost['id_kost']);
      $kost['jumlah_fasilitas'] = $this->kostModel->countFasilitas($kost['id_kost']);
    }

    $data = [
      'title' => 'Daftar Kost Terbaru',
      'kosts' => $kosts
    ];

    return view('/partials/navbar') . view('pages/user/beranda', $data) . view('partials/footer');
  }

  public function listAll()
  {
    $currentPage = $this->request->getVar('page_kost') ? $this->request->getVar('page_kost') : 1;

    $kosts = $this->kostModel->paginate(10, 'kost');

    // Ambil gambar utama dan fasilitas untuk setiap kost
    foreach ($kosts as &$kost) {
      $kost['gambar_utama']     = $this->kostModel->getGambarUtama($kost['id_kost']);
      $kost['jumlah_fasilitas'] = $this->kostModel->countFasilitas($kost['id_kost']);
    }

    $data = [
      'title'       => 'Semua Daftar Kost',
      'kosts'       => $kosts,
      'pager'       => $this->kostModel->pager,
      'currentPage' => $currentPage
    ];

    return view('pages/user/rekomendasi', $data);
  }

  /**
   * Menampilkan detail kost berdasarkan ID
   */
  public function detail($id = null)
  {
    $kost = $this->kostModel->find($id);

    // Jika kost tidak ditemukan
    if (!$kost) {
      return redirect()->to('/kost')->with('error', 'Data kost tidak ditemukan');
    }

    // Mengambil data gambar kost
    $gambarKost = $this->kostModel->getGambar($id);

    // Mengambil data fasilitas kost
    $fasilitasKost = $this->kostModel->getFasilitas($id);

    $data = [
      'title'         => 'Detail Kost',
      'kost'          => $kost,
      'gambarKost'    => $gambarKost,
      'fasilitasKost' => $fasilitasKost
    ];

    return view('pages/user/detail', $data);
  }

  /**
   * Pencarian kost berdasarkan nama atau alamat
   */
  public function search()
  {
    $keyword = $this->request->getVar('keyword');

    if ($keyword) {
      $result = $this
        ->kostModel
        ->like('nama_kost', $keyword)
        ->orLike('alamat_kost', $keyword)
        ->paginate(10, 'kost');
    } else {
      $result = $this->kostModel->paginate(10, 'kost');
    }

    $data = [
      'title'   => 'Hasil Pencarian',
      'kosts'   => $result,
      'pager'   => $this->kostModel->pager,
      'keyword' => $keyword
    ];

    return view('kost/list', $data);
  }

  /**
   * Filter kost berdasarkan harga
   */
  public function filter()
  {
    $minPrice = $this->request->getVar('min_price');
    $maxPrice = $this->request->getVar('max_price');

    $query = $this->kostModel;

    if ($minPrice) {
      $query = $query->where('harga_kost >=', $minPrice);
    }

    if ($maxPrice) {
      $query = $query->where('harga_kost <=', $maxPrice);
    }

    $data = [
      'title'     => 'Filter Kost',
      'kosts'     => $query->paginate(10, 'kost'),
      'pager'     => $this->kostModel->pager,
      'min_price' => $minPrice,
      'max_price' => $maxPrice
    ];

    return view('kost/list', $data);
  }

  // Display form to add new kost (CREATE form)
  public function new()
  {
    // Load the facilities model to get all available facilities
    $fasilitasModel = new \App\Models\Fasilitas();

    $data = [
      'title'     => 'Tambah Data Kost',
      'fasilitas' => $fasilitasModel->findAll()  // Get all facilities
    ];

    return view('pages/admin/kost/add', $data);
  }

  // Process the form submission to add new kost (CREATE process)

  // Updated controller method - with debug statements
  public function create()
  {
    // Validate form input
    $rules = [
      'nama_kost'      => 'required|min_length[3]',
      'alamat_kost'    => 'required',
      'harga_kost'     => 'required|numeric',
      'deskripsi_kost' => 'required',
      'jenis'          => 'required',
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
      'jenis'          => $this->request->getPost('jenis'),
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

    // Handle multiple file upload - improved checking
    $files = $this->request->getFileMultiple('foto_kost');
    log_message('debug', 'Files found: ' . (is_array($files) ? count($files) : 'none'));

    if (is_array($files) && count($files) > 0) {
      $gambarKostModel = new \App\Models\GambarKost();

      foreach ($files as $index => $foto) {
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

            $gambarKostModel->insert($gambarData);

            // DEBUG: Log each successful image upload
            log_message('debug', 'Image uploaded: ' . $newName);
          } catch (\Exception $e) {
            // Log any errors during file upload
            log_message('error', 'Error uploading file: ' . $e->getMessage());
          }
        } else {
          log_message('error', 'File at index ' . $index . ' is not valid or has moved');
        }
      }
    } else {
      log_message('error', 'No files uploaded or files are not in expected format');
    }

    // Set flash message and redirect
    session()->setFlashdata('success', 'Data kost, fasilitas, dan gambar berhasil ditambahkan');
    return redirect()->to('/admin/kost');
  }

  // Display form to edit kost (UPDATE form)
  public function edit($id = null)
  {
    // Find the kost by ID
    $kost = $this->kostModel->find($id);

    // If kost not found, show 404 error
    if (!$kost) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kost dengan ID ' . $id . ' tidak ditemukan');
    }

    $data = [
      'title' => 'Edit Data Kost',
      'kost'  => $kost
    ];

    return view('pages/admin/kost/update', $data);
  }

  // Process the form submission to update kost (UPDATE process)
  public function update($id = null)
  {
    // Validate form input
    $rules = [
      'nama_kost'      => 'required|min_length[3]',
      'alamat_kost'    => 'required',
      'harga_kost'     => 'required|numeric',
      'deskripsi_kost' => 'required'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to('/admin/kost/kost/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
    }

    // Prepare data for update
    $data = [
      'nama_kost'      => $this->request->getPost('nama_kost'),
      'alamat_kost'    => $this->request->getPost('alamat_kost'),
      'harga_kost'     => $this->request->getPost('harga_kost'),
      'deskripsi_kost' => $this->request->getPost('deskripsi_kost'),
      'updated_at'     => date('Y-m-d H:i:s')
    ];

    // Handle file upload if there's any
    $foto = $this->request->getFile('foto_kost');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
      // Delete old file first if exists
      $oldKost = $this->kostModel->find($id);
      if (!empty($oldKost['foto_kost']) && file_exists(ROOTPATH . 'public/uploads/' . $oldKost['foto_kost'])) {
        unlink(ROOTPATH . 'public/uploads/' . $oldKost['foto_kost']);
      }

      $newName = $foto->getRandomName();
      $foto->move(ROOTPATH . 'public/uploads', $newName);
      $data['foto_kost'] = $newName;
    }

    // Update data in database
    $this->kostModel->update($id, $data);

    // Set flash message and redirect
    session()->setFlashdata('success', 'Data kost berhasil diperbarui');
    return redirect()->to('/kost');
  }

  // Process deletion of kost (DELETE)
  public function delete($id = null)
  {
    // Find the kost by ID
    $kost = $this->kostModel->find($id);

    // If kost not found, show 404 error
    if (!$kost) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kost dengan ID ' . $id . ' tidak ditemukan');
    }

    // Delete the file if exists
    if (!empty($kost['foto_kost']) && file_exists(ROOTPATH . 'public/uploads/' . $kost['foto_kost'])) {
      unlink(ROOTPATH . 'public/uploads/' . $kost['foto_kost']);
    }

    // Delete data from database
    $this->kostModel->delete($id);

    // Set flash message and redirect
    session()->setFlashdata('success', 'Data kost berhasil dihapus');
    return redirect()->to('/admin/kost');
  }
}
