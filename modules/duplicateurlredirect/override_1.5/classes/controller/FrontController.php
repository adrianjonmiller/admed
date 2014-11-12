<?php
class FrontController extends FrontControllerCore
{
	public function display()
	{
		$is_se = false;
		if (stripos($_SERVER['HTTP_USER_AGENT'],'bot') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'baidu') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'spider') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'Ask Jeeves') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'slurp') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'crawl') !== false)
			$is_se = true;
		// {$is_se} can be used in any .tpl file to check for a search engine or regular user.
		if (isset($smarty) && is_object($smarty))
			self::$smarty->assign(array('is_se' => $is_se));
		
		parent::display();
	}
	
	public function init()
	{
		include_once(_PS_MODULE_DIR_.'/duplicateurlredirect/duplicateurlredirect.php');
		$dup = new DuplicateURLRedirect();
		$dup->redirect(); 
		parent::init();
	}
}