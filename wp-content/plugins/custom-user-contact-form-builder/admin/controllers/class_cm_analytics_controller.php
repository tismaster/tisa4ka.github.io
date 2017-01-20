<?php

/**
 * 
 */

class CM_Analytics_Controller
{

     public $mv_handler;

    function __construct()
    {
        $this->mv_handler = new CM_Model_View_Handler();
    }

    public function add()
    {
       // $this->service->add();
       // $this->view->render();
    }

    public function show_field($model, $service, $request, $params)
    {
        $data = new stdClass;
        
        $view = $this->mv_handler->setView("field_analytics");
        $view->render($data);
    }

    public function show_form($model, $service, $request, $params)
    {    
        $data = new stdClass;

        $data->forms = CM_Utilities::get_forms_dropdown($service);         

        if(isset($request->req['cm_form_id']))
        {
            $data->current_form_id = $request->req['cm_form_id'];            
        }
        else
        {
            //Get first form's id in this case
             reset($data->forms);
             $data->current_form_id = (string)key($data->forms);
        }
        
        if(isset($request->req['cm_tr']))
        {
            $data->timerange = $request->req['cm_tr'];            
        }
        else
        {
            $data->timerange = '30';
        }

        $data->analysis = $this->calculate_form_stats($data->current_form_id, $service);

        //For pagination
        $entries_per_page = 10;
        $req_page = (isset($request->req['cm_reqpage']) && $request->req['cm_reqpage'] > 0) ? $request->req['cm_reqpage'] : 1;
        $offset = ($req_page - 1) * $entries_per_page;
        $total_entries =  $data->analysis->total_entries; 

        $data->cm_slug = $request->req['page'];
        $data->stat_data = $service->get_form_stats($data->current_form_id, $offset, $entries_per_page);
        $data->total_pages = (int) ($total_entries / $entries_per_page) + (($total_entries % $entries_per_page) == 0 ? 0 : 1);
        $data->curr_page = $req_page;
        $data->starting_serial_number = $offset + 1;
        //Pagination Ends
        
        if($data->timerange > 90)
            $data->timerange = 90;
        
        $data->day_wise_stat = $service->day_wise_submission_stats($data->current_form_id, $data->timerange);
 
        $view = $this->mv_handler->setView("form_analytics");
        $view->render($data);
    }

    public function reset($model, $service, $request, $params)
    {
        if(isset($request->req['cm_form_id']))
            $form_id = $request->req['cm_form_id'];
        else
            return;
        
        $service->reset($form_id);
        switch($request->req['req_source']){
            case 'form_dashboard': 
                CM_Utilities::redirect('?page=cm_form_sett_manage&cm_form_id='.$form_id);
                break;
            case 'form_analytics':
                $this->show_form($model, $service, $request, $params);
        }
    }

    private function calculate_form_stats($form_id, $service)
    {
        $data = new stdClass;
        
        $total_entries =  (int)$service->count('STATS', array('form_id' => (int)$form_id));

       //Average and failure rate
        $failed_submission = (int)$service->count('STATS', array('form_id' => (int)$form_id, 'submitted_on' => null));
        
        if($total_entries != 0 )
            $data->failure_rate = round((double)$failed_submission*100.00/(double)$total_entries, 2);
        else
            $data->failure_rate = 0.00;

        $data->avg_filling_time = $service->get_average_filling_time((int)$form_id);

        $data->total_entries = $total_entries;
        $data->failed_submission = $failed_submission;

        $browser_stats = $service->get_browser_usage($form_id);  

        //$browser_stats->browser_usage['Other'] = $total_entries - $browser_stats->total_known_browser_usage;
        //$data->browser_usage = $browser_stats->browser_usage;
       
       // $browser_stats->browser_submission['Other'] = $total_entries - $failed_submission - $browser_stats->total_known_browser_submission;
        $data->browsers = $browser_stats->browsers;//browser_submission;
        $data->browsers['Other']->visits = $total_entries - $browser_stats->total_known_browser_usage;
        $data->browsers['Other']->submissions = $total_entries - $failed_submission - $browser_stats->total_known_browser_submission;

        return $data;
    }

    
}
