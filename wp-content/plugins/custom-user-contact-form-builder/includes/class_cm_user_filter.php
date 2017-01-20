<?php

class CM_User_Filter extends CM_Filter {
   
    public function __construct($request, $service) {
        
        $params = array(
        'cm_interval' => 'cm_interval',
        'cm_status' => 'cm_status',
        'cm_to_search'=>'cm_to_search'
        );
        $default_param_values = array('cm_interval' => 'all', 'cm_status' => 'all',
        'cm_to_search' => "", 'cm_reqpage' => '1');
        
        parent::__constuct($request,$service, $params, $default_param_values);
        $this->set_pagination();
    }

    public function get_records() {
       $this->records = $this->service->get_all_user_data($this->pagination->curr_page, $this->pagination->entries_per_page, $this->filters['cm_to_search'], $this->filters['cm_status'], $this->filters['cm_interval']);
       return $this->records; 
    }

     protected function set_pagination(){
        $total_entries=null;
        $total_entries = count($this->service->get_all_user_data(1, 99999999, $this->filters['cm_to_search'], $this->filters['cm_status'], $this->filters['cm_interval']));
        
       if (isset($_POST['cm_interval']) || isset($_POST['cm_status']))
            $request->req['cm_reqpage'] = 1;
       
        $req_page = (isset($this->request->req['cm_reqpage']) && $this->request->req['cm_reqpage'] > 0) ? $this->request->req['cm_reqpage'] : 1;
        
        $this->pagination= new CM_Pagination($this->filters,$this->request->req['page'],$total_entries,$req_page);
    } 

}
