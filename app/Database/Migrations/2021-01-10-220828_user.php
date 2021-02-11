<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kd_user'		=> [
				'type'          => 'VARCHAR',
				'constraint'    => 12,
			],
			'nis'			=> [
				'type'          => 'VARCHAR',
				'constraint'    => 10,
				'null'			=> true,
	        ],
			'nik'			=> [
	            'type'          => 'VARCHAR',
	            'constraint'	=> 16,
				'null'			=> true,
	        ],
	        'nama'			=> [
	            'type'          => 'VARCHAR',
	            'constraint'    => '100',
	        ],
	        'jenkel' 		=> [
				'type'          => 'ENUM',
				'constraint'    => ['L','P'],
	        ],
			'tgl_lahir' 	=> [
				'type'          => 'DATE',
	        ],
			'telp'			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '13',
				'null'			=> true,
	        ],
			'password'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '100',
	        ],
			'akses'			=> [
				'type'			=> 'ENUM',
				'constraint'	=> ['usr','pus'],
	        ],
			'tgl_daftar'	=> [
				'type'			=> 'DATETIME',
	        ],
	        'tgl_update'	=> [
				'type'			=> 'DATETIME',
	        ],
        ]);
        $this->forge->addKey('kd_user', true);
        $this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
