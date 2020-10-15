<?php 
class M_front extends CI_Model {

	public function get_banner(){
		$this->db->select('*');
		$this->db->from("banner");
		$this->db->where("is_shown", 1);
		$this->db->order_by('id_banner','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_produk($id){
		$this->db->select('*');
		$this->db->from("produk p");
		$this->db->join('produk_foto pf', 'p.id_produk = pf.id_produk');
		$this->db->where("p.jenis", $id);
		$this->db->group_by('p.id_produk');
		$this->db->order_by('p.id_produk','desc');
		$this->db->limit(20, 0);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_produk_detail($id){
		$this->db->select('*');
		$this->db->from("produk p");
		$this->db->where("p.id_produk", $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_foto_produk($id){
		$this->db->select('*');
		$this->db->from("produk_foto pf");
		$this->db->where("pf.id_produk", $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_news($id){
		if($id==0){
			$this->db->select('*');
			$this->db->from("berita");
			$this->db->order_by('id_berita','desc');
		}else{
			$this->db->select('*');
			$this->db->from("berita");
			$this->db->where("id_berita", $id);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function get_pengaturan(){
		$this->db->select('*');
		$this->db->from("pengaturan");
		$query = $this->db->get();
		return $query->result();
	}
	public function get_video(){
		$this->db->select('*');
		$this->db->from("video");
		$this->db->order_by('id_video','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_market(){
		$this->db->select('*');
		$this->db->from("ecommerce");
		$query = $this->db->get();
		return $query->result();
	}
	public function insert_kontak($data){
		$insert = $this->db->insert("kontak",$data);
		return $insert;
	}
	public function insert_reseller($data){
		$insert = $this->db->insert("reseller",$data);
		return $insert;
	}

}
?>