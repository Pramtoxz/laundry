<?php

namespace App\Controllers;

use App\Models\mlaporan;
use App\Models\mkonsumen;
use App\Models\mkategori;
use App\Models\mkaryawan;


class Laporan extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function laporan_konsumen()
	{
		$model_konsumen = new mkonsumen();
		$data['data_konsumen'] = $model_konsumen->getKonsumen()->getResult();
		return view('vlaporankonsumen', $data);
	}

	public function laporan_karyawan()
	{
		$model_karyawan = new mkaryawan();
		$data['data_karyawan'] = $model_karyawan->getKaryawan()->getResult();
		return view('vlaporankaryawan', $data);
	}

	public function laporan_kategori()
	{
		$models_kategori = new mkategori();
		$data['data_kategori'] = $models_kategori->getKategori()->getResult();
		return view('vlaporankategori', $data);
	}

	//public function laporan_faktur()
	//{
	//	$models_kategori = new mfaktur();
		//$data['data_kategori'] = $models_kategori->getKategori()->getResult();
		//return view('vlaporankategori', $data);
	///}

	public function tgllaporan()
	{
		return view('vtgllaporan');
	}

	public function laporanTransaksiPeriode()
	{
		$model = new mlaporan();
		$tglawal = $this->request->getPost('tglawal');
		$tglakhir = $this->request->getPost('tglakhir');
		$data['tglawal'] = $tglawal;
		$data['tglakhir'] = $tglakhir;
		$data['data_laporan'] = $model->tampillaporantransaksi($tglawal, $tglakhir)->getResult();
		return view('vlaporantransaksi', $data);
	}
}
