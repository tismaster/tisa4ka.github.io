<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$image_dir = plugin_dir_url(dirname(dirname(__FILE__))) . "images";

$layout_checked_state = array('label_left' => null, 'label_top' => null, 'two_columns' => null);

$two_col_class = '';

if ($data['theme'] == 'matchmytheme')
{
    if ($data['form_layout'] == 'label_top')
        $layout_checked_state['label_top'] = 'checked';
    else
        $layout_checked_state['label_left'] = 'checked';
    $two_col_class = 'class="cm_hidden_element"';
}
else
{
    if ($data['form_layout'] == 'two_columns')
        $layout_checked_state['two_columns'] = 'checked';
    else if ($data['form_layout'] == 'label_top')
        $layout_checked_state['label_top'] = 'checked';
    else
        $layout_checked_state['label_left'] = 'checked';
}

$layout_radio_button_html_string = '<div class="cmrow"><div class="cmfield" for="layout_radio"><label>' .
        CM_UI_Strings::get('LABEL_LAYOUT') .
        '</label></div><div class="cminput"><ul class="cmradio">' .
        '<li><div id="layout_left_container"><div class="cmlayoutimage"><img src="' . $image_dir . '/label-left.png" /></div><input id="layout_radio-1" type="radio" name="form_layout" value="label_left" ' . $layout_checked_state['label_left'] . '>' .
        CM_UI_Strings::get('LABEL_LAYOUT_LABEL_LEFT') .
        '</div></li><li><div id="layout_top_container"><div class="cmlayoutimage"><img src="' . $image_dir . '/label-top.png" /></div><input id="layout_radio-2" type="radio" name="form_layout" value="label_top" ' . $layout_checked_state['label_top'] . '>' .
        CM_UI_Strings::get('LABEL_LAYOUT_LABEL_TOP') .
        '</div></li><li><div id="layout_two_columns_container"' . $two_col_class . '><div class="cmlayoutimage"><img src="' . $image_dir . '/two-column.png" /></div><input id="layout_radio-3" type="radio" name="form_layout" value="two_columns" ' . $layout_checked_state['two_columns'] . '>' .
        CM_UI_Strings::get('LABEL_LAYOUT_TWO_COLUMNS') .
        '</div></li></ul></div><div class="cmnote"><div class="cmprenote"></div><div class="cmnotecontent">' .
        CM_UI_Strings::get('HELP_OPTIONS_GEN_LAYOUT') .
        '</div></div></div>';


//echo $layout_radio_button_html_string;
?>


<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">


        <?php
        $pages = get_pages();
        $wp_pages = CM_Utilities::wp_pages_dropdown();

        $form = new CM_PFBC_Form("options_general");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));

        $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get('GLOBAL_SETTINGS_GENERAL') . '</div>'));
        $form->addElement(new CM_Element_Select(CM_UI_Strings::get('LABEL_FORM_STYLE'), "theme", array("classic" => "Classic", "matchmytheme" => "Match my theme"), array("value" => $data['theme'], "id" => "theme_dropdown", "onchange" => "cm_toggle_visiblity_layouts(this)", "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_GEN_THEME'))));

        $form->addElement(new CM_Element_HTML($layout_radio_button_html_string));
        
        //Temporarily disable promo
        //$form->addElement(new CM_Element_Textarea(CM_UI_Strings::get('LABEL_ALLOWED_FILE_TYPES'), "buy_pro", array("value" => $data['allowed_file_types'], 'disabled' => 1, "longDesc" => CM_UI_Strings::get('ALLOWED_FILE_TYPES_HELP'), "validation" => new CM_Validation_RegExp("/[a-zA-Z0-9| ]*/", CM_UI_Strings::get('MSG_INVALID_CHAR')), "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_GEN_FILETYPES') . '<br><br>' . CM_UI_Strings::get('MSG_BUY_PRO_INLINE'))));
        //Temporarily disable promo
        //$form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_ALLOWED_MULTI_FILES'), "buy_pro_2", array("yes" => ''), array("value" => "no", 'disabled' => 1, "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_GEN_FILE_MULTIPLE') . "<br><br>" . CM_UI_Strings::get('MSG_BUY_PRO_INLINE'))));

        $form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_SHOW_PROG_BAR'), "display_progress_bar", array("yes" => ''), $data['display_progress_bar'] == 'yes' ? array("value" => "yes", "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_GEN_PROGRESS_BAR')) : array("longDesc" => CM_UI_Strings::get('HELP_OPTIONS_GEN_PROGRESS_BAR'))));

                
  $submission_type=array(
             "all"=>"All",
             "today"=>"Today",
             "week"=>"This week",
             "month"=>"This month",
             "year"=>"This year"
             
        );
         $form->addElement(new CM_Element_Select(CM_UI_Strings::get('LABEL_SUBMISSION_ON_CARD'), "submission_on_card", $submission_type, array("value" => $data['submission_on_card'], "longDesc" => CM_UI_Strings::get('HELP_SUBMISSION_ON_CARD'))));
        $form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_SHOW_ASTERIX'), "show_asterix", array("yes" => ''), $data['show_asterix'] == 'yes' ? array("value" => "yes", "longDesc" => CM_UI_Strings::get('HELP_SHOW_ASTERIX')) : array("longDesc" => CM_UI_Strings::get('HELP_SHOW_ASTERIX'))));
       
        $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_options_manage', array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE')));
        $form->render();
        ?> 

    </div>
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>
<pre class="cm-pre-wrapper-for-script-tags"><script type="text/javascript">
    jQuery(document).ready(function(){
       jQuery('#cm_floating_btn_type_rd-0').click(function(){
           jQuery('#floating_btn_txt_tb').slideUp();
       });
       jQuery('#cm_floating_btn_type_rd-1, #cm_floating_btn_type_rd-2').click(function(){
                      jQuery('#floating_btn_txt_tb').slideDown();
       });
    });
</script></pre>

<?php   
