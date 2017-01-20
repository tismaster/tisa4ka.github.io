/**
 * FILE for all the javascript functionality for the front end of the plugin
 */
/* For front end OTP widget */
var cm_ajax_url= cm_ajax.url;
var cm_validation_attr= ['data-cm-valid-username','data-cm-valid-email'];
var cm_js_data;

function cmInitGoogleApi() {
    if (typeof cmInitMap === 'function') {
        var cm_all_maps = document.getElementsByClassName("cm-map-controls-uninitialized");

        var i;
        var curr_id = '';

        for (i = 0; i < cm_all_maps.length; i++) {
            if(jQuery(cm_all_maps[i]).is(':visible')){
            curr_id = cm_all_maps[i].getAttribute("id");
            jQuery(cm_all_maps[i]).removeClass("cm-map-controls-uninitialized");
            cmInitMap(curr_id);
        }
        }
    }
}

function cm_scroll_down_end(element) {

    if (element.scrollTop + element.offsetHeight >= element.scrollHeight)
    {
        var div = jQuery(element).parent().siblings();
        jQuery(div).children().removeAttr('disabled');

    }
    else
    {
    var text_height = jQuery(element).css('font-size').replace('px', '');
        text_height = Math.ceil(parseInt(text_height));
        var field_height = Math.floor(jQuery(element).height());
        var line_per_field = Math.floor(jQuery(element).height() / text_height);
        var text = jQuery(element).val();
        var lines = text.split(/\r|\r\n|\n/);
        var count = text.length;
        
        var count = count / field_height;
        
        var count = Math.floor(count);
        
        lines = lines.length;
       count =count *line_per_field;
        if (lines > count)
            count = lines;
     
        if (count <= line_per_field)
        {
            count = 1;
        }
        
        if ((count * field_height) <= field_height) {

            var div = jQuery(element).parent().siblings();

               jQuery(div).children().removeAttr('disabled');

        }
    }
   
}

var cm_call_otp = function (event,elem,opType) {
   
    if (event.keyCode == 13 || opType=="submit") {

        var otp_key_status = jQuery("." + elem + " #cm_otp_login #cm_otp_enter_otp #cm_otp_kcontact").is(":visible");
        var user_key_status = jQuery("." + elem + " #cm_otp_login #cm_otp_enter_password #cm_otp_kcontact").is(":visible");
        
        var data = {
            'action': 'cm_set_otp',
            'cm_otp_email': jQuery("." + elem + " #cm_otp_econtact").val(),
            'cm_slug': 'cm_front_set_otp'
        };
        if (otp_key_status)
        {
            data.cm_otp_key = jQuery("." + elem + " #cm_otp_enter_otp #cm_otp_kcontact").val();
        }else
            if(user_key_status){
                if(jQuery("." + elem + " #cm_rememberme").is(':checked'))
                    data.cm_remember = 'yes';
                data.cm_username = jQuery("." + elem + " #cm_username").val();
                data.cm_user_key = jQuery("." + elem + " #cm_otp_enter_password #cm_otp_kcontact").val();
            }
            

        jQuery.post(cm_ajax_url, data, function (response) {
            var responseObj = jQuery.parseJSON(response);
            if (responseObj.error == true) {
                jQuery("." + elem + " #cm_otp_login .cm_f_notifications .cm_f_error").hide().html(responseObj.msg).slideDown('slow');
                jQuery("." + elem + " #cm_otp_login .cm_f_notifications .cm_f_success").hide();
                //jQuery("#cm_otp_login " + responseObj.hide).hide('slow');
            } else {
                jQuery("." + elem + " #cm_otp_login .cm_f_notifications .cm_f_error").hide();
                jQuery("." + elem + " #cm_otp_login .cm_f_notifications .cm_f_success").hide().html(responseObj.msg).slideDown('slow');
                jQuery("." + elem + " #cm_otp_login " + responseObj.show).show('slide',{direction: 'left'},100);
                jQuery("." + elem + " #cm_otp_login " + responseObj.hide).hide('slide',{direction: 'left'},1000);

                if(responseObj.username){
                    jQuery("." + elem + " #cm_username").val(responseObj.username);
                }else
                    jQuery("." + elem + " #cm_username").val('');
                
                if (responseObj.reload) {
                    location.reload();
                }
                
                if (responseObj.redirect) {
                    window.location = responseObj.redirect;
                }
                
            }
        });
    }
};

/*All the functions to be hooked on the front end at document ready*/
jQuery(document).ready(function () {
    if(jQuery('#id_cm_tp_timezone').length > 0)
       jQuery('#id_cm_tp_timezone').val(-new Date().getTimezoneOffset()/60);
    jQuery('.cm_tabbing_container').tabs();
jQuery('.cm_terms_textarea').each(function () {
    var a = jQuery(this).children('textarea');
      if (a.length > 0)
            cm_scroll_down_end(a);
   }); 
   
    jQuery("#cm_f_mail_notification").show('fast', function () {
        jQuery("#cm_f_mail_notification").fadeOut(3000);
    });
    
    jQuery(document).ajaxStart(function () {
        jQuery("#cm_f_loading").show();
    });
    jQuery(document).ajaxComplete(function () {
        jQuery("#cm_f_loading").hide();
    });
        
 /*----Invocations for HelpText----*/
 /*   jQuery("input, textarea, select").on ({
        focusin: function () {cmHelpTextIn(this);},
        focusout: function () {cmHelpTextOut(this);}
    });*/
    
    jQuery(".cminput").on ({
        click: function () {cmHelpTextIn2(this);},
        mouseleave: function () {cmHelpTextOut2(this);}
    });
    
    jQuery("input, select, textarea").blur(function (){
        jQuery(this).parents(".cminput").siblings(".cmnote").fadeOut('fast');
    });
 
});

//Helptext function 
function cmHelpTextIn2(a) {
    var helpTextNode = jQuery(a).siblings(".cmnote");
    var fieldHeight = jQuery(a).parent().outerHeight();
    var topPos = fieldHeight - 50;
    var id = setInterval(frame, 2);
    helpTextNode.fadeIn(500);
    function frame() {
        if (topPos === fieldHeight) {
            clearInterval(id);
        } else {
            topPos++;
            helpTextNode.css('top', topPos + "px");
            }
        }
    } 

function cmHelpTextOut2(a) {
    jQuery(a).siblings(".cmnote").fadeOut('fast');
}



function cm_setup_payment_method_visibility(payment_method_type,form_id,form_no) {

    switch (payment_method_type)
    {
        case 'paypal':
            jQuery('#cm_stripe_fields_container_'+form_id+'_'+form_no).slideUp();
            break;
        case 'stripe':
            jQuery('#cm_stripe_fields_container_'+form_id+'_'+form_no).slideDown();
            break;
    }
}


/*launches all the functions assigned to an element on click event*/

function cm_performClick(elemId, s_id, f_id) {
    var elem = document.getElementById(elemId);
    if (elem && document.createEvent) {
        var evt = document.createEvent("MouseEvents");
        evt.initEvent("click", true, false);
        elem.dispatchEvent(evt);
    }
}


function cm_append_field(tag, element_id) {
    jQuery('#' + element_id).append("<" + tag + " class='appendable_options'>" + jQuery('#' + element_id).children(tag + ".appendable_options").html() + "</" + tag + ">");
}

function cm_delete_appended_field(element, element_id) {
    if (jQuery(element).parents("#".element_id).children(".appendable_options").length > 1)
        jQuery(element).parent(".appendable_options").remove();
}

var cm_toggleFloatingScreens= function(screen_name){
   jQuery("#" + screen_name).animate({width:'toggle'},300,"linear");
   //jQuery("#" + screen_name).slideToggle('medium');
   jQuery('.cm_floating_screens .cm_hidden').not("#" + screen_name).hide();
}

var cm_closeFloatingScreens= function(screen_name){
   jQuery("#" + screen_name).animate({width:'toggle'},300,"linear",function(){
        jQuery(this).hide();
   });
   //jQuery('.cm_floating_screens .cm_hidden').hide('medium');
}

var cm_empty_tp_entry = function(tpid){
    jQuery("#" + tpid).val('');
}

var cm_user_exists= function(el,url,data,msg){ 
    var valid;
    jQuery.post(url, data, function(response) {
        elementId= jQuery(el).attr('id');
        if(response=="true"){
              // if(!jQuery("#" + elementId + "-error").length)
            jQuery(el).parent(".cminput").append('<label id="' + elementId + '-error" class="cm-form-field-invalid-msg">' + msg + '</label>');  
            jQuery(el).attr(data.attr,0);
            if (jQuery('#cm-menu').length > 0) {
             jQuery("#cm-menu").css('transform', 'translateY(0px)');
             }		              
        }
        else{   
                if(jQuery("#" + elementId + "-error").html()==msg)
                    jQuery("#" + elementId + "-error").remove();
                    
                jQuery(el).attr(data.attr,1);
            }
     });
}

function cm_load_js_data(){
    var data = {
        'action': 'cm_js_data'
    };

    jQuery.post(cm_ajax_url, data, function (response) {
       cm_js_data= JSON.parse(response);
       cm_initialize_valdation_strings();
    });

}

function cm_initialize_valdation_strings(){
    if(typeof jQuery.validator != 'undefined'){
        cm_js_data.validations.maxlength = jQuery.validator.format(cm_js_data.validations.maxlength);
        cm_js_data.validations.minlength = jQuery.validator.format(cm_js_data.validations.minlength);
        cm_js_data.validations.max = jQuery.validator.format(cm_js_data.validations.max);
        cm_js_data.validations.min = jQuery.validator.format(cm_js_data.validations.min);
        jQuery.extend(jQuery.validator.messages,cm_js_data.validations); 
    }
}
// Intializing the necessary scripts
jQuery(document).ready(function(){
    cm_load_js_data();
});
