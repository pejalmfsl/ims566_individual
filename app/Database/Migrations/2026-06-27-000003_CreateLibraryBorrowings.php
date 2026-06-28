<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLibraryBorrowings extends Migration
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
            'member_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'book_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'borrowed_at' => [
                'type' => 'DATETIME',
            ],
            'returned_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Borrowed', 'Returned', 'Overdue'],
                'default' => 'Borrowed',
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
        $this->forge->addKey('member_id');
        $this->forge->addKey('book_id');
        $this->forge->createTable('library_borrowings');
    }

    public function down()
    {
        $this->forge->dropTable('library_borrowings');
    }
}
