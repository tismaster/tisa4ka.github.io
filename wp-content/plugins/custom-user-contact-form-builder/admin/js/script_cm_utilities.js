var cm_admin_js_data;
function delete_role(el,role){
    jQuery("#"+role).attr('checked','checked');
    jQuery.cm_do_action('cm_user_role_mananger_form','cm_user_role_delete');
}
function save_default_form(element,role)
{
    var data = {
			'action': 'cm_add_default_form',
			'form': element.value,
			'role':role
		};
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
                        jQuery("#select_"+role).hide();
                        jQuery("#label_"+role).html(response);
                        jQuery("#label_"+role).show();
                        if(response == '')
                        jQuery("#add_"+role).show();
                        else
                        jQuery("#change_"+role).show();
                 
		});
   
}

/*
 Utitlity function to show hide elements on checkbox onchange events.
 */

function checkbox_toggle_elements(el,elIds,mode){
    var ids= elIds.split(',');
    if(mode === undefined)
        mode= 0;
    if(el.checked){
        for(i=0;i<ids.length;i++){
            if(mode==1)
                jQuery("#"+ids[i]).hide(800);
            else
                jQuery("#"+ids[i]).show(800);
        }
    }else{
        for(i=0;i<ids.length;i++){
            if(mode==1)
                jQuery("#"+ ids[i]).show(800);
            else
                jQuery("#"+ ids[i]).hide(800);
        }
    }
}

function cm_checkbox_disable_elements(el,elIds,mode,callback,args){
	cm_hide_show(el);
    var ids= elIds.split(',');
    var is_checked = jQuery(el).is(':checked');
    if(mode === 0){
        is_checked = !is_checked;
    }
    jQuery.map(ids, function(id){
        if(is_checked){
            jQuery('#' + id).attr('disabled', true);
        }else{
            jQuery('#' + id).attr('disabled', false);
        }
        if(callback !== undefined && typeof callback === 'function'){
            if(args !== undefined && typeof args === 'array'){
                args.unshift(is_checked,id,mode);
                callback.apply(this, args);
            }else
                callback(is_checked,id,mode);
        }
    });
	
}

function cm_hide_show_radio(element)
{
  var  rates = jQuery(element).val();
  var classname =jQuery(element).attr('class');
var childclass=classname+'_childfieldsrow';
  if(rates=='page')
  {
   jQuery('#'+childclass).slideDown();
    jQuery('.cm_form_page').slideDown();   
     jQuery('.cm_form_url').slideUp();  
  }
  else if(rates=='url')
  {
  jQuery('#'+childclass).slideDown(); 
     jQuery('.cm_form_page').slideUp();   
    jQuery('.cm_form_url').slideDown();  
  }
  else
  {
      jQuery('#'+childclass).slideUp();
  }
   console.log(rates);
}
function cm_hide_show(element)
{
  
  var classname =jQuery(element).attr('class');
var childclass=classname+'_childfieldsrow';


 
if(jQuery(element).attr('checked'))
jQuery('#'+childclass).slideDown();
else
  jQuery('#'+childclass).slideUp();  


}
function cm_add_class(is_checked,el_id,mode,class_name){
    if(class_name === undefined){
        class_name = 'cm_prevent_empty';
    }
    if(mode === 0){
        is_checked = !is_checked;
    }
    
    if(is_checked)
        jQuery('#' + el_id).addClass(class_name);
    else
        jQuery('#' + el_id).removeClass(class_name);
}

function cm_append_field(tag, element) {
    jQuery(element).parents('#cm_action_container_id').prev().append("<" + tag + " class='appendable_options cm-deletable-options'>" + jQuery(element).parents('#cm_action_container_id').prev().children(tag + ".appendable_options").html() + "</" + tag + ">").children().children("input").last().val('');
}

function cm_load_page(element, page, get_var){
    get_var = typeof get_var !== 'undefined' ? get_var : 'form_id';
    window.location = '?page=cm_' + page + '&cm_' + get_var + '=' + jQuery(element).val();
}

function cm_load_page_multiple_vars(element, page, get_var, get_var_json){
    get_vars = get_var_json;

    var loc = '?page=cm_' + page;

    for (var key in get_vars) {
        if (get_vars.hasOwnProperty(key)) {
            loc += '&cm_'+key+'='+get_vars[key];
            //alert(key + " -> " + get_vars[key]);
        }
    }
    
    var eleval = jQuery(element).val();
    
    if(eleval == 'custom' || jQuery(element).hasClass('cm_custom_subfilter_dates')){
        var fromdate = jQuery('#cm_id_custom_subfilter_date_from').val();
        var uptodate = jQuery('#cm_id_custom_subfilter_date_upto').val();
        
        loc += '&cm_interval=custom&cm_fromdate=' + fromdate + '&cm_uptodate=' + uptodate;
    }   
    else{
        loc += '&cm_' + get_var + '=' + jQuery(element).val();
    }

    //alert(loc);
    window.location = loc;
}

function cm_toggle_field_add_form_fields(element){
    var field_type = jQuery(element).val();

    var field_type_help_text = cm_get_help_text(field_type);
    jQuery('#cm_field_type_select_dropdown').parent().next('.cmnote').children('.cmnotecontent').html(field_type_help_text);
        jQuery.cm_field_add_form_manage(field_type);
}

function cm_get_help_text_price_field(ftype){

    switch(ftype)
    {
        case 'fixed':return 'For setting fixed price payment with the form';
        case 'multisel':return 'Allow user to pick multiple items with individual prices. Price will calculated as cumulative for the selection for payment.';
        case 'dropdown':return 'Allows user to pick a single item from multiple items with individual prices.';
        case 'userdef':return 'Allows user to enter his/ her own price for payment with the form. Useful for accepting donations etc.';
        default: return 'Select  or change type of the price field if not already selected.';
    }
}

function cm_sort_forms(element,req_page){
    var val = jQuery(element).val();
    if(val === 'form_name')
        window.location = '?page=cm_form_manage&cm_sortby=' + val + '&cm_descending=false&cm_reqpage='+req_page;
    else
        window.location = '?page=cm_form_manage&cm_sortby=' + val + '&cm_reqpage='+req_page;


}

function cm_toggle_visiblity(element) {
    console.log(jQuery(element).val());
}

function cm_toggle_visiblity_pricing_fields(element) {
    field_type = jQuery(element).val();
    var field_type_help_text = cm_get_help_text_price_field(field_type);
    jQuery('#id_paypal_field_type_dd').parent().next('.cmnote').children('.cmnotecontent').html(field_type_help_text);

    jQuery.cm_setup_pricing_fields_visibility(field_type);


}

function cm_toggle_visiblity_layouts(element) {
    jQuery.cm_setup_layouts_visibility(jQuery(element).val());
}

function cm_delete_appended_field(element, element_id) {
    if (jQuery(element).parents("#".element_id).children(".appendable_options").length > 1)
        jQuery(element).parent(".appendable_options").remove();
}

function cm_handle_review_banner_click(action,info){
    var flag='';
    if(action=='skip')
        flag='wordpress'
    else
        flag=action;
    var data = {
        'action':'review_banner_handler',
        'type':flag,
        'info':info
    };
    jQuery.post(ajaxurl, data, function(response){
        
    });
    if(action=='feedback')
        window.open('https://registrationmagic.com/help-support/', 'my window','');
    if(action=='wordpress')
        window.open('https://wordpress.org/support/plugin/custom-registration-form-builder-with-submission-manager/reviews/', 'my window','');
   }

function cm_handle_newsletter_subscription_click(msg){
    var data = {
        'action':'newsletter_sub_handler'
    };
    jQuery.post(ajaxurl, data, function(){
        var el = jQuery('#cm_newsletter_sub');
        el.html(msg);
        el.fadeOut(1500);
    });
}

function cm_setup_google_charts(){

    if(typeof google != 'undefined'){
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages': ['corechart', 'bar']});

        // Set a callback to run when the Google Visualization API is loaded.

        //Since callback functions are defined in the templates, always
        //check for the existance of function beforehand so that javascript does not fail for other pages.
        if (typeof cm_drawConversionChart == 'function')
            google.charts.setOnLoadCallback(cm_drawConversionChart);

        if (typeof cm_drawBrowserUsageChart == 'function')
            google.charts.setOnLoadCallback(cm_drawBrowserUsageChart);

        if (typeof cm_drawConversionByBrowserChart == 'function')
            google.charts.setOnLoadCallback(cm_drawConversionByBrowserChart);
        
        if (typeof cm_drawTimewiseStat == 'function')
            google.charts.setOnLoadCallback(cm_drawTimewiseStat);

        if (typeof cm_drawMultipleFieldCharts == 'function')
            google.charts.setOnLoadCallback(cm_drawMultipleFieldCharts);
    }
}

function cm_load_js_data(){
        var data = {
            'action': 'cm_admin_js_data'
        };
        
        jQuery.post(ajaxurl, data, function (response) {
           cm_admin_js_data= JSON.parse(response);
        });
        
    }
    
    // Intializing the necessary scripts
jQuery(document).ready(function(){
    cm_load_js_data();
});

