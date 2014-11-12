<?php

class PaypalproAboutModuleFrontController extends ModuleFrontController
{

    public $ssl = true;
        
    /**
    * @see FrontController::initContent()
    */
    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign(array('path_ssl'=>$this->module->getPathSSL()));
        $this->setTemplate('about.tpl');
    }
    
    /**
    * @see FrontController::init()
    */  
    public function init()
    {
        if(Configuration::get('PPPRO_SHOW_LEFT') == 0)
            $this->display_column_left = false;
        parent::init();
    }
}
