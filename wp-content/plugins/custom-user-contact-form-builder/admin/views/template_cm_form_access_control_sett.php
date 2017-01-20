<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$date_cb_value = 1;
$pass_cb_value = 1;
$role_cb_value = 1;
$date_question = CM_UI_Strings::get('LABEL_ACTRL_DATE_QUESTION_DEF');
$pass_question = CM_UI_Strings::get('LABEL_ACTRL_PASS_QUESTION_DEF');
$fail_msg = CM_UI_Strings::get('LABEL_ACTRL_FAIL_MSG_DEF');
$date_ll = '';
$date_ul = '';
$diff_ll = 18;
$diff_ul = 45;

$date_type = "diff";

$passphrase = null;

$roles = array('administrator', 'editor', 'author');
?>

<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">


        <?php
        $form = new CM_PFBC_Form("form_sett_access_control");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));
        
        if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . CM_UI_Strings::get('LABEL_F_ACTRL_SETT') . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }
        
        //Date based restrictions.
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_ACTRL_DATE_CB') . ":</b>", "form_actrl_date_cb", array(1=>''), array("id" => "id_form_actrl_date_cb", "value" => $date_cb_value, "onclick" => "actrl_date_click_handler()", "disabled"=>1,"longDesc" => CM_UI_Strings::get('HELP_FORM_ACTRL_DATE').CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
        
        
        //border is inlined to prevent jumpy animation.
        //Wonderful hack from: http://stackoverflow.com/questions/1335461/jquery-slide-is-jumpy
        if($date_cb_value)
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_date_container' class='childfieldsrow' style='border: 1px solid transparent'>"));
        } 
        else
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_date_container' class='childfieldsrow' style='display:none;border: 1px solid transparent;'>"));
        }
        
        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_ACTRL_DATE_QUESTION') . ":</b>", "form_actrl_date_question", array("value" => $date_question, "disabled"=>1,"required"=>"required" ,"longDesc" => CM_UI_Strings::get('HELP_FORM_ACTRL_DATE_QSTN'))));
        
        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_ACTRL_DATE_TYPE') . ":</b>", "form_actrl_date_type", array('diff'=>CM_UI_Strings::get('LABEL_ACTRL_DATE_TYPE_DIFF'),'date'=>CM_UI_Strings::get('LABEL_ACTRL_DATE_TYPE_DATE')), array("id"=>"id_form_actrl_date_type","value" => $date_type, 'onclick' => 'handle_date_type_change(this)', "disabled"=>1, "longDesc" => CM_UI_Strings::get('HELP_FORM_ACTRL_DATE_TYPE'))));
        $form->addElement(new CM_Element_HTML('<div class="cmrow" id="cm_jqnotice_row_date_type" style="display:none;padding: 0px 20px 0px 20px;min-height: 0px;"><div class="cmfield" for="cm_field_value_options_textarea"><label></label></div><div class="cminput" id="cm_jqnotice_text">'.CM_UI_Strings::get('MSG_INVALID_ACTRL_DATE_TYPE').'</div></div>'));
        if($date_type === 'date')
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_date_type_1_container' style='border: 1px solid transparent'>"));
        } 
        else
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_date_type_1_container' style='display:none;border: 1px solid transparent;'>"));
        }
        $form->addElement(new CM_Element_jQueryUIDate("<b>" . CM_UI_Strings::get('LABEL_ACTRL_DATE_LLIMIT') . ":</b>", "form_actrl_date_ll_date", array("value" => $date_ll, "disabled"=>1, "id" => "form_actrl_date_ll_date","longDesc" => '')));
        
        $form->addElement(new CM_Element_jQueryUIDate("<b>" . CM_UI_Strings::get('LABEL_ACTRL_DATE_ULIMIT') . ":</b>", "form_actrl_date_ul_date", array("value" => $date_ul, "disabled"=>1,"id" => "form_actrl_date_ul_date", "longDesc" => '')));
         $form->addElement(new CM_Element_HTML("<div id='date_error' style='display:none' align='center'>"));
          $form->addElement(new CM_Element_HTML("</div>"));
        
        
        $form->addElement(new CM_Element_HTML("</div>"));
         if($date_type === 'diff')
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_date_type_2_container' style='border: 1px solid transparent'>"));
        } 
        else
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_date_type_2_container' style='display:none;border: 1px solid transparent;'>"));
        }
        $form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_ACTRL_DATE_LLIMIT') . ":</b>", "form_actrl_date_ll_diff", array("value" => $diff_ll, "disabled"=>1, "id" => "form_actrl_date_ll_diff","longDesc" => '')));
        
        $form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_ACTRL_DATE_ULIMIT') . ":</b>", "form_actrl_date_ul_diff", array("value" => $diff_ul, "disabled"=>1,  "id" => "form_actrl_date_ul_diff","longDesc" => '')));
        $form->addElement(new CM_Element_HTML("</div>"));
        $form->addElement(new CM_Element_HTML("<div id='date_limit_error' style='display:none' align='center'>"));
          $form->addElement(new CM_Element_HTML("</div>"));
        $form->addElement(new CM_Element_HTML('<div class="cmrow" id="cm_jqnotice_row_date_limit" style="display:none;padding: 0px 20px 0px 20px;min-height: 0px;"><div class="cmfield" for="cm_field_value_options_textarea"><label></label></div><div class="cminput" id="cm_jqnotice_text">'.CM_UI_Strings::get('MSG_INVALID_ACTRL_DATE_LIMIT').'</div></div>'));
        
        $form->addElement(new CM_Element_HTML("</div>"));
        
        
        //Passphrase based restrictions
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_ACTRL_PASS_CB') . ":</b>", "form_actrl_pass_cb", array(1=>''), array("id" => "id_form_actrl_pass_cb", "value" => $pass_cb_value, "onclick" => "actrl_pass_click_handler()", "disabled"=>1, "longDesc" => CM_UI_Strings::get('HELP_FORM_ACTRL_PASS').CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
        
        if($pass_cb_value)
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_pass_container' class='childfieldsrow' style='border: 1px solid transparent;'>"));
        } 
        else
        {
            $form->addElement(new CM_Element_HTML("<div id='form_actrl_pass_container' class='childfieldsrow' style='display:none;border: 1px solid transparent;'>"));
        }
        
        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_ACTRL_PASS_QUESTION') . ":</b>", "form_actrl_pass_question", array("value" => $pass_question, "disabled"=>1, "longDesc" => CM_UI_Strings::get('HELP_FORM_ACTRL_PASS_QSTN'))));
        
        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_ACTRL_PASS_PASS') . ":</b>", "form_actrl_pass_passphrase", array("value" => $passphrase, "disabled"=>1, "longDesc" => CM_UI_Strings::get('HELP_FORM_ACTRL_PASS_PASS'))));
        $form->addElement(new CM_Element_HTML('<div class="cmrow" id="cm_jqnotice_row_pass_pass" style="display:none;padding: 0px 20px 0px 20px;min-height: 0px;"><div class="cmfield" for="cm_field_value_options_textarea"><label></label></div><div class="cminput" id="cm_jqnotice_text">'.CM_UI_Strings::get('MSG_INVALID_ACTRL_PASS_PASS').'</div></div>'));
        $form->addElement(new CM_Element_HTML("</div>"));               

        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_ACTRL_FAIL_MSG') . ":</b>", "form_actrl_fail_msg", array("value" => $fail_msg, "disabled"=>1, "longDesc" => CM_UI_Strings::get('HELP_FORM_ACTRL_FAIL_MSG'))));
        
        $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_form_sett_manage&cm_form_id='.$data->form_id, array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "disabled"=>1, "name" => "submit", "style"=>"opacity:0.25")));
        $form->render();
        ?>
    </div>
    
    <?php 
    $cm_promo_banner_title = "Unlock powerful access control and more by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>

</div>

<pre class='cm-pre-wrapper-for-script-tags'><script>
    

</script></pre>

<?php

