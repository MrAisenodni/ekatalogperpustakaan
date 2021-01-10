<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
                        'nis'          => [
                                'type'           => 'VARCHAR',
                                'constraint'     => 10,
                        ],
                        'nama'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'jenkel' => [
																'type'           => 'ENUM',
																'constraint'     => ['L','P'],
                        ],
												'tgl_lahir' => [
																'type'           => 'DATE',
																'null'					 => true,
                        ],
												'telp' => [
																'type'           => 'VARCHAR',
																'constraint'     => '13',
																'null'					 => true,
                        ],
												'password' => [
																'type'           => 'VARCHAR',
																'constraint'     => '100',
                        ],
												'akses' => [
																'type'           => 'ENUM',
																'constraint'     => ['usr','pus'],
                        ],
												'tgl_daftar' => [
																'type'           => 'DATETIME',
                        ],
                ]);
                $this->forge->addKey('nis', true);
                $this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
