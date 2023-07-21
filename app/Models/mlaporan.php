<?php

namespace App\Models;

use CodeIgniter\Model;

class mlaporan extends Model
{
    public function tampillaporantransaksi($tglawal, $tglakhir)
    {
       
      
        return  $this->db->query("SELECT * FROM transaksi JOIN konsumen ON transaksi.`kdkonsumen_transaksi` = konsumen.`kodekonsumen`
        JOIN tbl_kategori ON transaksi.`notransaksi`= tbl_kategori.`id`
        where transaksi.tanggaltransaksi BETWEEN '$tglawal' and '$tglakhir' ");
    }
}
