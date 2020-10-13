<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	public $module = 'produk';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Produk';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
