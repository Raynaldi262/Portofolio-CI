<?php

namespace App\Models;

use CodeIgniter\Model;

class TypedModel extends Model
{
    protected $table      = 'typed';
    protected $allowedFields = ['kata'];
}
