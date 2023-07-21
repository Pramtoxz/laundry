<?php

namespace App\Models;

use CodeIgniter\Model;

class mkonsumen extends Model
{
    public function getKonsumen()
    {
        $bulder = $this->db->table('konsumen');
        return $bulder->get();
    }


    public function saveKonsumen($data)
    {
        $query = $this->db->table('konsumen')->insert($data);
        return $query;
    }

    public function editKonsumen($data, $id)
    {
        $query = $this->db->table('konsumen')->update($data, array('kodekonsumen' => $id));
        return $query;
    }
    public function deleteKonsumen($id)
    {
        $query = $this->db->table('konsumen')->delete(array('kodekonsumen' => $id));
        return $query;
    }

}
