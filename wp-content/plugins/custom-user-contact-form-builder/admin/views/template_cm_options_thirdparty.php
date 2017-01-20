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
        
$form = new CM_PFBC_Form("options_thirdparty");
    $form->configure(array(
        "prevent" => array("bootstrap","jQuery"),
        "action" => ""
    ));
  
            $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get('GLOBAL_SETTINGS_EXTERNAL_INTEGRATIONS') . '</div>'));
    
     $form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_MAILCHIMP_INTEGRATION'), "enable_mailchimp", array("yes" => ''),array("id" => "id_cm_enable_mc_cb", "class" => "id_cm_enable_mc_cb" , "value" =>  $data['enable_mailchimp'],  "onclick" => "cm_hide_show(this)", "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_THIRDPARTY_MC_ENABLE'))));

       if ($data['enable_mailchimp'] == 'yes')
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="id_cm_enable_mc_cb_childfieldsrow">'));
        else
            $form->addElement(new CM_Element_HTML('<div class="childfieldsrow" id="id_cm_enable_mc_cb_childfieldsrow" style="display:none">'));
       
        $form->addElement(new CM_Element_Textbox(CM_UI_Strings::get('LABEL_MAILCHIMP_API'), "mailchimp_key", array("value" => $data['mailchimp_key'], "id" => "id_cm_mc_key_tb", "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_THIRDPARTY_MC_API'))));
        $form->addElement(new CM_Element_HTML("</div>"));
        
        //Temporarily disable promo
        //$form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_CONSTANT_CONTACT_OPTION_INTEGRATION'), "enable_ccontact", array("yes" => ''),array("id" => "", "class" => "" , "value" =>  "","disabled"=>"disabled","readonly"=>"readonly", "longDesc" => CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
        //Temporarily disable promo
        //$form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_AWEBER_OPTION_INTEGRATION'), "enable_aweber", array("yes" => ''),array("id" => "", "class" => "" , "value" =>  "","disabled"=>"disabled","readonly"=>"readonly", "longDesc" => CM_UI_Strings::get('MSG_BUY_PRO_BOTH_INLINE'))));
          $form->addElement(new CM_Element_HTMLL('&#8592; &nbsp; Cancel', '?page=cm_options_manage', array('class' => 'cancel')));
$form->addElement(new CM_Element_Button(CM_UI_Strings::get('LABEL_SAVE')));
    
    $form->render();
    ?>
    </div>
    <?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>

<?php   