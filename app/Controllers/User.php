<?php

namespace App\Controllers;

use App\Models\muser;

class User extends BaseController
{
    public function index()
    {
        $model = new muser();
        $data['data'] = $model->getUser()->getResultArray();
        $data['datalevel'] = $model->getLevel()->getResultArray();
        return view('vuser', $data);
    }
    public function save()
    {
        $model = new muser();
        $data = array(
            'iduser' => $this->request->getPost('iduser'),
            'namauser' => $this->request->getpost('namauser'),
            'username' => $this->request->getpost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getpost('level')

        );

        $model->saveuser($data);
        return redirect()->to('index');
    }
    public function edit()
    {
        $model = new muser();
        $id = $this->request->getPost("namauser");
        $data = array(
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level')

        );

        $model->edituser($data, $id);
        return redirect()->to('index');
    }
    public function delete()
    {
        $model = new muser();
        $id = $this->request->getPost("iduser");

        $model->deleteUser($id);
        return redirect()->to('index');
    }
}
