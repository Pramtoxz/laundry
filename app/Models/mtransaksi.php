<?php

namespace App\Models;

use CodeIgniter\Model;




class mtransaksi extends Model
{


    public function getTransaksi()
    {
        $builder = $this->db->table('transaksi');
        $builder->select('*, transaksi.status as statustransaksi');
        $builder->join('konsumen', 'konsumen.kodekonsumen=transaksi.kdkonsumen_transaksi');
        $builder->join('detail_transaksi', 'detail_transaksi.nofak_detail=transaksi.notransaksi');
        $builder->join('tbl_kategori', 'tbl_kategori.id=detail_transaksi.kode_detail');

        return $builder->get();
    }

    public function getTransaksibyid($id)
    {
        $builder = $this->db->table('transaksi');
        $builder->select('*,(harga_detail * berat_detail) AS total');
        $builder->join('detail_transaksi', 'transaksi.notransaksi = detail_transaksi.nofak_detail');
        $builder->join('konsumen', 'transaksi.kdkonsumen_transaksi= konsumen.kodekonsumen');
        $builder->join('tbl_kategori', 'detail_transaksi.kode_detail=tbl_kategori.kode');
        $builder->where('idtransaksi', $id);
        $query = $builder->get();
        // var_dump($query);
        // exit();
        return $query;
    }

    public function updateStatustransaksi($idtransaksi, $status)
    {
        $builder = $this->db->table('transaksi');
        $builder->set('status', $status);
        $builder->where('idtransaksi', $idtransaksi);
        $builder->update();
    }


    public function saveTransaksi($data)
    {
        $query = $this->db->table('transaksi')->insert($data);
        return $query;
    }

    public function saveTransaksiDetail($data)
    {
        $query = $this->db->table('detail_transaksi')->insert($data);
        return $query;
    }

    public function add()
    {
        $bulder = $this->db->table('temp');
        return $bulder->get();
    }


    public function editTransaksi($data, $id)
    {
        $query = $this->db->table('transaksi')->update($data, array('idtransaksi' => $id));
        return $query;
    }
    public function editTransaksi2($data, $id)
    {
        $query = $this->db->table('detail_transaksi')->update($data, array('nofak_detail' => $id));
        return $query;
    }

    public function deleteTransaksi($id)
    {
        $query = $this->db->table('transaksi')->delete(array('idtransaksi' => $id));
        return $query;
    }
    public function deletetemp()
    {
        return $this->emptyTable('temp');
    }
}