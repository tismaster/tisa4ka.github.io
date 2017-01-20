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
        $form = new CM_PFBC_Form("add-note");

        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));

        if ($data->model->get_note_id())
        {
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_EDIT_NOTE_PAGE") . '</div>'));
            $form->addElement(new CM_Element_Hidden("note_id", $data->model->get_note_id()));
        } else
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get("TITLE_NEW_NOTE_PAGE") . '</div>'));

        $form->addElement(new CM_Element_Hidden("submission_id", $data->submission_id));

        $form->addElement(new CM_Element_Textarea("<b>" . CM_UI_Strings::get('LABEL_NOTE_TEXT') . ":</b>", "notes", array("class" => "cm-static-field cm_field_value", "value" => $data->model->get_notes())));
        $form->addElement(new CM_Element_Color("<b>" . CM_UI_Strings::get('LABEL_NOTE_COLOR') . ":</b>", "bg_color", array("class" => "jscolor", "value" => $data->model->get_note_options()->bg_color)));
        $form->addElement(new CM_Element_Checkbox("<b>" . CM_UI_Strings::get('LABEL_VISIBLE_FRONT') . ":</b>", "status", array(1 => ""), array("class" => "cm-static-field cm_input_type", "value" => $data->model->get_status())));

        $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_submission_view&cm_submission_id=' . $data->submission_id, array('class' => 'cancel')));
        $form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE'), "submit", array("id" => "cm_submit_btn", "class" => "cm_btn", "name" => "submit")));

        $form->render();
        ?>
    </div>
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>

</div>
