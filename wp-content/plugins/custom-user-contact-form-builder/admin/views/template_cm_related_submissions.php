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
   <div class="operationsbar">
        
        <div class="nav">
            <ul>
                <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
              
            </ul>
        </div>

    </div>

    <!--**Content area Starts**-->
     <div class="cmagic-analytics">
        <div class="cm-analytics-table-wrapper">
     <table  class="cm-form-analytics">
                    <?php
                    if ($data->submissions)
                    {
                        //echo "<pre>",  var_dump($data->submissions);
                        ?>
                        <tr>
                            <th><?php echo CM_UI_Strings::get("LABEL_EMAIL") ?></th>
                            <th><?php echo CM_UI_Strings::get("LABEL_FORM") ?></th>
                            <th><?php echo CM_UI_Strings::get("LABEL_SUBMITTED_ON") ?></th>
                            <th><?php echo CM_UI_Strings::get("ACTION"); ?></th></tr>

                        <?php
                       
                        if (is_array($data->submissions) || is_object($data->submissions))
                            foreach ($data->submissions as $submission)
                        {
                            if($submission->submission_id != $data->submission_id){
                        ?>
                                <tr>
                                    <td><?php echo $submission->user_email; ?></td>
                                     <td><?php 
                                     $forms=new CM_Forms;
                                     $forms->load_from_db($submission->form_id);
                                     $form_name=$forms->get_form_name();
                                     echo $form_name; 
                                     
                                     ?></td>   
                                          <td><?php echo $submission->submitted_on; ?></td>   
                                    <td><a href="?page=cm_submission_view&cm_submission_id=<?php echo $submission->submission_id; ?>"><?php echo CM_UI_Strings::get("VIEW"); ?></a></td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <?php
                    } 
    ?>
                </table>
   </div>
          </div>
  </div>
