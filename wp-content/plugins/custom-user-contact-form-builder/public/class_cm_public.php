<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://registration_magic.com
 * @since      1.0.0
 *
 * @package    gorilla_forms
 * @subpackage gorilla_forms/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    gorilla_forms
 * @subpackage gorilla_forms/public
 * @author     CMSHelplive
 */
class CM_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $registraion_magic    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * The controller of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $controller    The main controller of this plugin.
     */
    private $controller;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    private static $editor_counter = 1;

    public function __construct($plugin_name, $version, $controller) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->controller = $controller;
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }

    public function get_controller() {
        return $this->controller;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     * 
     */
    public function enqueue_styles() {
        $settings = new CM_Options;
        $theme = $settings->get_value_of('theme');
        $layout = $settings->get_value_of('form_layout');

        switch ($theme) {
            case 'classic' :
                if ($layout == 'label_top')
                    wp_enqueue_style('cm_theme_classic_label_top', plugin_dir_url(__FILE__) . 'css/theme_cm_classic_label_top.css', array(), $this->version, 'all');
                elseif ($layout == 'two_columns')
                    wp_enqueue_style('cm_theme_classic_two_columns', plugin_dir_url(__FILE__) . 'css/theme_cm_classic_two_columns.css', array(), $this->version, 'all');
                else
                    wp_enqueue_style('cm_theme_classic', plugin_dir_url(__FILE__) . 'css/theme_cm_classic.css', array(), $this->version, 'all');
                break;

            /* case 'blue' :
              if ($layout == 'label_top')
              wp_enqueue_style('cm_theme_blue_label_top', plugin_dir_url(__FILE__) . 'css/theme_cm_blue_label_top.css', array(), $this->version, 'all');
              elseif ($layout == 'two_columns')
              wp_enqueue_style('cm_theme_blue_two_columns', plugin_dir_url(__FILE__) . 'css/theme_cm_blue_two_columns.css', array(), $this->version, 'all');
              else
              wp_enqueue_style('cm_theme_blue', plugin_dir_url(__FILE__) . 'css/theme_cm_blue.css', array(), $this->version, 'all');
              break; */

            default :
                if ($layout == 'label_top')
                    wp_enqueue_style('cm_theme_matchmytheme_label_top', plugin_dir_url(__FILE__) . 'css/theme_cm_matchmytheme_label_top.css', array(), $this->version, 'all');
                else
                    wp_enqueue_style('cm_theme_matchmytheme', plugin_dir_url(__FILE__) . 'css/theme_cm_matchmytheme.css', array(), $this->version, 'all');
                break;
        }
        //wp_enqueue_style('cm-jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css', false, $this->version, 'all');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/style_cm_front_end.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/script_cm_front.js', array('jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'jquery-ui-tabs', 'jquery-ui-datepicker','jquery-effects-core','jquery-effects-slide'), $this->version, false);
        wp_localize_script( $this->plugin_name, 'cm_ajax', array("url"=>admin_url('admin-ajax.php')) );
    }

    public function run_controller($attributes = null, $content = null, $shortcode = null) {
        return $this->controller->run();
    }

    public function cm_front_submissions() {
        if (CM_Utilities::fatal_errors()) {
            ob_start();
            include_once CM_ADMIN_DIR . 'views/template_cm_cant_continue.php';
            $html = ob_get_clean();
            return $html;
        }

        $xml_loader = CM_XML_Loader::getInstance(plugin_dir_path(__FILE__) . 'cm_config.xml');

        $request = new CM_Request($xml_loader);
        $request->setReqSlug('cm_front_submissions', true);

        $params = array('request' => $request, 'xml_loader' => $xml_loader);
        $this->controller = new CM_Main_Controller($params);
        return $this->controller->run();
    }

    public function cm_login($name) {
        if (CM_Utilities::fatal_errors()) {
            ob_start();
            include_once CM_ADMIN_DIR . 'views/template_cm_cant_continue.php';
            $html = ob_get_clean();
            return $html;
        }

        $xml_loader = CM_XML_Loader::getInstance(plugin_dir_path(__FILE__) . 'cm_config.xml');

        $request = new CM_Request($xml_loader);
        $request->setReqSlug('cm_login_form', true);

        $params = array('request' => $request, 'xml_loader' => $xml_loader);
        $this->controller = new CM_Main_Controller($params);
        return $this->controller->run();
    }

    public function cm_user_form_render($attribute) {
        if (CM_Utilities::fatal_errors()) {
            ob_start();
            include_once CM_ADMIN_DIR . 'views/template_cm_cant_continue.php';
            $html = ob_get_clean();
            return $html;
        }
        $xml_loader = CM_XML_Loader::getInstance(plugin_dir_path(__FILE__) . 'cm_config.xml');

        $request = new CM_Request($xml_loader);
        $request->setReqSlug('cm_user_form_process', true);
        
        $params = array('request' => $request, 'xml_loader' => $xml_loader, 'form_id' => isset($attribute['id']) ? $attribute['id'] : null);
        
        if(isset($attribute['force_enable_multiform']))
            $params['force_enable_multiform'] = true;
        
/*        if(isset($attribute['prefill_form']))
            $request->setReqSlug('cm_user_form_edit_sub', true);*/
        
        $this->controller = new CM_Main_Controller($params);
        return $this->controller->run();
    }

    public function register_otp_widget() {
        register_widget('CM_OTP_Widget');
    }

    function execute_login() {
        $xml_loader = CM_XML_Loader::getInstance(plugin_dir_path(__FILE__) . 'cm_config.xml');

        $request = new CM_Request($xml_loader);
        $request->setReqSlug('cm_login_form', true);

        $params = array('request' => $request, 'xml_loader' => $xml_loader);
        $this->controller = new CM_Main_Controller($params);
        return $this->controller->run();
    }

    public function cron() {
        CM_DBManager::delete_front_user(1, 'h');
    }


    public function do_shortcode($content, $ignore_html = false) {
        return do_shortcode($content, $ignore_html);
    }

    public function floating_action() {        
    }
    
    public function render_embed() {
        die;
    }


}
