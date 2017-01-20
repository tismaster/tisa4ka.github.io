<?php
class CM_Validation_Numeric extends CM_Validation {
	protected $message;

	public function __construct($message = "") {
		//if(!empty($message))
		$this->message = CM_UI_Strings::get('FORM_ERR_INVALID_NUMBER');
	}

	public function isValid($value) {
		if($this->isNotApplicable($value) || is_numeric($value))
			return true;
		return false;	
	}
}
