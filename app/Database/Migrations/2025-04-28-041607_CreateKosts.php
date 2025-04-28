<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kost'        => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'id_user'        => ['type' => 'INT', 'unsigned' => true],
            'nama_kost'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'alamat_kost'    => ['type' => 'TEXT'],
            'harga_kost'     => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'deskripsi_kost' => ['type' => 'TEXT', 'null' => true],
            'created_at'     => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'     => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id_kost', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kost');
    }

    public function down()
    {
        $this->forge->dropTable('kost');
    }
}
