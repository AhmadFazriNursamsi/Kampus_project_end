<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absensi extends Migration
{
    public function up()
    {  
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'id_matkul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kd_mtk' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ], 
            'meet_matkul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'rangkuman' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'berita' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'status_absen' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'status_hadir' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],

            'tgl_absen' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],

            'created_at' => [
                'type' => 'timestamptz',
                'null' => true,
                'constraint' => '255',
            ],
            'updated_at' => [
                'type' => 'timestamptz',
                'null' => true,
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('absensis');
    }

    public function down()
    {
        $this->forge->dropTable('absensis');

    }
}
