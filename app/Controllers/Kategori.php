<?php

namespace App\Controllers;

use App\Models\mkategori;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new mkategori();
        $data['data'] = $model->getKategori()->getResultArray();

        return view('vkategori', $data);
    }

    public function save()
    {
        $model = new mkategori();
        $data = array(
            'id' => $this->request->getPost('id'),
            'kode' => $this->request->getpost('kode'),
            'nama' => $this->request->getpost('nama'),
            'jenis' => $this->request->getpost('jenis'),
            'harga' => $this->request->getpost('harga')

        );

        if (!$this->validate(
            [            
                'kode' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'

                    ]
                ],
                'jenis' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'

                    ]
                ],
                'harga' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'

                    ]
                ],
                

            ]

        )) {
            session()->setflashdata('error', $this->validator->listErrors());
            return redirect()->to(base_url('tbl_kategori'));
        } else {
            print_r($this->request->getVar());
        }

        $model->saveKategori($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to('index');
    }
    public function edit()
    {
        $model = new mkategori();
        $id = $this->request->getPost("id");
        $data = array(
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getpost('jenis'),
            'harga' => $this->request->getPost('harga')
        );

        $model->editKategori($data, $id);
        session()->setflashdata('sukses', 'Data Berhasil Diedit.');
        return redirect()->to('index');
    }
    public function delete()
    {
        $model = new mkategori();
        $id = $this->request->getPost("id");
        $model->deleteKategori($id);
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to('index');
    }
}
