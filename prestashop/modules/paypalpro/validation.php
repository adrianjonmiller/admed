<?php
/* SSL Management */
$useSSL = true;

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once('PrestoChangeoClasses/init.php');
require_once('controllers/front/validation.php');

$_POST['module'] = 'paypalpro'; // for presta 1.5 

$controller = new PaypalProValidationModuleFrontController('paypalpro');
$paypalpro = new PaypalPro();

if ($paypalpro->_pppro_3d_enabled == '1' || !$paypalpro->_pppro_payment_page)  
{
    // No page mode or 3D enabled - works as usually
    $controller->run();
} 
else 
{ 
    // ajax mode - page mode is enabled
    $controller->postProcess();
}