<?php

/**
 * Default Views(when no parameter is set in request) loader functionality controller
 * 
 * This class loads default views for menu pages defined when no additional request parameter 
 * is set to load a perticular view 
 */
class CM_Page_Controller extends CM_FormHandler
{

    private $model;
    private $service;

    public function __construct($service,$model)
    {
        $this->model= $model;
        $this->service= $service;
    }

    public function save_form(){

        if(parent::validateForm("add_form"))
        {
            $view= new CM_View_Admin('add_form');
        }else{
            $view= new CM_View_Admin('add_form');
        }
        $view->render();
    }
}
