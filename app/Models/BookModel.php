<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'library_books';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'isbn',
        'title',
        'author',
        'category',
        'status',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
