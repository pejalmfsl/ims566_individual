<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLibraryBooks extends Migration
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
            'isbn' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Available', 'Borrowed', 'Reserved', 'Overdue'],
                'default' => 'Available',
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
        $this->forge->addUniqueKey('isbn');
        $this->forge->createTable('library_books');
    }

    public function down()
    {
        $this->forge->dropTable('library_books');
    }
}
