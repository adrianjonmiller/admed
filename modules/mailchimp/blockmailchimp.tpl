<!-- Block Mailchimp module-->
<div id="mailchimp_block_left" class="block">
    <h4>{l s='Newsletter' mod='mailchimp'}</h4>
    <div class="block_content">
        <p>{l s='Sign up for our newsletter and get the latest updates !' mod='mailchimp'}</p>

        <form action="{$signup_link}" method="post" target="_blank" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" novalidate>
            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </form>
    </div>
</div>
<!-- /Block Mailchimp module-->
