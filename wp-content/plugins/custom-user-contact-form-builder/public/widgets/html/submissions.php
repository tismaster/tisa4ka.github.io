<?php
foreach ($submissions as $index => $submission) {
    $submission_id= $submission->submission_id; 
    ?>
    <div class="cm-submission-card cm-white-box cm-rounded-corners">
                        <div class="cm-submission-card-title dbfl cm-accent-bg"><a href="<?php echo add_query_arg( 'submission_id',$submission_id, get_permalink(get_option('cm_option_front_sub_page_id'))); ?>"><?php echo $submission->form_name; ?> </a></div>
                        <div class="cm-submission-card-content dbfl">
                            <div class="cm-submission-icon difl">
                                <img src="<?php echo CM_IMG_URL; ?>submission-clock.png">
                            </div>
                            <div class="cm-submission-details difl"><b><?php echo CM_UI_Strings::get('LABEL_SUBMITTED_ON'); ?></b><br/><?php echo $submission->submitted_on; ?></div>
                        </div>
                    </div>
<?php } ?>
