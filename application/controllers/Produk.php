<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	public $module = 'produk';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Produk';
		$page = 'pages/'.$module.'/v_'.$module;
		$js = 'pages/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
