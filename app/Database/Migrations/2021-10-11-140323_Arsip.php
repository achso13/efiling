<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Arsip extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_arsip' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'auto_increment' => true,
				'unsigned'       => true,
			],
			'id_jenis_arsip' 			  => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			'nip' => [
				'type'           => 'VARCHAR',
				'constraint'     => '18',
			],
			'no_arsip'          => [
				'type'           => 'VARCHAR',
				'constraint'	 => '128',
			],
			'deksripsi_arsip' => [
				'type'           => 'TEXT',
			],
			'masa_retensi' => [
				'type'           => 'DATE',
			],
			'status'          => [
				'type'           => 'ENUM',
				'constraint'	 => ['Aktif', 'Nonaktif'],
				'default'        => 'Aktif',
			],
			'created_at' => [
				'type'	=> 'datetime',
				'null'	=> true
			],
			'updated_at' => [
				'type'	=> 'datetime',
				'null'	=> true
			],
		]);
		$this->forge->addKey('id_arsip', true);
		$this->forge->addForeignKey('id_jenis_arsip', 'tb_jenis_arsip', 'id_jenis_arsip', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('nip', 'tb_pegawai', 'nip', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tb_arsip');
	}

	public function down()
	{
		$this->forge->dropTable('tb_arsip');
	}
}
