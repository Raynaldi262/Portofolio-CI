<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Login extends BaseController

{

    protected $profile;
    public function __construct()
    {
        $this->profile = new HomeModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'hasil' => $this->profile->getProfile()
        ];

        echo view('admin/login', $data);
    }

    public function check()
    {

        $hasil = $this->profile->getProfile();
        if (strtolower($_POST["username"]) == strtolower($hasil['username']) && $_POST["pwd"] == $hasil['password']) {
            return redirect()->to('/admin');
        } else {
            session()->setFlashdata('pesan', 'Username / Password Salah');
            return redirect()->back();
        }
    }
}
