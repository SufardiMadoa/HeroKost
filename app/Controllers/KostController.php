<?php

namespace App\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasKost;
use App\Models\GambarKost;
use App\Models\Kost;
use App\Models\KostDetailTambahan;
use CodeIgniter\RESTful\ResourceController;

class KostController extends ResourceController
{
  protected $kostModel;
  protected $gambarKostModel;
  protected $fasilitasKostModel;
  protected $kostDetailTambahanModel;
  protected $fasilitasModel;

  public function __construct()
  {
    $this->kostModel               = new Kost();
    $this->gambarKostModel         = new GambarKost();
    $this->fasilitasKostModel      = new FasilitasKost();
    $this->fasilitasModel          = new Fasilitas();
    $this->kostDetailTambahanModel = new KostDetailTambahan();
  }

  private function getGambarUtama($id_kost)
  {
    $gambarModel = new \App\Models\GambarKost();  // pastikan namespace-nya benar
    return $gambarModel->where('id_kost', $id_kost)->orderBy('id_gambar', 'ASC')->first();
  }

  // Display list of all kosts (READ)
  public function index()
  {
    $kosts           = $this->kostModel->findAll();
    $kostsWithGambar = [];

    foreach ($kosts as $kost) {
      $kost['gambar_utama'] = $this->getGambarUtama($kost['id_kost']);
      $kostsWithGambar[]    = $kost;
    }
    $data = [
      'title' => 'Kelola Daftar Kost',
      'kosts' => $kostsWithGambar
    ];

    return view('pages/admin/kost/index', $data);
  }

  public function showthreeitem()
  {
    $kosts = $this->kostModel->orderBy('created_at', 'DESC')->limit(3)->find();

    // Ambil gambar utama untuk setiap kost
    foreach ($kosts as &$kost) {
      $kost['gambar_utama'] = $this->kostModel->getGambarUtama($kost['id_kost']);
      $kost['fasilitas']    = $this->kostModel->getFasilitas($kost['id_kost']);
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

    $kosts = $this->kostModel->where('status', 'ready')->findAll();

    // Ambil gambar utama dan fasilitas untuk setiap kost
    foreach ($kosts as &$kost) {
      $kost['gambar_utama'] = $this->kostModel->getGambarUtama($kost['id_kost']);
      $kost['fasilitas']    = $this->kostModel->getFasilitas($kost['id_kost']);
    }

    $data = [
      'title'       => 'Semua Daftar Kost',
      'kosts'       => $kosts,
      'pager'       => $this->kostModel->pager,
      'currentPage' => $currentPage
    ];

    return view('/partials/navbar') . view('pages/user/rekomendasi', $data) . view('partials/footer');
  }

  /**
   * Menampilkan detail kost berdasarkan ID
   */
  public function detail($id = null)
  {
    $kost = $this->kostModel->find($id);

    if (!$kost) {
      return redirect()->to('/kost')->with('error', 'Data kost tidak ditemukan');
    }

    // Removed the owner verification check
    // Now any logged-in user can view the kost details

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

    return view('/partials/navbar') . view('pages/user/detailKost', $data) . view('partials/footer');
  }

  /**
   * Pencarian kost berdasarkan nama atau alamat
   */
  public function search()
  {
    $keyword = $this->request->getVar('keyword');

    if ($keyword) {
      $kosts = $this
        ->kostModel
        ->like('nama_kost', $keyword)
        ->orLike('alamat_kost', $keyword)
        ->paginate(10, 'kost');
    } else {
      $kosts = $this->kostModel->paginate(10, 'kost');
    }

    foreach ($kosts as &$kost) {
      $kost['gambar_utama'] = $this->kostModel->getGambarUtama($kost['id_kost']);
      $kost['fasilitas']    = $this->kostModel->getFasilitas($kost['id_kost']);
    }

    $data = [
      'title'   => 'Hasil Pencarian',
      'kosts'   => $kosts,
      'pager'   => $this->kostModel->pager,
      'keyword' => $keyword
    ];

    return view('pages/user/search', $data);
  }

  /**
   * Filter kost berdasarkan harga
   */
  public function filter()
  {
    // Get filter parameters
    $lokasi     = $this->request->getGet('lokasi');
    $jenis_kost = $this->request->getGet('jenis_kost');
    $harga      = $this->request->getGet('harga');
    $fasilitas  = $this->request->getGet('fasilitas');

    // Build query
    $builder = $this->kostModel->builder();
    $builder->select('kost.*');

    // Only show kosts with "ready" status
    $builder->where('status', 'ready');

    // Filter by location if specified
    if (!empty($lokasi)) {
      $builder->where('lokasi', $lokasi);
    }

    // Filter by kost type if specified
    if (!empty($jenis_kost)) {
      $builder->where('jenis', $jenis_kost);
    }

    // Filter by price if specified
    if (!empty($harga)) {
      switch ($harga) {
        case '<Rp. 500.000,-':
          $builder->where('harga_kost <', 500000);
          break;
        case '<Rp. 750.000,-':
          $builder->where('harga_kost <', 750000);
          break;
        case '<Rp. 1.000.000,-':
          $builder->where('harga_kost <', 1000000);
          break;
        case '<Rp. 1.250.000,-':
          $builder->where('harga_kost <', 1250000);
          break;
      }
    }

    // Handle legacy price filters if present
    $min_price = $this->request->getGet('min_price');
    $max_price = $this->request->getGet('max_price');

    if (!empty($min_price)) {
      $builder->where('harga_kost >=', $min_price);
    }

    if (!empty($max_price)) {
      $builder->where('harga_kost <=', $max_price);
    }

    // Filter by facilities if specified
    if (!empty($fasilitas) && is_array($fasilitas)) {
      // First, get all facility IDs by their names
      $facilityIds = [];
      foreach ($fasilitas as $facilityName) {
        $facility = $this->fasilitasModel->where('nama_fasilitas', $facilityName)->first();
        if ($facility) {
          $facilityIds[] = $facility['id_fasilitas'];
        }
      }

      // Then, get all kost IDs that have ALL the specified facilities
      $kostIds = [];
      $count   = count($facilityIds);

      if ($count > 0) {
        $db       = \Config\Database::connect();
        $subquery = $db
          ->table('fasilitas_kost')
          ->select('id_kost, COUNT(id_fasilitas) as matched_count')
          ->whereIn('id_fasilitas', $facilityIds)
          ->groupBy('id_kost')
          ->having('matched_count', $count);

        $results = $subquery->get()->getResultArray();
        foreach ($results as $row) {
          $kostIds[] = $row['id_kost'];
        }

        if (!empty($kostIds)) {
          $builder->whereIn('id_kost', $kostIds);
        } else {
          // No kosts match the facilities, return empty result
          $data['kosts']  = [];
          $data['filter'] = [
            'lokasi'    => $lokasi,
            'jenis'     => $jenis_kost,
            'harga'     => $harga,
            'fasilitas' => $fasilitas
          ];
          return view('kost/filter_results', $data);
        }
      }
    }

    // Execute the query
    $kosts = $builder->get()->getResultArray();

    // Add additional data for each kost
    foreach ($kosts as &$kost) {
      $kost['gambar_utama']     = $this->kostModel->getGambarUtama($kost['id_kost']);
      $kost['fasilitas']        = $this->kostModel->getFasilitas($kost['id_kost']);
      $kost['jumlah_fasilitas'] = $this->kostModel->countFasilitas($kost['id_kost']);
    }

    // Prepare data for the view
    $data['kosts']  = $kosts;
    $data['filter'] = [
      'lokasi'     => $lokasi,
      'jenis_kost' => $jenis_kost,
      'harga'      => $harga,
      'fasilitas'  => $fasilitas
    ];

    return view('/partials/navbar') . view('pages/user/rekomendasi', $data) . view('partials/footer');
  }

  // public function filter()
  // {
  //   $minPrice = $this->request->getVar('min_price');
  //   $maxPrice = $this->request->getVar('max_price');

  //   $query = $this->kostModel;

  //   if ($minPrice) {
  //     $query = $query->where('harga_kost >=', $minPrice);
  //   }

  //   if ($maxPrice) {
  //     $query = $query->where('harga_kost <=', $maxPrice);
  //   }

  //   $data = [
  //     'title'     => 'Filter Kost',
  //     'kosts'     => $query->paginate(10, 'kost'),
  //     'pager'     => $this->kostModel->pager,
  //     'min_price' => $minPrice,
  //     'max_price' => $maxPrice
  //   ];

  //   return view('kost/list', $data);
  // }

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
    return redirect()->to('/admin/kost');
  }

  // Display form to edit kost (UPDATE form)
  public function edit($id = null)
  {
    $kostModel      = new Kost();
    $fasilitasModel = new Fasilitas();

    // Ambil data kost
    $kost = $kostModel->find($id);

    if (empty($kost)) {
      return redirect()->to('/admin/kost')->with('error', 'Kost tidak ditemukan');
    }

    // Ambil fasilitas kost
    $kost['fasilitas'] = $kostModel->getFasilitas($id);

    // Ambil gambar kost
    $kost['gambar'] = $kostModel->getGambar($id);

    // Ambil semua fasilitas untuk dipilih
    $fasilitas = $fasilitasModel->findAll();

    return view('pages/admin/kost/update', [
      'kost'      => $kost,
      'fasilitas' => $fasilitas
    ]);
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
