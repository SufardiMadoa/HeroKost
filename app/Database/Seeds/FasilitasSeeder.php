<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FasilitasSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama_fasilitas' => 'KM Dalam',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'KM Luar',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'Parkiran',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'Dapur',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'Kulkas',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'Jemuran',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'Mesin Cuci',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'AC',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => '24 jam',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'Water Heater',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
      [
        'nama_fasilitas' => 'Ruang Tamu',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
      ],
    ];

    // Insert data to table
    $this->db->table('fasilitas')->insertBatch($data);
  }
}
