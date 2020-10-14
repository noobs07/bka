<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Produk extends REST_Controller {

	private $table = 'produk';
	private $id_column = 'id_produk';

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
			$this->db->or_like('deskripsi', $keyword['value']);
			$this->db->or_like('tentang', $keyword['value']);
			$this->db->or_like('bahasa', $keyword['value']);
			if (strpos('bigroot', strtolower($keyword['value']))!==false) {
				$this->db->or_like('jenis', '1');
			} else if (strpos('vermont', strtolower($keyword['value']))!==false) {
				$this->db->or_like('jenis', '2');
			}
			$recordsFiltered = $this->db->count_all_results($this->table);
		}

		$columns = array('id_produk','nama','deskripsi','tentang','bahasa','jenis');
		$this->db->select('id_produk,nama,deskripsi,tentang,bahasa,jenis');
		if(isset($keyword) && $keyword['value'] != '') {
			$this->db->or_like('nama', $keyword['value']);
			$this->db->or_like('deskripsi', $keyword['value']);
			$this->db->or_like('tentang', $keyword['value']);
			$this->db->or_like('bahasa', $keyword['value']);
			if (strpos('bigroot', strtolower($keyword['value']))!==false) {
				$this->db->or_like('jenis', '1');
			} else if (strpos('vermont', strtolower($keyword['value']))!==false) {
				$this->db->or_like('jenis', '2');
			}
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

	function photos_get(){
		$id = $this->get('id');
		$this->db->select('concat("'.base_url('assets/uploads/produk/').'",file) as file');
		$data = $this->db->where($this->id_column,$id)->get('produk_foto')->result();
		$this->response($data, 200);
	}

	function save_post(){
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$data['tentang'] = $this->input->post('tentang');
		$data['jenis'] = $this->input->post('jenis');
		$data['bahasa'] = $this->input->post('bahasa');

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$new_name = substr(str_shuffle($permitted_chars), 0, 11);
		$this->upload_file_config('./assets/uploads/produk/');

		$files = array();
		if ($_FILES){
			foreach ($_FILES['file']['name'] as $key => $filename) {

				$_FILES['upload']['name']= $_FILES['file']['name'][$key];
				$_FILES['upload']['type']= $_FILES['file']['type'][$key];
				$_FILES['upload']['tmp_name']= $_FILES['file']['tmp_name'][$key];
				$_FILES['upload']['error']= $_FILES['file']['error'][$key];
				$_FILES['upload']['size']= $_FILES['file']['size'][$key];

				if ($this->upload->do_upload('upload')) {
					$uploaded = $this->upload->data();
					array_push($files, $filename);
				}
			}
		}

		$result = false;
		if ($id) {
			$data[$this->id_column] = $id;
			$this->db->where($this->id_column, $id);
			$result = $this->db->update($this->table, $data);
		} else {
			$result = $this->db->insert($this->table, $data);
			$id = $this->db->insert_id();
		}

		if ($result) {
			foreach ($files as $key => $value) {
				$this->add_photo($id,$value);
			}
			$this->response($files, 200);
		} else {
			$this->response(null, 400);
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

	function add_photo($id_produk, $file){
		$data['id_produk'] = $id_produk;
		$data['file'] = $file;
		$this->db->insert('produk_foto', $data);
	}

}