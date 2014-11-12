MailChimp Sync PrestaShop module
Author : Sébastien Jousse
Email : s.jousse@naerys.fr
Website : http://naerys.fr

What does this module ?
This module synchronizes the list of subscribers to your Prestashop newsletter with your MailChimp mailing list.
Apart from automating the update of your MailChimp list and remove the tedious export of subscribers from PrestaShop then import them on MailChimp, the big advantage of this module is its two ways synchronization:
- PrestaShop with MailChimp: when creating a customer account, when editing a customer account
- MailChimp with Prestashop: at the subscription to the newsletter using the MailChimp signup form, at unsubscribe from the newsletter by clicking the unsubscribe link that must appear in the emails
This synchronization is done in realtime and doesn't need a cron task.
And the little plus is the block displaying a link to your MailChimp registration form.
In addition, your hosting doesn't need cURL extension because it is not used by this module.

PREREQUISITES
If you haven't one, you must create a MailChimp account on their website : http://mailchimp.com/
You can then configure your MailChimp account as desired. The only requirement for the synchronization of subscribers with PrestaShop works is to create a list: http://eepurl.com/gOHY
You will then need a MailChimp key API. To learn how to create it, you can visit this help page: http://eepurl.com/im9k

INSTALLATION
Unzip the file mailchimp.zip to a folder on your computer.
Copy the folder "mailchimp" in the "modules" folder of your PrestaShop install.
Connect to your shop backoffice and install the module "MailChimp Sync" in the "Modules" tab, under "Advertising & Marketing" section.
If folders rights permit it, the installation will copy the content of the file "Customer.php" in "/override/classes/" folder.

Due to the default PrestaShop theme, you must also install the base "Block newsletter" to enable the registration to the newsletter to customer accounts.
You will then delete the now useless newsletter block that appears in the left column, go to the tab "Modules > Positions" and delete the module "Block newsletter".
Depending on how you have developed your own theme, these steps may be unnecessary.

CONFIGURATION
First enter your MailChimp API key and confirm.
Then select the MailChimp list with which you want to synchronize the PrestaShop and confirm.

The module automatically adds in the left column of your shop a block with link for your visitors to subscribe to the newsletter.