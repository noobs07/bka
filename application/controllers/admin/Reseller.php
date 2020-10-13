<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller extends MY_Controller {

	public $module = 'reseller';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Reseller';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
