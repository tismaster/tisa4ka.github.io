<?php
class CM_Element_Website extends CM_Element_Textbox {
	protected $_attributes = array("type" => "url");

	public function render() {
		$this->validation[] = new CM_Validation_Url;
		parent::render();
	}
}
