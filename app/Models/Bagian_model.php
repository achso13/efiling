<?php

namespace App\Models;

use CodeIgniter\Model;

class Bagian_model extends Model
{
	protected $table                = 'tb_bagian';
	protected $primaryKey			= 'id_bagian';
	protected $allowedFields        = ['id_bagian', 'nama_bagian', 'id_biro'];
	protected $useTimestamps        = true;
	protected $useAutoIncrement = false;

	public function getBagian($id = false)
	{
		$builder = $this->db->table($this->table);
		$builder->select('*');
		$builder->join('tb_biro', 'tb_biro.id_biro = tb_bagian.id_biro');

		if ($id === false) {
			return $builder->get()->getResultArray();
		} else {
			return $builder->getWhere(['id_bagian' => $id])->getRowArray();
		}
	}

	public function generateId($idBiro)
	{
		// Ambil max id bagian
		$builder = $this->db->table($this->table);
		$maxIdBagian = substr($builder->selectMax('id_bagian')->getWhere(['id_biro' => $idBiro])->getRowArray()['id_bagian'], -2);

		$idBaru = sprintf("%02d", $idBiro) . sprintf("%02d", intval($maxIdBagian) + 1);

		return $idBaru;
	}

	// public function insertBagian($data)
	// {
	// 	return $this->db->table($this->table)->insert($data);
	// }

	// public function updateBagian($data, $id)
	// {
	// 	return $this->db->table($this->table)->update($data, ['id_bagian' => $id]);
	// }

	// public function deleteBagian($id)
	// {
	// 	return $this->db->table($this->table)->delete(['id_bagian' => $id]);
	// }
}
