<?php

/**
 * @internal Plugin Template File [Add Text Type Field]
 * 
 * This view generates the form for adding text type field to the form
 */

$price_field_type = array("fixed" => "Fixed");

$fixed_class = "class = 'cm_hidden_element'";
$dd_class = "class = 'cm_hidden_element'";
        
if($data->selected_field == 'fixed'){
        $fixed_class = "";
        $dd_class = "class = 'cm_hidden_element'";
    }

?>

<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">
        
        <?php
        
$form = new CM_PFBC_Form("add-paypal-field");

$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "action" => ""
));

if (isset($data->model->field_id))
{
    $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_EDIT_PAYPAL_FIELD_PAGE") . '</div>'));
    $form->addElement(new CM_Element_Hidden("field_id", $data->model->field_id));
}
else
    $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_PAYPAL_FIELD_PAGE") . '</div>'));

$form->addElement(new CM_Element_Select("<b>" . CM_UI_Strings::get('LABEL_SELECT_TYPE') . ":</b>", "type", $price_field_type, array("value" => $data->selected_field, "id"=>"id_paypal_field_type_dd", "required" => "1", "onchange" => "cm_toggle_visiblity_pricing_fields(this)", "longDesc"=>CM_UI_Strings::get('HELP_ADD_PRICE_FIELD_SELECT_TYPE'))));
$form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_LABEL') . ":</b>", "name", array("id"=>"id_paypal_field_name_tb", /*"required" => "0",*/  "required" => "1", "value" => $data->model->name, "longDesc"=>CM_UI_Strings::get('HELP_ADD_PRICE_FIELD_LABEL'))));

$form->addElement(new CM_Element_HTML("<div id='id_block_fields_for_fixed' $fixed_class>"));
$form->addElement(new CM_Element_Number("<b>" . CM_UI_Strings::get('LABEL_PRICE') . ":</b>", "value", array("id"=>"id_paypal_field_value_no", /*"required" => "0",*/  "step"=>"0.01", "min"=>"0.01", "value" => $data->model->value, "longDesc" => CM_UI_Strings::get('HELP_PRICE_FIELD'))));
$form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_SHOW_ON_FORM') . ":</b>", "show_on_form", array(1 => ""), array("id"=>"id_paypal_field_visible_cb",  "value" => $data->show_on_form)));
$form->addElement(new CM_Element_HTML("</div>"));

$form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_paypal_field_manage', array('class' => 'cancel')));
$form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "onClick" => "jQuery.cm_prevent_field_add(event, '".CM_UI_Strings::get('MSG_REQUIRED_FIELD') ."')", "class" => "cm_btn", "name" => "submit")));
 
$form->render();

?>
         
    </div>
    <?php     
    $cm_promo_banner_title = "Unlock multiple pricing configurations by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
    
</div>

<?php   