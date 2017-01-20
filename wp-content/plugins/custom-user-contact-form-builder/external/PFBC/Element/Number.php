<?php
class CM_Element_Number extends CM_Element_Textbox {
	protected $_attributes = array("type" => "number");

	public function render() {
		$this->validation[] = new CM_Validation_Numeric;
		parent::render();
	}
}
