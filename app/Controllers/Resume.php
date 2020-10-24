<?php

namespace App\Controllers;

use App\Models\EduModel;
use App\Models\JobModel;
use App\Models\ProfileModel;

class Resume extends BaseController

{
    protected $profile;
    protected $edu;
    protected $job;
    public function __construct()
    {
        $this->edu = new EduModel();
        $this->profile = new ProfileModel();
        $this->job = new JobModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'hasil' => $this->profile->first(),
            'edu' => $this->edu->findAll(),
            'job' => $this->job->findAll(),
        ];


        // var_dump($data);
        echo view('resume', $data);
    }
}
