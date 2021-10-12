<?php

namespace App\Models;

use CodeIgniter\Model;

class Pegawai_model extends Model
{
	protected $table                = 'tb_pegawai';
	protected $primaryKey           = 'nip';
	protected $allowedFields        = ['nip, nama_pegawai, jenis_kelamin, email, password, role, foto'];

	public function getPegawai($id = false)
	{
		$builder = $this->db->table($this->table);
		$builder->select('tb_pegawai.*, tb_bagian.nama_bagian, tb_biro.nama_biro, tb_biro.id_biro');
		$builder->join('tb_bagian', 'tb_bagian.id_bagian = tb_pegawai.id_bagian');
		$builder->join('tb_biro', 'tb_biro.id_biro = tb_bagian.id_biro');

		if ($id === false) {
			return $builder->get()->getResultArray();
		} else {
			return $builder->getWhere(['nip' => $id])->getRowArray();
		}
	}

	public function insertPegawai($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function updatePegawai($data, $id)
	{
		return $this->db->table($this->table)->update($data, ['nip' => $id]);
	}

	public function deletePegawai($id)
	{
		return $this->db->table($this->table)->delete(['nip' => $id]);
	}
}
