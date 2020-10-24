<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\HobiModel;
use App\Models\InterestModel;
use App\Models\SkillModel;

class About extends BaseController

{
    protected $about;
    protected $skill;
    protected $interest;
    protected $hobbie;
    public function __construct()
    {
        $this->about = new AboutModel();
        $this->skill = new SkillModel();
        $this->interest = new InterestModel();
        $this->hobbie = new HobiModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'hasil' => $this->about->first(),
            'skill' => $this->skill->findAll(),
            'interest' => $this->interest->findAll(),
            'hobbie' => $this->hobbie->findAll()
        ];

        echo view('about', $data);
    }
}
