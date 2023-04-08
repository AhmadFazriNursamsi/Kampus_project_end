<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AbsensiUsers extends Migration
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
        $this->forge->createTable('absensis_teacher');
    }

    public function down()
    {
        $this->forge->dropTable('absensis_teacher');

    }
}
