<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\HomeModel;

class Contact extends BaseController

{
    protected $profile;
    protected $kontak;
    public function __construct()
    {
        $this->profile = new HomeModel();
        $this->kontak = new ContactModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'hasil' => $this->profile->first(),
            'kontak' => $this->kontak->first()
        ];


        // var_dump($data);
        echo view('contact', $data);
    }
}
