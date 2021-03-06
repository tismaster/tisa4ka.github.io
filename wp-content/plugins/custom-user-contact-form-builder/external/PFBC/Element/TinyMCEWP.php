<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of TinyMCE-WP
 *
 * @author CMSHelplive
 */
class CM_Element_TinyMCEWP extends CM_Element {
    
    private $content;
    private $editor_id;
    private $settings;    
    
    
    public function __construct($label,$content,$editor_id,$settings=array(), array $properties = null)
    {
        $this->content = $content;
        $this->editor_id = $editor_id;
        $this->settings = $settings;

        if($properties == null)
            parent::__construct($label, $editor_id);
        else
            parent::__construct($label, $editor_id, $properties);
    }


    public function render() {

            return wp_editor($this->content, $this->editor_id, $this->settings);
    }
        
}
