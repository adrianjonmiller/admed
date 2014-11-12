<?php
/* SSL Management */
$useSSL = true;

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/paypalpro.php');

$orderId = Tools::getValue('orderId');
$type = intval(Tools::getValue('type'));
$secure_key = Tools::getValue('secure_key');
$id_employee = intval(Tools::getValue('id_employee'));
$paypalpro = new PaypalPro();
$order = new Order(intval($orderId));
$id = $order->id;
$date = $order->date_add;
$total = $order->total_paid;
$id_lang = intval($_POST['id_lang']);
$states = OrderState::getOrderStates(intval($id_lang));

if ($secure_key != $paypalpro->_secure_key)
{
    $html = 
            '<table cellspacing="10" width="'.($paypalpro->getPSV() < 1.5 ? '400' : '').'">
            <tr>
                    <td align="left" width="155px" style="font-weight:bold;font-size:12px" nowrap>
                            &nbsp;
                    </td>
                    <td align="left" style="font-weight:bold;font-size:12px;color:Red;" nowrap>
                            '.$paypalpro->l('Your transaction was not processed - Authentication Error').'
                    </td>
            </tr>
            </table>';
}
else
{
    $result = Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'paypalpro_refunds WHERE id_order='.$orderId);
    if (is_array($result) && sizeof($result) == 1)
    {
        $trxId = $result[0]['id_trans'];
        $card = $result[0]['card'];
        $auth_code = $result[0]['auth_code'];
        $captured = $result[0]['captured'];
    }
    else
    {
        $trxId = '';
        $card = '';
        $auth_code = '';
        $captured = '';
    }
    if (($type == 1 && ($trxId == '' || $card == '')) || ($type == 2 && ($trxId == '' || $card == '')))
    {
        $html = '
                <table cellspacing="10" width="'.($paypalpro->getPSV() < 1.5 ? '400' : '').'">
                <tr>
                        <td align="left" width="155px" style="font-weight:bold;font-size:12px" nowrap>
                                &nbsp;
                        </td>
                        <td align="left" style="font-weight:bold;font-size:12px;color:Red;" nowrap>
                                '.$paypalpro->l('This order was not processed using PayPal Pro.').'
                        </td>
                </tr>
                </table>';
    }
    else if ($type == 1 AND $captured == 1)
    {
        $html = 
                '<table cellspacing="10" width="'.($paypalpro->getPSV() < 1.5 ? '400' : '').'">
                <tr>
                        <td align="left" width="155px" style="font-weight:bold;font-size:12px" nowrap>
                                &nbsp;
                        </td>
                        <td align="left" style="font-weight:bold;font-size:12px;color:Red;" nowrap>
                                '.$paypalpro->l('A capture transaction was already processed for this order.').'
                        </td>
                </tr>
                </table>';
    }
    else if ($id == $orderId)
    {
        $html = '
                <script type="text/javascript">
        function ajax_call(type) {
                var orderId = "";
                        var decimal_char =  ".";
                        if (type == 1)
                        {
                                var amt = $("#pppro_capture_amt").val();
                                if ((amt == "") || (!$("#pppro_capture_amt").val().match(/^\d+(?:\.\d+)?$/)))
                                {
                                        alert("'.$paypalpro->l('Please enter a valid capture amount').'");
                                        $("#pppro_capture_amt").focus();
                                        return false;
                                }
                                $.ajax({
                                        type: "POST",
                                        url: baseDir + "paypalpro-trans-ajax.php",
                                        async: false,
                                        cache: false,
                                        data: "orderId='.$orderId.'&trxId='.$trxId.'&id_employee='.$id_employee.'&auth_code='.$auth_code.'&card='.$card.'&pppro_capture_status="+ $("#pppro_capture_status").val() + "&type="+ type + "&amt="+ amt,
                                        success: function(html){ $("#capture_order_details").html(html); },
                                        error: function() {alert("ERROR:");}
                                });
                                $("#capture_order_id").val("");
                        }
                        if (type == 2)
                        {
                                var amt = $("#pppro_refund_amt").val();
                                if ((amt == "") || (!$("#pppro_refund_amt").val().match(/^\d+(?:\.\d+)?$/)))
                                {
                                        alert("'.$paypalpro->l('Please enter a valid refund amount').'");
                                        $("#pppro_refund_amt").focus();
                                        return false;
                                }
                                var vars = new Object();
                                vars["orderId"] = "'.$orderId.'";
                                vars["trxId"] = "'.$trxId.'";
                                vars["id_employee"] = "'.$id_employee.'";
                                vars["auth_code"] = "'.$auth_code.'";
                                vars["card"] = "'.$card.'";
                                vars["pppro_refund_status"] = $("#pppro_refund_status").val();
                                vars["type"] = type;
                                vars["amt"] = amt;
                                $.ajax({
                                        type: "POST",
                                        url: baseDir + "paypalpro-trans-ajax.php",
                                        async: false,
                                        cache: false,
                                        data: vars,
                                        success: function(html){ $("#refund_order_details").html(html); },
                                        error: function() {alert("ERROR:");}
                                });
                                $("#refund_order_id").val("");
        }
        }
        </script>';
        if ($type == 1)
                $html .= '<div id="capture_order_details">';
        if ($type == 2)
                $html .= '<div id="refund_order_details">';
        $html .= '
                <table cellspacing="10" width="'.($paypalpro->getPSV() < 1.5 ? '400' : '').'">
                <tr>
                        <td align="left" width="155px" style="font-weight:bold;font-size:14px" nowrap>
                                '.$paypalpro->l('Order Date').':
                        </td>
                        <td align="left" colspan="2" style="font-size:12px" nowrap>
                                '.$date.'
                        </td>
                </tr>';
        if ($type == 1)
        {
                $html .= 
                        '<tr>
                                <td align="left" width="155px" style="font-weight:bold;font-size:14px" nowrap>
                                        '.$paypalpro->l('Order Amount').':
                                </td>
                                <td align="left" colspan="2" style="font-size:12px" nowrap>
                                        $'.$total.'
                                </td>
                        </tr>
                        <tr>
                                <td align="left" width="155px" style="font-weight:bold;font-size:14px" nowrap>
                                        '.$paypalpro->l('Change Order Status').':
                                </td>
                                <td align="left" colspan="2" style="font-size:12px" nowrap>
                                        <select name="pppro_capture_status" id="pppro_capture_status" >
                                        <option value="0" '.($paypalpro->_pppro_capture_status == 0?'selected="selected"':'').'>----------</option>';
                foreach ($states AS $state)
                        $html .= '<option value="'.$state['id_order_state'].'" '.($paypalpro->_pppro_capture_status == $state['id_order_state']?'selected="selected"':'').'>'.$state['name'].'</option>';
                $html .= '</select> '.$paypalpro->l('(Optional)').'
                                </td>
                        </tr>
                        <tr>
                                <td align="left" width="155px" style="font-weight:bold;font-size:14px" nowrap>
                                        '.$paypalpro->l('Capture Amount').':
                                </td>
                                <td align="left" width="150px" style="font-size:12px" nowrap>
                                        $&nbsp;<input type="text" size="10" id="pppro_capture_amt" name="pppro_capture_amt" value="'.$total.'" />
                                </td>
                                <td align="left" style="font-size:12px" nowrap>
                                        <input type="button" value="'.$paypalpro->l('Capture').'" name="submitCapture" class="button" onclick="if(confirm(\'Are you sure you want to capture the transaction?\')) {ajax_call(1)}" />
                                </td>
                        </tr>';
        }
        if ($type == 2)
        {
                $html .= 
                        '<tr>
                                <td align="left" width="155px" style="font-weight:bold;font-size:14px" nowrap>
                                        '.$paypalpro->l('Order Amount').':
                                </td>
                                <td align="left" colspan="2" style="font-size:12px" nowrap>
                                        $'.$total.'
                                </td>
                        </tr>
                        <tr>
                                <td align="left" width="155px" style="font-weight:bold;font-size:14px" nowrap>
                                        '.$paypalpro->l('Change Order Status').':
                                </td>
                                <td align="left" colspan="2" style="font-size:12px" nowrap>
                                        <select name="pppro_refund_status" id="pppro_refund_status" >
                                        <option value="0" '.($paypalpro->_pppro_refund_status == 0?'selected="selected"':'').'>----------</option>';
                foreach ($states AS $state)
                        $html .= '<option value="'.$state['id_order_state'].'" '.($paypalpro->_pppro_refund_status == $state['id_order_state']?'selected="selected"':'').'>'.$state['name'].'</option>';
                $html .= '</select> '.$paypalpro->l('(Optional)').'
                                </td>
                        </tr>
                        <tr>
                                <td align="left" width="155px" style="font-weight:bold;font-size:14px" nowrap>
                                        '.$paypalpro->l('Refund Amount').':
                                </td>
                                <td align="left" width="150px" style="font-size:12px" nowrap>
                                        $&nbsp;<input type="text" size="10" id="pppro_refund_amt" name="pppro_refund_amt" value="'.$total.'" />
                                </td>
                                <td align="left" style="font-size:12px" nowrap>
                                        <input type="button" value="'.$paypalpro->l('Refund').'" name="submitRefund" class="button" onclick="if(confirm(\'Are you sure you want to refund the transaction?\')) {ajax_call(2)}"/>
                                </td>
                        </tr>';
                $result = Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'paypalpro_refund_history WHERE id_order='.$orderId);
                if (is_array($result) && sizeof($result) > 0)
                {
                        $html .= ' 
                                <tr>
                                        <td align="left" style="font-weight:bold;font-size:14px">
                                                '.$paypalpro->l('Refund History').'
                                        </td>
                                        <td align="left" nowrap colspan="3">
                                        </td>
                                </tr>';
                        foreach ($result as $row)
                        {
                                $html .= ' 
                                        <tr>
                                                <td align="left" style="font-size:12px" nowrap>
                                                        $'.$row['amount'].'
                                                </td>
                                                <td align="left" style="font-size:12px" colspan="2" nowrap>
                                                        '.$row['details'].'<br />  '.$row['date'].'
                                                </td>

                                        </tr>';
                        }
                }
        }
        $html .= ' 
                </table>
        </div>';
    }
    else
    {
        $html = ' 
                <table cellspacing="10" width="'.($paypalpro->getPSV() < 1.5 ? '400' : '').'">
                <tr>
                        <td align="left" width="155px" style="font-weight:bold;font-size:12px" nowrap>
                                &nbsp;
                        </td>
                        <td align="left" style="font-weight:bold;font-size:12px;color:Red;" nowrap>
                                '.$paypalpro->l('Invalid Order Number').'
                        </td>
                </tr>
                </table>';
    }
}
echo $html;
?>