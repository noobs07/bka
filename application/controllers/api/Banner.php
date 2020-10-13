<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Banner extends REST_Controller {

	private $table = 'banner';
	private $id_column = 'id_banner';

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
			$this->db->or_like('judul', $keyword['value']);
			$this->db->or_like('deskripsi', $keyword['value']);
			$this->db->or_like('cover', $keyword['value']);
			$this->db->or_like('is_shown', $keyword['value']);
			$recordsFiltered = $this->db->count_all_results($this->table);
		}

		$columns = array('id_banner','judul','deskripsi','cover','is_shown');
		$this->db->select('id_banner,judul,deskripsi,concat("'.base_url('assets/uploads/banner/').'",cover) as cover,is_shown');
		if(isset($keyword) && $keyword['value'] != '') {
			$this->db->or_like('judul', $keyword['value']);
			$this->db->or_like('deskripsi', $keyword['value']);
			$this->db->or_like('cover', $keyword['value']);
			$this->db->or_like('is_shown', $keyword['value']);
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
		$data['judul'] = $this->input->post('judul');
		$data['deskripsi'] = $this->input->post('deskripsi');
		
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$new_name = substr(str_shuffle($permitted_chars), 0, 11);
		$this->upload_file_config('./assets/uploads/banner/', $new_name);

		if ($this->upload->do_upload('file')) {
			$uploaded = $this->upload->data();
			$data['cover'] = $uploaded['file_name'];
			$old = $this->get_one($id);
			if ($old) {
				unlink('./assets/uploads/banner/'.$old->foto);
			}
		}

		$result = false;
		if ($id) {
			$data[$this->id_column] = $id;
			$this->db->where($this->id_column, $id);
			$result = $this->db->update($this->table, $data);
		} else {
			$data['is_shown'] = 1;
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

	function toggle_post(){
		$id = $this->input->post('id');
		$data['is_shown'] = (int) $this->input->post('is_shown');
		$this->db->where($this->id_column, $id);
		$result = $this->db->update($this->table, $data);
		if ($result) {
			$this->response($data, 200);
		} else {
			$this->response(null, 400);
		}
	}

}