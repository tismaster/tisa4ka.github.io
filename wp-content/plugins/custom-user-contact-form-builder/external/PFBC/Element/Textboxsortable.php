<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class creates multiple sortable text fields which can be appended.
 * 
 * @internal You must have create an disabled text field with this field with attribute onClick = cm_append_field('li','cm_sortable_elements')
 *
 * @author CMSHelplive
 */
class CM_Element_Textboxsortable extends CM_Element
{

    protected $_attributes = array("type" => "text");
    protected $prepend;
    protected $append;
    private $others;

    public function __construct($label, $name, array $properties = null, array $others = array())
    {
        $configuration = array(
            "label" => $label,
            "name" => $name
        );

        $this->others = $others;

        /* Merge any properties provided with an associative array containing the label
          and name properties. */
        if (is_array($properties))
            $configuration = array_merge($configuration, $properties);

        $this->configure($configuration);
    }

    public function render()
    {
        $addons = array();
        if (!empty($this->prepend))
            $addons[] = "input-prepend";
        if (!empty($this->append))
            $addons[] = "input-append";
        if (!empty($addons))
            echo '<div class="', implode(" ", $addons), '">';
        
        $suffix = mt_rand(1, 500);
        $this->renderSortable('start',$suffix);
        for ($i = 0; $i <= $_SERVER['CM_COUNTER']; $i++)
        {
            $this->renderSortable("prepend",$suffix);
            $this->renderAddOn("prepend",$suffix);
            parent::render();
            if (!empty($this->others))
                $this->renderOthers($this->others, $i);
            
            $this->renderAddOn("append",$suffix);
            $this->renderSortable("append",$suffix);
        }
        
        $this->renderSortable('close',$suffix);
        $this->renderSortable('add_action',$suffix);
        $this->renderSortable('extra_option',$suffix);

        if (!empty($addons))
            echo '</div>';
    }

    protected function renderAddOn($type = "prepend")
    {
        if (!empty($this->$type))
        {
            $span = true;
            if (strpos($this->$type, "<button") !== false)
                $span = false;

            if ($span)
                echo '<span class="add-on">';

            echo $this->$type;

            if ($span)
                echo '</span>';
        }
    }

    protected function renderSortable($type = "prepend",$suffix='')
    {
        if ($type === "start")
            echo '<ul class = "cm_sortable_elements" id = "cm_sortable_elements_'.$suffix.'">';
        if ($type === "prepend")
            echo '<li class="appendable_options cm-deletable-options"><span class="cm_sortable_handle"><img alt="" src="'.  plugin_dir_url(dirname(dirname(dirname(__FILE__)))).'images/cm-drag-label.png"></span>';
        if ($type === "append")
            echo '<div class="cm_actions" onClick ="cm_delete_appended_field(this,cm_sortable_elements_'.$suffix.')"><a href="javascript:void(0)">' . CM_UI_Strings::get("LABEL_DELETE") . '</a></div></li>';
        if ($type === "close")
            echo '</ul>';
        if($type === "add_action")
            echo '<div class="cm_action_container" id="cm_action_container_id"><div class="cm_action" id="cm_action_field_container" onclick="cm_append_field(\'li\',this)"><input type="text" name="cm_dump" id="cm_append_option" class="cm_action_field" required="" readonly="true" value="' .CM_UI_Strings::get("VALUE_CLICK_TO_ADD"). ' "></div><div id="cmaddotheroptiontextdiv" style="display:none"><div onclick="jQuery.cm_append_textbox_other(this)">'.CM_UI_Strings::get('LABEL_ADD_OTHER').'</div></div></div>';
    }

    public function renderOthers(array $others, $curr_index)
    {
        $str = "";
        if (count($others) >= 1 && isset($others[0]))
            foreach ($others as $other_one)
            {
                $str = "<input ";
                if(is_array($other_one)){
                foreach ($other_one as $key => $value)
                {
                    if($key == 'value')
                    {
                        if(is_array($value))
                        {
                             $str .= $key . " = '" . $value[$curr_index] . "' ";
                             continue;
                        }
                    }

                    $str .= $key . " = '" . $value . "' ";
                }
                $str .= ">";}
                else
                    $str = "";
            } else
        {

            $str = "<input ";
            foreach ($others as $key => $value)
            {
                if(!is_int($key))
                {
                    if($key == 'value')
                    {
                        if(is_array($value))
                        {
                             $str .= $key . " = '" . $value[$curr_index] . "' ";
                             continue;
                        }
                    }
                    
                    $str .= $key . " = '" . $value . "' ";
                }
            }
            $str .= ">";
        }
        echo $str;
    }

}
