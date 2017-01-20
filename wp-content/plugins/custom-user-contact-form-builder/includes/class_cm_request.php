<?php


class CM_Request{

    public $req;
    public $xml_loader;
    
    public function __construct($xml_loader){
        $this->req= CM_Sanitizer::sanitize_request($_REQUEST);
        $this->xml_loader= $xml_loader;
        $this->setReqSlug();
    }

    public function setReqSlug($cm_slug='',$front=false){

        if(!isset($_POST['cm_slug'])&& isset($_GET['page']))
            $this->req['cm_slug'] = $this->req['page'];
        elseif(!isset($_POST['cm_slug']))
            $this->req['cm_slug'] = 'cm_no_slug';
        if(!isset($_POST['cm_slug']) && $front){
            $this->req['cm_slug'] = $cm_slug;

        }

    }

    public function isValid(){

        if(!isset($this->req['cm_slug'])){
             return false;
        } 
        $xml= (array)$this->xml_loader->load_data($this->req['cm_slug']);
        
        if(!empty($xml)){
            return true;
       }

       return false;
    }
    
    public function getReq(){
        return $this->req;
    }
}