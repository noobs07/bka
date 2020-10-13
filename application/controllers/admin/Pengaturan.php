<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MY_Controller {

	public $module = 'pengaturan';

	public function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Pengaturan';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
