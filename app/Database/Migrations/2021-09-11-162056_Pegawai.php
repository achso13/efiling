<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'nip' 			  => [
				'type'           => 'VARCHAR',
				'constraint'     => '18',
				'unique'         => true,
			],
			'nama_pegawai'    => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '128',
			],
			'password'          => [
				'type'           => 'VARCHAR',
				'constraint'	 => '128',
			],
			'tgl_lahir' => [
				'type'           => 'DATE',
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255',
			],
			'no_telp' => [
				'type'           => 'varchar',
				'constraint'	 => '32',
			],
			'email'          => [
				'type'           => 'VARCHAR',
				'constraint'	 => '128',
			],
			'id_bagian'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '4',
			],
			'foto'          => [
				'type'           => 'VARCHAR',
				'constraint'	 => '128',
				'default'        => 'default.png',
			],
			'role'          => [
				'type'           => 'ENUM',
				'constraint'	 => ['Admin', 'Pegawai'],
				'default'        => 'Pegawai',
			],
		]);
		$this->forge->addKey('nip', true);
		$this->forge->createTable('tb_pegawai');
	}

	public function down()
	{
		$this->forge->dropTable('tb_pegawai');
	}
}
