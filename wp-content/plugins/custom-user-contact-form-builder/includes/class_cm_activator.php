<?php

/**
 * Fired during plugin activation
 *
 * @link       http://registration_magic.com
 * @since      3.0.0
 *
 * @package    gorilla_forms
 * @subpackage gorilla_forms/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      3.0.0
 * @package    gorilla_forms
 * @subpackage gorilla_forms/includes
 * @author     CMSHelplive
 */
class CM_Activator
{

    /**
     * Runs all the actions for plugin activation
     *
     * @since    3.0.0
     */
    public static function activate($network_wide)
    {
        CM_Table_Tech::create_tables($network_wide);
        CM_Utilities::create_submission_page();
        self::first_install_proc(); //inserts sample data and also save installation date.
        error_log(self::migrate($network_wide));
    }

    public static function migrate($network_wide)
    {
        global $wpdb;
        
        $existing_cm_db_version = get_site_option('cm_option_db_version', false);
        $existing_crf_db_version = get_option('cfp_db_version', false);

        if(!$existing_cm_db_version && !$existing_crf_db_version)
        {
            update_site_option('cm_option_db_version', CM_DB_VERSION);
            return 'fresh_installation';        //No need for migration.
        }
        
        if($existing_cm_db_version && floatval($existing_cm_db_version) >= CM_DB_VERSION)
            return 'already_on_equal_or_better';
        
        self::migrate_crf_to_cm_4_0($network_wide, $existing_cm_db_version, $existing_crf_db_version);
        self::migrate_cm_4_0_to_cm_4_1($network_wide, $existing_cm_db_version);
        self::migrate_cm_4_1_to_cm_4_2($network_wide, $existing_cm_db_version);
        self::migrate_cm_4_2_to_cm_4_4($network_wide, $existing_cm_db_version);
        
        update_site_option('cm_option_db_version', CM_DB_VERSION);
    }

    private static function migrate_cm_4_0_to_cm_4_1($network_wide, $existing_cm_db_version)
    {
        if (floatval($existing_cm_db_version) < 4.1)
        {
            global $wpdb;

            if (is_multisite() && $network_wide)
            {

                $current_blog = $wpdb->blogid;

                $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
                foreach ($blog_ids as $blog_id)
                {
                    switch_to_blog($blog_id);
                    self::migrate_per_site_cm_4_0_to_cm_4_1();
                    restore_current_blog();
                }
                switch_to_blog($current_blog);
            } else
            {
                self::migrate_per_site_cm_4_0_to_cm_4_1();
            }
        }
    }
    
    private static function migrate_cm_4_1_to_cm_4_2($network_wide, $existing_cm_db_version)
    {
        if (floatval($existing_cm_db_version) < 4.2)
        {
            global $wpdb;
            if (is_multisite() && $network_wide)
            {
                $current_blog = $wpdb->blogid;
                $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
                foreach ($blog_ids as $blog_id)
                {
                    switch_to_blog($blog_id);
                    self::migrate_per_site_cm_4_1_to_cm_4_2();
                    restore_current_blog();
                }
                switch_to_blog($current_blog);
            } else
            {
                self::migrate_per_site_cm_4_1_to_cm_4_2();
            }
        }
    }
    
    //Not actual migration, it fixes broken database.
    private static function migrate_cm_4_2_to_cm_4_4($network_wide, $existing_cm_db_version)
    {        
        global $wpdb;
        if (is_multisite() && $network_wide)
        {
            $current_blog = $wpdb->blogid;
            $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
            foreach ($blog_ids as $blog_id)
            {
                switch_to_blog($blog_id);
                self::migrate_per_site_cm_4_2_to_cm_4_4();
                restore_current_blog();
            }
            switch_to_blog($current_blog);
        } else
        {
            self::migrate_per_site_cm_4_2_to_cm_4_4();
        }        
    }

    private static function migrate_crf_to_cm_4_0($network_wide, $existing_cm_db_version, $existing_crf_db_version)
    {

        //$existing_cm_db_version = get_site_option('cm_option_db_version', false);
        //$existing_crf_db_version = get_option('crf_db_version', false);

        if (!$existing_crf_db_version)
        {
            if ($existing_cm_db_version)
            return 'already_on_rm';
            
            update_site_option('cm_option_db_version', CM_DB_VERSION);
            return 'no_crf_data';
        }

        if ($existing_cm_db_version)
            return 'already_on_rm';

        if ($existing_crf_db_version && !$existing_cm_db_version)
        {
            global $wpdb;

            error_log("Migrating old crf...");
            $mig = new CM_Migrator;
            $mig->migration_old_crf();

            if (is_multisite() && $network_wide)
            {

                $current_blog = $wpdb->blogid;

                $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
                foreach ($blog_ids as $blog_id)
                {
                    switch_to_blog($blog_id);
                    error_log('curr wpdb prefix: ' . $wpdb->prefix);
                    self::migrate_per_site_crf_to_cm_4_0();
                    restore_current_blog();
                }
                switch_to_blog($current_blog);
            } else
            {
                self::migrate_per_site_crf_to_cm_4_0();
            }

            $mig->migrate_user_meta();
        }
    }
    
    private static function migrate_per_site_cm_4_0_to_cm_4_1()
    {
        return;
    }
    
    private static function migrate_per_site_cm_4_1_to_cm_4_2()
    {
        return;
    }
    
    private static function migrate_per_site_cm_4_2_to_cm_4_4()
    {
        CM_Table_Tech::repair_tables();
    }

    private static function migrate_per_site_crf_to_cm_4_0()
    {
        //Start migration.
        global $wpdb;
        $step = 1200;

        error_log("IN THE PI: Migration progress log:");
        error_log("Initiating migration...");
        //require_once 'class_cm_migrator.php';
        $mig = new CM_Migrator;
        error_log("Class loaded.");
        /* error_log("Migrating old crf...");
          $mig->migration_old_crf(); */
        error_log("Migrating Global settings...");
        $mig->migrate_options();

        error_log("Migrating Stats...");

        $table_name = $wpdb->prefix . 'cfp_stats';
        $total_subs = $wpdb->get_var("SELECT COUNT(`id`) FROM $table_name WHERE 1");
        $total_loop_count = ceil((double) $total_subs / $step);
        for ($i = 0; $i <= $total_loop_count; $i++)
            $mig->migrate_stats($i * $step, $step);


        error_log("Migrating Forms...");
        $mig->migrate_forms();
        error_log("Migrating Fields...");
        $mig->migrate_fields();


        error_log("Migrating Submissions...");

        //ob_start();

        $table_name = $wpdb->prefix . 'cfp_submissions';

        //$total_subs = $wpdb->get_var("SELECT COUNT(`id`) FROM $table_name WHERE 1");
        $count_array = $wpdb->get_results("SELECT `submission_id`, COUNT(*) AS `count` FROM `$table_name` WHERE 1 GROUP BY `submission_id`");

        $i = 0;
        $j = 0;
        $k = array();
        foreach ($count_array as $count_per_sub)
        {
            if ($j > 1200)
            {
                $k[] = $j;
                $j = 0;
            }

            $j += (int) $count_per_sub->count;
        }
        if ($j <= 1200)
            $k[] = $j;   //add any leftover submissions from the loop.

            
//ob_start();
        //var_dump($k);
        //error_log("K: ".ob_get_clean());

        foreach ($k as $kcount)
        {
            $mig->migrate_submissions($i, (int) $kcount);
            $i += (int) $kcount;
        }


        error_log("Inserting primary emails...");
        $mig->insert_primary_emails();
        error_log("Migration finished.");


        //update_option('cm_option_cm_version', CM_PLUGIN_VERSION);
        return 'migrate_success';
    }
    
    public static function first_install_proc()
    {
        global $wpdb;
        
        $existing_rm_db_version = get_site_option('cm_option_db_version', false);
        $existing_rm_plugin_version = get_site_option('cm_option_cm_version', false);
        
        //Check if it is fresh CM installation
        if(!$existing_rm_db_version && !$existing_rm_plugin_version)
        { 
            $datafile = CM_EXTERNAL_DIR."sample_data.xml";
            //$id = CM_Services::import_form_first($datafile);
            //$id = CM_Services::import_form_first($datafile, intval($id));
            
            //Now get the ids of these forms and save them so we can check in future if given form is sample form or not.
            //Usecase: Form manager template requires exclusive ids for sample form cards.
           
            /*$inserted_sample_data = new stdClass;
            $inserted_sample_data->forms = array();
            $form_table = CM_Table_Tech::get_table_name_for('FORMS');
            $sfids = $wpdb->get_results("SELECT `form_id`, `form_type` FROM $form_table ORDER BY `form_id` DESC LIMIT 1");
            
            if($sfids && is_array($sfids))
            {
                foreach($sfids as $sfid)
                {
                    $inserted_sample_data->forms[] = (object)array('form_id'=>$sfid->form_id, 'form_type'=>$sfid->form_type);                    
                }                
            }
            */
            //update_site_option('cm_option_inserted_sample_data', $inserted_sample_data);  
            update_site_option('cm_option_install_date', time());
        }
        else
        {
            //set tours as taken.
            CM_Utilities::update_tour_state('form_manager_tour', 'taken');
            CM_Utilities::update_tour_state('form_gensett_tour', 'taken');
        }
                
    }

}
