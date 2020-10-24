<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table      = 'job';
    protected $allowedFields = ['dari', 'sampai', 'alamat', 'konten'];
}
