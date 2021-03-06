jQuery(document).ready(function () {
    jQuery('.cm-query-ask').click(function () {
        jQuery(this).siblings('.cm-query-answer').show();
    });
    
    jQuery('.cm-collapsible').click(function () {
        jQuery(this).parent().siblings().toggle();
        jQuery(this).toggleClass('cm-collapsible cm-collapsed');
    });
});

//hide a container when clicked outside
jQuery(document).mouseup(function (e) {
        var container = jQuery(".cm-query-answer");
        if (!container.is(e.target) // if the target of the click isn't the container... 
                && container.has(e.target).length === 0) // ... nor a descendant of the container 
        {
            container.hide();
        }
    });
/**
 * function to copy a element's content to clipboard. 
 * use limited to only non input type elements
 * 
 * @param {DOM Element} target  Element which has the content to be copied to clipboard
 */
function cm_copy_to_clipboard(target) {

    var text_to_copy = jQuery(target).text();

    var tmp = jQuery("<input id='fd_form_shortcode_input' readonly>");
    var target_html = jQuery(target).html();
    jQuery(target).html('');
    jQuery(target).append(tmp);
    tmp.val(text_to_copy).select();
    var result = document.execCommand("copy");

    if (result != false) {
        jQuery(target).html(target_html);
        jQuery("#cm_msg_copied_to_clipboard").fadeIn('slow');
        jQuery("#cm_msg_copied_to_clipboard").fadeOut('slow');
    } else {
        jQuery(document).mouseup(function (e) {
            var container = jQuery("#fd_form_shortcode_input");
            if (!container.is(e.target) // if the target of the click isn't the container... 
                    && container.has(e.target).length === 0) // ... nor a descendant of the container 
            {
                jQuery(target).html(target_html);
            }
        });
    }
}

function cm_fd_switch_form(form_id, timerange){
   if(form_id)
   {
       if(typeof timerange != 'undefined')
           location.href = '?page=cm_form_sett_manage&cm_form_id='+form_id+'&cm_tr='+timerange;
       else
           location.href = '?page=cm_form_sett_manage&cm_form_id='+form_id;
   }
}

function cm_fd_quick_toggle(elem, form_id) {
    var option_name = jQuery(elem).attr('name');
    var option_val;
    if (jQuery(elem).is(':checked'))
        option_val = true;
    else
        option_val = false;

    var data = {
        'action': 'cm_toggle_form_option',
        'cm_slug': 'cm_form_sett_qck_toggle',
        'form_id': form_id,
        'name': option_name,
        'value': option_val
    }

    jQuery.post(ajaxurl, data, function (response) {
        console.log(response);
    });

}


