<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bagian extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bagian'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '4',
				'unique'         => true,
			],
			'nama_bagian'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' 		 => true,
			],
			'id_biro'          => [
				'type'           => 'INT',
				'constraint'	 => '2',
				'unsigned'       => true,
			],
		]);
		$this->forge->addKey('id_bagian', true);
		$this->forge->addForeignKey('id_biro', 'tb_biro', 'id_biro', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tb_bagian');
	}

	public function down()
	{
		$this->forge->dropTable('tb_bagian');
	}
}
