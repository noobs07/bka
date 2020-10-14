<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('front/header');
		$this->load->view('front/home');
		$this->load->view('front/footer');
	}
	function produk()
	{
		$this->load->view('front/header');
		if($_GET['id']){
			$this->load->view('front/produk');
		}else{
			$this->load->view('front/produkdetil');
		}
		$this->load->view('front/footer');
	}
	function news()
	{
		$this->load->view('front/header');
		if($_GET['id']){
			$this->load->view('front/newsdetil');
		}else{
			$this->load->view('front/news');
		}
		$this->load->view('front/footer');
	}
	function howtoreseller()
	{
		$this->load->view('front/header');
		$this->load->view('front/howtoreseller');
		$this->load->view('front/footer');
	}
	function howtouse()
	{
		$this->load->view('front/header');
		$this->load->view('front/howtouse');
		$this->load->view('front/footer');
	}
	function profile()
	{
		$this->load->view('front/header');
		$this->load->view('front/profile');
		$this->load->view('front/footer');
	}
}
?>