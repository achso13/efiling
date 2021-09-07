<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bagian extends Migration
{
	public function up()
	{
<<<<<<< HEAD
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'bagian_id'          => [
				'type'           => 'INT',
				'constraint'     => 4,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'bagian_nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'bagian_nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'biro_id'          => [
				'type'           => 'INT ZEROFILL',
				'constraint'     => 2,
				'unsigned'       => true,
			],
		]);
		$this->forge->addKey('bagian_id', true);
		$this->forge->createTable('tb_bagian');
		$this->forge->addForeignKey('biro_id', 'tb_biro', 'biro_id', 'CASCADE', 'CASCADE');
		$this->db->enableForeignKeyChecks();
=======
		$this->forge->addField([
			'id_bagian'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '4',
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
			'created_at'    => [
				'type'      => 'DATETIME',
				'null'		=> true,
			],
			'updated_at'    => [
				'type'      => 'DATETIME',
				'null'		=> true,
			],

		]);
		$this->forge->addKey('id_bagian', true);
		$this->forge->addForeignKey('id_biro', 'tb_biro', 'id_biro', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tb_bagian');
>>>>>>> 238e53a5db9bd1afbf5cd6ca68ed3d26eaad4c47
	}

	public function down()
	{
		$this->forge->dropTable('tb_bagian');
	}
}
