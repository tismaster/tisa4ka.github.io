<?php
class CM_Validation_Date extends CM_Validation {
    protected $message;

    public function __construct($message = "") {
		//if(!empty($message))
		$this->message = CM_UI_Strings::get('FORM_ERR_INVALID_DATE');
	}

    public function isValid($value) {
        try {
            $date = new DateTime($value);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
