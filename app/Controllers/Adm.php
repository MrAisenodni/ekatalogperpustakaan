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
			'title' 	=> 'Dashboard',
			'numpus'	=> $pus,
			'numusr'	=> $usr,
			'user' 		=> $this->session->get(),
		];
		return view('admin/index', $data);
	}

	// START CRUD Rak 
	public function rak()
	{
		$drak = $this->rak->getRak();
		$data = [
			'title' 	=> 'Kelola Rak/Denah',
			'rak' 		=> $drak,
			'user' 		=> $this->session->get(),
		];
		return view('admin/rak', $data);
	}

	public function tambahrak(){
		$data = $this->rak->KodeRak();
		$kd = "";
		$jadi = "";
		date_default_timezone_set('Asia/Jakarta');
		if($data==null){
			$jadi = str_replace(" ","",date('m')."001");
		}else{
			$tmp = intval(substr($data['kd_rak'],2)+1);
			if(strlen($tmp)==1){
				$kd = sprintf("%2s", $tmp);
				$jadi = str_replace(" ","",date('m')."00".$kd);
			}else if(strlen($tmp)==2){
				$kd = sprintf("%2s", $tmp);
				$jadi = str_replace(" ","",date('m')."0".$kd);
			}else if(strlen($tmp)==3){
				$kd = sprintf("%2s", $tmp);
				$jadi = str_replace(" ","",date('m').$kd);
			}else{
				// $jadi = str_replace(" ","",date('Ymis')."001");
			}
		}
	    // Mengambil value dari form dengan method POST
		$kode = $jadi;
        $nama = $this->request->getPost('nama');
		$lemari = $this->request->getPost('nolem');
		$rak = $this->request->getPost('norak');
        $jenis = $this->request->getPost('jenis');
        $gambar = $this->request->getFile('gmb');

    	// Membuat array collection yang disiapkan untuk insert ke table
        $data = [
			'kd_rak' 	=> $kode,
        	'nama' 		=> $nama,
			'no_lemari' => $lemari,
			'no_rak' 	=> $rak,
        	'jenis' 	=> $jenis,
        	'gambar' 	=> $gambar->getName(),
      	];

    	/*
    	Membuat variabel simpan yang isinya merupakan memanggil function
    	insert_product dan membawa parameter data
    	*/

		$simpan = $this->rak->TambahRak($data);
		$gambar->move(ROOTPATH.'public/gmb');

		// Jika simpan berhasil, maka ...
        if(!$simpan){
	      	session()->setFlashdata('pesan', 'Data Rak Berhasil Ditambahkan.');
		    return redirect()->to(base_url('adm_rak'));
	    }else{
	    	session()->setFlashdata('error', 'Data Rak Gagal Ditambahkan.');
			return redirect()->to(base_url('adm_rak'));
	    }
    }

	public function detailubahrak($kd_rak)
	{
		$all = $this->user->getRakKode($kd_rak);
		$data = [
			'title' => 'Ubah Rak/Denah',
			'drak' 	=> $all,
			'rak'	=> $this->session->get(),
		];
		return view('admin/edit-rak', $data);
	}

	public function ubahrak($stat,$kd){
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
		        'judul' 	=> $jdl,
		        'pengarang' => $peng,
		        'editor' 	=> $edit,
		        'penerbit' 	=> $terbit,
		        'tahun' 	=> $thn,
		        'halaman' 	=> $hal,
	         	'lokasi' 	=> $loc
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

    public function hapusrak($kd_rak){
		// Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
		$this->rak->HapusRak($kd_rak);
		session()->setFlashdata('pesan','Data Rak Berhasil Dihapus');
		return redirect()->to(base_url('adm_rak'));
	}
    // END CRUD Rak

	// START CRUD PUSTAKA
	public function katalog()
	{
		$all = $this->pustaka->getPustaka();
		$drak = $this->rak->getRak();
		$data = [
			'title' 	=> 'Kelola Pustaka',
			'pustaka' 	=> $all,
			'rak' 		=> $drak,
			'user' 		=> $this->session->get(),
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
		$tmpt = $this->request->getPost('tmpt');
		$terbit = $this->request->getPost('penerbit');
		$thn = $this->request->getPost('tahun');
		$hal = $this->request->getPost('halaman');
		$loc = $this->request->getPost('rak');

		// Membuat array collection yang disiapkan untuk insert ke table
		$data = [
			'kd_buku' 		=> $kd_buku,
			'judul' 		=> $jdl,
			'pengarang' 	=> $peng,
			'tmpt_terbit' 	=> $tmpt,
			'penerbit' 		=> $terbit,
			'tahun' 		=> $thn,
			'halaman' 		=> $hal,
			'kd_rak' 		=> $loc,
		];

		/*
		Membuat variabel simpan yang isinya merupakan memanggil function
		insert_product dan membawa parameter data
		*/

		$simpan = $this->pustaka->TambahBuku($data);

		// Jika simpan berhasil, maka ...
        if(!$simpan){
	      	session()->setFlashdata('pesan', 'Data Pustaka Berhasil Ditambahkan.');
		    return redirect()->to(base_url('adm_katalog'));
	    }else{
	    	session()->setFlashdata('error', 'Data Pustaka Gagal Ditambahkan.');
			return redirect()->to(base_url('adm_katalog'));
	    }
    }

	public function detailubahbuku($kd_buku)
	{
		$all = $this->user->getPustakaKode($kd_buku);
		$drak = $this->rak->getRak();
		$data = [
			'title' 	=> 'Ubah Pustaka',
			'pustaka' 	=> $all,
			'rak' 		=> $drak,
			'rak'		=> $this->session->get(),
		];
		return view('admin/edit-katalog', $data);
	}

	public function ubahbuku($stat,$kd){
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
			if(!$ubah){
				return redirect()->to(base_url('adm_katalog'));
			}else{
				return redirect()->to(base_url('adm_katalog'));
			}
		}else{
			$data['pustaka'] = $this->pustaka->getPustaka($kd);
			return view('adm/ubah', $data);
		}
	}

    public function hapusbuku($kd_buku){
	    // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
	    $this->pustaka->HapusBuku($kd_buku);
		session()->setFlashdata('pesan','Data Pustaka Berhasil Dihapus');
		return redirect()->to(base_url('adm_katalog'));
    }
    // END CRUD Buku

	// START CRUD Pengguna
	public function user()
	{
		$all = $this->user->getUser();
		$data = [
			'title' => 'Kelola Pengguna',
			'usr' 	=> $all,
			'user'	=> $this->session->get(),
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
      	$pass = md5($this->request->getPost('pass'));

      	// Membuat array collection yang disiapkan untuk insert ke table
      	$data = [
			'kd_user' 	=> $kdu,
        	'nis' 		=> $nis,
			'nik' 		=> $nik,
        	'nama' 		=> $nama,
        	'jenkel' 	=> $jenkel,
        	'tgl_lahir' => $lahir,
        	'telp'		=> $telp,
        	'password' 	=> $pass,
        	'akses' 	=> $akses,
        	'tgl_daftar'=> $daftar
      	];

      	/*
      	Membuat variabel simpan yang isinya merupakan memanggil function
      	insert_product dan membawa parameter data
      	*/

		$simpan = $this->user->TambahUser($data);

		// Jika simpan berhasil, maka ...
        if(!$simpan){
	      	session()->setFlashdata('pesan', 'Data Pengguna Berhasil Ditambahkan.');
		    return redirect()->to(base_url('adm_user'));
	    }else{
	    	session()->setFlashdata('error', 'Data Pengguna Gagal Ditambahkan.');
			return redirect()->to(base_url('adm_user'));
	    }
    }

    public function detailubahuser($kd_user)
	{
		$all = $this->user->getUserKode($kd_user);
		$data = [
			'title' => 'Ubah Pengguna',
			'usr' 	=> $all,
			'user'	=> $this->session->get(),
		];
		return view('admin/edit-user', $data);
	}

    public function ubahuser($kd_user){
    	// dd($this->request->getVar());
		// Mengambil value dari form dengan method POST
      	$nis = $this->request->getPost('nis');
		$nik = $this->request->getPost('nik');
      	$nama = $this->request->getPost('nama');
      	$jenkel = $this->request->getPost('jk');
      	$lahir = $this->request->getPost('tgllahir');
      	$telp = $this->request->getPost('telp');
      	$akses = $this->request->getPost('akses');
      	$daftar = date('Y-m-d G:i:s');
      	$pass = md5($this->request->getPost('pass'));

      	// Membuat array collection yang disiapkan untuk insert ke table
      	$data = [
        	'nis' 		=> $nis,
			'nik' 		=> $nik,
        	'nama' 		=> $nama,
        	'jenkel' 	=> $jenkel,
        	'tgl_lahir' => $lahir,
        	'telp'		=> $telp,
        	'password' 	=> $pass,
        	'akses' 	=> $akses,
        	'tgl_update'=> $daftar
      	];

      	/*
      	Membuat variabel simpan yang isinya merupakan memanggil function
      	insert_product dan membawa parameter data
      	*/

      	$simpan = $this->user->UbahUser($data,$kd_user);

	    // Validasi Penyimpanan
      
	    if(!$simpan){
	      	session()->setFlashdata('pesan', 'Data Pengguna Berhasil Diubah.');
		    return redirect()->to(base_url('adm_user'));
	    }else{
	    	session()->setFlashdata('pesan', 'Data Pengguna Gagal Diubah.');
			return redirect()->to(base_url('adm_user'));
	    }
    }

	public function hapususer($kd_user){
	    // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
	    $this->user->HapusUser($kd_user);
		session()->setFlashdata('pesan','Data Pengguna Berhasil Dihapus');
		return redirect()->to(base_url('adm_user'));
    }
	// END CRUD Pengguna

	// START CRUD Laporan
	public function history()
	{
		$db      = \Config\Database::connect();
		$all = $db->table('history')->get()->getResultArray();
		$data = [
			'title' 	=> 'History',
			'history' 	=> $all,
			'user' 		=> $this->session->get(),
		];
		return view('admin/history', $data);
	}

	public function cetakkatalog()
	{
		date_default_timezone_set('Asia/Jakarta');
		$term = 'Mencari';
		$db = \Config\Database::connect();
		$all = $this->history->getHistory($term);
		$data = view('admin/print_pustaka',[
			'title' => 'Cetak Laporan Pustaka',
			'pustaka' => $all,
			'user' => $this->session->get(),
		]);
		$pdf = new \TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Dea Venditama');
		$pdf->SetTitle('Laporan Pustaka');
		$pdf->SetSubject('Laporan Pustaka');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($data, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output(date('d-m-Y').'_Laporan_Pustaka.pdf', 'I');

	}

	public function cetakhistory()
	{
		$term = 'Login';
		date_default_timezone_set('Asia/Jakarta');
		$db = \Config\Database::connect();
		$all = $db->table('history')->like('aksi',$term)->get()->getResultArray();
		$data = view('admin/print_history',[
			'title' => 'Cetak Laporan Pengunjung',
			'history' => $all,
			'user' => $this->session->get(),
		]);
		$pdf = new \TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Dea Venditama');
		$pdf->SetTitle('Laporan Pengunjung');
		$pdf->SetSubject('Laporan Pengunjung');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($data, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output(date('d-m-Y').'_Laporan_Pengunjung.pdf', 'I');
	}
	// END CRUD Laporan
}
