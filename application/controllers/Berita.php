<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MY_Controller {

	public $module = 'berita';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Berita';
		$page = 'pages/'.$module.'/v_'.$module;
		$js = 'pages/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
