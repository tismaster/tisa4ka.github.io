<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CM_Frontend_Field_Select extends CM_Frontend_Field_Multivalue
{
    //protected $field_value; //Choices from which user can select

    public function __construct($id, $label, $options, $value, $page_no = 1, $is_primary = false, $extra_opts = null)
    {
       
        if(isset($options['value']))
        {
        if(!is_array($options['value']))
            $options['value'] = CM_Utilities::trim_array(explode(',', $options['value']));
        else
            $options['value'] = $options['value'];
        }
        parent::__construct($id, 'Select', $label, $options, $value, $page_no, $is_primary, $extra_opts);
        
        if(isset($options['multiple']))
            $multiple=$options['multiple'];
        else
            $multiple='';    
        $options = array();
        
        if(!is_array($value))
            $tmp_options = CM_Utilities::trim_array(explode(',', $value));
        else
            $tmp_options = $value;
        
        foreach ($tmp_options as $val)
            $options[$val] = trim($val);
        
        if($multiple=='multiple')
              $options = array(null => CM_UI_Strings::get('SELECT_FIELD_MULTI_OPTION')) + $options;
        else
             $options = array(null => CM_UI_Strings::get('SELECT_FIELD_FIRST_OPTION')) + $options;
       
        $this->field_value = $options;        
    }
}
