<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bagian_model;
use App\Models\Biro_model;

class Bagian extends BaseController
{
	public function __construct()
	{
		$this->bagian_model = new Bagian_model();
		$this->biro_model = new Biro_model();

		$this->validation = \Config\Services::validation();
		$this->rules = [
			'nama_bagian' => [
				'label'  => 'nama_bagian',
				'rules'  => 'required|max_length[100]',
				'errors' => [
					'required' => 'Nama bagian tidak boleh kosong',
					'max_length[100]' => 'Maksimal karakter adalah 100'
				]
			],
		];
	}

	public function index()
	{
		$data = [
			'title' 	=> 'Data Master Bagian',
			'listBagian' 	=> $this->bagian_model->getBagian(),
		];
		return view('/bagian/index', $data);
	}

	public function detail($id)
	{

		$data = [
			'title' 	=> 'Data Master Bagian',
			'bagian' 	=> $this->bagian_model->getBagian($id),
		];
		if (empty($data['bagian'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}
		return view('/bagian/detail', $data);
	}

	public function create()
	{
		$data = [
			'title' 		=> 'Tambah Data Master Bagian',
			'validation' 	=> $this->validation,
			'listBiro'		=> $this->biro_model->getBiro()
		];
		return view('/bagian/create', $data);
	}

	public function store()
	{
		$biro = $this->biro_model->getBiroByName($this->request->getPost('nama_biro'));
		if (!empty($biro)) {
			$data = [
				'id_bagian' => $this->bagian_model->generateId($biro['id_biro']),
				'id_biro' => $biro['id_biro'],
				'nama_bagian' => $this->request->getPost('nama_bagian')
			];
			if ($this->validation->run($data, 'bagianRules')) {
				$this->bagian_model->insertBagian($data);
				session()->setFlashdata('msg', 'Tambah data bagian berhasil');
				session()->setFlashdata('color', 'success');
			} else {
				return redirect()->to(base_url() . '/bagian/create')->withInput()->with('validation', $this->validation);
			}
		} else {
			session()->setFlashdata('msg', 'Tambah data bagian gagal');
			session()->setFlashdata('color', 'danger');
		}
		return redirect()->to(base_url() . '/bagian');
	}

	public function edit($id)
	{
		$data = [
			'title' 		=> 'Update Data Master Bagian',
			'validation' 	=> $this->validation,
			'bagian' 		=> $this->bagian_model->getBagian($id),
			'listBiro'		=> $this->biro_model->getBiro()
		];
		if (empty($data['bagian'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}

		return view('bagian/edit', $data);
	}

	public function update($id)
	{
		$biro = $this->biro_model->getBiroByName($this->request->getPost('nama_biro'));
		if (!empty($biro)) {
			$data = [
				'id_biro' => $biro['id_biro'],
				'nama_bagian' => $this->request->getPost('nama_bagian')
			];
			if ($this->validation->run($data, 'bagianRules')) {
				$this->bagian_model->updateBagian($data, $id);
				session()->setFlashdata('msg', 'Update data bagian berhasil');
				session()->setFlashdata('color', 'success');
			} else {
				return redirect()->to(base_url() . '/bagian/edit/' . $id)->withInput()->with('validation', $this->validation);
			}
		} else {
			session()->setFlashdata('msg', 'Update data bagian gagal');
			session()->setFlashdata('color', 'danger');
		}
		return redirect()->to(base_url() . '/bagian');
	}

	public function delete($id)
	{
		if ($this->bagian_model->deleteBagian($id)) {
			session()->setFlashdata('msg', 'Hapus data bagian berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/bagian');
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}
	}
}
