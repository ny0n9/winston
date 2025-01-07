<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class SspModel extends Model {
	protected $DBGroup          = 'default';
	protected $table            = 'table_name';
	protected $primaryKey       = 'id';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = [];

	// Dates
	protected $useTimestamps = false;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert   = [];
	protected $afterInsert    = [];
	protected $beforeUpdate   = [];
	protected $afterUpdate    = [];
	protected $beforeFind     = [];
	protected $afterFind      = [];
	protected $beforeDelete   = [];
	protected $afterDelete    = [];

	// SSP
	// protected $db;
	// protected $builder;
	protected $column_search = [];
	protected $column_order = [];
	protected $where;


	/*
	Jika $table merupakan relasi table / relasi field maka gunakan view table :
	di PHPMyAdmin :
	CREATE VIEW vie_siswa AS SELECT .*, kelas.nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id;
	jadi $table = 'vie_siswa'
	 */
	function __construct($params = []) {
		if ($params) {
			if (isset($params['table'])) $this->table = $params['table'];
			if (isset($params['primaryKey'])) $this->primaryKey = $params['primaryKey'];
			if (isset($params['protectFields'])) $this->protectFields = $params['protectFields'];
			if (isset($params['allowedFields'])) $this->allowedFields = $params['allowedFields'];
			if (isset($params['column_search'])) $this->column_search = $params['column_search'];
			if (isset($params['column_order'])) $this->column_order = $params['column_order'];
			if (isset($params['where'])) $this->where = $params['where'];
		}
		parent::__construct();
	}

	/*
	$where = ['name' => $name, 'title' => $title, 'status' => $status];
	$where = "name='Joe' AND status='boss' OR status='active'";
	$where = "status NOT IN ('wafat', 'atestasi')";
	*/
	private function _set_sql_builder() {
		$this->builder = $this->db->table($this->table);
		if (!empty($this->where)) $this->builder->where($this->where);
		$request = Services::request();
		$i = 0;
		foreach ($this->column_search as $item) {
			if ($request->getPost('search')['value']) {
				if ($i === 0) {
					$this->builder->groupStart();
					$this->builder->like($item, $request->getPost('search')['value']);
				} else {
					$this->builder->orLike($item, $request->getPost('search')['value']);
				}
				if (count($this->column_search) - 1 == $i) $this->builder->groupEnd();
			}
			$i++;
		}
		// column_order[0] = Aksi, column_order[1] = No. jadi yang digunakan column_order[2] dst
		if ($request->getPost('order') && count($request->getPost('order'))) {
			for ( $i = 0, $len = count($request->getPost('order')); $i < $len ; $i++ ) {
				$key = intval($request->getPost('order')[$i]['column']);
				$dir = $request->getPost('order')[$i]['dir'];
				$this->builder->orderBy($this->column_order[$key], $dir);
			}
		} else $this->builder->orderBy($this->column_order[2], 'ASC');
	}

	public function get_datatables() {
		$request = Services::request();
		$this->_set_sql_builder();
		if ($request->getPost('length') != -1)
			$this->builder->limit($request->getPost('length'), $request->getPost('start'));
		$qry = $this->builder->get();
		return $qry->getResult();
	}
	public function count_filtered() {
		$this->_set_sql_builder();
		return $this->builder->countAllResults();
	}
	public function count_all() {
		$sql = $this->db->table($this->table);
		return $sql->countAll();
	}

	public function tambah_data($data) {
		$sql = $this->db->table($this->table);
		if (is_multidimension($data)) $sql->insertBatch($data);
		else $sql->insert($data);
	}
	/* $where = ['key' => $_POST['key']]; */
	public function ubah_data($where, $data) {
		$sql = $this->db->table($this->table);
		$sql->where($where);
		$sql->update($data);
	}
	public function hapus_data($where) {
		$sql = $this->db->table($this->table);
		$sql->where($where);
		$sql->delete();
	}
	public function ambil_data($where = []) {
		$sql = $this->db->table($this->table);
		if ($where) $sql->where($where);
		$qry = $sql->get();
		if ($where) return $qry->getRowArray();
		else return $qry->getResultArray();
	}
}
/* Cara pakai :
	$params = [
		'table' => 'table_name',
		'primaryKey' => ''primaryKey',
		'protectFields' => false,
		'allowedFields' => ['field1', 'field2', 'fieldn'],
		'column_search' => ['field1', 'field2', 'fieldn'],
		'column_order' => ['field1', 'field2', 'fieldn'],
		'where' => ['key' => 'field_name', 'value' => 'field_value']
	]
	$ssp = new SspModel($params);

	Bila satu function mengakses beberapa table, maka buat object berbeda untuk masing-masing table
	contoh :
	objtUsers = new SspModel($params); // table users
	$objGroups = new SspModel($params); // table groups
*/
