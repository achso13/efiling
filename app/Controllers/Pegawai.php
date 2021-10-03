<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Biro_model;
use App\Models\Pegawai_model;

class Pegawai extends BaseController
{
	public function __construct()
	{
		$this->pegawai_model = new Pegawai_model();
		$this->biro_model = new Biro_model();

		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		$data = [
			'title' 	=> 'Data Master Pegawai',
			'listPegawai' 	=> $this->pegawai_model->getPegawai(),
		];
		return view('/pegawai/index', $data);
	}

	public function detail($id)
	{
		$data = [
			'title' 	=> 'Data Master Pegawai',
			'pegawai' 	=> $this->pegawai_model->getPegawai($id),
		];
		if (empty($data['pegawai'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}
		return view('/pegawai/detail', $data);
	}

	public function create()
	{
		$data = [
			'title' 		=> 'Tambah Pegawai',
			'validation' 	=> $this->validation,
			'listBiro'		=> $this->biro_model->getBiro()
		];
		return view('/pegawai/create', $data);
	}

	public function store()
	{
		// Ambil variabel foto
		$foto = $this->request->getFile('foto');
		// Ambil nama foto
		$namaFoto = $foto->getError() === 4 ? "default.png" : $foto->getRandomName();

		$data = [
			'nip' => $this->request->getPost('nip'),
			'password' => $this->request->getPost('password'),
			'role' => $this->request->getPost('role'),
			'nama_pegawai' => $this->request->getPost('nama_pegawai'),
			'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
			'email' => $this->request->getPost('email'),
			'id_biro' => $this->request->getPost('biro'),
			'id_bagian' => $this->request->getPost('bagian'),
			'foto' => $namaFoto
		];

		if ($this->validation->run($data, 'pegawaiRules')) {
			unset($data['id_biro']);
			if ($foto->getError() !== 4) {
				$foto->move(ROOTPATH . 'public/uploads/profile_img', $namaFoto);
			}
			$this->pegawai_model->insertPegawai($data);
			session()->setFlashdata('msg', 'Tambah data pegawai berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/pegawai');
		} else {
			// return redirect()->to(base_url() . '/pegawai/create')->withInput()->with('validation', $this->validation);
			return redirect()->to(base_url() . '/pegawai/create')->withInput();
		}
	}
}
