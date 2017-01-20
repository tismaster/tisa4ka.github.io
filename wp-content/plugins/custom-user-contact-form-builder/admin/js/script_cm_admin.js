 jQuery(document).ready(function(){
     jQuery('.cm-upgrade-note-gold').mouseenter(function() {
         jQuery('.cm-banner-box').addClass('cm-hop');
         jQuery(this).siblings().addClass('cm-blur');
    });
     jQuery('.cm-upgrade-note-gold').mouseleave(function() {
         jQuery('.cm-banner-box').removeClass('cm-hop');
         jQuery(this).siblings().removeClass('cm-blur');
    });
 });

(function (CM_jQ) {
    'use strict';

    /*
     * This function is fired on ready event
     * Activates when document is loaded completely
     *
     * @returns {undefined}
     */



    CM_jQ(function () {

        var chart_obj = CM_jQ(".cm-box-graph");

        cm_setup_google_charts();




        //To implement sorting operation using drag and drop
        //Just have to put id 'sortable' on the element you want to scroll.
        //jQuery UI sortable is used



        var checked_el_ids = [];

        CM_jQ('.cm_sortable_elements').sortable({
            axis: 'y',
            opacity: 0.7,
            handle: '.cm_sortable_handle'
        });

        CM_jQ('.cm_sortable_form_fields').sortable({
            axis: 'y',
            opacity: 0.7,
            handle: '.cm_sortable_handle',
            update: function (event, ui) {
                var list_sortable = CM_jQ(this).sortable('toArray');

                var data = {
                    action: 'cm_sort_form_fields',
                    'cm_slug': 'cm_field_set_order',
                    data: list_sortable
                };

                CM_jQ.post(ajaxurl, data, function (response) {
                    void(0);
                });
            }
        });
        

        
        //tabbing operation
        CM_jQ('.cm_tabbing_container').tabs();

        //Attach date picker
        CM_jQ('.cm_custom_subfilter_dates').datepicker({dateFormat: 'yy-mm-dd'});
        
        //hide fields on add_field form
        var field_type = CM_jQ('#cm_field_type_select_dropdown').val();

        CM_jQ.cm_field_add_form_manage(field_type);

        //Set appropriate help text.
        //var field_type_help_text = cm_get_help_text(field_type);
        //CM_jQ('#cm_field_type_select_dropdown').parent().next('.cmnote').html(field_type_help_text);

        CM_jQ('.cm_toggle_deactivate').click(function (e) {
            if (!CM_jQ('.cm_checkbox').is(':checked')) {
                e.preventDefault();
            }
        });

        field_type = CM_jQ('#id_paypal_field_type_dd').val();

        if (field_type)
            CM_jQ.cm_setup_pricing_fields_visibility(field_type);

        var field_type_help_text = cm_get_help_text_price_field(field_type);
        jQuery('#id_paypal_field_type_dd').parent().next('.cmnote').children('.cmnotecontent').html(field_type_help_text);

        var theme = CM_jQ('#theme_dropdown').val();

        if (theme)
            CM_jQ.cm_setup_layouts_visibility(theme)

        CM_jQ('.cm_checkbox').click(function () {
            checked_el_ids.push(CM_jQ(this).parent('.card').attr('id'));
            CM_jQ('.cm_actions').attr('disabled', false);
        });




        CM_jQ('#cm_form_manager_operartionbar').submit(function () {
            var i = [];
            CM_jQ.map(CM_jQ("input[name='cm_selected_forms[]']"), function (value, index) {
                if (CM_jQ(value).is(":checked")) {
                    i.push(CM_jQ(value).val());
                }
            });
            CM_jQ("input[name='cm_selected']").val(JSON.stringify(i));
        });

        CM_jQ(document).ajaxStart(function () {
            CM_jQ("#cm_f_loading").show();
        });
        CM_jQ(document).ajaxComplete(function () {
            CM_jQ("#cm_f_loading").hide();
        });



    });






    /**
     * function to delete a forms field
     *
     * @var  field_id   id of the field to delete
     */
    CM_jQ.cm_delete_form_field = function (field_id) {

        var data = {
            action: 'cm_delete_form_field',
            data: field_id
        };

        CM_jQ.post(ajaxurl, data, function (response) {
            console.log(response);
        });
    };

    CM_jQ(document).ready(function () {



        CM_jQ(".cm_checkbox_group").change(function () {
            if (CM_jQ(this).attr('checked')) {
                CM_jQ(".cm_action_bar .cm_action_btn").attr('disabled', false);
            }

        });

        CM_jQ("#cm_editor_add_form").change(function () {
            tinymce.execCommand('mceFocus', false, 'content');
            if (CM_jQ(this).val() != 0) {
                if (CM_jQ(this).val() === '__0')
                    var shortcode = "[CM_Login]";
                else
                    var shortcode = "[GF_Form id='" + CM_jQ(this).val() + "']";

                if (typeof send_to_editor == 'function')
                    send_to_editor(shortcode);
                else
                    tinyMCE.get('content').execCommand('mceInsertContent', false, shortcode);

            }

        });


        CM_jQ("#cm_editor_add_email").change(function () {
            //tinymce.execCommand('mceFocus',false,'form_email_content');
            if (CM_jQ(this).val() != 0) {
                var shortcode = "{{" + CM_jQ(this).val() + "}}";

                if (typeof send_to_editor == 'function')
                    send_to_editor(shortcode);
                else
                    tinyMCE.get('form_email_content').execCommand('mceInsertContent', false, shortcode);

            }

        });

        CM_jQ("#mce_cm_mail_body").change(function () {
            tinymce.execCommand('mceFocus', false, 'cm_mail_body');
            if (CM_jQ(this).val() != 0) {
                var shortcode = "{{" + CM_jQ(this).val() + "}}";

                if (typeof send_to_editor == 'function')
                    send_to_editor(shortcode);
                else
                    tinyMCE.get('cm_mail_body').execCommand('mceInsertContent', false, shortcode);


            }

        });




    });


    CM_jQ.cm_prevent_quick_add_form = function (event) {
        var f_name = CM_jQ('#cm_form_name').val().toString().trim();
        if (f_name === "" || !f_name) {

            CM_jQ('#cm_form_name').fadeIn(100).fadeOut(1000, function () {
                CM_jQ('#cm_form_name').css("border", "");
                CM_jQ('#cm_form_name').fadeIn(100);
                CM_jQ('#cm_form_name').val('');
            });
            CM_jQ('#cm_form_name').css("border", "1px solid #FF6C6C");
            event.preventDefault();
        }
    };

    CM_jQ.cm_prevent_field_add = function (event, cm_msg) {
        CM_jQ('.cm_prevent_empty').each(function () {
            var f_name = CM_jQ(this).val().toString().trim();
            if (f_name === "" || !f_name) {

                CM_jQ(this).fadeIn(100).fadeOut(1000, function () {
                    CM_jQ(this).css("border", "");
                    CM_jQ(this).fadeIn(100);
                    CM_jQ(this).val('');
                });
                CM_jQ(this).css("border", "1px solid #FF6C6C");
                CM_jQ('#cm_jqnotice_text').html(cm_msg);
                CM_jQ('#cm_jqnotice_row').show();
                event.preventDefault();
            } else
                CM_jQ('#cm_jqnotice_text').html('');

        });

    };


    //Email listing
//    CM_jQ.remove_email = function (elem){
//        var id = CM_jQ(elem).attr('id');
//        var mailbox_id = id.substr(2);
//        CM_jQ(elem).closest("#"+mailbox_id).remove();
//    };
//
//    CM_jQ.add_email_field = function aef (initialcounter){
//        aef.counter = ++aef.counter || initialcounter;
//        var newemail = CM_jQ('#id_cm_add_email_tb').val();
//        var t = "<div id='id_test_"+aef.counter+"'><input class='cm_options_resp_email' type='email' name='resp_emails[]' value='"+newemail+"' readonly='true'></input><div class='x_remove_resp_email' id='x_id_test_"+aef.counter+"' onclick='jQuery.remove_email(this)'>X</div></div>";
//        var x = CM_jQ(document.createElement("div")).attr("id","xxxxxxx");
//        x.after().html(t);
//        x.appendTo('#id_cm_admin_emails_container');
//        CM_jQ('#id_cm_add_email_tb').val("");
//    };


    /**
     * function to hide field_add form fields according to field type
     *
     * @var  field_type   type of the field to be added
     */
    CM_jQ.cm_field_add_form_manage = function (field_type) {

        var all_elem = CM_jQ(".cm_static_field");
        CM_jQ(".cm_sub_heading").show();
        CM_jQ(".cm_check").hide();
        all_elem.attr('disabled', false);
        all_elem.parents(".cmrow").show();
        all_elem.removeClass("cm_prevent_empty");
        CM_jQ("#cm_field_value_paragraph, #cm_field_value_options_textarea, #cm_field_value_heading, #cm_field_value_options_sortable, #cm_field_value_file_types, #cm_field_value_pricing").attr('required', false);
        CM_jQ("#cm_jqnotice_row").hide();
        CM_jQ("#field_repeatable_line_type").hide();
        CM_jQ("#cm_no_api_notice").hide();
        CM_jQ("#time_Zone").hide();
        CM_jQ("#scroll").hide();
        CM_jQ("#date_range").hide();
        CM_jQ("#custom").hide();
        CM_jQ("#cm_tnc_cb_label_container").hide();
//        CM_jQ("#scroll").hide();
        CM_jQ("#cm_field_helptext_container").show();
        CM_jQ("#cm_icon_setting_container").show();
        
        switch (field_type) {
            case 'Textbox' :
            case 'Fname' :
            case 'Lname' :
            case 'Nickname' :
            case 'Phone' :
            case 'Mobile' :
                var object = CM_jQ(".cm_field_value, .cm_textarea_type, .cm_options_type_fields, #cm_field_is_read_only-0");
				
                break;
            case 'Custom' :
                var object = CM_jQ(".cm_field_value, .cm_textarea_type, .cm_options_type_fields, #cm_field_is_read_only-0");
		CM_jQ("#custom").show();		
                break;
            case 'HTMLP' :
                var object = CM_jQ(".cm_input_type, .cm_field_value, #cm_field_show_on-0, #cm_field_is_editable-0").not("#cm_field_value_paragraph");
                var val_field = CM_jQ("#cm_field_value_paragraph");
                CM_jQ(".cm_sub_heading").hide();
                CM_jQ("#scroll").hide();
                CM_jQ("#cm_field_helptext_container").hide();
                CM_jQ("#cm_icon_setting_container").hide();
                break;
            case 'Shortcode' :
                var object = CM_jQ(".cm_input_type, .cm_field_value, #cm_field_show_on-0, #cm_field_is_editable-0").not("#cm_field_value_shortcode");
                var val_field = CM_jQ("#cm_field_value_shortcode");
                CM_jQ(".cm_sub_heading").hide();
                CM_jQ("#cm_icon_setting_container").hide();
                break;
            case 'HTMLH' :
                var object = CM_jQ(".cm_input_type, .cm_field_value, #cm_field_show_on-0, #cm_field_is_editable-0").not("#cm_field_value_heading");
                var val_field = CM_jQ("#cm_field_value_heading");
                CM_jQ(".cm_sub_heading").hide();
                CM_jQ("#scroll").hide();
                CM_jQ("#cm_field_helptext_container").hide();
                CM_jQ("#cm_icon_setting_container").hide();
                break;

            case 'Select' :
            case 'Multi-Dropdown' :
                var object = CM_jQ(".cm_text_type_field, .cm_field_value, .cm_textarea_type, #cm_field_default_value_sortable").not("#cm_field_value_options_textarea, #cm_field_helptext_container");
                var val_field = CM_jQ("#cm_field_value_options_textarea");
                break;

            case 'Radio' :
                var object = CM_jQ(".cm_text_type_field, .cm_field_value, .cm_textarea_type, #cm_field_default_value_sortable").not("#cm_field_value_options_sortable, #cm_field_helptext_container");
                var val_field = CM_jQ("#cm_field_value_options_sortable");
                break;

            case 'Textarea' :
            case 'BInfo' :
                var object = CM_jQ(".cm_field_value, .cm_options_type_fields, #cm_field_is_read_only-0");
                break;
            case 'Checkbox' :
                var object = CM_jQ(".cm_text_type_field, .cm_field_value, .cm_textarea_type, #cm_field_default_value").not("#cm_field_value_options_sortable, #cm_field_helptext_container");
                var val_field = CM_jQ("#cm_field_value_options_sortable");
                CM_jQ(".cm_check").show();
                break;
            case 'Bdate' :
            var object = CM_jQ(".cm_static_field").not(".cm_required, #cm_field_is_required-0, #cm_field_helptext_container, #cm_field_is_editable-0");
		CM_jQ("#date_range").show();
                break;

            case 'jQueryUIDate' :
            case 'Email' :
            case 'SecEmail' :
            case 'Number' :
            case 'Country' :
            case 'Gender' :
            case 'Timezone' :
            case 'Password' :
            case 'Language' :
            case 'Image' :
            case 'Rating' :
            case 'Website' :
                var object = CM_jQ(".cm_static_field").not(".cm_required, #cm_field_is_required-0, #cm_field_helptext_container, #cm_field_is_editable-0");
                break;
            
            case 'Facebook' :
            case 'Twitter' :
            case 'Google' :
            case 'Linked' :
            case 'Youtube' :
            case 'VKontacte' :
            case 'Instagram' :
            case 'Skype' :
            case 'SoundCloud' :
              var object = CM_jQ(".cm_static_field").not(".cm_required, #cm_field_is_editable-0, #cm_field_is_required-0,#cm_field_placeholder, #cm_field_helptext_container");
                break;
            case 'Divider' :
            case 'Spacing' :
                var object = CM_jQ(".cm_static_field").not(".cm_required, #cm_field_is_required-0");
                CM_jQ("#cm_icon_setting_container").hide();
                CM_jQ("#cm_field_helptext_container").hide();
                break;
            case 'Time' :
               var object = CM_jQ(".cm_static_field").not(".cm_required, #cm_field_is_editable-0, #cm_field_is_required-0, #cm_field_helptext_container");
               CM_jQ("#time_Zone").show();
               break;
            case 'Repeatable' :
                var object = CM_jQ(".cm_field_value, .cm_textarea_type, .cm_options_type_fields, #cm_field_placeholder, #cm_field_is_read_only-0, #cm_field_helptext_container");
                CM_jQ("#field_repeatable_line_type").show();
                break;
            case 'Terms' :
                var object = CM_jQ(".cm_static_field").not(".cm_required, #cm_field_is_editable-0, #cm_field_is_required-0, #cm_field_value_terms, #cm_field_helptext_container");
                var val_field = CM_jQ("#cm_field_value_terms");
                CM_jQ("#scroll").show();
                CM_jQ("#cm_tnc_cb_label_container").show();
                break;
            case 'File' :
                var object = CM_jQ(".cm_static_field, #cm_field_default_value").not(".cm_required, #cm_field_is_editable-0, #cm_field_is_required-0, #cm_field_value_file_types, #cm_field_helptext_container");
                //var val_field = CM_jQ("#cm_field_value_file_types");
                break;

            case 'Price' :
                var object = CM_jQ(".cm_static_field").not(".cm_required, #cm_field_is_required-0, #cm_field_value_pricing, #cm_field_helptext_container");
                var val_field = CM_jQ("#cm_field_value_pricing");
                break;

            case 'Map' :
            case 'Address' : 
                var object = CM_jQ(".cm_static_field").not("#cm_field_type_select_dropdown, #cm_field_is_editable-0, #cm_field_label, #cm_field_is_required-0, #cm_field_show_on-0, #cm_field_helptext_container");
                CM_jQ("#cm_no_api_notice").show();
                break;

            default :
                var object = CM_jQ(".cm_static_field").not("#cm_field_type_select_dropdown");
                CM_jQ("#cm_field_helptext_container").hide();
                CM_jQ("#cm_icon_setting_container").hide();
                CM_jQ(".cm_sub_heading").hide();


        }
       
        object.parents(".cmrow").hide();
        object.attr('disabled', true);
 
        if (field_type === 'HTMLP' || field_type === 'HTMLH' || field_type === 'Terms' || field_type === 'Price' || field_type === 'Checkbox' || field_type === 'Radio' || field_type === 'Select'|| field_type === 'Multi-Dropdown'||  field_type === 'Shortcode') {
            val_field.attr('required', true);
            val_field.addClass("cm_prevent_empty");
        }
        if (field_type === 'Divider'|| field_type === 'Spacing')
        {
                 CM_jQ("#cm_field_show_on-0").attr('checked', false);
            CM_jQ("#cm_field_is_required-0").parents(".cmrow").hide();
            CM_jQ("#cm_field_show_on-0").parents(".cmrow").hide();
            CM_jQ("#cm_sub_heading").hide();
        }
         if (field_type === 'Shortcode')
        {
            CM_jQ("#cm_field_value_shortcode").parents(".cmrow").show();
            CM_jQ("#cm_field_value_paragraph").parents(".cmrow").hide();
        }
        if (field_type === 'Fname' || field_type === 'Lname' || field_type === 'BInfo'|| field_type === 'Nickname'|| field_type === 'SecEmail'|| field_type === 'Website') {
            CM_jQ("#cm_field_show_on-0").attr('checked', false);
            CM_jQ("#cm_field_show_on-0").attr('readonly', true);
            CM_jQ("#cm_field_show_on-0").parents(".cmrow").hide();
        }
 if (field_type === 'Number') {
          CM_jQ("#cm_field_max_length").parents(".cmrow").show();
          CM_jQ("#cm_field_max_length").attr('disabled', false);
        }
        var cm_other_box = CM_jQ("#cmaddotheroptiontextdiv");
        if (field_type === 'Checkbox' || field_type=="Radio") {
            cm_other_box.show();
            cm_other_box.siblings('#cm_action_field_container').addClass('cm_shrink_div');
        }
         
	else {
            cm_other_box.hide();
            cm_other_box.siblings('#cm_action_field_container').removeClass('cm_shrink_div');
        }

    };





    CM_jQ.cm_setup_pricing_fields_visibility = function (field_type) {

        var all_elem = CM_jQ(".cm_static_field");
        all_elem.removeClass("cm_prevent_empty");
        
        CM_jQ('#id_paypal_field_value_no').removeClass('cm_prevent_empty');
        CM_jQ('#cm_append_option').removeClass("cm_prevent_empty");
        CM_jQ('#id_block_fields_for_dd_multisel').find('input').removeClass("cm_prevent_empty");

        switch (field_type) {

            case 'fixed':
                CM_jQ('#id_block_fields_for_dd_multisel').find('input').prop('required', false);
                CM_jQ('#id_paypal_field_value_no').prop('required', true);
                CM_jQ('#id_paypal_field_value_no').addClass('cm_prevent_empty');
                CM_jQ('#id_block_fields_for_dd_multisel').hide();
                CM_jQ('#id_block_fields_for_fixed').show();
                break;

            case 'multisel':
            case 'dropdown':
                CM_jQ('#id_block_fields_for_dd_multisel').find('input').prop('required', true);
                CM_jQ('#id_block_fields_for_dd_multisel').find('input').addClass("cm_prevent_empty");
                CM_jQ('#cm_append_option').removeClass("cm_prevent_empty"); //Remove class from "click to append" box
                CM_jQ('#id_paypal_field_value_no').prop('required', false);
                CM_jQ('#id_block_fields_for_dd_multisel').show();
                CM_jQ('#id_block_fields_for_fixed').hide();
                break;

            case 'userdef':
                CM_jQ('#id_block_fields_for_dd_multisel').find('input').prop('required', false);
                CM_jQ('#id_paypal_field_value_no').prop('required', false);
                CM_jQ('#id_block_fields_for_dd_multisel').hide();
                CM_jQ('#id_block_fields_for_fixed').hide();
                break;
        }

    };


    CM_jQ.cm_setup_layouts_visibility = function (theme) {

        switch (theme) {

            case 'matchmytheme':
                CM_jQ('#layout_two_columns_container').hide();
                break;

            case 'classic':
                CM_jQ('#layout_two_columns_container').show();
                break;
        }

    };


    /**
     * Function to define some form actions by setting 'cm_slug'
     *
     * @param {string} form_id   id attribute of the form to be submitted.
     * @param {string} slug      value of cm_slug to be set
     */

    CM_jQ.cm_do_action = function (form_id, slug) {

        var form = CM_jQ("form#" + form_id);

        form.children('input#cm_slug_input_field').val(slug);

        form.submit();

    };



    CM_jQ.cm_append_textbox_other = function (elem) {
        CM_jQ("#cmaddotheroptiontextboxdiv").show();
        CM_jQ("#cm_field_is_other_option").val(1);
    };

    CM_jQ.cm_delete_textbox_other = function (elem) {
        CM_jQ("#cmaddotheroptiontextboxdiv").hide();
        CM_jQ("#cm_field_is_other_option").val('');
    };

    /**
     * Function to define some form actions by setting 'cm_slug'.
     * But also provide an JS confirmation before proceeding.
     *
     * @param {string} alert   message to show as alert
     * @param {string} form_id   id attribute of the form to be submitted.
     * @param {string} slug      value of cm_slug to be set
     */

    CM_jQ.cm_do_action_with_alert = function (alert, form_id, slug) {

        if (confirm(alert)) {

            var form = CM_jQ("form#" + form_id);

            form.children('input#cm_slug_input_field').val(slug);

            form.submit();
        }

    };

    CM_jQ.cm_invertcolor = function (element) {
        var a = element.css("background-color");
        var b = element.css("color");

        element.css('color', a);
        element.css('background-color', b);
    };

    CM_jQ.cm_test_smtp_config = function () {

        var data = {
            'action': 'cm_test_smtp_config',
            'test_email': CM_jQ("#id_cm_test_email_tb").val(),
            'smtp_host': CM_jQ("#id_cm_smtp_host_tb").val(),
            'SMTPAuth': CM_jQ("#id_cm_smtp_auth_cb-0").val(),
            'Port': CM_jQ("#id_cm_smtp_port_num").val(),
            'Username': CM_jQ("#id_cm_smtp_username_tb").val(),
            'Password': CM_jQ("#id_cm_smtp_password_tb").val(),
            'SMTPSecure': CM_jQ("#id_cm_smtp_enctype_dd").val(),
            'From': CM_jQ("#id_cm_from_email_tb").val(),
            'FromName': CM_jQ("#id_cm_from_tb").val()
        };

        CM_jQ.post(ajaxurl, data, function (response) {
            CM_jQ("#cm_smtp_test_response").html(response);
            CM_jQ("#cm_smtp_test_response").removeClass();
            CM_jQ("#cm_smtp_test_response").addClass('cm_response cm_' + response.toLowerCase());
        });
    };

})(jQuery);







