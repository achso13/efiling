<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PegawaiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'nip' 			=> '12345',
			'nama_pegawai' 	=> 'Pegawai Test',
			'jenis_kelamin'	=> 'L',
			'email'    		=> 'testpegawai@gmail.com',
			'password'    	=> password_hash('12345', PASSWORD_DEFAULT),
			'role'    		=> 'Admin',
			'foto'    		=> 'default.png',
			'id_bagian'		=> '0101',
			'created_at'    => Time::now(),
			'updated_at'    => Time::now(),
		];

		$this->db->table('tb_pegawai')->insert($data);
	}
}
