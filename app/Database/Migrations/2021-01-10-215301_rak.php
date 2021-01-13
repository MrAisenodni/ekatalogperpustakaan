<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rak extends Migration
{
	public function up()
	{
		$this->forge->addField([
                        'kd_rak'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
																'auto_increment' => true,
                        ],
                        'nama'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'jenis' => [
																'type'           => 'VARCHAR',
																'constraint'     => '100',
																'null'					 => true,
                        ],
												'gambar' => [
																'type'           => 'VARCHAR',
																'constraint'     => '100',
																'null'					 => true,
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
