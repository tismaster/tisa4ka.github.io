<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="cmagic">
    <?php 
    ?>
    <!-----Operations bar Starts----->

    <div class="operationsbar">
        <div class="cmtitle"><?php echo CM_UI_Strings::get('LABEL_EMAIL_TO').': '. $data->email->to; ?></div>
        <div class="icons">
            <a href="?page=cm_options_manage"><img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/global-settings.png'; ?>"></a>

        </div>
        <div class="nav">
            <ul>
                <?php if($data->search_state) {?>
                <li><a href="?page=cm_sent_emails_manage&<?php echo $data->search_state; ?>"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
                <?php } else { ?>
                <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
                <?php } ?>
                
<!--                <li onclick="jQuery.cm_do_action('cm_view_submission_page_form', 'cm_submission_print_pdf')"><a href="javascript:void(0)"><?php // echo CM_UI_Strings::get("LABEL_PRINT"); ?></a></li>-->
                <?php if($data->search_state) {?>
                <li><a href="?page=cm_sent_emails_view&<?php echo $data->search_state; ?>&cm_sent_email_id=<?php echo $data->email->mail_id; ?>&cm_action=delete"><?php echo CM_UI_Strings::get("LABEL_DELETE"); ?></a></li>
                <?php } else { ?>
                <li><a href="?page=cm_sent_emails_view&cm_sent_email_id=<?php echo $data->email->mail_id; ?>&cm_action=delete"><?php echo CM_UI_Strings::get("LABEL_DELETE"); ?></a></li>
                <?php } ?>
              <?php
              $user_email=$data->email->to;
              /*
              if($data->submission->is_blocked_email($user_email)){
              ?>
                <li><a href="?page=cm_submission_view&cm_user_email=<?php echo $data->email->to; ?>&cm_submission_id=<?php echo $data->mail->mail_id(); ?>&cm_action=unblock_email"><?php echo CM_UI_Strings::get("LABEL_UNBLOCK_EMAIL"); ?></a></li>
              <?php }
              else
              {
                   ?>
                <li><a href="?page=cm_submission_view&cm_user_email=<?php echo $data->email->to; ?>&cm_submission_id=<?php echo $data->email->mail_id(); ?>&cm_action=block_email"><?php echo CM_UI_Strings::get("LABEL_BLOCK_EMAIL"); ?></a></li>
              <?php }
             
              */
              ?>
               
               <?php /* if($data->related > 0){ ?>
               <li><a href="?page=cm_submission_related&cm_user_email=<?php echo $data->email->to; ?>"><?php echo CM_UI_Strings::get("LABEL_RELATED").' ('.$data->related.')'; ?></a></li>
               <?php
               } 
               else 
               {?>
                <li><a><?php echo CM_UI_Strings::get("LABEL_RELATED").' (0)'; ?></a></li>
               <?php } */?>
            </ul>
        </div>

    </div>
    <!--****Operations bar Ends**-->

    <!--**Content area Starts**-->
    <div class="cm-submission">        

        <form method="post" action="" name="cm_view_submission" id="cm_view_submission_page_form">
            <input type="hidden" name="cm_slug" value="" id="cm_slug_input_field">

            <div class="cm-submission-field-row">
                <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_EMAIL_SENT_ON'); ?></div>
                <div class="cm-submission-value"><?php echo $data->email->sent_on; ?></div>
            </div>

            <div class="cm-submission-field-row">
                <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_EMAIL_SUB'); ?></div>
                <div class="cm-submission-value"><?php echo htmlspecialchars_decode($data->email->sub); ?></div>
            </div>
            
            <div class="cm-submission-field-row">
                <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_EMAIL_BODY'); ?></div>
                <div class="cm-submission-value"><?php echo htmlspecialchars_decode($data->email->body); ?></div>
            </div>
            
        </form>
    </div>  
    <?php     
    $cm_promo_banner_title = "Unlock Note,Print,Block Email/IP and Send Message options, by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
    
    
</div>
