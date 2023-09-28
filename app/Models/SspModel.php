<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class SspModel extends Model
{
	protected $DBGroup          = 'default';
	protected $table            = 'users';
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
	protected $db;
	protected $column_search = [];
	protected $column_order = [];
	protected $builder;
	protected $where;


	/*
	Jika $table merupakan relasi table / relasi field maka gunakan view table :
	di PHPMyAdmin :
	CREATE VIEW vie_siswa AS SELECT .*, kelas.nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id;
	jadi $table = 'vie_siswa'
	 */
	function __construct($params = [])
	{
		if ($params) {
			if (isset($params['table'])) $this->table = $params['table'];
			if (isset($params['where'])) $this->where = $params['where'];
			if (isset($params['primaryKey'])) $this->primaryKey = $params['primaryKey'];
			if (isset($params['allowedFields'])) $this->allowedFields = $params['allowedFields'];
			if (isset($params['column_search'])) $this->column_search = $params['column_search'];
			if (isset($params['column_order'])) $this->column_order = $params['column_order'];
		}
		parent::__construct($this->db);
		$this->builder = $this->db->table($this->table);
	}

	/*
	$where = ['name' => $name, 'title' => $title, 'status' => $status];
	$where = "name='Joe' AND status='boss' OR status='active'";
	$where = "status NOT IN ('wafat', 'atestasi')";
	*/
	private function _set_sql_builder()
	{
		$request = Services::request();
		$i = 0;
		foreach ($this->column_search as $item) {
			if ($request->getPost('search')['value']) {
				if ($i === 0) {
					if (!empty($this->where)) $this->builder->where($this->where);
					$this->builder->groupStart();
					$this->builder->like($item, $request->getPost('search')['value']);
				} else {
					$this->builder->orLike($item, $request->getPost('search')['value']);
				}
				if (count($this->column_search) - 1 == $i) $this->builder->groupEnd();
			}
			$i++;
		}

		if ($request->getPost('order') && count($request->getPost('order'))) {
			$key = $request->getPost('order')['0']['column'];
			$dir = $request->getPost('order')['0']['dir'];
			$this->builder->orderBy($this->column_order[$key], $dir);
		} else $this->builder->orderBy($this->column_order[1], 'ASC');
	}

	public function get_datatables()
	{
		$request = Services::request();
		$this->_set_sql_builder();
		if ($request->getPost('length') != -1)
			$this->builder->limit($request->getPost('length'), $request->getPost('start'));
		$qry = $this->builder->get();
		return $qry->getResult();
	}
	public function count_filtered()
	{
		$this->_set_sql_builder();
		return $this->builder->countAllResults();
	}
	public function count_all()
	{
		$sql = $this->db->table($this->table);
		return $sql->countAllResults();
	}

	public function tambah_data($data)
	{
		$sql = $this->db->table($this->table);
		if (is_multidimension($data)) $sql->insertBatch($data);
		else $sql->insert($data);
	}
	/* $where = ['key' => $_POST['key']]; */
	public function ubah_data($where, $data)
	{
		$sql = $this->db->table($this->table);
		$sql->where($where);
		$sql->update($data);
	}
	public function hapus_data($where)
	{
		$sql = $this->db->table($this->table);
		$sql->where($where);
		$sql->delete();
	}
	public function ambil_data($where = null)
	{
		$sql = $this->db->table($this->table);
		if ($where) $sql->where($where);
		$qry = $sql->get();
		if ($where) return $qry->getRowArray();
		else return $qry->getResultArray();
	}
}
