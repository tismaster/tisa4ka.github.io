<?php

$option_string='';
if($data->forms){
    foreach($data->forms as $form){
        $option_string .= '<option value="'.$form->form_id.'">'.$form->form_name.'</option>';
    }
}
?>

<select id="cm_editor_add_form">
    <option value="0"><?php echo CM_UI_Strings::get("LABEL_ADD_FORM"); ?></option>
    <?php echo $option_string; ?>
</select>


<?php
/*
}else{
    ?>
<select id="cm_editor_add_form">
    <option value="0"><?php echo CM_UI_Strings::get("LABEL_NO_FORMS"); ?></option>
</select>
<?php

}
*/

