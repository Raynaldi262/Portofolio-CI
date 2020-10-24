<?php

namespace App\Models;

use CodeIgniter\Model;

class EduModel extends Model
{
    protected $table      = 'education';
    protected $allowedFields = ['dari', 'sampai', 'alamat', 'konten'];
}
