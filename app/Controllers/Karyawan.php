<?php

namespace App\Controllers;

use App\Models\mkaryawan;

class Karyawan extends BaseController
{
    public function index()
    {
        $model = new mkaryawan();
        $data['data'] = $model->getKaryawan()->getResultArray();
        return view('vkaryawan', $data);
    }
    public function save()
    {
        $model = new mkaryawan();
        $data = array(
            'kodekaryawan' => $this->request->getPost('kodekaryawan'),
            'namakaryawan' => $this->request->getpost('namakaryawan'),
            'jeniskelamin' => $this->request->getpost('jeniskelamin'),
            'alamatkaryawan' => $this->request->getpost('alamatkaryawan'),
            'notelpkaryawan' => $this->request->getpost('notelpkaryawan')

        );

        if (!$this->validate(
            [
                'kodekaryawan' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'
                    ]
                ],
                'namakaryawan' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'
                    ]
                ],
                'jeniskelamin' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'
                    ]
                ],
                'alamatkaryawan' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'

                    ]
                ],
                

            ]

        )) {
            session()->setflashdata('error', $this->validator->listErrors());
            return redirect()->to(base_url('karyawan'));
        } else {
            print_r($this->request->getVar());
        }

        $model->saveKaryawan($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to('index');
    }
    public function edit()
    {
        $model = new mkaryawan();
        $id = $this->request->getPost("id");
        $data = array(
            'kodekaryawan' => $this->request->getPost('kode'),
            'namakaryawan' => $this->request->getPost('nama'),
            'jeniskelamin' => $this->request->getPost('jk'),
            'alamatkaryawan' => $this->request->getPost('alamat'),
            'notelpkaryawan' => $this->request->getPost('nohp')
        );

        $model->editKaryawan($data, $id);
        session()->setflashdata('sukses', 'Data Berhasil Diedit.');
        return redirect()->to('index');
    }
    public function delete()
    {
        $model = new mkaryawan();
        $id = $this->request->getPost("id");
        $model->deleteKaryawan($id);
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to('index');
    }
}