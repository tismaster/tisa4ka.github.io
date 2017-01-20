<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author CMSHelplive
 */

require_once CM_EXTERNAL_DIR . 'Xurl/cm_xurl.php';
interface CM_Exporter
{
    public function prepare_data($data_raw);
    public function send_data();
}
