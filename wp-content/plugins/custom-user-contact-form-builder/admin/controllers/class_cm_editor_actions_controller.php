<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calss_cm_field_controller
 *
 * @author CMSHelplive
 */
class CM_Editor_Actions_Controller
{

    private $mv_handler;

    function __construct()
    {
        $this->mv_handler = new CM_Model_View_Handler();

        if(!wp_script_is('media-upload', 'enqueued'))
            wp_enqueue_script( 'media-upload' );
    }

    public function add_form($model, $service, $request, $params)
    {
        $data= new stdClass();
        $data->forms= $service->add_form();
        $view = $this->mv_handler->setView('editor_add_form');
        $view->render($data);

    }

   public function add_email($model, $service, $request, $params)
    {
        $data= new stdClass();
        if(isset($request->req['cm_form_id']))
            $data->emails= $service->add_email($request->req['cm_form_id']);
        $view = $this->mv_handler->setView('editor_add_email');
        $view->render($data);

    }

    public function add_fields_dropdown_invites($model, $service, $request, $params)
    {
        $data= new stdClass();
        if(isset($request->req['cm_form_id']))
            $data->emails= $service->add_email($request->req['cm_form_id']);
        $data->editor_control_id = 'mce_cm_mail_body';
        $view = $this->mv_handler->setView('editor_add_email');
        $view->render($data);

    }




}
