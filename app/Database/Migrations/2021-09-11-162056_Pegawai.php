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
			'no_telp' => [
				'type'           => 'varchar',
				'constraint'	 => '20',
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
			'created_at' => [
				'type'	=> 'datetime',
				'null'	=> true
			],
			'updated_at' => [
				'type'	=> 'datetime',
				'null'	=> true
			],
		]);
		$this->forge->addKey('nip', true);
		$this->forge->addForeignKey('id_bagian', 'tb_bagian', 'id_bagian', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tb_pegawai');
	}

	public function down()
	{
		$this->forge->dropTable('tb_pegawai');
	}
}
