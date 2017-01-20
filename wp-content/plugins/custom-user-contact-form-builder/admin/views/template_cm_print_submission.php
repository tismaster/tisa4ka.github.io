<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>SUBMISSION'S PDF</title>
        <style>
            * {
                box-sizing: border-box;
            }

            div {
                outline: 0px solid cyan;
            }

            .cmagic  a {
                font-family: 'Roboto', 'Helvetica',sans-serif;
                text-transform: uppercase;
                color: #ff6c6c;
                text-decoration: none;
            }

            .cmagic {

                font-family: 'Roboto', 'helvetica',sans-serif;
                display: block;
                float: left;
                width: 100%;
                max-width: 1100px;
                margin: 5%;
                margin-left: 7%;
                color: rgb(125,125,125);
                font-size: 14px;

            }

            .cmagic sup {
                text-transform: uppercase;
                color: #ff6c6c;
            }

            .cmagic span.cm-red {
                text-transform: uppercase;
                color: #ff6c6c;
            }

            .cmagic .cm-buttonarea {
                width: 100%;
                display: block;
                float: left;
                padding: 15px;
                margin-top: 25px;
            }

            .cmagic input[type=submit] {
                display: inline-block;
                float: left;
                color: #ffffff;
                text-transform: uppercase;
                font-size: 14px;
                border: none;
                background: #ff6c6c;
                padding: 10px 25px 10px 25px;
                transition: 0.1s;
                border-radius: 4px;
            }



            .cmagic input[type=submit]:hover {
                background-color: rgb(245,245,245);
                color: #ff6c6c;
            }

            .cmagic .cancel {
                font-family: 'Roboto', 'Arial', serif;
                display: inline-block;
                float: left;
                color: rgb(200,200,200);
                font-size: 14px;
                text-transform: uppercase;
                padding: 10px 25px 10px 25px;
                margin-right: 20px;
                border-radius: 4px;
                transition: 0.3s;
            }

            .cmagic .cancel:hover {
                color: #ff6c6c;
            }

            .cmagic .cm-submission, .cmagic .cm-invites {margin-top: 25px;}
            .cm-submission-field-row {border-bottom: 1px dotted rgb(240,240,240);}

            .cmagic .cm-submission, .cm-submission-field-row {
                display: block;
                background-color: #fffffe;
                float: left;
                width: 100%;
                padding: 25px;
            }

            .cmagic .cm-submission-label, .cm-submission-value {
                display: inline-block;
                float: left;
            }

            .cmagic .cm-submission-label {font-weight: bold; width: 20%; text-transform: uppercase; font-size: 12px;}
            .cmagic .cm-submission-value {width: 80%;}

            .cmagic .cm-submission-field-row .cm-submission-attachment {
                display: inline-block;
                float: left;
                padding: 10px;
                background-color: rgb(250,250,250);
                border: 2px dashed rgb(240,240,240);
                width: 120px;
                margin:0 10px 10px 0;
            }

            .cmagic .cm-submission-field-row .cm-submission-attachment img {
                float: left;
                display: block;
                width: 100px;
                max-height: 100px;
                height: auto;
            }

            .cmagic .cm-submission-attachment-field {
                display: block;
                float: left;
                font-size: 12px;
                width: 100px;
                text-align: center;
                padding: 5px 0 0 0;
                text-overflow: ellipsis;
                overflow: hidden;

            }

            .cmagic .cm-submission-note {
                border-left: 4px solid red;
                padding: 10px;
                margin-top: 10px;
                display: block;
                width: 100%;
                float: left;
                background: #fffffe;
            }

            .cmagic .cm-submission-note-text {
                background-image: url(cm-submission-note.png);
                background-repeat: no-repeat;
                padding-left: 25px;
                display: block;
                width: 100%;
                float: left;
                font-style: italic;
            }

            .cmagic .cm-submission-note-attribute {
                font-size: 10px;
                padding: 10px;
                text-transform: uppercase;
                display: block;
                width: 100%;
                float: left;
                text-align: right;
                color: rgb(175,175,175);
            }

            .cmagic .cm-submission-note-attribute a {
                padding-right: 10px;
                font-size: 14px;
            }

            .cmagic .cmtitle {
                font-family: 'Titillium Web', 'Verdana', sans-serif;
                display: block;
                float: left;
                padding-left: 20px;
                width:70%;
                font-size:24px;
                color:#94cdc9;
                margin-bottom: 10px;
                text-overflow: ellipsis;
                text-transform: uppercase;
                background-color: #fffffe;
            }

        </style>
    </head>
    <body>
        <div class="cmagic">
            <div class="cmtitle"><?php echo $data->form_name; ?></div>            
            <table class="cm-submission">

                <?php
                if ($data->form_is_unique_token)
                {
                    ?>
                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_UNIQUE_TOKEN_SHORT'); ?> :</td>
                        <td class="cm-submission-value"><?php echo $data->submission->get_unique_token(); ?></td>
                    </tr>
                    <?php
                }
                ?>

                <tr class="cm-submission-field-row">
                    <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_ENTRY_ID'); ?> :</td>
                    <td class="cm-submission-value"><?php echo $data->submission->get_submission_id(); ?></td>
                </tr>

                <tr class="cm-submission-field-row">
                    <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_ENTRY_TYPE'); ?> :</td>
                    <td class="cm-submission-value"><?php echo $data->form_type; ?></td>
                </tr>
                <?php
                if ($data->form_type_status == "1" && !empty($data->user))
                {
                    $user_roles_dd = CM_Utilities::user_role_dropdown();
                    ?>
                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_USER_NAME'); ?> :</td>
                        <td class="cm-submission-value"><?php echo $data->user->display_name; ?></td>
                    </tr>

                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_USER_ROLES'); ?> :</td>
                        <td class="cm-submission-value"><?php echo $user_roles_dd[(implode(',', $data->user->roles))]; ?></td>
                    </tr>

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

                        <tr class="cm-submission-field-row">
                            <td class="cm-submission-label"><?php echo $sub_key; ?> :</td>
                            <td class="cm-submission-value">
                            <?php
                            //if submitted data is array print it in more than one row.

                            if (is_array($sub_data))
                            {

                                $i = 0;

                                //If submitted data is a file.

                                if (isset($sub_data['cm_field_type']) && $sub_data['cm_field_type'] == 'File')
                                {
                                    unset($sub_data['cm_field_type']);
                                    ?>                                    

                                        <?php
                                    foreach ($sub_data as $sub)
                                    {
                                        $att_path = get_attached_file($sub);
                                        ?>
                                        <div class="cm-submission-attachment">
                                            <?php echo wp_get_attachment_link($sub, 'thumbnail', false, true, false); ?>
                                            <div class="cm-submission-attachment-field"><?php echo basename($att_path); ?></div>
                                        </div>

                                        <?php
                            }
                            ?>
                            
                            <?php
                        } else
                        {
                            $sub = implode(', ', $sub_data);
                            echo $sub;
                        }
                        } else
                        {
                             echo $sub_data; 
                              
                        }
                        ?>
                        </td>
                            </tr><!-- End of one submission block-->
                            <?php

                    endforeach;

                if ($data->payment)
                {
                    ?>
                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_INVOICE'); ?> :</td>
                        <td class="cm-submission-value"><?php if (isset($data->payment->invoice)) echo $data->payment->invoice; ?></td>
                    </tr>
                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_TAXATION_ID'); ?> :</td>
                        <td class="cm-submission-value"><?php if (isset($data->payment->txn_id)) echo $data->payment->txn_id; ?></td>
                    </tr>
                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_STATUS_PAYMENT'); ?> :</td>
                        <td class="cm-submission-value"><?php if (isset($data->payment->status)) echo $data->payment->status; ?></td>
                    </tr>
                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_PAID_AMOUNT'); ?> :</td>
                        <td class="cm-submission-value"><?php if (isset($data->payment->total_amount)) echo $data->payment->total_amount; ?></td>
                    </tr>
                    <tr class="cm-submission-field-row">
                        <td class="cm-submission-label"><?php echo CM_UI_Strings::get('LABEL_DATE_OF_PAYMENT'); ?> :</td>
                        <td class="cm-submission-value"><?php if (isset($data->payment->posted_date)) echo CM_Utilities::localize_time($data->payment->posted_date, get_option('date_format')); ?></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
    </body>
</html>

