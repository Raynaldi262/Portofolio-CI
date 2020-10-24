<?php

namespace App\Models;

use CodeIgniter\Model;

class HobiModel extends Model
{
    protected $table      = 'hobbies';
    protected $allowedFields = ['hobi', 'warna', 'sampul'];
}
