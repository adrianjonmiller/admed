<?php
class blog  extends Module{
	
	private $_width = 400;
	private $_height = 400;
	private $_name = 'blockblog';
	
	public function __construct(){
		
	}
	
	public function saveCategory($data){
		
		$sql = 'INSERT into `'._DB_PREFIX_.'blog_category` SET
							   `time_add` = NULL
							   ';
		
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
		defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		$post_id = Db::getInstance()->Insert_ID();
		
		foreach($data['data_title_content_lang'] as $language => $item){
		
		$category_title = $item['category_title'];
		$category_seokeywords = $item['category_seokeywords'];
		$category_seodescription = $item['category_seodescription'];
		$translite_seo = $this->_translit($item['seo_url']);
		$seo_url = strlen($translite_seo)>0?$translite_seo:"category".Tools::passwdGen(6);
		
		$sql = 'INSERT into `'._DB_PREFIX_.'blog_category_data` SET
							   `id_item` = \''.pSQL($post_id).'\',
							   `id_lang` = \''.pSQL($language).'\',
							   `title` = \''.pSQL($category_title).'\',
							   `seo_keywords` = \''.pSQL($category_seokeywords).'\',
							   `seo_description` = \''.pSQL($category_seodescription).'\',
							   `seo_url` = \''.pSQL($seo_url).'\'
							   ';
		
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
		defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		}
		
		
	}
	
	public function updateCategory($data){
		
		$id = (int)$data['id_editcategory'];
		
		/// delete tabs data
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_category_data` WHERE id_item = '.$id.'';
		
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
		defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		foreach($data['data_title_content_lang'] as $language => $item){
		
		$category_title = $item['category_title'];
		$category_seokeywords = $item['category_seokeywords'];
		$category_seodescription = $item['category_seodescription'];
		$translite_seo = $this->_translit($item['seo_url']);
		$seo_url = strlen($translite_seo)>0?$translite_seo:"category".strtolower(Tools::passwdGen(6));
		
		$sql = 'SELECT count(*) as count
				FROM `'._DB_PREFIX_.'blog_category_data` pc
				WHERE seo_url = "'.$seo_url.'"';
		$data_seo_url = Db::getInstance()->GetRow($sql);
		if($data_seo_url['count']!=0)
			$seo_url = "category".strtolower(Tools::passwdGen(6));
			
		$sql = 'INSERT into `'._DB_PREFIX_.'blog_category_data` SET
							   `id_item` = \''.pSQL($id).'\',
							   `id_lang` = \''.pSQL($language).'\',
							   `title` = \''.pSQL($category_title).'\',
							   `seo_keywords` = \''.pSQL($category_seokeywords).'\',
							   `seo_description` = \''.pSQL($category_seodescription).'\',
							   `seo_url` = \''.pSQL($seo_url).'\'
							   
							   ';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		}
		
		
		
	}
	
	
private function  _translit( $str )
	{
    $str  = str_replace(array("'",'"','`','?','!','.','=',':','&','+',',','’', ')', '(', '$', '{', '}'), array(''), $str );
		
	$arrru = array ("А","а","Б","б","В","в","Г","г","Д","д","Е","е","Ё","ё","Ж","ж","З","з","И","и","Й","й","К","к","Л","л","М","м","Н","н", "О","о","П","п","Р","р","С","с","Т","т","У","у","Ф","ф","Х","х","Ц","ц","Ч","ч","Ш","ш","Щ","щ","Ъ","ъ","Ы","ы","Ь", "ь","Э","э","Ю","ю","Я","я",
    " ","-",",","«","»","+","/","(",")",".");

    $arren = array ("a","a","b","b","v","v","g","g","d","d","e","e","e","e","zh","zh","z","z","i","i","y","y","k","k","l","l","m","m","n","n", "o","o","p","p","r","r","s","s","t","t","u","u","ph","f","h","h","c","c","ch","ch","sh","sh","sh","sh","","","i","i","","","e", "e","yu","yu","ya","ya",
    "-","-","","","","","","","","");

	$textout = '';
    $textout = str_replace($arrru,$arren,$str);
    
    $textout = str_replace("--","-",$textout);
    return strtolower($textout);
	}
	
	public function deleteCategory($data){
		
		$id = $data['id'];
		
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_category`
							   WHERE id ='.$id.'';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_category_data`
							   WHERE id_item ='.$id.'';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		// get all posts_id for category //
		$sql = '
			SELECT post_id 
			FROM  `'._DB_PREFIX_.'blog_category2post` c2p
			WHERE c2p.category_id = '.$id.'';
		$posts_ids = Db::getInstance()->ExecuteS($sql);
		
		// delete post_id x category_id
		$tmp_array_posts_ids = array();
		foreach($posts_ids as $k1=>$_item){
				$id_post = $_item['post_id'];
				$tmp_array_posts_ids[] = $id_post;
				
					$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_category2post`
								   WHERE post_id = '.$id_post.' AND 
								   category_id = '.$id.'';
					
					if(substr(_PS_VERSION_,0,3) == '1.5'){
						$result = Db::getInstance()->Execute($sql);
					} else {
						defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
					}
		}

		// delete empty posts
		foreach($tmp_array_posts_ids as $item){
			$data_count = Db::getInstance()->getRow('
			SELECT COUNT(*) AS "count"
			FROM `'._DB_PREFIX_.'blog_category2post` c2p
			WHERE c2p.post_id = '.$item.' 
			');
			
			if($data_count['count'] == 0){
				$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_post`
							   WHERE id ='.$item.'';
				if(substr(_PS_VERSION_,0,3) == '1.5'){
					$result = Db::getInstance()->Execute($sql);
				} else {
				defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
				}
					
				$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_post_data`
							   WHERE id_item ='.$item.'';
				if(substr(_PS_VERSION_,0,3) == '1.5'){
					$result = Db::getInstance()->Execute($sql);
				} else {
				defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
				}
			}
		}
		
	}
	
	public function getTransformSEOURLtoID($_data){
		
	if(Configuration::get($this->_name.'urlrewrite_on') == 1 && !is_numeric($_data['id'])){
			$id = $_data['id'];
			$sql = '
					SELECT pc.id_item as id
					FROM `'._DB_PREFIX_.'blog_category_data` pc
					WHERE seo_url = "'.$id.'"';
			$data_id = Db::getInstance()->GetRow($sql);
			$id = $data_id['id'];
		} else {
			$id = (int)$_data['id'];
		}
		
		return $id;
	}
	
	public function getTransformSEOURLtoIDPost($_data){
		//var_dump(is_numeric($_data['id']));
	if(Configuration::get($this->_name.'urlrewrite_on') == 1 && !is_numeric($_data['id'])){
			$id = $_data['id'];
			$sql = '
					SELECT pc.id_item as id
					FROM `'._DB_PREFIX_.'blog_post_data` pc
					WHERE seo_url = "'.$id.'"';
			$data_id = Db::getInstance()->GetRow($sql);
			$id = $data_id['id'];
		} else {
			$id = (int)$_data['id'];
		}
		
		return $id;
	}
	
	
	public function getCategoryItem($_data){
		$id = $_data['id'];
		$admin = isset($_data['admin'])?$_data['admin']:0;
		
		if($admin == 1){
				$sql = '
					SELECT pc.*
					FROM `'._DB_PREFIX_.'blog_category` pc
					WHERE id = '.$id;
			$item = Db::getInstance()->ExecuteS($sql);
			
			foreach($item as $k => $_item){
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_category_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				foreach ($items_data as $item_data){
		    			$item['data'][$item_data['id_lang']]['title'] = $item_data['title'];
		    			$item['data'][$item_data['id_lang']]['seo_description'] = $item_data['seo_description'];
		    			$item['data'][$item_data['id_lang']]['seo_keywords'] = $item_data['seo_keywords'];
		    			$item['data'][$item_data['id_lang']]['seo_url'] = $item_data['seo_url'];
		    	}
		    	
			}
		} else {
			global $cookie;
			$current_language = (int)$cookie->id_lang;
			
			
				$sql = '
					SELECT pc.*
					FROM `'._DB_PREFIX_.'blog_category` pc
					LEFT JOIN `'._DB_PREFIX_.'blog_category_data` pc1
					ON(pc1.id_item = pc.id)
					WHERE pc.`id` = '.$id.' AND pc1.id_lang = '.$current_language;
			
			$item = Db::getInstance()->ExecuteS($sql);
			
			foreach($item as $k => $_item){
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_category_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				foreach ($items_data as $item_data){
		    		
		    		if($current_language == $item_data['id_lang']){
		    			$item[$k]['title'] = $item_data['title'];
		    			$item[$k]['seo_description'] = $item_data['seo_description'];
		    			$item[$k]['seo_keywords'] = $item_data['seo_keywords'];
		    			$item[$k]['seo_url'] = $item_data['seo_url'];
		    			
		    		}
		    	}
		    }
			
		}
		//var_dump($item);
	   return array('category' => $item);
	}
	
public function getCategories($_data){
		$admin = isset($_data['admin'])?$_data['admin']:null;
		$items = array();
		if($admin){
			$start = isset($_data['start'])?$_data['start']:'';
			$step = isset($_data['step'])?$_data['step']:'';
			
			/*$categories = Db::getInstance()->ExecuteS('
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_category` pc
			ORDER BY pc.`time_add` DESC');*/
			
			if(strlen($start)>0 && strlen($step)>0){
				$sql = '
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_category` pc
				ORDER BY pc.`time_add` DESC LIMIT '.$start.' ,'.$step.'';
			} else {
				$sql = '
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_category` pc
				ORDER BY pc.`time_add` DESC';
			}
			$categories = Db::getInstance()->ExecuteS($sql);
			
			
			foreach($categories as $k => $_item){
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_category_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				
				global $cookie;
				$defaultLanguage =  $cookie->id_lang;
				
				$tmp_title = '';
				$tmp_id = '';
				$tmp_link = '';
				$tmp_time_add = '';
				
				foreach ($items_data as $item_data){
		    		
		    		$title = isset($item_data['title'])?$item_data['title']:'';
		    		$id = isset($item_data['id_item'])?$item_data['id_item']:'';
		    		$time_add = isset($categories[$k]['time_add'])?$categories[$k]['time_add']:'';
		    		
		    		if(strlen($tmp_title)==0){
		    			if(strlen($title)>0)
		    					$tmp_title = $title; 
		    		}
		    		
					if(strlen($tmp_id)==0){
		    			if(strlen($id)>0)
		    					$tmp_id = $id; 
		    		}
		    		
					if(strlen($tmp_time_add)==0){
		    			if(strlen($time_add)>0)
		    					$tmp_time_add = $time_add; 
		    		}
		    		
		    		if($defaultLanguage == $item_data['id_lang']){
		    			$items[$k]['title'] = $item_data['title'];
		    			$items[$k]['id'] = $id;
		    			$items[$k]['time_add'] = $time_add;
		    		}
		    		
		    	}
		    	
		    	if(@strlen($items[$k]['title'])==0)
		    		$items[$k]['title'] = $tmp_title;
		    		
		    	if(@strlen($items[$k]['id'])==0)
		    		$items[$k]['id'] = $tmp_id;
		    		
		    	if(@strlen($items[$k]['time_add'])==0)
		    		$items[$k]['time_add'] = $tmp_time_add;
		    	
			}
			
			$data_count_categories = Db::getInstance()->getRow('
			SELECT COUNT(`id`) AS "count"
			FROM `'._DB_PREFIX_.'blog_category` 
			');
			
		} else{
			
			$start = $_data['start'];
			$step = (int)$_data['step'];
			
			global $cookie;
			$current_language = (int)$cookie->id_lang;
			
			$items_tmp = Db::getInstance()->ExecuteS('
			SELECT pc.*,
				   (select count(*) as count from `'._DB_PREFIX_.'blog_post` pc1 
				    LEFT JOIN `'._DB_PREFIX_.'blog_category2post` c2p
				    ON(pc1.id = c2p.post_id)
				    LEFT JOIN `'._DB_PREFIX_.'blog_post_data` bpd
				    ON(bpd.id_item = pc1.id)
					WHERE c2p.category_id = pc.id AND bpd.id_lang = '.$current_language.'
					AND pc1.status = 1) as count_posts
			FROM `'._DB_PREFIX_.'blog_category` pc
			LEFT JOIN `'._DB_PREFIX_.'blog_category_data` pc_d
			on(pc.id = pc_d.id_item)
			WHERE pc_d.id_lang = '.$current_language.' 
			ORDER BY pc.`time_add` DESC LIMIT '.$start.' ,'.$step.'');	
			
			$items = array();
			
			foreach($items_tmp as $k => $_item){
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_category_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				
				
				foreach ($items_data as $item_data){
		    		
		    		if($current_language == $item_data['id_lang']){
		    			$items[$k]['title'] = $item_data['title'];
		    			$items[$k]['seo_description'] = $item_data['seo_description'];
		    			$items[$k]['seo_keywords'] = $item_data['seo_keywords'];
		    			$items[$k]['count_posts'] = $_item['count_posts'];
		    			$items[$k]['id'] = $_item['id'];
		    			$items[$k]['time_add'] = $_item['time_add'];
		    			$items[$k]['seo_url'] = $item_data['seo_url'];
		    		} 
		    	}
		    }
			
			$data_count_categories = Db::getInstance()->getRow('
			SELECT COUNT(pc.`id`) AS "count"
			FROM `'._DB_PREFIX_.'blog_category` pc LEFT JOIN `'._DB_PREFIX_.'blog_category_data` pc_d
			on(pc.id = pc_d.id_item)
			WHERE pc_d.id_lang = '.$current_language.' 
			');
		}	
		return array('categories' => $items, 'count_all' => $data_count_categories['count'] );
	}
	
	public function  getPosts($_data){
		$admin = isset($_data['admin'])?$_data['admin']:null;
		
		$id = isset($_data['id'])?$_data['id']:0;
		
		if($admin == 1){
			$sql = '
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_post` pc LEFT JOIN `'._DB_PREFIX_.'blog_category2post` c2p
			ON(pc.id = c2p.post_id)
			WHERE c2p.category_id = '.$id.'
			ORDER BY pc.`time_add` DESC';
			$items = Db::getInstance()->ExecuteS($sql);
			
			foreach($items as $k => $_item){
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_post_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				global $cookie;
				$defaultLanguage =  $cookie->id_lang;
				
				$tmp_title = '';
				$tmp_link = '';
				
				foreach ($items_data as $item_data){
		    		
		    		$title = isset($item_data['title'])?$item_data['title']:'';
		    		if(strlen($tmp_title)==0){
		    			if(strlen($title)>0)
		    					$tmp_title = $title; 
		    		}
		    		
		    		
		    		if($defaultLanguage == $item_data['id_lang']){
		    			$items[$k]['title'] = $item_data['title'];
		    		} 
		    	}
		    	
		    	if(@strlen($items[$k]['title'])==0)
		    		$items[$k]['title'] = $tmp_title;
		    	
				}
			
			
			$data_count_posts = Db::getInstance()->getRow('
			SELECT COUNT(`id`) AS "count"
			FROM `'._DB_PREFIX_.'blog_post`  as pc LEFT JOIN `'._DB_PREFIX_.'blog_category2post` c2p
			ON(pc.id = c2p.post_id)
			WHERE c2p.category_id = '.$id.'
			');
			
		} elseif($admin == 2){
			$start = $_data['start'];
			$step = $_data['step'];
			
			$items = Db::getInstance()->ExecuteS('
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_post` pc 
			ORDER BY pc.`time_add` DESC  LIMIT '.$start.' ,'.$step.'');
			
			
			foreach($items as $k => $_item){
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_post_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				global $cookie;
				$defaultLanguage =  $cookie->id_lang;
				
				$tmp_title = '';
				$tmp_link = '';
				
				foreach ($items_data as $item_data){
		    		
		    		$title = isset($item_data['title'])?$item_data['title']:'';
		    		if(strlen($tmp_title)==0){
		    			if(strlen($title)>0)
		    					$tmp_title = $title; 
		    		}
		    		
		    		
		    		if($defaultLanguage == $item_data['id_lang']){
		    			$items[$k]['title'] = $item_data['title'];
		    		} 
		    	}
		    	
		    	if(@strlen($items[$k]['title'])==0)
		    		$items[$k]['title'] = $tmp_title;
		    	
				}
			
			$data_count_posts = Db::getInstance()->getRow('
			SELECT COUNT(`id`) AS "count"
			FROM `'._DB_PREFIX_.'blog_post`  as pc
			');
		} else{
			$start = $_data['start'];
			$step = $_data['step'];
			
			global $cookie;
			$current_language = (int)$cookie->id_lang;
			
			
			$sql = '
			SELECT pc.* ,
				(select count(*) as count from `'._DB_PREFIX_.'blog_comments` c2pc 
				 where c2pc.id_post = pc.id and c2pc.status = 1 and c2pc.id_lang = '.$current_language.' ) 
				 as count_comments
			FROM `'._DB_PREFIX_.'blog_post` pc LEFT JOIN `'._DB_PREFIX_.'blog_category2post` c2p
			ON(pc.id = c2p.post_id)
			LEFT JOIN `'._DB_PREFIX_.'blog_post_data` pc_d
			on(pc.id = pc_d.id_item)
			WHERE pc.status = 1 and pc_d.id_lang = '.$current_language.' AND c2p.category_id = '.$id.'
			ORDER BY pc.`time_add` DESC LIMIT '.$start.' ,'.$step.'';
			
			
			$items = Db::getInstance()->ExecuteS($sql);	
			
			foreach($items as $k1=>$_item){
				$id_post = $_item['id'];
				
				$category_ids = Db::getInstance()->ExecuteS('
				SELECT pc.category_id
				FROM `'._DB_PREFIX_.'blog_category2post` pc
				WHERE pc.`post_id` = '.$id_post.'');
				$data_category_ids = array();
				foreach($category_ids as $k => $v){
					$_info_ids = $this->getCategoryItem(array('id' => $v['category_id']));
					$ids_item = sizeof(@$_info_ids['category'][0])>0?$_info_ids['category'][0]:array();
					//var_dump($ids_item); echo "<br><hr><br>";
					if(sizeof($ids_item)>0){
					$data_category_ids[] = $ids_item;
					}
				}
				
				$items[$k1]['category_ids'] = $data_category_ids;
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_post_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				foreach ($items_data as $item_data){
		    		
		    		if($current_language == $item_data['id_lang']){
		    			$items[$k1]['title'] = $item_data['title'];
		    			$items[$k1]['seo_description'] = $item_data['seo_description'];
		    			$items[$k1]['seo_keywords'] = $item_data['seo_keywords'];
		    			$items[$k1]['content'] = $item_data['content'];
		    			$items[$k1]['id'] = $_item['id'];
		    			$items[$k1]['time_add'] = $_item['time_add'];
		    			$items[$k1]['seo_url'] = $item_data['seo_url'];
		    		} 
		    	}
				
			}
			
			$sql = '
			SELECT COUNT(`id`) AS "count"
			FROM `'._DB_PREFIX_.'blog_post` pc LEFT JOIN `'._DB_PREFIX_.'blog_category2post` c2p
			ON(pc.id = c2p.post_id)
			LEFT JOIN `'._DB_PREFIX_.'blog_post_data` pc_d
			on(pc.id = pc_d.id_item )
			WHERE c2p.category_id = '.$id.' and pc_d.id_lang = '.$current_language.' 
			AND pc.status = 1
			';
			
			$data_count_posts = Db::getInstance()->getRow($sql);
		}	
		return array('posts' => $items, 'count_all' => $data_count_posts['count'] );
	}
	
	
	
	public function savePost($data){

		
		
		$ids_categories = sizeof($data['ids_categories'])>0?$data['ids_categories']:array();
		$post_status = $data['post_status'];
		$post_iscomments = $data['post_iscomments'];
		
		$sql = 'INSERT into `'._DB_PREFIX_.'blog_post` SET
							   `status` = \''.pSQL($post_status).'\',
							   `is_comments` = \''.pSQL($post_iscomments).'\',
							   `time_add` = NULL
							   ';
		
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
		defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		$post_id = Db::getInstance()->Insert_ID();
		
		foreach($data['data_title_content_lang'] as $language => $item){
		
		$post_title = $item['post_title'];
		$post_seokeywords = $item['post_seokeywords'];
		$post_seodescription = $item['post_seodescription'];
		$post_content = $item['post_content'];
		$translite_seo = $this->_translit($item['seo_url']);
		$seo_url = strlen($translite_seo)>0?$translite_seo:"post".Tools::passwdGen(6);
		
		$sql = 'INSERT into `'._DB_PREFIX_.'blog_post_data` SET
							   `id_item` = \''.pSQL($post_id).'\',
							   `id_lang` = \''.pSQL($language).'\',
							   `title` = \''.pSQL($post_title).'\',
							   `seo_keywords` = \''.pSQL($post_seokeywords).'\',
							   `seo_description` = \''.pSQL($post_seodescription).'\',
							   `content` = "'.mysql_escape_string($post_content).'",
							   `seo_url` = "'.pSQL($seo_url).'"
							   ';
		
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
		defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		}
		
		
		$this->saveImage(array('post_id' => $post_id));
		
		foreach($ids_categories as $id_cat){
			$sql = 'INSERT into `'._DB_PREFIX_.'blog_category2post` SET
							   `category_id` = \''.pSQL($id_cat).'\',
							   `post_id` = \''.pSQL($post_id).'\'
							   ';
			if(substr(_PS_VERSION_,0,3) == '1.5'){
				$result = Db::getInstance()->Execute($sql);
			} else {
				defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
			}
		
		}
		
	}
	
	public function updatePost($data){
		
		$id_editposts = $data['id_editposts'];
		
		$post_title = $data['post_title'];
		$post_seokeywords = $data['post_seokeywords'];
		$post_seodescription = $data['post_seodescription'];
		$post_content = $data['post_content'];
		$ids_categories = $data['ids_categories'];
		$post_status = $data['post_status'];
		$post_iscomments = $data['post_iscomments'];
		$post_images = $data['post_images'];
		
		// update
		$sql = 'UPDATE `'._DB_PREFIX_.'blog_post` SET
							  `status` = \''.pSQL($post_status).'\',
							   `is_comments` = \''.pSQL($post_iscomments).'\'
							    WHERE id = '.$id_editposts.'
							   ';
	
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		/// delete tabs data
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_post_data` WHERE id_item = '.$id_editposts.'';
	
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		foreach($data['data_title_content_lang'] as $language => $item){
		
		$post_title = $item['post_title'];
		$post_seokeywords = $item['post_seokeywords'];
		$post_seodescription = $item['post_seodescription'];
		$post_content = $item['post_content'];
		$translite_seo = $this->_translit($item['seo_url']);
		$seo_url = strlen($translite_seo)>0?$translite_seo:"post".Tools::passwdGen(6);
		
		$sql = 'SELECT count(*) as count
				FROM `'._DB_PREFIX_.'blog_post_data` pc
				WHERE seo_url = "'.$seo_url.'"';
		$data_seo_url = Db::getInstance()->GetRow($sql);
		if($data_seo_url['count']!=0)
			$seo_url = "post".strtolower(Tools::passwdGen(6));
		
		$sql = 'INSERT into `'._DB_PREFIX_.'blog_post_data` SET
							   `id_item` = \''.pSQL($id_editposts).'\',
							   `id_lang` = \''.pSQL($language).'\',
							   `title` = \''.pSQL($post_title).'\',
							   `seo_keywords` = \''.pSQL($post_seokeywords).'\',
							   `seo_description` = \''.pSQL($post_seodescription).'\',
							   `content` = "'.mysql_escape_string($post_content).'",
							   `seo_url` = \''.pSQL($seo_url).'\'
							   ';
		//echo $sql; exit;
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		}
		
		
		$this->saveImage(array('post_id' => $id_editposts,'post_images' => $post_images ));
		
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_category2post`
					   WHERE `post_id` = \''.pSQL($id_editposts).'\'';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		foreach($ids_categories as $id_cat){
			$sql = 'INSERT into `'._DB_PREFIX_.'blog_category2post` SET
							   `category_id` = \''.pSQL($id_cat).'\',
							   `post_id` = \''.pSQL($id_editposts).'\'
							   ';
			if(substr(_PS_VERSION_,0,3) == '1.5'){
				$result = Db::getInstance()->Execute($sql);
			} else {
				defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
			}
		
		}
		
	}
	
	
	public function saveImage($data = null){
		
		$error = 0;
		$error_text = '';
		
		$post_id = $data['post_id'];
		$post_images = isset($data['post_images'])?$data['post_images']:'';
		
		$files = $_FILES['post_image'];
		
		############### files ###############################
		if(!empty($files['name']))
			{
		      if(!$files['error'])
		      {
				  $type_one = $files['type'];
				  $ext = explode("/",$type_one);
				  
				  if(strpos('_'.$type_one,'image')<1)
				  {
				  	$error_text = $this->l('Invalid file type, please try again!');
				  	$error = 1;

				  }elseif(!in_array($ext[1],array('png','x-png','gif','jpg','jpeg','pjpeg'))){
				  	$error_text = $this->l('Wrong file format, please try again!');
				  	$error = 1;
				  	
				  } else {
				  	
				  		$info_post = $this->getPostItem(array('id'=>$post_id));
				  		$post_item = $info_post['post'];
				  		$img_post = $post_item['img'];
				  		
				  		if(strlen($img_post)>0){
				  			// delete old avatars
				  			$name_thumb = current(explode(".",$img_post));
				  			unlink(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."blockblog".DIRECTORY_SEPARATOR.$name_thumb.".jpg");
				  			
				  		} 
							
					  	srand((double)microtime()*1000000);
					 	$uniq_name_image = uniqid(rand());
					 	$type_one = substr($type_one,6,strlen($type_one)-6);
					 	$filename = $uniq_name_image.'.'.$type_one; 
					 	
						move_uploaded_file($files['tmp_name'], dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."blockblog".DIRECTORY_SEPARATOR.$filename);
						
						$this->copyImage(array('dir_without_ext'=>dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."blockblog".DIRECTORY_SEPARATOR.$uniq_name_image,
												'name'=>dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."blockblog".DIRECTORY_SEPARATOR.$filename)
										);
						
						
						$img_return = $uniq_name_image.'.jpg';
			  		
				  		$this->_updateImgToPost(array('post_id' => $post_id,
				  									  'img' =>  $img_return
				  									  )
				  								);

				  }
				}
				else
					{
					### check  for errors ####
			      	switch($files['error'])
						{
							case '1':
								$error_text = $this->l('The size of the uploaded file exceeds the').ini_get('upload_max_filesize').'b';
								break;
							case '2':
								$error_text = $this->l('The size of  the uploaded file exceeds the specified parameter  MAX_FILE_SIZE in HTML form.');
								break;
							case '3':
								$error_text = $this->l('Loaded only a portion of the file');
								break;
							case '4':
								$error_text = $this->l('The file was not loaded (in the form user pointed the wrong path  to the file). ');
								break;
							case '6':
								$error_text = $this->l('Invalid  temporary directory.');
								break;
							case '7':
								$error_text = $this->l('Error writing file to disk');
								break;
							case '8':
								$error_text = $this->l('File download aborted');
								break;
							case '999':
							default:
								$error_text = $this->l('Unknown error code!');
							break;
						}
						$error = 1;
			      	########
					   
					}
			}  else {
				//var_dump($post_images); exit;
				if($post_images != "on"){
				$this->_updateImgToPost(array('post_id' => $post_id,
				  							  'img' =>  ""
				  							  )
				  						);
				}
			}
			
		return array('error' => $error,
					 'error_text' => $error_text);
	
	
	}
	
	public function deleteImg($data = null){
		$id = $data['id'];
		$_data = $this->getPostItem(array('id'=>$id));
		$img = $_data['post'][0]['img'];
		
		$this->_updateImgToPost(array('post_id' => $id,
				  					  'img' =>  ""
				  					 )
				  				);
				  				
		@unlink(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."blockblog".DIRECTORY_SEPARATOR.$img);
		
	}
	
	private function _updateImgToPost($data = null){
		
		$post_id = $data['post_id'];
		$img = $data['img'];
			
		// update
		$sql = 'UPDATE `'._DB_PREFIX_.'blog_post` SET
							   `img` = \''.pSQL($img).'\'
							   WHERE id = '.$post_id.'
							   ';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
	}
	
	public function getHttp(){
		global $smarty;
		$http = null;
		if(defined('_MYSQL_ENGINE_')){
				$http = @$smarty->tpl_vars['base_dir']->value;
		} else {
				$http = @$smarty->_tpl_vars['base_dir'];
		}
		if(empty($http)) $http = $_SERVER['HTTP_HOST'];
		return $http;
	}
	
	public function getAllImg(){
			
			$path = $_SERVER['DOCUMENT_ROOT']."/upload/".$this->_name."/";
			
			$d = @opendir($path);
         	
         	$data = array();
         	
			if(!$d) return;
			
			while(($e=readdir($d)) !== false)
			{
				if($e =='.' || $e=='..') continue;
				$data[] = $e;	
			}
			return array('data'=>$data);
	}
	
	public function copyImage($data){
	
		$filename = $data['name'];
		$dir_without_ext = $data['dir_without_ext'];
		$width = $this->_width;
		$height = $this->_height;
		
		if (!$width){ $width = 85; };
		if (!$height){ $height = 85; };
		// Content type
		$size_img = getimagesize($filename);
		// Get new dimensions
		list($width_orig, $height_orig) = getimagesize($filename);
		$ratio_orig = $width_orig/$height_orig;
		
		if($width_orig>$height_orig){
		$height =  $width/$ratio_orig;
		}else{ 
		$width = $height*$ratio_orig;
		}
		if($width_orig<$width){
			$width = $width_orig;
			$height = $height_orig;
		}
	
			$image_p = imagecreatetruecolor($width, $height);
		$bgcolor=ImageColorAllocate($image_p, 255, 255, 255);
		//   
		imageFill($image_p, 5, 5, $bgcolor);
	
		if ($size_img[2]==2){ $image = imagecreatefromjpeg($filename);}                         
		else if ($size_img[2]==1){  $image = imagecreatefromgif($filename);}                         
		else if ($size_img[2]==3) { $image = imagecreatefrompng($filename); }
	
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		// Output
		$users_img = $dir_without_ext.'.jpg';
		if ($size_img[2]==2)  imagejpeg($image_p, $users_img, 100);                         
		else if ($size_img[2]==1)  imagejpeg($image_p, $users_img, 100);                        
		else if ($size_img[2]==3)  imagejpeg($image_p, $users_img, 100);
		imageDestroy($image_p);
		imageDestroy($image);
		unlink($filename);

	}
	
	
	public function deletePost($data){
		
		$id = $data['id'];
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_post`
							   WHERE id ='.$id.'';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_post_data`
							   WHERE id_item ='.$id.'';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_category2post`
							   WHERE post_id ='.$id.'';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
		
		// delete comments
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_comments`
							   WHERE id_post ='.$id.'';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
				
	}
	
	public function getPostItem($_data){
			$id = $_data['id'];
			$site = isset($_data['site'])?$_data['site']:'';
		
			if($site==1){
			global $cookie;
			$current_language = (int)$cookie->id_lang;
				$sql = '
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_post` pc LEFT JOIN `'._DB_PREFIX_.'blog_post_data` pc1
			ON(pc1.id_item = pc.id)
			WHERE pc.`id` = '.$id.' AND pc1.id_lang = '.$current_language;
				
			$item = Db::getInstance()->ExecuteS($sql);
			
			foreach($item as $k => $_item){
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_post_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				foreach ($items_data as $item_data){
					if($current_language == $item_data['id_lang']){
		    			$item[$k]['title'] = $item_data['title'];
		    			$item[$k]['content'] = $item_data['content'];
		    			$item[$k]['seo_keywords'] = $item_data['seo_keywords'];
		    			$item[$k]['seo_description'] = $item_data['seo_description'];
		    			$item[$k]['seo_url'] = $item_data['seo_url'];
					}
		    		
		    	}
		    	
			}
			
			
			$post_category_id = 0;
			$sql = '
			SELECT pc.category_id, pc.post_id
			FROM `'._DB_PREFIX_.'blog_category2post` pc
			WHERE pc.`post_id` = '.$id.'';
			
			$category_ids = Db::getInstance()->ExecuteS($sql);
			$data_category_ids = array();
			foreach($category_ids as $k => $v){
				$data_category_ids[] = $v['category_id'];
			}
			
			$item[0]['category_ids'] = $data_category_ids;
			
			
			} else {
			
				$item = Db::getInstance()->ExecuteS('
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_post` pc
			WHERE pc.`id` = '.$id.'');
			
			foreach($item as $k => $_item){
				
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_post_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				foreach ($items_data as $item_data){
		    			$item['data'][$item_data['id_lang']]['title'] = $item_data['title'];
		    			$item['data'][$item_data['id_lang']]['content'] = $item_data['content'];
		    			$item['data'][$item_data['id_lang']]['seo_keywords'] = $item_data['seo_keywords'];
		    			$item['data'][$item_data['id_lang']]['seo_description'] = $item_data['seo_description'];
		    			$item['data'][$item_data['id_lang']]['seo_url'] = $item_data['seo_url'];
		    	}
		    	
			}
			
			
			$post_category_id = 0;
			$category_ids = Db::getInstance()->ExecuteS('
			SELECT pc.category_id, pc.post_id
			FROM `'._DB_PREFIX_.'blog_category2post` pc
			WHERE pc.`post_id` = '.$id.'');
			$data_category_ids = array();
			foreach($category_ids as $k => $v){
				$data_category_ids[] = $v['category_id'];
			}
			
			$item[0]['category_ids'] = $data_category_ids;
			}
			
	   return array('post' => $item);
	}
	
	public function  getComments($_data){
		$admin = isset($_data['admin'])?$_data['admin']:null;
		$id = isset($_data['id'])?$_data['id']:0;
		
		if($admin == 1){
			
			$posts = Db::getInstance()->ExecuteS('
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_comments` pc
			WHERE pc.id_post = '.$id.'
			ORDER BY pc.`time_add` DESC');
			
			$data_count_posts = Db::getInstance()->getRow('
			SELECT COUNT(`id`) AS "count"
			FROM `'._DB_PREFIX_.'blog_comments`  as pc
			WHERE pc.id_post = '.$id.'
			');
			
		} elseif($admin == 2){
			$start = $_data['start'];
			$step = $_data['step'];
			
			$posts = Db::getInstance()->ExecuteS('
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_comments` pc
			ORDER BY pc.`time_add` DESC  LIMIT '.$start.' ,'.$step.'');
			
			$data_count_posts = Db::getInstance()->getRow('
			SELECT COUNT(`id`) AS "count"
			FROM `'._DB_PREFIX_.'blog_comments`  as pc
			');
		} else{
			global $cookie;
			$current_language = (int)$cookie->id_lang;
			
			$start = $_data['start'];
			$step = $_data['step'];
			
			$posts = Db::getInstance()->ExecuteS('
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_comments` pc
			WHERE pc.`id_post` = '.$id.' and status = 1 and id_lang = '.$current_language.' 
			ORDER BY pc.`time_add` DESC LIMIT '.$start.' ,'.$step.'');	
			
			$data_count_posts = Db::getInstance()->getRow('
			SELECT COUNT(*) AS "count"
			FROM `'._DB_PREFIX_.'blog_comments` pc
			WHERE pc.id_post = '.$id.' and status = 1 and id_lang = '.$current_language.'
			');
		}	
		return array('comments' => $posts, 'count_all' => $data_count_posts['count'] );
	}
	
	public function deleteComment($data){
		
		$id = $data['id'];
		// delete comments
		$sql = 'DELETE FROM `'._DB_PREFIX_.'blog_comments`
							   WHERE id ='.$id.'';
		defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
				
	}
	
	public function getCommentItem($_data){
			$id = $_data['id'];
		
			$category = Db::getInstance()->ExecuteS('
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_comments` pc
			WHERE pc.`id` = '.$id.'');
	   return array('comments' => $category);
	}
	
	public function updateComment($data){
	
		$id_editcomments = $data['id_editcomments'];
		
		$comments_name = $data['comments_name'];
		$comments_email = $data['comments_email'];
		$comments_comment = $data['comments_comment'];
		$comments_status = $data['comments_status'];
			
		// update
		$sql = 'UPDATE `'._DB_PREFIX_.'blog_comments` SET
							   `name` = \''.pSQL($comments_name).'\',
							   `email` = \''.pSQL($comments_email).'\',
							   `comment` = \''.pSQL($comments_comment).'\',
							   `status` = \''.pSQL($comments_status).'\'
							   WHERE id = '.$id_editcomments.'
							   ';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}
	}
	
	public function saveComment($_data){
		$name = $_data['name'];
		$email = $_data['email'];
		$text_review =  $_data['text_review'];
		$id_post = $_data['id_post'];
		
		global $cookie;
		$current_language = (int)$cookie->id_lang;
		
		$sql = 'INSERT into `'._DB_PREFIX_.'blog_comments` SET
							   `id_lang` = \''.pSQL($current_language).'\',
							   `name` = \''.pSQL($name).'\',
							   `email` = \''.pSQL($email).'\',
							   `comment` = \''.pSQL($text_review).'\',
							   `id_post` = \''.pSQL($id_post).'\',
							   `time_add` = NULL
							   ';
		if(substr(_PS_VERSION_,0,3) == '1.5'){
			$result = Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?$result = Db::getInstance()->ExecuteS($sql):$result = Db::getInstance()->Execute($sql);
		}

		if(Configuration::get('blockblognoti') == 1){
		global $cookie;
		/* Email generation */
		$subject = $this->l('New Comment from Your Blog');
		$templateVars = array(
			'{email}' => $email,
			'{name}' => $name,
			'{url}' => $web,
			'{message}' => stripslashes($text_review)
		);
				
		/* Email sending */
		Mail::Send(1, 'comment', $this->l('New Comment from Your Blog'), $templateVars, 
			Configuration::get('blockblogmail'), 'Blog Comment Form', $email, $name,
			NULL, NULL, dirname(__FILE__).'/mails/');
		}
	}
	
	public function PageNav($start,$count,$step, $_data =null )
	{
		$_admin = isset($_data['admin'])?$_data['admin']:null;
		$category_id = isset($_data['category_id'])?$_data['category_id']:0;
		
		
		$post_id = isset($_data['post_id'])?$_data['post_id']:0;
		$is_category = isset($_data['category'])?$_data['category']:0;
		$page_translate = isset($_data['page'])?$_data['page']:$this->l('Page');
		
		$res = '';
		$product_count = $count;
		$res .= '<div class="pages">';
		$res .= '<span>'.$page_translate.':</span>';
		$res .= '<span class="nums">';
		
		$start1 = $start;
			for ($start1 = ($start - $step*4 >= 0 ? $start - $step*4 : 0); $start1 < ($start + $step*5 < $product_count ? $start + $step*5 : $product_count); $start1 += $step)
				{
					$par = (int)($start1 / $step) + 1;
					if ($start1 == $start)
						{
						
						$res .= '<b>'. $par .'</b>';
						}
					else
						{
							if($_admin){
								$currentIndex = $_data['currentIndex'];
								$token = $_data['token'];
								$item = $_data['item'];
								$res .= '<a href="'.$currentIndex.'&page'.$item.'='.($start1 ? $start1 : 0).$token.'" >'.$par.'</a>';
							} else {
								if($is_category == 1){
									$res .= '<a href="javascript:void(0)" onclick="go_page_blog_cat( '.($start1 ? $start1 : 0).' )">'.$par.'</a>';
									
								} else {
									
									if($category_id != 0)
									$res .= '<a href="javascript:void(0)" onclick="go_page_blog( '.($start1 ? $start1 : 0).', '.$category_id.' )">'.$par.'</a>';
									else	
									$res .= '<a href="javascript:void(0)" onclick="go_page_blog_comments( '.($start1 ? $start1 : 0).', '.$post_id.' )">'.$par.'</a>';
								}		
							}
						}
				}
		
		$res .= '</span>';
		$res .= '</div>';
		
		
		return $res;
	}
	
	public function getCategoriesBlock(){
		$limit  = (int)Configuration::get('blockblogblog_bcat');
		
		
			global $cookie;
			$current_language = (int)$cookie->id_lang;
			
			$sql = '
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_category` pc 
			LEFT JOIN `'._DB_PREFIX_.'blog_category_data` pc_d
			ON(pc.id = pc_d.id_item) 
			WHERE pc_d.id_lang = '.$current_language.' ORDER BY pc.`id` DESC LIMIT '.$limit;
			
			$items = Db::getInstance()->ExecuteS($sql);
			$items_tmp = array();
			foreach($items as $k => $_item){
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_category_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				foreach ($items_data as $item_data){
		    		if($current_language == $item_data['id_lang']){
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['title'] = $item_data['title'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['seo_description'] = $item_data['seo_description'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['seo_keywords'] = $item_data['seo_keywords'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['time_add'] = $_item['time_add'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['id'] = $_item['id'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['seo_url'] = $item_data['seo_url'];
		    		}
		    	}
		    	
			}
			
			
		return array('categories' => $items_tmp );
	}
	
	public function getRecentsPosts(){
		$limit  =(int) Configuration::get('blockblogblog_bposts');
		
		
		global $cookie;
			$current_language = (int)$cookie->id_lang;
			
			$sql = '
			SELECT pc.*
			FROM `'._DB_PREFIX_.'blog_post` pc 
			LEFT JOIN `'._DB_PREFIX_.'blog_post_data` pc_d
			ON(pc.id = pc_d.id_item) 
			WHERE pc.status = 1 AND pc_d.id_lang = '.$current_language.' ORDER BY pc.`id` DESC LIMIT '.$limit;
			
			$items = Db::getInstance()->ExecuteS($sql);
			$items_tmp = array();
			foreach($items as $k => $_item){
				$items_data = Db::getInstance()->ExecuteS('
				SELECT pc.*
				FROM `'._DB_PREFIX_.'blog_post_data` pc
				WHERE pc.id_item = '.$_item['id'].'
				');
				
				foreach ($items_data as $item_data){
		    		if($current_language == $item_data['id_lang']){
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['title'] = $item_data['title'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['seo_description'] = $item_data['seo_description'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['seo_keywords'] = $item_data['seo_keywords'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['content'] = $item_data['content'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['img'] = $_item['img'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['status'] = $_item['status'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['is_comments'] = $_item['is_comments'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['time_add'] = $_item['time_add'];	
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['id'] = $_item['id'];
		    			$items_tmp[$k]['data'][$item_data['id_lang']]['seo_url'] = $item_data['seo_url'];
		    		}
		    	}
		    	
			}
			
			
			
		return array('posts' => $items_tmp );
	} 
	
}