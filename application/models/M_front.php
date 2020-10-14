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
	public function get_detail_produk($id){
		$this->db->select('*');
		$this->db->from("banner");
		$this->db->where("is_shown", 1);
		$this->db->order_by('id_banner','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_news(){
		$this->db->select('*');
		$this->db->from("berita");
		$this->db->order_by('id_berita','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_pengaturan(){
		$this->db->select('*');
		$this->db->from("pengaturan");
		$query = $this->db->get();
		return $query->result();
	}

}
?>