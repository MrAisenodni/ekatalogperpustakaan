<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
                $data = [
												'kd_user' => '01012021P001',
                        'nik' => '1234',
                        'nama'    => 'Administrator',
												'jenkel'    => 'L',
												'tgl_lahir'    => '2021-01-01',
												'password'    => md5('admin'),
												'akses'    => 'pus',
												'tgl_daftar'    => date('Y-m-d G:i:s'),
                ];
								$data1 = [
												'kd_user' => '01012021U002',
                        'nis' => '5678',
                        'nama'    => 'User',
												'jenkel'    => 'P',
												'tgl_lahir'    => '2021-01-01',
												'password'    => md5('sementara'),
												'akses'    => 'usr',
												'tgl_daftar'    => date('Y-m-d G:i:s'),
                ];

                // Using Query Builder
                $this->db->table('user')->insert($data);
								$this->db->table('user')->insert($data1);
	}
}
