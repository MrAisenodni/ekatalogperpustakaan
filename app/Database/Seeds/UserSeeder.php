<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
        $data = [
			'kd_user' 		=> '01012021P001',
            'nik' 			=> '1710512053',
            'nama'    		=> 'Muhammad Fiqri Alfayed',
			'jenkel'    	=> 'L',
			'tgl_lahir'		=> '1998-10-07',
			'telp'    		=> '085889784451',
			'password' 	 	=> md5('admin'),
			'akses'    		=> 'pus',
			'tgl_daftar'	=> date('Y-m-d G:i:s'),
        ];
		$data1 = [
			'kd_user' 		=> '01012021U002',
		    'nis' 			=> '1710512010',
		    'nama'    		=> 'Siti Fatimah',
			'jenkel'    	=> 'P',
			'tgl_lahir'    	=> '1999-10-09',
			'telp'    		=> '0895333093116',
			'password'    	=> md5('user'),
			'akses'    		=> 'usr',
			'tgl_daftar'    => date('Y-m-d G:i:s'),
        ];

        // Using Query Builder
        $this->db->table('user')->insert($data);
		$this->db->table('user')->insert($data1);
	}
}
