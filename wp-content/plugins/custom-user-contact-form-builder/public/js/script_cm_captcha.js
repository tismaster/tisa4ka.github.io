/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cmInitCaptcha(){
    jQuery('.g-recaptcha').each(function(index, el) {
        grecaptcha.render(el, {'sitekey' : cm_captcha_site_key});
    });
}


