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

		$this->loadview($data, $page, $js);
	}
}
