<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MY_Controller {

	public $module = 'pengaturan';

	public function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Pengaturan';
		$page = 'pages/'.$module.'/v_'.$module;
		$js = 'pages/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
