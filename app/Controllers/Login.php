<?php

namespace App\Controllers;

use App\Models\mlogin;

class Login extends BaseController
{
    public function index()
    {
        return view('vlogin2');
    }

    public function login()
    {
        $session = session();
        $model = new mlogin();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'iduser'       => $data['iduser'],
                    'namauser'     => $data['namauser'],
                    'username'    => $data['username'],
                    'password'    => $data['password'],
                    'level'    => $data['level']

                ];
                $session->set($ses_data);
                return redirect()->to(base_url('/Beranda'));
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('/Login'));
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to(base_url('/Login'));
        }
    }

    public function ViewStatus()
    {
        $db      = \Config\Database::connect();
        $query   = $db->query("SELECT * FROM transaksi");
        $data['cek'] = $query;

        return view('vcekstatus', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/Login'));
    }
}