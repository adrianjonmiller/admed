<?php

class Tools extends ToolsCore
{
public static function getMediaServer($filename)
	{
		if (self::$_cache_nb_media_servers === null)
		{
			if (_MEDIA_SERVER_1_ == '')
				self::$_cache_nb_media_servers = 0;
			elseif (_MEDIA_SERVER_2_ == '')
				self::$_cache_nb_media_servers = 1;
			elseif (_MEDIA_SERVER_3_ == '')
				self::$_cache_nb_media_servers = 2;
			else
				self::$_cache_nb_media_servers = 3;
		}
 
		if (self::$_cache_nb_media_servers && Tools::usingSecureMode() == false && ($id_media_server = (abs(crc32($filename)) % self::$_cache_nb_media_servers + 1)))
			return constant('_MEDIA_SERVER_'.$id_media_server.'_');
 
		return Tools::usingSecureMode() ? Tools::getShopDomainSSL() : Tools::getShopDomain();
	}
}