<?php

namespace App\Controllers;

use App\Models\mtransaksi;
use App\Models\mkonsumen;
use App\Models\mkategori;


class Transaksi extends BaseController
{
    public function index()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('transaksi');
        $builder->select('*');
        $builder->join('detail_transaksi', 'detail_transaksi.nofak_detail = transaksi.notransaksi');
        $builder->join('konsumen', 'konsumen.kodekonsumen=transaksi.kdkonsumen_transaksi');
        $builder->join('tbl_kategori', 'tbl_kategori.kode=detail_transaksi.kode_detail');
        $builder->groupBy('notransaksi');
        $query = $builder->get();
        $data['transaksi'] = $query;
        return view('vtransaksi', $data);
    }

    public function tambah_transaksi()
    {

        $mkonsumen = new mkonsumen();
        $mkategori = new mkategori();
        $mtransasksi = new mtransaksi();

        $data['data_konsumen'] = $mkonsumen->getKonsumen()->getResultArray();
        $data['data_kategori'] = $mkategori->getKategori()->getResultArray();
        $data['temp'] = $mtransasksi->add()->getResultArray();

        return view('vtambahtransaksi', $data);
    }

    public function edit_Transaksi($id)
    {
        $mkonsumen = new mkonsumen();
        $mkategori = new mkategori();
        $model = new mtransaksi();
        $data = [
            'datatransaksi' => $model->getTransaksibyid($id)->getRowArray(),
            'data_konsumen' => $mkonsumen->getKonsumen()->getResultArray(),
            'data_kategori' => $mkategori->getKategori()->getResultArray()
        ];

        return view('vedittransaksi', $data);
    }

    public function save()
    {
        $db      = \Config\Database::connect();
        $model = new mtransaksi();

        foreach ($model->add()->getResultArray() as $key => $r) {
            $data1 = array(
                'nofak_detail' => $this->request->getPost('notransaksi'),
                'kode_detail' => $r['kdtemp'],
                'harga_detail' => $r['hargatemp'],
                'berat_detail' => $r['berattemp']
            );
            $model->saveTransaksiDetail($data1);
        };

        $data = array(
            'notransaksi' => $this->request->getPost('notransaksi'),
            'tanggaltransaksi' => $this->request->getPost('tanggaltransaksi'),
            'kdkonsumen_transaksi' => $this->request->getPost('idkonsumen'),
            'tanggalselesai' => $this->request->getpost('tanggalselesai'),
            'status' => '1'
        );

        $model->savetransaksi($data);
        $hapus = $db->query("DELETE FROM temp");
        return redirect()->to('index');
    }
    
    public function edit()
    {
        $model = new mtransaksi();
        $id = $this->request->getPost('idtransaksi');
        // var_dump($id);
        // exit();
        $data = array(
            'tanggaltransaksi' => $this->request->getPost('tanggaltransaksi'),
            'kdkonsumen_transaksi' => $this->request->getPost('idkonsumen'),

            'tanggalselesai' => $this->request->getpost('tanggalselesai')
        );
        $data2 = array(
            'kode_detail' => $this->request->getpost('kode'),
            'harga_detail' => $this->request->getpost('harga'),
            'berat_detail' => $this->request->getpost('berat'),
            'total' => $this->request->getpost('total'),
        );
        $model->editTransaksi($data, $id);
        session()->setflashdata('sukses', 'Data Berhasil di Edit.');
        return redirect()->to('index');
    }



    public function delete()
    {
        $model = new mtransaksi();
        $id = $this->request->getPost("idtransaksi");
        $model->deletetransaksi($id);
        session()->setflashdata('sukses', 'Data Berhasil DiHapus.');
        return redirect()->to('index');
    }

    public function edit_status_transaksi()
    {
        $model = new mtransaksi();
        $idtransaksi = $this->request->getPost("idtransaksi");
        $idkategori = $this->request->getPost("idkategori");
        $status = $this->request->getPost("status");
        $model->updateStatustransaksi($idtransaksi, $status);
        session()->setflashdata('sukses', 'Status Transaksi Berhasil Diupdate.');
        return redirect()->to('index');
    }

    public function LoadTemp()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('temp');
        $query = $builder->get();
        $data['temp'] = $query;

        echo view('vtampiltemp', $data);
    }

    public function SimpanTem()
    {
        $db      = \Config\Database::connect();
        $data = array(
            'kdtemp' => $this->request->getPost('kodekat'),
            'namatemp' => $this->request->getPost('namakat'),
            'jenistemp' => $this->request->getPost('jenis'),
            'hargatemp' => $this->request->getpost('harga'),
            'berattemp' => $this->request->getpost('berat')
        );

        $builder = $db->table('temp');
        $simpan = $builder->insert($data);
    }

    public function DeleteTemp()
    {
        $db      = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $query = $db->table('temp')->delete(array('kdtemp' => $id));
        return $query;
    }

    public function CetakFaktur($id)
    {

        $db      = \Config\Database::connect();
        $query   = $db->query("SELECT * FROM transaksi 
                    LEFT JOIN detail_transaksi ON transaksi.notransaksi=detail_transaksi.nofak_detail
                    LEFT JOIN tbl_kategori ON detail_transaksi.kode_detail=tbl_kategori.kode
                    WHERE transaksi.idtransaksi = '$id'");

        $data['faktur'] = $query;

        return view('vfaktur', $data);
    }
}