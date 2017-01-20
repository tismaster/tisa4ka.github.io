<div class="dbfl" id="cm-user-greeting">
    <strong id="cm-greeting-text"></strong><?php echo $data->user->first_name; ?>
</div>
<div class="cm-user-panel-user-image dbfl">
    <?php echo get_avatar($data->user->ID); ?>
</div>
<div class="cm-user-panel-user-details cm-white-box cm-rounded-corners dbfl">
    <div class="cm-panel-row dbfl">
        <div class="cm-panel-field difl"><?php echo CM_UI_Strings::get('FIELD_TYPE_FNAME'); ?></div>
        <div class="cm-panel-value difl"><?php echo $data->user->first_name; ?></div>
    </div>
    <div class="cm-panel-row dbfl">
        <div class="cm-panel-field difl"><?php echo CM_UI_Strings::get('FIELD_TYPE_LNAME'); ?></div>
        <div class="cm-panel-value difl"><?php echo $data->user->last_name; ?></div>
    </div>
    <div class="cm-panel-row dbfl">
        <div class="cm-panel-field difl"><?php echo CM_UI_Strings::get('LABEL_BIO'); ?></div>
        <div class="cm-panel-value difl"><?php echo $data->user->description; ?></div>
    </div>
    <?php
    $editable_forms = array();
    if (is_array($data->custom_fields) || is_object($data->custom_fields)) {
        foreach ($data->custom_fields as $field_id => $sub) {
            $key = $sub->label;
            $meta = $sub->value;
            $sub_original = $sub;
            if(!isset($sub->type)){
                                $sub->type = '';
                            }
            $meta = CM_Utilities::strip_slash_array(maybe_unserialize($meta));
            ?>
            <div class="cm-panel-row dbfl">

                <div class="cm-panel-field difl"><?php echo $key; ?></div>
                <div class="cm-panel-value difl">
                    <?php
                    if (is_array($meta) || is_object($meta)) {
                                        if (isset($meta['cm_field_type']) && $meta['cm_field_type'] == 'File') {
                                            unset($meta['cm_field_type']);

                                            foreach ($meta as $sub) {

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
                                        } elseif (isset($meta['cm_field_type']) && $meta['cm_field_type'] == 'Address') {
                                            $sub = $meta['original'] . '<br/>';
                                            if (count($meta) === 8) {
                                                $sub .= '<b>Street Address</b> : ' . $meta['st_number'] . ', ' . $meta['st_route'] . '<br/>';
                                                $sub .= '<b>City</b> : ' . $meta['city'] . '<br/>';
                                                $sub .= '<b>State</b> : ' . $meta['state'] . '<br/>';
                                                $sub .= '<b>Zip code</b> : ' . $meta['zip'] . '<br/>';
                                                $sub .= '<b>Country</b> : ' . $meta['country'];
                                            }
                                                echo $sub;
                                        } elseif ($sub->type == 'Time') {                                  
                                    echo $meta['time'].", Timezone: ".$meta['timezone'];
                                } else {
                                            $sub = implode(', ', $meta);
                                            echo $sub;
                                        }
                                    } else {
                                        if($sub->type=='Rating')
                                        {
                                           echo '<div class="rateit" id="rateit5" data-rateit-min="0" data-rateit-max="5" data-rateit-value="'.$meta.'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>';
                                 
                                        }
                                        else
                                        echo $meta;
                                    }
                    ?>
                </div>
            </div>
            <?php
            //check if any field is editable
            if($sub_original->is_editable == 1 && !in_array($sub_original->form_id, $editable_forms)){
                $editable_forms[] = $sub_original->form_id;
            }
        }
    }
    ?>

</div>
<?php if(!empty($editable_forms)){ ?>
 <div id="cm_edit_sub_link">
                <form method="post" name="cm_form" action="<?php echo get_permalink(get_option('cm_option_front_sub_page_id')); ?>" id="cmeditsubmissions">
                    <input type="hidden" name="cm_edit_user_details" value="true">
                    <input type="hidden" name="form_ids" value='<?php echo json_encode($editable_forms); ?>'>
                </form>
                <a href="javascript:void(0)" onclick="document.getElementById('cmeditsubmissions').submit();"><?php echo CM_UI_Strings::get('MSG_EDIT_YOUR_SUBMISSIONS'); ?></a>
            </div> 
<?php } ?>
