<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillModel extends Model
{
    protected $table      = 'skill';
    protected $allowedFields = ['skill', 'nilai'];
}
