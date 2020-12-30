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

                // Simple Queries
                $this->db->query("INSERT INTO user(nis,nama,jenkel,password,akses,tgl_daftar) VALUES(:nis:,:nama:,:jenkel:,:password:,:akses:,:tgl_daftar:)",
                        $data
                );

                // Using Query Builder
                $this->db->table('user')->insert($data);
	}
}
