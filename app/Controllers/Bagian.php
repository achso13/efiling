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
		$data = [
			'id_biro' => $this->request->getVar('biro'),
			'nama_bagian' => $this->request->getVar('nama_bagian')
		];
		if ($this->validation->run($data, 'bagianRules')) {
			$data['id_bagian'] = $this->bagian_model->generateId($this->request->getVar('biro'));
			$this->bagian_model->insertBagian($data);
			session()->setFlashdata('msg', 'Tambah data bagian berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/bagian');
		} else {
			return redirect()->to(base_url() . '/bagian/create')->withInput();
		}
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
		$data = [
			'id_biro' => $this->request->getPost('biro'),
			'nama_bagian' => $this->request->getPost('nama_bagian')
		];
		if ($this->validation->run($data, 'bagianRules')) {
			$this->bagian_model->updateBagian($data, $id);
			session()->setFlashdata('msg', 'Update data bagian berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/bagian');
		} else {
			return redirect()->to(base_url() . '/bagian/edit/' . $id)->withInput();
		}
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

	public function ajaxbagian()
	{
		$biro = $this->request->getPost('biro');
		$bagianData = $this->bagian_model->where('id_biro', $biro)->findAll();
		echo json_encode($bagianData);
	}
}
