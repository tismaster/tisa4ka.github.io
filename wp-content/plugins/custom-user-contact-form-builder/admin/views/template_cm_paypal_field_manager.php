<?php
/**
 * @internal Plugin Template File [Price Field Manager]
 *
 * This is the plugin view file for fields manager. The view of forms field manager
 * is rendered from this file.
 *
 * use $data for data related to the view
 */
?>

<div class="cmagic">

    <!-----Operations bar Starts----->
    <form method="post" id="cm_payapal_field_mananger_form">
        <input type="hidden" name="cm_slug" value="" id="cm_slug_input_field">
        <div class="operationsbar">
            <div class="cmtitle"><?php echo CM_UI_Strings::get("TITLE_PAYPAL_FIELD_PAGE"); ?></div>
            <div class="icons">
                <a href="?page=cm_options_payment"><img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/cm-payments.png'; ?>"></a>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="?page=cm_paypal_field_add&cm_field_type"><?php echo CM_UI_Strings::get('LABEL_ADD_NEW_PRICE_FIELD'); ?></a></li>
                    <li onclick="jQuery.cm_do_action('cm_payapal_field_mananger_form', 'cm_paypal_field_remove')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_REMOVE'); ?></a></li>
                </ul>
            </div>

        </div>
        <!--------Operationsbar Ends----->

        <!----Field Selector Starts---->

        <div class="cm-field-selector">
            <div class="">
                <ul class="field-tabs">
                    <li class="field-tabs-row"><a href="javascript:void(0)" class="cm_tab_links" id="cm_special_fields_tab_link"><?php echo CM_UI_Strings::get("LABEL_TYPES"); ?></a></li>
                </ul>
            </div>
            <div class="field-selector-pills">
                <div id="cm_price_fields_tab">
                    <div class="cm_button_like_links"><a href="?page=cm_paypal_field_add&cm_field_type=fixed"><?php echo CM_UI_Strings::get("P_FIELD_TYPE_FIXED"); ?></a></div>  
                    <div class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("P_FIELD_TYPE_MULTISEL"); ?></a></div>
                    <div class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("P_FIELD_TYPE_DROPDOWN"); ?></a></div>  
                    <div class="cm_button_like_links cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("P_FIELD_TYPE_USERDEF"); ?></a></div>  
                </div>
            </div>
        </div>

        <!----Slab View---->
        <ul class="cm-field-container" id="cm_sortable_paypal_fields">
            <?php
            if ($data->fields_data)
            {
                $i = 0;
                foreach ($data->fields_data as $field_data)
                {
                    ?>
                    <li id="<?php echo $field_data->field_id ?>">
                        <div class="cm-slab">
                            <div class="cm-slab-grabber">
                                <span class="cm_sortable_handle">
                                    <img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/cm-drag.png'; ?>">
                                </span>
                            </div>
                            <div class="cm-slab-content">
                                <input type="checkbox" name="cm_selected[]" value="<?php echo $field_data->field_id; ?>">
                                <span><?php echo $field_data->name; ?></span>
                                <span><?php echo CM_UI_Strings::get('LABEL_TYPE'); ?> = <?php echo CM_UI_Strings::get('P_FIELD_TYPE_' . strtoupper($field_data->type)); ?></span>

                            </div>
                            <div class="cm-slab-buttons">

                                <a href="<?php echo '?page=cm_paypal_field_add&cm_field_id=' . $field_data->field_id . '&cm_field_type=' . $field_data->type; ?>"><?php echo CM_UI_Strings::get("LABEL_EDIT"); ?></a>
                                <a href="<?php echo '?page=cm_paypal_field_manage&cm_field_id=' . $field_data->field_id . '&cm_action=delete"'; ?>"><?php echo CM_UI_Strings::get("LABEL_DELETE"); ?></a>
                            </div>
                        </div>
                    </li>

                    <?php
                }
            } else
            {
                echo "<div class='cmnotice'>" . CM_UI_Strings::get('NO_PRICE_FIELDS_MSG') . "</div>";
            }
            ?>
        </ul>
    </form>
    <?php 
    $cm_promo_banner_title = "Unlock multiple pricing configurations by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>

