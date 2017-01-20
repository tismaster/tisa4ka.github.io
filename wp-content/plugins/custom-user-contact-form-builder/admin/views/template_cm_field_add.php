<?php
//echo'<pre>';var_dump($data->model);die;
/**
 * @internal Plugin Template File [Add Text Type Field]
 * 
 * This view generates the form for adding text type field to the form
 */

wp_enqueue_script( 'jquery-ui-dialog', '', 'jquery' );
if(isset($data->model->field_options->icon))
{
    $f_icon = $data->model->field_options->icon;
    if(!isset($f_icon->bg_alpha))
        $f_icon->bg_alpha = 1.0;
}
else
{
    $f_icon = new stdClass;
    $f_icon->codepoint = null;
    $f_icon->fg_color = '#000000';
    $f_icon->bg_color = null;
    $f_icon->shape = 'square';
    $f_icon->bg_alpha = 1.0;
}

$icon_shapes = array('square' => CM_UI_Strings::get('FIELD_ICON_SHAPE_SQUARE'),
    'sticker' => CM_UI_Strings::get('FIELD_ICON_SHAPE_STICKER'),
    'round' => CM_UI_Strings::get('FIELD_ICON_SHAPE_ROUND'));


if($f_icon->shape == 'square')
    $radius = '0px';
else if($f_icon->shape == 'round')
    $radius = '100px';
else if($f_icon->shape == 'sticker')
    $radius = '4px';
                    
$bg_r = intval(substr($f_icon->bg_color,0,2),16);
$bg_g = intval(substr($f_icon->bg_color,2,2),16);
$bg_b = intval(substr($f_icon->bg_color,4,2),16);

$icon_style = "style=\"padding:5px;color:#{$f_icon->fg_color};background-color:rgba({$bg_r},{$bg_g},{$bg_b},{$f_icon->bg_alpha});border-radius:{$radius};\"";
$field_types_array = CM_Utilities::get_field_types();

?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="cmagic">
       
<!--Dialogue Box Starts-->
<div class="cmcontent">
<?php
    require_once CM_EXTERNAL_DIR.'icons/icons_list.php';


if(isset($data->model->is_field_primary) && $data->model->is_field_primary == 1){
    include_once plugin_dir_path(__FILE__).'template_cm_primary_field_add.php';
}

else{
    
$form = new CM_PFBC_Form("add-field");

$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "action" => ""
));

if (isset($data->model->field_id))
{
    $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_EDIT_FIELD_PAGE") . '</div>'));
    $form->addElement(new CM_Element_Hidden("field_id", $data->model->field_id));
} else
    $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FIELD_PAGE") . '</div>'));

$form->addElement(new CM_Element_Hidden("form_id", $data->form_id));

if($data->selected_field)
    $field_help_text = CM_UI_Strings::get('FIELD_HELP_TEXT_'.$data->selected_field); 
else
    $field_help_text = CM_UI_Strings::get('HELP_ADD_FIELD_SELECT_TYPE'); 

$form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_SELECT_TYPE') . ":</b>", "field_type", $field_types_array, array("id" => "cm_field_type_select_dropdown", "value" => $data->selected_field, "class" => "cm_static_field cm_required", "required" => "1", "onchange" => "cm_toggle_field_add_form_fields(this)", "longDesc"=>$field_help_text)));


$form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_LABEL') . ":</b>", "field_label", array("id" => "cm_field_label", "class" => "cm_static_field cm_required", "required" => "1", "value" => $data->model->field_label, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_LABEL'))));
//$form->addElement(new CM_Element_HTML('</div>'));

/* Option releated to Repeatable Field */
$form->addElement(new CM_Element_HTML('<div id="field_repeatable_line_type" >'));
$form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_ALLOW_MULTILINE') . ":</b>", "field_is_multiline", array(1 => ""), array("id" => "cm_field_multiline", "class" => "cm_field_multiline cm_input_type", "value" => $data->model->field_options->field_is_multiline, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_IS_REQUIRED'))));
$form->addElement(new CM_Element_HTML('</div>'));

$form->addElement(new CM_Element_HTML('<div id="time_Zone" style="display:none" >'));
$form->addElement(new CM_Element_Timezone("<b>" . CM_UI_Strings::get('LABEL_TIME_ZONE') . ":</b>", "field_timezone", array("id" => "field_timezone", "class" => "", "value" => $data->model->field_options->field_timezone, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_TIME_ZONE'))));
 $form->addElement(new CM_Element_HTML('</div>'));
//Field_value fields only one can be used at a time
 $form->addElement(new CM_Element_HTML('<div id="cm_tnc_cb_label_container" style="display:none" >'));
 $form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_T_AND_C_CB_LABEL') . ":</b>", "tnc_cb_label", array("id" => "cm_tnc_cb_label", "value" => $data->model->field_options->tnc_cb_label, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_TnC_CB_LABEL'))));
 $form->addElement(new CM_Element_HTML('</div>'));
 
$form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_T_AND_C') . ":</b>", "field_value", array("id" => "cm_field_value_terms", "class" => "cm_static_field cm_field_value", "value" => is_array($data->model->get_field_value()) ? null : $data->model->get_field_value(), "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_TnC_VAL'))));

$form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_FILE_TYPES') . ":</b>(" . CM_UI_Strings::get('LABEL_FILE_TYPES_DSC') . ")", "field_value", array("id" => "cm_field_value_file_types", "class" => "cm_static_field cm_field_value", "value" => is_array($data->model->get_field_value()) ? null : $data->model->get_field_value(), "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_FILETYPE'))));


$form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_PRICING_FIELD') . ":</b>", "field_value", $data->paypal_fields, array("id" => "cm_field_value_pricing", "value" => is_array($data->model->get_field_value()) ? null : $data->model->get_field_value(), "class" => "cm_field_value cm_static_field", "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_PRICE_FIELD'))));
$form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_PARAGRAPF_TEXT') . ":</b>", "field_value", array("id" => "cm_field_value_paragraph", "class" => "cm_static_field cm_field_value", "value" => is_array($data->model->get_field_value()) ? null : $data->model->get_field_value(), "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_PARA_TEXT'))));
$form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_SHORTCODE_TEXT') . ":</b>", "field_value", array("id" => "cm_field_value_shortcode", "class" => "cm_static_field cm_field_value", "value" => is_array($data->model->get_field_value()) ? null : $data->model->get_field_value(), "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_SHORTCODE_TEXT'))));

$form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_HEADING_TEXT') . ":</b>", "field_value", array("id" => "cm_field_value_heading", "class" => "cm_static_field cm_field_value", "value" => is_array($data->model->get_field_value()) ? null : $data->model->get_field_value(), "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_HEADING_TEXT'))));
$form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_OPTIONS') . ":</b>(" . CM_UI_Strings::get('LABEL_DROPDOWN_OPTIONS_DSC') . ")", "field_value", array("id" => "cm_field_value_options_textarea", "class" => "cm_static_field cm_field_value", "value" => is_array($data->model->get_field_value()) ? null : $data->model->get_field_value(), "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_OPTIONS_COMMASEP'))));
$form->addElement(new CM_Element_Textboxsortable("<b>" . CM_UI_Strings::get('LABEL_OPTIONS') . ":</b>", "field_value[]", array("id" => "cm_field_value_options_sortable", "class" => "cm_static_field cm_field_value", "value" => is_array($data->model->get_field_value()) ? $data->model->get_field_value() : explode(',' , $data->model->get_field_value()), "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_OPTIONS_SORTABLE'))));


//$form->addElement(new CM_Element_HTML(""));
$form->addElement(new CM_Element_HTML('<div id="cmaddotheroptiontextboxdiv" style="display:none">'));
$form->addElement(new CM_Element_HTML('<div class="cmrow"><div class="cmfield" for="cm_other_option_text"><label>  </label></div><div class="cminput"><input type="text" name="cm_textbox" id="cm_other_option_text" class="cm_static_field" readonly="disabled" value="'.CM_UI_Strings::get('MSG_THEIR_ANS').'"><div id="cmaddotheroptiontextdiv2"><div onclick="jQuery.cm_delete_textbox_other(this)">'.CM_UI_Strings::get('LABEL_DELETE').'</div></div></div></div>'));
$form->addElement(new CM_Element_HTML('</div>'));
//$form->addElement(new CM_Element_HTML("<div onclick=''>".CM_UI_Strings::get('LABEL_DELETE')."</div></div>"));
$form->addElement(new CM_Element_Hidden("field_is_other_option", "", array("id" => "cm_field_is_other_option")));
$form->addElement(new CM_Element_HTML('<div class="cmrow" id="cm_jqnotice_row"><div class="cmfield" for="cm_field_value_options_textarea"><label></label></div><div class="cminput" id="cm_jqnotice_text"></div></div>'));

$form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_PLACEHOLDER_TEXT') . ":</b>", "field_placeholder", array("id" => "cm_field_placeholder", "class" => "cm_static_field cm_text_type_field cm_input_type", "value" => $data->model->field_options->field_placeholder, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_PLACEHOLDER'))));

if($data->selected_field !== 'HTMLP' && $data->selected_field !== 'HTMLH')
{
    $form->addElement(new CM_Element_HTML('<div id="cm_field_helptext_container">'));
    $form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_HELP_TEXT') . ":</b>", "help_text", array("id" => "cm_field_helptext", "value" => $data->model->field_options->help_text, "longDesc" => CM_UI_Strings::get('HELP_ADD_FIELD_HELP_TEXT'))));
    $form->addElement(new CM_Element_HTML('</div>'));
}
else
{
    $form->addElement(new CM_Element_HTML('<div id="cm_field_helptext_container" style="display:none">'));
    $form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_HELP_TEXT') . ":</b>", "help_text", array("id" => "cm_field_helptext", "class" => "", "value" => $data->model->field_options->help_text, "longDesc" => CM_UI_Strings::get('HELP_ADD_FIELD_HELP_TEXT'))));
    $form->addElement(new CM_Element_HTML('</div>'));
}

$form->addElement(new CM_Element_HTML("<div id='cm_icon_setting_container'>"));
$form->addElement(new CM_Element_HTML('<div class="cmrow" id="cm_jqnotice_row_date_type"><div class="cmfield" for="cm_field_value_options_textarea"><label>'.CM_UI_Strings::get('LABEL_FIELD_ICON').'</label></div><div class="cminput" id="cm_field_icon_chosen"><i class="material-icons"'.$icon_style.' id="id_show_selected_icon">'.$f_icon->codepoint.'</i><div class="cm-icon-action"><div onclick="show_icon_reservoir()"><a href="javascript:void(0)">'.CM_UI_Strings::get('LABEL_FIELD_ICON_CHANGE').'</a></div> <div onclick="cm_remove_icon()"><a href="javascript:void(0)">'.CM_UI_Strings::get('LABEL_REMOVE').'</a></div></div></div><div class="cmnote"><div class="cmprenote"></div><div class="cmnotecontent">'.CM_UI_Strings::get('HELP_FIELD_ICON').'</div></div></div>'));

$form->addElement(new CM_Element_Hidden('input_selected_icon_codepoint', $f_icon->codepoint, array('id'=>'id_input_selected_icon')));
$form->addElement(new CM_Element_Color("<b>" . CM_UI_Strings::get('LABEL_FIELD_ICON_FG_COLOR').":</b>", "icon_fg_color", array("id" => "cm_", "value" => $f_icon->fg_color, "onchange" => "change_icon_fg_color(this)", "longDesc" => CM_UI_Strings::get('HELP_FIELD_ICON_FG_COLOR'))));

$form->addElement(new CM_Element_Color("<b>" . CM_UI_Strings::get('LABEL_FIELD_ICON_BG_COLOR').":</b>", "icon_bg_color", array("id" => "cm_", "value" => $f_icon->bg_color, "onchange" => "change_icon_bg_color(this)", "longDesc" => CM_UI_Strings::get('HELP_FIELD_ICON_BG_COLOR'))));

$form->addElement(new CM_Element_Range(CM_UI_Strings::get('LABEL_FIELD_ICON_BG_ALPHA'), "icon_bg_alpha", array("id" => "cm_", "value" => $f_icon->bg_alpha, "step" => 0.1, "min" => 0, "max" => 1, "oninput" => "finechange_icon_bg_color()", "onchange" => "finechange_icon_bg_color()", "longDesc" => CM_UI_Strings::get('HELP_FIELD_ICON_BG_ALPHA'))));

$form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_FIELD_ICON_SHAPE').":</b>", "icon_shape", $icon_shapes, array("id" => "cm_", "value" => $f_icon->shape, "onchange" => "change_icon_shape(this)", "longDesc" => CM_UI_Strings::get('HELP_FIELD_ICON_SHAPE'))));
$form->addElement(new CM_Element_HTML('</div>'));
$form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_CSS_CLASS') . ":</b>", "field_css_class", array("id" => "cm_field_class", "class" => "cm_static_field cm_required", "value" => $data->model->field_options->field_css_class, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_CSS_CLASS'))));
$form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_MAX_LENGTH') . ":</b>", "field_max_length", array("id" => "cm_field_max_length", "class" => "cm_static_field cm_text_type_field cm_input_type", "value" => $data->model->field_options->field_max_length, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_MAX_LEN'))));
$form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_DEFAULT_VALUE') . ":</b>", "field_default_value", array("id" => "cm_field_default_value", "class" => "cm_static_field cm_options_type_fields cm_input_type", "value" => is_array(maybe_unserialize($data->model->field_options->field_default_value)) ? null : $data->model->field_options->field_default_value, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_DEF_VALUE'))));
$form->addElement(new CM_Element_Textboxsortable("<b>" . CM_UI_Strings::get('LABEL_DEFAULT_VALUE') . ":</b>", "field_default_value[]", array("id" => "cm_field_default_value_sortable", "class" => "cm_static_field cm_options_type_fields cm_input_type", "value" => $data->model->get_field_default_value())));
$form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_COLUMNS') . ":</b>", "field_textarea_columns", array("id" => "cm_field_columns", "class" => "cm_static_field cm_textarea_type cm_input_type", "value" => $data->model->field_options->field_textarea_columns, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_COLS'))));
$form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_ROWS') . ":</b>", "field_textarea_rows", array("id" => "cm_field_rows", "class" => "cm_static_field cm_textarea_type cm_input_type", "value" => $data->model->field_options->field_textarea_rows, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_ROWS'))));
$form->addElement(new CM_Element_HTML('<div id="cm_sub_heading" class="cmrow cm_sub_heading">' . CM_UI_Strings::get('TEXT_RULES') . '</div>'));
$form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_IS_REQUIRED') . ":</b>", "field_is_required", array(1 => ""), array("id" => "cm_field_is_required", "class" => "cm_static_field cm_input_type", "value" => $data->model->field_options->field_is_required, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_IS_REQUIRED'))));

///$form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_SHOW_ON_USER_PAGE') . ":</b>", "field_show_on_user_page", array(1 => ""), array("id" => "cm_field_show_on", "class" => "cm_static_field cm_required", "value" => $data->model->field_show_on_user_page, "longDesc"=>CM_UI_Strings::get('HELP_ADD_FIELD_SHOW_ON_USERPAGE'))));
$form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_IS_FIELD_EDITABLE') . ":</b>", "field_is_editable", array(1 => ""), array("id" => "cm_field_is_editable", "class" => "cm_static_field", "value" => $data->model->get_field_is_editable(), "longDesc"=>CM_UI_Strings::get('HELP_LABEL_IS_FIELD_EDITABLE'))));

$form->addElement(new CM_Element_HTML('<div id="scroll" style="display:none">'));
 $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_IS_REQUIRED_SCROLL') . ":</b>", "field_is_required_scroll", array(1 => ""), array("id" => "cm_field_is_required_scroll", "class" => "cm_static_field cm_required", "value" => $data->model->field_options->field_is_required_scroll, "longDesc" => CM_UI_Strings::get('HELP_ADD_FIELD_SHOW_ON_USERPAGE'))));
$form->addElement(new CM_Element_HTML('</div>'));
$form->addElement(new CM_Element_HTML('<div id="date_range" style="display:none" >'));
$form->addElement(new CM_Element_HTML('<div class="cmrow cm_sub_heading">' . CM_UI_Strings::get('TEXT_RANGE') . '</div>'));


 
 $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_IS_REQUIRED_RANGE') . ":</b>", "field_is_required_range", array(1 => ""), array("id" => "cm_field_is_required_range", "class" => "cm_field_is_required_range","value" => $data->model->field_options->field_is_required_range, "longDesc" => CM_UI_Strings::get('HELP_ADD_FIELD_BDATE_RANGE'))));

         $form->addElement(new CM_Element_jQueryUIDate("<b>" . CM_UI_Strings::get('LABEL_IS_REQUIRED_MAX_RANGE') . ":</b>", 'field_is_required_max_range', array('class' => 'cm_dateelement',"id" => "cm_is_required_max_range", "value" => $data->model->field_options->field_is_required_max_range, "longDesc" => CM_UI_Strings::get('HELP_ADD_FORM_AUTO_EXP_TIME_LIMIT'))));

$form->addElement(new CM_Element_HTML('<div class="cmrow" id="cm_range_error_row"><div class="cmfield" for="cm_field_value_options_textarea"><label></label></div><div class="cminput" id="cm_range_error_text"></div></div>'));

 
 $form->addElement(new CM_Element_HTML('</div>'));
// $form->addElement(new CM_Element_HTML('<div id="scroll" style="display:none">'));
// $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_IS_REQUIRED_SCROLL') . ":</b>", "field_is_required_scroll", array(1 => ""), array("id" => "cm_field_is_required_scroll", "class" => "cm_static_field cm_required", "value" => $data->model->field_options->field_is_required_scroll, "longDesc" => CM_UI_Strings::get('HELP_ADD_FIELD_REQUIRED_SCROLL'))));
//$form->addElement(new CM_Element_HTML('</div>'));
$form->addElement(new CM_Element_HTML('<div id="cm_no_api_notice" style="display:none">'.CM_UI_Strings::get('MSG_CM_NO_API_NOTICE').'</div>'));

//Button Area
$form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_field_manage&cm_form_id='.$data->form_id, array('class' => 'cancel')));
$form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn",  "onClick" => "jQuery.cm_prevent_field_add(event, '".CM_UI_Strings::get('MSG_REQUIRED_FIELD') ."')", "class" => "cm_btn", "name" => "submit")));



$form->render();
//array('field_type','field_label','field_value','field_default_value','field_order','field_options');
}
?>  
</div>
<?php 
    $cm_promo_banner_title = "Unlock all custom field types by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
    </div>

<?php
$ico_arr = cm_get_icons_array();
?>
<div class='cm_field_icon_res_container' id='id_cm_field_icon_reservoir' style='display:none'>    
<div class='cm_field_icon_reservoir'>
<?php
foreach( $ico_arr as $icon_name => $icon_codepoint):
    //var_dump($icon_codepoint);var_dump($f_icon->codepoint);
    if('&#x'.$icon_codepoint == $f_icon->codepoint) {
    ?>
    <i class="material-icons cm-icons-get-ready cm_active_icon" onclick="cm_select_icon(this)" id="cm-icon_<?php echo $icon_codepoint; ?>"><?php echo '&#x'.$icon_codepoint; ?></i>
    <?php }
    else {
        ?>
    <i class="material-icons cm-icons-get-ready" onclick="cm_select_icon(this)" id="cm-icon_<?php echo $icon_codepoint; ?>"><?php echo '&#x'.$icon_codepoint; ?></i>
    <?php }
    
endforeach;
?>
</div>
</div>

<pre class='cm-pre-wrapper-for-script-tags'><script>
function show_icon_reservoir(){
    jQuery('#id_cm_field_icon_reservoir').show();
    console.log("inside dialog function");
    jQuery(".cm_field_icon_reservoir").dialog();
}

function close_icon_reservoir(){
    jQuery('#id_cm_field_icon_reservoir').hide();
}

function cm_remove_icon(){    
        //Get old icon
        var oic = jQuery('#id_input_selected_icon').val();
        if(typeof oic != 'undefined')
        {
            if(oic)
            {
                var oicid =  'cm-icon_'+ (oic.slice(3));
                jQuery('#'+oicid).removeClass('cm_active_icon');
            }
        }
            
        //jQuery('#cm-icon_'+ico_cp).addClass('cm_active_icon');
        jQuery('#id_show_selected_icon').html('');
        jQuery('#id_input_selected_icon').val('');
}

function cm_select_icon(e){
    var icid = jQuery(e).attr('id'); id_show_selected_icon;
    if(typeof icid != 'undefined')
    {
        var x = icid.split('_');
        var ico_cp = x[1];
        
        //Get old icon
        var oic = jQuery('#id_input_selected_icon').val();
        if(typeof oic != 'undefined')
            {
               var oicid =  'cm-icon_'+ (oic.slice(3));
               jQuery('#'+oicid).removeClass('cm_active_icon');
            }
            
        jQuery('#cm-icon_'+ico_cp).addClass('cm_active_icon');
        jQuery('#id_show_selected_icon').html('&#x'+ico_cp);
        jQuery('#id_input_selected_icon').val('&#x'+ico_cp);
    }
}

function change_icon_fg_color(e){
    var fg_color = jQuery(e).val();
    jQuery('#id_show_selected_icon').css("color", "#"+fg_color);
}

function finechange_icon_fg_color(){
    var fg_color = jQuery(":input[name='icon_fg_color']").val();
    jQuery('#id_show_selected_icon').css("color", "#"+fg_color);
}

function change_icon_bg_color(e){
    var bg_color = jQuery(e).val();
    var r = parseInt(bg_color.slice(0,2),16);
    var g = parseInt(bg_color.slice(2,4),16);
    var b = parseInt(bg_color.slice(4,6),16);
    var a = jQuery(":input[name='icon_bg_alpha']").val();
    jQuery('#id_show_selected_icon').css("background-color", "rgba("+r+","+g+","+b+","+a+")");
}

function finechange_icon_bg_color(){
    var bg_color = jQuery(":input[name='icon_bg_color']").val();
    var r = parseInt(bg_color.slice(0,2),16);
    var g = parseInt(bg_color.slice(2,4),16);
    var b = parseInt(bg_color.slice(4,6),16);
    var a = jQuery(":input[name='icon_bg_alpha']").val();
    jQuery('#id_show_selected_icon').css("background-color", "rgba("+r+","+g+","+b+","+a+")");
}

function change_icon_shape(e){
    var shape = jQuery(e).val();
    if(shape == 'square')
        jQuery('#id_show_selected_icon').css("border-radius", "0px");
    else if(shape == 'round')
        jQuery('#id_show_selected_icon').css("border-radius", "100px");
    else if(shape == 'sticker')
        jQuery('#id_show_selected_icon').css("border-radius", "4px");
}

function cm_get_help_text(ftype){
    
    switch(ftype)
    {
        <?php foreach($field_types_array as $type => $disp_name) { if(!$type) continue;?>         
        case '<?php echo $type; ?>':return '<?php echo CM_UI_Strings::get("FIELD_HELP_TEXT_".$type); ?>';        
        <?php } ?>
        default: return '<?php echo CM_UI_Strings::get("HELP_ADD_FIELD_SELECT_TYPE"); ?>';
    }
}


</script></pre>

<pre class='cm-pre-wrapper-for-script-tags'><script>
 jQuery(document).ready(function () {
      jQuery(":input[name='icon_fg_color']").addClass("{onFineChange:'finechange_icon_fg_color()'}");
      jQuery(":input[name='icon_bg_color']").addClass("{onFineChange:'finechange_icon_bg_color()'}");
      
        jQuery("#cm_submit_btn").click(
            function (e) {
                if(jQuery(".cm_field_is_required_range").attr('checked'))
                {
              
               var max_date=new Date(jQuery("#cm_is_required_max_range").val());
               var min_date=new Date(jQuery("#cm_is_required_min_range").val());
               if(max_date<=min_date)
               {
                   jQuery('#cm_range_error_text').html('Invalid Range');
                   jQuery('#cm_range_error_row').show();
                   e.preventDefault();
               }
               }
               /*if(jQuery("#cm_field_max_length").val()!='')
               {
                   var max=jQuery("#cm_field_max_length").val();
                    if(max<10)
                    {
                        jQuery('#cm_length_error_text').html('Minimum length is 10');
                        jQuery('#cm_length_error_row').show();
                        e.preventDefault();
                    }
               }*/
            }            
        );
    });
    </script></pre>
