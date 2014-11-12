<?php

class blockblog extends Module
{
	private $_step = 20;
	
	function __construct()
	{
		$this->name = 'blockblog';
		$this->tab = 'Blog for PrestaShop';
		$this->version = '1.6.9';
		$this->author = 'storemodules';
		$this->module_key = "1bc36ed9759cb70344bcaaf7e0eef623";

		parent::__construct(); // The parent construct is required for translations

		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('Blog for PrestaShop');
		$this->description = $this->l('Add Blog for PrestaShop');
		
		
	}

	function install()
	{
		
		if (!parent::install())
			return false;
			
			
		Configuration::updateValue($this->name.'urlrewrite_on', 0);
		Configuration::updateValue($this->name.'position_cat', 'left');
		Configuration::updateValue($this->name.'position_post', 'left');
		Configuration::updateValue($this->name.'perpage_catblog', 5);
		Configuration::updateValue($this->name.'perpage_posts', 10);	
		Configuration::updateValue($this->name.'noti', 1);	
		Configuration::updateValue($this->name.'mail', @Configuration::get('PS_SHOP_EMAIL'));
		Configuration::updateValue($this->name.'blog_bcat', 5);
		Configuration::updateValue($this->name.'blog_bposts', 5);
		
		if (!$this->registerHook('leftColumn') 
			OR !$this->registerHook('rightColumn')
			OR !$this->registerHook('Header') 
			OR !$this->registerHook('productTabContent')
			OR !$this->registerHook('productTab') 
			OR !$this->_installDB()
			OR !$this->registerHook('home')
			OR !$this->_createFolderAndSetPermissions()
			 )
			return false;
		
		
		return true;
	}
	
	function uninstall()
	{
		
		if (!parent::uninstall())
			return false;
		return true;
	}
	
	private function _createFolderAndSetPermissions(){
		
		$prev_cwd = getcwd();
		
		$module_dir = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR;
		@chdir($module_dir);
		//folder avatars
		$module_dir_img = $module_dir."blockblog".DIRECTORY_SEPARATOR; 
		@mkdir($module_dir_img, 0777);

		@chdir($prev_cwd);
		
		return true;
	} 
	
	private function _installDB(){
		$sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blog_category` (
							  `id` int(11) NOT NULL auto_increment,
							  `time_add` timestamp NOT NULL default CURRENT_TIMESTAMP,
							  PRIMARY KEY  (`id`)
							) ENGINE='.(defined('_MYSQL_ENGINE_')?_MYSQL_ENGINE_:"MyISAM").' DEFAULT CHARSET=utf8;';
		if (!Db::getInstance()->Execute($sql))
			return false;
			
		$query = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blog_category_data` (
							  `id_item` int(11) NOT NULL,
							  `id_lang` int(11) NOT NULL,
							  `title` varchar(5000) default NULL,
							  `seo_description` text,
							  `seo_keywords` varchar(5000) default NULL,
							  `seo_url` varchar(5000) default NULL,
							  KEY `id_item` (`id_item`)
							) ENGINE='.(defined('_MYSQL_ENGINE_')?_MYSQL_ENGINE_:"MyISAM").' DEFAULT CHARSET=utf8';
		if (!Db::getInstance()->Execute($query))
			return false;
			
		$sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blog_post` (
					  `id` int(11) NOT NULL auto_increment,
					  `img` text,
					  `status` int(11) NOT NULL default \'1\',
					  `is_comments` int(11) NOT NULL default \'1\',
					  `time_add` timestamp NOT NULL default CURRENT_TIMESTAMP,
					  PRIMARY KEY  (`id`)
					) ENGINE='.(defined('_MYSQL_ENGINE_')?_MYSQL_ENGINE_:"MyISAM").' DEFAULT CHARSET=utf8;';
		if (!Db::getInstance()->Execute($sql))
			return false;
			
		$query = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blog_post_data` (
							  `id_item` int(11) NOT NULL,
							  `id_lang` int(11) NOT NULL,
							  `title` varchar(5000) default NULL,
							  `seo_keywords` varchar(5000) default NULL,
							  `seo_description` text,
							  `content` text,
							  `seo_url` varchar(5000) default NULL,
							  KEY `id_item` (`id_item`)
							) ENGINE='.(defined('_MYSQL_ENGINE_')?_MYSQL_ENGINE_:"MyISAM").' DEFAULT CHARSET=utf8';
		if (!Db::getInstance()->Execute($query))
			return false;
		
			
		$sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blog_comments` (
							  `id` int(11) NOT NULL auto_increment,
							  `id_lang` int(11) NOT NULL,
							  `name` varchar(5000) default NULL,
							  `email` varchar(500) default NULL,
							  `comment` text,
							  `status` int(11) NOT NULL default \'0\',
							  `id_post` int(11) NOT NULL,
							  `time_add` timestamp NOT NULL default CURRENT_TIMESTAMP,
							  PRIMARY KEY  (`id`)
							) ENGINE='.(defined('_MYSQL_ENGINE_')?_MYSQL_ENGINE_:"MyISAM").' DEFAULT CHARSET=utf8;';
		if (!Db::getInstance()->Execute($sql))
			return false;

		$sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blog_category2post` (
							  `category_id` int(11) NOT NULL,
							  `post_id` int(11) NOT NULL,
							  KEY `category_id` (`category_id`),
							  KEY `post_id` (`post_id`),
							  KEY `category2post` (`category_id`,`post_id`)
							) ENGINE='.(defined('_MYSQL_ENGINE_')?_MYSQL_ENGINE_:"MyISAM").' DEFAULT CHARSET=utf8;';
		if (!Db::getInstance()->Execute($sql))
			return false;
			
		return true;
	}
	
	private function _uninstallDB() {
		Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'blog_category');
		Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'blog_category_data');
		Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'blog_post');
		Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'blog_post_data');
		Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'blog_comments');
		Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'blog_category2post');
		return true;
	}

	function hookLeftColumn($params)
	{
		global $smarty;
		include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
    	$_data_cat = $obj_blog->getCategoriesBlock();
		$_data_post = $obj_blog->getRecentsPosts();
    	
		$smarty->assign(array($this->name.'categories' => $_data_cat['categories'],
							  $this->name.'posts' => $_data_post['posts']
							  )
						);
		
						
		$smarty->assign($this->name.'urlrewrite_on', Configuration::get($this->name.'urlrewrite_on'));
		
		$smarty->assign($this->name.'position_cat', Configuration::get($this->name.'position_cat'));
		$smarty->assign($this->name.'position_post', Configuration::get($this->name.'position_post'));
		return $this->display(__FILE__, 'left.tpl');		
	}
	
	function hookRightColumn($params)
	{
		global $smarty;
		include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
    	$_data_cat = $obj_blog->getCategoriesBlock();
		$_data_post = $obj_blog->getRecentsPosts();
    	
		$smarty->assign(array($this->name.'categories' => $_data_cat['categories'],
							  $this->name.'posts' => $_data_post['posts']
							  )
						);
		
		$smarty->assign($this->name.'urlrewrite_on', Configuration::get($this->name.'urlrewrite_on'));
		$smarty->assign($this->name.'position_cat', Configuration::get($this->name.'position_cat'));
		$smarty->assign($this->name.'position_post', Configuration::get($this->name.'position_post'));
		return $this->display(__FILE__, 'right.tpl');
	}
	
	
	function hookhome($params)
	{
		global $smarty;
		
		include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
    	$_data_cat = $obj_blog->getCategoriesBlock();
		$_data_post = $obj_blog->getRecentsPosts();
    	
		$smarty->assign(array($this->name.'categories' => $_data_cat['categories'],
							  $this->name.'posts' => $_data_post['posts']
							  )
						);
		
		$smarty->assign($this->name.'urlrewrite_on', Configuration::get($this->name.'urlrewrite_on'));
		$smarty->assign($this->name.'position_cat', Configuration::get($this->name.'position_cat'));
		$smarty->assign($this->name.'position_post', Configuration::get($this->name.'position_post'));

		$ps15 = 0;
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$ps15 = 1;
		} 
		$smarty->assign($this->name.'is_ps15', Configuration::get($this->name.'is_ps15'));
		return $this->display(__FILE__, 'home.tpl');
	}
	
	function hookHeader($params){
    	global $smarty;
    	
    	return $this->display(__FILE__, 'head.tpl');
    }
    
     public function hookproductTabContent($params)
	{
		global $smarty;

		include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
    	$_data_cat = $obj_blog->getCategoriesBlock();
		
		$smarty->assign(array($this->name.'categories' => $_data_cat['categories']
							  )
						);				
				
		return $this->display(__FILE__, 'TabContent.tpl');
	}	
	
	public function hookproductTab($params)
	{
		global $smarty;
		 include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
    	$_data_cat = $obj_blog->getCategoriesBlock();
		
		$smarty->assign(array($this->name.'categories' => $_data_cat['categories']
							  )
						);		
		return $this->display(__FILE__, 'tab.tpl');
	}
    
	
    public function getContent()
    {
    	$currentIndex = '';
    	include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
    	global $cookie;
    	
    	$this->_html = '';
        $this->_html .= $this->_jsandcss();	

        ################# category ##########################
        // list category
       $page_cat = isset($_REQUEST["pagecategories"])?$_REQUEST["pagecategories"]:'';
       $list_categories = isset($_REQUEST["list_categories"])?$_REQUEST["list_categories"]:'';
        if (strlen($page_cat)>0 || strlen($list_categories)>0) {
        	$this->_html .= '<script>init_tabs(2);</script>';
        }
        $edit_item_category = isset($_REQUEST["edit_item_category"])?$_REQUEST["edit_item_category"]:'';
    	if (strlen($edit_item_category)>0) {
        	$this->_html .= '<script>init_tabs(3);</script>';
        }
        // add category
        if (Tools::isSubmit("submit_addcategory")) {
        	$seo_url = Tools::getValue("seo_url");
        	$languages = Language::getLanguages(false);
	    	$data_title_content_lang = array();
	    	foreach ($languages as $language){
	    		$id_lang = $language['id_lang'];
	    		$category_title = Tools::getValue("category_title_".$id_lang);
	    		$category_seokeywords = Tools::getValue("category_seokeywords_".$id_lang);
	    		$category_seodescription = Tools::getValue("category_seodescription_".$id_lang);
	    		
	    		if(strlen($category_title)>0)
	    		{
	    			$data_title_content_lang[$id_lang] = array('category_title' => $category_title,
	    									 				   'category_seokeywords' => $category_seokeywords,
	    			 										   'category_seodescription' => $category_seodescription,
	    													   'seo_url' =>$seo_url
	    													    );		
	    		}
	    	}
	    	
        	$data = array( 'data_title_content_lang'=>$data_title_content_lang
         				  );
         	
         		
        	
         	if(sizeof($data_title_content_lang)>0)
        		$obj_blog->saveCategory($data);
         	
         	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_categories=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
			 
         }
        // delete category
        $delete_item_category = isset($_REQUEST["delete_item_category"])?$_REQUEST["delete_item_category"]:'';
        if (strlen($delete_item_category)>0) {
			if (Validate::isInt(Tools::getValue("id_category"))) {
				$obj_blog->deleteCategory(array('id'=>Tools::getValue("id_category")));
				Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_categories=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
			}
		}
		// cancel edit category 
    	if (Tools::isSubmit('cancel_editcategory'))
        {
       	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_categories=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
		}
		//edit category
     	if (Tools::isSubmit("submit_editcategory")) {
     		$seo_url = Tools::getValue("seo_url");
     		$languages = Language::getLanguages(false);
	    	$data_title_content_lang = array();
	    	foreach ($languages as $language){
	    		$id_lang = $language['id_lang'];
	    		$category_title = Tools::getValue("category_title_".$id_lang);
	    		$category_seokeywords = Tools::getValue("category_seokeywords_".$id_lang);
	    		$category_seodescription = Tools::getValue("category_seodescription_".$id_lang);
	    		
	    		if(strlen($category_title)>0)
	    		{
	    			$data_title_content_lang[$id_lang] = array('category_title' => $category_title,
	    									 				   'category_seokeywords' => $category_seokeywords,
	    													   'category_seodescription' => $category_seodescription,
	    													   'seo_url' =>$seo_url
	    													    );		
	    		}
	    	}
        	
     		
         	$id_editcategory = Tools::getValue("id_editcategory");
         	$data = array('data_title_content_lang'=>$data_title_content_lang,
        				  'id_editcategory' => $id_editcategory
         				 );
         	
         	if(sizeof($data_title_content_lang)>0)
         		$obj_blog->updateCategory($data);
         	$this->_html .= '<script>init_tabs(2);</script>'; 
         	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_categories=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
			
         }
		 ################# category ##########################
		 
         
         ################# posts ##########################
        // add post
    	if (Tools::isSubmit("submit_addpost")) {
         	$seo_url = Tools::getValue("seo_url");
    		$languages = Language::getLanguages(false);
	    	$data_title_content_lang = array();
	    	foreach ($languages as $language){
	    		$id_lang = $language['id_lang'];
	    		$post_title = Tools::getValue("post_title_".$id_lang);
	    		$post_seokeywords = Tools::getValue("post_seokeywords_".$id_lang);
	    		$post_seodescription = Tools::getValue("post_seodescription_".$id_lang);
	    		$post_content = Tools::getValue("content_".$id_lang);
	    		
	    		if(strlen($post_title)>0)
	    		{
	    			$data_title_content_lang[$id_lang] = array('post_title' => $post_title,
	    									 				   'post_seokeywords' => $post_seokeywords,
	    			 										   'post_seodescription' => $post_seodescription,
	    													   'post_content' => $post_content,
	    														'seo_url' => $seo_url
	    													    );		
	    		}
	    	}
	    	
        	
         	$ids_categories = Tools::getValue("ids_categories");
        	$post_status = Tools::getValue("post_status");
        	$post_iscomments = Tools::getValue("post_iscomments");
        	
         	$data = array('data_title_content_lang'=>$data_title_content_lang,
         				  'ids_categories' => $ids_categories,
         				  'post_status' => $post_status,
         				  'post_iscomments' => $post_iscomments
         				 );
         				 
			
         				 
         	if(sizeof($data_title_content_lang)>0 && sizeof($ids_categories)>0)
         		$obj_blog->savePost($data);
         	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_posts=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
			
         }
        //list posts
        $page_cat = isset($_REQUEST["pageposts"])?$_REQUEST["pageposts"]:'';
        $list_posts = isset($_REQUEST["list_posts"])?$_REQUEST["list_posts"]:'';
        if (strlen($page_cat)>0 || strlen($list_posts)>0) {
        	$this->_html .= '<script>init_tabs(4);</script>';
        }
    	$edit_item_posts = isset($_REQUEST["edit_item_posts"])?$_REQUEST["edit_item_posts"]:'';
    	if (strlen($edit_item_posts)>0) {
        	$this->_html .= '<script>init_tabs(5);</script>';
        }
    	// delete posts
        $delete_item_posts = isset($_REQUEST["delete_item_posts"])?$_REQUEST["delete_item_posts"]:'';
        if (strlen($delete_item_posts)>0) {
			if (Validate::isInt(Tools::getValue("id_posts"))) {
				$obj_blog->deletePost(array('id'=>Tools::getValue("id_posts")));
				Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_posts=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
			}
		}
    	// cancel edit posts 
    	if (Tools::isSubmit('cancel_editposts'))
        {
       	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_posts=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
		}
   		 //edit posts
     	if (Tools::isSubmit("submit_editposts")) {
     		$seo_url = Tools::getValue("seo_url");
     		$languages = Language::getLanguages(false);
	    	$data_title_content_lang = array();
	    	foreach ($languages as $language){
	    		$id_lang = $language['id_lang'];
	    		$post_title = Tools::getValue("post_title_".$id_lang);
	    		$post_seokeywords = Tools::getValue("post_seokeywords_".$id_lang);
	    		$post_seodescription = Tools::getValue("post_seodescription_".$id_lang);
	    		$post_content = Tools::getValue("content_".$id_lang);
	    		
	    		if(strlen($post_title)>0)
	    		{
	    			$data_title_content_lang[$id_lang] = array('post_title' => $post_title,
	    									 				   'post_seokeywords' => $post_seokeywords,
	    			 										   'post_seodescription' => $post_seodescription,
	    													   'post_content' => $post_content,
	    														'seo_url'=>$seo_url
	    													    );		
	    		}
	    	}
     		
     		$id_editposts = Tools::getValue("id_editposts");
     		
         	$ids_categories = Tools::getValue("ids_categories");
        	$post_status = Tools::getValue("post_status");
        	$post_iscomments = Tools::getValue("post_iscomments");
        	$post_images = Tools::getValue("post_images");
        	
         	$data = array('data_title_content_lang'=>$data_title_content_lang,
         				  'ids_categories' => $ids_categories,
         				  'post_status' => $post_status,
         				  'post_iscomments' => $post_iscomments,
         				  'id_editposts' => $id_editposts,
         				  'post_images' => $post_images
         				 );
         	if(sizeof($data_title_content_lang)>0 && sizeof($ids_categories)>0)
         		$obj_blog->updatePost($data);
         	$this->_html .= '<script>init_tabs(4);</script>';
         	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_posts=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
		 }
         ################# posts ##########################
         
		 
		 ################# comments ##########################
        // delete comments
        $delete_item_comments = isset($_REQUEST["delete_item_comments"])?$_REQUEST["delete_item_comments"]:'';
        
        if (strlen($delete_item_comments)>0) {
        	if (Validate::isInt(Tools::getValue("id_comments"))) {
				$obj_blog->deleteComment(array('id'=>Tools::getValue("id_comments")));
				Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_comments=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
			}
		}
    	 //list posts
        $page_comments = isset($_REQUEST["pagecomments"])?$_REQUEST["pagecomments"]:'';
        $list_comments = isset($_REQUEST["list_comments"])?$_REQUEST["list_comments"]:'';
        if (strlen($page_comments)>0 || strlen($list_comments)>0) {
        	$this->_html .= '<script>init_tabs(6);</script>';
        }
   	    $edit_item_comments = isset($_REQUEST["edit_item_comments"])?$_REQUEST["edit_item_comments"]:'';
    	if (strlen($edit_item_comments)>0) {
        	$this->_html .= '<script>init_tabs(7);</script>';
        }
    	// cancel edit comments 
    	if (Tools::isSubmit('cancel_editcomments'))
        {
       	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_comments=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
		}
     	//edit comments
     	if (Tools::isSubmit("submit_editcomments")) {
     		
     		$id_editcomments = Tools::getValue("id_editcomments");
     		
         	$comments_name = Tools::getValue("comments_name");
        	$comments_email = Tools::getValue("comments_email");
        	$comments_comment = Tools::getValue("comments_comment");
        	$comments_status = Tools::getValue("comments_status");
        	
         	$data = array('comments_name' => $comments_name,
         				  'comments_email' => $comments_email,
         				  'comments_comment' => $comments_comment,
         				  'comments_status' => $comments_status,
         	 			  'id_editcomments' => $id_editcomments
         				 );
         	if(strlen($comments_name)>0 && strlen($comments_comment)>0)
         		$obj_blog->updateComment($data);
         	$this->_html .= '<script>init_tabs(6);</script>';
         	Tools::redirectAdmin($currentIndex.'index.php?tab=AdminModules&list_comments=1&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'');
		 }
        ################# comments ##########################
         
    	if (Tools::isSubmit('submit_blogsettings'))
        {
        	
        	 Configuration::updateValue($this->name.'urlrewrite_on', Tools::getValue('urlrewrite_on'));
        	 Configuration::updateValue($this->name.'position_cat', Tools::getValue('position_cat'));
        	 Configuration::updateValue($this->name.'position_post', Tools::getValue('position_post'));
        	 Configuration::updateValue($this->name.'perpage_posts', Tools::getValue('perpage_posts'));
        	 Configuration::updateValue($this->name.'noti', Tools::getValue('noti'));
        	 Configuration::updateValue($this->name.'mail', Tools::getValue('mail'));
        	 Configuration::updateValue($this->name.'perpage_catblog', Tools::getValue('perpage_catblog'));
        	 
        	 
        	 Configuration::updateValue($this->name.'blog_bcat', Tools::getValue('blog_bcat'));
        	 Configuration::updateValue($this->name.'blog_bposts', Tools::getValue('blog_bposts'));
        	 $this->_html .= '<script>init_tabs(1);</script>';
        }

    	$this->_displayForm();
        return $this->_html;
    }
    
	private function _displayForm()
     {
     	
     	$this->_html .= '
		<fieldset>
					<legend><img src="../modules/'.$this->name.'/logo.gif"  />
					'.$this->displayName.'</legend>
					
		<fieldset class="toinone-menu">
			<legend>'.$this->l('Menu: ').'</legend>
		<ul class="leftMenu">
			<li><a href="javascript:void(0)" onclick="tabs_custom(1)" id="tab-menu-1" class="selected">'.$this->l('Blog Settings').'</a></li>
			<li><a href="javascript:void(0)" onclick="tabs_custom(2)" id="tab-menu-2">'.$this->l('Categories').'</a></li>';
		 $edit_item_category = isset($_REQUEST["edit_item_category"])?$_REQUEST["edit_item_category"]:'';
		 if (strlen($edit_item_category)>0) {
			$this->_html .=	'<li><a href="javascript:void(0)" onclick="tabs_custom(3)" id="tab-menu-3" style="font-weight:100;font-size:12px">'.$this->l('Edit Category').'</a></li>';
		 } else {
		 	$this->_html .=	'<li><a href="javascript:void(0)" onclick="tabs_custom(3)" id="tab-menu-3" style="font-weight:100;font-size:12px">'.$this->l('Add Category').'</a></li>';
		 }
		 
		$this->_html .=	'<li><a href="javascript:void(0)" onclick="tabs_custom(4)" id="tab-menu-4">'.$this->l('Posts').'</a></li>';
		
		$edit_item_posts = isset($_REQUEST["edit_item_posts"])?$_REQUEST["edit_item_posts"]:'';
		if (strlen($edit_item_posts)>0) {
			$this->_html .=	'<li><a href="javascript:void(0)" onclick="tabs_custom(5)" id="tab-menu-5" style="font-weight:100;font-size:12px">'.$this->l('Edit Post').'</a></li>';
		} else {
			$this->_html .=	'<li><a href="javascript:void(0)" onclick="tabs_custom(5)" id="tab-menu-5" style="font-weight:100;font-size:12px">'.$this->l('Add Post').'</a></li>';
		}
		
		$this->_html .=	'<li><a href="javascript:void(0)" onclick="tabs_custom(6)" id="tab-menu-6">'.$this->l('Comments').'</a></li>';
			
		$edit_item_comments = isset($_REQUEST["edit_item_comments"])?$_REQUEST["edit_item_comments"]:'';
		if(strlen($edit_item_comments)>0){
			$this->_html .=	'<li><a href="javascript:void(0)" onclick="tabs_custom(7)" id="tab-menu-7" style="font-weight:100;font-size:12px">'.$this->l('Edit Comments').'</a></li>';
		}
		
		
		$this->_html .= '</ul>
		</fieldset>
			
			<div class="toinone-content">
			
				<div id="tabs-1">'.$this->_drawSettingsForm().'</div>
				<div id="tabs-2">'.$this->_drawCategories().'</div>';
		      
		    	if (strlen($edit_item_category)>0) {
		        	$this->_html .= '<div id="tabs-3">'.$this->_drawAddCategoryForm(array('action'=>'edit',
		        																		  'id'=>Tools::getValue("id_category"))
		        																	).'</div>';
				} else {
		    		$this->_html .= '<div id="tabs-3">'.$this->_drawAddCategoryForm().'</div>';
				}
				
				$this->_html .=  '<div id="tabs-4">'.$this->_drawPosts(array('edit'=>2)).'</div>';
				
				if (strlen($edit_item_posts)>0) {
					$this->_html .=  '<div id="tabs-5">'.$this->_drawAddPostForm(array('action'=>'edit',
		        																		  'id'=>Tools::getValue("id_posts"))
																				).'</div>';
				} else {
					$this->_html .=  '<div id="tabs-5">'.$this->_drawAddPostForm().'</div>';
				}
				$this->_html .=  '<div id="tabs-6">'.$this->_drawComments(array('edit'=>2)).'</div>';
				
     			if(strlen($edit_item_comments)>0){
					$this->_html .=	'<div id="tabs-7">'.$this->_drawEditComments(array('action'=>'edit',
		        																	   'id'=>Tools::getValue("id_comments"))
		        																	).'</div>';
				}
				
				$this->_html .= '<div style="clear:both"></div>
				
			</div>
			
			
		</fieldset>	';
		
		
    }
    
	private function _drawAddCategoryForm($data = null){
		$action = $data['action'];
		$id = $data['id'];
		
		$title = '';
		$seo_description = '';
		$seo_keywords = '';
		$button = $this->l('Add Category');
		$title_block = $this->l('Add Category');
		
		if($action == 'edit'){
			include_once(dirname(__FILE__).'/blog.class.php');
			$obj_blog = new blog();
			$_data = $obj_blog->getCategoryItem(array('id'=>$id,'admin'=>1));
			//echo "<pre>"; var_dump($_data['category']);
			/*
			$title=$_data['category'][0]['title'];
			$seo_description = $_data['category'][0]['seo_description'];
			$seo_keywords = $_data['category'][0]['seo_keywords'];
			*/
			$button = $this->l('Update Category');
			$title_block = $this->l('Edit Category');
		}
		
		$divLangName = "category_title¤category_seokeywords¤category_seodescription";
		
		$_html = '';
    	$_html .= '<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">';
    	
    	
    	$_html .= '<fieldset >
					<legend><img src="../modules/'.$this->name.'/logo.gif" />'.$title_block.'</legend>';
		
    	$_html .= '<label>'.$this->l('Title').'</label>';

    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	    $languages = Language::getLanguages(false);
    	
    	$_html .= '<div class="margin-form">';
    	
		foreach ($languages as $language){
			$id_lng = (int)$language['id_lang'];
	    	$title = isset($_data['category']['data'][$id_lng]['title'])?$_data['category']['data'][$id_lng]['title']:"";
	    	
			$_html .= '	<div id="category_title_'.$language['id_lang'].'" 
							 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
							 >

						<input type="text" style="width:400px"   
								  id="category_title_'.$language['id_lang'].'" 
								  name="category_title_'.$language['id_lang'].'" 
								  value="'.htmlentities(stripslashes($title), ENT_COMPAT, 'UTF-8').'"/>
						</div>';
	    	}
		ob_start();
		$this->displayFlags($languages, $defaultLanguage, $divLangName, 'category_title');
		$displayflags = ob_get_clean();
		$_html .= $displayflags;
		$_html .= '<div style="clear:both"></div>';
			        
		$_html .=  '</div>';

		if(Configuration::get($this->name.'urlrewrite_on') == 1){
		// identifier
		global $cookie;
		$current_lng =  $cookie->id_lang;
		$seo_url = isset($_data['category']['data'][$current_lng]['seo_url'])?$_data['category']['data'][$current_lng]['seo_url']:"";
	    	
		$_html .= '<label>'.$this->l('Identifier (SEO URL)').'</label>';
    	
    	$_html .= '<div class="margin-form">';
    	
			
			$_html .= '
						<input type="text" style="width:400px"   
								  id="seo_url" 
								  name="seo_url" 
								  value="'.$seo_url.'"/>
						<p>(eg: domain.com/modules/blockblog/identifier)</p>
						';
	    $_html .=  '</div>';
		}
		
    	$_html .= '<label>'.$this->l('SEO Keywords').'</label>';
    			
    	/*$_html .= '<div class="margin-form">
					<textarea name="category_seokeywords" cols="80" rows="10"  
			                	   >'.$seo_keywords.'</textarea>
			        
			       </div>';*/
    	
    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	    $languages = Language::getLanguages(false);
    	
    	$_html .= '<div class="margin-form">';
    	
		foreach ($languages as $language){
			$id_lng = (int)$language['id_lang'];
	    	$seo_keywords = isset($_data['category']['data'][$id_lng]['seo_keywords'])?$_data['category']['data'][$id_lng]['seo_keywords']:"";
	    	
			$_html .= '	<div id="category_seokeywords_'.$language['id_lang'].'" 
							 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
							 >
						<textarea cols="80" rows="10"  
			                	  id="category_seokeywords_'.$language['id_lang'].'" 
								  name="category_seokeywords_'.$language['id_lang'].'"
								  >'.htmlentities(stripslashes($seo_keywords), ENT_COMPAT, 'UTF-8').'</textarea>
						</div>';
	    	}
		ob_start();
		$this->displayFlags($languages, $defaultLanguage, $divLangName, 'category_seokeywords');
		$displayflags = ob_get_clean();
		$_html .= $displayflags;
		$_html .= '<div style="clear:both"></div>';
		
    	$_html .=  '</div>';
    	
    	
    	$_html .= '<label>'.$this->l('SEO Description').'</label>';
    			
    	/*$_html .= '<div class="margin-form">
		            <textarea name="category_seodescription" cols="80" rows="10"  
			                	   >'.$seo_description.'</textarea>
			        
			       </div>';*/
    	
    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	    $languages = Language::getLanguages(false);
    	
    	$_html .= '<div class="margin-form">';
    	
		foreach ($languages as $language){
			$id_lng = (int)$language['id_lang'];
	    	$seo_description = isset($_data['category']['data'][$id_lng]['seo_description'])?$_data['category']['data'][$id_lng]['seo_description']:"";
	    	
			$_html .= '	<div id="category_seodescription_'.$language['id_lang'].'" 
							 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
							 >
						<textarea cols="80" rows="10"  
			                	  id="category_seodescription_'.$language['id_lang'].'" 
								  name="category_seodescription_'.$language['id_lang'].'"
								  >'.htmlentities(stripslashes($seo_description), ENT_COMPAT, 'UTF-8').'</textarea>
						</div>';
	    	}
		ob_start();
		$this->displayFlags($languages, $defaultLanguage, $divLangName, 'category_seodescription');
		$displayflags = ob_get_clean();
		$_html .= $displayflags;
		$_html .= '<div style="clear:both"></div>';
		
    	$_html .=  '</div>';
		
		$_html .= '</fieldset>';
    	
		if($action == 'edit'){
		$_html .= '<input type = "hidden" name = "id_editcategory" value = "'.$id.'"/>';
    	$_html .= '<p class="center" style="background: none repeat scroll 0pt 0pt rgb(255, 255, 240); border: 1px solid rgb(223, 213, 195); padding: 10px; margin-top: 10px;">
					<input type="submit" name="cancel_editcategory" value="'.$this->l('Cancel').'" 
                		   class="button"  />
    				<input type="submit" name="submit_editcategory" value="'.$button.'" 
                		   class="button"  />
                	
                	</p>';
		} else {
		$_html .= '<p class="center" style="background: none repeat scroll 0pt 0pt rgb(255, 255, 240); border: 1px solid rgb(223, 213, 195); padding: 10px; margin-top: 10px;">
					<input type="submit" name="submit_addcategory" value="'.$button.'" 
                		   class="button"  />
                	</p>';
			
		}
    	$_html .= '</form>';
    	
    	if($action == 'edit'){
    		$_html .= $this->_drawPosts(array('edit'=>1,'id_category'=>$id));
    	}
    	
    	return $_html;
    }
    
    
	private function _drawAddPostForm($data = null){
		
		include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
			
		
		$action = $data['action'];
		$id = $data['id'];
		
		$id_category = array();
		$title = '';
		$seo_description = '';
		$seo_keywords = '';
		$content = '';
		$status = 1;
		$is_comments = 1;
		$button = $this->l('Add Post');
		$title_block = $this->l('Add Post');
		$img = '';
		
		if($action == 'edit'){
			$_data = $obj_blog->getPostItem(array('id'=>$id));
			$id_category=$_data['post'][0]['category_ids'];
			/*$title=$_data['post'][0]['title'];
			$seo_description = $_data['post'][0]['seo_description'];
			$seo_keywords = $_data['post'][0]['seo_keywords'];
			$content = $_data['post'][0]['content'];*/
			$img = $_data['post'][0]['img'];
			$status = $_data['post'][0]['status'];
			$is_comments = $_data['post'][0]['is_comments'];
			
			$button = $this->l('Update Post');
			$title_block = $this->l('Edit Post');
		}
		
		$divLangName = "ccontent¤post_title¤post_seokeywords¤post_seodescription";
		
    	$_html = '';
    	$_html .= '<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">';
    	
    	$_html .= '<fieldset >
					<legend><img src="../modules/'.$this->name.'/logo.gif" />'.$title_block.'</legend>';
		
    	$_html .= '<label style="width:120px">'.$this->l('Title').'</label>';
    			
    	/*$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">
					<input type="text" name="post_title" value="'.$title.'"  style="width:274px">
			        
			       </div>';*/
    	
    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	    $languages = Language::getLanguages(false);
    	
    	$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">';
    	
		foreach ($languages as $language){
			$id_lng = (int)$language['id_lang'];
	    	$title = isset($_data['post']['data'][$id_lng]['title'])?$_data['post']['data'][$id_lng]['title']:"";
	    	
			$_html .= '	<div id="post_title_'.$language['id_lang'].'" 
							 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
							 >

						<input type="text" style="width:400px"   
								  id="post_title_'.$language['id_lang'].'" 
								  name="post_title_'.$language['id_lang'].'" 
								  value="'.htmlentities(stripslashes($title), ENT_COMPAT, 'UTF-8').'"/>
						</div>';
	    	}
		ob_start();
		$this->displayFlags($languages, $defaultLanguage, $divLangName, 'post_title');
		$displayflags = ob_get_clean();
		$_html .= $displayflags;
		$_html .= '<div style="clear:both"></div>';
			        
		$_html .=  '</div>';
    	
    
	if(Configuration::get($this->name.'urlrewrite_on') == 1){
		// identifier
		global $cookie;
		$current_lng =  $cookie->id_lang;
		$seo_url = isset($_data['post']['data'][$current_lng]['seo_url'])?$_data['post']['data'][$current_lng]['seo_url']:"";
	    	
		$_html .= '<label style="width:120px">'.$this->l('Identifier (SEO URL)').'</label>';
    	
    	$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">';
    	
			
			$_html .= '
						<input type="text" style="width:400px"   
								  id="seo_url" 
								  name="seo_url" 
								  value="'.$seo_url.'"/>
						<p>(eg: domain.com/modules/blockblog/identifier)</p>
						';
	    $_html .=  '</div>';
		}
		
    	$_html .= '<label style="width:120px">'.$this->l('SEO Keywords').'</label>';
    			
    	/*$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">
					<textarea name="post_seokeywords" cols="80" rows="10"  
			                	   >'.$seo_keywords.'</textarea>';*/
    	
    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	    $languages = Language::getLanguages(false);
    	
    	$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">';
    	
		foreach ($languages as $language){
			$id_lng = (int)$language['id_lang'];
	    	$seo_keywords = isset($_data['post']['data'][$id_lng]['seo_keywords'])?$_data['post']['data'][$id_lng]['seo_keywords']:"";
	    	
			$_html .= '	<div id="post_seokeywords_'.$language['id_lang'].'" 
							 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
							 >
						<textarea id="post_seokeywords_'.$language['id_lang'].'" 
								  name="post_seokeywords_'.$language['id_lang'].'" 
								  cols="80" rows="10"  
			                	   >'.htmlentities(stripslashes($seo_keywords), ENT_COMPAT, 'UTF-8').'</textarea>
						
						</div>';
	    	}
		ob_start();
		$this->displayFlags($languages, $defaultLanguage, $divLangName, 'post_seokeywords');
		$displayflags = ob_get_clean();
		$_html .= $displayflags;
		$_html .= '<div style="clear:both"></div>';
			        
		$_html .=  '</div>';
			        
		
    	
    	$_html .= '<label style="width:120px">'.$this->l('SEO Description').'</label>';
    			
    	/*$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">
					<textarea name="post_seodescription" cols="80" rows="10"  
			                	   >'.$seo_description.'</textarea>';*/
    	
    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	    $languages = Language::getLanguages(false);
    	
    	$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">';
    	
		foreach ($languages as $language){
			$id_lng = (int)$language['id_lang'];
	    	$seo_description = isset($_data['post']['data'][$id_lng]['seo_description'])?$_data['post']['data'][$id_lng]['seo_description']:"";
	    	
			$_html .= '	<div id="post_seodescription_'.$language['id_lang'].'" 
							 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
							 >
						<textarea id="post_seodescription_'.$language['id_lang'].'" 
								  name="post_seodescription_'.$language['id_lang'].'" 
								  cols="80" rows="10"  
			                	   >'.htmlentities(stripslashes($seo_description), ENT_COMPAT, 'UTF-8').'</textarea>
						
						</div>';
	    	}
		ob_start();
		$this->displayFlags($languages, $defaultLanguage, $divLangName, 'post_seodescription');
		$displayflags = ob_get_clean();
		$_html .= $displayflags;
		$_html .= '<div style="clear:both"></div>';
			        
		$_html .=  '</div>';
			        
		
    	
    	
    	if(defined('_MYSQL_ENGINE_')){
    	$_html .= '<label style="width:50px">'.$this->l('Content').'</label>';
    	/*$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 50px;">
						<textarea class="rte" cols="30" rows="30" 
								  id="body_paragraph" 
								  name="post_content">'.$content.'</textarea>
						</div>
					';*/
    	
    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	    $languages = Language::getLanguages(false);
    	
    	$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 50px;">';
    	
		foreach ($languages as $language){
			$id_lng = (int)$language['id_lang'];
			$content = isset($_data['post']['data'][$id_lng]['content'])?$_data['post']['data'][$id_lng]['content']:"";
	    	
			$_html .= '	<div id="ccontent_'.$language['id_lang'].'" 
							 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
							 >
						<textarea id="content_'.$language['id_lang'].'" 
								  name="content_'.$language['id_lang'].'" 
								  class="rte" cols="30" rows="30"  
			                	   >'.htmlentities(stripslashes($content), ENT_COMPAT, 'UTF-8').'</textarea>
						
						</div>';
	    	}
		ob_start();
		$this->displayFlags($languages, $defaultLanguage, $divLangName, 'ccontent');
		$displayflags = ob_get_clean();
		$_html .= $displayflags;
		$_html .= '<div style="clear:both"></div>';
			        
		$_html .=  '</div>';
    	
    	}else{
    		$_html .= '<label style="width:120px">'.$this->l('Content').'</label>';
    		
    		/*$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 50px;">
						<textarea class="rte" cols="30" rows="30" 
								  id="body_paragraph" 
								  name="post_content">'.$content.'</textarea>
						</div>';*/
    		
    		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		    $languages = Language::getLanguages(false);
	    	
	    	$_html .= '<div class="margin-form" style="padding: 0pt 0pt 10px 50px;">';
	    	
			foreach ($languages as $language){
				$id_lng = (int)$language['id_lang'];
		    	$content = isset($_data['post']['data'][$id_lng]['content'])?$_data['post']['data'][$id_lng]['content']:"";
		    	
				$_html .= '	<div id="ccontent_'.$language['id_lang'].'" 
								 style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;"
								 >
							<textarea id="content_'.$language['id_lang'].'" 
									  name="content_'.$language['id_lang'].'" 
									  class="rte" cols="30" rows="30"  
				                	   >'.htmlentities(stripslashes($content), ENT_COMPAT, 'UTF-8').'</textarea>
							
							</div>';
		    	}
			ob_start();
			$this->displayFlags($languages, $defaultLanguage, $divLangName, 'ccontent');
			$displayflags = ob_get_clean();
			$_html .= $displayflags;
			$_html .= '<div style="clear:both"></div>';
				        
			$_html .=  '</div>';
    	}
    	
    	$_html .= '<label style="width:120px">'.$this->l('Logo Image').'</label>
    			
    				<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">
					<input type="file" name="post_image" id="post_image" class="customFileInput" />
					<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';

    	
    	if(strlen($img)>0){
    	$_html .= '<div id="post_images_list">';
    		$_html .= '<div style="float:left;margin:10px" id="post_images_id">';
    		$_html .= '<table width=100%>';
    		
    		$_html .= '<tr><td align="left">';
    			$_html .= '<input type="radio" checked name="post_images"/>';
    		
    		$_html .= '</td>';
    		
    		$_html .= '<td align="right">';
    		
    			$_html .= '<a href="javascript:void(0)" title="'.$this->l('Delete').'"  
    						onclick = "delete_img('.$id.');"><img src="'._PS_ADMIN_IMG_.'delete.gif" alt="" /></a>
    					';
    		
    		$_html .= '</td>';
    		
    		$_html .= '<tr>';
    		$_html .= '<td colspan=2>';
    		$_html .= '<img src="../upload/'.$this->name.'/'.$img.'" style="width:50px;height:50px"/>';
    		$_html .= '</td>';
    		$_html .= '</tr>';
    		
    		$_html .= '</table>';
    		
    		$_html .= '</div>';
    	
    	$_html .= '<div style="clear:both"></div>';
    	$_html .= '</div>';
    	}
    	
    	$_html .= '</div>';
    	
    	
		$_data_cat  = $obj_blog->getCategories(array('admin'=>1)); 
		
    	$_html .= '<label style="width:120px">'.$this->l('Select categories').'</label>
    					<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">';
		$_html .= '<select name="ids_categories[]" multiple="multiple" size="10" style="width:400px">';
		foreach($_data_cat['categories'] as $_item){
		    					
		    	$name = isset($_item['title'])?$_item['title']:'';
		    	$id_pr = isset($_item['id'])?$_item['id']:'';
		    	if(strlen($name)==0) continue;
		    	
		    	if(in_array($id_pr,$id_category))
		    		$_html .= '<option  value="'.$id_pr.'" selected>'.$name.'</option>';
		    	else
		    		$_html .= '<option  value="'.$id_pr.'">'.$name.'</option>';
		    	
		}
    	$_html .= '</select>';				
		$_html .=  '</div>';
		
		
		$_html .= '<label style="width:120px">'.$this->l('Status').'</label>
				<div class = "margin-form" style="padding: 0pt 0pt 10px 130px;">';
				
		$_html .= '<select name="post_status" style="width:100px">
					<option value=1 '.(($status==1)?"selected=\"true\"":"").'>'.$this->l('Enabled').'</option>
					<option value=0 '.(($status==0)?"selected=\"true\"":"").'>'.$this->l('Disabled').'</option>
				   </select>';
			
				
			$_html .= '</div>';
			
		$_html .= '<label style="width:120px">'.$this->l('Enable Comments').'</label>
				<div class = "margin-form" style="padding: 0pt 0pt 10px 130px;">';
		
		$_html .= '<select name="post_iscomments" style="width:100px">
					<option value=1 '.(($is_comments==1)?"selected=\"true\"":"").'>'.$this->l('Enabled').'</option>
					<option value=0 '.(($is_comments==0)?"selected=\"true\"":"").'>'.$this->l('Disabled').'</option>
				   </select>';
				
			$_html .= '</div>';
    	
		$_html .= '</fieldset>';
    	
		
		if($action == 'edit'){
		$_html .= '<input type = "hidden" name = "id_editposts" value = "'.$id.'"/>';
    	$_html .= '<p class="center" style="background: none repeat scroll 0pt 0pt rgb(255, 255, 240); border: 1px solid rgb(223, 213, 195); padding: 10px; margin-top: 10px;">
					<input type="submit" name="cancel_editposts" value="'.$this->l('Cancel').'" 
                		   class="button"  />
    				<input type="submit" name="submit_editposts" value="'.$button.'" 
                		   class="button"  />
                	
                	</p>';
		} else {
		$_html .= '<p class="center" style="background: none repeat scroll 0pt 0pt rgb(255, 255, 240); border: 1px solid rgb(223, 213, 195); padding: 10px; margin-top: 10px;">
					<input type="submit" name="submit_addpost" value="'.$button.'" 
                		   class="button"  />
                	</p>';
			
		}
		
    	
    	$_html .= '</form>';
    	
		if($action == 'edit'){
    		$_html .= $this->_drawComments(array('edit'=>1,'id_posts'=>$id));
    	}
    	
    	return $_html;
    }
    
    private function _drawCategories(){
    	global $currentIndex, $cookie;
    	include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
		
    	$_html = '';
    	
    	$_html .= '<table class = "table" width = 100%>
			<tr>
				<th>'.$this->l('No.').'</th>
				<th width = 400>'.$this->l('Title Category').'</th>
				<th width=100>'.$this->l('Date').'</th>
				<th width = "44">'.$this->l('Action').'</th>
			</tr>';
    	
    	$name_module = $this->name;
		$start = (int)Tools::getValue("pagecategories");
		
		$_data = $obj_blog->getCategories(array('start'=>$start,'step'=>$this->_step,'admin'=>1));
		
		$paging = $obj_blog->PageNav($start,$_data['count_all'],$this->_step, 
											array('admin' => 1,'currentIndex'=>$currentIndex,
												  'token' => '&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)),
												  'item' => 'categories'
											));
    	$i=0;
    	
    	foreach($_data['categories'] as $_item){
			$i++;
			$id = $_item['id'];
			$name = @$_item['title'];
			$date = $_item['time_add'];
			
			$_html .= 
			'<tr>
			<td style = "color:black;">'.$id.'</td>
			<td style = "color:black;">'.$name.'</td>';
			$_html .= '<td style = "color:black;">'.$date.'</td>
			
			<form action = "'.$_SERVER['REQUEST_URI'].'" name="get_categories" method = "POST">';
			$_html .= '
			<td>
				 <input type = "hidden" name = "id_category" value = "'.$id.'"/>
				 <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'&edit_item_category=1&id_category='.(int)($id).'" title="'.$this->l('Edit').'"><img src="'._PS_ADMIN_IMG_.'edit.gif" alt="" /></a> 
				 <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'&delete_item_category=1&id_category='.(int)($id).'" title="'.$this->l('Delete').'"  onclick = "javascript:return confirm(\''.$this->l('Are you sure you want to remove this item?').'\');"><img src="'._PS_ADMIN_IMG_.'delete.gif" alt="" /></a>'; 
				 $_html .= '</form>
			 </td>
			 </tr>';
			
			$_html .= '</tr>';
		}
    	
    	$_html .= '</table>';
    	if($i!=0){
    	$_html .= '<div style="margin:5px">';
    	$_html .= $paging;
    	$_html .= '</div>';
    	}
    	
    	return $_html;
    }
    
    private function _drawPosts($data = null){
    	
    	$edit = isset($data['edit'])?$data['edit']:0;
    	$id_category = isset($data['id_category'])?(int)$data['id_category']:0;
    	
    	global $currentIndex, $cookie;
    	include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
		$start = (int)Tools::getValue("pageposts");
		if($edit == 2){
			$_data = $obj_blog->getPosts(array('admin'=>2,'start'=>$start,'step'=>$this->_step));
		} else {
			$_data = $obj_blog->getPosts(array('admin'=>1,'id'=>$id_category));
		}
		
    	$_html = '';
    	if($edit ==1){
    		$count_all = $_data['count_all'];
    		$_html .= '<br/>';
    		$_html .= '<h2>Posts ('.$count_all.')</h2>';
    				
    	}
    	
    	$_html .= '<table class = "table" width = 100%>
			<tr>
				<th>'.$this->l('No.').'</th>
				<th width = 300>'.$this->l('Title Post').'</th>
				<th width=100>'.$this->l('Status').'</th>
				<th width=100>'.$this->l('Date').'</th>
				<th width = "44">'.$this->l('Action').'</th>
			</tr>';
    	
    	$name_module = $this->name;
		
		
		if($edit ==2){
		
		$paging = $obj_blog->PageNav($start,$_data['count_all'],$this->_step, 
											array('admin' => 1,'currentIndex'=>$currentIndex,
												  'token' => '&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)),
												  'item' => 'posts'
											));
		}
    	
		$i=0;
		foreach($_data['posts'] as $_item){
			$i++;
			$id = $_item['id'];
			$name = $_item['title'];
			$date = $_item['time_add'];
			$status  = $_item['status'];
			
			$_html .= 
			'<tr>
			<td style = "color:black;">'.$id.'</td>
			<td style = "color:black;">'.$name.'</td>';
			if($status)
				$_html .= '<td><img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif"></td>';
			else
				$_html .= '<td><img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif"></td>';
				
			$_html .= '<td style = "color:black;">'.$date.'</td>
			
			<form action = "'.$_SERVER['REQUEST_URI'].'" name="get_posts" method = "POST">';
			$_html .= '
			<td>
				 <input type = "hidden" name = "id" value = "'.$id.'"/>
				 <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'&edit_item_posts=1&id_posts='.(int)($id).'" title="'.$this->l('Edit').'"><img src="'._PS_ADMIN_IMG_.'edit.gif" alt="" /></a> 
				 <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'&delete_item_posts=1&id_posts='.(int)($id).'" title="'.$this->l('Delete').'"  onclick = "javascript:return confirm(\''.$this->l('Are you sure you want to remove this item?').'\');"><img src="'._PS_ADMIN_IMG_.'delete.gif" alt="" /></a>'; 
				 $_html .= '</form>
			 </td>
			 </tr>';
			
			$_html .= '</tr>';
		}
    	
    	$_html .= '</table>';
    	if($i!=0 && $edit == 2){
    	$_html .= '<div style="margin:5px">';
    	$_html .= $paging;
    	$_html .= '</div>';
    	}
    	
    	return $_html;
    }
    
     private function _drawComments($data = null){
    	
    	$edit = isset($data['edit'])?$data['edit']:0;
    	$id_posts = isset($data['id_posts'])?(int)$data['id_posts']:0;
    	
    	global $currentIndex, $cookie;
    	include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
		$start = (int)Tools::getValue("pagecomments");
		if($edit == 2){
			$_data = $obj_blog->getComments(array('admin'=>2,'start'=>$start,'step'=>$this->_step));
		} else {
			$_data = $obj_blog->getComments(array('admin'=>1,'id'=>$id_posts));
		}
		
    	$_html = '';
    	if($edit ==1){
    		$count_all = $_data['count_all'];
    		$_html .= '<br/>';
    		$_html .= '<h2>'.$this->l('Comments').' ('.$count_all.')</h2>';
    				
    	}
    	
    	$_html .= '<table class = "table" width = 100%>
			<tr>
				<th>'.$this->l('No.').'</th>
				<th width = 300>'.$this->l('Title Comment').'</th>
				<th width=100>'.$this->l('Status').'</th>
				<th width=100>'.$this->l('Date').'</th>
				<th width = "44">'.$this->l('Action').'</th>
			</tr>';
    	
    	$name_module = $this->name;
		
		
		if($edit ==2){
		
		$paging = $obj_blog->PageNav($start,$_data['count_all'],$this->_step, 
											array('admin' => 1,'currentIndex'=>$currentIndex,
												  'token' => '&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)),
												  'item' => 'comments'
											));
		}
    	
		$i=0;
		foreach($_data['comments'] as $_item){
			$i++;
			$id = $_item['id'];
			$name = substr($_item['comment'],0,100);
			$date = $_item['time_add'];
			$status  = $_item['status'];
			
			$_html .= 
			'<tr>
			<td style = "color:black;">'.$id.'</td>
			<td style = "color:black;">'.$name.'</td>';
			if($status)
				$_html .= '<td><img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif"></td>';
			else
				$_html .= '<td><img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif"></td>';
				
			$_html .= '<td style = "color:black;">'.$date.'</td>
			
			<form action = "'.$_SERVER['REQUEST_URI'].'" name="get_posts" method = "POST">';
			$_html .= '
			<td>
				 <input type = "hidden" name = "id" value = "'.$id.'"/>
				 <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'&edit_item_comments=1&id_comments='.(int)($id).'" title="'.$this->l('Edit').'"><img src="'._PS_ADMIN_IMG_.'edit.gif" alt="" /></a> 
				 <a href="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.intval(Tab::getIdFromClassName('AdminModules')).intval($cookie->id_employee)).'&delete_item_comments=1&id_comments='.(int)($id).'" title="'.$this->l('Delete').'"  onclick = "javascript:return confirm(\''.$this->l('Are you sure you want to remove this item?').'\');"><img src="'._PS_ADMIN_IMG_.'delete.gif" alt="" /></a>'; 
				 $_html .= '</form>
			 </td>
			 </tr>';
			
			$_html .= '</tr>';
		}
    	
    	$_html .= '</table>';
    	if($i!=0 && $edit == 2){
    	$_html .= '<div style="margin:5px">';
    	$_html .= $paging;
    	$_html .= '</div>';
    	}
    	
    	return $_html;
    }
    
    private function _drawEditComments($data = null){
    	include_once(dirname(__FILE__).'/blog.class.php');
		$obj_blog = new blog();
		
		$action = $data['action'];
		$id = $data['id'];
		
    	if($action == 'edit'){
			$_data = $obj_blog->getCommentItem(array('id'=>$id));
			$name = $_data['comments'][0]['name'];
			$email = $_data['comments'][0]['email'];
			$comment = $_data['comments'][0]['comment'];
			$status = $_data['comments'][0]['status'];
			
			$button = $this->l('Update Comment');
			$title_block = $this->l('Edit Comment');
		}
		
    	$_html = '';
    	
    	$_html .= '<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">';
    	
    	$_html .= '<fieldset >
					<legend><img src="../modules/'.$this->name.'/logo.gif" />'.$title_block.'</legend>';
		
    	$_html .= '<label style="width:120px">'.$this->l('Name').'</label>
    			
    				<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">
					<input type="text" name="comments_name" value="'.$name.'"  style="width:274px">
			        
			       </div>';
    	
    	$_html .= '<label style="width:120px">'.$this->l('Email').'</label>
    			
    				<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">
					<input type="text" name="comments_email" value="'.$email.'"  style="width:274px">
			        
			       </div>';
    
    	$_html .= '<label style="width:120px">'.$this->l('Comment').'</label>
    			
    				<div class="margin-form" style="padding: 0pt 0pt 10px 130px;">
					<textarea name="comments_comment" cols="80" rows="10"  
			                	   >'.$comment.'</textarea>
			        
			       </div>';
    	
    	$_html .= '<label style="width:120px">'.$this->l('Status').'</label>
				<div class = "margin-form" style="padding: 0pt 0pt 10px 130px;">';
				
		$_html .= '<select name="comments_status" style="width:100px">
					<option value=1 '.(($status==1)?"selected=\"true\"":"").'>'.$this->l('Enabled').'</option>
					<option value=0 '.(($status==0)?"selected=\"true\"":"").'>'.$this->l('Disabled').'</option>
				   </select>';
			
		$_html .= '</div>';
    
		$_html .= '</fieldset>';
		
		if($action == 'edit'){
		$_html .= '<input type = "hidden" name = "id_editcomments" value = "'.$id.'"/>';
    	$_html .= '<p class="center" style="background: none repeat scroll 0pt 0pt rgb(255, 255, 240); border: 1px solid rgb(223, 213, 195); padding: 10px; margin-top: 10px;">
					<input type="submit" name="cancel_editcomments" value="'.$this->l('Cancel').'" 
                		   class="button"  />
    				<input type="submit" name="submit_editcomments" value="'.$button.'" 
                		   class="button"  />
                	
                	</p>';
		} 
		
    	
    	$_html .= '</form>';
    	
    	return $_html;
    }
    
    
private function _hint(){
    	$_html = '';
    	
    	$_html .= '<p style="display: block; font-size: 11px; width: 95%; margin-bottom:20px;position:relative" class="hint clear">
    	<b>'.$this->l('URL rewriting configuration:').'</b>
    	<br/><br/>
    	'.$this->l('Add to your .htaccess file in section ').'&lt;IfModule mod_rewrite.c&gt;&lt;/IfModule&gt;'.$this->l(' following lines').':
    	<br/><br/>
    	<code>
		RewriteRule ^blog/category/([0-9a-zA-Z-_]+)/?$ /modules/blockblog/blockblog-category.php?category_id=$1 [QSA,L]
		</code>
		<br/>
		<code>
		RewriteRule ^blog/post/([0-9a-zA-Z-_]+)/?$ /modules/blockblog/blockblog-post.php?post_id=$1 [QSA,L]
		</code>
		<br/>
		<code>
		RewriteRule ^blog/?$ /modules/blockblog/blockblog-categories.php [QSA,L] 
		</code>
		
			<br/><br/>
		</p>';
    	
    	return $_html;
    }
    
    private function _hint15(){
    	$_html = '';
    	
    	$_html .= '<p style="display: block; font-size: 11px; width: 95%; margin-bottom:20px;position:relative" class="hint clear">
    	<b>'.$this->l('URL rewriting configuration:').'</b>
    	<br/><br/>
    	'.$this->l('Add to your .htaccess file in section ').'&lt;IfModule mod_rewrite.c&gt;&lt;/IfModule&gt;'.$this->l(' following lines').':
    	<br/><br/>
    	
    	<b><code>
		RewriteRule ^blog/category/([0-9a-zA-Z-_]+)/?$ /modules/blockblog/blockblog-category.php?category_id=$1 [QSA,L]
		</code>
		</b>
		<br/>
		<b>
		<code>
		RewriteRule ^blog/post/([0-9a-zA-Z-_]+)/?$ /modules/blockblog/blockblog-post.php?post_id=$1 [QSA,L]
		</code>
		</b>
		<br/>
		<b>
		<code>
		RewriteRule ^blog/?$ /modules/blockblog/blockblog-categories.php [QSA,L] 
		</code>
		</b>
		<br/><br/>
		'.$this->l('Add rows with the rules for URL rewriting before section Dispatcher.').'
		<br/><br/>
		<b style="font-size:13px">'.$this->l('Example:').'</b>
			<br/><br/>
			<code>
			### module Blog for Prestashop
			</code>
			<br/>
			<code>
			RewriteRule ^blog/category/([0-9a-zA-Z-_]+)/?$ /modules/blockblog/blockblog-category.php?category_id=$1 [QSA,L]
			</code>
			<br/>
			<code>
			RewriteRule ^blog/post/([0-9a-zA-Z-_]+)/?$ /modules/blockblog/blockblog-post.php?post_id=$1 [QSA,L]
			</code>
			<br/>
			<code>
			RewriteRule ^blog/?$ /modules/blockblog/blockblog-categories.php [QSA,L]
			</code>
			<br/><br/>
			<code>			
			# Dispatcher
			</code>
			<br/>
			<code>
			RewriteCond %{REQUEST_FILENAME} -s [OR]
			</code>
			<br/>
			<code>
			RewriteCond %{REQUEST_FILENAME} -l [OR]
			</code>
			<br/>
			<code>
			RewriteCond %{REQUEST_FILENAME} -d
			</code>
			<br/>
			<code>
			RewriteCond %{HTTP_HOST} ^yoursite.com$
			</code>
			<br/>
			<code>
			RewriteRule ^.*$ - [NC,L]
			</code>
			<br/>
			<code>
			RewriteCond %{HTTP_HOST} ^yoursite.com$
			</code>
			<br/>
			<code>
			RewriteRule ^.*$ %{ENV:REWRITEBASE}index.php [NC,L]
			</code>
			<br/>
			<code>
			&lt;/IfModule&gt;
			</code>
			<br/><br/>
			<code>
			#If rewrite mod isn\'t enabled
    		</code>
    		<br/>
    		<code>
			ErrorDocument 404 /index.php?controller=404
			</code>
			<br/><br/>
			<code>
			# ~~end~~ Do not remove this comment, Prestashop will keep automatically the code outside this comment when .htaccess will be generated again
			</code>
		</p>';
    	
    	return $_html;
    }
    
    
    private function _drawSettingsForm(){
    	$_html = '';
    	$_html .= '<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">';
    	
    	$_html .= '<fieldset>
					<legend><img src="../modules/'.$this->name.'/logo.gif" />
						'.$this->l('Blog Settings').'</legend>';

    	$_html .= '<div id="block-url-settings" '.(Configuration::get($this->name.'urlrewrite_on')==1?'style="display:block"':'style="display:none"').'>';
    	if(substr(_PS_VERSION_,0,3) == '1.5'){
    	$_html .= $this->_hint15();
    		 
    	} else{
    	$_html .= $this->_hint();
    	}	
    	$_html .= '</div>';
    	
    	$_html .= '<table style="width:100%">';
    	
    	
    	$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:40%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('Enable or Disable URL rewriting').':</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<input type="radio" value="1" id="text_list_on" name="urlrewrite_on" onclick="enableOrDisable(1)"
							'.(Tools::getValue('urlrewrite_on', Configuration::get($this->name.'urlrewrite_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_on" class="t"> 
						<img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif">
					</label>
					
					<input type="radio" value="0" id="text_list_off" name="urlrewrite_on"  onclick="enableOrDisable(0)"
						   '.(!Tools::getValue('urlrewrite_on', Configuration::get($this->name.'urlrewrite_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_off" class="t">
						<img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif">
					</label>
					
					<p class="clear">'.$this->l('Enable only if your server allows URL rewriting (recommended)').'.</p>
				';
		$_html .= '<script type="text/javascript">
			    	function enableOrDisable(id)
						{
						if(id==0){
							$("#block-url-settings").hide(200);
						} else {
							$("#block-url-settings").show(200);
						}
							
						}
					</script>';
		$_html .= '</td>';
		$_html .= '</tr>';
    	
    	
    	
    	$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:40%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('Position "Blog Categories" Block:').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<select class="select" name="position_cat" 
							id="position_cat">
						<option '.(Tools::getValue('position_cat', Configuration::get($this->name.'position_cat'))  == "left" ? 'selected="selected" ' : '').' value="left">'.$this->l('Left').'</option>
						<option '.(Tools::getValue('position_cat', Configuration::get($this->name.'position_cat')) == "right" ? 'selected="selected" ' : '').' value="right">'.$this->l('Right').'</option>
						<option '.(Tools::getValue('position_cat', Configuration::get($this->name.'position_cat')) == "home" ? 'selected="selected" ' : '').' value="home">'.$this->l('Home').'</option>
						<option '.(Tools::getValue('position_cat', Configuration::get($this->name.'position_cat')) == "none" ? 'selected="selected" ' : '').' value="none">'.$this->l('None').'</option>
					
					</select>
				';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:40%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('Categories per Page:').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<input type="text" name="perpage_catblog"  
			               value="'.Tools::getValue('perpage_catblog', Configuration::get($this->name.'perpage_catblog')).'"
			               >
				';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:40%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('Position "Posts recents" Block:').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<select class="select" name="position_post" 
							id="position_post">
						<option '.(Tools::getValue('position_post', Configuration::get($this->name.'position_post'))  == "left" ? 'selected="selected" ' : '').' value="left">'.$this->l('Left').'</option>
						<option '.(Tools::getValue('position_post', Configuration::get($this->name.'position_post')) == "right" ? 'selected="selected" ' : '').' value="right">'.$this->l('Right').'</option>
						<option '.(Tools::getValue('position_post', Configuration::get($this->name.'position_post')) == "home" ? 'selected="selected" ' : '').' value="home">'.$this->l('Home').'</option>
						<option '.(Tools::getValue('position_post', Configuration::get($this->name.'position_post')) == "none" ? 'selected="selected" ' : '').' value="none">'.$this->l('None').'</option>
					
					</select>
				';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:40%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('Posts per Page:').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<input type="text" name="perpage_posts"  
			               value="'.Tools::getValue('perpage_posts', Configuration::get($this->name.'perpage_posts')).'"
			               >
				';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:55%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('The number of items in the "Blog categories":').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<input type="text" name="blog_bcat"  
			               value="'.Tools::getValue('blog_bcat', Configuration::get($this->name.'blog_bcat')).'"
			               >
				';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:55%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('The number of items in the "Blog Posts recents":').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<input type="text" name="blog_bposts"  
			               value="'.Tools::getValue('blog_bposts', Configuration::get($this->name.'blog_bposts')).'"
			               >
				';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:40%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('Admin email:').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .=  '
					<input type="text" name="mail"  
			               value="'.Tools::getValue('mail', Configuration::get($this->name.'mail')).'"
			               >
				';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		$_html .= '<tr>';
    	$_html .= '<td style="text-align:right;width:40%;padding:0 20px 0 0">';
    	
    	$_html .= '<b>'.$this->l('E-mail notification:').'</b>';
    	
    	$_html .= '</td>';
    	$_html .= '<td style="text-align:left">';
		$_html .= '<input type = "checkbox" name = "noti" id = "noti" value ="1" '.((Tools::getValue($this->name.'noti', Configuration::get($this->name.'noti')) ==1)?'checked':'').'/>';
		$_html .= '</td>';
		$_html .= '</tr>';
		
		
		$_html .= '</table>';
			
			$_html .= '<p class="center" style="background: none repeat scroll 0pt 0pt rgb(255, 255, 240); border: 1px solid rgb(223, 213, 195); padding: 10px; margin-top: 10px;">
					<input type="submit" name="submit_blogsettings" value="'.$this->l('Update settings').'" 
                		   class="button"  />
                	</p>';
    	$_html .= '</form>';
    	return $_html;
    }
    
    
    private function _jsandcss(){
    	$_html = '';
    	$_html .= '<link rel="stylesheet" href="../modules/'.$this->name.'/css/blog.css" type="text/css" />';
      
    	// custom menu
    	$_html .= '<link rel="stylesheet" href="../modules/'.$this->name.'/css/custom_menu.css" type="text/css" />';
    	$_html .= '<script type="text/javascript" src="../modules/'.$this->name.'/js/custom_menu.js"></script>';
    	
    	// custom-input-file
    	
    	$_html .= '<link rel="stylesheet" href="../modules/'.$this->name.'/css/custom-input-file.css" type="text/css" />';
    	$_html .= '<script type="text/javascript" src="../modules/'.$this->name.'/js/custom-input-file.js"></script>';
    	
    global $cookie;
    	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$iso = Language::getIsoById((int)($cookie->id_lang));
		$isoTinyMCE = (file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en');
		$ad = dirname($_SERVER["PHP_SELF"]);
		
		if(defined('_MYSQL_ENGINE_') && substr(_PS_VERSION_,0,3) != '1.5'){
		$_html .=  '
			<script type="text/javascript">	
			var iso = \''.$isoTinyMCE.'\' ;
			var pathCSS = \''._THEME_CSS_DIR_.'\' ;
			var ad = \''.$ad.'\' ;
			</script>';
			$_html .= '<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tiny_mce/tiny_mce.js"></script>
			<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce.inc.js"></script>';
		$_html .= '
		<script type="text/javascript">id_language = Number('.$defaultLanguage.');</script>';
		} 
		
		if(substr(_PS_VERSION_,0,3) == '1.5' || !defined('_MYSQL_ENGINE_')){
			
			if(substr(_PS_VERSION_,0,3) == '1.5'){
				$_html .=  '
			<script type="text/javascript">	
			var iso = \''.$isoTinyMCE.'\' ;
			var pathCSS = \''._THEME_CSS_DIR_.'\' ;
			var ad = \''.$ad.'\' ;
			</script>';
				$_html .= '<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tiny_mce/tiny_mce.js"></script>
				<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce.inc.js"></script>';
			} else {
				$_html .=  '
			<script type="text/javascript">	
			var iso = \''.$isoTinyMCE.'\' ;
			var pathCSS = \''._THEME_CSS_DIR_.'\' ;
			var ad = \''.$ad.'\' ;
			</script>';
				$_html .= '<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
				';
			}
			
			
			
		$_html .= '<script type="text/javascript">
					tinyMCE.init({
						mode : "specific_textareas",
						theme : "advanced",
						editor_selector : "rte",';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			 $_html .= 'skin:"cirkuit",';
		}
			$_html  .=  'editor_deselector : "noEditor",
						plugins : "safari,pagebreak,style,layer,table,advimage,advlink,inlinepopups,media,searchreplace,contextmenu,paste,directionality,fullscreen",
						// Theme options
						theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
						theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,,|,forecolor,backcolor",
						theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,media,|,ltr,rtl,|,fullscreen",
						theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,pagebreak",
						theme_advanced_toolbar_location : "top",
						theme_advanced_toolbar_align : "left",
						theme_advanced_statusbar_location : "bottom",
						theme_advanced_resizing : false,';
		  $_html .=	   'content_css : "'.__PS_BASE_URI__.'themes/'._THEME_NAME_.'/css/global.css",
						document_base_url : "'.__PS_BASE_URI__.'",';
		  if(!defined('_MYSQL_ENGINE_')){
		  $_html .=		'width: "550",';
		  } else {
		  $_html .=		'width: "650",';
		  }
		  $_html .=	    'height: "auto",
						font_size_style_values : "8pt, 10pt, 12pt, 14pt, 18pt, 24pt, 36pt",
						// Drop lists for link/image/media/template dialogs
						template_external_list_url : "lists/template_list.js",
						external_link_list_url : "lists/link_list.js",
						external_image_list_url : "lists/image_list.js",
						media_external_list_url : "lists/media_list.js",';
			
			if(substr(_PS_VERSION_,0,3) == '1.5'){
			$_html .= 	'elements : "nourlconvert,ajaxfilemanager",
						 file_browser_callback : "ajaxfilemanager",';
			} else {
			$_html .= 	'elements : "nourlconvert",';
			}
			
			$_html .=	'entity_encoding: "raw",
						convert_urls : false,
						language : "'.(file_exists(_PS_ROOT_DIR_.'/js/tinymce/jscripts/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en').'"
						
					});
		</script>';
		
		}
    	return $_html;
    }
    
  public function renderTplCategories(){
    	return Module::display(dirname(__FILE__).'/blockblog.php', 'categories.tpl');
    } 
    
    public function renderTplCategory(){
    	return Module::display(dirname(__FILE__).'/blockblog.php', 'category.tpl');
    }
    
    public function translateItems(){
    	$page = $this->l('Page');
    	return array('page'=>$page);
    }
    
    public function renderTplPost(){
    	return Module::display(dirname(__FILE__).'/blockblog.php', 'post.tpl');
    }
    
    public function renderTplListCat_list(){
    	return Module::display(dirname(__FILE__).'/blockblog.php', 'list_blogcat.tpl');
    }
    
    public function renderTplList_list(){
    	return Module::display(dirname(__FILE__).'/blockblog.php', 'list.tpl');
    }
    
    public function renderTplList_comments(){
    	return Module::display(dirname(__FILE__).'/blockblog.php', 'list_comments.tpl');
    }
}