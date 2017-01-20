<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://registrationmagic.com
 * @since      1.0.0
 *
 * @package    gorilla_forms
 * @subpackage gorilla_forms/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    gorilla_forms
 * @subpackage gorilla_forms/includes
 * @author     CMSHelplive
 */
class CM_i18n
{

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'custom-user-contact-form-builder', false, dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }

}
