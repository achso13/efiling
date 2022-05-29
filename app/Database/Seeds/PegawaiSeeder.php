<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PegawaiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'nip' 			=> '1810512094',
			'nama_pegawai' 	=> 'John Doe',
			'password'    	=> password_hash('12345', PASSWORD_DEFAULT),
			'tgl_lahir'		=> '2000-04-20',
			'no_telp'		=> '1234567890',
			'email'    		=> 'email@email.com',
			'id_bagian'		=> '0101',
			'foto'    		=> 'default.png',
			'role'    		=> 'Admin',
		];

		$this->db->table('tb_pegawai')->insert($data);
	}
}
