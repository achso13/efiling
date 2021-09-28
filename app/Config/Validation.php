<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use App\Validation\BagianRules;
use App\Validation\BiroRules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		\App\Validation\Rules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $biroRules = [
		'nama_biro' => [
			'label'  => 'Nama biro',
			'rules'  => 'required|max_length[100]',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'max_length' => '{field} terlalu panjang, maksimal memiliki {param} karakter'
			]
		],
	];

	public $bagianRules = [
		'nama_bagian' => [
			'label'  => 'Nama bagian',
			'rules'  => 'required|max_length[100]',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'max_length' => '{field} terlalu panjang, maksimal memiliki {param} karakter'
			]
		],
		'id_biro' => [
			'label'  => 'Biro',
			'rules'  => 'required|in_db[tb_biro.id_biro]',
			'errors' => [
				'required' 	=> 'Anda belum memilih {field}',
				'in_db' 	=>	'Value tidak diizinkan',
			]
		],
	];

	public $pegawaiRules = [
		'id_biro' => [
			'label'  => 'Biro',
			'rules'  => 'required|in_db[tb_biro.id_biro]',
			'errors' => [
				'required' 	=> 'Anda belum memilih {field}',
				'in_db' 	=>	'Value tidak diizinkan',
			]
		],
		'id_bagian' => [
			'label'  => 'Bagian',
			'rules'  => 'required|in_db[tb_bagian.id_bagian]',
			'errors' => [
				'required' 	=> 'Anda belum memilih {field}',
				'in_db' 	=>	'Value tidak diizinkan',
			]
		],
	];
}
