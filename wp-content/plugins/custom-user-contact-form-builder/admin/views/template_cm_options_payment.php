<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//$data [] = 
$curr_arr = array('USD' => 'US Dollars',
    'EUR' => 'Euros',
    'GBP' => 'Pounds Sterling',
    'AUD' => 'Australian Dollars',
    'BRL' => 'Brazilian Real',
    'CAD' => 'Canadian Dollars',
    'CZK' => 'Czech Koruna',
    'DKK' => 'Danish Krone',
    'HKD' => 'Hong Kong Dollar',
    'HUF' => 'Hungarian Forint',
    'ILS' => 'Israeli Shekel',
    'JPY' => 'Japanese Yen',
    'MYR' => 'Malaysian Ringgits',
    'MXN' => 'Mexican Peso',
    'NZD' => 'New Zealand Dollar',
    'NOK' => 'Norwegian Krone',
    'PHP' => 'Philippine Pesos',
    'PLN' => 'Polish Zloty',
    'SGD' => 'Singapore Dollar',
    'SEK' => 'Swedish Krona',
    'CHF' => 'Swiss Franc',
    'TWD' => 'Taiwan New Dollars',
    'THB' => 'Thai Baht',
    'INR' => 'Indian Rupee',
    'TRY' => 'Turkish Lira',
    'RIAL' => 'Iranian Rial',
    'RUB' => 'Russian Rubles');

$options_s_api = array("id" => "cm_s_api_key_tb", "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_PYMNT_STRP_API_KEY'), "disabled" => true);
$options_s_pub = array("id" => "cm_s_publish_key_tb", "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_PYMNT_STRP_PUBLISH_KEY') . CM_UI_Strings::get('MSG_BUY_PRO_INLINE'), "disabled" => true);
$options_pp_test_cb = array("id" => "cm_pp_test_cb", "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_PYMNT_TESTMODE'));
$options_pp_email = array("id" => "cm_pp_email_tb", "value" => $data['paypal_email'], "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_PYMNT_PP_EMAIL'));
$options_pp_pstyle = array("id" => "cm_pp_style_tb", "value" => $data['paypal_page_style'], "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_PYMNT_PP_PAGESTYLE'));

if($data['paypal_test_mode'] == 'yes')
    $options_pp_test_cb['value'] = 'yes';
    
?>

<div class="cmagic">

    <!--Dialogue Box Starts-->
    <div class="cmcontent">


        <?php
//PFBC form
        $form = new CM_PFBC_Form("options_payment");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "action" => ""
        ));

        $form->addElement(new CM_Element_HTML('<div class="cmheader">' . CM_UI_Strings::get('GLOBAL_SETTINGS_PAYMENT') . '</div>'));
        //Temporarily disable promo, removed Stripe from array.
        $form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_PAYMENT_PROCESSOR'), "payment_gateway", array("paypal" => "<img src='" . CM_IMG_URL . "/paypal-logo.png" . "'></img>"/*, "stripe" => "<img src='" . CM_IMG_URL . "/stripe-logo.png" . "'></img>"*/), array("value" => $data['payment_gateway'], "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_PYMNT_PROCESSOR'))));
        
        //Temporarily disable promo
        //$form->addElement(new CM_Element_HTML('<div class="childfieldsrow cmchildstripe">'));
        //$form->addElement(new CM_Element_Textbox(CM_UI_Strings::get('LABEL_STRIPE_API_KEY'), "", $options_s_api));
        //$form->addElement(new CM_Element_Textbox(CM_UI_Strings::get('LABEL_STRIPE_PUBLISH_KEY'), "", $options_s_pub));
        //$form->addElement(new CM_Element_HTML('</div>'));
        $form->addElement(new CM_Element_HTML('<div class="childfieldsrow cmchildpaypal">'));
        $form->addElement(new CM_Element_Checkbox(CM_UI_Strings::get('LABEL_TEST_MODE'), "paypal_test_mode", array("yes" => ''), $options_pp_test_cb));
        $form->addElement(new CM_Element_Email(CM_UI_Strings::get('LABEL_PAYPAL_EMAIL'), "paypal_email", $options_pp_email));
        $form->addElement(new CM_Element_Textbox(CM_UI_Strings::get('LABEL_PAYPAL_STYLE'), "paypal_page_style", $options_pp_pstyle));
        $form->addElement(new CM_Element_HTML('</div>'));


        $form->addElement(new CM_Element_Select(CM_UI_Strings::get('LABEL_CURRENCY'), "currency", $curr_arr, array("value" => $data['currency'], "longDesc" => CM_UI_Strings::get('HELP_OPTIONS_PYMNT_CURRENCY'))));
        $form->addElement(new CM_Element_Select(CM_UI_Strings::get('LABEL_CURRENCY_SYMBOL'), "currency_symbol_position", array("before" => "Before amount (Eg.: $10)", "after" => "After amount (Eg.: 10$)"), array("value" => $data['currency_symbol_position'], "longDesc" => CM_UI_Strings::get("LABEL_CURRENCY_SYMBOL_HELP"))));

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
    jQuery(document).ready(function () {
        jQuery('#options_payment-element-1-0').click(function () {
            cm_checkbox_disable_elements(this, 'cm_pp_test_cb-0,cm_pp_email_tb,cm_pp_style_tb', 0);
        });
        jQuery('#options_payment-element-1-1').attr("disabled", true);
    });
</script></pre>

<?php   
