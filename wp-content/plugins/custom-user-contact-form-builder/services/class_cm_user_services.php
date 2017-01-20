<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class responsible for User and Roles related operations
 *
 * @author CMSHelplive
 */
class CM_User_Services extends CM_Services
{    
    public function notify_users($users, $type)
    {
        if (is_array($users) && !empty($users))
        {
            $front_form_service = new CM_Front_Form_Service;
            foreach ($users as $id)
            {
                $user = get_user_by('id', $id);
                $params = new stdClass;
                $params->email = $user->user_email;                
                $params->sub_id = get_user_meta($id, 'CM_UMETA_SUB_ID', true);
                $params->form_id = get_user_meta($id, 'CM_UMETA_FORM_ID', true);
                $email = $front_form_service->prepare_email($type, null, $params);
                CM_Utilities::send_mail($email);
            }
        }
    }
    
    public static function send_email_ajax()
    {
        $to = $_POST['to'];
        $sub = $_POST['sub'];
        $body = $_POST['body'];
        
        CM_Utilities::quick_email($to, $sub, $body);
        
        wp_die();
    }    

    public function get_user_count()
    {
        $result = count_users();
        $total_users = $result['total_users'];
        return $total_users;
    }

    public function get_user_by($field, $value)
    {
        $user = get_user_by($field, $value);
        return $user;
    }

}
