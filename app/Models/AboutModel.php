<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table      = 'profile';
    protected $useTimestamps = true;

    public function getProfile()
    {
        return $this->first();
    }
}
