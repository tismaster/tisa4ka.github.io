<?php
/*
 * To show all the available setting options
 */

$image_path = plugin_dir_url(dirname(dirname(__FILE__))) . 'images/';
global $cm_env_requirements;
?>

<?php if (!($cm_env_requirements & CM_REQ_EXT_CURL)){ ?>
 <div class="shortcode_notification ext_na_error_notice"><p class="cm-notice-para"><?php echo CM_UI_Strings::get('CM_ERROR_EXTENSION_CURL');?></p></div>
 <?php } ?>
 
<div class="cmagic">

    <!-----Settings Area Starts----->

    <div class="cm-global-settings">
        <div class="cm-settings-title">Global Settings</div>
        <div class="settings-icon-area">
            <a href="admin.php?page=cm_options_general">
                <div class="cm-settings-box">
                    <img class="cm-settings-icon" src="<?php echo $image_path; ?>general-settings.png">
                    <div class="cm-settings-description">

                    </div>
                    <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_GENERAL'); ?></div>
                    <span><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_GENERAL_EXCERPT'); ?></span>
                </div></a>                       

            <a href="admin.php?page=cm_options_security">
                <div class="cm-settings-box">
                    <img class="cm-settings-icon" src="<?php echo $image_path; ?>cm-security.png">
                    <div class="cm-settings-description">

                    </div>
                    <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_SECURITY'); ?></div>
                    <span><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_SECURITY_EXCERPT'); ?></span>
                </div></a>
          
            <a href="admin.php?page=cm_options_autoresponder">
                <div class="cm-settings-box">
                    <img class="cm-settings-icon" src="<?php echo $image_path; ?>cm-email-notifications.png">
                    <div class="cm-settings-description">

                    </div>
                    <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_EMAIL_NOTIFICATIONS'); ?></div>
                    <span><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_EMAIL_NOTIFICATIONS_EXCERPT'); ?></span>
                </div></a>

            <a href="admin.php?page=cm_options_thirdparty">
                <div class="cm-settings-box">
                    <img class="cm-settings-icon" src="<?php echo $image_path; ?>cm-third-party.png">
                    <div class="cm-settings-description">

                    </div>
                    <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_EXTERNAL_INTEGRATIONS'); ?></div>
                    <span><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_EXTERNAL_INTEGRATIONS_EXCERPT'); ?></span>
                </div></a>

            <a href="admin.php?page=cm_options_payment">
                <div class="cm-settings-box">
                    <img class="cm-settings-icon" src="<?php echo $image_path; ?>cm-payments.png">
                    <div class="cm-settings-description">

                    </div>
                    <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_PAYMENT'); ?></div>
                    <span><?php echo CM_UI_Strings::get('GLOBAL_SETTINGS_PAYMENT_EXCERPT'); ?></span>
                </div></a>

        </div>
    </div>
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>
