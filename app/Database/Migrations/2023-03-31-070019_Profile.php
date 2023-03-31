<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profile extends Migration
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
        'full_name' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
            'null' => true,

        ],
        'profile_pic' => [
            'type' => 'VARCHAR',
            'null' => true,
            'constraint' => '255',
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
    $this->forge->createTable('profile');
    }

    public function down()
    {
        $this->forge->dropTable('profile');
    }
}
