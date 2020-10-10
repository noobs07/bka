<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class App extends REST_Controller {

	function __construct() {
		parent::__construct();
	}

	function index_get() {
		$app_id = $this->get('app_id');
		$fungsi = $this->get('fungsi');

		$app = $this->db->where('package_name',$app_id)->get('admob')->row();
		if ($app) {
			if ($fungsi=='setting'){
				$this->response((object)array(
					'adsonlineconfig' => (object) array(
						'ADS_PRIORITY_NO_1' => "ADMOB",
						'ADS_PRIORITY_NO_2' => "STARTAPP",
						'ADS_APP_ID' => $app->app_id,
						'ADS_ADMOB_BANNER' => $app->ads_banner,
						'ADS_ADMOB_INTERSTITIALS' => $app->ads_intertitials,
						'INTERSTITIAL_SHOW_RANDOM' => (int)$app->intertitial_random,
						'INTERSTITIAL_SHOW_MAX_IN_PERIOD' => (int)$app->intertitial_max,
						'INTERSTITIAL_SHOW_TIME_PERIOD' => (int)$app->intertitial_time,
						'ADS_STARTAPP_APPID' => "207756229",
					),
				), 200);
			} elseif ($fungsi=='notif') {
				$this->response((object)array(
					'checkUpdate' => ($app->check_update==0)?false:true,
					'versionName' => $app->version_name,
					'appPackageName' => $app->package_name,
					'updateDialogType' => (int)$app->update_dialog_type,
				), 200);
			} else {
				$this->response('ERROR', 200);
			}
		}else{
			$this->response((object)array(
				'adsonlineconfig' => null,
			), 200);
		}
	}

	function gallery_get() {
		$package_name = $this->get('app');
		$limit = (int) $this->get('length');
		$offset = (int) $this->get('start');
		$keyword = $this->get('search');

		$this->db->select(
			'gc.name as category_name,
			concat("id_",g.id) as id,
			concat("'.base_url('assets/uploads/thumb/').'",g.thumb) as url_thumb,
			concat("'.base_url('assets/uploads/').'",g.file) as url_file
			');
		$this->db->where('am.package_name', $package_name);
		$this->db->join('gallery_category gc','gc.id=g.id_category');
		$this->db->join('admob am','am.id=g.id_app');
		if(isset($keyword) && $keyword != '') {
			$this->db->like('gc.name', $keyword);
		}
		if(isset($offset) && $limit > 0) {
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('g.id','desc');
		$data = $this->db->get('gallery g')->result();
		$status = 200;
		if (count($data)==0) {
			$status = 204;
		}
		$this->response((object) array(
			'status' => true,
			'data' => $data,
		), $status);
	}

	function category_get() {
		$package_name = $this->get('app');
		$limit = (int) $this->get('length');
		$offset = (int) $this->get('start');
		$keyword = $this->get('search');

		$this->db->select('
			name as category_name,
			concat("'.base_url('assets/uploads/category/thumb/').'",thumb) as category_thumb,
			concat("'.base_url('assets/uploads/category/').'",file) as category_image,
			concat("'.base_url('api/app/gallery?app=').$package_name.'","&search=",name) as category_url,
			');
		if(isset($keyword) && $keyword != '') {
			$this->db->like('name', $keyword);
		}
		if(isset($offset) && $limit > 0) {
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('name','asc');
		$data = $this->db->get('gallery_category')->result();
		$status = 200;
		if (count($data)==0) {
			$status = 204;
		} 
		$this->response((object) array(
			'status' => true,
			'data' => $data,
		), $status);
	}

}