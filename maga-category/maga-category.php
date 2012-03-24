<?php
/*
Plugin Name: Maga Category Images
Plugin URI: http://divisionentrecero.mx
Description: Allows us to associate an image to a given category.
Version: 1.0
Author: Ricardo Magallanes Arco (@rMaga56)
Author URI: http://divisionentrecero.mx
License: GPL
*/

include 'system/controller.php';
$maga = new CatImgHandler();
class CatImgHandler
{

	public function __construct()
	{
		add_action('admin_menu', array(&$this,'settings_page'));
		add_action('wp_ajax_handle_response',array(&$this,'handle_response'));
	}

	public function getSpecificImage($catId)
	{
		global $wpdb;
		$check = $wpdb->get_var(Controller::checkExisting($catId));
		if($check != 0)
		{
			$res = $wpdb->get_var(Controller::getFileName($catId));
			return ''.get_bloginfo("url").'/wp-content/plugins/maga-category/img/'.$res;
		}
	}

	public function getImageInCategory()
	{
		$cat = get_query_var("cat");
		return $this->getSpecificImage($cat);
	}

	public function handle_response()
	{
		include 'system/fileUploader.php';
	}

	public function settings_page()
	{
		add_options_page('Category Images','Category Images','manage_options','maga_admin',array(&$this,'renderMenu'));
	}

	public function renderMenu()
	{
		include 'views/settings.php';
	}

	public function createTable()
	{
		$sql = Controller::createTable();
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}

	public function dropTable()
	{
		global $wpdb;
		$sql = Controller::dropTable();
		$wpdb->query($sql);
		$files = glob(ABSPATH.'wp-content/plugins/maga-category/img/*');
		foreach($files as $f)
		{
			unlink($f);
		}
	}
}

/*Activation/Deactivation Hooks*/
register_activation_hook(__FILE__,array('CatImgHandler','createTable'));
register_deactivation_hook(__FILE__,array('CatImgHandler','dropTable'));
?>
