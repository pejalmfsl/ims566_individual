<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LibrarySeeder extends Seeder
{
    public function run()
    {
        $this->db->table('library_members')->insertBatch([
            [
                'member_code' => 'STU24001',
                'name' => 'Aina Safiya',
                'category' => 'Student',
                'unit' => 'Faculty of Information Management',
                'status' => 'Active',
            ],
            [
                'member_code' => 'STU24018',
                'name' => 'Muhammad Danish',
                'category' => 'Student',
                'unit' => 'Faculty of Computer Science',
                'status' => 'Active',
            ],
            [
                'member_code' => 'STF0104',
                'name' => 'Dr. Nur Hidayah',
                'category' => 'Staff',
                'unit' => 'Library Services',
                'status' => 'Active',
            ],
        ]);

        $this->db->table('library_books')->insertBatch([
            [
                'isbn' => '978-0132350884',
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'category' => 'Software Engineering',
                'status' => 'Available',
            ],
            [
                'isbn' => '978-1492078005',
                'title' => 'Designing Data-Intensive Applications',
                'author' => 'Martin Kleppmann',
                'category' => 'Databases',
                'status' => 'Borrowed',
            ],
            [
                'isbn' => '978-0134757599',
                'title' => 'Effective Java',
                'author' => 'Joshua Bloch',
                'category' => 'Programming',
                'status' => 'Reserved',
            ],
        ]);
    }
}
