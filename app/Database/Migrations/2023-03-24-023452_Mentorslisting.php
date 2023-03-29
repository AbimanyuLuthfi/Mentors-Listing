<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mentorslisting extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'uuid' => ['type' => 'VARCHAR', 'constraint' => 128],

            //Login/Register
            'email' => ['type' => 'VARCHAR','constraint' => 64,],
            'password' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],
            'role' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],
            'is_active' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],

            //Items
            'gambar' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],
            'bidang_keahlian' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],
            'deskripsi_profil' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],
            'waktu_tersedia' => ['type' => 'VARCHAR', 'constraint' => 64,'null' => true,],
            // Timestamps
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('uuid', false);
        $this->forge->createTable('mentors');
    }

    public function down()
    {
        $this->forge->dropTable('mentors');
    }
}
