<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data);die;
?>

<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">


        <?php
        $form = new CM_PFBC_Form("form_sett_general");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));
        
        
        
        


        if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . CM_UI_Strings::get('LABEL_F_GLOBAL_OVERRIDE_SETT') . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }
        $form->addElement(new CM_Element_HTML('<div class="cmnotice cm-invite-field-row"><b>' . CM_UI_Strings::get("GLOBAL_OVERRIDES_NOTE") . '</b></div>     
'));
         $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_SHOW_PROG_BAR') . ":</b>", "display_progress_bar", array('yes'=>CM_UI_Strings::get('LABEL_YES'),'no'=>CM_UI_Strings::get('LABEL_NO'),'default'=>CM_UI_Strings::get('LABEL_DEFAULT')), array("id"=>"id_form_actrl_date_type","class"=>"cm_deactivated","readonly"=>"readonly","disabled"=>"disabled", "longDesc" => CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
       $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_ENABLE_CAPTCHA') . "</b>", "enable_captcha", array('no'=>CM_UI_Strings::get('LABEL_NO'),'default'=>CM_UI_Strings::get('LABEL_DEFAULT')), array("id"=>"id_cm_enable_captcha_cb","value" => "","class"=>"cm_deactivated","readonly"=>"readonly","disabled"=>"disabled", "longDesc" => CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
        $form->addElement(new CM_Element_Number(CM_UI_Strings::get('LABEL_SUB_LIMIT_ANTISPAM'), "sub_limit_antispam", array("value" => "","class"=>"cm_deactivated","readonly"=>"readonly","disabled"=>"disabled", "step" => 1, "min" => 0, "longDesc" => CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
      
        if(!isset($data->model->form_id))
        $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', 'javascript:void(0)', array('class' => 'cancel', 'onClick' => 'window.history.back();')));
        else
            $form->addElement (new CM_Element_HTMLL ('&#8592; &nbsp; Cancel', '?page=cm_form_sett_manage&cm_form_id='.$data->model->form_id, array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "submit", "onClick" => "jQuery.cm_prevent_field_add(event,'This is a required field.')")));
        $form->render();
        ?>
    </div>
</div>

<?php
