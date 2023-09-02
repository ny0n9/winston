<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
	public function index()
	{
		$data = ['title' => 'Halaman Utama'];
		return view('beranda/index_frame', $data);
	}
	public function about()
	{
		$data = ['title' => 'Fontawesome 4.7.0 icons'];
		return view('beranda/fontawesome_470', $data);
	}
	public function test_ajax()
	{
		if ($this->request->isAJAX()) {
			if (!$this->request->is('post'))
				throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
			print_r($_POST);
		} else throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
	}
}
