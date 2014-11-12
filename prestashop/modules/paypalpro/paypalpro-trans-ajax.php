<?php
/* SSL Management */
$useSSL = true;

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/paypalpro.php');

$orderId = Tools::getValue('orderId');
$trxId = Tools::getValue('trxId');
$card = Tools::getValue('card');
$auth_code = Tools::getValue('auth_code');
$amt = floatval(Tools::getValue('amt'));
$type = intval(Tools::getValue('type'));
$id_employee = intval(Tools::getValue('id_employee'));
$paypalpro_capture_status = intval(Tools::getValue('pppro_capture_status'));
$paypalpro_refund_status = intval(Tools::getValue('pppro_refund_status'));
$paypalpro = new PaypalPro();
$order = new Order($orderId);
$html = ' 
	<table cellspacing="10" width="'.($paypalpro->getPSV() < 1.5 ? '300' : '').'">
    <tr>
		<td align="left" width="175px" style="font-weight:bold;font-size:12px" nowrap>
        	&nbsp;
		</td>';

/**
  Do Capture
**/
if ($type == 1)
{
    if ($trxId != '' AND $card != '')
    {
        $res_arr = $paypalpro->doCapture($orderId,$trxId,$amt);

        if($res_arr['ACK'] == "Success")
        {
            Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."paypalpro_refunds` SET captured = '1' WHERE `id_order` = '".$orderId."'");
            $html .= '<td align="left" style="font-weight:bold;font-size:12px;color:Green;" nowrap>
                        '.$paypalpro->l('The transaction Capture was successful.').'  '.$paypalpro->l('Trans ID').': '.$res_arr['TRANSACTIONID'].'  '.$paypalpro->l('Authentication ID').' '.$res_arr['AUTHORIZATIONID'];
            $message = new Message();
            $message->message = $paypalpro->l('Transaction Capture of').' $'.$amt;
            $message->id_customer = $order->id_customer;
            $message->id_order = $order->id;
            $message->private = 1;
            $message->id_employee = $id_employee;
            $message->id_cart = $order->id_cart;
            $message->add();
            if ($paypalpro_capture_status != 0)
            {
                $history = new OrderHistory();
                $history->id_order = $orderId;
                $history->changeIdOrderState(intval($paypalpro_capture_status), intval($orderId));
                $history->id_employee = intval($id_employee);
                $carrier = new Carrier(intval($order->id_carrier), intval($order->id_lang));
                $templateVars = array('{followup}' => ($history->id_order_state == _PS_OS_SHIPPING_ AND $order->shipping_number) ? str_replace('@', $order->shipping_number, $carrier->url) : '');
                $history->addWithemail(true, $templateVars);
                Configuration::updateValue('PPPRO_CAPTURE_STATUS',$paypalpro_capture_status);
            }
        }
        else
        {
            $html .= '<td align="left" style="font-weight:bold;font-size:12px;color:red;" nowrap>';
            $html .= $paypalpro->l('The capture failed.').'<br /> '.$paypalpro->l('PayPal response: ').urldecode($res_arr['L_LONGMESSAGE0']).'<br />';
        }
    }
}
/**
  Do Refund
**/
else if ($type == 2)
{
    if ($trxId != '')
    {
        $is_captured = DB::getInstance()->getValue("SELECT captured FROM `"._DB_PREFIX_."paypalpro_refunds` WHERE `id_order`='".pSQL($orderId)."' ");        
        $res_arr = $paypalpro->doRefund($orderId,!$is_captured,$trxId,$amt);
	    if ($res_arr['ACK'] == "Success")
        {
            Db::getInstance()->Execute("INSERT INTO `"._DB_PREFIX_."paypalpro_refund_history` VALUES('','".$orderId."','".$amt."', '".(isset($res_arr['REFUNDTRANSACTIONID']) ? $paypalpro->l('Transaction ID').' :' .$res_arr['REFUNDTRANSACTIONID'] : '').(isset($res_arr['AUTHORIZATIONID']) ? $paypalpro->l('Authentication ID').' :' .$res_arr['AUTHORIZATIONID'] : '' )."',NOW())");
            $html .= '<td align="left" style="font-weight:bold;font-size:12px;color:Green;" nowrap>';
            if(isset($res_arr['REFUNDTRANSACTIONID']))
            {
                $html .= $paypalpro->l('The transaction "Refund" was successful.').'<br /> ('.$paypalpro->l('Transaction ID').' :' .$res_arr['REFUNDTRANSACTIONID']. ')';
            }
            if(isset($res_arr['AUTHORIZATIONID']))
            {
                $html .= $paypalpro->l('The transaction "Authorization" was successful.').' ('.$paypalpro->l('Authentication ID').' :' .$res_arr['AUTHORIZATIONID']. ')';
            }
            $message = new Message();
            $message->message = $paypalpro->l('Transaction of').' '.$amt.' '.(isset($res_arr['REFUNDTRANSACTIONID'])?'('.$paypalpro->l('Transaction ID').' :' .$res_arr['REFUNDTRANSACTIONID'].')':'').'  '.(isset($res_arr['AUTHORIZATIONID'])?$paypalpro->l('Authorization ID').' '.$res_arr['AUTHORIZATIONID']: '').')';
            $message->id_customer = $order->id_customer;
            $message->id_order = $order->id;
            $message->private = 1;
            $message->id_employee = $id_employee;
            $message->id_cart = $order->id_cart;
            $message->add();
            if ($paypalpro_refund_status != 0)
            {
                $history = new OrderHistory();
                $history->id_order = $orderId;
                $history->changeIdOrderState(intval($paypalpro_refund_status), intval($orderId));
                $history->id_employee = intval($id_employee);
                $carrier = new Carrier(intval($order->id_carrier), intval($order->id_lang));
                $templateVars = array('{followup}' => ($history->id_order_state == _PS_OS_SHIPPING_ AND $order->shipping_number) ? str_replace('@', $order->shipping_number, $carrier->url) : '');
                $history->addWithemail(true, $templateVars);
                Configuration::updateValue('PPPRO_REFUND_STATUS',$paypalpro_refund_status);
            }
        }
        else
        {
            $html .= '<td align="left" style="font-weight:bold;font-size:12px;color:red;" nowrap>';
            $html .= $paypalpro->l('The void / credit failed.').'<br /> '.$paypalpro->l('PayPal response: ').urldecode($res_arr['L_LONGMESSAGE0']).'<br />';

        }
    }
}
$html .= '
		</td>
	</tr>
	</table>';
echo $html;
?>