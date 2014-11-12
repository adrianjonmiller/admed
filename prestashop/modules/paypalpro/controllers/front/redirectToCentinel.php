<?php

class PaypalproRedirectToCentinelModuleFrontController extends ModuleFrontController
{

   // public $display_column_left = false;
    public $ssl = true;
        
    /**
    * @see FrontController::initContent()
    */
    public function initContent()
    {
        parent::initContent();
        
        $cookie = $this->context->cookie;

        $this->context->smarty->assign(array(
            'validation_link' => $this->module->getModuleLink('validation'),
            'centinel_payload' => $cookie->centinel_payload,
            'centinel_orderId' => $cookie->centinel_orderId,
            'centinel_acs_url' => $cookie->centinel_acs_url,
            'isPaymentPageEnabled' => $this->module->_pppro_payment_page // added to addd content_only to url if it is with payment page activated
        ));      
        $this->setTemplate('redirectToCentinel.tpl');
    }
}
