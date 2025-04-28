<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayarans extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran'     => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'id_user'           => ['type' => 'INT', 'unsigned' => true],
            'id_kost'           => ['type' => 'INT', 'unsigned' => true],
            'jumlah_bayar'      => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'tanggal_bayar'     => ['type' => 'DATE'],
            'bukti_pembayaran'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'status_pembayaran' => ['type' => 'ENUM', 'constraint' => ['Pending', 'Sukses', 'Ditolak']],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kost', 'kost', 'id_kost', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
