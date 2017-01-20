<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_cm_front_service
 *
 * @author CMSHelplive
 */
class CM_Front_Service extends CM_Services {

    public function set_otp($email, $key = null) {
        $response = new stdClass();
        $response->error = false;
        $response->show = "#cm_otp_enter_otp";
        $response->hide = "#cm_noelement";
        $response->reload = false;

        // Validate key
        if ($key) {
            $cm_user = $this->get('FRONT_USERS', array('otp_code' => $key), array('%s'), 'row');

            if (!$cm_user) {
                $response->error = true;
                $response->msg = CM_UI_Strings::get('MSG_INVALID_OTP');
            } else {
                $this->set_auth_params($key, $cm_user->email);
                $response->error = false;
                $response->msg = CM_UI_Strings::get('MSG_AFTER_OTP_LOGIN');
                $response->reload = true;
            }
        } else {
            $user = $this->is_user($email);
            if ($user === CM_FRONT_OTP_USER) {
                $otp_code = $this->generate_otp($email);
                $response->msg = CM_UI_Strings::get('MSG_OTP_SUCCESS');
                $subject = CM_UI_Strings::get('LABEL_OTP');
                $message = CM_UI_Strings::get('OTP_MAIL') . $otp_code;
                $response->hide = "#cm_otp_enter_email";

                wp_mail($email, $subject, $message);
            } elseif ($user === CM_FRONT_NO_USER) {
                $response->error = true;
                $response->msg = CM_UI_Strings::get('MSG_EMAIL_NOT_EXIST');
            } else {
                $response->error = true;
                $response->msg = CM_UI_Strings::get('INVALID_EMAIL');
            }
        }

        return json_encode($response);
    }

    public function is_user($email_or_login) {
        if (is_email($email_or_login)) {
            $submissions = $this->get_submissions_by_email($email_or_login);
            //var_dump($submissions);die;
            if ($submissions)
                return CM_FRONT_OTP_USER;
            else
                return CM_FRONT_NO_USER;
        }
        return false;
    }

    public function is_authorized() {
        if (isset($_COOKIE['cm_secure_otp'])) {
            $this->delete_front_user('10', 'm', true);

            $cm_user = $this->get('FRONT_USERS', array('otp_code' => $_COOKIE['cm_secure_otp']), array('%s'), 'row');

            if (empty($cm_user)) {
                $this->unset_auth_params();
                return false;
            } else {
                $this->update_last_activity();
                return true;
            }
        }
        return false;
    }

    public function generate_otp($email) {
        $otp_code = wp_generate_password(15, false);

        // Delete previous OTP//$wpdb->delete($wpdb->prefix . 'cm_front_users', array('email' => $email));
        $this->delete_rows('FRONT_USERS', array('email' => $email), '%s');

        $front_user = new CM_Front_Users;

        $front_user->set(array(
            'email' => $email,
            'otp_code' => $otp_code
        ));

        $front_user->insert_into_db();
        return $otp_code;
    }

    public function set_auth_params($key, $email) {
        setcookie("cm_secure_otp", $key, time() + (3600), "/");
        setcookie("cm_autorized_otp", "true", time() + (3600), "/");
        setcookie("cm_autorized_email", $email, time() + (3600), "/");
    }

    public function delete_front_user($interval, $time_format, $by_last_activity = false) {

        return CM_DBManager::delete_front_user($interval, $time_format, $by_last_activity);
    }

    private function unset_auth_params() {
        setcookie("cm_secure_otp", '', time() - (3600), "/");
        setcookie("cm_autorized_otp", "true", time() - (3600), "/");
        setcookie("cm_autorized_email", '', time() - (3600), "/");
    }

    public function update_last_activity() {
        return CM_DBManager::update_last_activity();
    }

    public function get_user_email() {

        $user_email = null;

        if (isset($_COOKIE['cm_autorized_email'])) {
            $user_email = $_COOKIE['cm_autorized_email'];
        }


        return $user_email;
    }

    public function log_front_user_off($user_email) {
        $this->unset_auth_params();
        return CM_DBManager::delete_rows('FRONT_USERS', array('email' => $user_email));
    }

    public function get_submission_count($user_email) {
        return CM_DBManager::count('SUBMISSIONS', array('user_email' => $user_email, 'child_id' => '0'));
    }

    public function should_reset_password($request) {
        if (isset($request['old_pass'], $request['new_pass'], $request['new_pass_repeat'])) {
            $user = wp_get_current_user();
            if ($user instanceof WP_User && wp_check_password($request['old_pass'], $user->data->user_pass, $user->ID)) {
                if ($request['new_pass'] === $request['new_pass_repeat']) {
                    return true;
                } else
                    CM_PFBC_Form::setError('cm_reset_pass_form', CM_UI_Strings::get('ERR_PASS_DOES_NOT_MATCH'));
            } else
                CM_PFBC_Form::setError('cm_reset_pass_form', CM_UI_Strings::get('ERR_WRONG_PASS'));
        }
        return false;
    }
    
    public function save_fab_settings($theme,$color){
        $option = new CM_Options;
        if($theme)
            $option->set_value_of ('fab_theme', $theme);
        if($color)
            $option->set_value_of ('fab_color', $color);
        
        echo 'Success';die;
    }
    
    //This function is used for ajaxresponse in magic popup login only.
    //
    public function login($username,$user_key,$remember = false){
        $credentials = array();
        $credentials['user_login'] = $username;
        $credentials['user_password'] = $user_key;
        $credentials['remember'] = $remember;
        require_once(ABSPATH . 'wp-load.php');
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        $user = wp_signon($credentials, false);
        $response = new stdClass();
        if(is_wp_error($user)){
            $response->error = true;
            $response->msg = $user->get_error_message();
        }
        else{
            $response->error = false;
            $response->msg = CM_UI_Strings::get('MSG_LOGIN_SUCCESS');
            $response->redirect = CM_Utilities::after_login_redirect($user);
        }
            
        return json_encode($response);
    }
}
