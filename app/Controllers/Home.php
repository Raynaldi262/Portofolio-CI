<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\TypedModel;

class Home extends BaseController

{
    protected $profile;
    protected $typed;
    public function __construct()
    {
        $this->profile = new HomeModel();
        $this->typed = new TypedModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'hasil' => $this->profile->first(),
            'kata' => $this->typed->findAll()
        ];


        // var_dump($data);
        echo view('index', $data);
    }
}
