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
			],
			'nama_pegawai'    => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '255',
				'null' 		 	 => true,
			],
			'jenis_kelamin'  => [
				'type'        	 => 'ENUM',
				'constraint'  	 => ['L', 'P'],
				'default'     	 => 'L',
			],
			'email'          => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255',
			],
			'password'          => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255',
			],
			'role'          => [
				'type'           => 'ENUM',
				'constraint'	 => ['Admin', 'Pegawai'],
				'default'        => 'Pegawai',
			],
			'foto'          => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255',
				'default'        => 'default.png',
			],
			'created_at'    => [
				'type'      => 'DATETIME',
				'null'		=> true,
			],
			'updated_at'    => [
				'type'      => 'DATETIME',
				'null'		=> true,
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
