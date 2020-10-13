<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {

	public $module = 'banner';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Banner';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
