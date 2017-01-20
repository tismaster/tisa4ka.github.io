<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">


        <?php
        $form = new CM_PFBC_Form("form_sett_limits");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));
        
        if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . CM_UI_Strings::get('LABEL_F_LIM_SETT') . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }

        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_AUTO_EXPIRE') . ":</b>", "form_should_auto_expire", array(1 => ""), array("id" => "cm_", "class" => "cm_a", "value" => $data->model->form_should_auto_expire, "onclick" => "cm_hide_show(this);", "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXPIRE'))));
        if ($data->model->form_should_auto_expire == '1')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_a_childfieldsrow" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_a_childfieldsrow" style="display:none">'));

        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_EXPIRY') . ":</b>", "form_expired_by", array('submissions' => 'By Submissions', 'date' => 'By Date', 'both' => 'Set Both (Whichever is earlier)'), array("id" => "cm_", "value" => $data->model->form_options->form_expired_by, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_EXPIRE_BY'))));
        $form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_SUB_LIMIT') . ":</b>", "form_submissions_limit", array("id" => "cm_form_name", "value" => $data->model->form_options->form_submissions_limit, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXP_SUB_LIMIT'))));
        $form->addElement(new CM_Element_jQueryUIDate("<b>" . CM_UI_Strings::get('LABEL_EXPIRY_DATE') . ":</b>", 'form_expiry_date', array('class' => 'cm_dateelement', "value" => $data->model->form_options->form_expiry_date, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXP_TIME_LIMIT'))));
        
        ////////POST EXP SWITCH
        $post_exp_action = $data->model->form_options->post_expiry_action ? $data->model->form_options->post_expiry_action : 'display_message';
        
        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_POST_EXP_ACTION') . ":</b>", "post_expiry_action", array('display_message' => CM_UI_Strings::get('LABEL_DISPLAY_MSG'), 'switch_to_another_form' => CM_UI_Strings::get('LABEL_SWITCH_FORM')), array("value" => $post_exp_action, 'onclick' => 'handle_post_exp_action_change(this)', "longDesc" => CM_UI_Strings::get('HELP_POST_EXP_ACTION'))));
        
        if ($post_exp_action == 'display_message')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_post_exp_msg" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_post_exp_msg" style="display:none">'));
        
        $exp_msg = isset($data->model->form_options->form_message_after_expiry)?$data->model->form_options->form_message_after_expiry:'';
        $form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_EXPIRY_MSG') . ":</b>", "form_message_after_expiry", array("class" => "cm_form_description",  "value" => $exp_msg,  "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXP_MSG'))));
        $form->addElement(new CM_Element_HTML('</div>'));
        if ($post_exp_action == 'switch_to_another_form')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_post_exp_form" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_post_exp_form" style="display:none">'));
        
        //Remove current form from the list of selectable forms.
        $selectable_forms = $data->form_dropdown;
        if(isset($selectable_forms[$data->model->form_id]))
            unset($selectable_forms[$data->model->form_id]);
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_SELECT_FORM') . ":</b>", "post_expiry_form_id", $selectable_forms, array("class" => "cm_form_description",  "value" => $data->model->form_options->post_expiry_form_id,  "longDesc" => CM_UI_Strings::get('HELP_POST_EXP_FORM'))));
        $form->addElement(new CM_Element_HTML('</div>'));
        ////////////////////////
        $form->addElement(new CM_Element_HTML('</div>'));
        
        $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_form_sett_manage&cm_form_id='.$data->model->form_id, array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "submit", "onClick" => "jQuery.cm_prevent_field_add(event,'This is a required field.')")));
        $form->render();
        ?>
    </div>
    
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>

<pre class='cm-pre-wrapper-for-script-tags'><script>
    
function handle_post_exp_action_change(x){
    var type = jQuery(x).val();
    
    if(type == 'display_message'){
        jQuery('#cm_post_exp_form').hide();
        jQuery('#cm_post_exp_msg').show();
        jQuery('#cm_post_exp_msg :input').attr('disabled',false);
        jQuery('#cm_post_exp_form :input').attr('disabled',true);
    }else if(type == 'switch_to_another_form'){
        jQuery('#cm_post_exp_msg').hide();
        jQuery('#cm_post_exp_form').show();
        jQuery('#cm_post_exp_form :input').attr('disabled',false);
        jQuery('#cm_post_exp_msg :input').attr('disabled',true);
    }
}
</script></pre>


<?php


