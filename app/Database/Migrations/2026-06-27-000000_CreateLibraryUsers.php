<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLibraryUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'password_hash' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'full_name' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'Administrator',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Active', 'Inactive'],
                'default' => 'Active',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('library_users');
    }

    public function down()
    {
        $this->forge->dropTable('library_users');
    }
}
