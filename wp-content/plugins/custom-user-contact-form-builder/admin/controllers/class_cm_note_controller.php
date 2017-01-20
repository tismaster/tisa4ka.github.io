<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_cm_note_controller
 *
 * @author CMSHelplive
 */
class CM_Note_Controller
{

    private $mv_handler;

    public function __construct()
    {
        $this->mv_handler = new CM_Model_View_Handler();
    }

    public function add($model, CM_Note_Service $service, $request, $params)
    {
        return true;
    }

    public function remove($model, /* CM_Services */ $service, $request, $params)
    {
        return true;
    }

    public function delete($model, /* CM_Services */ $service, $request, $params)
    {
        return true;
    }

}
