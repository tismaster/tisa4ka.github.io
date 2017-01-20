<?php

/**
 *
 *
 * @author CMSHelplive
 */
class CM_Sent_Emails_Service extends CM_Services
{

  public function get_sent_email($email_id)
  {
      return CM_DBManager::get('SENT_EMAILS', array('mail_id'=>$email_id), array('%d'));
  }
  
  public function send_email()
  {
      return CM_DBManager::get('SENT_EMAILS', 1, null);
  }

}