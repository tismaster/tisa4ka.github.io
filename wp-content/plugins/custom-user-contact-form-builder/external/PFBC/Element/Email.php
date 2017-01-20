<?php
class CM_Element_Email extends CM_Element_Textbox {
	protected $_attributes = array("type" => "email");

	public function render() {
		$this->validation[] = new CM_Validation_Email;
		parent::render();
	}
}
