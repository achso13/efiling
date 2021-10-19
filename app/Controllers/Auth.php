<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pegawai_model;

class Auth extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "E-Filing"
		];
		return view("auth/index", $data);
	}

	public function login()
	{
		$pegawai_model = new Pegawai_model();
		$nip = $this->request->getPost('nip');
		$password = $this->request->getPost('password');
		$dataPegawai = $pegawai_model->where(['nip' => $nip])->first();
		if ($dataPegawai) {
			if (password_verify($password, $dataPegawai['password'])) {
				session()->set([
					'user_nip' => $dataPegawai['nip'],
					'user_nama' => $dataPegawai['nama_pegawai'],
					'user_role' => $dataPegawai['role'],
					'logged_in' => TRUE
				]);
				return redirect()->to(base_url());
			} else {
				session()->setFlashData('msg', 'NIP atau Password Salah');
				return redirect()->back();
			}
		} else {
			session()->setFlashData('msg', 'NIP atau Password Salah');
			return redirect()->back();
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url() . "/auth");
	}
}
