<?php

class CM_Element_Captcha extends CM_Element {

    protected $privateKey = "";
    protected $publicKey = "";

    public function __construct($label = "", array $properties = null) {
        $this->publicKey = get_option('cm_option_public_key');
        $this->privateKey = get_option('cm_option_private_key');
        parent::__construct($label, "recaptcha_response_field", $properties);
    }

    public function render() {
        $this->validation[] = new CM_Validation_Captcha($this->privateKey);
        require_once(dirname(__FILE__) . "/../Resources/recaptchalib.php");
        echo cm_recaptcha_get_html($this->publicKey);
    }

    public function getJSFiles() {
        return array(
            'script_cm_captcha' => CM_BASE_URL . 'public/js/script_cm_captcha.js',
            'google_captcha_api' => $this->_form->getPrefix() . "://www.google.com/recaptcha/api.js?onload=cmInitCaptcha&render=explicit",
        );
    }

    public function getJSDeps() {
        return array(
            'script_cm_captcha'
        );
    }
    
}
