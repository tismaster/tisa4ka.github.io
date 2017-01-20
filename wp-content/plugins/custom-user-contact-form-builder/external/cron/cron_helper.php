<?php

//Author: Terrific

function cm_add_custom_interval($schedules)
{
    //error_log("Filter called");
    $schedules['chronos_interval'] = array(
        'interval' => 3600, //in seconds
        'display' => __('RegMagic Chronos Interval'),
    );
    //error_log("Schedules: " . $result);

    return $schedules;
}
add_filter('cron_schedules', 'cm_add_custom_interval');



function cm_cron_job()
{
    //error_log("in the job");
    CM_Job_Manager::do_job();
    return;
}
add_action('cm_job_hook', 'cm_cron_job');

function cm_start_cron()
{
    if (!wp_next_scheduled('cm_job_hook'))
    {
        wp_schedule_event(time(), 'chronos_interval', 'cm_job_hook');
      //  error_log("Chronos Scheduled!");
    }
    //else error_log("Chronos ALREADY Scheduled!");
}

function cm_stop_cron()
{
    if (wp_next_scheduled('cm_job_hook'))
    {
        wp_unschedule_event(wp_next_scheduled('cm_job_hook'), 'cm_job_hook');
        //error_log("stopped batch!");
    }
}

//Include this file and call cm_start_cron. Use Job Manager to add - remove jobs.
//cm_start_cron();