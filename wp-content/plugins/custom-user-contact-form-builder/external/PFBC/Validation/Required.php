<?php
class CM_Validation_Required extends CM_Validation {
	protected $message = "";

	function __construct(){
		$this->message= " %element% ".CM_UI_Strings::get("ERROR_REQUIRED");
	}

	public function isValid($value) {
		$valid = false;
                if(is_array($value) && isset($value['original'])){
                    $value = $value['original'];
                }
		if(!is_null($value) && ((!is_array($value) && $value !== "") || (is_array($value) && !empty($value))))
			$valid = true;
		return $valid;	
	}
}
