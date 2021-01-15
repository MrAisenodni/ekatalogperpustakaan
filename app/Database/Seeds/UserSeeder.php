<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
                $data = [
                        'nis' => '1234',
                        'nama'    => 'Administrator',
												'jenkel'    => 'L',
												'password'    => md5('admin'),
												'akses'    => 'pus',
												'tgl_daftar'    => date('Y-m-d G:i:s'),
                ];
								$data1 = [
                        'nis' => '5678',
                        'nama'    => 'User',
												'jenkel'    => 'P',
												'password'    => md5('sementara'),
												'akses'    => 'usr',
												'tgl_daftar'    => date('Y-m-d G:i:s'),
                ];

                // Using Query Builder
                $this->db->table('user')->insert($data);
								$this->db->table('user')->insert($data1);
	}
}
