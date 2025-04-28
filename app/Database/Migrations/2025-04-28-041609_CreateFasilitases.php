<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFasilitases extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_fasilitas'   => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'nama_fasilitas' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'     => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'     => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id_fasilitas', true);
        $this->forge->createTable('fasilitas');
    }

    public function down()
    {
        $this->forge->dropTable('fasilitas');
    }
}
