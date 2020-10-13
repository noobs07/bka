<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengaturan extends REST_Controller {

	private $table = 'pengaturan';
	private $id_column = 'id';

	function __construct() {
		parent::__construct();
	}

	function index_get() {
		$data = $this->db->order_by('id desc')->limit(1)->get($this->table)->row();
		$this->response($data, 200);
	}

	function index_post() {
		$id = $this->input->post('id');
		$data['profil'] = $this->input->post('profil');
		$data['promo'] = $this->input->post('promo');
		$data['twitter'] = $this->input->post('twitter');
		$data['facebook'] = $this->input->post('facebook');
		$data['instagram'] = $this->input->post('instagram');
		$data['alamat'] = $this->input->post('alamat');
		$data['reseller_rule'] = $this->input->post('reseller_rule');

		$result = false;
		if ($id) {
			$data[$this->id_column] = $id;
			$this->db->where($this->id_column, $id);
			$result = $this->db->update($this->table, $data);
		} else {
			$result = $this->db->insert($this->table, $data);
		}

		if ($result) {
			$this->response($this->input->post(), 200);
		} else {
			$this->response($data, 400);
		}
	}

}