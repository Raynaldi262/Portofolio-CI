<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'profile';
    protected $allowedFields = ['nama', 'tgl_lahir', 'photo', 'phone', 'city', 'degree', 'email', 'username', 'password'];

    public function editProfile($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function saveProfile($data)
    {
        $hasil = $this->db->table($this->table)->insert($data);
        return $hasil;
    }

    public function editE($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
}
