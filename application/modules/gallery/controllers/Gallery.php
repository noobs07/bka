<?php 
class Gallery extends MX_Controller
{
	public $module = 'gallery';

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$module = $this->module;

		$data['module'] = $module;
		$data['categories'] = $this->get_categories();
		$data['apps'] = $this->get_apps();
		$data['title'] = 'Gallery';
		$page = $module.'/v_'.$module;
		$js = $module.'/js_'.$module;

		echo modules::run('template/loadview', $data, $page, $js);
	}

	function get_categories(){
		return $this->db->get('gallery_category')->result();
	}

	function get_apps(){
		return $this->db->get('admob')->result();
	}
}
?>