<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user_detail'  => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'id_user'         => ['type' => 'INT', 'unsigned' => true],
            'alamat_user'     => ['type' => 'TEXT', 'null' => true],
            'no_telepon_user' => ['type' => 'VARCHAR', 'constraint' => 20],
            'foto_user'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'informasi_lain'  => ['type' => 'TEXT', 'null' => true],
            'created_at'      => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'      => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id_user_detail', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_detail');
    }

    public function down()
    {
        $this->forge->dropTable('user_detail');
    }
}
