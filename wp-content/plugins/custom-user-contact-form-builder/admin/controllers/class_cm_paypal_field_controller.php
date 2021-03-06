<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calss_cm_paypal_field_controller
 *
 * @author CMSHelplive
 */
class CM_PayPal_Field_Controller
{

    private $mv_handler;

    function __construct()
    {
        $this->mv_handler = new CM_Model_View_Handler();
    }

    public function add($model, $service, $request, $params)
    {

        //die("GOT IT!!!!");
        if ($this->mv_handler->validateForm("add-paypal-field"))
        {

            if (isset($request->req['multisel_name_value']))
            {
                $request->req['option_label'] = maybe_serialize($request->req['multisel_name_value']);
                $request->req['option_price'] = maybe_serialize($request->req['multisel_price_value']);
            }
            //die("GOT IT!!!!");

            if(isset($request->req['show_on_form']))
                $request->req['extra_options'] = 'yes';
            else
                $request->req['extra_options'] = 'no';

            $model->set($request->req);
//            echo "AND NOW PARAMS:";
//             var_dump($params);
//             die;
            if (isset($request->req['field_id']))
                $service->update($model, $service, $request, $params);
            else
                $service->add($model, $service, $request, $params);
            CM_Utilities::redirect(admin_url('/admin.php?page=' . $params['xml_loader']->request_tree->success));
            //$this->view->render();
        }
        else
        {
             $data = new stdClass;

            // Edit for request
            if (isset($request->req['cm_field_id']))
            {
                $model->load_from_db($request->req['cm_field_id']);
                if($model->extra_options != 'yes')
                    $data->show_on_form = 0;
                else
                    $data->show_on_form = 1;
            }
            else
                $data->show_on_form = 1;

           
            $data->model = $model;
            $view = $this->mv_handler->setView("paypal_field_add");
            $data->selected_field = $request->req['cm_field_type'];
            $view->render($data);
        }
    }

    public function manage($model, $service, $request, $params)
    {
        if (isset($request->req['cm_action']) && $request->req['cm_action'] === 'delete')
            $this->remove_field($model, $service, $request, $params);

        $data = new stdClass;
        $fields_data = $service->get($model->get_identifier(), array('type'=>'fixed'), array('%s'));
        $data->fields_data = $fields_data;        
        
        $view = $this->mv_handler->setView("paypal_field_manager");
        $view->render($data);
    }

    private function remove_field($model, $service, $request, $params)
    {

        if (isset($request->req['cm_field_id']))
            $result = $service->remove($request->req['cm_field_id']);
        else
            die(CM_UI_Strings::get('MSG_NO_FIELD_SELECTED'));
    }

    public function remove($model, $service, $request, $params)
    {
        $selected = isset($request->req['cm_selected']) ? $request->req['cm_selected'] : null;
        $service->remove($selected);
        $this->manage($model, $service, $request, $params);
    }

}
