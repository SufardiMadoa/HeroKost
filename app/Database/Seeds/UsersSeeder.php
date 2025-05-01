<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_user'       => 'Admin',
            'email_user'      => 'admin123@gmail.com',
            'kata_sandi_user' => password_hash('admin123', PASSWORD_DEFAULT),
            'role'            => 'admin',
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}
