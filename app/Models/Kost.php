<?php

namespace App\Models;

use CodeIgniter\Model;

class Kost extends Model
{
    protected $table            = 'kost';
    protected $primaryKey       = 'id_kost';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'id_user', 'nama_kost', 'alamat_kost', 'harga_kost', 'deskripsi_kost', 'created_at', 'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected array $casts            = [];
    protected array $castHandlers     = [];
    // Dates
    protected $useTimestamps          = false;
    protected $dateFormat             = 'datetime';
    protected $createdField           = 'created_at';
    protected $updatedField           = 'updated_at';
    protected $deletedField           = 'deleted_at';
    // Validation
    protected $validationRules        = [];
    protected $validationMessages     = [];
    protected $skipValidation         = false;
    protected $cleanValidationRules   = true;
    // Callbacks
    protected $allowCallbacks         = true;
    protected $beforeInsert           = [];
    protected $afterInsert            = [];
    protected $beforeUpdate           = [];
    protected $afterUpdate            = [];
    protected $beforeFind             = [];
    protected $afterFind              = [];
    protected $beforeDelete           = [];
    protected $afterDelete            = [];

    public function getGambar($id_kost)
    {
        $gambarModel = new GambarKost();
        return $gambarModel->where('id_kost', $id_kost)->findAll();
    }

    /**
     * Mendapatkan gambar utama kost (gambar pertama)
     */
    public function getGambarUtama($id_kost)
    {
        $gambarModel = new GambarKost();
        return $gambarModel->where('id_kost', $id_kost)->orderBy('id_gambar', 'ASC')->first();
    }

    /**
     * Mendapatkan semua fasilitas terkait dengan kost
     */
    public function getFasilitas($id_kost)
    {
        $db = \Config\Database::connect();
        return $db
            ->table('fasilitas_kost')
            ->select('fasilitas.id_fasilitas, fasilitas.nama_fasilitas')
            ->join('fasilitas', 'fasilitas.id_fasilitas = fasilitas_kost.id_fasilitas')
            ->where('fasilitas_kost.id_kost', $id_kost)
            ->get()
            ->getResultArray();
    }

    /**
     * Menghitung jumlah fasilitas yang dimiliki kost
     */
    public function countFasilitas($id_kost)
    {
        $fasilitasModel = new FasilitasKost();
        return $fasilitasModel->where('id_kost', $id_kost)->countAllResults();
    }
}
