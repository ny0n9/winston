<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SspModel;
use Config\Services;

class Pengguna extends BaseController {
	public function index()	{
		$data = ['title' => 'Kelola Pengguna'];
		return view('pengguna/kelola_users', $data);
	}
	public function list_users() {
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$params['table'] = 'users';
		$params['primaryKey'] = 'id';
		$params['column_search'] = ['email', 'username'];
		$params['column_order'] = ['', '', 'id', 'email', 'username', 'password_hash', 'active', 'created_at', 'updated_at'];
		$ssp = new SspModel($params);
		$lists = $ssp->get_datatables();
		$data = [];
		$no = $this->request->getPost('start');
		foreach ($lists as $list) {
			$no++;
			$btnEdit = "<button type='button' class='btn btn-sm btn-warning' onclick=\"editUser('" . $list->id . "')\"><i class='fa fa-edit'></i></button>";
			$btnDel = "<button type='button' class='btn btn-sm btn-danger' onclick=\"delUser('" . $list->id . "')\"><i class='fa fa-trash'></i></button>";
			$btnInfo = "<button type='button' class='btn btn-sm btn-info' onclick=\"infoUser('" . $list->id . "')\"><i class='fa fa-info-circle'></i></button>";
			$row = [];
			$row[] = $btnInfo . " " . $btnEdit . " " . $btnDel;
			$row[] = $no;
			$row[] = $list->id;
			$row[] = $list->email;
			$row[] = $list->username;
			$row[] = $list->password_hash;
			$row[] = $list->active;
			$row[] = $list->created_at;
			$row[] = $list->updated_at;
			$data[] = $row;
		}
		$response = [
			"draw" => $this->request->getPost('draw'),
			"recordsFiltered" => $ssp->count_filtered(),
			"recordsTotal" => $ssp->count_all(),
			"data" => $data
		];
		echo json_encode($response);
	}
	public function form_add_user()	{
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$response = [
			'data_json' => view('pengguna/modal_add_user')
		];
		echo json_encode($response);
	}
	public function simpan_users() {
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$validation = Services::validation();
		$valid = $this->validate([
			'email' => [
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'valid_email' => 'Format {field} tidak benar',
					'is_unique' => '{field} ini sudah ada coba yang lain'
				]
			],
			'username' => [
				'label' => 'Username',
				'rules' => 'required|is_unique[users.username]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} ini sudah ada coba yang lain'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required|min_length[8]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'min_length' => 'Panjang {field} minimum 8 karakter'
				]
			],
			'passconf' => [
				'label' => 'Ulangi Password',
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'matches[password]' => '{field} tidak cocok'
				]
			]
		]);
		if (!$valid) {
			$response = [
				'error' => [
					'email' => $validation->getError('email'),
					'username' => $validation->getError('username'),
					'password' => $validation->getError('password'),
					'passconf' => $validation->getError('passconf')
				]
			];
			echo json_encode($response);
		} else {
			$data = [
				'email' => $this->request->getPost('email'),
				'username' => $this->request->getPost('username'),
				'password_hash' => setPassword($this->request->getPost('password')),
				'active' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			$params['table'] = 'users';
			$params['primaryKey'] = 'id';
			$params['allowedFields'] = ['email', 'username', 'password_hash', 'active', 'created_at', 'updated_at'];
			$ssp = new SspModel($params);
			//$ssp->save($data);
			$ssp->tambah_data($data);
			$response = [
				'sukses' => 'Username : ' . $data['username'] . ' berhasil disimpan'
			];
			echo json_encode($response);
		} 
	}
	public function info_user() {
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$where = ['id' => $this->request->getPost('id')];
		$params['table'] = 'users';
		$params['primaryKey'] = 'id';
		$ssp = new SspModel($params);
		$row = $ssp->ambil_data($where);
		$data = [
			'id' => $row['id'],
			'email' => $row['email'],
			'username' => $row['username'],
			'password_hash' => $row['password_hash'],
			'active' => $row['active'],
			'created_at' => $row['created_at'],
			'updated_at' => $row['updated_at']
		];
		$output = [
			'user' => view('pengguna/modal_info_user', $data)
		];
		echo json_encode($output);
	}
	public function form_del_user()	{
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$where = ['id' => $this->request->getPost('id')];
		$params['table'] = 'users';
		$params['primaryKey'] = 'id';
		$ssp = new SspModel($params);
		$row = $ssp->ambil_data($where);
		$data = [
			'id' => $row['id'],
			'email' => $row['email'],
			'username' => $row['username'],
			'password_hash' => $row['password_hash'],
			'active' => $row['active'],
			'created_at' => $row['created_at'],
			'updated_at' => $row['updated_at']
		];
		$output = [
			'user' => view('pengguna/modal_del_user', $data)
		];
		echo json_encode($output);
	}
	public function hapus_user() {
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$where = ['id' => $this->request->getPost('id')];
		$username = $this->request->getPost('username');
		$params['table'] = 'users';
		$params['primaryKey'] = 'id';
		$ssp = new SspModel($params);
		$ssp->hapus_data($where);
		$response = [
			'sukses' => 'Username : ' . $username
		];
		echo json_encode($response);
	}
	public function form_edit_user() {
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$where = ['id' => $this->request->getPost('id')];
		$params['table'] = 'users';
		$params['primaryKey'] = 'id';
		$ssp = new SspModel($params);
		$row = $ssp->ambil_data($where);
		$data = [
			'id' => $row['id'],
			'email' => $row['email'],
			'username' => $row['username'],
			'password_hash' => $row['password_hash'],
			'active' => $row['active'],
			'created_at' => $row['created_at'],
			'updated_at' => $row['updated_at']
		];
		$output = [
			'user' => view('pengguna/modal_edit_user', $data)
		];
		echo json_encode($output);
	}
	public function update_user() {
		if (!$this->request->isAJAX())
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s403');
		if (!$this->request->is('post'))
			throw new \CodeIgniter\HTTP\Exceptions\RedirectException('error/s405');
		$where = ['id' => $this->request->getPost('id')];
		$username = $this->request->getPost('username');
		$data = [
			'active' => $this->request->getPost('active'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		$params['table'] = 'users';
		$params['primaryKey'] = 'id';
		$params['allowedFields'] = ['active', 'created_at', 'updated_at'];
		$ssp = new SspModel($params);
		$ssp->ubah_data($where, $data);
		$response = [
			'sukses' => 'Username : ' . $username
		];
		echo json_encode($response);
	}
}
