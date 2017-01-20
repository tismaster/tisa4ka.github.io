<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              
 * @since             3.0.0
 * @package           gorilla_forms
 *
 * @wordpress-plugin
 * Plugin Name:       GorillaForms
 * Plugin URI:        
 * Description:       A powerful system for customizing contact forms, setting up paid submissions, tracking submissions, analyzing stats and much more!!
 * Version:           3.0.1
 * Tags:              gorilla, form, custom, analytics, simple, submissions
 * Requires at least: 3.3.0
 * Author:            CMSHelplive
 * Author URI:        http://cmshelplive.com
 * Text Domain:       custom-user-contact-form-builder
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if(version_compare(PHP_VERSION, '5.3') < 0){

  if(is_admin()){

    function my_plugin_notice(){      
      ?>
      <div style="text-align:center;background-color:#ffffce;color:orange" class= "notice notice-error is-dismissible">
        <p>
        <?php
          printf(__('GorillaForms requires <b>at least PHP 5.3</b>. You have %s'), PHP_VERSION);
         ?>
        </p>
      </div>
      <?php 
      if (!function_exists('deactivate_plugins')) {
        require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
    }
    
    deactivate_plugins( plugin_basename(__FILE__ ) );
   
    }

    add_action('admin_notices', 'my_plugin_notice');
  }
  
  return;  
}



define('GORILLA_BASIC','99');
$cmsilver = 'custom-registration-form-builder-with-submission-manager-silver/registration_magic.php';
$cmgold = 'registrationmagic-gold/registration_magic.php';
$cmgoldi2 = 'registrationmagic-gold-i2/registration_magic.php';
$cmbasic = 'custom-registration-form-builder-with-submission-manager/registration_magic.php';

if (defined('GORILLA_SILVER') || defined('GORILLA_GOLD') || defined('GORILLA_GOLD_i2')) {
    return;    
}

/*if (!function_exists('is_plugin_active_for_network')) {
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}
if (is_plugin_active_for_network($cmgold) || is_plugin_active($cmgold) || 
    is_plugin_active_for_network($cmsilver) || is_plugin_active($cmsilver)) {
    return;    
}
*/
if(!defined('CM_PLUGIN_VERSION')) {
define('CM_PLUGIN_VERSION', '3.0.1');
define('CM_DB_VERSION', 4.5);
define('CM_SHOW_WHATSNEW_SPLASH', false);  //Set it to 'false' to disable whatsnew screen.
define('CM_PLUGIN_BASENAME', plugin_basename(__FILE__ ));
//define FB SDK req flags. Flags should be combined using logical OR and should be checked using AND.
define('CM_FB_SDK_REQ_PHP_NA', 0x2);  //Php version is not sufficient
define('CM_FB_SDK_REQ_EXT_NA', 0x4);  //mbstring extension not installed or disabled
define('CM_FB_SDK_REQ_OK', 0x1);      //Requirements met. DO NOT TEST FOR THIS FLAG USING &. use === instead.
//Error IDs
define('CM_ERR_ID_EXT_ZIP', 1);
define('CM_ERR_ID_EXT_CURL', 2);
define('CM_ERR_ID_EXT_SIMPLEXML', 3);
define('CM_ERR_ID_EXT_MCRYPT', 4);
define('CM_ERR_ID_EXT_MBSTRING', 5);
define('CM_ERR_ID_PHP_VERSION', 6);
define('CM_ERR_ID_SESSION_PATH', 7);

//Dependency flags
define('CM_REQ_PHP_VERSION', 0x8);
define('CM_REQ_EXT_ZIP', 0x10);
define('CM_REQ_EXT_CURL', 0x20);
define('CM_REQ_EXT_SIMPLEXML', 0x40);
define('CM_REQ_EXT_MCRYPT', 0x80);
define('CM_REQ_EXT_MBSTRING', 0x100);

define('CM_BASE_DIR', plugin_dir_path(__FILE__));
define('CM_BASE_URL', plugin_dir_url(__FILE__));
define('CM_ADMIN_DIR', CM_BASE_DIR . "admin/");
define('CM_PUBLIC_DIR', CM_BASE_DIR . "public/");
define('CM_IMG_DIR', CM_BASE_DIR . "images/");
define('CM_IMG_URL', plugin_dir_url(__FILE__) . 'images/');
define('CM_INCLUDES_DIR', CM_BASE_DIR . 'includes/');
define('CM_EXTERNAL_DIR', CM_BASE_DIR . 'external/');

//form types
define('CM_BASE_FORM', 99);
define('CM_CONTACT_FORM', 0);
define('CM_REG_FORM', 1);

//sent email types
    define('CM_EMAIL_GENERIC', 1);
    define('CM_EMAIL_AUTORESP', 2);
    define('CM_EMAIL_BATCH', 3);
    define('CM_EMAIL_USER_ACTIVATION_ADMIN', 4);
    define('CM_EMAIL_POSTSUB_ADMIN', 5);
    define('CM_EMAIL_USER_ACTIVATED_USER', 6);
    define('CM_EMAIL_PASSWORD_USER', 7); //MUST NOT BE SAVED IN DB!!
    define('CM_EMAIL_NOTE_MSG', 8); //Message sent from submission view. It is a note whose type is message.
    define('CM_EMAIL_NOTE_ADDED', 9);
    define('CM_EMAIL_TEST', 10);    

    $regmagic_errors = array(); //Global variable to store errors throghout the plugin, so that we can display the error msgs on proper screens which belong to our plugin.
    $cm_fb_sdk_req = CM_FB_SDK_REQ_OK;  //Set default value.
    $cm_env_requirements = 0;
//Check for plugin requirements before proceeding

function gorilla_forms_check_requirements() {
    global $cm_env_requirements;

    $installed_php_version = phpversion();
    //var_dump(get_loaded_extensions());die;
    if (version_compare('5.3', $installed_php_version, '<='))
        $cm_env_requirements |= CM_REQ_PHP_VERSION;
    
    if (extension_loaded('zip'))
        $cm_env_requirements |= CM_REQ_EXT_ZIP;

    if (extension_loaded('mcrypt'))
        $cm_env_requirements |= CM_REQ_EXT_MCRYPT;

    if (extension_loaded('SimpleXML'))
        $cm_env_requirements |= CM_REQ_EXT_SIMPLEXML;

    if (extension_loaded('curl'))
        $cm_env_requirements |= CM_REQ_EXT_CURL;
}

gorilla_forms_check_requirements();

/**
 * registers the plugin autoload
 */
function gorilla_forms_register_autoload() {
    require_once plugin_dir_path(__FILE__) . 'includes/class_cm_autoloader.php';

    $autoloader = new CM_Autoloader();
    $autoloader->register();
}
    /**
     * includes or initializes all the external libraries used in the plugin
     * 
     * @since 3.0.0
     */
    function gorilla_forms_include_external_libs() {
        $installed_php_version = phpversion();
        require_once CM_EXTERNAL_DIR . 'session/cm_wpdb_sessions.php';
        if(!session_id())
            session_start();
        require_once CM_EXTERNAL_DIR . 'PFBC/Form.php';
        require_once CM_EXTERNAL_DIR . 'mailchimp/class_cm_mailchimp.php';
        require_once CM_EXTERNAL_DIR . 'cron/cron_helper.php';        
        require_once CM_EXTERNAL_DIR . 'PayPal/paypal.php';
    }

    gorilla_forms_register_autoload();
    gorilla_forms_include_external_libs();

    register_activation_hook(__FILE__, 'CM_Activator::activate');
    register_deactivation_hook(__FILE__, 'CM_Deactivator::deactivate');

//Set up update check
    $cm_form_diary = array();
    
    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    3.0.0
     */
    function run_gorilla_forms() {
        $plugin = new Gorilla_Forms();
        $plugin->run();
    }

    run_gorilla_forms();
}
