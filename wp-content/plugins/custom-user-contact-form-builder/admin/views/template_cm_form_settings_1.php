<?php
/*
 * This page shows the form settings page
 * It consissts of different icons with the link to specific form settings.
 */

?>

<div class="cmagic">
    <div class="cm-global-settings">
        <div class="cm-settings-title"><?php echo CM_UI_Strings::get('LABEL_FORM_CONF'); ?></div>
        <div class="settings-icon-area">
            <a href="?page=cm_form_sett_general<?php echo $data->get_query_params; ?>"><div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'form-settings.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_GEN_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_GEN_SETT_DESC'); ?></span>
            </div></a>

            <a href="?page=cm_form_sett_view<?php echo $data->get_query_params; ?>"><div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'form-view.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_VIEW_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_VIEW_SETT_DESC'); ?></span>
            </div></a>

            <a href="?page=cm_form_sett_accounts<?php echo $data->get_query_params; ?>"><div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'form-accounts.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_ACC_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_ACC_SETT_DESC'); ?></span>
            </div></a>

            <a href="?page=cm_form_sett_post_sub<?php echo $data->get_query_params; ?>"><div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'post-submission.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_PST_SUB_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_PST_SUB_SETT_DESC'); ?></span>
            </div></a>

            <a href="?page=cm_form_sett_autoresponder<?php echo $data->get_query_params; ?>"><div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'auto-responder.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_AUTO_RESP_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_AUTO_RESP_SETT_DESC'); ?></span>
            </div></a>

            <a href="?page=cm_form_sett_limits<?php echo $data->get_query_params; ?>"><div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'form-limits.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_LIM_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_LIM_SETT_DESC'); ?></span>
            </div></a>

            <a href="?page=cm_form_sett_mailchimp<?php echo $data->get_query_params; ?>">
                <div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'mailchimp.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_MC_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_MC_SETT_DESC'); ?></span>
            </div></a>
            
            <a href="?page=cm_form_sett_access_control<?php echo $data->get_query_params; ?>">
                <div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'access-control.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_ACTRL_SETT'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_ACTRL_SETT_DESC'); ?></span>
            </div></a>
          
            
             <a href="?page=cm_form_sett_aweber<?php echo $data->get_query_params; ?>">
                <div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'logo-aweber.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_AWEBER_OPTION'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_ACTRL_AW_DESC'); ?></span>
            </div></a>
 <a href="?page=cm_field_manage<?php echo $data->get_query_params; ?>">
                <div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'form-custom-fields.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_F_FIELDS'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_FIELDS_DESC'); ?></span>
                    </div></a>
             <a href="?page=cm_form_sett_ccontact<?php echo $data->get_query_params; ?>">
                <div class="cm-settings-box">
                <img class="cm-settings-icon" src="<?php echo CM_IMG_URL . 'constant-contact.png' ?>">
                <div class="cm-settings-description">

                </div>
                <div class="cm-settings-subtitle"><?php echo CM_UI_Strings::get('LABEL_CONSTANT_CONTACT_OPTION'); ?></div>
                <span><?php echo CM_UI_Strings::get('LABEL_F_ACTRL_CC_DESC'); ?></span>
            </div></a>
              
           
<!-- plugin does not have any option to toggle success message yet            
<div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>post-submission.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('LABEL_SUCC_MSG'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><div class="switch">
                        <input id="cm-toggle-1" class="cm-toggle cm-toggle-round-flat" type="checkbox" onchange="cm_fd_quick_toggle(this)">
                        <label for="cm-toggle-1"></label>
                    </div></div>
            </div>-->

<!--            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>post-submission.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_LABEL_REDIRECTION'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><div class="cm-grid-sidebar-row-value difl"><div class="switch">
                            <input id="cm-toggle-3" class="cm-toggle cm-toggle-round-flat" onchange="cm_fd_quick_toggle(this, <?php echo $data->form_id; ?>)" name="form_redirect" type="checkbox"<?php echo $data->form->get_form_redirect() == 1 ? ' checked' : '' ?>>
                            <label for="cm-toggle-3"></label>
                        </div></div></div>
            </div>-->

        </div>
    </div>


</div>
