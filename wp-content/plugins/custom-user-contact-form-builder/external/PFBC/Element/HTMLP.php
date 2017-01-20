<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTMLP
 *
 * @author CMSHelplive
 */
class CM_Element_HTMLP extends CM_Element
{

    public function __construct($value,$class=null, array $properties = array())
    {
        $properties = array_merge(array("value" => $value, "class" => $class),$properties);
        parent::__construct("", "", $properties);
    }

    public function render()
    {
        $this->renderTag("prepend");
        echo $this->_attributes["value"];
        $this->renderTag("append");
    }
    
    public function renderTag($type = "prepend"){
        if($type === "prepend")
        {
            //Extract color attribute so that it can be applied to text.
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
            echo '<p '.$style_str.' class="cm_form_field_type_paragraph',$this->_attributes["class"]? ' '.$this->_attributes["class"]:null,'">';
        }
        if($type === "append")
            echo '</p>';
    }

}