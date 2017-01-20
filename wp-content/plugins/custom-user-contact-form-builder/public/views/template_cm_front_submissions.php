<?php
//echo "<pre>", var_dump($data);
/**
 * Plugin Template File[For Front End Submission Page]
 */
?>

<!-- setup initial tab -->
<pre class="cm-pre-wrapper-for-script-tags"><script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#cm_tabbing_container_front_sub").tabs({active: <?php echo $data->active_tab_index; ?>});
    });

    function get_tab_and_redirect(reqpagestr) {
        //alert(reqpage);
        var tab_index = jQuery("#cm_tabbing_container_front_sub").tabs("option", "active");
        var curr_url = window.location.href;
        var sign = '&';
        if (curr_url.indexOf('?') === -1)
            sign = '?';
        window.location.href = curr_url + sign + reqpagestr + '&cm_tab=' + tab_index;
    }
</script></pre>

<?php
if (!$data->payments && !$data->submissions && $data->is_user !== true)
{
    ?>

    <div class="cmnotice-container"><div class="cmnotice"><?php echo CM_UI_Strings::get('MSG_NO_DATA_FOR_EMAIL'); ?></div></div>
    <?php
}
?>
<div class="cmagic cm_tabbing_container" id="cm_tabbing_container_front_sub"> 

    <!-----Operationsbar Starts-->

    <div class="operationsbar">
        <!--        <div class="cmtitle">Submissions</div>-->
        <div class="nav">
            <ul>
                
                <li><a href="#cm_my_sub_tab"><?php echo CM_UI_Strings::get('LABEL_MY_SUBS'); ?></a></li>
                <?php
                if ($data->payments)
                {
                    ?>
                    <li><a href="#cm_my_pay_tab"><?php echo CM_UI_Strings::get('LABEL_PAY_HISTORY'); ?></a></li>
                    <?php
                }
                if ($data->is_authorized)
                {
                    ?>
                    <li class="cm-form-toggle" onclick="document.getElementById('cm_front_submissions_nav_form').submit()"><?php echo CM_UI_Strings::get('LABEL_LOG_OFF'); ?></li>
                    <?php
                }
                ?>
            </ul>
            <form method="post" id="cm_front_submissions_nav_form">
                <input type="hidden" name="cm_slug" value="cm_front_log_off">
            </form>
            <form method="post" id="cm_front_submissions_respas_form">
                <input type="hidden" name="cm_slug" value="cm_front_reset_pass_page">
                <input type="hidden" name="CM_CLEAR_ERROR" value="true">
            </form>

        </div>


    </div>
    <!--------Operationsbar Ends----->

    <!-------Contentarea Starts----->

    <!----Table Wrapper---->

    <div class="cmagic-table" id="cm_my_sub_tab">

        <?php
        if ($data->submission_exists === true)
        {
            ?>
            <table class="cm-table">
                <tr>
                    <th><?php echo CM_UI_Strings::get('LABEL_SR'); ?></th>
                    <th><?php echo CM_UI_Strings::get('LABEL_FORM'); ?></th>
                    <th><?php echo CM_UI_Strings::get('LABEL_DATE'); ?></th>
                    <th></th>
                </tr>
                <?php
                $i = 0;
                if ($data->submissions):
                    foreach ($data->submissions as $data_single):
                        ?>  
                        <tr>
                            <td id="<?php echo $data_single->submission_id; ?>"><?php echo ++$i; ?></td>
                            <td><a href="<?php echo add_query_arg( 'submission_id',$data_single->submission_id); ?>"><?php echo $data_single->form_name; ?></a></td>
                            <td><?php echo CM_Utilities::localize_time($data_single->submitted_on, $data->date_format); ?></td>
                            <td></td>
                        <form id="cmsubmissionfrontform<?php echo $data_single->submission_id; ?>" method="post">
                            <input type="hidden" value="<?php echo $data_single->submission_id; ?>" name="cm_submission_id">
                            
                        </form>    
                        </tr>
                        <?php
                    endforeach;
                else:

                endif;
                ?>
            </table>
            <?php
            /*             * ********** Pagination Logic ************** */
            $max_pages_without_abb = 10;
            $max_visible_pages_near_current_page = 3; //This many pages will be shown on both sides of current page number.

            if ($data->total_pages_sub > 1):
                ?>
                <ul class="cmpagination">
                    <?php
                    if ($data->curr_page_sub > 1):
                        ?>
                        <li onclick="get_tab_and_redirect('cm_reqpage_sub=1')"><a><?php echo CM_UI_Strings::get('LABEL_FIRST'); ?></a></li>
                        <li onclick="get_tab_and_redirect('cm_reqpage_sub=<?php echo $data->curr_page_sub - 1; ?>')"><a><?php echo CM_UI_Strings::get('LABEL_PREVIOUS'); ?></a></li>
                        <?php
                    endif;
                    if ($data->total_pages_sub > $max_pages_without_abb):
                        if ($data->curr_page_sub > $max_visible_pages_near_current_page + 1):
                            ?>
                            <li><a> ... </a></li>
                            <?php
                            $first_visible_page = $data->curr_page_sub - $max_visible_pages_near_current_page;
                        else:
                            $first_visible_page = 1;
                        endif;

                        if ($data->curr_page_sub < $data->total_pages_sub - $max_visible_pages_near_current_page):
                            $last_visible_page = $data->curr_page_sub + $max_visible_pages_near_current_page;
                        else:
                            $last_visible_page = $data->total_pages_sub;
                        endif;
                    else:
                        $first_visible_page = 1;
                        $last_visible_page = $data->total_pages_sub;
                    endif;
                    for ($i = $first_visible_page; $i <= $last_visible_page; $i++):
                        if ($i != $data->curr_page_sub):
                            ?>
                            <li onclick="get_tab_and_redirect('cm_reqpage_sub=<?php echo $i; ?>')"><a><?php echo $i; ?></a></li>
                        <?php else:
                            ?>
                            <li onclick="get_tab_and_redirect('cm_reqpage_sub=<?php echo $i; ?>')"><a class="active"?><?php echo $i; ?></a></li>
                        <?php
                        endif;
                    endfor;
                    if ($data->total_pages_sub > $max_pages_without_abb):
                        if ($data->curr_page_sub < $data->total_pages_sub - $max_visible_pages_near_current_page):
                            ?>
                            <li><a> ... </a></li>
                            <?php
                        endif;
                    endif;
                    ?>
                    <?php
                    if ($data->curr_page_sub < $data->total_pages_sub):
                        ?>
                        <li onclick="get_tab_and_redirect('cm_reqpage_sub=<?php echo $data->curr_page_sub + 1; ?>')"><a><?php echo CM_UI_Strings::get('LABEL_NEXT'); ?></a></li>
                        <li onclick="get_tab_and_redirect('cm_reqpage_sub=<?php echo $data->total_pages_sub; ?>')"><a><?php echo CM_UI_Strings::get('LABEL_LAST'); ?></a></li>
                        <?php
                    endif;
                    ?>
                </ul>
            <?php
            endif;
        } else
            echo CM_UI_Strings::get('MSG_NO_SUBMISSION_FRONT');
        ?>
    </div>
    <?php
    if ($data->payments):
        ?>
        <div class="cmagic-table" id="cm_my_pay_tab">


            <table class="cm-table">
                <tr>
                    <th><?php echo CM_UI_Strings::get('LABEL_DATE'); ?></th>
                    <th><?php echo CM_UI_Strings::get('LABEL_FORM'); ?></th>
                    <th><?php echo CM_UI_Strings::get('LABEL_AMOUNT'); ?></th>
                    <th><?php echo CM_UI_Strings::get('LABEL_TXN_ID'); ?></th>
                    <th><?php echo CM_UI_Strings::get('LABEL_STATUS'); ?></th>
                </tr>
                <?php
                for ($i = $data->offset_pay; $i < $data->end_offset_this_page; $i++):
                    ?>
                    <tr>
                        <td><?php echo CM_Utilities::localize_time($data->payments[$i]->posted_date, $data->date_format); ?></td>
                        <td><a href="<?php echo add_query_arg( 'submission_id',$data->payments[$i]->submission_id); ?>"><?php echo $data->form_names[$data->payments[$i]->submission_id]; ?></a></td>
                        <td><?php echo $data->payments[$i]->total_amount; ?></td>
                        <td><?php echo $data->payments[$i]->txn_id; ?></td>
                        <td><?php echo $data->payments[$i]->status; ?></td>
                    </tr>
                    <?php
                endfor;
                ?>
            </table>

            <?php
            /*             * ********** Pagination Logic ************** */
            $max_pages_without_abb = 10;
            $max_visible_pages_near_current_page = 3; //This many pages will be shown on both sides of current page number.

            if ($data->total_pages_pay > 1):
                ?>
                <ul class="cmpagination">
                    <?php
                    if ($data->curr_page_pay > 1):
                        ?>
                        <li onclick="get_tab_and_redirect('cm_reqpage_pay=1')"><a><?php echo CM_UI_Strings::get('LABEL_FIRST'); ?></a></li>
                        <li onclick="get_tab_and_redirect('cm_reqpage_pay=<?php echo $data->curr_page_pay - 1; ?>')"><a><?php echo CM_UI_Strings::get('LABEL_PREVIOUS'); ?></a></li>
                        <?php
                    endif;
                    if ($data->total_pages_pay > $max_pages_without_abb):
                        if ($data->curr_page_pay > $max_visible_pages_near_current_page + 1):
                            ?>
                            <li><a> ... </a></li>
                            <?php
                            $first_visible_page = $data->curr_page_pay - $max_visible_pages_near_current_page;
                        else:
                            $first_visible_page = 1;
                        endif;

                        if ($data->curr_page_pay < $data->total_pages_pay - $max_visible_pages_near_current_page):
                            $last_visible_page = $data->curr_page_pay + $max_visible_pages_near_current_page;
                        else:
                            $last_visible_page = $data->total_pages_pay;
                        endif;
                    else:
                        $first_visible_page = 1;
                        $last_visible_page = $data->total_pages_pay;
                    endif;
                    for ($i = $first_visible_page; $i <= $last_visible_page; $i++):
                        if ($i != $data->curr_page_pay):
                            ?>
                            <li onclick="get_tab_and_redirect('cm_reqpage_pay=<?php echo $i; ?>')"><a><?php echo $i; ?></a></li>
                        <?php else:
                            ?>
                            <li onclick="get_tab_and_redirect('cm_reqpage_pay=<?php echo $i; ?>')"><a class="active"><?php echo $i; ?></a></li>
                            <?php
                            endif;
                        endfor;
                        if ($data->total_pages_pay > $max_pages_without_abb):
                            if ($data->curr_page_pay < $data->total_pages_pay - $max_visible_pages_near_current_page):
                                ?>
                            <li><a> ... </a></li>
                            <?php
                        endif;
                    endif;
                    ?>
                    <?php
                    if ($data->curr_page_pay < $data->total_pages_pay):
                        ?>
                        <li onclick="get_tab_and_redirect('cm_reqpage_pay=<?php echo $data->curr_page_pay + 1; ?>')"><a><?php echo CM_UI_Strings::get('LABEL_NEXT'); ?></a></li>
                        <li onclick="get_tab_and_redirect('cm_reqpage_pay=<?php echo $data->total_pages_pay; ?>')"><a><?php echo CM_UI_Strings::get('LABEL_LAST'); ?></a></li>
                        <?php
                    endif;
                    ?>
                </ul>
    <?php endif; ?>

            <!-- 
                    <ul class="cmpagination">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
            -->
            <!-- Pagination Ends    -->


        </div>   

        <?php
    endif;
    ?>

</div>
