<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\HistoryModel;

class Auth extends BaseController
{
	// ROOT
	protected $user;
	protected $his;
	public function __construct() {
		$this->user = new UserModel();
		$this->his = new HistoryModel();
	}

	public function index()
	{
 		return view('login-user');
	}

	public function login()
	{
		$nis = $this->request->getPost('nis');
		$password1 = $this->request->getPost('password');
		$password = md5($password1);
		$ceknis = $this->user->where('nis', $nis)->first();
		$ceknik = "";
		if($ceknis==null){
			$ceknik = $this->user->where('nik', $nis)->first();
			$data = $ceknik;
		}else{
			$data = $ceknis;
		}
		if($data){
            $pass = $data['password'];
            // $verify_pass = password_verify($password, $pass);
            if($password == $pass){
                $ses_data = [
					'kd_user' 	=> $data['kd_user'],
                    'nis' 		=> $data['nis'],
					'nik'       => $data['nik'],
                    'nama'     	=> $data['nama'],
                    'jenkel'    => $data['jenkel'],
					'tgllahir'	=> $data['tgl_lahir'],
					'telp'		=> $data['telp'],
					'akses'		=> $data['akses'],
                    'logged_in' => TRUE
                ];
				$input = [
					'kd_user' 	=> $ses_data['kd_user'],
					'aksi' 		=> $ses_data['nama'].' Telah Login ke Sistem',
					'akses' 	=> $ses_data['akses'],
					'tgl_akses' => date('Y-m-d H:i:s'),
				];
				$this->his->TambahHistory($input);
                session()->set($ses_data);
								//Berhasil
                if($ses_data['akses']=='pus'){
					return redirect()->to('/adm');
				}else{
					return redirect()->to('/');
				}
			}else{
				//Password Salah
				session()->setFlashdata('pesan', 'Password Salah!');
                return redirect()->to('/login');
            }
        }else{
			//NIS/NIK tidak ada
			session()->setFlashdata('pesan', 'NIS/NIK Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }
	//--------------------------------------------------------------------

	public function logout()
    {
		$input = [
			'kd_user'	=> session()->get('kd_user'),
			'aksi' 		=> session()->get('nama').' Telah Logout dari Sistem',
			'akses' 	=> session()->get('akses'),
			'tgl_akses' => date('Y-m-d H:i:s'),
		];
		$this->his->TambahHistory($input);
        session()->destroy();
        session()->setFlashdata('pesan','Berhasil Keluar');
        return redirect()->to('/login');
    }
}
