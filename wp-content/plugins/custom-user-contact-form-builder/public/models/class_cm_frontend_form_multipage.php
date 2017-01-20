<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CM_Frontend_Form_Multipage extends CM_Frontend_Form_Base
{

    protected $form_pages;

    public function __construct(CM_Forms $be_form, $ignore_expiration=false)
    {
        parent::__construct($be_form, $ignore_expiration);

        if ($this->form_options->form_pages == null)
            $this->form_pages = array('Page 1');
        else
            $this->form_pages = $this->form_options->form_pages;
    }

    public function get_form_pages()
    {
        return $this->form_pages;
    }

    public function pre_sub_proc($request, $params)
    {
        return true;
    }

    public function post_sub_proc($request, $params)
    {
        return true;
    }
    
    //Following two methods can be overloaded by child classes in order to add custom fields to any page of the form.
    protected function hook_pre_field_addition_to_page($form, $page_no)
    {
        
    }
    
    protected function hook_post_field_addition_to_page($form, $page_no)
    {
        
    }

    protected function prepare_fields_for_render($form)
    {        
       
        //foreach ($this->form_pages as $k => $page)
        {$i = 1;//actual page no.
            //if ($i == 1)
            {$n=1;
                $form->addElement(new CM_Element_HTML("<div class=\"cmformpage_form_".$this->form_id."_".$this->form_number."\" id=\"cm_form_page_form_".$this->form_id ."_".$this->form_number. "_".$n."\">"));
                $this->hook_pre_field_addition_to_page($form, $i);
                    foreach ($this->fields as $field)
                    {
                        $pf = $field->get_pfbc_field();
                            
                        if (!$pf)
                            continue;

                        if (is_array($pf))
                        {
                            foreach ($pf as $f)
                            {
                                if (!$f)
                                    continue;
                                $form->addElement($f);
                            }
                        } else
                            $form->addElement($pf);
                        
                    }
                    $this->hook_post_field_addition_to_page($form, $i);
                    $form->addElement(new CM_Element_HTML("</div>"));
            } 
            
        }

        
    }
    
    protected function prepare_button_for_render($form)
    {
        if ($this->service->get_setting('theme') != 'matchmytheme')
        {
            if(isset($this->form_options->style_btnfield))
                unset($this->form_options->style_btnfield);
        }
        $btn_label = $this->form_options->form_submit_btn_label;
        //$form->addElement(new CM_Element_Button("Prev", "button", array("bgColor" => "#$submit_btn_bgcolor", "fgColor" => "#$submit_btn_fgcolor", "id"=>"cm_prev_form_page_button", "onclick"=>'gotoprev()', "disabled"=>"1")));
        $form->addElement(new CM_Element_Button($btn_label != "" ? $btn_label : "Submit", "button", array(
"style" => isset($this->form_options->style_btnfield)?$this->form_options->style_btnfield:null,"id"=>"cm_next_form_page_button_".$this->form_id.'_'.$this->form_number,"onclick"=>'gotonext_form_'.$this->form_id.'_'.$this->form_number.'()')));
        //$form->addElement(new CM_Element_Button($btn_label != "" ? $btn_label : "Submit", "submit", array("bgColor" => "#$submit_btn_bgcolor", "fgColor" => "#$submit_btn_fgcolor")));
        
        $this->insert_JS($form);
    }
    
    protected function get_jqvalidator_config_JS()
    {
$str = <<<JSHD
        jQuery.validator.setDefaults({errorClass: 'cm-form-field-invalid-msg',
                                        ignore:[],
                                       errorPlacement: function(error, element) {
                                                            error.appendTo(element.closest('.cminput'));
                                                          }
                                    });
JSHD;
        return $str;
    }

    protected function insert_JS($form)
    {
        $max_page_count = 1;
        $form_identifier = "form_".$this->get_form_id();
        $form_id = $this->get_form_id();
        $validator_js = $this->get_jqvalidator_config_JS();
        
        $jqvalidate = CM_Utilities::enqueue_external_scripts('cm_jquery_validate', "https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js");
        $jqvalidate .= CM_Utilities::enqueue_external_scripts('cm_jquery_validate_add', "https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.min.js");
        
        $str = <<<JSHD
                
   <pre class='cm-pre-wrapper-for-script-tags'><script>
                
if (typeof window['cm_multipage'] == 'undefined') {

    cm_multipage = {
        global_page_no_{$form_identifier}_{$this->form_number}: 1
    };

}
else
 cm_multipage.global_page_no_{$form_identifier}_{$this->form_number} = 1;

function gotonext_{$form_identifier}_{$this->form_number}(){
	
        maxpage = {$max_page_count} ;
        {$validator_js}
        if(jQuery("#cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}+" :input").length > 0)
        {
            var valid = jQuery("#cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}+" :input").valid();
                        
            if(!valid)
            {
                jQuery(document).find("input.cm-form-field-invalid-msg")[0].focus(); 
                return;
            }
        }
        
        // Server validation for Username and Email field 
        for(var i=0;i<cm_validation_attr.length;i++){
            var validation_flag= true;
            jQuery("[" + cm_validation_attr[i] + "=0]").each(function(){
               validation_flag= false;
               return false;
            });
            
            if(!validation_flag)
              return;
        }
        
        
        cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}++;
        
        //skip blank form pages
        while(jQuery("#cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}+" :input").length == 0)
        {
        
            if(maxpage <= cm_multipage.global_page_no_{$form_identifier}_{$this->form_number})
            {
                    if(jQuery("#cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}+" :input").length == 0){
                        jQuery("#cm_next_form_page_button_{$form_id}_{$this->form_number}").prop('type','submit');
                        jQuery("#cm_prev_form_page_button_{$form_id}_{$this->form_number}").prop('disabled',true);
                        return;
                    }        
                    else
                        break;
            }
        
            cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}++;
        }
            
	
	if(maxpage < cm_multipage.global_page_no_{$form_identifier}_{$this->form_number})
	{
		cm_multipage.global_page_no_{$form_identifier}_{$this->form_number} = maxpage;
		jQuery("#cm_next_form_page_button_{$form_id}_{$this->form_number}").prop('type','submit');
                jQuery("#cm_prev_form_page_button_{$form_id}_{$this->form_number}").prop('disabled',true);
		return;
	}
	jQuery(".cmformpage_{$form_identifier}_{$this->form_number}").each(function (){
		var visibledivid = "cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number};
		if(jQuery(this).attr('id') == visibledivid)
			jQuery(this).show();
		else
			jQuery(this).hide();
	})  
    jQuery("#cm_prev_form_page_button_{$form_id}_{$this->form_number}").prop('disabled',false);
        cmInitGoogleApi();
}
function gotoprev_{$form_identifier}_{$this->form_number}(){
	
	maxpage = {$max_page_count} ;
	cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}--;
        jQuery("#cm_next_form_page_button_{$form_id}_{$this->form_number}").attr('type','button');        
        
        //skip blank form pages
        while(jQuery("#cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}+" :input").length == 0)
        {
            if(1 >= cm_multipage.global_page_no_{$form_identifier}_{$this->form_number})
            {
                    if(jQuery("#cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}+" :input").length == 0){
                        cm_multipage.global_page_no_{$form_identifier}_{$this->form_number} = 1;
                        jQuery("#cm_prev_form_page_button_{$form_id}_{$this->form_number}").prop('disabled',true);
                        return;
                    }        
                    else
                        break;
            }
        
            cm_multipage.global_page_no_{$form_identifier}_{$this->form_number}--;
        }
        
	jQuery(".cmformpage_{$form_identifier}_{$this->form_number}").each(function (){
		var visibledivid = "cm_form_page_{$form_identifier}_{$this->form_number}_"+cm_multipage.global_page_no_{$form_identifier}_{$this->form_number};
		if(jQuery(this).attr('id') == visibledivid)
			jQuery(this).show();
		else
			jQuery(this).hide();
	})
        
        if(cm_multipage.global_page_no_{$form_identifier}_{$this->form_number} <= 1)
        {
            cm_multipage.global_page_no_{$form_identifier}_{$this->form_number} = 1;
            jQuery("#cm_prev_form_page_button_{$form_id}_{$this->form_number}").prop('disabled',true);
        }
}


jQuery(document).ready( function(){

})          
</script></pre>
JSHD;
        $str = $jqvalidate.$str;
        $form->addElement(new CM_Element_HTML($str));
    }

}
