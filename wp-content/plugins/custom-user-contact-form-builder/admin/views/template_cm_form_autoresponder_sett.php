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
        $form = new CM_PFBC_Form("form_sett_autoresponder");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));

        if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . CM_UI_Strings::get('LABEL_F_AUTO_RESP_SETT') . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }

        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_AUTO_REPLY') . ":</b>", "form_should_send_email", array(1 => ""), array("id" => "cm_ss", "onclick" => "cm_toggle(    this, 'cm_auto_reply')", "class" => "cm_ss", "onclick" => "cm_hide_show(this);", "value" => $data->model->form_should_send_email, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_RESPONDER'))));

        if ($data->model->form_should_send_email == '1')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_ss_childfieldsrow" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_ss_childfieldsrow" style="display:none">'));

        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_AR_EMAIL_SUBJECT') . ":</b>", "form_email_subject", array("id" => "cm_form_name", "value" => $data->model->form_options->form_email_subject, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_RESP_SUB'))));

        $form->addElement(new CM_Element_TinyMCEWP("<b>" . CM_UI_Strings::get('LABEL_AR_EMAIL_BODY') . ":</b>(Mail Merge and HTML Supported):", $data->model->form_options->form_email_content, "form_email_content", array('editor_class' => 'cm_TinydMCE', 'editor_height' => '100px'), array("longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_RESP_MSG'))));
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
