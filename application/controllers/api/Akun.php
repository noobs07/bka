<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Akun extends REST_Controller {

	function __construct() {
		parent::__construct();	
	}

	function changepass_post() {
		$old_password = $this->input->post('old_password');
		$data['password'] = md5($this->input->post('new_password'));

		if (strlen($this->input->post('new_password'))<4) {
			$this->response((object)array(
				'status' => false,
				'message' => 'Panjang password baru min 4',
			), 200);
		}
		
		$this->db->where('username', $this->session->userdata('bka_user')['username']);
		$this->db->where('password', md5($old_password));
		$result = $this->db->update('users', $data);

		if ($this->db->affected_rows()>0) {
			$this->response((object)array(
				'status' => true,
				'message' => 'Password berhasil diubah',
			), 200);
		} else {
			$this->response((object)array(
				'status' => false,
				'message' => 'Password gagal diubah',
				'a' => $this->session->userdata('bka_user')['username'],
			), 200);
		}
	}

}