<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rak extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'kd_rak'	=> [
                'type'          => 'INT',
                'constraint'    => 5,
            ],
            'nama'		=> [
                'type'			=> 'VARCHAR',
                'constraint'	=> '100',
            ],
			'no_lemari'	=> [
				'type'			=> 'INT',
				'constraint'	=> '3',
				'null'			=> true,
            ],
			'no_rak'	=> [
				'type'          => 'INT',
				'constraint'    => '3',
				'null'			=> true,
            ],
            'jenis' 	=> [
				'type'          => 'VARCHAR',
				'constraint'    => '100',
				'null'			=> true,
            ],
			'gambar' 	=> [
				'type'          => 'VARCHAR',
				'constraint'    => '100',
				'null'			=> true,
            ],
        ]);
        $this->forge->addKey('kd_rak', true);
        $this->forge->createTable('rak');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('rak');
	}
}
