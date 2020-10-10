<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}

	function index()
	{
		if ($this->session->userdata('bka_user')) {
			redirect(base_url());
		}
		$page = 'pages/template/v_auth';
		$this->load->view($page);
	}

	function login()
	{
		$username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		$auth=$this->m_auth->auth($username,$password);

		if($auth->num_rows() > 0){
			$data=$auth->row_array();
			$this->session->set_userdata('bka_logged_in',TRUE);
			$this->session->set_userdata('bka_user',$data);
			redirect(base_url());
		} else {
			$this->session->set_flashdata('error_msg', 'username atau password salah');
			redirect(base_url('auth'));
		}

	}

	function logout()
	{
		$this->session->unset_userdata('bka_logged_in');
		$this->session->unset_userdata('bka_user');
		session_destroy();
		redirect(base_url('auth'));
	}
}
?>