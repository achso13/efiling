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
			'nama_pegawai' 	=> 'Achmad Solehuddin',
			'password'    	=> password_hash('03202485', PASSWORD_DEFAULT),
			'tgl_lahir'		=> '07-29-1999',
			'alamat'		=> 'Tanah Baru, Depok',
			'no_telp'		=> '085156879802',
			'email'    		=> 'achmads@upnvj.ac.id',
			'id_bagian'		=> '0101',
			'foto'    		=> 'default.png',
			'role'    		=> 'Admin',
		];

		$this->db->table('tb_pegawai')->insert($data);
	}
}
