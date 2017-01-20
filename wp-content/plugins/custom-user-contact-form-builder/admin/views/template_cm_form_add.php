<?php
//
/**
 * View template file of the plugin
 *
 * @internal Add form page view.
 */
global $cm_env_requirements;
?>

<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">


        <?php
        $form = new CM_PFBC_Form("cm_form_add");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));


        if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsubheader">' . CM_UI_Strings::get("SUBTITLE_NEW_FORM_PAGE") . '</div>'));
        }

        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_TITLE') . ":</b>", "form_name", array("id" => "cm_form_name", "required" => "1", /*"value" => $data->model->form_name,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_TITLE'))));
        $form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_DESC') . ":</b>", "form_description", array("id" => "cm_form_description", /*"value" => $data->model->form_options->form_description,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_DESC'))));
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_CREATE_WP_ACCOUNT') . "?</b>(" . CM_UI_Strings::get('LABEL_CREATE_WP_ACCOUNT_DESC') . "):", "form_type", array(1 => ""), array("id" => "cm_user_create", "class" => "cm_user_create", "onclick" => "cm_hide_show(this);", /*"value" => $data->model->form_type,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_CREATE_WP_USER'))));
        $form->addElement(new CM_Element_Hidden('form_pages', json_encode($data->model->form_options->form_pages)));
        if ($data->model->form_type == 1)
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_user_create_childfieldsrow">'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_user_create_childfieldsrow" style="display:none">'));


        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_DO_ASGN_WP_USER_ROLE') . ":</b>", "default_form_user_role", $data->roles, array("id" => "cm_user_role", /*"value" => $data->model->get_default_form_user_role(),*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_WP_USER_ROLE_AUTO'))));

        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_LET_USER_PICK') . ":</b>", "form_should_user_pick", array(1 => ""), array("id" => "cm_form_should_user_pick", "class" => "cm_form_should_user_pick", "onclick" => "cm_hide_show(this);", /*"value" => $data->model->form_options->form_should_user_pick,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_WP_USER_ROLE_PICK'))));
        
        if (count($data->model->form_options->form_should_user_pick) === 1)
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_form_should_user_pick_childfieldsrow">'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_form_should_user_pick_childfieldsrow" style="display:none">'));

        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_USER_ROLE_FIELD') . ":</b>", "form_user_field_label", array("id" => "cm_role_label", /*"value" => $data->model->form_options->form_user_field_label,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_ROLE_SELECTION_LABEL'))));
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_ALLOW_WP_ROLE') . ":</b>", "form_user_role", array_slice($data->roles, 1), array("class" => "cm_allowed_roles", "id" => "cm_", /*"value" => $data->model->get_form_user_role(),*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_ALLOWED_USER_ROLE'))));
        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement(new CM_Element_HTML('</div>'));


        $form->addElement(new CM_Element_TinyMCEWP("<b>" . CM_UI_Strings::get('LABEL_CONTENT_ABOVE') . ":</b>", $data->model->form_options->form_custom_text, "form_custom_text", array('editor_class' => 'cm_TinyMCE', 'editor_height' => '100px'), array("longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_CONTENT_ABOVE_FORM'))));
        $form->addElement(new CM_Element_TinyMCEWP("<b>" . CM_UI_Strings::get('LABEL_SUCC_MSG') . ":</b>", $data->model->form_options->form_success_message, "form_success_message", array('editor_class' => 'cm_TinydMCE', 'editor_height' => '100px'), array("longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_SUCCESS_MSG'))));
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_UNIQUE_TOKEN') . ":</b>", "form_is_unique_token", array(1 => ""), array("id" => "cm_", /*"value" => $data->model->form_options->form_is_unique_token,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_UNIQUE_TOKEN'))));
        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_USER_REDIRECT') . ":</b>", "form_redirect", array('none' => 'None', 'page' => 'Page', 'url' => 'URL'), array("id" => "cm_", "class" => "cm_", "onclick" => "cm_hide_show_radio(this);", /*"value" => $data->model->form_redirect? : 'none',*/ "required" => "1", "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_REDIRECT_AFTER_SUB'))));

        if ($data->model->form_redirect == 'none')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm__childfieldsrow" style="display:none" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm__childfieldsrow" >'));
        if ($data->model->form_redirect == 'page')
            $form->addElement(new CM_Element_HTML('<div class="cm_form_page">'));
        else
            $form->addElement(new CM_Element_HTML('<div class="cm_form_page" style="display:none" >'));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_PAGE') . ":</b>", "form_redirect_to_page", $data->wp_pages, array("id" => "cm_form_type", /*"value" => intval($data->model->get_form_redirect_to_page()) ? $data->model->get_form_redirect_to_page() : null,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_REDIRECT_PAGE'))));
        $form->addElement(new CM_Element_HTML('</div>'));
        if ($data->model->form_redirect == 'url')
            $form->addElement(new CM_Element_HTML('<div class="cm_form_url"> '));
        else
            $form->addElement(new CM_Element_HTML('<div class="cm_form_url"  style="display:none">  '));
        $form->addElement(new CM_Element_Url("<b>" . CM_UI_Strings::get('LABEL_URL') . ":</b>", "form_redirect_to_url", array("id" => "cm_form_name", /*"value" => !intval($data->model->get_form_redirect_to_url()) ? $data->model->get_form_redirect_to_url() : null,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_REDIRECT_URL'))));
        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_AUTO_REPLY') . ":</b>", "form_should_send_email", array(1 => ""), array("id" => "cm_ss", "onclick" => "cm_toggle(    this, 'cm_auto_reply')", "class" => "cm_ss", "onclick" => "cm_hide_show(this);", /*"value" => $data->model->form_should_send_email,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_RESPONDER'))));

        if ($data->model->form_should_send_email == '1')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_ss_childfieldsrow" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_ss_childfieldsrow" style="display:none">'));

        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_AR_EMAIL_SUBJECT') . ":</b>", "form_email_subject", array("id" => "cm_form_name", /*"value" => $data->model->form_options->form_email_subject,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_RESP_SUB'))));

        $form->addElement(new CM_Element_TinyMCEWP("<b>" . CM_UI_Strings::get('LABEL_AR_EMAIL_BODY') . ":</b>(Mail Merge and HTML Supported):", $data->model->form_options->form_email_content, "form_email_content", array('editor_class' => 'cm_TinydMCE', 'editor_height' => '100px'), array("longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_RESP_MSG'))));
        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_SUBMIT_BTN') . ":</b>", "form_submit_btn_label", array("id" => "cm_form_name", /*"value" => $data->model->form_options->form_submit_btn_label,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_SUB_BTN_LABEL'))));
        $form->addElement(new CM_Element_Color("<b>" . CM_UI_Strings::get('LABEL_SUBMIT_BTN_COLOR') . ":</b>(Does not works with Classic form style):", "form_submit_btn_color", array("id" => "cm_", /*"value" => $data->model->form_options->form_submit_btn_color,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_SUB_BTN_FG_COLOR'))));
        $form->addElement(new CM_Element_Color("<b>" . CM_UI_Strings::get('LABEL_SUBMIT_BTN_COLOR_BCK') . ":</b>(" . CM_UI_Strings::get('LABEL_SUBMIT_BTN_COLOR_BCK_DSC') . "):", "form_submit_btn_bck_color", array("id" => "cm_", /*"value" => $data->model->form_options->form_submit_btn_bck_color,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_SUB_BTN_BG_COLOR'))));

        $mailchimp_key = get_option('cm_option_mailchimp_key');
        if (get_option('cm_option_enable_mailchimp') == "yes" && !empty($mailchimp_key)) {
            $form->addElement(new CM_Element_HTML('<div id="cm_mailchimp_options">'));
        } else {
            $form->addElement(new CM_Element_HTML('<div id="cm_mailchimp_options" class="hidden_element">'));
        }

        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_MAILCHIMP_LIST') . ":</b>", "mailchimp_list", $data->mailchimp_list, array("id" => "mailchimp_list", /*"value" => $data->model->form_options->mailchimp_list,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_MC_LIST'))));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_MAILCHIMP_MAP_EMAIL') . ":</b>", "mailchimp_mapped_email", $data->email_fields, array("id" => "mailchimp_mail", /*"value" => $data->model->get_mailchimp_mapped_email(),*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_MC_EMAIL'))));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_MAILCHIMP_MAP_FIRST_NAME') . ":</b>", "mailchimp_mapped_first_name", $data->all_fields, array("id" => "mailchimp_fname", /*"value" => $data->model->get_mailchimp_mapped_first_name(),*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_MC_FNAME'))));
        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_MAILCHIMP_MAP_LAST_NAME') . ":</b>", "mailchimp_mapped_last_name", $data->all_fields, array("id" => "mailchimp_lname", /*"value" => $data->model->get_mailchimp_mapped_last_name(),*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_MC_LNAME'))));
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_OPT_IN_CB') . ":</b>", "form_is_opt_in_checkbox", array(1 => ""), array("id" => "cm_", "class" => "cm_op", "onclick" => "cm_hide_show(this);", /*"value" => $data->model->form_options->form_is_opt_in_checkbox,*/ "longDesc" => CM_UI_Strings::get('HELP_OPT_IN_CB'))));

        if ($data->model->form_options->form_is_opt_in_checkbox == '1')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_op_childfieldsrow" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_op_childfieldsrow" style="display:none">'));



        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_OPT_IN_CB_TEXT') . ":</b>", "form_opt_in_text", array("id" => "cm_form_name", /*"value" => $data->model->form_options->form_opt_in_text,*/ "longDesc" => CM_UI_Strings::get('HELP_OPT_IN_CB_TEXT'))));
        $form->addElement(new CM_Element_HTML('</div>'));
        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_AUTO_EXPIRE') . ":</b>", "form_should_auto_expire", array(1 => ""), array("id" => "cm_", "class" => "cm_a", /*"value" => $data->model->form_should_auto_expire,*/ "onclick" => "cm_hide_show(this);", "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXPIRE'))));
        if ($data->model->form_should_auto_expire == '1')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_a_childfieldsrow" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_a_childfieldsrow" style="display:none">'));

        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_EXPIRY') . ":</b>", "form_expired_by", array('submissions' => 'By Submissions', 'date' => 'By Date', 'both' => 'Set Both (Whichever is earlier)'), array("id" => "cm_", /*"value" => $data->model->form_options->form_expired_by,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_EXPIRE_BY'))));
        $form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_SUB_LIMIT') . ":</b>", "form_submissions_limit", array("id" => "cm_form_name", /*"value" => $data->model->form_options->form_submissions_limit,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXP_SUB_LIMIT'))));
        $form->addElement(new CM_Element_jQueryUIDate("<b>" . CM_UI_Strings::get('LABEL_EXPIRY_DATE') . ":</b>", 'form_expiry_date', array('class' => 'cm_dateelement', /*"value" => $data->model->form_options->form_expiry_date,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXP_TIME_LIMIT'))));
        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_EXPIRY_MSG') . ":</b>", "form_message_after_expiry", array("class" => "cm_form_description", /*"value" => $data->model->form_options->form_message_after_expiry,*/ "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXP_MSG'))));

        if ($cm_env_requirements & CM_REQ_EXT_CURL) {
            //options for export submissions to url
            $options_send_to_url_field = array("id" => "cm_export_sub_url", /*"value" => $data->model->form_options->export_submissions_to_url,*/ "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL'));
            if ($data->model->form_options->should_export_submissions != 1)
                $options_send_to_url_field['disabled'] = true;
            else
                $options_send_to_url_field['class'] = 'cm_prevent_empty';

            $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_EXPORT_TO_URL_CB') . ":</b>", "should_export_submissions", array(1 => ""), array("id" => "cm_export_sub_cb", "class" => "cm_export_sub_cb", "onclick" => "cm_checkbox_disable_elements(this, 'cm_export_sub_url', 0, cm_add_class);", /*"value" => $data->model->form_options->should_export_submissions,*/ "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL_CB'))));
            if ($data->model->form_options->should_export_submissions == null)
                $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_export_sub_cb_childfieldsrow" style="display:none" >'));
            else
                $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_export_sub_cb_childfieldsrow" >'));

            $form->addElement(new CM_Element_Url("<b>" . CM_UI_Strings::get('LABEL_EXPORT_URL') . ":</b>", "export_submissions_to_url", $options_send_to_url_field));

            $form->addElement(new CM_Element_HTML('</div>'));
        }
        else {
            $options_send_to_url_field = array("id" => "cm_export_sub_url", /*"value" => $data->model->form_options->export_submissions_to_url,*/ "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL'), "disabled" => true);
            $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_EXPORT_TO_URL_CB') . ":</b>", "should_export_submissions", array(1 => CM_UI_Strings::get('ERROR_NA_SEND_TO_URL_FEAT')), array("id" => "cm_export_sub_cb", "class" => "cm_export_sub_cb", "onclick" => "hise_show(this);", "disabled" => true, /*"value" => $data->model->form_options->should_export_submissions,*/ "longDesc" => CM_UI_Strings::get('HELP_SEND_SUB_TO_URL_CB'))));
            if ($data->model->form_options->should_export_submissions == null)
                $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_export_sub_cb_childfieldsrow" style="display:none" >'));
            else
                $form->addElement(new CM_Element_Url("<b>" . CM_UI_Strings::get('LABEL_EXPORT_URL') . ":</b>", "export_submissions_to_url", $options_send_to_url_field));
            $form->addElement(new CM_Element_HTML('</div>'));
        }


//$form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_CANCEL'), "button", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "cancel", "href" => "?page=cm_form_manage")));
        $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_form_manage', array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "submit", "onClick" => "jQuery.cm_prevent_field_add(event,'This is a required field.')")));
        $form->render();
        ?>
    </div>
</div>

<?php

