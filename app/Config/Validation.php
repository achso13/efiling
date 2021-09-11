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
	];
}
