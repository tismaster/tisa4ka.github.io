<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<!--------WP Menu Bar

<div class="wpadminbar">Hi</div>

<div class="adminmenublock">
test</div>------->


<div class="cmagic">

    <!-----Operationsbar Starts----->
    <form method="post" id="cm_field_manager_form">
        <input type="hidden" name="cm_slug" value="" id="cm_slug_input_field">
        <div class="operationsbar">
            <div class="cmtitle"><?php echo CM_UI_Strings::get("TITLE_FORM_FIELD_PAGE"); ?></div>
            <div class="icons">
                <a href="?page=cm_form_sett_manage&cm_form_id=<?php echo $data->form_id; ?>"><img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/general-settings.png'; ?>"></a>
            </div>
            <div class="nav">
                <ul>
                    <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
              <li onclick='add_new_field_to_page()'><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_ADD_NEW_FIELD'); ?></a></li>
                    <li onclick="jQuery.cm_do_action('cm_field_manager_form', 'cm_field_duplicate')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_DUPLICATE'); ?></a></li>  
                    
                    <li onclick="jQuery.cm_do_action('cm_field_manager_form', 'cm_field_remove')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_REMOVE'); ?></a></li>
                    <li class="cm-form-toggle"><?php echo CM_UI_Strings::get('LABEL_FILTER_BY'); ?>
                        <select id="cm_form_dropdown" name="form_id" onchange = "cm_load_page(this, 'field_manage')">
                            <?php
                            foreach ($data->forms as $form_id => $form)
                                if ($data->form_id == $form_id)
                                    echo "<option value=$form_id selected>$form</option>";
                                else
                                    echo "<option value=$form_id>$form</option>";
                            ?>
                        </select></li>  
                </ul>
            </div>

        </div>
        <!--------Operationsbar Ends----->

        <!----Field Selector Starts---->

        <div class="cm-field-selector cm_tabbing_container">
            <div class="">
                <ul class="field-tabs">
                    <li class="field-tabs-row"><a href="#cm_common_fields_tab" class="cm_tab_links" id="cm_special_fields_tab_link"><?php echo CM_UI_Strings::get("LABEL_COMMON_FIELDS"); ?></a></li>  
                    <li class="field-tabs-row"><a href="#cm_special_fields_tab" class="cm_tab_links" id="cm_special_fields_tab_link"><?php echo CM_UI_Strings::get("LABEL_SPECIAL_FIELDS"); ?></a></li>
                    <li class="field-tabs-row cm_promo_dead_elements"><a href="#cm_social_fields_tab" class="cm_tab_links" id="cm_special_fields_tab_link"><?php echo CM_UI_Strings::get("LABEL_SOCIAL_FIELDS"); ?></a></li> </ul>
            </div>
            <div class="field-selector-pills">
                <div id="cm_common_fields_tab">
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Textbox"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Textbox')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_TEXT"); ?></a></div>  
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Select"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Select')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_DROPDOWN"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Radio"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Radio')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_RADIO"); ?></a></div>  
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Textarea"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Textarea')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_TEXTAREA"); ?></a></div>  
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Checkbox"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Checkbox')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_CHECKBOX"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_HTMLH"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('HTMLH')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_HEADING"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_HTMLP"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('HTMLP')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_PARAGRAPH"); ?></a></div>
                </div>
                <div id="cm_special_fields_tab">
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_jQueryUIDate"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('jQueryUIDate')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_DATE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Email"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Email')">       <a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_EMAIL"); ?></a></div>                    
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Number"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Number')">      <a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_NUMBER"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Country"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Country')">     <a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_COUNTRY"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Timezone"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Timezone')">    <a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_TIMEZONE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Terms"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Terms')">       <a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_T_AND_C"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_File"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_FILE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Price"); ?>" class="cm_button_like_links" onclick="add_new_field_to_page('Price')">       <a href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_PRICE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Repeatable"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_RAPEAT"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Map"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_MAP"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Address"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_ADDRESS"); ?></a></div>
                    
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Phone"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_PHONE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Mobile"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_MOBILE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Language"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_LANGUAGE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Bdate"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_BDATE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Gender"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_GENDER"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Time"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_TIME"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Image"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_IMAGE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Shortcode"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_SHORTCODE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Divider"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_DIVIDER"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Spacing"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_SPACING"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Multi-Dropdown"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_MULTI_DROP_DOWN"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Custom"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_CUSTOM"); ?></a></div>
                   
                
                
                </div>
                
                 <div  id="cm_social_fields_tab cm_promo_dead_elements">
                   <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Facebook"); ?>" class="cm_button_like_links cm_promo_dead_elements" ><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_FACEBOOK"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Twitter"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_TWITTER"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Google"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_GOOGLE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Instagram"); ?>" class="cm_button_like_links cm_promo_dead_elements" ><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_INSTAGRAM"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Linkedin"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_LINKED"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Youtube"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_YOUTUBE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_VKonatcte"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_VKONTACTE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Skype"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_SKYPE"); ?></a></div>
                    <div title="<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_Soundcloud"); ?>" class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("FIELD_TYPE_SOUNDCLOUD"); ?></a></div>
                    
                </div>
            </div>

        </div>


        <?php
//////////////////////////////////////////
//////////////////////////////////////////
        if($data->total_page > 1)
            echo "<div class='cmnotice'>".CM_UI_Strings::get('MULTIPAGE_DEGRADE_WARNING')."</div>";
        ?>
        


        <div class="cm-field-creator">
            <div id="cm_form_page_tabs">
                <ul class="cm-page-tabs-sidebar" class="field-tabs" style="display:none">
                    <?php // foreach($data->form_pages as $k => $fpage)//for ($i = 1; $i <= $data->total_page; $i++)
                    { $i = 1;
                        ?>
                        <li class="cm-page-tab"><a href="#cm_form_page<?php echo '_' . $i; ?>" class="cm_page_tab cmZX56-param" id="cm_form_page_tab_link<?php echo '_' . $i; ?>"><?php echo 'Page 1'; ?></a></li>  
                        <?php
                        }
                        ?>
                       
                        <li class="cm-page-tab-add-new"><a class='cm_deactivated' href='javascript:void(0)'>New Page</a></li>
                        
                    </ul>

                    <div class="field-selector-pills">
    <?php //foreach($data->form_pages as $k => $fpage)//for ($i = 1; $i <= $data->total_page; $i++)
    {$i = 1;
        ?>
                            <div id="cm_form_page<?php echo '_' . $i; ?>">
                                <div class="cm-custom-fields-page">
                                    
                                    <div class="cmrow cm_promo_dead_elements">
<!--                                        <a href="#">Current Page <?php echo $i; ?></a>-->
                                        
                                        <a class="cm_deactivated" href="javascript:void(0)">Rename Page</a>
                                        
                                        <a class="cm_deactivated" href="javascript:void(0)">Delete Page</a>
                                       
                                    </div>
<ul class="cm-field-container cm_sortable_form_fields">
                                        <?php
                                        if ($data->fields_data)
                                        {
                                            foreach ($data->fields_data as $field_data)
                                            {
                                                
                                                ?>
                                            

                                                <li id="<?php echo $field_data->field_id ?>">
                                                    <div class="cm-custom-field-page-slab">
                                                        <div class="cm-slab-drag-handle">
                                                            <span class="cm_sortable_handle">
                                                                <img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/cm-drag.png'; ?>">
                                                            </span>
                                                        </div>
                                                        <div class="cm-slab-info">
                                                            <input type="checkbox" name="cm_selected[]" value="<?php echo $field_data->field_id; ?>" <?php if ($field_data->is_field_primary == 1) echo "disabled"; ?>>
                                                            <span><?php echo $field_data->field_label; ?>
                                                                <sup><?php echo $data->field_types[$field_data->field_type] ?></sup></span>

                                                        </div>
                                                        <div class="cm-slab-buttons">

                                                            <a onclick="edit_field_in_page('<?php echo $field_data->field_type;?>',<?php echo $field_data->field_id;?>)" href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_EDIT"); ?></a>

                                                            <?php
                                                            //var_dump($field_data->is_field_primary);die;
                                                            if ($field_data->is_field_primary == 1)
                                                            {
                                                                ?>
                                                                <a href="javascript:void(0)" class="cm_deactivated"><?php echo CM_UI_Strings::get("LABEL_DELETE"); ?></a>

                                                                <?php
                                                            } else
                                                            {
                                                                ?>

                                                                <a href="<?php echo '?page=cm_field_manage&cm_form_id=' . $data->form_id . '&cm_field_id=' . $field_data->field_id . '&cm_action=delete"'; ?>"><?php echo CM_UI_Strings::get("LABEL_DELETE"); ?></a>
                    <?php
                }
                ?>
                                                        </div>
                                                    </div>
                                                </li>

                                                <?php
                                            }
                                        } else
                                        {
                                            echo CM_UI_Strings::get('NO_FIELDS_MSG');
                                        }
                                        ?>    </ul>

                                    <div class="cmrow cm_promo_dead_elements">
                                    <div class="cm_buy_pro_inline"><a href="https://registrationmagic.com/comparison/" target="blank"><?php echo CM_UI_Strings::get('MSG_BUY_PRO_GOLD_MULTIPAGE'); ?></a>
                                    </div>
                                    </div>

                                </div>

                            </div>
        <?php
        }
        ?>
                        </div>
                    </div>


                </div>


                <!----Slab View---->

               
            </form>
    <?php 
    $cm_promo_banner_title = "Unlock all custom field types by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
    
    
        </div>

        <pre class='cm-pre-wrapper-for-script-tags'><script>
            jQuery(document).ready(function () {
                jQuery("#cm_form_page_tabs").tabs();
                jQuery("#cm_form_page_tabs").tabs("option", "active", 0);
                jQuery("#cm_form_page_tabs").tabs("disable", 1);
            })

            function get_current_form_page() {
                return (jQuery("#cm_form_page_tabs").tabs("option", "active")) + 1;
            }

            function add_new_field_to_page(field_type) {
                var curr_form_page = (jQuery("#cm_form_page_tabs").tabs("option", "active")) + 1;
                var loc = "?page=cm_field_add&cm_form_id=<?php echo $data->form_id; ?>&cm_form_page_no=" + curr_form_page + "&cm_field_type";
                if (field_type !== undefined)
                    loc += ('=' + field_type);
                window.location = loc;
            }
            
            function edit_field_in_page(field_type, field_id) {
                if (field_type == undefined || field_id == undefined)
                    return;
                var curr_form_page = (jQuery("#cm_form_page_tabs").tabs("option", "active")) + 1;
                var loc = "?page=cm_field_add&cm_form_id=<?php echo $data->form_id; ?>&cm_form_page_no=" + curr_form_page + "&cm_field_type";
                loc += ('=' + field_type);
                loc += "&cm_field_id="+field_id;
                window.location = loc;
            }

            function add_new_page_to_form() {
                var loc = "?page=cm_field_manage&cm_form_id=<?php echo $data->form_id; ?>&cm_action=add_page";
                window.location = loc;
            }

            function delete_page_from_page() {
                if (confirm('This will remove the page along with all the contained fields! Proceed?')) {
                var curr_form_page = (jQuery("#cm_form_page_tabs").tabs("option", "active")) + 1;
                var loc = "?page=cm_field_manage&cm_form_id=<?php echo $data->form_id; ?>&cm_form_page_no=" + curr_form_page + "&cm_action=delete_page";
                window.location = loc;
                }
            }

            function rename_form_page() {
                var new_name = prompt("Please enter new name", "New Page");
                if (new_name != null)
                {
                    var curr_form_page = (jQuery("#cm_form_page_tabs").tabs("option", "active")) + 1;
                    var loc = "?page=cm_field_manage&cm_form_id=<?php echo $data->form_id; ?>&cm_form_page_no=" + curr_form_page + "&cm_form_page_name=" + new_name + "&cm_action=rename_page";
                    window.location = loc;
                }
            }

        </script></pre> 
        <?php

        function get_current_form_page_no()
        {
            ?><pre class='cm-pre-wrapper-for-script-tags'><script>               
                return (jQuery("#cm_form_page_tabs").tabs("option", "active")) + 1;
             </script></pre><?php
        }
        ?>
 
