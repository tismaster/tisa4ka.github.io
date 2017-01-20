<?php

class CM_Widget_Helper {

    public function getLoginForm() {
        include_once('html/login.php');
    }

    public function getSubmissions() {
        $cm_services = new CM_Services();
        $cm_front_service = new CM_Front_Service();
        $user_email = $cm_front_service->get_user_email();
        if (!empty($user_email)) {
            $submissions = $cm_services->get_submissions_by_email($user_email);
            if (!empty($submissions)) {
                foreach ($submissions as $submission) {
                    $submission->form_name = $cm_services->get('FORMS', array('form_id' => $submission->form_id), array('%d'), 'var', 0, 1, 'form_name');
                }
                include_once('html/submissions.php');
            } else {
                echo '<div class="cmnotice-container"><div class="cmnotice">' . CM_UI_Strings::get('MSG_NO_DATA_FOR_EMAIL') . '</div></div>';
            }
        }
    }


    public function getPayments() {
        $cm_services = new CM_Services();
        $cm_front_service = new CM_Front_Service();
        $user_email = $cm_front_service->get_user_email();
        $payments = array();
        if (!empty($user_email)) {
            $submissions = $cm_services->get_submissions_by_email($user_email);
            if (!empty($submissions)) {
                foreach ($submissions as $submission) {
                    $oldest_sub = $cm_front_service->get_oldest_submission_from_group($submission->submission_id);
                    $payment = $cm_services->get_payments_by_submission_id($oldest_sub);
                    if ($payment) {
                        $payment->form_name = $cm_services->get('FORMS', array('form_id' => $submission->form_id), array('%d'), 'var', 0, 1, 'form_name');
                        $payments[] = $payment;
                    }
                }
            }

            if (!empty($payments)) {
                include_once('html/payments.php');
            } else {
                echo '<div class="cmnotice-container"><div class="cmnotice">' . CM_UI_Strings::get('MSG_NO_DATA_FOR_EMAIL') . '</div></div>';
            }
        }
    }

    public function get_account() {
        $service = new CM_Front_Service();
        $user_email = $service->get_user_email();
        $user = get_user_by('email', $user_email);
        $data = new stdClass;
        if ($user instanceof WP_User) {
            $data->is_user = true;
            $data->user = $user;
            $data->custom_fields = $service->get_custom_fields($user_email);
            include_once 'html/account.php';
        }
    }

    public function get_user_level() {
        if (is_user_logged_in())
            return 0x4;

        $service = new CM_Front_Service;
        $user_email = $service->get_user_email();
        if ($user_email) {
            $user = get_user_by('email', $user_email);
            if ($user instanceof WP_User)
                $user_level = 0x4;
            else
                $user_level = 0x2;
        } else
            $user_level = 0x1;

        return $user_level;
    }

    public function get_user() {
        $service = new CM_Front_Service();
        $user_email = $service->get_user_email();
        $user = get_user_by('email', $user_email);
        $data = new stdClass;
        if ($user instanceof WP_User)
            return $user;
        else
            return false;
    }

    public function get_fab_icon(){
        $cm_services = new CM_Services();
        $icon_src = CM_IMG_URL . "user.png";
        $fab_icon = $cm_services->get_setting('fab_icon');
        if($fab_icon){
            $src = wp_get_attachment_image_url($fab_icon);
            if($src){
                $icon_src = $src;
            }
        }
        return $icon_src;
    }
}
