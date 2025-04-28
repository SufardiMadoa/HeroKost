<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFasilitasKosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_fasilitas_kost' => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'id_kost'           => ['type' => 'INT', 'unsigned' => true],
            'id_fasilitas'      => ['type' => 'INT', 'unsigned' => true],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id_fasilitas_kost', true);
        $this->forge->addForeignKey('id_kost', 'kost', 'id_kost', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_fasilitas', 'fasilitas', 'id_fasilitas', 'CASCADE', 'CASCADE');
        $this->forge->createTable('fasilitas_kost');
    }

    public function down()
    {
        $this->forge->dropTable('fasilitas_kost');
    }
}
