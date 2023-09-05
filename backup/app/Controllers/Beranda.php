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
	public function chartjs2(): string
	{
		$data = [
			'title' => 'Halaman ChartJS v2.9.4'
		];
		return view('beranda/chartjs2', $data);
	}
	public function chartjs3(): string
	{
		$data = [
			'title' => 'Halaman ChartJS v3.9.1'
		];
		return view('beranda/chartjs3', $data);
	}
}
