<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controller to handle USER related requests
 *
 * @author CMSHelplive
 */
class CM_USER_Controller
{

    public $mv_handler;

    function __construct()
    {
        $this->mv_handler = new CM_Model_View_Handler();
    }   

    public function widget($model, CM_User_Services $service, $request, $params)
    {
        if ($params['user'] instanceof WP_User)
        {
            $data = new stdClass;

            $submissions = $service->get_submissions_by_email($params['user']->user_email, 10);

            $sub_data = array();

            $count = 0;
            if ($submissions)
            {
                foreach ($submissions as $submission)
                {
                    //echo "<br>ID: ".$submission->form_id." : ".CM_Utilities::localize_time($submission->submitted_on, 'M dS Y, h:ia')." : ";
                    $name = $service->get('FORMS', array('form_id' => $submission->form_id), array('%d'), 'var', 0, 10, 'form_name');
                    $date = CM_Utilities::localize_time($submission->submitted_on, 'M dS Y, h:ia');
                    $payment_status = $service->get('PAYPAL_LOGS', array('submission_id' => $submission->submission_id), array('%d'), 'var', 0, 10, 'status');

                    $sub_data[] = (object) array('submission_id' => $submission->submission_id, 'name' => $name, 'date' => $date, 'payment_status' => $payment_status);

                    $count++;
                }
            }

            $data->submissions = $sub_data;
            $data->total_sub = $count;

            $view = $this->mv_handler->setView('user_edit_widget');
            $view->render($data);
        }
    }
    
} 
