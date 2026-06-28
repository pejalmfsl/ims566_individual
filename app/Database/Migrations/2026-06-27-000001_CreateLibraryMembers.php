<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLibraryMembers extends Migration
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
            'member_code' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'category' => [
                'type' => 'ENUM',
                'constraint' => ['Student', 'Staff'],
            ],
            'unit' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Active', 'Pending', 'Overdue'],
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
        $this->forge->addUniqueKey('member_code');
        $this->forge->createTable('library_members');
    }

    public function down()
    {
        $this->forge->dropTable('library_members');
    }
}
