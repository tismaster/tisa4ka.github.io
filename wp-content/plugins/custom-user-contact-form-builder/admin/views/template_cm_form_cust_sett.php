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
$form = new CM_PFBC_Form("cm_form_add");
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "action" => ""
));

if (isset($data->model->form_id)) {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . $data->model->form_name . '</div>'));
            $form->addElement(new CM_Element_HTML('<div class="cmsettingtitle">' . 'General Settings' . '</div>'));
            $form->addElement(new CM_Element_Hidden("form_id", $data->model->form_id));
        } else {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_FORM_PAGE") . '</div>'));
        }
        
$form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_form_manage&cm_form_id='.$data->model->form_id, array('class' => 'cancel')));
$form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "submit", "onClick" => "jQuery.cm_prevent_field_add(event,'This is a required field.')")));
$form->render();
?>
    </div>
    
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>

<?php


