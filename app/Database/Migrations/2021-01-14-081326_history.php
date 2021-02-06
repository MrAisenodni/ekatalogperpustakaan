<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class History extends Migration
{
	public function up()
	{
		$this->forge->addField([
	        'kd_user'	=> [
			            'type'           => 'VARCHAR',
						'constraint'     => 12,
						],
			'aksi'		=> [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
						],
			'akses' 	=> [
						'type'           => 'ENUM',
						'constraint'     => ['usr','pus'],
						],
			'tgl_akses' => [
						'type'			=> 'DATETIME',
						'null'			=> true,
					    ],
	    ]);
	    $this->forge->createTable('history');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('history');
	}
}
