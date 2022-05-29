<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HakAkses extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_hak_akses'  => [
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
			'id_bagian'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '4',
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
		$this->forge->addKey('id_hak_akses', true);
		$this->forge->addForeignKey('id_arsip', 'tb_arsip', 'id_arsip', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_bagian', 'tb_bagian', 'id_bagian', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tb_hak_akses');
	}

	public function down()
	{
		$this->forge->dropTable('tb_hak_akses');
	}
}
