<?php

namespace App\Models;

use CodeIgniter\Model;

class mkategori extends Model
{
    public function getKategori()
    {
        $bulder = $this->db->table('tbl_kategori');
        return $bulder->get();
    }


    public function saveKategori($data)
    {
        $query = $this->db->table('tbl_kategori')->insert($data);
        return $query;
    }

    public function editKategori($data, $id)
    {
        $query = $this->db->table('tbl_kategori')->update($data, array('id' => $id));
        return $query;
    }
    public function deleteKategori($id)
    {
        $query = $this->db->table('tbl_kategori')->delete(array('id' => $id));
        return $query;
    }
}
