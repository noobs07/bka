<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MY_Controller {

	public $module = 'kontak';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Kontak';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
