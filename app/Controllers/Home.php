<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PustakaModel;
use App\Models\HistoryModel;

class Home extends BaseController
{
	protected $pustaka;
	protected $his;
	protected $session;

	public function __construct() {
			$this->pustaka = new PustakaModel();
			$this->his = new HistoryModel();
			$this->session = session();
	}

	public function index()
	{
		$data = [
			'user' => $this->session->get()
		];
		return view('index', $data);
	}

	public function search()
	{
		$term = $this->request->getPost('search');
		$hsl = $this->pustaka->getPustaka($term);
		$data = [
			'title' => 'Hasil Pencarian',
			'hasil' => $hsl,
		];
		$input = [
			'kd_user'	=> $this->session->get('kd_user'),
			'aksi' 		=> $this->session->get('nama').' Sedang Mencari '.$term,
			'akses' 	=> $this->session->get('akses'),
			'tgl_akses' => date('Y-m-d H:i:s'),
		];
		$this->his->TambahHistory($input);
		return view('main', $data);
	}
	public function searchdetail()
	{
		$kd = $this->request->getPost('kd');
		$hsl = $this->pustaka->getSearch($kd);
		$pustaka = $this->pustaka->getPustakaKode($kd);
		$input = [
			'kd_user'	=> $this->session->get('kd_user'),
			'aksi' 		=> $this->session->get('nama').' Sedang Mencari Detail Lokasi '.$pustaka['judul'],
			'akses' 	=> $this->session->get('akses'),
			'tgl_akses' => date('Y-m-d H:i:s'),
		];
		$data = [
			'title' => 'Hasil Pencarian',
			'hasil' => $hsl,
		];
		$this->his->TambahHistory($input);
		return view('lokasi', $data);
	}

	//--------------------------------------------------------------------

}
