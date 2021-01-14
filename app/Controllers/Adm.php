<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PustakaModel;
use App\Models\UserModel;
use App\Models\RakModel;
// use App\Controller\Auth;

class Adm extends Controller{

// ROOT
	protected $pustaka;
	protected $user;
	protected $rak;
	public function __construct() {
			$this->pustaka = new PustakaModel();
			$this->user = new UserModel();
			$this->rak = new RakModel();
	}

	public function index()
	{
		$pus = $this->pustaka->countAllResults();
		$usr = $this->user->countAllResults();
		$data = [
			'title' => 'Dashboard',
			'numpus' => $pus,
			'numusr' => $usr,
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
			'user' => $all,
		];
		return view('admin/user', $data);
	}

	public function tambahuser()
    {
      date_default_timezone_set('Asia/Jakarta');
      // Mengambil value dari form dengan method POST
      $nis = $this->request->getPost('nis');
      $nama = $this->request->getPost('nama');
      $jenkel = $this->request->getPost('jk');
      $lahir = $this->request->getPost('tgllahir');
      $telp = $this->request->getPost('telp');
      $akses = $this->request->getPost('akses');
      $daftar = date('Y-m-d G:i:s');
      $pass = MD5('sementara');

      // Membuat array collection yang disiapkan untuk insert ke table
      $data = [
        'nis' => $nis,
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

	//--------------------------------------------------------------------

}
