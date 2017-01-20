<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
wp_enqueue_media();
$submit_btn_label = $data->model->get_form_options()->form_submit_btn_label ? : 'Submit';
wp_enqueue_script('cm-form_presentation', CM_BASE_URL. 'admin/js/script_cm_form_presentation.js', array(), null, false);
        echo '<style>';
        if($data->model->form_options->btn_hover_color)
            echo '.cm_btn_selector .cm_btn_focus:hover{ background-color:'.$data->model->form_options->btn_hover_color.' !important; }';
        if($data->model->form_options->field_bg_focus_color || $data->model->form_options->text_focus_color){
            echo '.cmagic .cmrow .cm_field_focus_bg:focus{';
            if($data->model->form_options->field_bg_focus_color)
                echo 'background-color:'.$data->model->form_options->field_bg_focus_color.' !important; } ';
            if($data->model->form_options->text_focus_color)
                echo '.cmagic .cmrow .cm_field_focus_text:focus { color:'.$data->model->form_options->text_focus_color.' !important; }';
            
        }
        echo '</style>';
?>
<pre class="cm-pre-wrapper-for-script-tags"><script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script></pre>

<div class="cmagic" ng-controller="formStyleCtrl"  ng-app="formStyleApp">
    <div class="operationsbar">
        <div class="cmtitle"><?php echo CM_UI_Strings::get('LABEL_FORM_PRESENTATION'); ?></div>
        <div class="nav">
            <ul><li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
              
                <li><a href="javascript:void(0)" ng-click='resetAll()' id="cm-field-selection-popup"><?php echo CM_UI_Strings::get('LABEL_RESET'); ?></a></li>
            </ul>
        </div>
    </div>
    <!--Dialogue Box Starts-->
    <fieldset class="cm_form_presentation_fs">
        <legend style="display:none" id="cm_section_name" style="<?php echo $data->model->form_options->style_section; ?>">Section Name</legend>
        <div class="cm_form_container">
            <div class="cm_style_container" id="cm_style_container" style='<?php echo $data->model->get_form_options()->style_form; ?>'>
                <div class="cm_element_selector"> <input class="cm_selector" type="button"  id="cm_form_selector" value="Form Selector" ng-click="selectForm()"/></div>

                <div class="cmrow cm_edit_form_ui">
                    <div class="cmfield" id="cm_field_label">Field Label</div>
                    <div class="cminput">
                        <input class="cm_field_focus_bg cm_field_focus_text" type="text" style='<?php echo $data->model->get_form_options()->style_textfield; ?>' placeholder="Field" id="cm_textfield" />
                    </div>
                    <div class="cm_element_selector">
                        <input  type="button" class="cm_selector"  id="cm_text_field_selector" value="Text Field Selector" ng-click="selectTextField()"/>
                    </div>

                    <div class="cm_style_action"  ng-show="selectedElement == 'cm_textfield'" >
                        <style-action-box selected-element="cm_textfield" el-text="true"></style-action-box>
                    </div>
                </div>
                <div class="cmrow cm_edit_form_ui">
                    <div class="cmfield" id="cm_field_label">Field Label</div>
                    <div class="cminput">
                        <input class="cm_field_focus_bg cm_field_focus_text" style='<?php echo $data->model->get_form_options()->style_textfield; ?>' type="text" placeholder="Field" id="cm_textfield" />
                    </div>
                </div>
                <div class="cmrow cm_edit_form_ui">
                    <div class="cmfield" id="cm_field_label">Field Label</div>
                    <div class="cminput">
                        <input class="cm_field_focus_bg cm_field_focus_text" style='<?php echo $data->model->get_form_options()->style_textfield; ?>' type="text" placeholder="Field" id="cm_textfield" />
                    </div>
                </div>
                <div class="cmrow cm_edit_form_ui">
                    <div class="cmfield" id="cm_field_label">Field Label</div>
                    <div class="cminput">
                        <input class="cm_field_focus_bg cm_field_focus_text" style='<?php echo $data->model->get_form_options()->style_textfield; ?>' type="text" placeholder="Field" id="cm_textfield" />
                    </div>
                </div>
                <div class="cm_style_action"  ng-show="selectedElement == 'cm_style_container'" >
                    <style-action-box selected-element="cm_style_container" el-form="true"></style-action-box>
                </div>
                <div class="cm_btn_selector">
                    <input class="cm_btn_focus" type="button" style='<?php echo $data->model->get_form_options()->style_btnfield; ?>' value="<?php echo $submit_btn_label; ?>" id="cm_btnfield"/>
                    <input type="button" class="cm_selector"   id="cm_button_field_selector" value="" ng-click="selectButtonField()"/>
                    <div class="cm_style_action" ng-show="selectedElement == 'cm_btnfield'" >
                        <style-action-box selected-element="cm_btnfield" el-btn="true"></style-action-box>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $data->model->get_form_id(); ?>" id="cm_form_id">
            </div>
        </div>
    </fieldset>
    
        <div class="cmnotice cm-invite-field-row" style="text-transform:none"><?php echo CM_UI_Strings::get('DISCLAIMER_FORM_VIEW_SETTING');?></div>

    <div class="buttonarea popup-button-group" style="">
        <div class="cancel">
            <a value="&amp;#8592; &amp;nbsp; Cancel" href="?page=cm_form_sett_manage&amp;cm_form_id=<?php echo $data->model->form_id; ?>" id="form_sett_post_sub-element-18">← &nbsp; Cancel</a>
        </div> 
        <input type="button" value="Save" name="submit" id="cm_submit_btn" class="cm_btn btn btn-primary popup-submit" ng-click="saveStyles()">
    </div>
    <div id="cm_styling_options" style="display:none">
        <div class="cm_pop_up_close" ng-click="close()">X</div>
        
        <div class="cm_pop_up_tab">
            <div id="cm_field_styling_options" ng-show="elText"> 
                <div class="cm_pop_up_row">
                    <label>Label Color </label>
                    <input type="text" id="cm_label_color" class="jscolor" ng-model="styles.label_color" ng-change="executeAction()" >
                </div>
                <div class="cm_pop_up_row">
                    <label>Text Color </label>
                    <input type="text" id="cm_text_color" class="jscolor" ng-model="styles.text_color" ng-change="executeAction()" >
                </div>
                <div class="cm_pop_up_row">
                    <label>Placeholder Color </label>
                    <input type="text" id="cm_placeholder_color" class="jscolor" ng-model="styles.placeholder_color" ng-change="executeAction()" >
                </div>
                
                <div class="cm_pop_up_row">
                    <label>Outline Color </label>
                    <input type="text" id="cm_outline_color" class="jscolor" ng-model="styles.text_outline_color" ng-change="executeAction()" >
                </div>
                
                <div class="cm_pop_up_row">
                    <label>Color on Focus </label>
                    <input type="text" id="cm_field_focus_color" class="jscolor" ng-model="styles.text_focus_color" ng-change="executeAction()" >
                </div>
                
                <div class="cm_pop_up_row">
                    <label>Background on Focus </label>
                    <input type="text" id="cm_field_bg_focus_color" class="jscolor" ng-model="styles.field_bg_focus_color" ng-change="executeAction()" >
                </div>
                
            </div>
            <div id="cm_form_styling_options" ng-show="elForm">
                <div class="cm_pop_up_row">
                    <label>Form Padding </label>
                    <input type="text" id="cm_padding" ng-model="styles.padding" value="0" ng-change="executeAction()" >
                </div>
            </div>
           
            <div id="cm_border_styling_options">
                <div class="cm_pop_up_row">
                    <label>Border Color </label>
                    <input type="text" id="cm_border_color" class="jscolor" ng-model="styles.border_color" ng-change="executeAction()" >
                </div>
                <div class="cm_pop_up_row">
                    <label>Border Width </label>
                    <input type="number" id="cm_border_width" ng-model="styles.border_width" ng-change="executeAction()">
                </div>
                <div class="cm_pop_up_row">
                    <label>Border Radius </label>
                    <input type="number" id="cm_border_radius" ng-model="styles.border_radius" ng-change="executeAction()" >
                </div>
                <div class="cm_pop_up_row">
                    <label>Border Style </label>
                    <select id="cm_border_style" ng-model="styles.border_style" ng-change="executeAction()" >
                        <option value="">Select Style</option>
                        <option>solid</option>
                        <option>dashed</option>
                        <option>dotted</option>
                        <option>double</option>
                        <option>groove</option>
                        <option>hidden</option>
                        <option>inherit</option>
                        <option>initial</option>
                        <option>inset</option>
                        <option>none</option>
                        <option>outset</option>
                        <option>ridge</option>
                    </select>    
                </div>
            </div>
            <div class="cm_pop_up_row">
                <label>Background Image</label>
                <input type="button" class="upload-btn" value="Upload" ng-click="mediaUploader()">
                <input type="button" class="cm_trash" ng-click="removeBackImage()" value="Remove">
            </div>
            <div class="cm_pop_up_row">
                <label>Image Repeat </label>
                <select id="cm_image_repeat" ng-model="styles.image_repeat" ng-change="executeAction()" >
                    <option selected value="">Select Repeat</option>
                    <option>repeat</option>
                    <option>inherit</option>
                    <option>initial</option>
                    <option>no-repeat</option>
                    <option>repeat-x</option>
                    <option>repeat-y</option>
                    <option>round</option>
                    <option>space</option>
                </select>    
            </div>
            <div id="cm_btn_styling_options" ng-show="elBtn">
                <div class="cm_pop_up_row">
                    <label>Button Label</label>
                    <input type="text" class="ng-pristine ng-untouched ng-valid" ng-change="executeAction()" ng-model="styles.btn_label">
                </div>
                <div class="cm_pop_up_row">
                    <label>Font Color</label>
                    <input type="text" class="jscolor" ng-change="executeAction()" ng-model="styles.btn_font_color"  >
                </div>
                
                <div class="cm_pop_up_tab">
                    <div class="cm_pop_up_row">
                        <label>Hover Color </label>
                        <input type="text" class="jscolor" id="cm_btn_hover_color" ng-model="styles.btn_hover_color" ng-change="executeAction()"  >
                    </div>   
                </div>
            </div>
            <div class="cm_pop_up_row">
                <label>Background Color </label>
                <input type="text" class="jscolor" id="cm_background_border" ng-model="styles.background_color" ng-change="executeAction()"  >
            </div>
            
            
            
        </div>
        
        <div id="cm_custom_style"><?php echo $data->model->form_options->placeholder_css; ?></div>
    </div>
</div>
