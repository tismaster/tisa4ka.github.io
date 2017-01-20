
<?php
//echo "<pre>",var_dump($data),"</pre>";
?>

<div class="cmagic">
        
<!-----Operationsbar Starts-->
    
    <div class="operationsbar">
        <div class="cmtitle"><?php echo CM_UI_Strings::get('TITLE_INVITES'); ?></div>
        <div class="icons">
        <a href="<?php echo get_admin_url()."admin.php?page=cm_options_autoresponder";?>"><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . "images/cm-email-notifications.png"; ?>">
        </a></div>
        <div class="nav">
        <ul>
            <!-- <li><a href="arrow.png">New</a></li> -->
            <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
              <li><a href="?page=cm_invitations_manage&cm_queues=true">Active Queues</a></li>
              <li><a href="?page=cm_sent_emails_manage">Sent Emails</a></li>
              <?php if (count($data->forms) !== 0): ?>
            <li class="cm-form-toggle"><?php echo CM_UI_Strings::get('LABEL_SELECT_RESIPIENTS'); ?>
            	<select id="cm_form_dropdown" name="cm_form_id" onchange="cm_load_page(this, 'invitations_manage')">
<?php                               
					foreach ($data->forms as $form_id => $form)
					   if($data->current_form_id == $form_id)
					       echo "<option value=$form_id selected>$form</option>";
					   else
					       echo "<option value=$form_id>$form</option>";
?>
	            </select>

            </li>
            <?php endif; ?>
            </ul>
        </div>
        
        </div>
<!--------Operationsbar Ends-->


<!-------Contentarea Starts-->
<?php
	if($data->queue_view):
           
            if (count($data->forms) == 0):
                ?>
                
                <div class="cmnotice" style="min-height: 45px;"><?php echo CM_UI_Strings::get('MSG_NO_FORMS_FUNNY'); ?></div>
                
                <?php
                return;
            endif;

		if($data->queue_count > 0):
			foreach($data->queues as $queue):
?>
        <div class="cm-invites">
        <div class="cm-invite-field-row">
        <div class="cm-invite-icon"><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . "images/cm-hourglass.png"; ?>"></div>
        <div class="cm-invite-label"><?php echo $data->forms[$queue->form_id];?></div>
        <div class="cm-invite-label"><?php echo CM_UI_Strings::get('LABEL_QUEUE_IN_PROGRESS');?></div>
        <div class="cm-invite-label"><span class="cm-red"><?php echo $queue->offset."/".$queue->total." ".CM_UI_Strings::get('LABEL_SENT');?></span></div>
        <div class="cm-invite-label"><?php echo CM_UI_Strings::get('LABEL_STARTED_ON')." ".$queue->started_on;?></div>    
        <div class="cm-invite-label cm-invite-cancel" data-fid="<?php echo $queue->form_id;?>" onclick="stop_queue(this)"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_CANCEL');?></a></div>
        </div>
            <!-- <div class="cm-invite-field-row"><?php echo CM_UI_Strings::get('MSG_QUEUE_RUNNING');?></div> -->
        
        </div>
<?php
			endforeach;
		else:
?>
		<div class="cm-invites">
        <div class="cm-invite-field-row">        
            <div class="cmnotice cm-invite-field-row"><?php echo CM_UI_Strings::get('ERROR_INVITE_NO_QUEUE');?></div>        
        </div>
<?php
		endif;

	elseif(isset( $data->no_mail_error) &&  $data->no_mail_error):
?>	
	<div class="cm-invites">
        <div class="cm-invite-field-row">        
            <div class="cmnotice cm-invite-field-row"><?php echo CM_UI_Strings::get('ERROR_INVITE_NO_MAIL');?></div>        
        </div>
<?php
	elseif($data->job->is_job_running):
?>
        <div class="cm-invites">
        <div class="cm-invite-field-row">
        <div class="cm-invite-icon"><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . "images/cm-hourglass.png"; ?>"></div>
        <div class="cm-invite-label"><?php echo $data->forms[$data->current_form_id];?></div>
        <div class="cm-invite-label"><?php echo CM_UI_Strings::get('LABEL_QUEUE_IN_PROGRESS');?></div>
        <div class="cm-invite-label"><span class="cm-red"><?php echo $data->job->offset."/".$data->job->total." ".CM_UI_Strings::get('LABEL_SENT');?></span></div>
        <div class="cm-invite-label"><?php echo CM_UI_Strings::get('LABEL_STARTED_ON')." ".$data->job->started_on;?></div>    
        <div class="cm-invite-label cm-invite-cancel" data-fid="<?php echo $data->current_form_id;?>" onclick="stop_queue(this)"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_CANCEL');?></a></div>
            </div>
            <div class="cm-invite-field-row"><?php echo CM_UI_Strings::get('MSG_QUEUE_RUNNING');?></div>
        
        </div>
<?php
	else:

		$form = new CM_PFBC_Form("invitation_mail_content");

		$form->configure(array(
		            "prevent" => array("bootstrap", "jQuery"),
		            "action" => ""
		        ));


		//$form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_invitations_manage', array('class' => 'cancel')));
		$form->addElement(new CM_Element_Textbox("Subject", "cm_mail_subject", array("required" => 1, "longDesc"=>CM_UI_Strings::get('HELP_OPTIONS_INVITES_SUB'))));
		$form->addElement(new CM_Element_TinyMCEWP("Body","","cm_mail_body", array('editor_class' => 'cm_TinyMCE_mail_body', 'editor_height' => '300px'), array("required"=>1, "longDesc"=>CM_UI_Strings::get('HELP_OPTIONS_INVITES_BODY'))));
		$form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SEND')));
                
                
              
?>
		<?php
            if (count($data->forms) == 0):
                ?>
                <div class="cmnotice" style="min-height: 45px;"><?php echo CM_UI_Strings::get('MSG_NO_FORMS_FUNNY'); ?></div>

    <?php
    return;
endif;
?>
                    
            <div class="cmnotice cm-invite-field-row"><?php echo sprintf(CM_UI_Strings::get('INFO_USERS_SELECTED_FOR_MAIL'), $data->total_resp);?> <b> <?php echo $data->forms[$data->current_form_id];?></b></div>     
            
            <div class="cm-invites">
<?php
		$form->render();
?>   
        </div>
        
        <!--
<div class="cm-invites">
    <div class="cm-invite-field-row">
        <div class="cm-invite-label">Subject</div>
        <div class="cm-invite-value"><input type=text class="cm-invite-subject"></div></div>
    
    <div class="cm-invite-field-row">
        <div class="cm-invite-label">Body</div>
    <div class="cm-invite-value"><Textarea></Textarea></div></div>
    
    <div class="cm-buttonarea">
        <div class="cancel">Cancel</div>
        <input type="submit" value="Send">
    
    </div>
    
</div>
-->
<?php
	endif;
?> 
   <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
    </div>
  
<pre class='cm-pre-wrapper-for-script-tags'><script>

function stop_queue(element){
    
    var je = jQuery(element);
    
    var form_id = je.data('fid');
    
    var data = {
                    'action': 'remove_queue',
                    'form_id': form_id
		};

		
        jQuery.post(ajaxurl, data, function(response) {
            location.reload();
		});
}

</script></pre>
