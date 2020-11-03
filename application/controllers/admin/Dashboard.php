<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public $module = 'dashboard';

	public function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Dashboard';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$data['jumlah_berita'] = $this->db->count_all('berita');
		$data['jumlah_event'] = $this->db->count_all('event');
		$data['jumlah_bigroot'] = $this->db->where('jenis','1')->count_all_results('produk');
		$data['jumlah_vermont'] = $this->db->where('jenis','2')->count_all_results('produk');

		$pengaturan = $this->db->limit(1)->get('pengaturan')->row();
		if ($pengaturan) {
			$data['pengaturan'] = $pengaturan;
		} else {
			$data['pengaturan'] = false;
		}

		$this->loadview($data, $page, $js);
	}

	public function update_link_wa()
	{
		$id = $this->input->post('id');
		$data['link_toko'] = $this->input->post('link_toko');
		$data['whatsapp'] = $this->input->post('whatsapp');

		$this->db->where('id',$id);
		$result  = $this->db->update('pengaturan', $data);

		if ($result) {
			echo json_encode(
				array(
					'status' => true,
					'msg' => 'Berhasil update',
				)
			);
		} else {
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'Gagal update',
				)
			);
		}
	}
}
