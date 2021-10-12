<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Biro_model;
use App\Models\Bagian_model;
use App\Models\Pegawai_model;

class Pegawai extends BaseController
{
	public function __construct()
	{
		$this->pegawai_model = new Pegawai_model();
		$this->biro_model = new Biro_model();
		$this->bagian_model = new Bagian_model();

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
			'listBiro'		=> $this->biro_model->getBiro(),
			'listBagian'	=> old('biro') !== NULL ? $this->bagian_model->where('id_biro', old('biro'))->findAll() : NULL
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
			'nama_pegawai' => $this->request->getPost('nama_pegawai'),
			'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'email' => $this->request->getPost('email'),
			'no_telp' => $this->request->getPost('no_telp'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'id_biro' => $this->request->getPost('biro'),
			'id_bagian' => $this->request->getPost('bagian'),
			'role' => $this->request->getPost('role'),
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

	public function edit($id)
	{
		$data = [
			'title' 		=> 'Edit Pegawai',
			'validation' 	=> $this->validation,
			'pegawai'		=> $this->pegawai_model->getPegawai($id),
			'listBiro'		=> $this->biro_model->getBiro(),
		];
		$data['listBagian'] = old('biro') !== NULL ? $this->bagian_model->where('id_biro', old('biro'))->findAll() : $this->bagian_model->where('id_biro', $data['pegawai']['id_biro'])->findAll();
		return view('/pegawai/edit', $data);
	}

	public function update($id)
	{
		// Ambil variabel foto
		$foto = $this->request->getFile('foto');
		// Ambil nama foto
		$namaFoto = $foto->getError() === 4 ? $this->request->getPost('fotoLama') : $foto->getRandomName();
		// Ambil foto lama
		$fotoLama = $this->request->getPost('fotoLama');
		$data = [
			'nip' => $this->request->getPost('nip'),
			'nama_pegawai' => $this->request->getPost('nama_pegawai'),
			'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'email' => $this->request->getPost('email'),
			'no_telp' => $this->request->getPost('no_telp'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'id_biro' => $this->request->getPost('biro'),
			'id_bagian' => $this->request->getPost('bagian'),
			'role' => $this->request->getPost('role'),
			'foto' => $namaFoto
		];

		if ($this->validation->run($data, 'pegawaiUpdateRules')) {
			if (empty($this->request->getPost('password'))) {
				unset($data['password']);
			}
			unset($data['id_biro']);
			if ($foto->getError() !== 4) {
				$foto->move(ROOTPATH . 'public/uploads/profile_img', $namaFoto);

				// Hapus File Lama
				if ($fotoLama !== 'default.png') {
					unlink(ROOTPATH . 'public/uploads/profile_img/' .  $fotoLama);
				}
			}
			$this->pegawai_model->updatePegawai($data, $id);
			session()->setFlashdata('msg', 'Edit data pegawai berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/pegawai');
		} else {
			// return redirect()->to(base_url() . '/pegawai/create')->withInput()->with('validation', $this->validation);
			return redirect()->to(base_url() . '/pegawai/edit/' . $id)->withInput();
		}
	}

	public function delete($id)
	{
		if ($this->pegawai_model->deletePegawai($id)) {
			session()->setFlashdata('msg', 'Hapus data pegawai berhasil');
			session()->setFlashdata('color', 'success');
			return redirect()->to(base_url() . '/pegawai');
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException;
		}
	}
}
