<?php


$form->addElement(new CM_Element_Textbox("<b>" . CM_UI_Strings::get('LABEL_USERNAME'). "</b>:", "username", array("required" => "1","placeholder"=>CM_UI_Strings::get('LABEL_USERNAME'))));

/*
 * Skip password field if auto generation is on
 */
if(!$is_auto_generate){
    $form->addElement(new CM_Element_Password("<b>" . CM_UI_Strings::get('LABEL_PASSWORD') . "</b>:", "password",array("required"=>1, "longDesc"=>CM_UI_Strings::get('HELP_PASSWORD_MIN_LENGTH'),"minLength"=>7, "validation" => new CM_Validation_RegExp("/.{7,}/", "Error: The %element% must be atleast 7 characters long."))));

}

?>


