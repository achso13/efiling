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
		if (empty($data['biro'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}
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
		$data = [
			'nama_biro' => $this->request->getPost('nama_biro'),
		];
		if ($this->validation->run($data, 'biroRules')) {
			$this->biro_model->insert($data);
			session()->setFlashdata('msg', 'Tambah data biro berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/biro');
		} else {
			return redirect()->to(base_url() . '/biro/create')->withInput();
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
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}

		return view('biro/edit', $data);
	}

	public function update($id)
	{
		$data = [
			'nama_biro' => $this->request->getPost('nama_biro'),
		];
		if ($this->validation->run($data, 'biroRules')) {
			$this->biro_model->update($id, $data);
			session()->setFlashdata('msg', 'Update data biro berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/biro');
		} else {
			return redirect()->to(base_url() . '/biro/edit/' . $id)->withInput();
		}
	}

	public function delete($id)
	{
		if ($this->biro_model->delete($id)) {
			session()->setFlashdata('msg', 'Hapus data biro berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/biro');
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}
	}
}
