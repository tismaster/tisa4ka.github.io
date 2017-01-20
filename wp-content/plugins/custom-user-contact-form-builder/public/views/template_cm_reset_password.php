<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$form = new CM_PFBC_Form("cm_reset_pass_form");
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery", "focus"),
    "action" => ""
));


$form->addElement(new CM_Element_Hidden("cm_slug", "cm_front_reset_pass_page"));
$form->addElement(new CM_Element_Password("<b>" . CM_UI_Strings::get('LABEL_OLD_PASS') . ":</b>", "old_pass", array('required' => true, 'id' => 'cm_old_pass_field')));
$form->addElement(new CM_Element_HTML('<label class="cm-form-field-invalid-msg" id="old_pass_error" style="display:none"></label>'));
$form->addElement(new CM_Element_Password("<b>" . CM_UI_Strings::get('LABEL_NEW_PASS') . ":</b>", "new_pass", array('required' => true, 'id' => 'cm_new_pass_field')));
$form->addElement(new CM_Element_HTML('<label class="cm-form-field-invalid-msg" id="new_pass_error" style="display:none"></label>'));
$form->addElement(new CM_Element_Password("<b>" . CM_UI_Strings::get('LABEL_NEW_PASS_AGAIN') . ":</b>", "new_pass_repeat", array('required' => true, 'id' => 'cm_repeat_pass_field')));
$form->addElement(new CM_Element_HTML('<label class="cm-form-field-invalid-msg" id="repeat_pass_error" style="display:none"></label>'));
/*
 * Checking if recpatcha is enabled
 */
if(get_option('cm_option_enable_captcha')=="yes")
    $form->addElement(new CM_Element_Captcha());

$form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_RESET_PASS'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn cm_login_btn", "name" => "submit", "onclick" => "cm_validate(event)")));

/*
 * Render the form if user is not logged in
 */
?>
<div class='cmagic'>
	<div class='cmcontent'>
<?php

    $form->render();
?>
            <pre class="cm-pre-wrapper-for-script-tags"><script type="text/javascript">
                function cm_validate(e){
                    var old_pass = jQuery('#cm_old_pass_field').val().toString().trim();
                    var new_pass = jQuery('#cm_new_pass_field').val().toString().trim();
                    var repeat_pass = jQuery('#cm_repeat_pass_field').val().toString().trim();
                    
                    if(old_pass === "" || !old_pass){
                        jQuery('#old_pass_error').html('This field is required.');
                        jQuery('#old_pass_error').show();
                    }
                    if(new_pass === "" || !new_pass){
                        jQuery('#new_pass_error').html('This field is required.');
                        jQuery('#new_pass_error').show();
                    }
                    if(repeat_pass === "" || !repeat_pass){
                        jQuery('#repeat_pass_error').html('This field is required.');
                        jQuery('#repeat_pass_error').show();
                    }
                    if(jQuery('#cm_new_pass_field').val() !== jQuery('#cm_repeat_pass_field').val()){
                        jQuery('#new_pass_error, #repeat_pass_error').html('password does not match.');
                        jQuery('#new_pass_error, #repeat_pass_error').show();
                        e.preventDefault();
                    }
                }
            </script></pre>
	</div>
</div>