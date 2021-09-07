<?php

namespace App\Models;

use CodeIgniter\Model;

class Biro_model extends Model
{
	protected $table                = 'tb_biro';
	protected $primaryKey           = 'id_biro';
	protected $allowedFields        = ['nama_biro'];

	// Dates
	protected $useTimestamps        = true;
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function getBiro($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		} else {
			return $this->asArray()->where(['id_biro' => $id])->first();
		}
	}

	public function getBiroByName($nama_biro)
	{
		$builder = $this->db->table($this->table);
		$builder->select('*');
		return $builder->getWhere(['nama_biro' => $nama_biro])->getRowArray();
	}

	public function insertBiro($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function updateBiro($data, $id)
	{
		return $this->db->table($this->table)->update($data, ['id_biro' => $id]);
	}

	public function deleteBiro($id)
	{
		return $this->db->table($this->table)->delete(['id_biro' => $id]);
	}
}
