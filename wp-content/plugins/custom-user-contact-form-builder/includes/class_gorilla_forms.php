<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://registration_magic.com
 *
 * @package    gorilla_forms
 * @subpackage gorilla_forms/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @package    gorilla_forms
 * @subpackage gorilla_forms/includes
 * @author     CMSHelplive
 */
class Gorilla_Forms
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @access   protected
     * @var      CM_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @access   protected
     * @var      string    $registraion_magic    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * The controller of this plugin.
     *
     * @access   private
     * @var      string    $controller    The main controller of this plugin.
     */
    protected $controller;

    /**
     * The xml_loader of this plugin.
     *
     * @access   private
     * @var      string    $xml_loader    The xml loader of this plugin.
     */
    protected $xml_loader;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     */
    public function __construct()
    {
        $this->plugin_name = 'GorillaForms';
        $this->version = CM_PLUGIN_VERSION;
        $this->loader = new CM_Loader();
        $this->set_locale();
        $this->define_global_hooks();

        $this->xml_loader = CM_XML_Loader::getInstance(plugin_dir_path(__FILE__) . 'cm_config.xml');

        $request = new CM_Request($this->xml_loader);
        $params = array('request' => $request, 'xml_loader' => $this->xml_loader);
        $this->controller = new CM_Main_Controller($params);
        $this->define_public_hooks();
        $this->define_admin_hooks();
        $this->add_ob_start($request->req['cm_slug']);
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @access   private
     */
    private function set_locale()
    {

        $cm_i18n = new CM_i18n();

        $this->loader->add_action('plugins_loaded', $cm_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @access   private
     */
    private function define_admin_hooks()
    {
        $cm_admin = new CM_Admin($this->get_plugin_name(), $this->get_version(), $this->get_controller());

        $this->loader->add_action('admin_enqueue_scripts', $cm_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $cm_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_menu', $cm_admin, 'add_menu');
        $this->loader->add_action('wp_ajax_cm_sort_form_fields', $this->controller, 'run');
        $this->loader->add_action('wp_ajax_cm_get_stats', $this->controller, 'run');
        $this->loader->add_action('wp_dashboard_setup', $cm_admin, 'add_dashboard_widget');
        $this->loader->add_action('edit_user_profile', $cm_admin, 'user_edit_page_widget');
        $this->loader->add_action('show_user_profile', $cm_admin, 'user_edit_page_widget');
        $this->loader->add_action('wp_ajax_cm_test_smtp_config', 'CM_Utilities', 'check_smtp');
        $this->loader->add_action('wp_ajax_cm_get_fields', 'CM_Map_MailChimp_Controller', 'get_mc_list_field');
        $this->loader->add_action('wp_ajax_cm_save_form_view_sett', 'CM_Form_Settings_Controller', 'view');
        $this->loader->add_action('wp_ajax_review_banner_handler', 'CM_Utilities', 'handle_rating_operations');
        $this->loader->add_action('wp_ajax_newsletter_sub_handler', 'CM_Utilities', 'disable_newsletter_banner');
        $this->loader->add_action('wp_ajax_set_default_form', 'CM_Utilities', 'set_default_form');
        $this->loader->add_action('wp_ajax_cm_activate_user', 'CM_Utilities', 'link_activate_user');
        $this->loader->add_action('wp_ajax_nopriv_cm_activate_user', 'CM_Utilities', 'link_activate_user');
        $this->loader->add_action('wp_ajax_import_first', 'CM_Services', 'import_form_first');
        $this->loader->add_filter('plugin_action_links', $this, 'add_plugin_link', 10, 5);
        $this->loader->add_action('media_buttons', $cm_admin, 'add_new_form_editor_button');
        $this->loader->add_action('media_buttons', $cm_admin, 'add_field_autoresponder');
        $this->loader->add_action('plugins_loaded', 'CM_Utilities', 'safe_login', 10);
        $this->loader->add_action('wp_ajax_import_data', 'CM_Services', 'import_form');
        $this->loader->add_action('wp_ajax_cm_admin_js_data', 'CM_Utilities', 'load_admin_js_data');
        $this->loader->add_action('wp_ajax_cm_add_default_form', 'CM_User_Services', 'add_default_form');
        $this->loader->add_action('wp_ajax_send_email_user_view', 'CM_User_Services', 'send_email_ajax');
        $this->loader->add_action('wp_ajax_cm_save_submit_label', 'CM_Utilities', 'save_submit_label');
        $this->loader->add_filter('admin_notices', $cm_admin, 'add_global_setting_notice', 10, 5);
        $this->loader->add_action('wp_ajax_joyride_tour_update', 'CM_Utilities', 'update_tour_state_ajax');
        $this->loader->add_action('wp_ajax_remove_queue', $cm_admin, 'remove_queue');
        
   }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @access   private
     */
    private function define_public_hooks()
    {
        $cm_public = new CM_Public($this->get_plugin_name(), $this->get_version(), $this->get_controller());

        $this->loader->add_action('init', $cm_public, 'cron');
        $this->loader->add_action('wp_enqueue_scripts', $cm_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $cm_public, 'enqueue_scripts');

        //$this->loader->add_action('media_buttons', $cm_public, 'add_field_invites');
        //$this->loader->add_shortcode('CM_Login', $cm_public, 'cm_login');
        $this->loader->add_shortcode('GF_Form', $cm_public, 'cm_user_form_render');
        $this->loader->add_shortcode('GF_Front_Submissions', $cm_public, 'cm_front_submissions');
        $this->loader->add_action('widgets_init', $cm_public, 'register_otp_widget');
        $this->loader->add_action('wp_ajax_cm_set_otp', $this->controller, 'run');
        $this->loader->add_action('wp_ajax_nopriv_cm_set_otp', $this->controller, 'run');
        $this->loader->add_action('wp_ajax_contactmagic_embedform', $cm_public, 'render_embed');
        $this->loader->add_action('wp_ajax_nopriv_contactmagic_embedform', $cm_public, 'render_embed');
//for shortcodes in widgets.
        $this->loader->add_filter('widget_text', $cm_public, 'do_shortcode');
        //For legacy version
        //$this->loader->add_shortcode('CRF_Login', $cm_public, 'cm_login');
        $this->loader->add_shortcode('CFP_Form', $cm_public, 'cm_user_form_render');
        //$this->loader->add_shortcode('CRF_Submissions', $cm_public, 'cm_front_submissions');
        $this->loader->add_action('wp_footer', $cm_public, 'floating_action');
        $this->loader->add_action('wp_ajax_cm_toggle_form_option', $this->controller, 'run');
        //Ajax calls for Username checking
        $this->loader->add_action('wp_ajax_nopriv_cm_user_exists', $this->controller, 'run');
        $this->loader->add_action('wp_ajax_cm_js_data', 'CM_Utilities', 'load_js_data');
        $this->loader->add_action('wp_ajax_nopriv_cm_js_data', 'CM_Utilities', 'load_js_data');
        $this->loader->add_action('wp_ajax_nopriv_cm_load_front_users', $cm_public, 'cm_user_list');
        }

    /**
     * Register all the hooks common with both public and admin facing
     * functionality of the plugin
     *
     * @access   private
     */
    public function define_global_hooks()
    {
        //$this->loader->add_filter('login_redirect', $this, 'after_login_redirect', 10, 3);
        //$this->loader->add_filter('register_url', $this, 'cm_register_redirect');
        //$this->loader->add_action('wp_login', $this, 'prevent_deactivated_logins');
        //$this->loader->add_filter('login_message', $this, 'login_notice');
        $this->loader->add_action('wpmu_new_blog', 'CM_Table_Tech', 'on_create_blog',10,6);
        $this->loader->add_filter('wpmu_drop_tables', 'CM_Table_Tech', 'on_delete_blog');
        $this->loader->add_filter('plugins_loaded', $this, 'run_onload_tasks');

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return    CM_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }

    public function get_controller()
    {
        return $this->controller;
    }

    public function start_session()
    {
        if (!session_id())
        {            
            $drake = new stdClass;
            $drake->status = 'OKAY';
            $drake->payload_data = '';
            
            $drake = apply_filters('cm_session_path_hook', $drake);
            
            if($drake->status == 'OKAY')
                session_start();
            elseif($drake->status == 'USE_CUSTOM')
            {
                session_save_path($drake->payload_data);
                session_start();
            }
            elseif($drake->status == 'ERROR')
            {
                global $regmagic_errors;
                $err_msg = sprintf(CM_UI_Strings::get('ERR_SESSION_DIR_NOT_WRITABLE'), session_save_path());
                $regmagic_errors[CM_ERR_ID_SESSION_PATH] = (object) array('msg' => $err_msg, 'should_cont' => false);
                return;
            }
            
        }
    }

    /**
     * Prevents the deactivated user form login
     *
     * @param   string      $user_login     login name of the user
     * @param   object      $user           WP_user object
     * @return boolean
     */
    public function prevent_deactivated_logins($user_login, $user = null)
    {
        if (!$user)
        {
            $user = get_user_by('login', $user_login);
        }
        if (!$user)
        {
            return false;
        }

        $is_disabled = (int) get_user_meta($user->ID, 'cm_user_status', true);

        if ($is_disabled == 1)
        {
            wp_clear_auth_cookie();

            $goto = site_url('wp-login.php', 'login');

            $goto = add_query_arg('is_disabled', '1', $goto);

            wp_redirect($goto);

            exit;
        }
    }

    /**
     * returns the message when deactivated user tries to login
     *
     * @param string $notice
     * @return string
     */
    public function login_notice($notice)
    {
        if (isset($_GET['is_disabled']) && $_GET['is_disabled'] === '1')
            $notice = '<div id="login_error"><strong>'.CM_UI_Strings::get('LABEL_ERROR').':</strong> ' . apply_filters('cm_login_notice', CM_UI_Strings::get ('ACCOUNT_NOT_ACTIVE_YET')) . '</div>';
        elseif(isset($_GET['is_reset']) && $_GET['is_reset'] === '1')
            $notice = '<p id="cm_login_error" class="message">' . apply_filters('cm_login_notice', CM_UI_Strings::get('LOGIN_AGAIN_AFTER_RESET')) . '</p>';
        return $notice;
    }

    public function after_login_redirect($redirect_to, $user)
    {
        global $user;
        $post_id = get_option('cm_option_post_submission_redirection_url');

        return CM_Utilities::after_login_redirect($user);
    }

    public function cm_register_redirect($registration_redirect)
    {
        $post_id = get_option('cm_option_default_registration_url');
        if ($post_id != 0)
        {
            $url = home_url("?p=" . $post_id);
            return $url;
        }
        return $registration_redirect;
    }

    public function add_ob_start($slug)
    {
        $pass = array(
            'cm_login_form',
            'cm_attachment_download_all',
            'cm_submission_print_pdf',
            'cm_attachment_download',
            'cm_attachment_download_selected',
            'cm_submission_export',
            'cm_front_log_off',
            'cm_form_export'
        );

        if (in_array($slug, $pass))
            ob_start();

        // Incase facebook
        if (isset($_REQUEST['cm_target']) && $_REQUEST['cm_target'] == 'fbcb')
        {
            ob_start();
        }
    }
    
    //Add custom links on wp plugin listing page.
    public function add_plugin_link($actions, $plugin_file)
    {        
        if (CM_PLUGIN_BASENAME == $plugin_file)
        {
            $extra_menus = array(//'upgrade' => '<a class="cm-upgrade-menu-link" target="_blank" href="https://registrationmagic.com/comparison/">Upgrade</a>',
                           'settings' => '<a href="' . get_admin_url() . 'admin.php?page=cm_options_manage">Settings</a>',
                           //'support' => '<a href="' . get_admin_url() . 'admin.php?page=cm_support_forum">Support</a>'
                           );
            
            $actions = $extra_menus + $actions;
        }

        return $actions;
    }
    
    public function on_upgrade_migrate() {
        global $cmbasic;
        
        if (!function_exists('is_plugin_active_for_network')) {
            require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
        }

        if (is_plugin_active_for_network($cmbasic)) 
            CM_Activator::migrate(true);
        else
            CM_Activator::migrate(false);

    }
     
    public function run_onload_tasks(){
         $this->on_upgrade_migrate();
     }

}
