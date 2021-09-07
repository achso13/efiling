<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Biro_model;

class Biro extends BaseController
{
	public function __construct()
	{
		$this->biro_model = new Biro_model();

		$this->validation = \Config\Services::validation();
		$this->rules = [
			'nama_biro' => [
				'label'  => 'nama_biro',
				'rules'  => 'required|required|max_length[100]',
				'errors' => [
					'required' => 'Nama biro tidak boleh kosong',
					'max_length[100]' => 'Maksimal karakter adalah 100'
				]
			],
		];
	}

	public function index()
	{
		$data = [
			'title' 	=> 'Data Master Biro',
			'listBiro' 	=> $this->biro_model->getBiro(),
		];
		return view('/biro/index', $data);
	}

	public function detail($id)
	{
		$data = [
			'title' 	=> 'Data Master Biro',
			'biro' 	=> $this->biro_model->getBiro($id),
		];
		return view('/biro/detail', $data);
	}

	public function create()
	{
		$data = [
			'title' 		=> 'Tambah Data Master Biro',
			'validation' 	=> $this->validation
		];
		return view('/biro/create', $data);
	}

	public function store()
	{
		if ($this->validate($this->rules)) {
			$data = [
				'nama_biro' => $this->request->getPost('nama_biro'),
			];
			$this->biro_model->insertBiro($data);
			session()->setFlashdata('msg', 'Tambah data biro berhasil');
			return redirect()->to(base_url() . '/biro');
		} else {
			return redirect()->to(base_url() . '/biro/create')->withInput()->with('validation', $this->validation);
		}
	}

	public function edit($id)
	{
		$data = [
			'title' 		=> 'Update Data Master Biro',
			'validation' 	=> $this->validation,
			'biro' 			=> $this->biro_model->getBiro($id)
		];
		if (empty($data['biro'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Biro dengan id ' . $id . ' tidak ditemukan ');
		}

		return view('biro/edit', $data);
	}

	public function update($id)
	{
		if ($this->validate($this->rules)) {
			$data = [
				'nama_biro' => $this->request->getPost('nama_biro'),
			];
			$this->biro_model->updateBiro($data, $id);
			session()->setFlashdata('msg', 'Update data biro berhasil');
			return redirect()->to(base_url() . '/biro');
		} else {
			return redirect()->to(base_url() . '/biro/edit/' . $id)->withInput()->with('validation', $this->validation);
		}
	}

	public function delete($id)
	{
		if ($this->biro_model->deleteBiro($id)) {
			session()->setFlashdata('msg', 'Hapus data biro berhasil');
			return redirect()->to(base_url() . '/biro');
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Biro dengan id ' . $id . ' tidak ditemukan ');
		}
	}
}
