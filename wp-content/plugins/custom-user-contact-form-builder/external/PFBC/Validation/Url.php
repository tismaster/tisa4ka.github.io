<?php
class CM_Validation_Url extends CM_Validation {
	protected $message;

   public function __construct($message = "") {
		//if(!empty($message))
		$this->message = CM_UI_Strings::get('FORM_ERR_INVALID_URL');
	}

	public function isValid($value) {
		if($this->isNotApplicable($value) || filter_var($value, FILTER_VALIDATE_URL))
			return true;
		return false;	
	}
}
