<?php

/**
 * Class to handle Model validation along with set view operation
 */

class CM_Model_View_Handler
{
    /*
     * This function validates the submitted for all the POST requests.
     * It clear all the errors in case of any GET requests.
     */
    public function validateForm($form_slug="default"){
        $valid= false;
        
           if($_SERVER['REQUEST_METHOD']=="POST" && CM_PFBC_Form::isValid($form_slug, false))
           {
               $valid= true;
               CM_PFBC_Form::clearValues($form_slug);
           }
           else
           {
             if($_SERVER['REQUEST_METHOD']=="GET" || (isset($_POST['CM_CLEAR_ERROR'])&& $_POST['CM_CLEAR_ERROR'] === 'true'))
               {
                   CM_PFBC_Form::clearErrors($form_slug);
                   CM_PFBC_Form::clearValues($form_slug);
               }
           }
            return $valid;
    }

    public function setView($view_name,$front=false){
        if($front)
            $view= new CM_View_Public($view_name);
        else
            $view= new CM_View_Admin($view_name);

        return $view;
    }
    
    public function clearFormErrors($form_slug){
        CM_PFBC_Form::clearErrors($form_slug);
    }

}