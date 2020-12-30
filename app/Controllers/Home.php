<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PustakaModel;

class Home extends BaseController
{
	protected $pustaka;

	public function __construct() {
			$this->pustaka = new PustakaModel();
	}

	public function index()
	{
		return view('index');
	}

	public function search()
	{
		$term = $this->request->getPost('search');
		$hsl = $this->pustaka->getPustaka($term);
		$data = [
			'title' => 'Hasil Pencarian',
			'hasil' => $hsl,
		];
		return view('main', $data);
	}

	//--------------------------------------------------------------------

}
