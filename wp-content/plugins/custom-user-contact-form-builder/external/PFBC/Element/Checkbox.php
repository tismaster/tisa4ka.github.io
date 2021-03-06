<?php
class CM_Element_Checkbox extends CM_OptionElement {
	protected $_attributes = array("type" => "checkbox");
	protected $inline;
        
         public function jQueryDocumentReady(){
            if(isset($this->_attributes["cm_is_other_option"]) && $this->_attributes["cm_is_other_option"] == 1){
                echo <<<JS
            
                   
                   jQuery("input[name='{$this->_attributes['name']}']").change(function(){
                   var obj_op = jQuery("#{$this->_attributes['id']}_other_section");
                    if(jQuery(this).attr('id')=='{$this->_attributes["id"]}_other')
                    {
                        if(jQuery(this).prop('checked')){
                             obj_op.slideDown();
                             obj_op.children("input[type=text]").attr('disabled', false);
                            }
                        else{
                            obj_op.slideUp();
                            obj_op.children("input[type=text]").attr('disabled', true);
                        }  
                    } 
                    
                  
                 });
                 
                jQuery('#{$this->_attributes["id"]}_other_input').change(function(){
                    jQuery('#{$this->_attributes["id"]}_other').val(jQuery(this).val());
                }) ; 
               
JS;
            }
              
             
        }
        
	public function render() { 
		if(isset($this->_attributes["value"])) {
			if(!is_array($this->_attributes["value"]))
				$this->_attributes["value"] = array($this->_attributes["value"]);
		}
		else
			$this->_attributes["value"] = array();

		if(substr($this->_attributes["name"], -2) != "[]")
			$this->_attributes["name"] .= "[]";

		$labelClass = 'cmradio';//'cm'. $this->_attributes["type"];
		if(!empty($this->inline))
			$labelClass .= " inline";

		$count = 0;//Extract color attribute so that can be applied to text as well.
                $style_str = "";
                if(isset($this->_attributes["style"]))
                {
                    $al = explode(';',$this->_attributes["style"]);                    
                    foreach($al as $a)
                    {
                        if(strpos(trim($a),"color:")=== 0)
                        {
                            $style_str ='style="'.$a.'";'; 
                            break;
                        }
                    }
                }
                echo '<ul class="' .$labelClass. '" '.$style_str.'">';
		foreach($this->options as $value => $text) {
			$value = $this->getOptionValue($value);
                        
                        echo '<li> <input id="', $this->_attributes["id"], '-', $count, '"', $this->getAttributes(array("id", "value", "checked")), ' value="', $this->filter($value), '"';
			//echo '<label class="', $labelClass, '"> <input id="', $this->_attributes["id"], '-', $count, '"', $this->getAttributes(array("id", "value", "checked", "required")), ' value="', $this->filter($value), '"';
			if($value && in_array($value, $this->_attributes["value"]))
				echo ' checked="checked"';
			//echo '/> ', $text, ' </label> ';
			echo '/> ', $text, ' </li> ';
			++$count;
		}
                if(isset($this->_attributes["cm_is_other_option"]) && $this->_attributes["cm_is_other_option"] == 1){                    
                    $other_val = '';
                    if(isset($this->_attributes["value"])):
                    //get value of "other" field to be prefilled if provided.
                    $diff = array_diff($this->_attributes["value"], array_keys($this->options));                    
                    if(count($diff)===1)
                    {
                        $other_val = array_values($diff);
                        $other_val = $other_val[0];
                    }
                    endif;
                   echo '<li>';
                   if(!$other_val)
                   {
                   echo '<input type="checkbox" value="" id="'.$this->_attributes["id"].'_other" name="'.$this->getAttribute("name").'" style="'.$this->getAttribute("style").'">Other</li>'.
                        '<li id="'.$this->_attributes["id"].'_other_section" style="display:none">'.
                        '<input style="'.$this->getAttribute("style").'" type="text" id="'.$this->_attributes["id"].'_other_input" disabled>';
                   }
                   else
                   {
                    echo '<input type="checkbox" value="" id="'.$this->_attributes["id"].'_other" name="'.$this->getAttribute("name").'" style="'.$this->getAttribute("style").'" checked>Other</li>'.
                        '<li id="'.$this->_attributes["id"].'_other_section">'.
                        '<input style="'.$this->getAttribute("style").'" type="text" id="'.$this->_attributes["id"].'_other_input" value="'.$other_val.'">';   
                   }
                   echo  '</li>';
                }
                    echo '</ul>';
	}
}
