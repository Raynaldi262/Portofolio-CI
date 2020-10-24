<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\ProfileModel;
use App\Models\TypedModel;
use App\Models\HobiModel;
use App\Models\InterestModel;
use App\Models\SkillModel;

class AdminHome extends BaseController

{
    protected $profile;
    protected $typed;
    protected $skill;
    protected $interest;
    protected $hobbie;
    protected $kontak;

    public function __construct()
    {
        $this->profile = new ProfileModel();
        $this->typed = new TypedModel();
        $this->skill = new SkillModel();
        $this->interest = new InterestModel();
        $this->hobbie = new HobiModel();
        $this->kontak = new ContactModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Welcome Admin',
            'hasil' => $this->profile->first(),
            'validasi' => \Config\Services::validation()
        ];
        echo view('admin/indexAdmin', $data);
    }

    public function edit()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus diisi'
                ]
            ],
            'tgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus diisi'
                ]
            ],
            'photo' => [
                'rules' => 'max_size[photo,10024]|is_image[photo]',
                'errors' => [
                    'max_size' => 'Maksimal 10mb',
                    'is_image' => 'Harus Gambar'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus diisi'
                ]
            ],
            'pwd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus diisi'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $fileName = $this->request->getFile('photo');

        if ($fileName->getError() == 4) {
            $name = $this->request->getVar('poto');
        } else {
            $name = $fileName->getRandomName();

            $fileName->move('img', $name);

            unlink('img/' . $this->request->getVar('poto'));
        }

        $id = $this->request->getVar('idd');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'tgl_lahir' => $this->request->getVar('tgl'),
            'photo' => $name,
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('pwd')
        ];

        $this->profile->editProfile($data, $id);
        session()->setFlashdata('pesan', ' Data Berhasil Diubah.');
        return redirect()->to('/admin');
    }

    public function save()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'tgl_lahir' => $this->request->getVar('tgl'),
            'photo' => $this->request->getVar('poto'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('pwd')
        ];


        $this->profile->saveProfile($data);
        session()->setFlashdata('pesan', ' Data Berhasil Ditambahkan.');

        return redirect()->to('/admin');
    }

    public function formTyped()
    {
        $data = [
            'hasil' => $this->typed->findAll()
        ];

        echo view('/admin/form/typed', $data);
    }
    public function formSkill()
    {
        $data = [
            'hasil' => $this->skill->findAll()
        ];
        echo view('/admin/form/skill', $data);
    }
    public function formInterest()
    {
        $data = [
            'hasil' => $this->interest->findAll()
        ];
        echo view('/admin/form/interest', $data);
    }
    public function formHobbie()
    {
        $data = [
            'hasil' => $this->hobbie->findAll()
        ];
        echo view('/admin/form/hobbie', $data);
    }

    public function delete()
    {
        $tmp = $this->request->getVar('model');
        $id = $this->request->getVar('id');
        $this->$tmp->delete($id);

        return redirect()->back();
    }

    public function insertTyped()
    {
        $data = [
            'kata' => $this->request->getVar('kata')
        ];

        $this->typed->insert($data);

        return redirect()->back();
    }

    public function insertSkill()
    {
        $data = [
            'skill' => $this->request->getVar('skill'),
            'nilai' => $this->request->getVar('nilai')
        ];

        $this->skill->insert($data);

        return redirect()->back();
    }

    public function insertInterest()
    {
        $data = [
            'interest' => $this->request->getVar('interest'),
            'warna' => '#' . $this->request->getVar('warna'),
            'sampul' => $this->request->getVar('sampul')
        ];

        $this->interest->insert($data);

        return redirect()->back();
    }

    public function insertHobbie()
    {
        $data = [
            'hobi' => $this->request->getVar('hobi'),
            'warna' => '#' . $this->request->getVar('warna'),
            'sampul' => $this->request->getVar('sampul')
        ];

        $this->hobbie->insert($data);

        return redirect()->back();
    }

    public function kontakView()
    {
        $data = [
            'profile' => $this->profile->first(),
            'kontak' => $this->kontak->first(),
            'validasi' => \Config\Services::validation()
        ];

        echo view('/admin/form/kontak', $data);
    }

    public function editKontak()
    {
        if (!$this->validate([
            //sama dengan name pada tag input
            'pas' => [
                'rules' => 'is_image[pas]|max_size[pas,10024]',
                'errors' => [
                    'is_image' => 'Harus Gambar',
                    'max_size' => 'Maksimal 10mb'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $fileName = $this->request->getFile('pas');

        if ($fileName->getError() == 4) {
            $name = $this->request->getVar('pasLama');
        } else {
            $name = $fileName->getRandomName();

            $fileName->move('img', $name);

            unlink('img/' . $this->request->getVar('pasLama'));
        }

        $id = $this->request->getVar('idd');
        $data = [
            'pas' => $name,
            'twitter' => $this->request->getVar('twitter'),
            'facebook' => $this->request->getVar('facebook'),
            'ig' => $this->request->getVar('ig'),
            'linked' => $this->request->getVar('linked'),
            'quote' => $this->request->getVar('quote'),
            'pembuat' => $this->request->getVar('pembuat')
        ];

        $this->kontak->editK($data, $id);
        return redirect()->back();
    }

    public function editEmail()
    {
        $id = $this->request->getVar('id');

        $data = [
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone')
        ];

        $this->profile->editE($data, $id);

        return redirect()->back();
    }
}
