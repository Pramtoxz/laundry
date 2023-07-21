<?php

namespace App\Controllers;

use App\Models\mkonsumen;

class Konsumen extends BaseController
{
    public function index()
    {
        $model = new mkonsumen();
        $data['data'] = $model->getKonsumen()->getResultArray();
        return view('vkonsumen', $data);
    }
    public function save()
    {
        $model = new mkonsumen();
        $data = array(
            'kodekonsumen' => $this->request->getPost('kodekonsumen'),
            'namakonsumen' => $this->request->getpost('namakonsumen'),
            'alamatkonsumen' => $this->request->getpost('alamatkonsumen'),
            'notelpkonsumen' => $this->request->getpost('notelpkonsumen')

        );

        if (!$this->validate(
            [
                'kodekonsumen' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'
                    ]
                ],
                'namakonsumen' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'
                    ]
                ],
                'alamatkonsumen' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'

                    ]
                ],
                'notelpkonsumen' => [
                    'rules' => 'required',
                    'errors' => [

                        'required' => '{field} harus diisi'
                    ]
                ],

            ]

        )) {
            session()->setflashdata('error', $this->validator->listErrors());
            return redirect()->to(base_url('konsumen'));
        } else {
            print_r($this->request->getVar());
        }

        $model->saveKonsumen($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to('index');
    }
    public function edit()
    {
        $model = new mkonsumen();
        $id = $this->request->getPost("kodekonsumen");
        $data = array(
            'namakonsumen' => $this->request->getPost('namakonsumen'),
            'alamatkonsumen' => $this->request->getPost('alamatkonsumen'),
            'notelpkonsumen' => $this->request->getPost('notelpkonsumen')
        );

        $model->editKonsumen($data, $id);
        session()->setflashdata('sukses', 'Data Berhasil Diedit.');
        return redirect()->to('index');
    }
    public function delete()
    {
        $model = new mkonsumen();
        $id = $this->request->getPost("kodekonsumen");

        $model->deleteKonsumen($id);
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to('index');
    }
}