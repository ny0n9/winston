<?php

namespace App\Models;

use CodeIgniter\Model;

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
		if (isset($this->where)) $this->builder->where($this->where);
		$i = 0;
		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {
				if ($i === 0) {
					$this->builder->groupStart();
					$this->builder->like($item, $_POST['search']['value']);
				} else {
					$this->builder->orLike($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) $this->builder->groupEnd();
			}
			$i++;
		}

		if (isset($_POST['order']) && count($_POST['order']))
			$this->builder->orderBy($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
	}

	public function get_datatables()
	{
		$this->_set_sql_builder();
		if ($_POST['length'] != -1) $this->builder->limit($_POST['length'], $_POST['start']);
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
		if (is_multidimension($data)) $this->builder->insertBatch($data);
		else $this->builder->insert($data);
	}
	/* $where = ['key' => $_POST['key']]; */
	public function ubah_data($where, $data)
	{
		$this->builder->where($where);
		$this->builder->update($data);
	}
	public function hapus_data($where)
	{
		$this->builder->where($where);
		$this->builder->delete();
	}
	public function ambil_data($where = null)
	{
		if ($where) $this->builder->where($where);
		$qry = $this->builder->get();
		if ($where) return $qry->getRowArray();
		else return $qry->getResultArray();
	}
}
