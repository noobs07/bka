<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller {

	public $module = 'video';

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Video';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}
}
