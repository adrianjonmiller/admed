<?php
include(dirname(__FILE__).'/../../config/config.inc.php');

function exitAndRedirect() {
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
						
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
						
	header("Location: ../");
	exit;
}

if (!Configuration::get('MAILCHIMP_WEBHOOK_TOKEN'))
	exitAndRedirect();


if (!Tools::getIsset('token') OR
	Tools::getValue('token') != Configuration::get('MAILCHIMP_WEBHOOK_TOKEN'))
	exitAndRedirect();

if (!Tools::getIsset('type'))
	exitAndRedirect();

$data	= Tools::getValue('data');
switch(Tools::getValue('type')) {
	case 'unsubscribe':
		$c = new Customer();
		if ($c->getByEmail($data['email'])) {
			$c->newsletter	= 0;
			$c->ip_registration_newsletter = null;
			$c->newsletter_date_add = null;
			$c->update();
		}
		break;
	case 'subscribe':
		$c = new Customer();
		if ($c->getByEmail($data['email'])) {
			$c->newsletter	= 1;
			$c->ip_registration_newsletter = $data['ip_opt'];
			$c->newsletter_date_add = Tools::getValue('fired_at');
			$c->update();
		}
		break;
}
?>