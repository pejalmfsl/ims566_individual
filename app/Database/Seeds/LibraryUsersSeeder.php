<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LibraryUsersSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('library_users')->insert([
            'username' => 'admin',
            'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
            'full_name' => 'System Administrator',
            'role' => 'Administrator',
            'status' => 'Active',
        ]);
    }
}
