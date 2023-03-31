<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
            'email_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ], 
            'phone_number' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ], 
            'user_name' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '255',
            ], 
             'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'tokens' => [
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
        $this->forge->createTable('users');

    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
