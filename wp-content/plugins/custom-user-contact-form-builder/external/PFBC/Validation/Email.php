<?php
class CM_Validation_Email extends CM_Validation {
	protected $message;

	public function __construct($message = "") {
		//if(!empty($message))
		$this->message = CM_UI_Strings::get('FORM_ERR_INVALID_EMAIL');
	}

	public function isValid($value) {
		if($this->isNotApplicable($value) || filter_var($value, FILTER_VALIDATE_EMAIL))
			return true;
		return false;	
	}
}
