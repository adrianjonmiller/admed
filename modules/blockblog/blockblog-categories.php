<?php
//error_reporting(E_ALL|E_STRICT);

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

$category_id = isset($_REQUEST['category_id'])?(int)$_REQUEST['category_id']:0;

include_once(dirname(__FILE__).'/blog.class.php');
$obj_blog = new blog();

$category_id = $obj_blog->getTransformSEOURLtoID(array('id'=>$category_id));


$smarty->assign('meta_title' , "Blog categories");
$smarty->assign('meta_description' , "Blog categories");
$smarty->assign('meta_keywords' , "Blog categories");

$name_module = 'blockblog';

$smarty->assign($name_module.'urlrewrite_on', Configuration::get($name_module.'urlrewrite_on'));

if (version_compare(_PS_VERSION_, '1.5', '>')) {
				if (isset(Context::getContext()->controller)) {
					$oController = Context::getContext()->controller;
				}
				else {
					$oController = new FrontController();
					$oController->init();
				}
				if(Configuration::get($name_module.'urlrewrite_on') == 1){
					$smarty->assign('page_name' , "blockblog-categories");
				} else {
					$page_name = str_replace(array('.php', '/'), array('', '-'),$_SERVER['REQUEST_URI']);
					$page_name = 'module'.$page_name;
				}
				// header
				$oController->setMedia();
				$oController->displayHeader();
			}
			else {
				include_once(dirname(__FILE__).'/../../header.php');
			}


$step = Configuration::get($name_module.'perpage_catblog');
$_data = $obj_blog->getCategories(array('start'=>0,'step'=>$step));

include_once(dirname(__FILE__).'/blockblog.php');
$obj_blockblog = new blockblog();

$_data_translate = $obj_blockblog->translateItems();
$page_translate = $_data_translate['page']; 

$paging = $obj_blog->PageNav(0,$_data['count_all'],$step,array('category'=>1,'page'=>$page_translate));



$smarty->assign(array('categories' => $_data['categories'], 
					  'count_all' => $_data['count_all'],
					  'paging' => $paging
					  )
				);


if(substr(_PS_VERSION_,0,3) == '1.5'){
	echo $obj_blockblog->renderTplCategories();
} else {
	echo Module::display(dirname(__FILE__).'/blockblog.php', 'categories.tpl');
}

	if (version_compare(_PS_VERSION_, '1.5', '>')) {
				if (isset(Context::getContext()->controller)) {
					$oController = Context::getContext()->controller;
				}
				else {
					$oController = new FrontController();
					$oController->init();
				}
				// footer
				@$oController->displayFooter();
			}
			else {
				include_once(dirname(__FILE__).'/../../footer.php');
			}

?>