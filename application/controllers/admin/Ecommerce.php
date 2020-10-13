<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends MY_Controller {

	public $module = 'ecommerce';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Ecommerce';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
