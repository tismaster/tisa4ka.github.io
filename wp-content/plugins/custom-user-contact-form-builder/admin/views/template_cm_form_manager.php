<?php

/**
 * @internal Template File [Form Manager]
 *
 * This file renders the form manager page of the plugin which shows all the forms
 * to manage delete edit or manage
 */

global $cm_env_requirements;
global $regmagic_errors;
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
 
 <?php /* if (($cm_env_requirements & CM_REQ_EXT_CURL) && $data->newsletter_sub_link){ */?>
<div class="cm-newsletter-banner" id="cm_newsletter_sub">To display submissions on front-end use <span class="cm-code cm-code-on-banner" title="Click to copy" onclick="cm_copy_to_clipboard(jQuery(this))">[GF_Front_Submissions]</span> shortcode.
    <span style="display:none;color:#ffa845;padding-left:5px;" id="cm_msg_copied_to_clipboard">Copied to clipboard!</span><span style="display:none;color:#ffa845;padding-left:5px;" id="cm_msg_not_copied_to_clipboard">Could not be copied. Please try manually.</span>
</div>
 
     <?php /*  } */ ?>
 
 <?php
 //Check errors
 CM_Utilities::fatal_errors();
 foreach($regmagic_errors as $err)
 {
    //Display only non - fatal errors
    if($err->should_cont)
        echo '<div class="shortcode_notification ext_na_error_notice"><p class="cm-notice-para">'.$err->msg.'</p></div>';
 }
 ?>
<div class="cmagic cmbasic">
 
    <!-- Joyride Magic begins -->
    <ol id="cm-form-man-joytips" style="display:none">
        <li>
            <h2>
                Welcome to GorillaForms
            </h2>
            <p>GorillaForms is a powerful plugin that allows you to build custom contact system on your WordPress site. This is the main landing page - Forms Manager. Click <b>Next</b> to start a quick tour of this page. To stop at anytime, click the close icon on top right.</p>
        </li>
    <li data-id="cmbar" data-options="tipLocation:bottom">You will see this flat white box on top of different sections inside GorillaForms. We call it operations bar. It contains...</li>
         <li data-id="cm-tour-title" data-options="tipLocation:bottom">The heading of the section you are presently in...</li>
        <li data-id="cm-ob-icons" data-options="nubPosition:bottom-right;tipAdjustmentX:-330">Quick access icons relevant to the section...</li>
        <li data-id="cm-ob-sort" data-options="nubPosition:bottom-right;tipAdjustmentX:-320">A filter and sort drop down menu. In this section, it allows you to sort your forms.</li>
        <li data-id="cm-ob-nav">And a navigation menu with most important functions laid horizontally. Let's look at the Form Manager functions one by one.</li>
        <li data-id="cm-ob-new">This allows you to create new forms.</li>
        <li data-id="cm-ob-duplicate">This allows you to duplicate one or multiple forms. Form's settings and fields are also duplicated.</li>
        <li data-id="cm-ob-delete">This allows you to delete one or multiple forms. All associated form data is deleted.</li>
        <li data-id="cm-ob-export">This allows you to export all your forms and associated data in a single XML file. Handy if you are reinstalling your site, moving forms to another site or simply backing up your hard work.</li>
        <li data-id="cm-ob-import">Import button allows you to import the XML file saved on your computer.</li>
        <li><h3>
            Forms As Cards
            </h3>
        <p>GorillaForms displays all forms as rectangular cards. This is a novel new approach. You will later see that a form card is much more than a symbolic representation of a form. It can show you form related data and stats at a glance. </p>
        </li>
        <li data-id="cm-card-area">All form cards are displayed as grid, starting from here. You may not need to create more than one contact form, but it's totally up to you. GorillaForms gives a playground to experiment and play to find the best combination for your site. First card slot is reserved for <b>Add New Form</b></li>
        <li data-class="cm-card-tour">This is a form card. We automatically created it for you to give you a head start.</li>
        <li data-class="cm-title-tour">This shows title of the form. When you create a new form, you can define its title. You can always change title of this form later, by going into its <b>General Settings</b></li>
        <li data-class="cm-checkbox-tour" data-options="tipAdjustmentX:-28;tipAdjustmentY:-5">The checkbox on left side of the title allows you to select multiple forms and perform batch operations. For example, deleting multiple forms. Of course there's nothing stopping you from deleting or duplicating a single form.</li>
        <li data-class="unread-box" data-options="tipAdjustmentX:-22;tipAdjustmentY:-5">On top right side of each card is an orange number badge. This is the count of total times this form has been filled and submitted on your site by visitors.</li>
        <li data-class="cm-last-submission">This area displays 3 latest submissions for this form. On new forms it will be empty in the start. Each submission will also show user's Gravatar and time stamp.</li>
        <li data-class="cm-shortcode-tour" data-options="tipAdjustmentX:50">Now this is important. GorillaForms works through shortcodes. That means, to display a form on the site, you must paste its shortcode inside a page, post or a widget (where you want this form to appear). Form shortcodes are always in this format - <b>[GF_Form id='x']</b></li>
        <li data-class="material-icons" data-options="tipAdjustmentX:-24;tipAdjustmentY:-5">This little star allows you to mark a form as your default registration form.</li>
        <li data-class="cm-form-settings">Each form has its own dashboard or operations area, that is accessible by clicking the <b>Settings</b> button on the respective form card.</li>
        <li data-class="cm-form-fields" data-options="tipAdjustmentX:-12">Any form once created is empty. Form fields need to be added manually. This is where <b>Custom Fields Manager</b> comes in. Clicking it will take you to a separate section, where you can add all sorts of fields and pages to your form.</li>
        <li>This ends our tour of Forms Manager. Feel free to explore other sections of GorillaForms. We would recommend visiting the form Dashboard first.</li>
        <li><h2>But one more thing!</h2></li>
        <li data-id="cm-new-form" data-button="Done">You can quickly create a new form by typing its title below and clicking on <b>CREATE NEW FORM</b> button. That's about it folks! You can restart the tour anytime by clicking <b>Tour</b> on operations bar.</li>

   </ol>
  <!-- Joyride Magic ends -->
<div class="gf-logo">
    <img class="gf-logo-img" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/gf-logo.png'; ?>">
    </div>
    <!--  Operations bar Starts  -->
    <form name="cm_form_manager" id="cm_form_manager_operartionbar" class="cm_static_forms" method="post" action="">
        <input type="hidden" name="cm_slug" value="" id="cm_slug_input_field">
        <div class="operationsbar" id="cmbar">
            <div class="cmtitle"><?php echo CM_UI_Strings::get('TITLE_FORM_MANAGER');?></div>
            <div class="icons" id="cm-ob-icons">
                <a href="?page=cm_options_general"><img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/general-settings.png'; ?>"></a>
            </div>
            <div class="nav" id="cm-ob-nav">
                <ul>
                    <li id="cm-ob-new"><a href="admin.php?page=cm_form_sett_general"><?php echo CM_UI_Strings::get('LABEL_ADD_NEW');?></a></li>
                    <li id="cm-ob-duplicate" onclick="jQuery.cm_do_action('cm_form_manager_operartionbar','cm_form_duplicate')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_DUPLICATE'); ?></a></li>
                    <li id="cm-ob-delete" onclick="jQuery.cm_do_action_with_alert('<?php echo CM_UI_Strings::get('ALERT_DELETE_FORM'); ?>','cm_form_manager_operartionbar','cm_form_remove')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_REMOVE'); ?></a></li>
                    <li id="cm-ob-export" onclick="jQuery.cm_do_action('cm_form_manager_operartionbar','cm_form_export')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_EXPORT_ALL'); ?></a></li>
                    <li id="cm-ob-import"><a href="admin.php?page=cm_form_import"><?php echo CM_UI_Strings::get('LABEL_IMPORT'); ?></a></li>
                    <li><a href="javascript:void(0)" onclick="cm_start_joyride()"><?php echo CM_UI_Strings::get('LABEL_TOUR'); ?></a></li>
                    
                    <li class="cm-form-toggle" id="cm-ob-sort">Sort by<select onchange="cm_sort_forms(this,'<?php echo $data->curr_page;?>')">
                            <option value=null><?php echo CM_UI_Strings::get('LABEL_SELECT'); ?></option>
                            <option value="form_name"><?php echo CM_UI_Strings::get('LABEL_NAME'); ?></option>
                            <option value="form_id"><?php echo CM_UI_Strings::get('FIELD_TYPE_DATE'); ?></option>
                            <option value="form_submissions"><?php echo CM_UI_Strings::get('LABEL_SUBMISSIONS'); ?></option>
                        </select></li>
                </ul>
            </div>
        </div>
        <input type="hidden" name="cm_selected" value="">
        <input type="hidden" name="req_source" value="form_manager">
    </form>

    <!--  *****Operations bar Ends****  -->

    <!--  ****Content area Starts****  -->

    <div class="cmagic-cards" id="cm-card-area">

        <div class="cmcard" id="cm-new-form">
            <?php
            $form = new CM_PFBC_Form("cm_form_quick_add");
            $form->configure(array(
                "prevent" => array("bootstrap", "jQuery"),
                "action" => ""
            ));
            $form->addElement(new CM_Element_HTML('<div class="cm-new-form">'));
            $form->addElement(new CM_Element_Hidden("cm_slug",'cm_form_quick_add'));
            $form->addElement(new CM_Element_Textbox('', "form_name", array("id" => "cm_form_name", "required" => 1)));
            $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_CREATE_FORM'), "submit", array("id" => "cm_submit_btn", "onClick" => "jQuery.cm_prevent_quick_add_form(event)", "class" => "cm_btn", "name" => "submit")));
            $form->addElement(new CM_Element_HTML('</div>'));
            $form->render();
            ?></div>
        
        <?php
        if (is_array($data->data) || is_object($data->data))
            foreach ($data->data as $entry)
            {
                if($entry->expiry_details->state == 'not_expired' && $entry->expiry_details->criteria != 'date')
                   $subcount_display = $entry->expiry_details->remaining_subs;// $subcount_display = $entry->count.'/'.$entry->expiry_details->sub_limit;
                else
                    $subcount_display = null;//$entry->count;
                
                //Check if form is one of the sample forms.
                $ex_form_card_class = '';
                $sample_data = get_site_option('cm_option_inserted_sample_data', null);
                if(isset($sample_data->forms) && is_array($sample_data->forms)):
                    foreach($sample_data->forms as $sample_form):
                        if($entry->form_id == $sample_form->form_id):
                            $ex_form_card_class = ($sample_form->form_type == CM_REG_FORM)? 'cm-sample-reg-form-card' : 'cm-sample-contact-form-card';                            
                        endif;
                    endforeach;
                endif;                
                ?>

                <div id="<?php echo $entry->form_id; ?>" class="cmcard cm-card-tour <?php echo $ex_form_card_class; ?>">
<div class='unread-box'><a href="?page=cm_submission_manage&cm_form_id=<?php echo $entry->form_id; ?>&cm_interval=<?php echo $data->submission_type; ?>"><?php echo $entry->count; ?></a></div>
                    <div class="cardtitle cm-title-tour">
                        <input class="cm_checkbox cm-checkbox-tour" type="checkbox" name="cm_selected_forms[]" value="<?php echo $entry->form_id; ?>"><span class="cm_form_name" ><?php echo $entry->form_name; ?></span></div>
                    <div class="cm-last-submission">
                          <b><?php if($subcount_display)
                              printf(CM_UI_Strings::get('CM_SUB_LEFT_CAPTION'),$subcount_display);
                              ?></b></div>
                            
                    <?php
                    if ($entry->count > 0)
                    {
                        foreach ($entry->submissions as $submission)
                        {
                            ?>
                            <div class="cm-last-submission">

                                <?php
                                echo $submission->gravatar . ' ' .CM_Utilities::localize_time($submission->submitted_on);
                                ?>
                            </div>
                            <?php
                        }
                    } else
                        echo '<div class="cm-last-submission"></div>';
                    ?>
                    <?php
                    if($entry->expiry_details->state == 'expired')
                        echo "<div class='cm-form-expiry-info'>".CM_UI_Strings::get('LABEL_FORM_EXPIRED')."</div>";
                    else if($entry->expiry_details->state == 'not_expired' && $entry->expiry_details->criteria != 'subs')
                    {
                        if($entry->expiry_details->remaining_days < 26)
                           echo "<div class='cm-form-expiry-info'>".sprintf(CM_UI_Strings::get('LABEL_FORM_EXPIRES_IN'),$entry->expiry_details->remaining_days)."</div>";
                        else
                        {
                           $exp_date = date('d M Y', strtotime($entry->expiry_details->date_limit));
                           echo "<div class='cm-form-expiry-info'>".CM_UI_Strings::get('LABEL_FORM_EXPIRES_ON')." {$exp_date}</div>";
                        }
                    }
                     
                    ?><div class="cm-form-shortcode">
                    <b class="cm-shortcode-tour">[GF_Form id='<?php echo $entry->form_id; ?>']</b></div>
                    <div class="cm-form-embedcode cm_promo_dead_elements"  onclick="cm_open_dial(<?php echo $entry->form_id; ?>)"><?php echo CM_UI_Strings::get('MSG_GET_EMBED'); ?></div>
                    <div class="cm-form-links">
                        <div class="cm-form-row"><a class="cm-form-settings" href="admin.php?page=cm_form_sett_manage&cm_form_id=<?php echo $entry->form_id; ?>"><?php echo CM_UI_Strings::get('SETTINGS'); ?></a></div>
                        <div class="cm-form-row"><a class="cm-form-fields" href="admin.php?page=cm_field_manage&cm_form_id=<?php echo $entry->form_id; ?>"><?php echo CM_UI_Strings::get('LABEL_FIELDS'); ?></a></div>
                    </div>
                    <div style="display:none" class="cm_form_card_settings_dialog" id="cm_settings_dailog_<?php echo $entry->form_id; ?>"><ul class="cm_form_settings_list"><a href="?page=cm_form_sett_general&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_GEN_SETT'); ?></li></a><a href="?page=cm_form_sett_view&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_VIEW_SETT'); ?></li></a><a href="?page=cm_form_sett_accounts&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_ACC_SETT'); ?></li></a><a href="?page=cm_form_sett_post_sub&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_PST_SUB_SETT'); ?></li></a><a href="?page=cm_form_sett_autoresponder&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_AUTO_RESP_SETT'); ?></li></a><a href="?page=cm_form_sett_limits&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_LIM_SETT'); ?></li></a><a href="?page=cm_form_sett_mailchimp&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_MC_SETT'); ?></li></a><a href="?page=cm_form_sett_access_control&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_ACTRL_SETT'); ?></li></a><a href="?page=cm_form_sett_aweber&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_AWEBER_OPTION'); ?></li></a><a href="?page=cm_form_sett_ccontact&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_CONSTANT_CONTACT_OPTION'); ?></li></a><a href="?page=cm_field_manage&cm_form_id=<?php echo $entry->form_id; ?>"><li><?php echo CM_UI_Strings::get('LABEL_F_FIELDS'); ?></li></a></ul></div>
                </div>
                <?php
            } else
            echo "<h4>" . CM_UI_Strings::get('LABEL_NO_FORMS') . "</h4>";
        ?>
    </div>
    <?php if ($data->total_pages > 1): ?>
        <ul class="cmpagination">
            <?php if ($data->curr_page > 1): ?>
                <li><a href="?page=<?php echo $data->cm_slug ?>&cm_reqpage=<?php echo $data->curr_page - 1;
        if ($data->sort_by) echo'&cm_sortby=' . $data->sort_by;if (!$data->descending) echo'&cm_descending=' . $data->descending; ?>">«</a></li>
                <?php
            endif;
            for ($i = 1; $i <= $data->total_pages; $i++):
                if ($i != $data->curr_page):
                    ?>
                    <li><a href="?page=<?php echo $data->cm_slug ?>&cm_reqpage=<?php echo $i;
            if ($data->sort_by) echo'&cm_sortby=' . $data->sort_by;if (!$data->descending) echo'&cm_descending=' . $data->descending; ?>"><?php echo $i; ?></a></li>
                <?php else:
                    ?>
                    <li><a class="active" href="?page=<?php echo $data->cm_slug ?>&cm_reqpage=<?php echo $i;
            if ($data->sort_by) echo'&cm_sortby=' . $data->sort_by;if (!$data->descending) echo'&cm_descending=' . $data->descending; ?>"><?php echo $i; ?></a></li> <?php
                endif;
            endfor;
            ?>
            <?php if ($data->curr_page < $data->total_pages): ?>
                <li><a href="?page=<?php echo $data->cm_slug ?>&cm_reqpage=<?php echo $data->curr_page + 1;
        if ($data->sort_by) echo'&cm_sortby=' . $data->sort_by;if (!$data->descending) echo'&cm_descending=' . $data->descending; ?>">»</a></li>
            <?php endif;
        ?>
        </ul>
   
<?php endif;
   
?>
        <div id="cm_embed_code_dialog" style="display:none"><textarea readonly="readonly" id="cm_embed_code" onclick="jQuery(this).focus().select()"></textarea><img class="cm-close" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/close-cm.png'; ?>" onclick="jQuery('#cm_embed_code_dialog').fadeOut()"></div>
        
</div>
 <div class="cm-side-banner" style="display:none">

            <div class="cm-sidebaner-section-title dbfl"><img src="<?php echo CM_IMG_URL; ?>icon.png"><span>Want More?</span></div>

            <div class="cm-sidebanner-image">
                <img src="<?php echo CM_IMG_URL; ?>Layer 1.png" />
            </div>

            <div class="sidebanner-content-wrapper">
                <div class="sidebanner-text-content">
                    <p>While Standard Edition is pretty powerful system in its own right, there's a lot more waiting for you! GorillaForms's Silver, Gold and Platinum upgrades are crammed to the top with features, great new options and comes with top class support. It takes less than <b>5 minutes</b> to upgrade and all your stuff is <b>transferred automatically</b></p>			
                </div>
                <div class="cm-sidebanner-buttons">
                    <div class="cm-sidebanner-button silver">
                        <a href="https://registrationmagic.com/?download_id=317&edd_action=add_to_cart">GET SILVER</a>				
                    </div>

                    <div class="cm-sidebanner-button gold">
                        <a href="https://registrationmagic.com/?download_id=19544&edd_action=add_to_cart">GET GOLD</a>
                    </div>
                    <div class="cm-sidebanner-button platinum">
                        <a href="https://registrationmagic.com/?download_id=22865&edd_action=add_to_cart">GET PLATINUM</a>
                    </div>
                </div>

                <div class="cm-sidebanner-compare">

                    <div class="cm-sidebanner-compare-l">
                        <a href="https://registrationmagic.com/comparison/">Compare</a>
                    </div>

                    <div class="cm-sidebanner-compare-r">
                        <a href="https://registrationmagic.com/help-support/">Questions?</a>				
                    </div>			

                </div>

                <div class="cm-sidebanner-icons">
                    <img src="<?php echo CM_IMG_URL; ?>icon-pack.png">
                </div>

            </div> <!-- sidebanner-content-wrapper -->
        </div>
  <pre class="cm-pre-wrapper-for-script-tags"><script type="text/javascript">
   
   jQuery(document).ready(function(){
       //Configure joyride
       //If autostart is false, call again "jQuery("#cm-form-man-joytips").joyride()" to start the tour.
       <?php if($data->autostart_tour): ?>
       jQuery("#cm-form-man-joytips").joyride({tipLocation: 'top',
                                               autoStart: true,
                                               postRideCallback: cm_joyride_tour_taken});
        <?php else: ?>
            jQuery("#cm-form-man-joytips").joyride({tipLocation: 'top',
                                               autoStart: false,
                                               postRideCallback: cm_joyride_tour_taken});
        <?php endif; ?>
    });
   
   function cm_start_joyride(){
       jQuery("#cm-form-man-joytips").joyride();
    }
    
    function cm_joyride_tour_taken(){
        var data = {
			'action': 'joyride_tour_update',
			'tour_id': 'form_manager_tour',
                        'state': 'taken'
		};

        jQuery.post(ajaxurl, data, function(response) {});
    }
       
    function cm_open_dial(form_id){
        jQuery('textarea#cm_embed_code').html('<?php echo CM_UI_Strings::get('MSG_BUY_PRO_GOLD_EMBED'); ?>');
        jQuery('#cm_embed_code_dialog').fadeIn(100);
    }
    jQuery(document).mouseup(function (e) {
        var container = jQuery("#cm_embed_code_dialog,.cm_form_card_settings_dialog");
        if (!container.is(e.target) // if the target of the click isn't the container... 
                && container.has(e.target).length === 0) // ... nor a descendant of the container 
        {
            container.hide();
        }
    });
    
    
    function cm_show_form_sett_dialog(form_id){
        jQuery("#cm_settings_dailog_"+form_id).show();
    }
      
jQuery("#cm_rateit_banner").bind('rated', function (event, value) { 
        if(value<=3)
        {
            
             jQuery("#cm-rate-popup-wrap").fadeOut();  
             jQuery("#wordpress_review").fadeOut(100);  
             jQuery("#feedback_message").fadeIn(100);  
             jQuery('#feedback_message').removeClass('cm-blur');
             jQuery('#feedback_message').addClass('cm-hop');
             cm_handle_review_banner_click('rating',value);
        }
        else
        {
             jQuery("#cm-rate-popup-wrap").fadeOut();  
             jQuery("#feedback_message").fadeOut();  
             jQuery("#wordpress_review").fadeIn(100);
             jQuery('#wordpress_review').removeClass('cm-blur');
             jQuery('#wordpress_review').addClass('cm-hop');
             cm_handle_review_banner_click('rating',value);
        }
    
    
    });
    
    function cm_copy_to_clipboard(target) {

        var text_to_copy = jQuery(target).text();

        var tmp = jQuery("<input id='fd_frontsub_shortcode_input' readonly>");
        var target_html = jQuery(target).html();
        jQuery(target).html('');
        jQuery(target).append(tmp);
        tmp.val(text_to_copy).select();
        var result = document.execCommand("copy");

        if (result != false) {
            jQuery(target).html(target_html);
            jQuery("#cm_msg_copied_to_clipboard").fadeIn('fast',
            function(){jQuery("#cm_msg_copied_to_clipboard").fadeOut(1200);});
        } else {
            jQuery(document).mouseup(function (e) {            
                var container = jQuery("#fd_frontsub_shortcode_input");
                if (!container.is(e.target) // if the target of the click isn't the container... 
                        && container.has(e.target).length === 0) // ... nor a descendant of the container 
                {
                    jQuery(target).html(target_html);
                }            
            });
        }
    }

  </script></pre>




