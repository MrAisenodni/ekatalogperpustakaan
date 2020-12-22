<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends Controller
{
  public function __construct() {

      // Mendeklarasikan class ProductModel menggunakan $this->product
      $this->user = new UserModel();
      /* Catatan:
      Apa yang ada di dalam function construct ini nantinya bisa digunakan
      pada function di dalam class Product
      */
  }
  public function index()
    {
        $data['user'] = $this->user->getUser();
        return view('user/index', $data);
    }
  public function tambah($stat)
    {
      if($stat=='submit'){
      date_default_timezone_set('Asia/Jakarta');
      // Mengambil value dari form dengan method POST
      $nis = $this->request->getPost('nis');
      $nama = $this->request->getPost('nama');
      $jenkel = $this->request->getPost('jenkel');
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
        return redirect()->to(base_url('user/index'));
      }else{
        return redirect()->to(base_url('user/create'));
      }
    }else{
      return view('user/tambah');
    }
    }

    function ubah($stat,$nis){
      if($stat=='submit'){
        // Mengambil value dari form dengan method POST
        $nama = $this->request->getPost('nama');
        $jenkel = $this->request->getPost('jenkel');
        $lahir = $this->request->getPost('tgllahir');
        $telp = $this->request->getPost('telp');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
          'nama' => $nama,
          'jenkel' => $jenkel,
          'tgl_lahir' => $lahir,
          'telp' => $telp
        ];

        /*
        Membuat variabel ubah yang isinya merupakan memanggil function
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->user->UbahUser($data, $nis);

        // Jika berhasil melakukan ubah
        if(!$ubah)
        {
          return redirect()->to(base_url('user'));
        }else{
          return redirect()->to(base_url('user/ubah'));
        }
      }else{
        $data['user'] = $this->user->getUser($nis);
        return view('user/ubah', $data);
      }
    }
    function hapus($kd){
      // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
    $hapus = $this->user->HapusUser($kd);

    // Jika berhasil melakukan hapus
    if($hapus)
    {
        return redirect()->to(base_url('user'));
    }
    }
}
