<?php

namespace App\Models;

use CodeIgniter\Model;

class mkaryawan extends Model
{
    public function getKaryawan()
    {
        $bulder = $this->db->table('karyawan');
        return $bulder->get();
    }


    public function saveKaryawan($data)
    {
        $query = $this->db->table('karyawan')->insert($data);
        return $query;
    }

    public function editKaryawan($data, $id)
    {
        $query = $this->db->table('karyawan')->update($data, array('id' => $id));
        return $query;
    }
    public function deleteKaryawan($id)
    {
        $query = $this->db->table('karyawan')->delete(array('id' => $id));
        return $query;
    }
}
