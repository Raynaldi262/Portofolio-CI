<?php

namespace App\Models;

use CodeIgniter\Model;

class InterestModel extends Model
{
    protected $table      = 'interest';
    protected $allowedFields = ['interest', 'warna', 'sampul'];
}
