<?php 
class Akun extends MY_Controller
{
	public $module = 'akun';

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['title'] = 'Akun';
		$page = 'admin/'.$module.'/v_'.$module;
		$js = 'admin/'.$module.'/js_'.$module;

		$this->loadview($data, $page, $js);
	}

}
?>