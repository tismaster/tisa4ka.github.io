<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Emailsortable
 *
 * @author CMSHelplive
 */
class CM_Element_Emailsortable extends CM_Element_Textboxsortable
{
   protected $_attributes = array("type" => "email");

	public function render() {
		$this->validation[] = new CM_Validation_Email;
		parent::render();
	}
}
