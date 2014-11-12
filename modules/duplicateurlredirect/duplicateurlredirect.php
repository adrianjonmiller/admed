<?php

class DuplicateURLRedirect extends Module
{
 	private $_html = '';
 	private $_full_version = 14400;
 	private $_last_updated = '';
	
 	function __construct()
	{
		$this->name = 'duplicateurlredirect';
		$this->tab = floatval(substr(_PS_VERSION_,0,3))<1.4?'Presto-Changeo':'seo';
		$this->version = '1.4.4';
		if (floatval(substr(_PS_VERSION_,0,3)) >= 1.4)
			$this->author = 'Presto-Changeo';
		parent::__construct();
		$this->_refreshProperties();

		$this->displayName = $this->l('Duplicate URL Redirect');
		$this->description = $this->l('Redirect all Duplicate URLs (using SEO friendly 301 redirect) to the current default URL');
		if ($this->upgradeCheck('DUR'))
			$this->warning = $this->l('We have released a new version of the module,') .' '.$this->l('request an upgrade at ').' https://www.presto-changeo.com/en/contact_us';
	}

	function install()
	{
		if (!parent::install())
			return false;
		Configuration::updateValue('PRESTO_CHANGEO_UC',time());			
		Configuration::updateValue('PS_CANONICAL_REDIRECT', '0');			
		return true;
	}

	private function _refreshProperties()
	{
		$this->_last_updated = Configuration::get('PRESTO_CHANGEO_UC');
	}

	public function getContent()
	{
		$this->_displayForm();
		return $this->_html;
	}
	
    private function _displayForm()
    {
	Configuration::updateValue('PS_CANONICAL_REDIRECT', '0');			
    	$psv = floatval(substr(_PS_VERSION_,0,3));
		$this->_html = ($psv >= 1.5?'<div style="width:900px;margin:auto">':'').
			'<img src="http://updates.presto-changeo.com/logo.jpg" border="0" /> <h2>'.$this->displayName.'</h2>';
		if ($url = $this->upgradeCheck('DUR'))
			$this->_html .= '
			<fieldset class="width3" style="background-color:#FFFAC6;width:800px;"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('New Version Available').'</legend>
			'.$this->l('We have released a new version of the module. For a list of new features, improvements and bug fixes, view the ').'<a href="'.$url.'" target="_index"><b><u>'.$this->l('Change Log').'</b></u></a> '.$this->l('on our site.').'
			<br />
			'.$this->l('For real-time alerts about module updates, be sure to join us on our') .' <a href="http://www.facebook.com/pages/Presto-Changeo/333091712684" target="_index"><u><b>Facebook</b></u></a> / <a href="http://twitter.com/prestochangeo1" target="_index"><u><b>Twitter</b></u></a> '.$this->l('pages').'.
			<br />
			<br />
			'.$this->l('Please').' <a href="https://www.presto-changeo.com/en/contact_us" target="_index"><b><u>'.$this->l('contact us').'</u></b></a> '.$this->l('to request an upgrade to the latest version').'.
			</fieldset><br />';
    	if ($psv < 1.4)
    	{
    		$changed = $this->fileCheck();
    		$this->_html .= '
			<fieldset class="width3" style="width:850px"><legend>'.$this->l('Installation Instructions').'</legend>
				<table width="850">
				<tr>
					<td width="2%"> </td>
					<td align="left" width="98%">
						<li><b>'.$this->l('You must add the following 3 lines to').' <b style="color:blue">/header.php</b> '.$this->l('directly below "require_once(...init.php)" as shown below').'
						<br />
						'.$this->l('The lines below will turn from red to green after you add them to /header.php').'
						<br />
						<br />
						<b>require_once(dirname(__FILE__).\'/init.php\');</b>.
						<br />
						<b style="color:'.(!$changed?'red':'green').'">
						include_once(_PS_MODULE_DIR_.\'/duplicateurlredirect/duplicateurlredirect.php\');
						<br />
						$dup = new DuplicateURLRedirect();
						<br />
						$dup->redirect();
						</b>
						</li>
					</td>
				</tr>		
				</table>
			</fieldset>';
    	}
    	else
    	{
    		if ($psv == 1.4)
    		{ 
    			$server_file = @file(dirname(__FILE__).'/../../override/classes/FrontController.php');
    			$modified_file = @file(dirname(__FILE__).'/override_1.4/classes/FrontController.php');
    		}
    		else
    		{
    			$server_file = @file(dirname(__FILE__).'/../../override/classes/controller/FrontController.php');
    			$modified_file = @file(dirname(__FILE__).'/override_1.5/classes/controller/FrontController.php');
    		}
    		$is_match = $this->overrideCheck($modified_file, $server_file);
    		$this->_html .= '
			<fieldset class="width3" style="width:850px"><legend>'.$this->l('Installation Instructions').'</legend>
				<table width="850">
				<tr>
					<td width="2%"> </td>
					<td align="left" width="98%">
						<li>
						'.($is_match?'
						<b style="color:green">'.$this->l('Module Installed Successfully').'</b>
						':
						'<b>'.$this->l('You must copy').'&nbsp; <b style="color:red">/duplicateurlredirect/override_'.($psv == 1.5?$psv.'/classes/controller':$psv.'/classes').'/FrontController.php</b> &nbsp;'.$this->l('to').' &nbsp;/override/'.($psv == 1.5?'/classes/controller':'/classes').'/
						<br />
						'.$this->l('If the file already exists there (not _FrontController.php), you will have to merge them').'.
						').'
						</li>
					</td>
				</tr>		
				</table>
			</fieldset>'.($psv >= 1.5?'</div>':'');
    	}
	}
	
	private function overrideCheck($mod, $srv)
	{
		$class_found = false;
		foreach ($mod as $mkey => $row)
		{
			if (!$class_found)
			{
				if (substr($row,0,5) == 'class')
				{
					$class_found = true;
					//print "Class found<br />";
				}
				continue;
			}
			else
			{
				$row = trim($row);
				$row_found = false;
				foreach ($srv as $key => $orow)
				{
					if ($row == trim($orow))
					{
						$srv = array_slice($srv, $key);
						$row_found = true;
						//print "Found $row<br />";
						break;
					}
				}
				if (!$row_found)
				{
					//print "Not Found $row  $mkey != ".(sizeof($mod) -1)."<br />";
					return false;
				}
			}
		}
		return true;
	}
    
    public function redirect()
    {
    	global $cookie, $smarty, $page_name, $link;
		$debug = false;
 		if ($debug)
		{
			$myFile = dirname(__FILE__)."/1dur_log.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			fwrite($fh, "Starting DUR\n");
			fclose($fh);
		}
	   	if (Configuration::get('PS_REWRITING_SETTINGS') != 1)
    		return;
		if (!$this->active)
			return;
		$ps_version = floatval(substr(_PS_VERSION_,0,3));
		if (!isset($_SERVER['HTTP_USER_AGENT']))
			$_SERVER['HTTP_USER_AGENT'] = '';
		if ($ps_version == 1.4 && Configuration::get('PS_FORCE_SMARTY_2') == 0 && !isset($smarty->tpl_vars['page_name']->value))
			return;
		if ($ps_version >= 1.5)
			$page_name = Dispatcher::getInstance()->getController();
		if ($page_name == '')
			$page_name = $ps_version >= 1.4 && Configuration::get('PS_FORCE_SMARTY_2') == 0?$smarty->tpl_vars['page_name']->value:$smarty->get_template_vars('page_name');
		$lang = "";
		$server_host = @$_SERVER['HTTP_HOST'];
		if ($server_host == '')
			return;
		$server_host_no_www = substr($server_host,0,4) == "www."?substr($server_host,4):$server_host;
		$protocol_link = @$_SERVER['HTTPS'] == "on"?"https://":"http://";
		$dur_se = false;
		if ($ps_version >= 1.5)
			$languages = Language::getLanguages(true, $this->context->shop->id);
		else
			$languages = Language::getLanguages();
		// Redirect /lang-xx for PS 1.4)
		if ($ps_version >= 1.4 && strpos($_SERVER['REQUEST_URI'], __PS_BASE_URI__."lang-") == 0 && strpos($_SERVER['REQUEST_URI'], __PS_BASE_URI__."lang-") !== false)
		{
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n1)".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']));
				fclose($fh);
				print "1)".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']);
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']));
			exit; 
		}
		
		if ($ps_version >= 1.4 && strpos($_SERVER['REQUEST_URI'], "/lang-") > 0)
		{
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n2)".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']));
				fclose($fh);
				print "2)".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']);
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']));
			exit; 
		}

		if ($ps_version >= 1.4 && isset($_SERVER['REDIRECT_URL']) && strpos($_SERVER['REDIRECT_URL'], "/lang-") > 0)
		{
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n3)".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REDIRECT_URL']));
				fclose($fh);
				print "3)".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REDIRECT_URL']);
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.str_replace("/lang-","/",$_SERVER['REDIRECT_URL']));
			exit; 
		}
		// Redirect Invalid URLs caused by canonical URL module.
		if (isset($_SERVER['REQUEST_URI']) && substr_count($_SERVER['REQUEST_URI'],$server_host) > 0 && strpos($_SERVER['REQUEST_URI'],"?") === false)
		{
			$arr = explode($server_host, $_SERVER['REQUEST_URI'],2);
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n4)".$protocol_link.$server_host.$arr[1]);
				fclose($fh);
				print "4)".$protocol_link.$server_host.$arr[1];
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.$arr[1]);
			exit; 
		}
		if (isset($_SERVER['REQUEST_URI']) && substr_count($_SERVER['REQUEST_URI'],$server_host_no_www) > 0 && strpos($_SERVER['REQUEST_URI'],"?") === false)
		{
			$arr = explode($server_host_no_www, $_SERVER['REQUEST_URI'],2);
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n5)".$protocol_link.$server_host.$arr[1]);
				fclose($fh);
				print "5)".$protocol_link.$server_host.$arr[1];
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.$arr[1]);
			exit; 
		}
		if (isset($_SERVER['REDIRECT_URL']) && substr_count($_SERVER['REDIRECT_URL'],$server_host) > 0 && strpos($_SERVER['REDIRECT_URL'],"?") === false)
		{
			$arr = explode($server_host, $_SERVER['REDIRECT_URL'],2);
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n6)".$protocol_link.$server_host.$arr[1]);
				fclose($fh);
				print "6)".$protocol_link.$server_host.$arr[1];
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.$arr[1]);
			exit; 
		}
		if (isset($_SERVER['REDIRECT_URL']) && substr_count($_SERVER['REDIRECT_URL'],$server_host_no_www) > 0 && strpos($_SERVER['REDIRECT_URL'],"?") === false)
		{
			$arr = explode($server_host_no_www, $_SERVER['REDIRECT_URL'],2);
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n7)".$protocol_link.$server_host.$arr[1]);
				fclose($fh);
				print "7)".$protocol_link.$server_host.$arr[1];
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.$arr[1]);
			exit; 
		}
		//print "<!-- ".print_r($_SERVER,true)."-->";
		$clean_vars = "";
		if (stripos($_SERVER['HTTP_USER_AGENT'],'bot') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'baidu') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'spider') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'Ask Jeeves') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'slurp') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'crawl') !== false)
			$dur_se = true;
		//print "dur_se = $dur_se , $page_name";
		if ($page_name != "sendtoafriend-form" && strpos($_SERVER['REQUEST_URI'], "sendtoafriend-form.php") !== false)
			$page_name = "sendtoafriend-form";
		// redirect secure pages for search engines.
		if ($dur_se && @$_SERVER['HTTPS'] == "on")
		{
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n8)"."http://".$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']));
				fclose($fh);
				print "8)"."http://".$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']);
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: "."http://".$server_host.str_replace("/lang-","/",$_SERVER['REQUEST_URI']));
			exit; 
		}
		// Index.php redirect //
		if ($ps_version >= 1.4)
    		$default_lang = Language::getIsoById(Configuration::get('PS_LANG_DEFAULT'))."/";
    	else 
    		$default_lang = "lang-".Language::getIsoById(Configuration::get('PS_LANG_DEFAULT'))."/";
    	$cur_lang = Language::getIsoById($cookie->id_lang).'/';
		// REDIRECT index.php to /    	
    	if ($ps_version != "1.1" && $ps_version != "1.0" && @strpos(substr($_SERVER['REQUEST_URI'],strlen(__PS_BASE_URI__)),"/") === false
    	 && @(substr($_SERVER['REQUEST_URI'],-9) == "index.php") && !isset($_GET['controller']))
    	{
    		if (strpos($_SERVER['REQUEST_URI'],"/lang-") !== false)
				$lang = substr($_SERVER['REQUEST_URI'],strpos($_SERVER['REQUEST_URI'],"/lang-")+1,8);
			if ($lang == $default_lang)
				$lang = "";
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n9)".__PS_BASE_URI__.$lang);
				fclose($fh);
				print "9)".__PS_BASE_URI__.$lang;
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".__PS_BASE_URI__.$lang);
			exit; 
    	}
    	// Redirect /lang-xx/ to / for the default language
        if ($ps_version != 1.1 && $ps_version != 1.0 && Configuration::get('PS_CANONICAL_REDIRECT') != 1 && @substr($_SERVER['REQUEST_URI'],-strlen($default_lang),strlen($default_lang)) == $default_lang)
    	{
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n10)".__PS_BASE_URI__);
				fclose($fh);
				print "10)".__PS_BASE_URI__;
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".__PS_BASE_URI__);
			exit; 
    	}
    	// redirect from /xx to / in PS 1.4+ when more than 1 language was installed, and now there is only 1
    	if ($ps_version >= 1.4 && sizeof($languages) == 1 && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], __PS_BASE_URI__.$default_lang) !== false)
    	{
			$redirect_url = str_replace(__PS_BASE_URI__.$default_lang, __PS_BASE_URI__, $_SERVER['REQUEST_URI']);
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n10.5) $redirect_url");
				fclose($fh);
				print "10.5) $redirect_url";
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$redirect_url);
			exit; 
    	}
    	// redirect from / to /xx in PS 1.4+ when more than 1 language is active.
    	if ($ps_version >= 1.4 && sizeof($languages) > 1 && isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != __PS_BASE_URI__ && strpos($_SERVER['REQUEST_URI'],".php") === false)
    	{
			if (substr($_SERVER['REQUEST_URI'],0, strlen( __PS_BASE_URI__.$cur_lang)) != __PS_BASE_URI__.$cur_lang && in_array($page_name, array('product','category','cms','supplier','manufacturer')))
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n11) (".$_SERVER['REQUEST_URI'].")".$protocol_link.$server_host. __PS_BASE_URI__.$cur_lang.substr($_SERVER['REQUEST_URI'],strlen( __PS_BASE_URI__)));
					fclose($fh);
					print "11) (".$_SERVER['REQUEST_URI'].")".$protocol_link.$server_host. __PS_BASE_URI__.$cur_lang.substr($_SERVER['REQUEST_URI'],strlen( __PS_BASE_URI__));
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$protocol_link.$server_host. __PS_BASE_URI__.$cur_lang.substr($_SERVER['REQUEST_URI'],strlen( __PS_BASE_URI__)));
				exit; 
			}
    	}
    	// Redirect /xx to / for languages that are deleted or disabled
    	if ($page_name == "pagenotfound")
    	{
			$nf_url_arr = explode( __PS_BASE_URI__, $_SERVER['REQUEST_URI'], 2);
			if (sizeof($nf_url_arr) == 2)
				$nf_lang_arr = explode('/', $nf_url_arr[1], 2);
			//print "$cur_lang != ".$nf_lang_arr[0].".'/'<br />";
			if (isset($nf_lang_arr[1]))
			{
				if ($cur_lang != $nf_lang_arr[0].'/' && strlen($nf_lang_arr[0]) == 2)
				{
					$no_lang_url = $protocol_link.$server_host. __PS_BASE_URI__.$nf_lang_arr[1];
					if ($debug)
					{
						$myFile = dirname(__FILE__)."/1dur_log.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						fwrite($fh, "\n11.5) $no_lang_url");
						fclose($fh);
						print "11.5) $no_lang_url";
						return;
					}
					Header( "HTTP/1.1 301 Moved Permanently" );
					Header( "Location: ".$no_lang_url);
					exit; 
				}
			}
    	}
    	// Redirect Old content pages
 		if ($ps_version >= 1.4 && sizeof($languages) != 1 && @substr($_SERVER['REQUEST_URI'],0,strlen("content")+strlen(__PS_BASE_URI__)) == __PS_BASE_URI__."content")
    	{
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n12)".$protocol_link.$server_host.str_replace("/content/","/".$default_lang."content/",$_SERVER['REQUEST_URI']));
				fclose($fh);
				print "12)".$protocol_link.$server_host.str_replace("/content/","/".$default_lang."content/",$_SERVER['REQUEST_URI']);
				return;
			}
    		Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$protocol_link.$server_host.str_replace("/content/","/".$default_lang."content/",$_SERVER['REQUEST_URI']));
			exit; 
       	}
    	// Redirect for location detection module //
		if (($cookie->ld_redirect == 1 || $dur_se) && @substr($_SERVER['REQUEST_URI'],-strlen('redirected')) == "redirected")
    	{
			$redirect_url = $protocol_link.$server_host.@substr($_SERVER['REQUEST_URI'],0,-(strlen('redirected')+1));
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n13)".$redirect_url);
				fclose($fh);
				print "13)".$redirect_url;
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$redirect_url );
			exit; 
    	}
    	else if (($cookie->ld_redirect == 1 || $dur_se) && @substr($_SERVER['REQUEST_URI'],0,-strlen('redirected=')) == "redirected=")
    	{
			$redirect_url = $protocol_link.$server_host.@substr($_SERVER['REQUEST_URI'],0,-(strlen('redirected=')+1));
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n14)".$redirect_url);
				fclose($fh);
				print "14)".$redirect_url;
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$redirect_url );
			exit; 
    	}
		if ($debug)
		{
			$myFile = dirname(__FILE__)."/1dur_log.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			fwrite($fh, "\npage_name = $page_name GET = ".print_r($_GET, true)."\n");
			fclose($fh);
		}
    	/*
		* Check if this is an old product URL that is redirected to page not found....
		*/
		if ($page_name == "pagenotfound" && isset($_SERVER['REQUEST_URI']))
		{
			$path = explode("/", $_SERVER['REQUEST_URI']);
			$filename = explode("-", $path[sizeof($path)-1]);
			if (is_numeric($filename[0]))
			{
				$page_name = "product";
				$_GET['id_product'] = $filename[0];
			}
		}		// Product page redirect //
		if ($page_name == "product" && isset($_GET['id_product']) && @strtolower($_SERVER['REQUEST_METHOD']) != "post")
		{
			$dur_product = new Product($_GET['id_product']);
			// Product does not exist.
			if (!$dur_product->id)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n15) ".__PS_BASE_URI__);
					fclose($fh);
					print "15)/";
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit; 
			}
			// Product Disabled
			if (!$dur_product->active)
			{
				$link = new Link();
				$redirect_url = $link->getCategoryLink($dur_product->id_category_default);
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n16)".$redirect_url);
					fclose($fh);
					print "16) $redirect_url";
					return;
				}
				Header( "HTTP/1.1 302 Moved Permanently" );
				Header( "Location: ".$redirect_url);
				exit; 
			}
			@$url_arr = explode(".html?",((strlen($_SERVER['REQUEST_URI']) > strlen($_SERVER['REDIRECT_URL']) && strpos($_SERVER['REDIRECT_URL'],".php") !== false) || strpos($_SERVER['REQUEST_URI'],".php") === false?$_SERVER['REQUEST_URI']:$_SERVER['REDIRECT_URL']),2);
			if (@strpos($_SERVER['REQUEST_URI'],".php") !== false && @strpos($_SERVER['REQUEST_URI'],($ps_version >= 1.5?"index.php":"product.php")) === false)
				return;
			if (@strpos($_SERVER['REDIRECT_URL'],".php") !== false && @strpos($_SERVER['REDIRECT_URL'],($ps_version >= 1.5?"index.php":"product.php")) === false)
				return;
			if (sizeof($url_arr) == 1)
				$url_arr[0] = substr(urldecode($url_arr[0]),0,strlen(urldecode($url_arr[0]))-5);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang && $ps_version < 1.4)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
			}
			if ($ps_version <= 1.4)
			{
				$dur_category = new Category($dur_product->id_category_default);
				$proper_url = __PS_BASE_URI__.$lang.($dur_category->link_rewrite[$cookie->id_lang]!="home"&&$dur_category->link_rewrite[$cookie->id_lang]!=""?$dur_category->link_rewrite[$cookie->id_lang]."/":"").$dur_product->id."-".$dur_product->link_rewrite[$cookie->id_lang].($dur_product->ean13 != '' && $dur_product->ean13 != '0'?'-'.$dur_product->ean13:'');
			}
			else
			{
				$link = new Link();
				// Get the new rewriteable product URL (PS 1.5+)
				$redirect_url = $link->getProductLink($dur_product->id);
				$proper_url = explode("/", $redirect_url, 4);
				$proper_url = "/".$proper_url[3];
				if (substr($proper_url, -5) == ".html")
					$proper_url = substr($proper_url, 0, -5);
			}
			if (sizeof($url_arr) == 2)
				$clean_vars = $this->cleanVars("id_product",urldecode($url_arr[1]));
			if (urldecode($url_arr[0]) != $proper_url || (sizeof($url_arr) == 2 && $clean_vars != html_entity_decode(urldecode($url_arr[1]))))
			{
				if ($ps_version <= 1.4)
					$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang.($dur_category->link_rewrite[$cookie->id_lang]!="home"&&$dur_category->link_rewrite[$cookie->id_lang]!=""?$dur_category->link_rewrite[$cookie->id_lang]."/":"").$dur_product->id."-".$dur_product->link_rewrite[$cookie->id_lang].($dur_product->ean13 != '' && $dur_product->ean13 != '0'?'-'.$dur_product->ean13:'').".html".($clean_vars?"?".$clean_vars:"");		
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n17)".$redirect_url);
					fclose($fh);
					print "17)".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit; 
			}
		}
		// Category page redirect //
		if ($page_name == "category" && isset($_GET['id_category']))
		{
			$dur_category = new Category($_GET['id_category']);
			if (!$dur_category->id)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n18)".__PS_BASE_URI__);
					fclose($fh);
					print "18) ".__PS_BASE_URI__;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit; 
			}
			// Category Disabled
			if (!$dur_category->active)
			{
				// Get URL of parent category for redirect.
				$link = new Link();
				$redirect_url = $link->getCategoryLink($dur_category->id_parent);
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n19)".$redirect_url);
					fclose($fh);
					print "19 D)/$redirect_url";
					return;
				}
				Header( "HTTP/1.1 302 Moved Permanently" );
				Header( "Location: ".$redirect_url);
				exit; 
			}
			if (!$dur_category->id_category)
				$dur_category->id_category = $dur_category->id;
			@$url_arr = explode("?",((strlen($_SERVER['REQUEST_URI']) > strlen($_SERVER['REDIRECT_URL']) && strpos($_SERVER['REDIRECT_URL'],".php") !== false) || strpos($_SERVER['REQUEST_URI'],".php") === false || $_SERVER['REDIRECT_URL'] == ""?$_SERVER['REQUEST_URI']:$_SERVER['REDIRECT_URL']),2);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
			}
			if (sizeof($url_arr) == 2)
				$clean_vars = $this->cleanVars("id_category",urldecode($url_arr[1]));
			if ($ps_version <= 1.4)
			{
				$proper_url = __PS_BASE_URI__.$lang.$dur_category->id_category."-".$dur_category->link_rewrite[$cookie->id_lang];
			}
			else
			{
				$link = new Link();
				// Get the new rewriteable Category URL (PS 1.5+)
				$redirect_url = $link->getCategoryLink($dur_category->id_category);
				$proper_url = explode("/", $redirect_url, 4);
				$proper_url = "/".$proper_url[3];
				if ($clean_vars && strpos($redirect_url, $clean_vars) === false)
					$redirect_url .= "?".$clean_vars;
			}
			// Current Address doesn't match the default address, REDIRECT //
			if ((!isset($_SERVER['REQUEST_URI']) || substr($redirect_url, -strlen($_SERVER['REQUEST_URI'])) != $_SERVER['REQUEST_URI']) && (urldecode($url_arr[0]) != $proper_url ||
				(sizeof($url_arr) == 2 && $clean_vars != html_entity_decode(urldecode($url_arr[1])) && (strlen($clean_vars) < 1 || substr($clean_vars,1) != html_entity_decode(urldecode($url_arr[1]))))
				))
			{
				//print urldecode($url_arr[0])." != $proper_url <br />$redirect_url";
				//print "<br />!$clean_vars != ".html_entity_decode($url_arr[1]);
				//return;
				if ($ps_version <= 1.4)
					$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang.$dur_category->id_category."-".$dur_category->link_rewrite[$cookie->id_lang].($clean_vars?"?".$clean_vars:"");
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n20) ".urldecode($url_arr[0])." != $proper_url || $clean_vars != ".urldecode($url_arr[1])."\n".$redirect_url);
					fwrite($fh, "\nif ((!isset(".$_SERVER['REQUEST_URI'].") || substr($redirect_url, -".strlen($_SERVER['REQUEST_URI']).") != ".$_SERVER['REQUEST_URI'].") && (".urldecode($url_arr[0])." != $proper_url || (".sizeof($url_arr)." == 2 && $clean_vars != ".html_entity_decode(urldecode($url_arr[1]))." && (".strlen($clean_vars)." < 1 || ".substr($clean_vars,1)." != ".$url_arr[1]);
					fclose($fh);
					print "20)".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit; 
			}
			if ($dur_se && sizeof($url_arr) == 2)
			{
				$clean_vars = $this->cleanVarsSE(urldecode($url_arr[1]));
				if ($clean_vars != -1)
				{
					$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang.$dur_category->id_category."-".$dur_category->link_rewrite[$cookie->id_lang].$clean_vars;
					if ($debug)
					{
						$myFile = dirname(__FILE__)."/1dur_log.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						fwrite($fh, "\n21)".$redirect_url);
						fclose($fh);
						print "21)".$redirect_url;
						return;
					}
					Header( "HTTP/1.1 301 Moved Permanently" );
					Header( "Location: ".$redirect_url );
					exit;
				} 
			}
			
		}
		// Manufaturer page redirect //
		if ($page_name == "manufacturer" && isset($_GET['id_manufacturer']))
		{
			$dur_manufacturer = new Manufacturer($_GET['id_manufacturer'], $cookie->id_lang);
			if (!$dur_manufacturer->id)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n22)".__PS_BASE_URI__);
					fclose($fh);
					print "22)".__PS_BASE_URI__;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit; 
			}
			// Manufacturer Disabled
			if (isset($dur_manufacturer->active) && !$dur_manufacturer->active)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n23)".__PS_BASE_URI__);
					fclose($fh);
					print "23 D)/";
					return;
				}
				Header( "HTTP/1.1 302 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit; 
			}
			if (!isset($dur_manufacturer->id_manufacturer))
				$dur_manufacturer->id_manufacturer = $dur_manufacturer->id;
			$link_rewrite = $dur_manufacturer->id_manufacturer."_".$dur_manufacturer->link_rewrite;
			if ($ps_version == 1.1)
				$link_rewrite = $dur_manufacturer->id."_".Tools::link_rewrite($dur_manufacturer->name, false);
			@$url_arr = explode("?",((strlen($_SERVER['REQUEST_URI']) > strlen($_SERVER['REDIRECT_URL']) && strpos($_SERVER['REDIRECT_URL'],".php") !== false) || strpos($_SERVER['REQUEST_URI'],".php") === false || $_SERVER['REDIRECT_URL'] == ""?$_SERVER['REQUEST_URI']:$_SERVER['REDIRECT_URL']),2);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
			}
			if (sizeof($url_arr) == 2)
				$clean_vars = $this->cleanVars("id_manufacturer",urldecode($url_arr[1]));
			if ($ps_version <= 1.4)
			{
				$proper_url = __PS_BASE_URI__.$lang.$link_rewrite;
			}
			else
			{
				$link = new Link();
				// Get the new rewriteable Manufacturer URL (PS 1.5+)
				$redirect_url = $link->getManufacturerLink($dur_manufacturer);
				$proper_url = explode("/", $redirect_url, 4);
				$proper_url = "/".$proper_url[3];
				if ($clean_vars && strpos($redirect_url, $clean_vars) === false)
					$redirect_url .= "?".$clean_vars;
			}
			if ((!isset($_SERVER['REQUEST_URI']) || substr($redirect_url, -strlen($_SERVER['REQUEST_URI'])) != $_SERVER['REQUEST_URI']) && (urldecode($url_arr[0]) != $proper_url ||
				(sizeof($url_arr) == 2 && $clean_vars != html_entity_decode(urldecode($url_arr[1])) && (strlen($clean_vars) < 1 || substr($clean_vars,1) != html_entity_decode(urldecode($url_arr[1]))))
				))
			{
				if ($ps_version <= 1.4)
					$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang.$link_rewrite.($clean_vars?"?".$clean_vars:"");
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n24)".$redirect_url);
					fwrite($fh, "\nif ((!isset(".$_SERVER['REQUEST_URI'].") || substr($redirect_url, -".strlen($_SERVER['REQUEST_URI']).") != ".$_SERVER['REQUEST_URI'].") && (".urldecode($url_arr[0])." != $proper_url || (".sizeof($url_arr)." == 2 && $clean_vars != ".html_entity_decode(urldecode($url_arr[1]))." && (".strlen($clean_vars)." < 1 || ".substr($clean_vars,1)." != ".$url_arr[1]);
					fclose($fh);
					print "24)".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit; 
			}
			if ($dur_se && sizeof($url_arr) == 2)
			{
				$clean_vars = $this->cleanVarsSE(urldecode($url_arr[1]));
				if ($clean_vars != -1)
				{
					if ($ps_version <= 1.4)
						$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang.$link_rewrite.($clean_vars?"?".$clean_vars:"");
					if ($debug)
					{
						$myFile = dirname(__FILE__)."/1dur_log.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						fwrite($fh, "\n25)".$redirect_url);
						fclose($fh);
						print "25)".$redirect_url;
						return;
					}
					Header( "HTTP/1.1 301 Moved Permanently" );
					Header( "Location: ".$redirect_url );
					exit;
				} 
			}
		}
		// Supplier page redirect //
		if ($page_name == "supplier" && isset($_GET['id_supplier']))
		{
			$dur_supplier = new Supplier($_GET['id_supplier']);
			if (!$dur_supplier->id)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n26)".__PS_BASE_URI__);
					fclose($fh);
					print "26)".__PS_BASE_URI__;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit; 
			}
			// Supplier Disabled
			if (isset($dur_supplier->active) && !$dur_supplier->active)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n27)".__PS_BASE_URI__);
					fclose($fh);
					print "227 D)/";
					return;
				}
				Header( "HTTP/1.1 302 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit; 
			}
			if (!$dur_supplier->id_supplier)
				$dur_supplier->id_supplier = $dur_supplier->id;
			$link_rewrite = $dur_supplier->id_supplier."__".$dur_supplier->link_rewrite;
			if ($ps_version == 1.1)
				$link_rewrite = $dur_supplier->id."__".Tools::link_rewrite($dur_supplier->name, false);
			@$url_arr = explode("?",(((strlen($_SERVER['REQUEST_URI']) > strlen($_SERVER['REDIRECT_URL']) && strpos($_SERVER['REDIRECT_URL'],".php") !== false) || strpos($_SERVER['REQUEST_URI'],".php") === false || $_SERVER['REDIRECT_URL'] == "")?$_SERVER['REQUEST_URI']:$_SERVER['REDIRECT_URL']),2);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
			}
			if (sizeof($url_arr) == 2)
				$clean_vars = $this->cleanVars("id_supplier",urldecode($url_arr[1]));
			if ($ps_version <= 1.4)
			{
				$proper_url = __PS_BASE_URI__.$lang.$link_rewrite;
			}
			else
			{
				$link = new Link();
				// Get the new rewriteable Supplier URL (PS 1.5+)
				$redirect_url = $link->getSupplierLink($dur_supplier->id);
				$proper_url = explode("/", $redirect_url, 4);
				$proper_url = "/".$proper_url[3];
				if ($clean_vars && strpos($redirect_url, $clean_vars) === false)
					$redirect_url .= "?".$clean_vars;
			}
			if ((!isset($_SERVER['REQUEST_URI']) || substr($redirect_url, -strlen($_SERVER['REQUEST_URI'])) != $_SERVER['REQUEST_URI']) && (urldecode($url_arr[0]) != $proper_url ||
				(sizeof($url_arr) == 2 && $clean_vars != html_entity_decode(urldecode($url_arr[1])) && (strlen($clean_vars) < 1 || substr($clean_vars,1) != html_entity_decode(urldecode($url_arr[1]))))
				))
			{
				if ($ps_version <= 1.4)
					$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang.$link_rewrite.($clean_vars?"?".$clean_vars:"");
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n28)".$redirect_url);
					fclose($fh);
					print "28)".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit; 
			}
			if ($dur_se && sizeof($url_arr) == 2)
			{
				$clean_vars = $this->cleanVarsSE(urldecode($url_arr[1]));
				if ($clean_vars != -1)
				{
					if ($ps_version <= 1.4)
						$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang.$link_rewrite.($clean_vars?"?".$clean_vars:"");
					if ($debug)
					{
						$myFile = dirname(__FILE__)."/1dur_log.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						fwrite($fh, "\n29)".$redirect_url);
						fclose($fh);
						print "29)".$redirect_url;
						return;
					}
					Header( "HTTP/1.1 301 Moved Permanently" );
					Header( "Location: ".$redirect_url );
					exit;
				} 
			}
		}
		// CMS page redirect //
		if ($page_name == "cms" && isset($_GET['id_cms']))
		{
			$dur_cms = new CMS($_GET['id_cms']);
			// Redirect Deleted CMS pages
			if (!$dur_cms->id)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n30)".__PS_BASE_URI__);
					fclose($fh);
					print "30) Location: ".__PS_BASE_URI__;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit;
			}
			// CMS Disabled
			if (isset($dur_cms->active) && !$dur_cms->active)
			{
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n31)".__PS_BASE_URI__);
					fclose($fh);
					print "31 D)/";
					return;
				}
				Header( "HTTP/1.1 302 Moved Permanently" );
				Header( "Location: ".__PS_BASE_URI__);
				exit; 
			}
			@$url_arr = explode("?",((strlen($_SERVER['REQUEST_URI']) > strlen($_SERVER['REDIRECT_URL']) && strpos($_SERVER['REDIRECT_URL'],".php") !== false) || strpos($_SERVER['REQUEST_URI'],".php") === false || $_SERVER['REDIRECT_URL'] == ""?$_SERVER['REQUEST_URI']:$_SERVER['REDIRECT_URL']),2);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
				if (sizeof($languages) == 1)
					unset($lang);
				elseif ($lang == "")
					$lang = $default_lang;
			}
			if (sizeof($url_arr) == 2)
			{
				$clean_vars = $this->cleanVars("id_cms",urldecode($url_arr[1]));
			}
			if ($ps_version <= 1.4)
			{
				$proper_url = __PS_BASE_URI__.$lang."content/".$dur_cms->id."-".$dur_cms->link_rewrite[$cookie->id_lang];
			}
			else
			{
				$link = new Link();
				// Get the new rewriteable Supplier URL (PS 1.5+)
				$redirect_url = $link->getCMSLink($dur_cms->id);
				$proper_url = explode("/", $redirect_url, 4);
				$proper_url = "/".$proper_url[3];
				if ($clean_vars && strpos($redirect_url, $clean_vars) === false)
					$redirect_url .= "?".$clean_vars;
			}
			if (urldecode($url_arr[0]) != $proper_url || (sizeof($url_arr) == 2 && $clean_vars != html_entity_decode(urldecode($url_arr[1]))))
			{
				if ($ps_version <= 1.4)
					$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang."content/".$dur_cms->id."-".$dur_cms->link_rewrite[$cookie->id_lang].($clean_vars?"?".$clean_vars:"");
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n33) $lang , $proper_url- ".$redirect_url);
					fclose($fh);
					print "33) $lang , $proper_url- ".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit; 
			}
		}
		if (($dur_se || $ps_version >= 1.4) && $page_name == "new-products")
		{
			@$url_arr = explode("?",$_SERVER['REQUEST_URI'],2);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
				$page_url = $link->getPageLink('new-products.php');
				$site_url_len = strlen($protocol_link.$server_host);
				if (substr($page_url,0, 5) == 'http:' && substr($protocol_link,0, 5) == 'https')
					$site_url_len--;
				elseif (substr($page_url,0, 5) == 'https' && substr($protocol_link,0, 5) == 'http:')
					$site_url_len++;
				$proper_url = substr($page_url, $site_url_len);
			}
			else
				$proper_url = __PS_BASE_URI__.$lang."new-products.php";
			if ($dur_se && sizeof($url_arr) == 2)
			{
				$clean_vars = $this->cleanVarsSE(urldecode($url_arr[1]));
				if ($clean_vars != -1)
				{
					$redirect_url = $protocol_link.$server_host.$proper_url.$clean_vars;
					if ($debug)
					{
						$myFile = dirname(__FILE__)."/1dur_log.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						fwrite($fh, "\n34)".$redirect_url);
						fclose($fh);
						print "34)".$redirect_url;
						return;
					}
					Header( "HTTP/1.1 301 Moved Permanently" );
					Header( "Location: ".$redirect_url );
					exit;
				} 
			}
			elseif (urldecode($url_arr[0]) != $proper_url)
			{
				$clean_vars = $this->cleanVars("",urldecode($url_arr[1]));
				$redirect_url = $protocol_link.$server_host.$proper_url.($clean_vars?"?".$clean_vars:"");
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n35)".$redirect_url);
					fclose($fh);
					print "35)".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit;
			}
		}
		if (($dur_se || $ps_version >= 1.4) && $page_name == "prices-drop")
		{
			@$url_arr = explode("?",$_SERVER['REQUEST_URI'],2);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
				$page_url = $link->getPageLink('prices-drop.php');
				$site_url_len = strlen($protocol_link.$server_host);
				if (substr($page_url,0, 5) == 'http:' && substr($protocol_link,0, 5) == 'https')
					$site_url_len--;
				elseif (substr($page_url,0, 5) == 'https' && substr($protocol_link,0, 5) == 'http:')
					$site_url_len++;
				$proper_url = substr($page_url, $site_url_len);
			}
			else
				$proper_url = __PS_BASE_URI__.$lang."prices-drop.php";
			if ($dur_se && sizeof($url_arr) == 2)
			{
				$clean_vars = $this->cleanVarsSE(urldecode($url_arr[1]));
				if ($clean_vars != -1)
				{
					$redirect_url = $protocol_link.$server_host.$proper_url.$clean_vars;
					if ($debug)
					{
						$myFile = dirname(__FILE__)."/1dur_log.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						fwrite($fh, "\n36)".$redirect_url);
						fclose($fh);
						print "\n36)".$redirect_url;
						return;
					}
					Header( "HTTP/1.1 301 Moved Permanently" );
					Header( "Location: ".$redirect_url );
					exit;
				} 
			}
			elseif (urldecode($url_arr[0]) != $proper_url)
			{
				$clean_vars = $this->cleanVars("",urldecode($url_arr[1]));
				$redirect_url = $protocol_link.$server_host.$proper_url.($clean_vars?"?".$clean_vars:"");
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n37)".$redirect_url);
					fclose($fh);
					print "37)".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit;
			}
		}
		if (($dur_se || $ps_version >= 1.4) && $page_name == "best-sales")
		{
			@$url_arr = explode("?",$_SERVER['REQUEST_URI'],2);
			if (strpos(urldecode($url_arr[0]),"/lang-") !== false)
				$lang = substr(urldecode($url_arr[0]),strpos(urldecode($url_arr[0]),"/lang-")+1,8);
			if ($lang == $default_lang)
				unset($lang);
			if ($ps_version >= 1.4)
			{
				$pattern = "~/[a-z]{2}/~";
				preg_match ($pattern, substr(urldecode($url_arr[0]),strlen(__PS_BASE_URI__)-1), $ret_arr);
				if (sizeof($ret_arr) > 0)
				{
					$lang = substr($ret_arr[0],1);
					$tmp_arr = explode($ret_arr[0], urldecode($url_arr[0]));
					if (substr_count($tmp_arr[0],"/") > 1)
						return;
				}
				$page_url = $link->getPageLink('best-sales.php');
				$site_url_len = strlen($protocol_link.$server_host);
				if (substr($page_url,0, 5) == 'http:' && substr($protocol_link,0, 5) == 'https')
					$site_url_len--;
				elseif (substr($page_url,0, 5) == 'https' && substr($protocol_link,0, 5) == 'http:')
					$site_url_len++;
				$proper_url = substr($page_url, $site_url_len);
			}
			else
				$proper_url = __PS_BASE_URI__.$lang."best-sales.php";
			if ($dur_se && sizeof($url_arr) == 2)
			{
				$clean_vars = $this->cleanVarsSE(urldecode($url_arr[1]));
				if ($clean_vars != -1)
				{
					$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__.$lang."best-sales.php".$clean_vars;
					if ($debug)
					{
						$myFile = dirname(__FILE__)."/1dur_log.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						fwrite($fh, "\n38)".$redirect_url);
						fclose($fh);
						print "38)".$redirect_url;
						return;
					}
					Header( "HTTP/1.1 301 Moved Permanently" );
					Header( "Location: ".$redirect_url );
					exit;
				} 
			}
			elseif (urldecode($url_arr[0]) != $proper_url)
			{
				$clean_vars = $this->cleanVars("",urldecode($url_arr[1]));
				$redirect_url = $protocol_link.$server_host.$proper_url.($clean_vars?"?".$clean_vars:"");
				if ($debug)
				{
					$myFile = dirname(__FILE__)."/1dur_log.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					fwrite($fh, "\n39)".$redirect_url);
					fclose($fh);
					print "39)".$redirect_url;
					return;
				}
				Header( "HTTP/1.1 301 Moved Permanently" );
				Header( "Location: ".$redirect_url );
				exit;
			}
		}
		if ($dur_se && in_array($page_name, array("sendtoafriend-form","cart","order","order-opc")))
		{
			$redirect_url = $protocol_link.$server_host.__PS_BASE_URI__;
			if ($debug)
			{
				$myFile = dirname(__FILE__)."/1dur_log.txt";
				$fh = fopen($myFile, 'a') or die("can't open file");
				fwrite($fh, "\n40)".$redirect_url);
				fclose($fh);
				print "40)".$redirect_url;
				return;
			}
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$redirect_url );
			exit;
		}
    }
    
    private function cleanVars($id, $vars)
    {
    	global $cookie;
		$ps_version  = floatval(substr(_PS_VERSION_,0,3));
    	$vars_arr = array();
    	$vars = html_entity_decode(urldecode($vars));
    	$pairs = explode("&", $vars);
    	foreach ($pairs AS $pair)
    	{
    		$var = explode("=",$pair);
    		$key = $var[0];
    		$val = isset($var[1])?$var[1]:'';
    		$add = true;
    		if ($ps_version >= 1.5 && $key == "controller" && strpos($vars, "content_only") === false)
				return '';
    		if ($key == $id)
    			$add = false;
    		if ($key == "controller")
    			$add = false;
    		if ($key == "id_lang" && $val == $cookie->id_lang)
    			$add = false;
    		if ($key == "isolang" && $cookie->id_lang > 0 && Language::getIdByIso($val) == $cookie->id_lang)
    			$add = false;
    		if ($add)
    			$vars_arr[$key] = $val;
    	}
    	//print_r($vars_arr);
    	$clean_vars = "";
    	foreach ($vars_arr AS $key => $val)
    		$clean_vars .= ($clean_vars != ""?"&":"").$key."=".$val;
    	return $clean_vars;
    }

    private function cleanVarsSE($vars)
    {
    	global $cookie;
    	$vars_arr = array();
    	$vars = html_entity_decode(urldecode($vars));
    	$pairs = explode("&", $vars);
    	
    	//print_r($pairs);
    	//exit;
    	foreach ($pairs AS $pair)
    	{
    		$var = explode("=",$pair);
    		$key = $var[0];
    		$val = $var[1];
    		if ($key == "p")
    		{
    			 if (sizeof($pairs) == 1)
    			 	return -1;
    			 else
    				return "?$key=$val";
    		} 
    	}
    	if (sizeof($pairs) > 0)
    		return "";
    	return -1;
    }
    
	private function fileCheck()
	{
		$lines = array();
		// Cart.php
		$server_file = file_get_contents(_PS_ROOT_DIR_."/header.php");
		$module_file = file_get_contents(_PS_ROOT_DIR_."/modules/duplicateurlredirect/header.php");
		$all_good = false;
		if ($server_file == $module_file)
			$all_good = true;
		else
		{
			$all_good = true;
			$tlines = array(6,7,8,9);
			$module_lines = file(_PS_ROOT_DIR_."/modules/duplicateurlredirect/header.php");
			foreach ($tlines AS $line)
				if (trim($module_lines[$line-1]) == "" || strpos($server_file, trim($module_lines[$line-1])) !== false)
				{
					$all_good = true;
					if (trim($module_lines[$line-1]) != "")
						$server_file = substr($server_file,strpos($server_file, trim($module_lines[$line-1]))+1);
				}
				else
				{
					$all_good = false;
					break;
				}
		}
		return $all_good;
	}

	private function upgradeCheck($module)
	{
		global $cookie;
		$ps_version  = floatval(substr(_PS_VERSION_,0,3));
		// Only run upgrae check if module is loaded in the backoffice.
		if (($ps_version > 1.1  && $ps_version < 1.5) && (!is_object($cookie) || !$cookie->isLoggedBack()))
			return;
		if ($ps_version >= 1.5)
		{
			$context = Context::getContext();
			if (!isset($context->employee) || !$context->employee->isLoggedBack())
				return;			
		}
		// Get Presto-Changeo's module version info
		$mod_info_str = Configuration::get('PRESTO_CHANGEO_SV');
		if (!function_exists('json_decode'))
		{
			if (!file_exists(dirname(__FILE__).'/JSON.php'))
				return false; 
			include_once(dirname(__FILE__).'/JSON.php');
			$j = new JSON();
			$mod_info = $j->unserialize($mod_info_str);
		}
		else
			$mod_info = json_decode($mod_info_str);
		// Get last update time.
		$time = time();
		// If not set, assign it the current time, and skip the check for the next 7 days. 
		if ($this->_last_updated <= 0)
		{
			Configuration::updateValue('PRESTO_CHANGEO_UC', $time);
			$this->_last_updated = $time;
		}
		// If haven't checked in the last 1-7+ days
		$update_frequency = max(86400, isset($mod_info->{$module}->{'T'})?$mod_info->{$module}->{'T'}:86400);
		if ($this->_last_updated < $time - $update_frequency)
		{	
			// If server version number exists and is different that current version, return URL
			if (isset($mod_info->{$module}->{'V'}) && $mod_info->{$module}->{'V'} > $this->_full_version)
				return $mod_info->{$module}->{'U'};
			$url = 'http://updates.presto-changeo.com/?module_info='.$module.'_'.$this->version.'_'.$this->_last_updated.'_'.$time.'_'.$update_frequency;
			$mod = @file_get_contents($url);
			if ($mod == '' && function_exists('curl_init'))
			{
				$ch = curl_init();
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				$mod = curl_exec($ch);
			}
			Configuration::updateValue('PRESTO_CHANGEO_UC', $time);
			$this->_last_updated = $time;
			if (!function_exists('json_decode') )
			{
				$j = new JSON();
				$mod_info = $j->unserialize($mod);
			}
			else
				$mod_info = json_decode($mod);
			if (!isset($mod_info->{$module}->{'V'}))
				return false;
			if (Validate::isCleanHtml($mod))
				Configuration::updateValue('PRESTO_CHANGEO_SV', $mod);
			if ($mod_info->{$module}->{'V'} > $this->_full_version)
				return $mod_info->{$module}->{'U'};
			else 
				return false;
		}
		elseif (isset($mod_info->{$module}->{'V'}) && $mod_info->{$module}->{'V'} > $this->_full_version)
			return $mod_info->{$module}->{'U'};
		else
			return false;
	}	
}
?>