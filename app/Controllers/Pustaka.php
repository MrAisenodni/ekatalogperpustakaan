<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PustakaModel;

class Pustaka extends Controller
{
  public function __construct() {
      $this->pustaka = new PustakaModel();
  }
  public function index()
    {
        $data['pustaka'] = $this->pustaka->getPustaka();
        return view('pustaka/index', $data);
    }
  public function tambah($stat)
    {
      if($stat=='submit'){
      $data = $this->pustaka->KodeBuku();
      $kd = "";
      $jadi = "";
      date_default_timezone_set('Asia/Jakarta');
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
                $jadi = str_replace(" ","",date('Ymis')."001");
              }
      // Mengambil value dari form dengan method POST
      $kd_buku = $jadi;
      $jdl = $this->request->getPost('judul');
      $peng = $this->request->getPost('pengarang');
      $edit = $this->request->getPost('editor');
      $terbit = $this->request->getPost('penerbit');
      $thn = $this->request->getPost('tahun');
      $hal = $this->request->getPost('halaman');
      $loc = $this->request->getPost('lokasi');

      // Membuat array collection yang disiapkan untuk insert ke table
      $data = [
        'kd_buku' => $kd_buku,
        'judul' => $jdl,
        'pengarang' => $peng,
        'editor' => $edit,
        'penerbit' => $terbit,
        'tahun' => $thn,
        'halaman' => $hal,
        'lokasi' => $loc
      ];

      /*
      Membuat variabel simpan yang isinya merupakan memanggil function
      insert_product dan membawa parameter data
      */
      $simpan = $this->pustaka->TambahBuku($data);

      // Jika simpan berhasil, maka ...
      if(!$simpan){
        return redirect()->to(base_url('pustaka/index'));
      }else{
        return redirect()->to(base_url('pustaka/tambah'));
      }
    }else{
      return view('pustaka/tambah');
    }
    }

    function ubah($stat,$kd){
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
          return redirect()->to(base_url('pustaka'));
        }else{
          return redirect()->to(base_url('pustaka/ubah'));
        }
      }else{
        $data['pustaka'] = $this->pustaka->getPustaka($kd);
        return view('pustaka/ubah', $data);
      }
    }
    function hapus($kd){
      // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
    $hapus = $this->pustaka->HapusBuku($kd);

    // Jika berhasil melakukan hapus
    if($hapus)
    {
        return redirect()->to(base_url('pustaka'));
    }
    }
}
