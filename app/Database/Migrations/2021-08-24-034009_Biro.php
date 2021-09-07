<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Biro extends Migration
{
	public function up()
	{
		$this->forge->addField([
<<<<<<< HEAD
			'biro_id'          => [
				'type'           => 'INT ZEROFILL',
				'constraint'     => 2,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'biro_nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('biro_id', true);
=======
			'id_biro'          => [
				'type'           => 'INT',
				'constraint'	 => '2',
				'auto_increment' => true,
				'unsigned'       => true,
			],
			'nama_biro'      => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
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
		$this->forge->addKey('id_biro', true);
>>>>>>> 238e53a5db9bd1afbf5cd6ca68ed3d26eaad4c47
		$this->forge->createTable('tb_biro');
	}

	public function down()
	{
		$this->forge->dropTable('tb_biro');
	}
}
