<?php

namespace App\Models;

use CodeIgniter\Model;

class muser extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['iduser', 'namauser', 'username', 'password', 'level'];

    public function getUser()
    {
        $bulder = $this->db->table('user');
        return $bulder->get();
    }



    public function saveUser($data)
    {
        $query = $this->db->table('user')->insert($data);
        return $query;
    }

    public function editUser($data, $id)
    {
        $query = $this->db->table('user')->update($data, array('namauser' => $id));
        return $query;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table('user')->delete(array('iduser' => $id));
        return $query;
    }
    public function getLevel()
    {
        $bulder = $this->db->table('leveluser');
        return $bulder->get();
    }
}