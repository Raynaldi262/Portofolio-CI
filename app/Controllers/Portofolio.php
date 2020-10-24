<?php

namespace App\Controllers;

use App\Models\AlbumModel;
use App\Models\ProfileModel;

class Portofolio extends BaseController

{
    protected $album;
    protected $profile;
    public function __construct()
    {
        $this->album = new AlbumModel();
        $this->profile = new ProfileModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'hasil' => $this->profile->first(),
            'album' => $this->album->findAll(),
            // 'album' => $this->album->paginate(12, 'album'),
            'pager' => $this->album->pager
        ];


        // var_dump($data);
        echo view('portofolio', $data);
    }
}
