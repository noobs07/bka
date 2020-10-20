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
		if ($data) {
			$this->response($data, 200);
		} else {
			$this->response(false, 203);
		}
	}

	function index_post() {
		$id = $this->input->post('id');
		$data['profil'] = $this->input->post('profil');
		$data['promo'] = $this->input->post('promo');
		$data['link_promo'] = $this->input->post('link_promo');
		$data['twitter'] = $this->input->post('twitter');
		$data['facebook'] = $this->input->post('facebook');
		$data['instagram'] = $this->input->post('instagram');
		$data['alamat'] = $this->input->post('alamat');
		$data['reseller_rule'] = $this->input->post('reseller_rule');
		$data['title_videos'] = $this->input->post('title_videos');
		$data['desc_videos'] = $this->input->post('desc_videos');
		$data['title_bigroot'] = $this->input->post('title_bigroot');
		$data['desc_bigroot'] = $this->input->post('desc_bigroot');
		$data['title_vermont'] = $this->input->post('title_vermont');
		$data['desc_vermont'] = $this->input->post('desc_vermont');

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$new_name = substr(str_shuffle($permitted_chars), 0, 11);
		$this->upload_file_config('./assets/uploads/', $new_name);

		if ($this->upload->do_upload('file')) {
			$uploaded = $this->upload->data();
			$data['image_promo'] = $uploaded['file_name'];
			$old = $this->get_one($id);
			if ($old) {
				unlink('./assets/uploads/'.$old->image_promo);
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
			$this->response($this->get_one($id), 200);
		} else {
			$this->response($data, 400);
		}
	}

	function get_one($id){
		return $this->db->where($this->id_column,$id)->get($this->table)->row();
	}

}