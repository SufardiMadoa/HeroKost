<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'         => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'nama_user'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'email_user'      => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'kata_sandi_user' => ['type' => 'VARCHAR', 'constraint' => 255],
            'no_telepon_user' => ['type' => 'VARCHAR', 'constraint' => 20],
            'role'            => ['type' => 'ENUM', 'constraint' => ['pengguna', 'pemilik', 'admin']],
            'created_at'      => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'      => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
