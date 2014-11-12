<?php
if (!defined('_CAN_LOAD_FILES_'))
    exit;

if (!class_exists('MCAPI'))
    include_once _PS_MODULE_DIR_ . 'mailchimp/include/MCAPI.class.php';

class Mailchimp extends Module
{
    private $_html  = '';

    public function __construct()
    {
        $this->name             = 'mailchimp';
        $this->version          = '1.4.1';
        $this->author           = 'Sébastien Jousse';
        $this->tab              = 'advertising_marketing';
        $this->module_key       = '56bf075ed4d7cbc0ffe5cecdf05bf480';
        $this->need_instance    = 1;

        $this->ps_versions_compliancy   = array(
            'min'   => '1.5',
            'max'   => '1.6'
        );

        parent::__construct();

        $this->displayName      = $this->l('Mailchimp Sync');
        $this->description      = $this->l('Synchronize automatically your list of subscribers in Prestashop with your Mailchimp account, and the reverse too.');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module ? All your settings will be lost.');
    }
    
    public function install()
    {
        if (!parent::install()
            || !Configuration::updateValue('MAILCHIMP_WEBHOOK_TOKEN', rand().rand())
            || !Configuration::updateValue('MAILCHIMP_GROUPING_ID', 0)
            || !Configuration::updateValue('MAILCHIMP_GROUP_NAME', '')

            || !$this->registerHook('actionCustomerAccountAdd')
            || !$this->registerHook('actionObjectCustomerUpdateAfter')
            || !$this->registerHook('displayLeftColumn')
            || !$this->registerHook('displayHeader')
            )
            return false;

        return true;
    }

    function uninstall()
    {
        if (!Configuration::deleteByName('MAILCHIMP_API_KEY')
            || !Configuration::deleteByName('MAILCHIMP_LIST_ID')
            || !Configuration::deleteByName('MAILCHIMP_WEBHOOK_TOKEN')
            || !Configuration::deleteByName('MAILCHIMP_GROUPING_ID')
            || !Configuration::deleteByName('MAILCHIMP_GROUP_NAME')

            || !$this->deleteWebhook()

            || !parent::uninstall()
            )
            return false;
        return true;
    }

    function addWebhook() {
        if (Configuration::get('MAILCHIMP_API_KEY') && Configuration::get('MAILCHIMP_LIST_ID')) {
            $api    = new MCAPI(Configuration::get('MAILCHIMP_API_KEY'));
            return $api->listWebhookAdd(Configuration::get('MAILCHIMP_LIST_ID'), Tools::getShopDomain(true) . _MODULE_DIR_ . 'mailchimp/webhook.php?token=' . Configuration::get('MAILCHIMP_WEBHOOK_TOKEN'));
        }
        return false;
    }

    function deleteWebhook() {
        if (Configuration::get('MAILCHIMP_API_KEY') && Configuration::get('MAILCHIMP_LIST_ID')) {
            $api    = new MCAPI(Configuration::get('MAILCHIMP_API_KEY'));
            $api->listWebhookDel(Configuration::get('MAILCHIMP_LIST_ID'), Tools::getShopDomain(true) . _MODULE_DIR_ . 'mailchimp/webhook.php?token=' . Configuration::get('MAILCHIMP_WEBHOOK_TOKEN'));
        }
        return true;
    }

    public function getContent()
    {
        $this->_html     = $this->_postProcess();
        $this->_html    .= '<h2>'.$this->displayName.'</h2>';
        $this->_html    .= $this->_displayForm();

        return $this->_html;
    }

    private function _postProcess()
    {
        $_html  = '';

        if (Tools::isSubmit('submitKey')) {
            if ($api_key = Tools::getValue('api_key')) {
                $api    = new MCAPI($api_key);
                if ($api->ping() == "Everything's Chimpy!") {
                    Configuration::updateValue('MAILCHIMP_API_KEY', $api_key);
                    $_html  .= $this->displayConfirmation($this->l('API key updated successfully'));
                }
                else {
                    $this->_errors[]    = $this->l('Invalid API key');
                }
            }
            else {
                $this->_errors[]    = $this->l('Invalid API key');
            }
        }

        if (Tools::isSubmit('submitList')) {
            if ($list_id = Tools::getValue('list_id')) {
                if (Configuration::get('MAILCHIMP_LIST_ID'))
                    $this->deleteWebhook();
                Configuration::updateValue('MAILCHIMP_LIST_ID', $list_id);
                $this->addWebhook();
                $_html  .= $this->displayConfirmation($this->l('Default list updated successfully'));
            }
            else {
                $this->_errors[]    = $this->l('Invalid list');
            }
        }

        // Group title
        if (Tools::isSubmit('submitGroupTitle')) {
            $grouping_id    = Tools::getValue('grouping_id');
            if ($grouping_id !== false) {
                Configuration::updateValue('MAILCHIMP_GROUPING_ID', $grouping_id);
                $_html  .= $this->displayConfirmation($this->l('Default group title updated successfully'));
            }
            else {
                $this->_errors[]    = $this->l('Invalid group title');
            }

            $group_name = Tools::getValue('group_name');
            if ($group_name !== false) {
                Configuration::updateValue('MAILCHIMP_GROUP_NAME', $group_name);
                $_html  .= $this->displayConfirmation($this->l('Default group name updated successfully'));
            }
            else {
                $this->_errors[]    = $this->l('Invalid group name');
            }
        }

        return $_html;
    }

    private function _displayForm()
    {
        $_html  = '';

        if (count($this->_errors) > 0)
            $_html  .= $this->displayError(implode('<br />', $this->_errors));

        if (!Configuration::get('MAILCHIMP_API_KEY'))
            $this->adminDisplayWarning($this->l('You have not yet set your Mailchimp API key'));
        if (!Configuration::get('MAILCHIMP_LIST_ID'))
            $this->adminDisplayWarning($this->l('You have not yet set your Mailchimp default list'));

        $lists      = array();
        $groupings  = array();
        if (Configuration::get('MAILCHIMP_API_KEY')) {
            $api    = new MCAPI(Configuration::get('MAILCHIMP_API_KEY'));
            $retval = $api->lists();
            $lists  = $retval['data'];

            if (Configuration::get('MAILCHIMP_LIST_ID') !== 0) {
                $groupings  = $api->listInterestGroupings(Configuration::get('MAILCHIMP_LIST_ID'));
            }
        }

        $_html  .= '<form action="' . Tools::safeOutput($_SERVER['REQUEST_URI']) . '" method="post">
            <fieldset><legend>' . $this->l('Requirement') . '</legend>
                <p class="clear">' . $this->l('You must have a MailChimp account. You can create one on their website : ') . '<a href="http://mailchimp.com/" target="_blank">http://mailchimp.com/</a></p>
            </fieldset>
            <br class="clear"/>

            <fieldset><legend>' . $this->l('Mailchimp API key') . '</legend>
                <label>' . $this->l('Your Mailchimp API key') . '</label>
                <div class="margin-form">
                    <input type="text" name="api_key" value="' . Tools::getValue('api_key', Configuration::get('MAILCHIMP_API_KEY')) . '" />
                    <p class="clear">' . $this->l('Example:') . ' 123456789abcdef0123456789abcdef0-us2</p>
                    <p class="clear">' . $this->l('How to retrieve it:') . '<a href="http://eepurl.com/im9k" target="_blank">http://eepurl.com/im9k</a></p>
                </div>

                <center><input type="submit" name="submitKey" value="' . $this->l('Save') . '" class="button" /></center>
            </fieldset>
            <br class="clear"/>

            <fieldset><legend>' . $this->l('Mailchimp default list') . '</legend>
                <label>' . $this->l('Mailchimp list') . ':</label>
                <div class="margin-form">
                    <select name="list_id"><option value="0">(' . $this->l('Select a list') . ')</option>';
                        foreach ($lists as $list)
                            $_html  .= '<option value="' . $list['id'] . '"'.(Configuration::get('MAILCHIMP_LIST_ID') == $list['id'] ? ' selected="selected"' : '') . '>' . $list['name'] . ' (' . $list['stats']['member_count'] . ')</option>';
                    $_html  .= '</select>
                    <p class="clear">' . $this->l('How to create one:') . '<a href="http://eepurl.com/gOHY" target="_blank">http://eepurl.com/gOHY</a></p>
                </div>

                <center><input type="submit" name="submitList" value="' . $this->l('Save') . '" class="button" /></center>
            </fieldset>
            <br class="clear"/>

            <!-- Group Title -->
            <fieldset><legend>' . $this->l('Mailchimp default group title') . '</legend>
                <label>' . $this->l('Mailchimp group title') . ':</label>
                <div class="margin-form">
                    <select id="grouping_id" name="grouping_id" onchange="populate_groups();">
                        <option value="0">(' . $this->l('Select a group title') . ')</option>';
                        if (is_array($groupings)) {
                            foreach ($groupings as $grouping) {
                                $_html  .= '<option value="' . $grouping['id'] . '"' . (Configuration::get('MAILCHIMP_GROUPING_ID') == $grouping['id'] ? ' selected="selected"' : '') . '>' . $grouping['name'] . '</option>';
                            }
                        }
                    $_html  .= '</select>
                    <select id="group_name" name="group_name">
                        <option value="0">(' . $this->l('Select a group name') . ')</option>';
                        if (Configuration::get('MAILCHIMP_GROUP_NAME') != '') {
                            foreach ($groupings as $grouping) {
                                if ($grouping['id'] == Configuration::get('MAILCHIMP_GROUPING_ID')) {
                                    foreach ($grouping['groups'] as $group) {
                                        $_html  .= '<option value="' . $group['name'] . '"' . (Configuration::get('MAILCHIMP_GROUP_NAME') == $group['name'] ? ' selected="selected"' : '') . '>' . $group['name'] . '</option>';
                                    }
                                }
                            }
                        }
                    $_html  .= '</select>
                    <p class="clear">' . $this->l('How to create one:') . '<a href="http://eepurl.com/gWOb" target="_blank">http://eepurl.com/gWOb</a></p>
                </div>
                <center><input type="submit" name="submitGroupTitle" value="' . $this->l('Save') . '" class="button" /></center>';

                if (is_array($groupings)) {
                    $_html  .= '<script type="text/javascript">
                    var attrs = new Array();';
                    foreach ($groupings as $grouping) {
                        $_html      .= 'attrs[' . $grouping['id'] . '] = new Array(';
                        $groupsJs    = array();
                        foreach ($grouping['groups'] as $group) {
                            $groupsJs[] = '"' . $group['name'] . '"';
                        }
                        $_html  .= implode(',', $groupsJs);
                        $_html  .= ');';
                    }

                    $_html  .= 'function populate_groups() {
                        var attr_grouping = getE("grouping_id");

                        if (!attr_grouping)
                            return;

                        var attr_groupname = getE("group_name");
                        var number = attr_grouping.options.length ? attr_grouping.options[attr_grouping.selectedIndex].value : 0;
                        if (!number) {
                            attr_groupname.options.length = 0;
                            attr_groupname.options[0] = new Option("---", 0);
                            return;
                        }

                        if (number == 0) {
                            attr_groupname.options.length = 0;
                            attr_groupname.options[0] = new Option("---", 0);
                            return;
                        }

                        var list = attrs[number];
                        attr_groupname.options.length = 0;
                        attr_groupname.options[0] = new Option("---", 0);
                        for(i = 0; i < list.length; i++) {
                            attr_groupname.options[i+1] = new Option(list[i], list[i]);
                        }
                    }
                    </script>';
                }
            $_html  .= '</fieldset>
        </form>';

        return $_html;
    }

    // actionCustomerAccountAdd
    public function hookActionCustomerAccountAdd($params) {
        global $cookie;

        $newCustomer = $params['newCustomer'];
        if (!Validate::isLoadedObject($newCustomer))
            return false;
        $postVars = $params['_POST'];

        if (empty($postVars) OR !isset($postVars['newsletter']) OR empty($postVars['newsletter']) OR !$postVars['newsletter'])
            return false;

        $api        = new MCAPI(Configuration::get('MAILCHIMP_API_KEY'));
        $merge_vars = array(
            'FNAME'         => $newCustomer->firstname,
            'LNAME'         => $newCustomer->lastname,
            'OPTIN_IP'      => $newCustomer->ip_registration_newsletter,
            'OPTIN_TIME'    => $newCustomer->newsletter_date_add,
        );

        if (Configuration::get('MAILCHIMP_GROUPING_ID') != 0 && Configuration::get('MAILCHIMP_GROUP_NAME') != '') {
            $merge_vars['GROUPINGS']    = array(
                array(
                    'id'        => Configuration::get('MAILCHIMP_GROUPING_ID'),
                    'groups'    => Configuration::get('MAILCHIMP_GROUP_NAME'),
                ),
            );
        }

        $retval = $api->listSubscribe(Configuration::get('MAILCHIMP_LIST_ID'), $newCustomer->email, $merge_vars, 'html', false, true, false, true);

        return $retval;
    }

    // actionObjectCustomerUpdateAfter
    public function hookActionObjectCustomerUpdateAfter($params) {
        global $cookie;

        $customer   = $params['object'];
        if (!Validate::isLoadedObject($customer))
            return false;
        if (!isset($customer->newsletter))
            return false;

        $api    = new MCAPI(Configuration::get('MAILCHIMP_API_KEY'));
        if ($customer->newsletter == 0) {
            $retval = $api->listUnsubscribe(Configuration::get('MAILCHIMP_LIST_ID'), $customer->email);
        }
        else {
            $merge_vars    = array(
                'FNAME'         => $customer->firstname,
                'LNAME'         => $customer->lastname,
                'OPTIN_IP'      => $customer->ip_registration_newsletter,
                'OPTIN_TIME'    => $customer->newsletter_date_add,
            );
            if (Configuration::get('MAILCHIMP_GROUPING_ID') != 0 && Configuration::get('MAILCHIMP_GROUP_NAME') != '') {
                $merge_vars['GROUPINGS']    = array(
                    array(
                        'id'        => Configuration::get('MAILCHIMP_GROUPING_ID'),
                        'groups'    => Configuration::get('MAILCHIMP_GROUP_NAME'),
                    ),
                );
            }
            $retval = $api->listSubscribe(Configuration::get('MAILCHIMP_LIST_ID'), $customer->email, $merge_vars, 'html', false, true, false, true);
        }

        return $retval;
    }

    function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params);
    }
     
     function hookDisplayLeftColumn($params)
     {
        if (!Configuration::get('MAILCHIMP_API_KEY')
            ||!Configuration::get('MAILCHIMP_LIST_ID'))
            return false;

        global $smarty;
        $apikey = Configuration::get('MAILCHIMP_API_KEY');
        $listid = Configuration::get('MAILCHIMP_LIST_ID');
        $signup_link    = '';

        $api    = new MCAPI($apikey);
        $retval = $api->lists();
        $lists  = $retval['data'];
        foreach ($lists as $list) {
            if ($list['id'] == $listid) {
                $signup_link    = $list['subscribe_url_long'];
            }
        }

        if ($signup_link == '')
            return;

        $smarty->assign('signup_link', $signup_link);
        return $this->display(__FILE__, 'blockmailchimp.tpl');
     }

    function hookDisplayHeader($params)
    {
        $this->context->controller->addCSS(($this->_path) . 'mailchimp.css', 'all');
    }
}
?>