<?php
/*
 * This page shows the form settings page
 * It consissts of different icons with the link to specific form settings.
 */
?>
<link rel="stylesheet" type="text/css" href="<?php echo CM_BASE_URL . 'admin/css/'; ?>style_cm_form_dashboard.css">
<pre class="cm-pre-wrapper-for-script-tags"><script src="<?php echo CM_BASE_URL . 'admin/js/'; ?>script_cm_form_dashboard.js"></script></pre>
<pre class='cm-pre-wrapper-for-script-tags'><script>
    //Takes value of various status variables (form_id, timeline_range) and reloads page with those parameteres updated.
    function cm_refresh_stats(){
    var form_id = jQuery('#cm_form_dropdown').val();
    var trange = jQuery('#cm_stat_timerange').val();
    if(typeof trange == 'undefined')
        trange = <?php echo $data->timerange; ?>;
    window.location = '?page=cm_form_sett_manage&cm_form_id=' + '<?php echo $data->form_id; ?>' + '&cm_tr='+trange;
}
</script></pre>
<div class="cm-form-configuration-wrapper">
    <div class="cm-grid-top dbfl">
        <div class="cm-grid-title difl"><?php echo $data->form->get_form_name(); ?></div>
        <span class="cm-grid-button difl"><a class="cm_fd_link" href="?page=cm_form_sett_general"><?php echo CM_UI_Strings::get('FD_LABEL_ADD_NEW'); ?></a></span>
        <span class="cm-grid-button difr" onclick="jQuery(this).hide();jQuery('#cm_form_toggle').show()"><?php echo CM_UI_Strings::get('FD_LABEL_SWITCH_FORM'); ?></span>
        <!--    Forms toggle-->
        <span class="cm-grid-button difr" id="cm_form_toggle" style="display: none">
            <select onchange="cm_fd_switch_form(jQuery(this).val(), <?php echo $data->timerange; ?>)">
                <?php
                echo "<option value=''>" . CM_UI_Strings::get('FD_FORM_TOGGLE_PH') . "</option>";
                foreach ($data->all_forms as $form_id => $form_name):
                    echo "<option value='$form_id'>$form_name</option>";
                endforeach;
                ?>
            </select>
        </span>
        <div class="dbfl"><?php echo CM_UI_Strings::get('NO_EMBED_CODE'); ?> </div>
    </div>
    <div class="cm-grid difl"> 
        
                <!--  -->
            <div class="cm-grid-section dbfl">
                <div class="cm-grid-section-title dbfl cm-box-title"><?php echo CM_UI_Strings::get('LABEL_SUBS_OVER_TIME'); ?></div>
                <div class="cm-timerange-toggle cm-timerange-dashboard">
                <?php echo CM_UI_Strings::get('LABEL_SELECT_TIMERANGE'); ?>
                    <select id="cm_stat_timerange" onchange="cm_refresh_stats()">
                    <?php $trs = array(7,30,60,90); 

                    foreach($trs as $tr)
                    {
                        echo "<option value=$tr";
                        if($data->timerange == $tr)
                            echo " selected";
                        printf(">".CM_UI_Strings::get("STAT_TIME_RANGES")."</option>",$tr);
                    }
                    ?>

                </select>
                </div>
                <div class="cm-box-graph" id="cm_subs_over_time_chart_div">
                </div>
            </div>
        
        <!-- dummy spacer -->
        <div class="cm-grid-spacer"> </div>
        <!--    -->
        
        <div class="cm-grid-section dbfl">
            <div class="cm-grid-section-title dbfl">
                <?php echo CM_UI_Strings::get('FD_BASIC_DASHBOARD'); ?> <span class="cm-query-ask cm_promo_dead_elements">?</span>
                <div class="difr cm-grid-section-title-button"><span class="cm-grid-button cm_promo_dead_elements"><a target="_blank" href="https://registrationmagic.com/comparison/" class="cm_fd_link">upgrade</a></span></div>
                <div style="display:none" class="cm-query-answer">Standard Edition dashboard offers you all the features to get starting with building registration system on your site. For more powerful options consider upgrading to <a href="http://registrationmagic.com/?download_id=22865&edd_action=add_to_cart">Platinum</a>, <a href="http://registrationmagic.com/?download_id=19544&edd_action=add_to_cart">Gold</a> or <a href="http://registrationmagic.com/?download_id=317&edd_action=add_to_cart">Silver Bundle</a></div>
            </div>
            <div class="cm-grid-icon difl">
                <a href="?page=cm_submission_manage&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">   
                    <div class="cm-grid-icon-area dbfl">
                        <div class="cm-grid-icon-badge"><?php echo $data->sub_count; ?></div>
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>form-inbox.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('LABEL_INBOX'); ?></div>
                </a>
            </div> 

            <div class="cm-grid-icon difl">
                <a href="?page=cm_analytics_show_form&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">   
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>form-analytics.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('TITLE_FORM_STAT_PAGE'); ?></div>
                </a>
            </div> 

            <div class="cm-grid-icon difl"> 
                <a href="?page=cm_form_sett_view&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">   
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>form-view.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('FD_LABEL_DESIGN'); ?></div>
                </a>
            </div> 
            
            <div class="cm-grid-icon difl">
                <a href="?page=cm_field_manage&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">    
                    <div class="cm-grid-icon-area dbfl">
                        <div class="cm-grid-icon-badge"><?php echo $data->field_count; ?></div>
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>form-custom-fields.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('FD_LABEL_FORM_FIELDS'); ?></div>
                </a>
            </div>
            
            <div class="cm-grid-icon difl">
                <a href="?page=cm_invitations_manage&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">    
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>email-users.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('TITLE_INVITES'); ?></div>
                </a>
            </div> 
            
            <div class="cm-grid-icon difl">
                <a href="?page=cm_form_sett_general&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">    
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>form-settings.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('LABEL_F_GEN_SETT'); ?></div>
                </a>
            </div>
            
            <div class="cm-grid-icon difl">
                <a href="?page=cm_form_sett_post_sub&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">    
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>post-submission.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('LABEL_F_PST_SUB_SETT'); ?></div>
                </a>
            </div> 
            
             <div class="cm-grid-icon difl">
                <a href="?page=cm_form_sett_autoresponder&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">    
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>auto-responder.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('LABEL_F_AUTO_RESP_SETT'); ?></div>
                </a>
            </div> 
            
            <div class="cm-grid-icon difl">
                <a href="?page=cm_form_sett_limits&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">    
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>form-limits.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('LABEL_F_LIM_SETT'); ?></div>
                </a>
            </div>
            
            <div class="cm-grid-icon difl">  
                <a href="?page=cm_form_sett_mailchimp&cm_form_id=<?php echo $data->form_id; ?>" class="cm_fd_link">  
                    <div class="cm-grid-icon-area dbfl">
                        <img class="cm-grid-icon dibfl" src="<?php echo CM_IMG_URL; ?>mailchimp.png">
                    </div>
                    <div class="cm-grid-icon-label dbfl"><?php echo CM_UI_Strings::get('LABEL_F_MC_SETT'); ?></div>
                </a>
            </div> 
        </div>
        
    </div>
    <div class="cm-grid-sidebar-1 difl">
        <div class="cm-grid-section-cards dbfl">        
            <?php
            if($data->sub_count == 0):
                ?>
            <div class="cm-grid-sidebar-card dbfl">
                <div class='cmnotice-container'><div class="cmnotice-container"><div class="cm-counter-box">0</div><div class="cm-counter-label"><?php echo CM_UI_Strings::get('LABEL_REGISTRATIONS'); ?></div></div></div>  
</div>
                <?php
            endif;
            foreach ($data->latest_subs as $submission):
                ?>
                <div class="cm-grid-sidebar-card dbfl">
                    <a href="?page=cm_submission_view&cm_submission_id=<?php echo $submission->id; ?>" class="fd_sub_link">
                    <?php echo $submission->is_read? '' : "<div class='cm-grid-user-badge'>". CM_UI_Strings::get('FD_BADGE_NEW')."!</div>"; ?>
                    <div class="cm-grid-card-profile-image dbfl">
                        <img class="fd_img" src="<?php echo $submission->user_avatar; ?>">
                    </div>
                    <div class="cm-grid-card-content difl">
                        <div class="dbfl"><?php echo $submission->user_name; ?></div>
                        <div class="cm-grid-card-content-subtext dbfl"><?php echo $submission->submitted_on ?></div></div>
                    </a>
                </div>
                <?php
            endforeach;
            ?>
            <div class="cm-grid-quick-tasks dbfl">
                <div class="cm-grid-sidebar-row dbfl">
                    <div class="cm-grid-sidebar-row-label difl">
                        <a class="<?php echo $data->sub_count ? '' : 'cm_deactivated'?>" href="?page=cm_submission_manage&cm_form_id=<?php echo $data->form_id; ?>"><?php echo CM_UI_Strings::get('FD_LABEL_VIEW_ALL'); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cm-grid-section-cards dbfl cm_promo_dead_elements"> 

            <div class="cm-grid-sidebar-card dbfl">
                <div class='cmnotice-container'><div class="cmnotice-container"><div class="cm-counter-box">0</div><div class="cm-counter-label"><?php echo CM_UI_Strings::get('TITLE_ATTACHMENT_PAGE'); ?></div></div></div>  
            </div>

            <div class="cm-grid-quick-tasks dbfl">
                <div class="cm-grid-sidebar-row dbfl">
                    <div class="cm-grid-sidebar-row-label difl">
                        <a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get('FD_LABEL_VIEW_ALL'); ?></a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="cm-grid-sidebar-2 difl">
        <div class="cm-grid-section dbfl">
            <div class="cm-grid-section-title dbfl">
                <?php echo CM_UI_Strings::get('FD_LABEL_STATUS'); ?>
                <span class="cm-grid-section-toggle cm-collapsible"></span>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>shortcode.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_LABEL_FORM_SHORTCODE'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><span id="cmformshortcode">[GF_Form id='<?php echo $data->form->get_form_id(); ?>']</span><a href="javascript:void(0)" onclick="cm_copy_to_clipboard(document.getElementById('cmformshortcode'))"><?php echo CM_UI_Strings::get('FD_LABEL_COPY'); ?></a>
                    <div style="display:none" id="cm_msg_copied_to_clipboard">Copied to clipboard</div><div style="display:none" id="cm_msg_not_copied_to_clipboard">Could not be copied. Please try manually.</div></div>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>visiblity.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_LABEL_FORM_VISIBILITY'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo $data->form_access; ?><a href="?page=cm_form_sett_access_control&cm_form_id=<?php echo $data->form_id; ?>"><?php echo CM_UI_Strings::get('LABEL_EDIT'); ?></a></div>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>event.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_LABEL_FORM_CREATED_ON'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo CM_Utilities::localize_time($data->form->get_created_on()); ?></div>
            </div>

            <div class="cm-grid-quick-tasks dbfl">
                <div class="cm-grid-sidebar-row dbfl">
                    <div class="cm-grid-sidebar-row-label difl">
                        <a href="javascript:void(0)" onclick="jQuery.cm_do_action_with_alert('<?php echo CM_UI_Strings::get('ALERT_DELETE_FORM'); ?>', 'cm_fd_action_form', 'cm_form_remove')"><?php echo CM_UI_Strings::get('LABEL_DELETE'); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cm-grid-section dbfl">
            <div class="cm-grid-section-title dbfl">
                <?php echo CM_UI_Strings::get('FD_LABEL_CONTENT'); ?>
                <span class="cm-grid-section-toggle cm-collapsible"></span>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>pages.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_FORM_PAGES'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo 1; ?></div>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>field.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_LABEL_F_FIELDS'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo $data->field_count; ?><a href="?page=cm_field_manage&cm_form_id=<?php echo $data->form->get_form_id(); ?>"><?php echo CM_UI_Strings::get('LABEL_ADD'); ?></a></div>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>submit.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_FORM_SUBMIT_BTN_LABEL'); ?>:</div>
               <div class="cm-grid-sidebar-row-value difl"><div id="cm-submit-label"><?php echo $data->form_options->form_submit_btn_label ? : 'Submit'; ?></div><a href='javascript:;' onclick='edit_label()' ><?php echo CM_UI_Strings::get('LABEL_FIELD_ICON_CHANGE'); ?></a></div>
                <div id="cm-submit-label-textbox" style="display:none"><input type="text" id="submit_label_textbox"/><div><input type="button" value ="Save" onclick="save_submit_label()"><input type="button" value ="Cancel" onclick="cancel_edit_label()"></div></div> </div>
            <div class="cm-grid-quick-tasks dbfl">
                <div class="cm-grid-sidebar-row dbfl">
                    <div class="cm-grid-sidebar-row-label difl">
                        <a href="javascript:void(0)" onclick="jQuery.cm_do_action('cm_fd_action_form', 'cm_form_duplicate')"><?php echo CM_UI_Strings::get('LABEL_DUPLICATE'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cm-grid-section dbfl">
            <div class="cm-grid-section-title dbfl">
                <?php echo CM_UI_Strings::get('FD_LABEL_STATS'); ?>
                <span class="cm-grid-section-toggle cm-collapsible"></span>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>visitors.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_LABEL_VISITORS'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo $data->visitors_count . ' in last 30 days'; ?></div>
            </div>
            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>submissions.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('LABEL_REGISTRATIONS'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo $data->sub_count; ?><a href="javascript:void(0)" class="cm_deactivated"><?php echo CM_UI_Strings::get('FD_DOWNLOAD_REGISTRATIONS'); ?></a></div>
            </div>

            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>conversion.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('LABEL_CONVERSION'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo $data->conversion_rate; ?>%</div>
            </div>

            <div class="cm-grid-sidebar-row dbfl">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>avgtime.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('FD_AVG_TIME'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl"><?php echo $data->avg_time; ?></div>
            </div>


            <div class="cm-grid-quick-tasks dbfl">
                <div class="cm-grid-sidebar-row dbfl">
                    <div class="cm-grid-sidebar-row-label difl">
                        <a href="javascript:void(0)" onclick="jQuery.cm_do_action_with_alert('You are going to delete all stats for selected form. Do you want to proceed?', 'cm_fd_action_form', 'cm_analytics_reset')"><?php echo CM_UI_Strings::get('LABEL_RESET'); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cm-grid-section dbfl">
            <div class="cm-grid-section-title dbfl">
                <?php echo CM_UI_Strings::get('FD_LABEL_QCK_TOGGLE'); ?>
                <span class="cm-grid-section-toggle cm-collapsible"></span>
            </div>

             <?php if($data->form_options->form_email_subject && $data->form_options->form_email_content)
                  {
                        $deactivation_class = '';
                        $tooltip = '';
                  }else{
                        $deactivation_class = 'cm_transparent_deactivated';
                        $tooltip = 'title="'.sprintf(CM_UI_Strings::get('FD_TOGGLE_TOOLTIP'),admin_url('admin.php?page=cm_form_sett_autoresponder&cm_form_id='.$data->form_id)).'"';
                  }
                
             ?>
            <div   <?php echo $tooltip; ?> class="cm-grid-sidebar-row dbfl <?php echo $deactivation_class; ?>">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>auto-responder.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl" ><?php echo CM_UI_Strings::get('FD_AUTORESPONDER'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl<?php echo ($data->form_options->form_email_subject && $data->form_options->form_email_content) ? '' : ' cm_deactivated' ?>"><div class="cm-grid-sidebar-row-value difl"><div class="switch">
                            <input id="cm-toggle-1"  class="cm-toggle cm-toggle-round-flat" onchange="cm_fd_quick_toggle(this, <?php echo $data->form_id; ?>)" name="form_should_send_email" type="checkbox"<?php echo $data->form->get_form_should_send_email() == 1 ? ' checked' : '' ?>>
                            <label for="cm-toggle-1"></label>
                        </div></div></div>
            </div>           

          <?php if($data->form_options->form_expired_by)
                  {
                        $deactivation_class = '';
                        $tooltip = '';
                  }else{
                        $deactivation_class = 'cm_transparent_deactivated';
                        $tooltip = 'title="'.sprintf(CM_UI_Strings::get('FD_TOGGLE_TOOLTIP'),admin_url('admin.php?page=cm_form_sett_limits&cm_form_id='.$data->form_id)).'"';
                  }
                
             ?>
            <div <?php echo $tooltip;?> class="cm-grid-sidebar-row dbfl <?php echo $deactivation_class; ?>">
                <div class="cm-grid-sidebar-row-icon difl">
                    <img src="<?php echo CM_IMG_URL; ?>form-limits.png">
                </div>
                <div class="cm-grid-sidebar-row-label difl"><?php echo CM_UI_Strings::get('LABEL_EXPIRY'); ?>:</div>
                <div class="cm-grid-sidebar-row-value difl<?php echo ($data->form_options->form_expired_by) ? '' : ' cm_deactivated' ?>"><div class="cm-grid-sidebar-row-value difl"><div class="switch">
                            <input id="cm-toggle-5" class="cm-toggle cm-toggle-round-flat" onchange="cm_fd_quick_toggle(this, <?php echo $data->form_id; ?>)" name="form_should_auto_expire" type="checkbox"<?php echo $data->form->get_form_should_auto_expire() == 1 ? ' checked' : '' ?>>
                            <label for="cm-toggle-5"></label>
                        </div></div></div>
            </div>

        </div>

    </div>

    <!-- action form to execute cm_slug_actions -->
    <form style="display:none" method="post" action="" id="cm_fd_action_form">
        <input type="hidden" name="cm_slug" value="" id="cm_slug_input_field">
        <input type="hidden" name="req_source" value="form_dashboard">
        <input type="hidden" name="cm_interval" value="all">
        <input type="number" name="form_id" value="<?php echo $data->form_id; ?>">
        <input type="number" name="cm_selected" value="<?php echo $data->form_id; ?>">
    </form

    <!--    Forms toggle-->
    <div id="cm_form_toggle" style="display: none">
        <select onchange="cm_fd_switch_form()">
            <?php
            foreach ($data->all_forms as $form_id => $form_name):
                echo "<option value='$form_id'>$form_name</option>";
            endforeach;
            ?>
        </select>
    </div>
</div>
<?php
            wp_enqueue_script('jquery-ui-tooltip',array('jquery'));
?>
<pre class='cm-pre-wrapper-for-script-tags'><script>
    function edit_label(){
        jQuery('#cm-submit-label-textbox').show();
    }
    
    function cancel_edit_label(){
        jQuery('#submit_label_textbox').val('');
        jQuery('#cm-submit-label-textbox').hide();
    }
    
    function save_submit_label(){
        
       var label= jQuery('#submit_label_textbox').val();
        if(label == '')
       {
           jQuery('#submit_label_textbox').focus();
           return 0;
       }
        var data = {
			'action': 'cm_save_submit_label',
			'label': label,
			'form_id':<?php echo $data->form_id ;?>
		};
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
                    console.log(response);
                       if(response== 'changed')
                       {
                           jQuery('#cm-submit-label').html(label);
                           jQuery('#cm-submit-label-textbox').hide();
                       }
                       else
                       {
                           alert('Could not Change.Please try again.');
                           location.reload(); 
                       }
                      
		});
    }
    jQuery(function () { 
    jQuery(document).tooltip({
        content: function () {
            return jQuery(this).prop('title');
        },
        show: null, 
        close: function (event, ui) {
            ui.tooltip.hover(

            function () {
                jQuery(this).stop(true).fadeTo(400, 1);
            },

            function () {
                jQuery(this).fadeOut("400", function () {
                   jQuery(this).remove();
                })
            });
        }
    });
});

</script></pre>

<?php
/* * ****************************************************************
 * *************     Chart drawing - Line Chart        **************
 * **************************************************************** */
$data_string = '';
foreach ($data->day_wise_stat as $date => $per_day) {
    
        $formatted_name = $date;
        $data_string .= ", ['$formatted_name', " . $per_day->visits . ", $per_day->submissions]";
    
}
$data_string = substr($data_string, 2);
?>

<pre class='cm-pre-wrapper-for-script-tags'><script>

    function cm_drawTimewiseStat()
    {
        var data = google.visualization.arrayToDataTable([
            ['<?php echo CM_UI_Strings::get('LABEL_DATE'); ?>',
             '<?php echo CM_UI_Strings::get('LABEL_VISITS'); ?>',
             '<?php echo CM_UI_Strings::get('LABEL_SUBMISSIONS'); ?>'],
<?php echo $data_string; ?>
        ]);

        var options = {
            chartArea: {width: '90%'},
            height: 500,
            fontName: 'Titillium Web',
            hAxis: {
                title: '',
                minValue: 0,
                slantedText: false,
                maxAlternation: 1,
                maxTextLines: 1
            },
            vAxis: {
                title: '',
                viewWindow: {min: 0},
                minValue: 4,
            },
            legend: {position: 'top', maxLines: 3},
            colors: ['#ffa845', '#8ace5f'],
            
        };
        
        var chart = new google.visualization.LineChart(document.getElementById('cm_subs_over_time_chart_div'));
        chart.draw(data, options);
    }
</script></pre>
