<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MY_Controller {

	public $module = 'berita';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Berita';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
