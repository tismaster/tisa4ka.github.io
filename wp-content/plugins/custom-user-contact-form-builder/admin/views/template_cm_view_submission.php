<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="cmagic">
    <?php 
    ?>
    <!-----Operations bar Start-->

    <div class="operationsbar">
        <div class="cmtitle">
            <?php 
                if($data->submission->get_user_email())
                    echo CM_UI_Strings::get('TEXT_FROM').': '. $data->submission->get_user_email(); 
                else
                    echo $data->form_name; 
            ?>
        </div>
        <div class="icons">
            <a href="?page=cm_options_manage"><img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/global-settings.png'; ?>"></a>

        </div>
        <div class="nav">
            <ul>
                <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
                <li class="cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_ADD_NOTE"); ?></a></li>
                <li class="cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_PRINT"); ?></a></li>
                <li><a href="?page=cm_submission_view&cm_submission_id=<?php echo $data->submission->get_submission_id(); ?>&cm_action=delete"><?php echo CM_UI_Strings::get("LABEL_DELETE"); ?></a></li>
                <li class="cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BLOCK_EMAIL"); ?></a></li>
                <li class="cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BLOCK_IP"); ?></a></li>
                <li class="cm_promo_dead_elements"><a class="cm_deactivated" href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_SEND_MESSAGE"); ?></a></li>
                 <?php if($data->related > 0){ ?>
               <li><a href="?page=cm_submission_related&cm_user_email=<?php echo $data->submission->get_user_email(); ?>&cm_submission_id=<?php echo $data->submission->get_submission_id(); ?>"><?php echo CM_UI_Strings::get("LABEL_RELATED").' ('.$data->related.')'; ?></a></li>
                <?php
               } 
               else 
               {?>
                <li><a><?php echo CM_UI_Strings::get("LABEL_RELATED").' (0)'; ?></a></li>
               <?php } ?>
            </ul>
        </div>

    </div>
    <!--****Operations bar Ends**-->

    <!--**Content area Starts**-->
    <div class="cm-submission">        

        <form method="post" action="" name="cm_view_submission" id="cm_view_submission_page_form">
            <input type="hidden" name="cm_slug" value="" id="cm_slug_input_field">

            <?php
            if ($data->form_is_unique_token)
            {
                ?>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_UNIQUE_TOKEN_SHORT'); ?> :</div>
                    <div class="cm-submission-value"><?php echo $data->submission->get_unique_token(); ?></div>
                </div>
                <?php
            }
            ?>
            <?php
            if ( $data->submission->get_submission_ip()) {
                ?>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_IP'); ?> </div>
                    <div class="cm-submission-value"><?php echo $data->submission->get_submission_ip(); ?></div>
                </div>
                <?php
            }
            
            if ( $data->submission->get_submission_browser()) {
                ?>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_BROWSER'); ?> </div>
                    <div class="cm-submission-value"><?php echo $data->submission->get_submission_browser(); ?></div>
                </div>
                <?php
            }
            ?>  

            <div class="cm-submission-field-row">
                <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_ENTRY_ID'); ?></div>
                <div class="cm-submission-value"><?php echo $data->submission->get_submission_id(); ?></div>
            </div>

            <div class="cm-submission-field-row">
                <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_ENTRY_TYPE'); ?></div>
                <div class="cm-submission-value"><?php echo $data->form_type; ?></div>
            </div>
            <?php
            if ($data->form_type_status == "1" && !empty($data->user))
            {
                $user_roles_dd = CM_Utilities::user_role_dropdown();
                ?>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_USER_NAME'); ?></div>
                    <div class="cm-submission-value"><?php echo $data->user->display_name; ?></div>
                </div>

                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_USER_ROLES'); ?></div>
                    <?php if(count($data->user->roles) === 1): ?>
                    <div class="cm-submission-value"><?php echo $user_roles_dd[(implode(',', $data->user->roles))]; ?></div>
                    <?php else: ?>
                    <div class="cm-submission-value"><?php echo CM_UI_Strings::get('MSG_USER_DELETED'); ?></div>                    
                    <?php endif; ?>
                </div>

                <?php
            }
            ?>
            <?php
            $submission_data = $data->submission->get_data();
         
            if (is_array($submission_data) || $submission_data)
                foreach ($submission_data as $field_id => $sub):

                    $sub_key = $sub->label;
                    $sub_data = $sub->value;
                    if(!isset($sub->type)){
                                $sub->type = '';
                            }
                    ?>

                    <!--submission row block-->

                    <div class="cm-submission-field-row">
                        <div class="cm-submission-label"><?php echo $sub_key; ?></div>
                        <div class="cm-submission-value">
                            <?php
                            //if submitted data is array print it in more than one row.
                            
                            if (is_array($sub_data)) {

                                //If submitted data is a file.

                                if (isset($sub_data['cm_field_type']) && $sub_data['cm_field_type'] == 'File') {
                                    unset($sub_data['cm_field_type']);

                                    foreach ($sub_data as $sub) {

                                        $att_path = get_attached_file($sub);
                                        $att_url = wp_get_attachment_url($sub);
                                        ?>
                                        <div class="cm-submission-attachment">
                                            <?php echo wp_get_attachment_link($sub, 'thumbnail', false, true, false); ?>
                                            <div class="cm-submission-attachment-field"><?php echo basename($att_path); ?></div>
                                            <div class="cm-submission-attachment-field"><a href="<?php echo $att_url; ?>"><?php echo CM_UI_Strings::get('LABEL_DOWNLOAD'); ?></a></div>
                                        </div>

                                        <?php
                                    }
                                } elseif (isset($sub_data['cm_field_type']) && $sub_data['cm_field_type'] == 'Address') {
                                    $sub = $sub_data['original'] . '<br/>';
                                    if (count($sub_data) === 8) {
                                        $sub .= '<b>Street Address</b> : ' . $sub_data['st_number'] . ', ' . $sub_data['st_route'] . '<br/>';
                                        $sub .= '<b>City</b> : ' . $sub_data['city'] . '<br/>';
                                        $sub .= '<b>State</b> : ' . $sub_data['state'] . '<br/>';
                                        $sub .= '<b>Zip code</b> : ' . $sub_data['zip'] . '<br/>';
                                        $sub .= '<b>Country</b> : ' . $sub_data['country'];
                                    }
                                    echo $sub;
                                }  elseif ($sub->type == 'Time') {                                  
                                    echo $sub_data['time'].", Timezone: ".$sub_data['timezone'];
                                } 
                                //If submitted data is a Star Rating.
                                
                                
                                
                                else {
                                    $field_data = implode(', ', $sub_data);
                                    if($sub->type=="Repeatable"):
                                        $field_data = '<pre>'.implode('<hr> ', $sub_data).'</pre>';
                                    endif;
                                    
                                    echo $field_data;
                                }
                            } else {
                                
                                if($sub->type == 'Rating')
                                {
                                    echo '<div class="rateit" id="rateit5" data-rateit-min="0" data-rateit-max="5" data-rateit-value="'.$sub->value.'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>';
                                }
                                else
                                {
                                echo $sub_data;
                                }
                            }
                            ?>
                        </div>
                    </div>  <!-- End of one submission block-->
                    <?php
                endforeach;
            if ($data->payment)
            {
                if ($data->payment->log):
                    ?>
                    <div class="cm-submission-field-row">
                        <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_PAYER_NAME'); ?></div>
                        <div class="cm-submission-value"><?php if (isset($data->payment->log['first_name'])) echo $data->payment->log['first_name'];
            if (isset($data->payment->log['last_name'])) echo ' ' . $data->payment->log['last_name']; ?></div>
                    </div>
                    <div class="cm-submission-field-row">
                        <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_PAYER_EMAIL'); ?></div>
                        <div class="cm-submission-value"><?php if (isset($data->payment->log['payer_email'])) echo $data->payment->log['payer_email']; ?></div>
                    </div>
                    <?php
                endif;
                ?>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_INVOICE'); ?></div>
                    <div class="cm-submission-value"><?php if (isset($data->payment->invoice)) echo $data->payment->invoice; ?></div>
                </div>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_TAXATION_ID'); ?></div>
                    <div class="cm-submission-value"><?php if (isset($data->payment->txn_id)) echo $data->payment->txn_id; ?></div>
                </div>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_STATUS_PAYMENT'); ?></div>
                    <div class="cm-submission-value"><?php if (isset($data->payment->status)) echo $data->payment->status; ?></div>
                </div>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_PAID_AMOUNT'); ?></div>
                    <div class="cm-submission-value"><?php if (isset($data->payment->total_amount)) echo $data->payment->total_amount; ?></div>
                </div>
                <div class="cm-submission-field-row">
                    <div class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_DATE_OF_PAYMENT'); ?></div>
                    <div class="cm-submission-value"><?php if (isset($data->payment->posted_date)) echo CM_Utilities::localize_time($data->payment->posted_date, get_option('date_format')); ?></div>
                </div>
                <?php
            }
            ?>


        </form>
    </div>
    <?php
    if ($data->notes && (is_object($data->notes) || is_array($data->notes)))
    {
        foreach ($data->notes as $note)
        {
            ?>
            <div class="cm-submission-note" style="border-left: 4px solid #<?php echo maybe_unserialize($note->note_options)->bg_color; ?>">
                <div class="cm-submission-note-text"><?php echo $note->notes; ?></div>
                <div class="cm-submission-note-attribute">

                    <?php
                    echo CM_UI_Strings::get('LABEL_CREATED_BY') . " <b>" . $note->author . "</b> <em>" . CM_Utilities::localize_time($note->publication_date) . "</em>";
                    if ($note->editor)
                        echo " (" . CM_UI_Strings::get('LABEL_EDITED_BY') . " <b>" . $note->editor . "</b> <em>" . CM_Utilities::localize_time($note->last_edit_date) . "</em>";
                    ?>
                </div>

                <div class="cm-submission-note-attribute"><a href="?page=cm_note_add&cm_submission_id=<?php echo $data->submission->get_submission_id(); ?>&cm_note_id=<?php echo $note->note_id; ?>"><?php echo CM_UI_Strings::get('LABEL_EDIT'); ?></a>
                    <a href="javascript:void(0)" onclick="document.getElementById('cmnotesectionform<?php echo $note->note_id; ?>').submit()"><?php echo CM_UI_Strings::get('LABEL_DELETE'); ?></a>
                </div>
                <form method="post" id="cmnotesectionform<?php echo $note->note_id; ?>">
                    <input type="hidden" name="cm_slug" value="cm_note_delete">
                    <input type="hidden" name="cm_note_id" value="<?php echo $note->note_id; ?>">
                </form>
            </div>
            <?php
        }
    }
    ?>
    <?php     
    $cm_promo_banner_title = "Unlock Note,Print,Block Email/IP and Send Message options by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>
</div>
