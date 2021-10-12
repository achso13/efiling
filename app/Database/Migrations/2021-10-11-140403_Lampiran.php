<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lampiran extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_lampiran' 			  => [
				'type'           => 'INT',
				'constraint'     => '11',
				'auto_increment' => true,
				'unsigned'       => true,
			],
			'id_arsip' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			'nama_file' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'tanggal_upload'          => [
				'type'           => 'DATETIME',
			],
		]);
		$this->forge->addKey('id_lampiran', true);
		$this->forge->addForeignKey('id_arsip', 'tb_arsip', 'id_arsip', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tb_lampiran');
	}

	public function down()
	{
		$this->forge->dropTable('tb_lampiran');
	}
}
