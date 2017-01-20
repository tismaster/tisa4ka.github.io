<?php
class CM_Element_HTML extends CM_Element {
	public function __construct($value) {
		$properties = array("value" => $value);
		parent::__construct("", "", $properties);
	}

	public function render() { 
		echo $this->_attributes["value"];
	}
}
