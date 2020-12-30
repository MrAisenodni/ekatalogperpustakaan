<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends BaseController
{
	// ROOT
		protected $user;
		public function __construct() {
				$this->user = new UserModel();
		}

	public function index()
	{
 		return view('login-user');
	}

	public function login()
	{
		$session = session();
		$nis = $this->request->getPost('nis');
		$password1 = $this->request->getPost('password');
		$password = md5($password1);
		$data = $this->user->where('nis', $nis)->first();
		if($data){
            $pass = $data['password'];
            // $verify_pass = password_verify($password, $pass);
            if($password == $pass){
                $ses_data = [
                    'nis'       => $data['nis'],
                    'nama'     => $data['nama'],
                    'jenkel'    => $data['jenkel'],
										'tgllahir'    => $data['tgl_lahir'],
										'telp'    => $data['telp'],
										'akses'    => $data['akses'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
								//Berhasil
                if($ses_data['akses']=='pus'){
									return redirect()->to('/adm');
								}else{
									return redirect()->to('/');
								}
            }else{
								//Password Salah
								$session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
						//NIS tidak ada
						$session->setFlashdata('msg', 'NIS not Found');
            return redirect()->to('/login');
        }
    }
	//--------------------------------------------------------------------

	public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

}
