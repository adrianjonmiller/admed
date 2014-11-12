<?php
//error_reporting(E_ALL|E_STRICT);

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

$post_id = isset($_REQUEST['post_id'])?$_REQUEST['post_id']:0;

include_once(dirname(__FILE__).'/blog.class.php');
$obj_blog = new blog();

$post_id = $obj_blog->getTransformSEOURLtoIDPost(array('id'=>$post_id));


$_info_cat = $obj_blog->getPostItem(array('id' => $post_id,'site'=>1));

if(empty($_info_cat['post'][0]['id']))
	Tools::redirect('/');

$title = isset($_info_cat['post'][0]['title'])?$_info_cat['post'][0]['title']:'';
$seo_description = isset($_info_cat['post'][0]['seo_description'])?$_info_cat['post'][0]['seo_description']:'';
$seo_keywords = isset($_info_cat['post'][0]['seo_keywords'])?$_info_cat['post'][0]['seo_keywords']:''; 

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
					$smarty->assign('page_name' , "blockblog-post");
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

########### category info ##################
$ids_cat = $_info_cat['post'][0]['category_ids'];
$category_data = array();
foreach($ids_cat as $k => $cat_id){
	$_info_ids = $obj_blog->getCategoryItem(array('id' => $cat_id));
	
	$is_active = 1;
	if(empty($_info_ids['category'][0]['title']))
		$is_active = 0;	
	$category_data[] = @$_info_ids['category'][0];
}
//var_dump($category_data);
########## end category info ###############


$step = Configuration::get($name_module.'perpage_posts');
$_data = $obj_blog->getComments(array('start'=>0,'step'=>$step,'id'=>$post_id));

include_once(dirname(__FILE__).'/blockblog.php');
$obj_blockblog = new blockblog();

$_data_translate = $obj_blockblog->translateItems();
$page_translate = $_data_translate['page']; 

$paging = $obj_blog->PageNav(0,$_data['count_all'],$step,array('post_id'=>$post_id,'page'=>$page_translate));


$smarty->assign(array('comments' => $_data['comments'], 
					  'count_all' => $_data['count_all'],
					  'paging' => $paging
					  )
				);

				
$smarty->assign(array('posts' => $_info_cat['post'],
					  'category_data' => $category_data,
					  'is_active' => $is_active
					  )
				);


if(substr(_PS_VERSION_,0,3) == '1.5'){
	echo $obj_blockblog->renderTplPost();
} else {
	echo Module::display(dirname(__FILE__).'/blockblog.php', 'post.tpl');
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