<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PustakaModel;
use App\Models\UserModel;
use App\Models\RakModel;

class Adm extends Controller{

// ROOT
	protected $pustaka;
	protected $user;
	protected $rak;
	protected $session;
	public function __construct() {
			$this->pustaka = new PustakaModel();
			$this->user = new UserModel();
			$this->rak = new RakModel();
			$this->session = session();
	}

	public function index()
	{
		$pus = $this->pustaka->countAllResults();
		$usr = $this->user->countAllResults();
		$data = [
			'title' => 'Dashboard',
			'numpus' => $pus,
			'numusr' => $usr,
			'user' => $this->session->get(),
		];
		return view('admin/index', $data);
	}

// RAK
	public function rak()
	{
		$drak = $this->rak->getRak();
		$data = [
			'title' => 'Rak',
			'rak' => $drak,
			'user' => $this->session->get(),
		];
		return view('admin/rak', $data);
	}

	public function tambahrak(){
      // Mengambil value dari form dengan method POST
      $nama = $this->request->getPost('nama');
      $jenis = $this->request->getPost('jenis');
      $gambar = $this->request->getFile('gmb');

      // Membuat array collection yang disiapkan untuk insert ke table
      $data = [
        'nama' => $nama,
        'jenis' => $jenis,
        'gambar' => $gambar->getName(),
      ];

      /*
      Membuat variabel simpan yang isinya merupakan memanggil function
      insert_product dan membawa parameter data
      */
      $simpan = $this->rak->TambahRak($data);
			$gambar->move(ROOTPATH.'public/gmb');

      // Jika simpan berhasil, maka ...
      if(!$simpan){
        return redirect()->to(base_url('adm_rak'));
      }else{
        return redirect()->to(base_url('adm_rak'));
      }
    }

		function ubahrak($stat,$kd){
      if($stat=='submit'){
        // Mengambil value dari form dengan method POST
        $jdl = $this->request->getPost('judul');
        $peng = $this->request->getPost('pengarang');
        $edit = $this->request->getPost('editor');
        $terbit = $this->request->getPost('penerbit');
        $thn = $this->request->getPost('tahun');
        $hal = $this->request->getPost('halaman');
        $loc = $this->request->getPost('lokasi');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
          'judul' => $jdl,
          'pengarang' => $peng,
          'editor' => $edit,
          'penerbit' => $terbit,
          'tahun' => $thn,
          'halaman' => $hal,
          'lokasi' => $loc
        ];

        /*
        Membuat variabel ubah yang isinya merupakan memanggil function
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->pustaka->UbahBuku($data, $kd);

        // Jika berhasil melakukan ubah
        if(!$ubah)
        {
          return redirect()->to(base_url('adm_katalog'));
        }else{
          return redirect()->to(base_url('adm_katalog'));
        }
      }else{
        $data['pustaka'] = $this->pustaka->getPustaka($kd);
        return view('adm/ubah', $data);
      }
    }
    function hapusrak($kd){
      // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
    $hapus = $this->pustaka->HapusBuku($kd);

    // Jika berhasil melakukan hapus
    if($hapus)
    {
        return redirect()->to(base_url('adm_katalog'));
    }
    }

		// KATALOG/BUKU/PUSTAKA
			public function katalog()
			{
				$all = $this->pustaka->getPustaka();
				$drak = $this->rak->getRak();
				$data = [
					'title' => 'Pustaka',
					'pustaka' => $all,
					'rak' => $drak,
					'user' => $this->session->get(),
				];
				return view('admin/katalog', $data);
			}

			public function tambahbuku(){
		      $data = $this->pustaka->KodeBuku();
		      $kd = "";
		      $jadi = "";
		      date_default_timezone_set('Asia/Jakarta');
							if($data==null){
								$jadi = str_replace(" ","",date('Ymis')."001");
							}else{
		              $tmp = intval(substr($data['kd_buku'],10)+1);
		              if(strlen($tmp)==1){
		                $kd = sprintf("%10s", $tmp);
		                $jadi = str_replace(" ","",date('Ymis')."00".$kd);
		              }else if(strlen($tmp)==2){
		                $kd = sprintf("%10s", $tmp);
		                $jadi = str_replace(" ","",date('Ymis')."0".$kd);
		              }else if(strlen($tmp)==3){
		                $kd = sprintf("%10s", $tmp);
		                $jadi = str_replace(" ","",date('Ymis').$kd);
		              }else{
		                // $jadi = str_replace(" ","",date('Ymis')."001");
		              }
							}
		      // Mengambil value dari form dengan method POST
		      $kd_buku = $jadi;
		      $jdl = $this->request->getPost('judul');
		      $peng = $this->request->getPost('pengarang');
		      $edit = $this->request->getPost('editor');
		      $terbit = $this->request->getPost('penerbit');
		      $thn = $this->request->getPost('tahun');
		      $hal = $this->request->getPost('halaman');
		      $loc = $this->request->getPost('rak');

		      // Membuat array collection yang disiapkan untuk insert ke table
		      $data = [
		        'kd_buku' => $kd_buku,
		        'judul' => $jdl,
		        'pengarang' => $peng,
		        'editor' => $edit,
		        'penerbit' => $terbit,
		        'tahun' => $thn,
		        'halaman' => $hal,
		        'kd_rak' => $loc,
		      ];

		      /*
		      Membuat variabel simpan yang isinya merupakan memanggil function
		      insert_product dan membawa parameter data
		      */
		      $simpan = $this->pustaka->TambahBuku($data);

		      // Jika simpan berhasil, maka ...
		      if(!$simpan){
		        return redirect()->to(base_url('adm_katalog'));
		      }else{
		        return redirect()->to(base_url('adm_katalog'));
		      }
		    }

				function ubahbuku($stat,$kd){
		      if($stat=='submit'){
		        // Mengambil value dari form dengan method POST
		        $jdl = $this->request->getPost('judul');
		        $peng = $this->request->getPost('pengarang');
		        $edit = $this->request->getPost('editor');
		        $terbit = $this->request->getPost('penerbit');
		        $thn = $this->request->getPost('tahun');
		        $hal = $this->request->getPost('halaman');
		        $loc = $this->request->getPost('lokasi');

		        // Membuat array collection yang disiapkan untuk insert ke table
		        $data = [
		          'judul' => $jdl,
		          'pengarang' => $peng,
		          'editor' => $edit,
		          'penerbit' => $terbit,
		          'tahun' => $thn,
		          'halaman' => $hal,
		          'lokasi' => $loc
		        ];

		        /*
		        Membuat variabel ubah yang isinya merupakan memanggil function
		        update_product dan membawa parameter data beserta id
		        */
		        $ubah = $this->pustaka->UbahBuku($data, $kd);

		        // Jika berhasil melakukan ubah
		        if(!$ubah)
		        {
		          return redirect()->to(base_url('adm_katalog'));
		        }else{
		          return redirect()->to(base_url('adm_katalog'));
		        }
		      }else{
		        $data['pustaka'] = $this->pustaka->getPustaka($kd);
		        return view('adm/ubah', $data);
		      }
		    }
		    function hapusbuku($kd){
		      // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
		    $hapus = $this->pustaka->HapusBuku($kd);

		    // Jika berhasil melakukan hapus
		    if($hapus)
		    {
		        return redirect()->to(base_url('adm_katalog'));
		    }
		    }

// USER
	public function user()
	{
		$all = $this->user->getUser();
		$data = [
			'title' => 'User',
			'usr' => $all,
			'user' => $this->session->get(),
		];
		return view('admin/user', $data);
	}

	public function tambahuser()
    {
			$data = $this->user->KodeUser();
			$kd = "";
			$jadi = "";
			$jns = "";
			if($this->request->getPost('akses')=='pus'){
				$jns = 'P';
			}else{
				$jns = 'U';
			}
			if($data==null){
					// $jadi = str_replace(" ","",$this->request->getPost('tgllahir').$jns."001");
			}else{
      	date_default_timezone_set('Asia/Jakarta');
				$tmp = intval(substr($data['kd_user'],9)+1);
				if(strlen($tmp)==1){
					$kd = sprintf("%9s", $tmp);
					$jadi = str_replace(" ","",date("dmY", strtotime($this->request->getPost('tgllahir'))).$jns."00".$kd);
				}else if(strlen($tmp)==2){
					$kd = sprintf("%9s", $tmp);
					$jadi = str_replace(" ","",date("dmY", strtotime($this->request->getPost('tgllahir'))).$jns."0".$kd);
				}else if(strlen($tmp)==3){
					$kd = sprintf("%9s", $tmp);
					$jadi = str_replace(" ","",date("dmY", strtotime($this->request->getPost('tgllahir'))).$jns.$kd);
				}else{
					$jadi = str_replace(" ","",date("dmY", strtotime($this->request->getPost('tgllahir'))).$jns."001");
				}
			}
      	// Mengambil value dari form dengan method POST
				$kdu = $jadi;
      	$nis = $this->request->getPost('nis');
				$nik = $this->request->getPost('nik');
      	$nama = $this->request->getPost('nama');
      	$jenkel = $this->request->getPost('jk');
      	$lahir = $this->request->getPost('tgllahir');
      	$telp = $this->request->getPost('telp');
      	$akses = $this->request->getPost('akses');
      	$daftar = date('Y-m-d G:i:s');
      	$pass = MD5('sementara');

      	// Membuat array collection yang disiapkan untuk insert ke table
      	$data = [
					'kd_user' => $kdu,
        	'nis' => $nis,
					'nik' => $nik,
        	'nama' => $nama,
        	'jenkel' => $jenkel,
        	'tgl_lahir' => $lahir,
        	'telp' => $telp,
        	'password' => $pass,
        	'akses' => $akses,
        	'tgl_daftar' => $daftar
      	];

      	/*
      	Membuat variabel simpan yang isinya merupakan memanggil function
      	insert_product dan membawa parameter data
      	*/
      	$simpan = $this->user->TambahUser($data);

      // Jika simpan berhasil, maka ...
      if(!$simpan){
        return redirect()->to(base_url('adm_user'));
      }else{
        return redirect()->to(base_url('adm_user'));
      }
    }

		function hapususer($kd_user){
			// Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
		$hapus = $this->user->HapusUser($kd_user);

		// Jika berhasil melakukan hapus
		if($hapus)
		{
				return redirect()->to(base_url('adm_user'));
		}
		}

	//HISTORY
	public function history()
	{
		$db      = \Config\Database::connect();
		$all = $db->table('history')->get()->getResultArray();
		$data = [
			'title' => 'History',
			'history' => $all,
			'user' => $this->session->get(),
		];
		return view('admin/history', $data);
	}
	public function cetakhistory()
	{
		date_default_timezone_set('Asia/Jakarta');
		$db      = \Config\Database::connect();
		$all = $db->table('history')->get()->getResultArray();
		$data = view('admin/print_history',[
			'title' => 'Cetak History',
			'history' => $all,
			'user' => $this->session->get(),
		]);
		$pdf = new \TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Dea Venditama');
		$pdf->SetTitle('Laporan Aksi User');
		$pdf->SetSubject('Laporan Aksi User');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($data, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output(date('d-m-Y').'_Laporan_User.pdf', 'I');

	}

}
