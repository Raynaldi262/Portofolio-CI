<?php

namespace App\Controllers;

use App\Models\AlbumModel;

class AdminAlbum extends BaseController

{
    protected $album;
    public function __construct()
    {
        $this->album = new AlbumModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Daftar Gambar',
            'hasil' => $this->album->findAll()
        ];
        echo view('admin/album', $data);
    }

    public function detail($id)
    {
        $data = [
            'validasi' => \Config\Services::validation(),
            'hasil' => $this->album->getDetail($id)
        ];

        echo view('admin/editAlbum', $data);
    }

    public function edit()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'max_size[nama,10024]|is_image[nama]',
                'errors' => [
                    'max_size' => 'Maksimal 10mb',
                    'is_image' => 'Harus Gambar'
                ]
            ],
            'des' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 100 kata'
                ]
            ],
            'kat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus diisi'
                ]
            ]
        ])) {

            return redirect()->back()->withInput();
        }

        //ambil gambar dari post
        $fileNama = $this->request->getFile('nama');

        //cek gambar , apa ttp saama
        if ($fileNama->getError() == 4) {
            $nama = $this->request->getVar('namaLama');
        } else {
            $nama = $fileNama->getRandomName();

            $fileNama->move('img', $nama);

            unlink('img/' . $this->request->getVar('namaLama'));
        }


        $data = [
            'nama' => $nama,
            'deskripsi' => $this->request->getVar('des'),
            'kategori' => $this->request->getVar('kat'),
            'created_at' => $this->request->getVar('create')
        ];

        $id = $this->request->getVar('id');

        $this->album->editAlbum($data, $id);

        session()->setFlashdata('pesan', ' Data Berhasil Diubah.');
        return redirect()->to('/album');
    }



    public function addDisplay()
    {
        $data = [
            'validasi' => \Config\Services::validation()
        ];

        echo view('admin/addAlbum', $data);
    }

    public function add()
    {
        //validasi
        if (!$this->validate([
            'nama' => [
                'rules' => 'uploaded[nama]|max_size[nama,10024]|is_image[nama]',
                'errors' => [
                    'uploaded' => 'Harus diisi',
                    'max_size' => 'Maksimal 10mb',
                    'is_image' => 'Harus Gambar'
                ]
            ],
            'des' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 100 kata'
                ]
            ],
            'kat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus diisi'
                ]
            ]
        ])) {

            return redirect()->to('/AdminAlbum/addDisplay')->withInput();
        } // end validasi

        //ambil gambar
        $fileGambar = $this->request->getFile('nama');

        // generate nama smpul random
        $namaGambar = $fileGambar->getRandomName();

        //file masuk ke folder img
        $fileGambar->move('img');

        //ambil nama file
        $namaGambar = $fileGambar->getName();

        $data = [
            'nama' => $namaGambar,
            'deskripsi' => $this->request->getVar('des'),
            'kategori' => $this->request->getVar('kat'),
            'created_at' => $this->request->getVar('create')
        ];

        $this->album->saveAlbum($data);
        session()->setFlashdata('pesan', ' Data Berhasil Ditambahkan.');
        return redirect()->to('/album');
    }

    public function delete($id)
    {
        $hasil = $this->album->find($id);


        //hapus gambar
        unlink('img/' . $hasil['nama']);


        $this->album->delete($id);

        session()->setFlashdata('pesan', ' Data Berhasil Dihapus.');
        return redirect()->to('/album');
    }
}
