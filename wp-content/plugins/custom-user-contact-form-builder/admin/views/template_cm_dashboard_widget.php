<?php
//echo "<pre>", var_dump($data),die;		

?>

<div class="cm-dashboard-widget-container">

<div class="cm-dash-widget-head">
    <div class="cm-dash-widget-logo"><img src="<?php echo CM_IMG_URL.'logo.png';?>"></div>
    <div  class="cm-dash-widget-summary">
        <div><?php echo CM_UI_Strings::get('LABEL_TODAY');?><span><?php echo $data->count->today; ?></span></div>
        <div><?php echo CM_UI_Strings::get('LABEL_THIS_WEEK');?><span><?php echo $data->count->this_week; ?></span></div>
        <div><?php echo CM_UI_Strings::get('LABEL_THIS_MONTH');?><span><?php echo $data->count->this_month; ?></span></div>
    </div>
</div>
<hr>

<table class="cm_user_submissions">
    <caption><?php echo CM_UI_Strings::get('DASHBOARD_WIDGET_TABLE_CAPTION'); ?></caption>

  <?php  foreach($data->submissions as $submission):?>
  <tr>
    <td class="cm_submission_date"><?php echo $submission->date;?></td>
    <td class="cm_form_title"><?php if($submission->name) echo $submission->name; else echo CM_UI_Strings::get('LABEL_FORM_DELETED'); ?></td>
    <!-- <td class="cm_form_payment"><?php // if($submission->payment_status) echo $submission->payment_status; else echo CM_UI_Strings::get('LABEL_NOT_APPLICABLE_ABB');?></td> -->
    <td class="cm_view_submission"><a href= <?php echo "'admin.php?page=cm_submission_view&cm_submission_id=",$submission->submission_id,"'>";?><?php echo CM_UI_Strings::get('VIEW'); ?></a></td>
  </tr>
  <?php endforeach;?>
</table>
</div>