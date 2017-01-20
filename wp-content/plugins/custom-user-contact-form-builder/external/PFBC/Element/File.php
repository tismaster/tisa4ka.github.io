<?php
class CM_Element_File extends CM_Element {
	protected $_attributes = array("type" => "file");

    public function render() {
        $multiple= get_option('cm_option_allow_multiple_file_uploads');
        if($multiple=="yes"){
            $this->_attributes['multiple']= "multiple";
            $this->_attributes['name']= $this->_attributes['name'].'[]';
        }
        
        if($this->isRequired())
            $this->validation[] = new CM_Validation_File("", true);
        else
            $this->validation[] = new CM_Validation_File;
        
        parent::render();
    }
}
