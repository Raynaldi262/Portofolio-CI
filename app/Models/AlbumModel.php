<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table      = 'album';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'deskripsi', 'kategori', 'created_at'];

    public function getDetail($idd)
    {
        return $this->where(['id' => $idd])->first();
    }

    public function editAlbum($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function saveAlbum($data)
    {
        $hasil = $this->db->table($this->table)->insert($data);
        return $hasil;
    }
}
