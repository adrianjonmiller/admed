<?php
//error_reporting(E_ALL|E_STRICT);
require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

$category_id = isset($_REQUEST['category_id'])?$_REQUEST['category_id']:0;


include_once(dirname(__FILE__).'/blog.class.php');
$obj_blog = new blog();

$category_id = $obj_blog->getTransformSEOURLtoID(array('id'=>$category_id));

$_info_cat = $obj_blog->getCategoryItem(array('id' => $category_id));
$title = isset($_info_cat['category'][0]['title'])?$_info_cat['category'][0]['title']:'';
$seo_description = isset($_info_cat['category'][0]['seo_description'])?$_info_cat['category'][0]['seo_description']:'';
$seo_keywords = isset($_info_cat['category'][0]['seo_keywords'])?$_info_cat['category'][0]['seo_keywords']:''; 

$smarty->assign('meta_title' , $title);
$smarty->assign('meta_description' , $seo_description);
$smarty->assign('meta_keywords' , $seo_keywords);

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
					$smarty->assign('page_name' , "blockblog-posts");
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



$step = Configuration::get($name_module.'perpage_posts');
$_data = $obj_blog->getPosts(array('start'=>0,'step'=>$step,'id'=>$category_id));


include_once(dirname(__FILE__).'/blockblog.php');
$obj_blockblog = new blockblog();

$_data_translate = $obj_blockblog->translateItems();
$page_translate = $_data_translate['page']; 
$paging = $obj_blog->PageNav(0,$_data['count_all'],$step,array('category_id'=>$category_id,'page'=>$page_translate));

// strip tags for content
foreach($_data['posts'] as $_k => $_item){
	$_data['posts'][$_k]['content'] = strip_tags($_item['content']);
	
}

$smarty->assign(array('posts' => $_data['posts'], 
					  'count_all' => $_data['count_all'],
					  'paging' => $paging
					  )
				);


if(substr(_PS_VERSION_,0,3) == '1.5'){
	echo $obj_blockblog->renderTplCategory();
} else {
	echo Module::display(dirname(__FILE__).'/blockblog.php', 'category.tpl');
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