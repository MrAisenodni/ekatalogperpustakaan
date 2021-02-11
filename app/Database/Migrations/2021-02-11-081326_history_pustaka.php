<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class History extends Migration
{
	public function up()
	{
		$this->forge->addField([
	        'kd_buku'	=> [
	            'type'          => 'VARCHAR',
				'constraint'    => 13,
			],
	        'kd_rak'	=> [
	            'type'          => 'INT',
				'constraint'    => 5,
			],
			'admin'		=> [
				'type'          => 'VARCHAR',
				'constraint'    => '100',
			],
			'tgl_masuk' => [
				'type'			=> 'DATE',
				'null'			=> true,
			],
			'tgl_pindah' => [
				'type'			=> 'DATE',
				'null'			=> true,
			],
	    ]);
	    $this->forge->createTable('history_pustaka');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('history_pustaka');
	}
}
