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
        
        
        $form = new CM_PFBC_Form("form_sett_aweber");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));
 if (isset($data->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . CM_UI_Strings::get('LABEL_AWEBER_OPTION') . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }
        $form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_AWEBER_OPTION'), "enable_aweber", array(1 => ""),array("id" => "id_cm_enable_aw_cb", "class" => "id_cm_enable_aw_cb" ,"disabled" => "disabled",  "value" => "",   "longDesc" => CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
        //var_dump($data->model->form_options->enable_aweber);
      
        $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="id_cm_enable_aw_cb_childfieldsrow" >'));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_AW_LIST') . ":</b>", "aw_list", array(0=>"Aweber list"), array("id" => "aw_list","disabled" => "disabled",  "value" => "", "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AW_LIST'))));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_EMAIL') . ":</b>", "email",array(0=>"Email"), array("id" => "email", "disabled" => "disabled",  "value" => "", "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_FIELD'))));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('FIRST_NAME') . ":</b>", "first_name",array(0=>"First name"), array("id" => "first_name","disabled" => "disabled",  "value" => "" , "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_FIELD'))));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LAST_NAME') . ":</b>", "last_name",array(0=>"Last name"), array("id" => "last_name", "disabled" => "disabled",  "value" => "", "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_FIELD'))));
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_OPT_IN_CB') . ":</b>", "form_is_opt_in_checkbox_aw", array(1 => ""), array("id" => "cm_", "class" => "cm_op", "onclick" => "cm_hide_show(this);","disabled" => "disabled",  "value" => "", "longDesc" => CM_UI_Strings::get('HELP_OPT_IN_CB_AW'))));
        $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_op_childfieldsrow" >'));
        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_OPT_IN_CB_TEXT') . ":</b>", "form_opt_in_text_aw", array("id" => "cm_form_name","disabled" => "disabled",  "value" => "", "longDesc" => CM_UI_Strings::get('HELP_OPT_IN_CB_TEXT'))));
        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_DEFAULT_STATE') . "</b>", "Default State", array('Checked'=>CM_UI_Strings::get('LABEL_CHECKED'),'Unchecked'=>CM_UI_Strings::get('LABEL_UNCHECKED')), array("id"=>"id_cm_default_state","disabled" => "disabled",  "value" => "", "longDesc" => CM_UI_Strings::get('MSG_OPT_IN_DEFAULT_STATE'))));
       
        $form->addElement(new CM_Element_HTML('</div>'));
        $form->addElement(new CM_Element_HTML('</div>'));
        $form->addElement (new CM_Element_HTMLL ('&#8592; &nbsp; Cancel', '?page=cm_form_sett_manage&cm_form_id='.$data->form_id, array('class' => 'cancel')));
       
     
        $form->render();
        ?>
    </div>
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>

<?php
