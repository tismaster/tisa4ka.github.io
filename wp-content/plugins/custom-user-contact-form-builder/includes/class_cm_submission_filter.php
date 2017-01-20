<?php

class CM_Submission_Filter extends CM_Filter {
    public $form_id;

    public function __construct($request, $service) {
        $params = array(
        'cm_field_to_search' => 'cm_field_to_search',
        'cm_value_to_serach' => 'cm_value_to_serach',
        'cm_interval' => 'cm_interval',
        'cm_fromdate' => 'cm_fromdate',
        'cm_dateupto' => 'cm_dateupto',
        'filter_tags'=>'filter_tags');
        
        $default_param_values = array('cm_interval' => 'all', 'cm_field_to_search' => null,
        'cm_value_to_serach' => null, 'cm_fromdate' => null,
        'cm_dateupto' => null,'filter_tags'=>null);
        
        parent::__constuct($request,$service, $params, $default_param_values);
        
        $this->set_form($service);
        if ((isset($this->params['cm_field_to_search']) && (int) $this->params['cm_field_to_search']) || isset($this->params['filter_tags'])) {
            $this->searched = true;
        } 
       
        $this->set_pagination();
    }

    public function set_form($service) {
        if (isset($this->request->req['cm_form_id']))
            $this->form_id = $this->request->req['cm_form_id'];
        else
            $this->form_id = $service->get('FORMS', 1, array('%d'), 'var', 0, 15, $column = 'form_id', null, true);
    }

    public function get_form() {
        return $this->form_id;
    }

    public function get_records() {
        $this->records =  CM_DBManager::get_submissions($this->form_id,$this);
        return $this->records;
    }
    
    protected function set_pagination(){
        $total_entries=null;
        
        $req_page = null;
        if (isset($this->request->req['cm_search_initiated']))
            $req_page = 1; //reset pagination in case a new search is initiated.
        else
            $req_page = (isset($this->request->req['cm_reqpage']) && $this->request->req['cm_reqpage'] > 0) ? $this->request->req['cm_reqpage'] : 1;
        
        
        
        $this->filters['cm_form_id']= $this->form_id;
        $this->pagination= new CM_Pagination($this->filters,$this->request->req['page'],0,$req_page);
        $total_entries = CM_DBManager::get_submissions($this->form_id,$this,"count(*) as count");
        if(!$total_entries)
            $this->pagination->set_total_entries(0);
        else
            $this->pagination->set_total_entries($total_entries[0]->count);
       
        
    } 
    
}
