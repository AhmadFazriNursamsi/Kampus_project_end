<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matkul extends Migration
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
            'jenis_matkul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tgl_matkul' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ], 
            'kd_dosen' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ], 
            'kd_mtk' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ], 
             'sks' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'no_ruang' => [
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
        $this->forge->createTable('matkul');

    }

    public function down()
    {
        $this->forge->dropTable('matkul');
    }

}
