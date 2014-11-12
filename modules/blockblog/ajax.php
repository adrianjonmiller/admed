<?php
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
ob_start(); 
$status = 'success';
$message = '';

include_once(dirname(__FILE__).'/blog.class.php');
$obj_blog = new blog();

$action = $_REQUEST['action'];

switch ($action){
	case 'pagenavblogcat':
		include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
		
		$page = (int) $_POST['page'];
		$_html_page_nav = '';
		$_html = '';
		
		$name_module = 'blockblog';
		
		$step = Configuration::get($name_module.'perpage_catblog');
		$_data = $obj_blog->getCategories(array('start'=>$page,'step'=>$step));
		
		$paging = $obj_blog->PageNav($page,$_data['count_all'],$step,array('category'=>1));
		
		$_html_page_nav = $paging;
		
		$smarty->assign(array('categories' => $_data['categories'], 
							  'count_all' => $_data['count_all'],
							  'paging' => $paging
							  )
						);
		$smarty->assign($name_module.'urlrewrite_on', Configuration::get($name_module.'urlrewrite_on'));
						
		ob_start();
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			include_once(dirname(__FILE__).'/blockblog.php');
			$obj_blockblog = new blockblog();
			echo $obj_blockblog->renderTplListCat_list();
		} else {
			echo Module::display(dirname(__FILE__).'/blockblog.php', 'list_blogcat.tpl');
		}
		$_html = ob_get_clean();

		
	break;
	case 'pagenav':
		$page = (int) $_POST['page'];
		$category_id = (int) $_POST['item_id'];
		$_html_page_nav = '';
		$_html = '';
		
		$name_module = 'blockblog';
		
		$step = Configuration::get($name_module.'perpage_posts');
		$_data = $obj_blog->getPosts(array('start'=>$page,'step'=>$step,'id'=>$category_id));
		
		// strip tags for content
		foreach($_data['posts'] as $_k => $_item){
			$_data['posts'][$_k]['content'] = strip_tags($_item['content']);
		}
		
		$paging = $obj_blog->PageNav($page,$_data['count_all'],$step,array('category_id'=>$category_id));
		
		$_html_page_nav = $paging;
		
		$smarty->assign(array('posts' => $_data['posts'], 
							  'count_all' => $_data['count_all'],
							  'paging' => $paging
							  )
						);
		$smarty->assign($name_module.'urlrewrite_on', Configuration::get($name_module.'urlrewrite_on'));
						
		ob_start();
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			include_once(dirname(__FILE__).'/blockblog.php');
			$obj_blockblog = new blockblog();
			echo $obj_blockblog->renderTplList_list();
		} else {
			echo Module::display(dirname(__FILE__).'/blockblog.php', 'list.tpl');
		}
		$_html = ob_get_clean();
		
		
	break;
	case 'pagenavcomments':
		$page = (int) $_POST['page'];
		$post_id = (int) $_POST['item_id'];
		$_html_page_nav = '';
		$_html = '';
		
		$name_module = 'blockblog';
		$step = Configuration::get($name_module.'perpage_posts');
		$_data = $obj_blog->getComments(array('start'=>$page,'step'=>$step,'id'=>$post_id));
		
		$paging = $obj_blog->PageNav($page,$_data['count_all'],$step,array('post_id'=>$post_id));
		
		$_html_page_nav = $paging;
		
		$smarty->assign(array('comments' => $_data['comments'], 
							  'count_all' => $_data['count_all'],
							  'paging' => $paging
							  )
						);
						
		ob_start();
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			include_once(dirname(__FILE__).'/blockblog.php');
			$obj_blockblog = new blockblog();
			echo $obj_blockblog->renderTplList_comments();
		} else {
			echo Module::display(dirname(__FILE__).'/blockblog.php', 'list_comments.tpl');
		}
		$_html = ob_get_clean();
		
	break;
	case 'addcomment':
		$_html = '';
		$error_type = 0;
		
		$id_post = (int) $_POST['id_post'];
		$name = strip_tags(trim(htmlspecialchars($_POST['name'])));
		$email = trim($_POST['email']);
		$text_review = strip_tags(trim(htmlspecialchars($_POST['text_review'])));
		
		if(!preg_match("/[0-9a-z-_]+@[0-9a-z-_^\.]+\.[a-z]{2,4}/i", $email)) {
		    $error_type = 2;
			$status = 'error';
		 }
		 
		 if($error_type == 0 && strlen($name)==0){
			$error_type = 1;
			$status = 'error';
		 }
		 		 
		 if($error_type == 0 && strlen($text_review)==0){
			$error_type = 3;
			$status = 'error';
		 }
		
		 if($error_type == 0){
			//insert review
			$_data = array('name' => $name,
						   'email' => $email,
						   'text_review' => $text_review,
						   'id_post' => $id_post
						   );
			$obj_blog->saveComment($_data);
			
		 }
		
		
	break;
	case 'deleteimg':
		$item_id = $_POST['item_id'];
		$obj_blog->deleteImg(array('id'=>$item_id));
	break;
	default:
		$status = 'error';
		$message = 'Unknown parameters!';
	break;
}


$response = new stdClass();
$content = ob_get_clean();
$response->status = $status;
$response->message = $message;	
if($action == "addcomment"){
	$response->params = array('content' => $_html,
							  'error_type' => $error_type
							  );
} elseif($action == "pagenav" || $action == "pagenavsite" || $action == "pagenavcomments" || $action == "pagenavblogcat" )
	$response->params = array('content' => $_html, 'page_nav' => $_html_page_nav );
else
	$response->params = array('content' => $content);
echo json_encode($response);

?>