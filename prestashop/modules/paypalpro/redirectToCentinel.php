<?php 
/* SSL Management */
$useSSL = true;

global $cookie;

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/../../header.php');
include(dirname(__FILE__).'/paypalpro.php');

$paypal = new PaypalPro();

?>
<HTML>
<HEAD>
<TITLE><?php echo $paypal->l('Processing Your Transaction'); ?></TITLE>
<SCRIPT Language="Javascript">
<!--
	function onLoadHandler(){
		document.frmLaunch.submit();
	}
//-->
</Script>
</HEAD>
<body onLoad="onLoadHandler();">
<br><br><br><br>
<center>
    <h1><?php echo $paypal->l('Processing Your Transaction...'); ?></h1>
    <h2><?php echo $paypal->l('You are being redirected to confirm your card with 3D Secure.'); ?></h2>
<FORM name="frmLaunch" method="Post" action="<?php echo urldecode($cookie->centinel_acs_url); ?>">
<noscript>
	<br><br>
	<center>
	<font color="red">
	<h1><?php echo $paypal->l('Processing Your Transaction'); ?></h1>
	<h2><?php echo $paypal->l('JavaScript is currently disabled or is not supported by your browser.'); ?></h2>
	<h3><?php echo $paypal->l('Please click Submit to continue the processing of your transaction.'); ?></h3>
	</font>
	<input type="submit" value="<?php echo $paypal->l('Submit'); ?>">
	</center>
</noscript>
<input type=hidden name="PaReq" value="<?php echo $cookie->centinel_payload; ?>">
<input type=hidden name="TermUrl" value="<?php echo 'http://'.$_SERVER['HTTP_HOST']._MODULE_DIR_.'paypalpro/validation.php?confirm=1&authenticationResponse=1'; ?>">
<input type=hidden name="MD" value="<?php echo $cookie->centinel_orderId; ?>">
</FORM>
</center>
</BODY>
</HTML>
<?php
include(dirname(__FILE__).'/../../footer.php');
?>