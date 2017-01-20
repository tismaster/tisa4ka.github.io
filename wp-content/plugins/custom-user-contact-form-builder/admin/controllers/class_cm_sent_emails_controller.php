<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CM_Sent_Emails_Controller
{
    private $mv_handler;

    function __construct()
    {
        $this->mv_handler = new CM_Model_View_Handler();
    }
    
    public function manage($model, $service, $request, $params)
    {
        $data = new stdClass;        
        
        $filter= new CM_Sent_Emails_Filter($request, $service);
        $form_id= $filter->get_form();
        $data->forms = CM_Utilities::get_forms_dropdown($service);
        $data->forms = array('all' => 'All') + $data->forms;
        $data->filter= $filter;
        $data->cm_slug = $request->req['page'];
        $data->is_filter_active = $filter->is_active();
        $data->mails = $filter->get_records();
        $data->search_state_query = http_build_query(array_filter($filter->filters));
        $view = $this->mv_handler->setView("sent_emails_manage");
        $view->render($data);
    }
    
    public function view($model, $service, $request, $params)
    {
        if (isset($request->req['cm_sent_email_id']))
        {
            $data = new stdClass;
            
            if (isset($request->req['cm_action']) && $request->req['cm_action'] == 'delete')
            {              
                $request->req['cm_selected'] = $request->req['cm_sent_email_id'];
                $this->remove($model, $service, $request, $params);                
                return;
            }            
            
            $email = $service->get_sent_email($request->req['cm_sent_email_id']);            
            
            if($email && is_array($email))
            {
                $data->email = $email[0];
                
                $cm_sr=new CM_Services;
                $related_subs=$cm_sr->get_submissions_by_email($data->email->to);
                if(is_array($related_subs))
                    $data->related=count($related_subs);
                if($data->related >0)
                {
                    $data->related=$data->related-1;
                }
                else
                    $data->related=0;
            }
            else
                $data = null;
            if(isset($request->req['cm_search_state']))
                $data->search_state = $request->req['cm_search_state'];
            else
                $data->search_state = null;
            
            $view = $this->mv_handler->setView("sent_emails_view");
            $view->render($data);
        }
        else
            throw new InvalidArgumentException(CM_UI_Strings::get('MSG_INVALID_SENT_EMAIL_ID'));
    }
    
    public function remove($model, $service, $request, $params)
    {
       $selected = isset($request->req['cm_selected']) ? $request->req['cm_selected'] : null;
       
       if($selected !=null){
        $service->remove($selected,'SENT_EMAILS');
        unset($request->req['cm_selected']);
        }
        
        if(isset($request->req['cm_search_state']))
            CM_Utilities::redirect('?page=cm_sent_emails_manage&'.$request->req['cm_search_state']);    
        else
            CM_Utilities::redirect('?page=cm_sent_emails_manage');        
    }
    
    public function related($model, CM_Services $service, $request, $params)
    {
         $data=new stdClass();
         $data->user_email=$request->req['cm_user_email'];
         $cm_sr=new CM_Services;
         $data->submissions=$cm_sr->get_submissions_by_email($data->user_email);
        // echo "<pre>",var_dump($submissions);die;
         $view = $this->mv_handler->setView('related_submissions');
         $view->render($data);
    }
    
    public function print_pdf($model, $service, $request, $params)
    {
        if (isset($request->req['cm_sent_email_id']))
        {    
            $email = $service->get_sent_email($request->req['cm_sent_email_id']);            
            
            if($email && is_array($email))
            {
                $service->output_pdf_for_submission($email[0]);
            }
            
        } else
            throw new InvalidArgumentException(CM_UI_Strings::get('MSG_INVALID_SUBMISSION_ID'));
    }

}