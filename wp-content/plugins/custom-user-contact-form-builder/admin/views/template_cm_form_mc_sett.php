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
        $form = new CM_PFBC_Form("form_sett_mailchimp");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));
if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . CM_UI_Strings::get('LABEL_F_MC_SETT') . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }
        $form->addElement(new CM_Element_HTML('<input type="hidden" id="form_id" value="' . $data->model->get_form_id() . '"/>'));

        $form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_MAILCHIMP_LIST') . ":</b>", "mailchimp_list", $data->mailchimp_list, array("id" => "mailchimp_list", "value" => $data->mc_form_list, "onchange" => "get_field(this);", "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_MC_LIST'))));

        
        $form->addElement(new CM_Element_HTML('<div id="mc_fields">'.$data->mc_fields.'</div>'));

        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_OPT_IN_CB') . ":</b>", "form_is_opt_in_checkbox", array(1 => ""), array("id" => "cm_", "class" => "cm_op", "onclick" => "cm_hide_show(this);", "value" => $data->model->form_options->form_is_opt_in_checkbox, "longDesc" => CM_UI_Strings::get('HELP_OPT_IN_CB'))));

        if ($data->model->form_options->form_is_opt_in_checkbox == '1')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_op_childfieldsrow" >'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="cm_op_childfieldsrow" style="display:none">'));



        $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_OPT_IN_CB_TEXT') . ":</b>", "form_opt_in_text", array("id" => "cm_form_name", "value" => $data->model->form_options->form_opt_in_text, "longDesc" => CM_UI_Strings::get('HELP_OPT_IN_CB_TEXT'))));
        $form->addElement(new CM_Element_Radio("<b>" . CM_UI_Strings::get('LABEL_DEFAULT_STATE') . "</b>", "form_opt_in_default_state", array('Checked'=>CM_UI_Strings::get('LABEL_CHECKED'),'Unchecked'=>CM_UI_Strings::get('LABEL_UNCHECKED')), array("id"=>"id_cm_default_state", "value" => $data->model->form_options->form_opt_in_default_state, "longDesc" => CM_UI_Strings::get('MSG_OPT_IN_DEFAULT_STATE'))));
       
        $form->addElement(new CM_Element_HTML('</div>'));

        $form->addElement (new CM_Element_HTMLL ('&#8592; &nbsp; Cancel', '?page=cm_form_sett_manage&cm_form_id='.$data->model->form_id, array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "submit", "onClick" => "jQuery.cm_prevent_field_add(event,'This is a required field.')")));
        $form->render();
        ?>
    </div>
    
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>
<pre class='cm-pre-wrapper-for-script-tags'><script>

    function get_field(element) {
        var form_id = jQuery("#form_id").val();

        var list_id = jQuery(element).val();
        if (form_id == '')
        {
            alert(form_id);

        } else
        {
            var data = {
                'action': 'cm_get_fields',
                'list_id': list_id,
                'form_id': form_id,
                'cm_slug': 'get_mc_list_field'

            };

            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
            jQuery.post(ajaxurl, data, function (response) {

                document.getElementById("mc_fields").innerHTML = response;
            });
        }
    }

</script></pre>
<?php
