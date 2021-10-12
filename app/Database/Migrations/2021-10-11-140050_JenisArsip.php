<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisArsip extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_jenis_arsip' 			  => [
				'type'           => 'INT',
				'constraint'     => '11',
				'auto_increment' => true,
				'unsigned'       => true,
			],
			'nama_jenis_arsip'    => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '128',
			],
		]);
		$this->forge->addKey('id_jenis_arsip', true);
		$this->forge->createTable('tb_jenis_arsip');
	}

	public function down()
	{
		$this->forge->dropTable('tb_jenis_arsip');
	}
}
