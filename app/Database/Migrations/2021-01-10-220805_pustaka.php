<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pustaka extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'kd_buku'		=> [
                'type'          => 'VARCHAR',
                'constraint'    => 13,
            ],
            'judul'			=> [
                'type'			=> 'VARCHAR',
                'constraint'    => '100',
            ],
            'pengarang'		=> [
				'type'          => 'VARCHAR',
				'constraint'    => '100',
				'null'			=> true,
            ],
			'tmpt_terbit' 	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '20',
				'null'			=> true,
            ],
			'penerbit' 		=> [
				'type'          => 'VARCHAR',
				'constraint'    => '100',
				'null'			=> true,
            ],
			'tahun' 		=> [
				'type'         	=> 'YEAR',
				'null'			=> true,
            ],
			'halaman' 		=> [
				'type'          => 'INT',
				'constraint'    => '5',
				'null'			=> true,
            ],
			'kd_rak' 		=> [
				'type'          => 'INT',
				'constraint'    => '5',
            ],
            'tgl_tambah'	=> [
				'type'          => 'DATE',
            ],
            'tgl_ubah' 		=> [
				'type'          => 'DATE',
            ],
        ]);
        $this->forge->addKey('kd_buku', true);
        $this->forge->createTable('pustaka');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pustaka');
	}
}
