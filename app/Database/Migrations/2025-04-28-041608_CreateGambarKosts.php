<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGambarKosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gambar'   => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'id_kost'     => ['type' => 'INT', 'unsigned' => true],
            'path_gambar' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'  => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'  => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id_gambar', true);
        $this->forge->addForeignKey('id_kost', 'kost', 'id_kost', 'CASCADE', 'CASCADE');
        $this->forge->createTable('gambar_kost');
    }

    public function down()
    {
        $this->forge->dropTable('gambar_kost');
    }
}
