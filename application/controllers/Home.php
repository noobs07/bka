<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_front');
	}

	function index()
	{
		$this->load->view('front/header');
		$data['banner']=$this->M_front->get_banner();
		$data['bigroot']=$this->M_front->get_produk(1);
		$data['vermont']=$this->M_front->get_produk(2);
		$data['news']=$this->M_front->get_news();
		$pengaturan=$this->get_pengaturan();
		$this->load->view('front/home', $data);
		$this->load->view('front/footer',$pengaturan);
	}
	public function format_tanggal($date){
		$date = date_create($date);
		$dates = date_format($date, 'M j, Y');
		return $dates;
	}
	public function get_pengaturan(){
		$pengaturan = $this->M_front->get_pengaturan();
		foreach($pengaturan as $data){
			$hasil['facebook']=$data->facebook;
			$hasil['twitter']=$data->twitter;
			$hasil['instagram']=$data->instagram;
		}
		return $hasil;
	}
	function produk()
	{
		$this->load->view('front/header');
		if($_GET['id']){
			$this->load->view('front/produkdetil');
		}else{
			$this->load->view('front/produk');
		}
		$pengaturan=$this->get_pengaturan();
		$this->load->view('front/footer', $pengaturan);
	}
	function news()
	{
		$this->load->view('front/header');
		if($_GET['id']){
			$this->load->view('front/newsdetil');
		}else{
			$this->load->view('front/news');
		}
		$pengaturan=$this->get_pengaturan();
		$this->load->view('front/footer', $pengaturan);
	}
	function howtoreseller()
	{
		$this->load->view('front/header');
		$this->load->view('front/howtoreseller');
		$pengaturan=$this->get_pengaturan();
		$this->load->view('front/footer', $pengaturan);
	}
	function howtouse()
	{
		$this->load->view('front/header');
		$this->load->view('front/howtouse');
		$pengaturan=$this->get_pengaturan();
		$this->load->view('front/footer', $pengaturan);
	}
	function profile()
	{
		$this->load->view('front/header');
		$this->load->view('front/profile');
		$pengaturan=$this->get_pengaturan();
		$this->load->view('front/footer', $pengaturan);
	}
}
?>