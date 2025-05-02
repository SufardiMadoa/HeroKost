<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKostDetailTambahan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'kost_id'    => ['type' => 'INT', 'unsigned' => true],
            'label'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'deskripsi'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kost_id', 'kost', 'id_kost', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kost_detail_tambahan');
    }

    public function down()
    {
        $this->forge->dropTable('kost_detail_tambahan');
    }
}
