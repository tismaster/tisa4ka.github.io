<?php
class CM_Element_Username extends CM_Element_Textbox {
	public function getJSFiles() {

	}
	public function render() {
		
		parent::render();              
	}
        
        
        public function jQueryDocumentReady() {    
          $form_id_array= explode('_', $this->_form->form_slug); 
          
          // Form int ID will always be on scond index eg: form_52_1
          $form_id= (int) $form_id_array[1];  
          $validation_msg= CM_UI_Strings::get("USERNAME_EXISTS");  
          echo <<<JS
            
                   
                   jQuery("#{$this->_attributes['id']}").change(function(){
                   var validation_msg= '{$validation_msg}';
                   var data = {
                           'action': 'cm_user_exists',
                           'cm_slug': 'cm_user_exists',
                           'username': jQuery(this).val(),
                           'attr': 'data-cm-valid-username',
                           'form_id':"{$form_id}"
                   };
                   
                   cm_user_exists(this,cm_ajax_url,data,"{$validation_msg}");
                  
                 });
           
JS;
            
        
        }
       
}
