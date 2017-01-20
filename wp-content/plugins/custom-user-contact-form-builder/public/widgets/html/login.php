<div class="cm-otp-login-widget">
<div id="cm_otp_login">

    <div class="dbfl cm-white-box cm-rounded-corners">

        <!--Block to display if email is not entered -->
        <div id="cm_otp_enter_email">            
            <div class="dbfl cm-login-panel-fields">
                <input type="text" placeholder="<?php _e('Email', 'custom-user-contact-form-builder'); ?>" value="" id="cm_otp_econtact" name="<?php echo wp_generate_password(5, false, false); ?>"
                       onkeypress="return cm_call_otp(event, 'cm-otp-login-widget')" maxlength="50" class="difl cm-rounded-corners cm-grey-box"/>
                <input type="hidden" id="cm_username" value="">
                <button class="difl cm-rounded-corners cm-accent-bg cm-button" id="cm-panel-login" onclick="cm_call_otp(event, 'cm-otp-login-widget', 'submit')"><?php echo CM_UI_Strings::get('LABEL_NEXT'); ?></button>
            </div>
        </div>
        
        <!-- Block to enter OTP Code-->
        <div id="cm_otp_enter_otp" style="display:none" class="cm_otp_after_email">
            <div class="cm-login-goback_img dbfl">
                <img onclick="cm_otp_go_back()" class="" src="<?php echo CM_IMG_URL; ?>left-arrow.png">
            </div>            
            <div class="dbfl cm-login-panel-fields">

                <input type="text" value="" placeholder="<?php _e('OTP', 'custom-user-contact-form-builder'); ?>" maxlength="50" name="<?php echo wp_generate_password(5, false, false); ?>" id="cm_otp_kcontact" class="difl cm-rounded-corners cm-grey-box" onkeypress="return cm_call_otp(event, 'cm-otp-login-widget')"/>

                <button class="difl cm-rounded-corners cm-accent-bg cm-button" id="cm-panel-login" onclick="cm_call_otp(event, 'cm-otp-login-widget', 'submit')"><?php echo CM_UI_Strings::get('LABEL_LOGIN'); ?></button>
            </div>
        </div>
        
        <!-- Block to enter User Password -->
        <div id="cm_otp_enter_password" style="display:none" class="cm_otp_after_email">
            <div class="cm-login-goback_img dbfl">
                <img onclick="cm_otp_go_back()" class="" src="<?php echo CM_IMG_URL; ?>left-arrow.png">
            </div>
            <div class="dbfl cm-login-panel-fields">

                <input type="password" value="" placeholder="<?php _e('Password', 'custom-user-contact-form-builder'); ?>" maxlength="50" name="<?php echo wp_generate_password(5, false, false); ?>" id="cm_otp_kcontact" class="difl cm-rounded-corners cm-grey-box" onkeypress="return cm_call_otp(event, 'cm-otp-login-widget')"/>
                            
                <button class="difl cm-rounded-corners cm-accent-bg cm-button" id="cm-panel-login" onclick="cm_call_otp(event, 'cm-otp-login-widget', 'submit')"><?php echo CM_UI_Strings::get('LABEL_LOGIN'); ?></button>
                
                <div id="cm_rememberme_cb" class="dbfl"><div class="difl cm_cb"><input style="width:auto" type="checkbox" id="cm_rememberme" value="yes"><?php echo CM_UI_Strings::get('LABEL_REMEMBER'); ?></div><div class="difl cm_link"><a href="<?php echo wp_lostpassword_url(); ?>" target="blank"><?php echo CM_UI_Strings::get('MSG_LOST_PASS'); ?></a></div></div>    
            </div>
        </div>
    </div>
    
    <input type="hidden" value="<?php echo wp_generate_password(8, false); ?>" name="security_key"/>
    <div class="cm_f_notifications">
        <span class="cm_f_error"></span>
        <span class="cm_f_success"></span> 
    </div>
</div>
</div>
<pre class="cm-pre-wrapper-for-script-tags"><script type="text/javascript">
    function cm_otp_go_back(){
        jQuery("." + "cm-otp-login-widget" + " #cm_otp_login " + "#cm_otp_enter_email").show('slide',{direction: 'right'},100);
        jQuery("." + "cm-otp-login-widget" + " #cm_otp_login " + ".cm_otp_after_email").hide('slide',{direction: 'right'},1000);
    }
</script></pre>

