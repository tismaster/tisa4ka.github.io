<?php

class CM_View_SideBySide extends CM_View
{

    protected $class = "form-horizontal";

    public function render()
    {
        $this->_form->appendAttribute("class", $this->class);
       
        echo '<form', $this->_form->getAttributes(), '><fieldset>';
        $this->_form->getErrorView()->render();
        echo '<input type="hidden" name="cm_form_sub_id" value='.$this->_form->getAttribute('id').'>';
        echo '<input type="hidden" name="cm_form_sub_no" value='.$this->_form->getAttribute('number').'>';
        $elements = $this->_form->getElements();
        $elementSize = sizeof($elements);
        $elementCount = 0;
        for ($e = 0; $e < $elementSize; ++$e)
        {
            $element = $elements[$e];

            if ($element instanceof CM_Element_Hidden || $element instanceof CM_Element_HTML)
                $element->render();
            elseif ($element instanceof CM_Element_Button || $element instanceof CM_Element_HTMLL)
            {
                if ($e == 0 || (!$elements[($e - 1)] instanceof CM_Element_Button && !$elements[($e - 1)] instanceof CM_Element_HTMLL))
                    echo '<div class="buttonarea">';
                else
                    echo ' ';

                $element->render();

                if (($e + 1) == $elementSize || (!$elements[($e + 1)] instanceof CM_Element_Button && !$elements[($e + 1)] instanceof CM_Element_HTMLL))
                    echo '</div>';
            }elseif ($element instanceof CM_Element_HTMLH || $element instanceof CM_Element_HTMLP)
            {
                echo '<div class="cmrow">', $element->render(), '', $this->renderDescriptions($element), '</div>';
                ++$elementCount;
            } else
            {
                echo '<div class="cmrow">', $this->renderLabel($element), '<div class="cminput">', $element->render(), '</div>', $this->renderDescriptions($element), '</div>';
                ++$elementCount;
            }
        }

        echo '</fieldset></form>';
    }

    protected function renderLabel(CM_Element $element)
   {
        $label = $element->getLabel();
        
        if (!empty($label))
        {
            //echo '<label class="control-label" for="', $element->getAttribute("id"), '">';
            echo '<div class="cmfield" for="', $element->getAttribute("id"), '"><label>';
            if ($element->isRequired())
            {
            echo '<sup class="required">* </sup>';
            }
            echo $label, '</label></div>';
        }
    }

}
