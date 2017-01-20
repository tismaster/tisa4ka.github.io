<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $cm_env_requirements;
?>

<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">


        <?php
        $form = new CM_PFBC_Form("form_sett_post_sub");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery", "focus"),
            "action" => ""
        ));

        if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . CM_UI_Strings::get('LABEL_F_PST_SUB_SETT') . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }

        $form->addElement(new CM_Element_TinyMCEWP("<b>" . CM_UI_Strings::get('LABEL_SUCC_MSG') . ":</b>", $data->model->form_options->form_success_message, "form_success_message", array('editor_class' => 'cm_TinydMCE', 'editor_height' => '100px'), array("longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_SUCCESS_MSG'))));
        /*Temporarily disable promo*/
         //$form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_UNIQUE_TOKEN') . ":</b>", "get_pro_3", array(1 => ''), array("id" => "cm_", "disabled" => 1, "value" => 'no', "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_UNIQUE_TOKEN') . "<br><br>" . CM_UI_Strings::get('MSG_BUY_PRO_INLINE'))));
        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_USER_REDIRECT') . ":</b>", "form_redirect", array('none' => 'None', 'page' => 'Page', 'url' => 'URL'), array("id" => "cm_", "class" => "cm_", "onclick" => "cm_hide_show_radio(this);", "value" => $data->model->form_redirect? : 'none', "required" => "1", "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_REDIRECT_AFTER_SUB'))));

        if ($data->model->form_redirect !== 'page' && $data->model->form_redirect !== 'url' )
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm__childfieldsrow" style="display:none" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm__childfieldsrow" >'));
        if ($data->model->form_redirect == 'page')
            $form->addElement(new CM_Element_HTML('<div class="cm_form_page">'));
        else
            $form->addElement(new CM_Element_HTML('<div class="cm_form_page" style="display:none" >'));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_PAGE') . ":</b>", "form_redirect_to_page", $data->wp_pages, array("id" => "cm_form_type", "value" => intval($data->model->get_form_redirect_to_page()) ? $data->model->get_form_redirect_to_page() : null, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_REDIRECT_PAGE'))));
        $form->addElement(new CM_Element_HTML('</div>'));
        if ($data->model->form_redirect == 'url')
            $form->addElement(new CM_Element_HTML('<div class="cm_form_url"> '));
        else
            $form->addElement(new CM_Element_HTML('<div class="cm_form_url"  style="display:none">  '));
        $form->addElement(new CM_Element_Url("<b>" . CM_UI_Strings::get('LABEL_URL') . ":</b>", "form_redirect_to_url", array("id" => "cm_form_name",  "value" => !intval($data->model->get_form_redirect_to_url()) ? $data->model->get_form_redirect_to_url() : null, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_REDIRECT_URL'))));
        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement(new CM_Element_HTML('</div>'));
        
        /*Temporarily disable promo*/
        /*if ($cm_env_requirements & CM_REQ_EXT_CURL) {
            //options for export submissions to url
            $options_send_to_url_field = array("id" => "cm_export_sub_url", "value" => $data->model->form_options->export_submissions_to_url, "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL'));
            if ($data->model->form_options->should_export_submissions != 1)
                $options_send_to_url_field['disabled'] = true;
            else
                $options_send_to_url_field['class'] = 'cm_prevent_empty';

            $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_EXPORT_TO_URL_CB') . ":</b>", "", array(1 => ''), array("disabled" => true, "id" => "cm_export_sub_cb", "onclick" => "cm_checkbox_disable_elements(this, 'cm_export_sub_url', 0, cm_add_class);",  "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL_CB') . "<br><br>" . CM_UI_Strings::get('MSG_BUY_PRO_INLINE'))));
            
                $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_export_sub_cb_childfieldsrow" style="display:none" >'));
            

            $form->addElement(new CM_Element_Url("<b>" . CM_UI_Strings::get('LABEL_EXPORT_URL') . ":</b>", "export_submissions_to_url", $options_send_to_url_field));

            $form->addElement(new CM_Element_HTML('</div>'));
        }
        else {
            $options_send_to_url_field = array("id" => "cm_export_sub_url", "value" => $data->model->form_options->export_submissions_to_url, "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL'), "disabled" => true);
            $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_EXPORT_TO_URL_CB') . ":</b>", "should_export_submissions", array(1 => CM_UI_Strings::get('ERROR_NA_SEND_TO_URL_FEAT')), array("id" => "cm_export_sub_cb", "class" => "cm_export_sub_cb", "onclick" => "hise_show(this);", "disabled" => true, "value" => $data->model->form_options->should_export_submissions, "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL_CB'))));
            if ($data->model->form_options->should_export_submissions == null)
                $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_export_sub_cb_childfieldsrow" style="display:none" >'));
            else
                $form->addElement(new CM_Element_Url("<b>" . CM_UI_Strings::get('LABEL_EXPORT_URL') . ":</b>", "export_submissions_to_url", $options_send_to_url_field));
            $form->addElement(new CM_Element_HTML('</div>'));
        }
         */

        $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_form_sett_manage&cm_form_id='.$data->model->form_id, array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "submit", "onClick" => "jQuery.cm_prevent_field_add(event,'This is a required field.')")));
        $form->render();
        ?>
    </div>
    
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>

<?php


