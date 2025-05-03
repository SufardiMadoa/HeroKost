<?php

namespace App\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasKost;
use App\Models\GambarKost;
use App\Models\Kost;
use App\Models\KostDetailTambahan;
use App\Models\Pembayaran;

class RiwayatPembayaranController extends BaseController
{
  protected $pembayaranModel;
  protected $kostModel;
  protected $gambarKostModel;
  protected $fasilitasKostModel;
  protected $fasilitasModel;
  protected $kostDetailTambahanModel;
  protected $db;

  public function __construct()
  {
    $this->pembayaranModel         = new Pembayaran();
    $this->kostModel               = new Kost();
    $this->gambarKostModel         = new GambarKost();
    $this->fasilitasKostModel      = new FasilitasKost();
    $this->fasilitasModel          = new Fasilitas();
    $this->kostDetailTambahanModel = new KostDetailTambahan();
    $this->db                      = \Config\Database::connect();
  }

  /**
   * Menampilkan daftar riwayat pembayaran berdasarkan user yang login
   */
  public function index()
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');
    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Query untuk mengambil riwayat pembayaran user yang login
    $builder = $this->db->table('pembayaran');
    $builder->select('pembayaran.*, kost.nama_kost, kost.alamat_kost, kost.harga_kost, kost.id_kost');
    $builder->join('kost', 'pembayaran.id_kost = kost.id_kost');
    $builder->where('pembayaran.id_user', $userId);
    $builder->orderBy('pembayaran.tanggal_bayar', 'DESC');
    $query = $builder->get();

    $data = [
      'title'      => 'Riwayat Pembayaran',
      'pembayaran' => $query->getResultArray()
    ];

    return view('partials/navbar') . view('pages/user/riwayat/index', $data) . view('partials/footer');
  }

  /**
   * Menampilkan detail riwayat pembayaran dan data kost
   *
   * @param int $id ID pembayaran
   * @return mixed
   */
  public function detail($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Query untuk mengambil detail pembayaran
    $builder = $this->db->table('pembayaran');
    $builder->select('pembayaran.*, kost.nama_kost, kost.alamat_kost, kost.harga_kost, kost.deskripsi_kost, kost.jenis, kost.id_kost');
    $builder->join('kost', 'pembayaran.id_kost = kost.id_kost');
    $builder->where('pembayaran.id_pembayaran', $id);
    $builder->where('pembayaran.id_user', $userId);  // Pastikan pembayaran milik user yang login
    $query = $builder->get();

    $pembayaran = $query->getRowArray();

    // Jika pembayaran tidak ditemukan atau bukan milik user yang login
    if (!$pembayaran) {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Data pembayaran tidak ditemukan');
    }

    // Ambil data kost
    $idKost = $pembayaran['id_kost'];
    $kost   = $this->kostModel->find($idKost);

    if (!$kost) {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Data kost tidak ditemukan');
    }

    // Ambil semua gambar kost
    $gambar = $this->gambarKostModel->where('id_kost', $idKost)->findAll();

    // Ambil fasilitas kost
    $fasilitasIds = $this->fasilitasKostModel->where('id_kost', $idKost)->findAll();
    $fasilitas    = [];

    foreach ($fasilitasIds as $fasilitasKost) {
      $fasilitasItem = $this->fasilitasModel->find($fasilitasKost['id_fasilitas']);
      if ($fasilitasItem) {
        $fasilitas[] = $fasilitasItem;
      }
    }

    // Ambil detail tambahan
    $detailTambahan = $this->kostDetailTambahanModel->where('kost_id', $idKost)->findAll();

    $data = [
      'title'          => 'Detail Pembayaran',
      'pembayaran'     => $pembayaran,
      'kost'           => $kost,
      'gambar'         => $gambar,
      'fasilitas'      => $fasilitas,
      'detailTambahan' => $detailTambahan
    ];

    return view('partials/navbar') . view('pages/user/riwayat/detail', $data) . view('partials/footer');
  }

  /**
   * Membatalkan pembayaran (hanya untuk status Pending)
   *
   * @param int $id ID pembayaran
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function batalkan($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Cari pembayaran
    $pembayaran = $this->pembayaranModel->find($id);

    // Validasi pembayaran
    if (!$pembayaran) {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Pembayaran tidak ditemukan');
    }

    // Cek apakah pembayaran milik user yang login
    if ($pembayaran['id_user'] != $userId) {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Anda tidak memiliki akses untuk membatalkan pembayaran ini');
    }

    // Cek apakah status masih Pending
    if ($pembayaran['status_pembayaran'] !== 'Pending') {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Hanya pembayaran dengan status Pending yang dapat dibatalkan');
    }

    // Update status menjadi Dibatalkan
    $data = [
      'status_pembayaran' => 'Dibatalkan',
      'updated_at'        => date('Y-m-d H:i:s')
    ];

    if ($this->pembayaranModel->update($id, $data)) {
      return redirect()->to('/riwayat-pembayaran')->with('success', 'Pembayaran berhasil dibatalkan');
    } else {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Gagal membatalkan pembayaran');
    }
  }

  /**
   * Menambahkan bukti pembayaran baru (jika sebelumnya ditolak)
   *
   * @param int $id ID pembayaran
   * @return mixed
   */
  public function updateBukti($id)
  {
    // Ambil ID user yang sedang login
    $userId = session()->get('id_user');

    // Jika tidak ada session user, redirect ke login
    if (!$userId) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Cari pembayaran
    $pembayaran = $this->pembayaranModel->find($id);

    // Validasi pembayaran
    if (!$pembayaran) {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Pembayaran tidak ditemukan');
    }

    // Cek apakah pembayaran milik user yang login
    if ($pembayaran['id_user'] != $userId) {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Anda tidak memiliki akses untuk memperbarui pembayaran ini');
    }

    // Cek apakah status Ditolak
    if ($pembayaran['status_pembayaran'] !== 'Ditolak') {
      return redirect()->to('/riwayat-pembayaran')->with('error', 'Hanya pembayaran dengan status Ditolak yang dapat diperbarui');
    }

    // Jika method GET, tampilkan form
    if ($this->request->getMethod() !== 'post') {
      $data = [
        'title'      => 'Update Bukti Pembayaran',
        'pembayaran' => $pembayaran
      ];

      return view('partials/navbar') . view('pages/user/riwayat/update_bukti', $data) . view('partials/footer');
    }

    // Jika method POST, proses update bukti
    $bukti = $this->request->getFile('bukti_pembayaran');

    // Validasi file
    if (!$bukti->isValid() || $bukti->hasMoved()) {
      return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan pada file');
    }

    // Hapus bukti lama jika ada
    $oldBukti = $pembayaran['bukti_pembayaran'];
    if (!empty($oldBukti) && file_exists('uploads/bukti/' . $oldBukti)) {
      unlink('uploads/bukti/' . $oldBukti);
    }

    // Upload bukti baru
    $bukti->move('uploads/bukti');

    // Update data pembayaran
    $data = [
      'bukti_pembayaran'  => $bukti->getName(),
      'status_pembayaran' => 'Pending',
      'updated_at'        => date('Y-m-d H:i:s')
    ];

    if ($this->pembayaranModel->update($id, $data)) {
      return redirect()->to('/riwayat-pembayaran')->with('success', 'Bukti pembayaran berhasil diperbarui');
    } else {
      return redirect()->back()->withInput()->with('error', 'Gagal memperbarui bukti pembayaran');
    }
  }
}
