<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Reseller extends REST_Controller {

	private $table = 'reseller';
	private $id_column = 'id_reseller';

	function __construct() {
		parent::__construct();
	}

	function index_get() {
		$draw = (int) $this->get('draw');
		$limit = (int) $this->get('length');
		$offset = (int) $this->get('start');
		$keyword = $this->get('search');
		$order = $this->get('order');

		$recordsTotal = $this->db->count_all($this->table);
		$recordsFiltered = $recordsTotal;
		if(isset($keyword) && $keyword['value'] != '') {
			$this->db->or_like('nama', $keyword['value']);
			$this->db->or_like('alamat', $keyword['value']);
			$this->db->or_like('telepon', $keyword['value']);
			$this->db->or_like('nama_toko', $keyword['value']);
			$recordsFiltered = $this->db->count_all_results($this->table);
		}

		$columns = array('id_reseller','nama','alamat','telepon','nama_toko');
		$this->db->select('id_reseller,nama,alamat,telepon,nama_toko');
		if(isset($keyword) && $keyword['value'] != '') {
			$this->db->or_like('nama', $keyword['value']);
			$this->db->or_like('alamat', $keyword['value']);
			$this->db->or_like('telepon', $keyword['value']);
			$this->db->or_like('nama_toko', $keyword['value']);
		}
		if(isset($offset) && $limit != '-1') {
			$this->db->limit($limit, $offset);
		} else {
			$this->db->limit(10, 0);
		}
		if(isset($order)) {
			$this->db->order_by($columns[$order[0]['column']],$order[0]['dir']);
		}
		$data = $this->db->get($this->table)->result();
		$this->response((object)array(
			'draw' => $draw,
			'recordsTotal' => $recordsTotal,
			'recordsFiltered' => $recordsFiltered,
			'data' => $data,
		), 200);
	}

	function one_get(){
		$id = $this->get('id');
		$data = $this->db->where($this->id_column,$id)->get($this->table)->row();
		$this->response($data, 200);
	}

	function save_post(){
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$data['telepon'] = $this->input->post('telepon');
		$data['nama_toko'] = $this->input->post('nama_toko');

		$result = false;
		if ($id) {
			$data[$this->id_column] = $id;
			$this->db->where($this->id_column, $id);
			$result = $this->db->update($this->table, $data);
		} else {
			$result = $this->db->insert($this->table, $data);
		}

		if ($result) {
			$this->response($files, 200);
		} else {
			$this->response($data, 400);
		}
	}

	function delete_post(){
		$id = $this->input->post('id');
		$this->db->where($this->id_column, $id);
		$result = $this->db->delete($this->table);
		if ($result) {
			$this->response(true, 200);
		} else {
			$this->response(null, 400);
		}
	}

	function get_one($id){
		return $this->db->where($this->id_column,$id)->get($this->table)->row();
	}

}