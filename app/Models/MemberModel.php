<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'library_members';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'member_code',
        'name',
        'category',
        'unit',
        'status',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
