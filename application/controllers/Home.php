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
		$data['news']=$this->M_front->get_news(0);
		$data['video']=$this->M_front->get_video();
		$pengaturan=$this->get_pengaturan();
		$data['promo']=$pengaturan['promo'];
		$pengaturan['ecommerce']=$this->get_market();
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
			$hasil['promo']=$data->promo;
		}
		return $hasil;
	}
	public function get_market(){
		$market = $this->M_front->get_market();
		foreach($market as $data){
			$hasil['nama'][]=$data->nama;
			$hasil['link'][]=$data->link;
			$hasil['icon'][]=$data->icon;
		}
		return $hasil;
	}
	function produk()
	{
		$produk = $this->uri->segment(3);
		$this->load->view('front/header');
		if($_GET['id']){
			$id=$_GET['id'];
			$data['produk']=$this->M_front->get_produk_detail($id);
			$data['foto']=$this->M_front->get_foto_produk($id);
			$this->load->view('front/produkdetil', $data);
		}else{
			if($produk=='vermont')
			$data['produk']=$this->M_front->get_produk(2);
			else
			$data['produk']=$this->M_front->get_produk(1);
			$data['nama_produk']=$produk;
			$this->load->view('front/produk', $data);
		}
		$pengaturan=$this->get_pengaturan();
		$pengaturan['ecommerce']=$this->get_market();
		$this->load->view('front/footer', $pengaturan);
	}
	function news()
	{
		$this->load->view('front/header');
		if($_GET['id']){
			$id=$_GET['id'];
			$data['news']=$this->M_front->get_news($id);
			$data['news_all']=$this->M_front->get_news(0);
			$this->load->view('front/newsdetil', $data);
		}else{
			$data['news']=$this->M_front->get_news($id);
			$this->load->view('front/news', $data);
		}
		$pengaturan=$this->get_pengaturan();
		$pengaturan['ecommerce']=$this->get_market();
		$this->load->view('front/footer', $pengaturan);
	}
	function howtoreseller()
	{
		$this->load->view('front/header');
		$this->load->view('front/howtoreseller');
		$pengaturan=$this->get_pengaturan();
		$pengaturan['ecommerce']=$this->get_market();
		$this->load->view('front/footer', $pengaturan);
	}
	function howtouse()
	{
		$this->load->view('front/header');
		$this->load->view('front/howtouse');
		$pengaturan=$this->get_pengaturan();
		$pengaturan['ecommerce']=$this->get_market();
		$this->load->view('front/footer', $pengaturan);
	}
	function profile()
	{
		$this->load->view('front/header');
		$this->load->view('front/profile');
		$pengaturan=$this->get_pengaturan();
		$pengaturan['ecommerce']=$this->get_market();
		$this->load->view('front/footer', $pengaturan);
	}
	function tambah_kontak(){
		$data['id_kontak']='';
		$data['email'] = $_POST['email'];
		$data['pesan'] = $_POST['pesan'];
		$data['tanggal']= date("Y/m/d H:i:s");
		$hasil = $this->M_front->insert_kontak();

	}
	function tambah_reseller(){
		date_default_timezone_set("Asia/Bangkok");
		$data['id_reseller']='';
		$data['nama'] = $_POST['nama'];
		$data['alamat'] = $_POST['alamat'];
		$data['telepon'] = $_POST['telepon'];
		$data['nama_toko'] = $_POST['nama_toko'];
		$data['tanggal']= date("Y/m/d H:i:s");
		//$hasil = $this->M_front->insert_reseller($data);
		header("location:./howtoreseller");

	}
}
?>