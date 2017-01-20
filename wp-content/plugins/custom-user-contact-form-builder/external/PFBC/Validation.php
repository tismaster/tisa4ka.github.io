<?php
abstract class CM_Validation extends CM_Base {
	protected $message;
	
	public function __construct($message = "") {
		if(!empty($message))
			$this->message = $message;
		else
			$this->message = CM_UI_Strings::get('FORM_ERR_INVALID');
	}

	public function getMessage() {
		return $this->message;
	}

	public function isNotApplicable($value) {
		if(is_null($value) || is_array($value) || $value === "")
			return true;
		return false;
	}

	public abstract function isValid($value);
}
