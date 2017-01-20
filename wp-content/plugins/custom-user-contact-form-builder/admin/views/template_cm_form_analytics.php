

<div class="cmagic">

<pre class='cm-pre-wrapper-for-script-tags'><script>
    //Takes value of various status variables (form_id, timeline_range) and reloads page with those parameteres updated.
    function cm_refresh_stats(){
    var form_id = jQuery('#cm_form_dropdown').val();
    var trange = jQuery('#cm_stat_timerange').val();
    if(typeof trange == 'undefined')
        trange = <?php echo $data->timerange; ?>;
    window.location = '?page=cm_analytics_show_form&cm_form_id=' + form_id + '&cm_tr='+trange;
}
</script></pre>
    <!-----Operationsbar Starts-->

    <div class="operationsbar">
        <div class="cmtitle"><?php echo CM_UI_Strings::get('TITLE_FORM_STAT_PAGE'); ?></div>
        <div class="icons">
            <a href="<?php echo get_admin_url() . "admin.php?page=cm_options_manage"; ?>"><img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . "images/global-settings.png"; ?>">
            </a></div>
        <div class="nav">
            <ul>
                <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
              
                <li onclick="jQuery.cm_do_action_with_alert('<?php echo CM_UI_Strings::get('ALERT_STAT_RESET'); ?>', 'cm_form_analytic_dd', 'cm_analytics_reset')"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get('LABEL_RESET_STATS'); ?></a></li>
                <li class="cm-form-toggle">
                    <?php
                    if (count($data->forms) !== 0) {
                        echo '<span id="cmfilterby">',CM_UI_Strings::get('LABEL_FILTER_BY'),'</span>';
                        ?> 
                        <form action="" id="cm_form_analytic_dd" method="post">
                            <input type="hidden" name='cm_slug' value='' id='cm_slug_input_field'>
                            <input type="hidden" name="req_source" value="form_analytics">
                            <select id="cm_form_dropdown" name="cm_form_id" onchange="cm_refresh_stats()">
                                <?php
                                foreach ($data->forms as $form_id => $form)
                                    if ($data->current_form_id == $form_id)
                                        echo "<option value=$form_id selected>$form</option>";
                                    else
                                        echo "<option value=$form_id>$form</option>";
                                ?>
                            </select>
                        </form>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        </div>

    </div>
    <!--------Operationsbar Ends-->

    <!--------Filters
    
    <div class="cmfilters">
    <ul>
    <li>Filters </li>
    <li><a href="#" class="filteron">Time &#x2715;</a></li>
    <li><a href="#">Submissions &#x25BF;</a></li>
    <li><a href="#">Search &#x25BF;</a></li>
    <li class="sort"><a href="#">By Name &#x25BF;</a></li>
    <li class="sort">Sort </li>
    </ul>
    </div> -->

    <!-------Contentarea Starts-->

    <div class="cmagic-analytics">

        <div class="cm-analytics-table-wrapper">

            <?php
            if (count($data->forms) == 0):
                ?>
                <div class="cmnotice" style="min-height: 45px;"><?php echo CM_UI_Strings::get('MSG_NO_FORMS_FUNNY'); ?></div>

            </div></div></div>

    <?php
    return;
endif;
?>

<?php
if (!$data->stat_data):
    ?>

    <div class="cmnotice" style="min-height: 45px;"><?php echo CM_UI_Strings::get('ERROR_STAT_INSUFF_DATA'); ?></div>


    </div></div></div>
    <?php
    return;
endif;
?>


<table class="cm-form-analytics">
    <th>#</th>
    <th><?php echo CM_UI_Strings::get('LABEL_IP'); ?></th>
    <th><?php echo CM_UI_Strings::get('LABEL_SUBMISSION_STATE'); ?></th>
    <th><?php echo CM_UI_Strings::get('LABEL_VISITED_ON'); ?></th>
    <th><?php echo CM_UI_Strings::get('LABEL_SUBMITTED_ON'); ?></th>
    <th><?php echo CM_UI_Strings::get('LABEL_TIME_TAKEN'); ?></th>

    <?php
    $i = $data->starting_serial_number;
    foreach ($data->stat_data as $stat) {
        $visited_on = CM_Utilities::convert_to_mysql_timestamp($stat->visited_on);
        $visited_on = CM_Utilities::localize_time($visited_on, 'd M Y, h:ia');
        if ($stat->submitted_on)
        {
            if($stat->submitted_on == 'banned')
                $submitted_on = CM_UI_Strings::get('LABEL_BANNED_SUBMISSIONS');
            else
                $submitted_on = CM_Utilities::convert_to_mysql_timestamp($stat->submitted_on);            
        }
        else
            $submitted_on = null;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><a href='https://geoiptool.com/?ip=<?php echo $stat->user_ip; ?>'><?php echo $stat->user_ip; ?></a></td>
            <td>&nbsp;
                <?php
                if ($stat->submitted_on && $stat->submitted_on != 'banned')
                    echo "<img class='cmsubmitted_icon' src='" .
                    plugin_dir_url(dirname(dirname(__FILE__))) . "images/right.png'>";
                ?>
            </td>
            <td><?php echo $visited_on; ?></td>
            <td><?php echo $submitted_on; ?></td>
            <td><?php
                echo $stat->time_taken;
                if ($stat->time_taken)
                    echo "s";
                ?></td>
        </tr>
        <?php
        $i++;
    }
    ?>
</table>

<?php
/* * ********** Pagination Logic ************** */
$max_pages_without_abb = 10;
$max_visible_pages_near_current_page = 3; //This many pages will be shown on both sides of current page number.

if ($data->total_pages > 1):
    ?>
    <ul class="cmpagination">
        <?php
        if ($data->curr_page > 1):
            ?>
            <li><a href="?page=<?php echo $data->cm_slug ?>&cm_form_id=<?php echo $data->current_form_id; ?>&cm_reqpage=1"><?php echo CM_UI_Strings::get('LABEL_FIRST'); ?></a></li>
            <li><a href="?page=<?php echo $data->cm_slug ?>&cm_form_id=<?php echo $data->current_form_id; ?>&cm_reqpage=<?php echo $data->curr_page - 1; ?>"><?php echo CM_UI_Strings::get('LABEL_PREVIOUS'); ?></a></li>
            <?php
        endif;
        if ($data->total_pages > $max_pages_without_abb):
            if ($data->curr_page > $max_visible_pages_near_current_page + 1):
                ?>
                <li><a> ... </a></li>
                <?php
                $first_visible_page = $data->curr_page - $max_visible_pages_near_current_page;
            else:
                $first_visible_page = 1;
            endif;

            if ($data->curr_page < $data->total_pages - $max_visible_pages_near_current_page):
                $last_visible_page = $data->curr_page + $max_visible_pages_near_current_page;
            else:
                $last_visible_page = $data->total_pages;
            endif;
        else:
            $first_visible_page = 1;
            $last_visible_page = $data->total_pages;
        endif;
        for ($i = $first_visible_page; $i <= $last_visible_page; $i++):
            if ($i != $data->curr_page):
                ?>
                <li><a href="?page=<?php echo $data->cm_slug ?>&cm_form_id=<?php echo $data->current_form_id; ?>&cm_reqpage=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php else:
                ?>
                <li><a class="active" href="?page=<?php echo $data->cm_slug ?>&cm_form_id=<?php echo $data->current_form_id; ?>&cm_reqpage=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            endif;
        endfor;
        if ($data->total_pages > $max_pages_without_abb):
            if ($data->curr_page < $data->total_pages - $max_visible_pages_near_current_page):
                ?>
                <li><a> ... </a></li>
                <?php
            endif;
        endif;
        ?>
        <?php
        if ($data->curr_page < $data->total_pages):
            ?>
            <li><a href="?page=<?php echo $data->cm_slug ?>&cm_form_id=<?php echo $data->current_form_id; ?>&cm_reqpage=<?php echo $data->curr_page + 1; ?>"><?php echo CM_UI_Strings::get('LABEL_NEXT'); ?></a></li>
            <li><a href="?page=<?php echo $data->cm_slug ?>&cm_form_id=<?php echo $data->current_form_id; ?>&cm_reqpage=<?php echo $data->total_pages; ?>"><?php echo CM_UI_Strings::get('LABEL_LAST'); ?></a></li>
            <?php
        endif;
        ?>
    </ul>
<?php endif; ?>


</div>

<div class="cm-center-stats-box">
    <div class="cm-box-title"><?php echo CM_UI_Strings::get('LABEL_SUBS_OVER_TIME'); ?></div>
    <div class="cm-timerange-toggle">
    <?php echo CM_UI_Strings::get('LABEL_SELECT_TIMERANGE'); ?>
        <select id="cm_stat_timerange" onchange="cm_refresh_stats()">
        <?php $trs = array(7,30,60,90); 
            
        foreach($trs as $tr)
        {
            echo "<option value=$tr";
            if($data->timerange == $tr)
                echo " selected";
            printf(">".CM_UI_Strings::get("STAT_TIME_RANGES")."</option>",$tr);
        }
        ?>
        
    </select>
    </div>
    <div class="cm-box-graph" id="cm_subs_over_time_chart_div">
    </div>
</div>

<div class="cm-left-stats-box">
    <div class="cm-box-title"><?php echo CM_UI_Strings::get('LABEL_CONVERSION') . " % (" . CM_UI_Strings::get('LABEL_SUBMISSIONS') . "/" . CM_UI_Strings::get('LABEL_TOTAL_VISITS') . ")"; ?></div>
    <div class="cm-box-graph" id="cm_conversion_chart_div">
    </div>
</div>

<div class="cm-right-stats-box">
    <div class="cm-box-title"><?php echo CM_UI_Strings::get('LABEL_BROWSERS_USED'); ?></div>
    <div class="cm-box-graph" id="cm_browser_usage_chart_div">
    </div>
</div>

<div class="cm-left-stats-box">
    <div class="cm-analytics-stat-counter">
        <div class="cm-analytics-stat-counter-value"><?php echo $data->analysis->failure_rate; ?><span class="cm-counter-value-dark">%</span></div>
        <div class="cm-analytics-stat-counter-text"><?php echo CM_UI_Strings::get('LABEL_FAILURE_RATE'); ?></div>
    </div>
</div>

<div class="cm-right-stats-box">
    <div class="cm-analytics-stat-counter">
        <div class="cm-analytics-stat-counter-value"><?php echo $data->analysis->avg_filling_time; ?><span class="cm-counter-value-dark">s</span></div>
        <div class="cm-analytics-stat-counter-text"><?php echo CM_UI_Strings::get('LABEL_TIME_TAKEN_AVG'); ?></div>
    </div>
</div>

<div class="cm-center-stats-box">
    <div class="cm-box-title"><?php echo CM_UI_Strings::get('LABEL_CONV_BY_BROWSER'); ?></div>
    <div class="cm-box-graph" id="cm_conversion_by_browser_chart_div">
    </div>
</div>


</div>
<?php 
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>

</div>



<?php
/* * ***********************************************************
 * *************     Chart drawing - Conversion    **************
 * ************************************************************ */

$dataset = array(CM_UI_Strings::get('LABEL_FAILED_SUBMISSIONS') => $data->analysis->failed_submission,
    CM_UI_Strings::get('LABEL_SUBMISSIONS') => $data->analysis->total_entries - $data->analysis->failed_submission);

$json_table = CM_Utilities::create_json_for_chart(CM_UI_Strings::get('LABEL_SUBMISSIONS'), CM_UI_Strings::get('LABEL_FAILED_SUBMISSIONS'), $dataset);
?>
<pre class='cm-pre-wrapper-for-script-tags'><script>
    function cm_drawConversionChart()
    {
        var data = new google.visualization.DataTable('<?php echo $json_table; ?>');

        // Set chart options
        var options = {/*is3D : true,*/
            title: '<?php echo strtoupper(CM_UI_Strings::get('LABEL_TOTAL_VISITS') . " " . $data->analysis->total_entries); ?>',
            /*width:400,*/
            height: 300,
            fontName: 'Titillium Web',
            pieSliceTextStyle: {fontSize: 12},
            titleTextStyle: {fontSize: 18, color: '#87c2db', bold: false},
            legend: {position: 'bottom', maxLines: 1, textStyle: {fontSize: 12}},
            /*chartArea: {left:20,top:0,width:'50%',height:'75%'},*/
            colors: ['#ffa845', '#8ace5f', '#5fc1ce']};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('cm_conversion_chart_div'));
        chart.draw(data, options);
    }
</script></pre>

<?php
/* * ****************************************************************
 * *************     Chart drawing - Browser Usage     **************
 * **************************************************************** */
$dataset = array();

foreach ($data->analysis->browsers as $name => $usage) {
    $formatted_name = CM_UI_Strings::get('LABEL_BROWSER_' . strtoupper($name));
    $dataset[$formatted_name] = $usage->visits;
}

$json_table = CM_Utilities::create_json_for_chart(CM_UI_Strings::get('LABEL_BROWSER'), CM_UI_Strings::get('LABEL_HITS'), $dataset);
?>
<pre class='cm-pre-wrapper-for-script-tags'><script>
    function cm_drawBrowserUsageChart()
    {
        var data = new google.visualization.DataTable('<?php echo $json_table; ?>');

        // Set chart options
        var options = {/*is3D : true,*/
            /* width:400,*/
            height: 300,
            fontName: 'Titillium Web',
            pieSliceTextStyle: {fontSize: 12},
            colors: ['#5fc1ce', '#a35fce', '#ce6c5f', '#8ace5f', '#5f8ace', '#ce5f8a', '#ffa845', '#8ace5f', '#c1ce5f', '#ce5fc1']};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('cm_browser_usage_chart_div'));
        chart.draw(data, options);
    }
</script></pre>

<?php
/* * ****************************************************************
 * *************     Chart drawing - C/B Bar Chart     **************
 * **************************************************************** */
$data_string = '';
foreach ($data->analysis->browsers as $name => $usage) {
    if ($usage->visits != 0) {
        $formatted_name = CM_UI_Strings::get('LABEL_BROWSER_' . strtoupper($name));
        $data_string .= ", ['$formatted_name', " . $usage->visits . ", $usage->submissions]";
    }
}
$data_string = substr($data_string, 2);
?>
<pre class='cm-pre-wrapper-for-script-tags'><script>
    function cm_drawConversionByBrowserChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['<?php echo CM_UI_Strings::get('LABEL_BROWSER'); ?>',
                '<?php echo CM_UI_Strings::get('LABEL_TOTAL_VISITS'); ?>',
                '<?php echo CM_UI_Strings::get('LABEL_SUBMISSIONS'); ?>'],
<?php echo $data_string; ?>
        ]);

        var options = {
            chartArea: {width: '50%'},
            height: 500,
            fontName: 'Titillium Web',
            pieSliceTextStyle: {fontSize: 12},
            hAxis: {
                title: '<?php echo CM_UI_Strings::get('LABEL_HITS'); ?>',
                minValue: 0
            },
            vAxis: {
                title: '<?php echo CM_UI_Strings::get('LABEL_BROWSER'); ?>'
            },
            legend: {position: 'top', maxLines: 3},
            colors: ['#ffa845', '#8ace5f'],
            bar: {
                groupWidth: 20
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('cm_conversion_by_browser_chart_div'));
        chart.draw(data, options);
    }
</script></pre>

<?php
/* * ****************************************************************
 * *************     Chart drawing - Line Chart        **************
 * **************************************************************** */
$data_string = '';
foreach ($data->day_wise_stat as $date => $per_day) {
    
        $formatted_name = $date;
        $data_string .= ", ['$formatted_name', " . $per_day->visits . ", $per_day->submissions]";
    
}
$data_string = substr($data_string, 2);
?>

<pre class='cm-pre-wrapper-for-script-tags'><script>
    function cm_drawTimewiseStat()
    {
        var data = google.visualization.arrayToDataTable([
            ['<?php echo CM_UI_Strings::get('LABEL_DATE'); ?>',
             '<?php echo CM_UI_Strings::get('LABEL_VISITS'); ?>',
             '<?php echo CM_UI_Strings::get('LABEL_SUBMISSIONS'); ?>'],
<?php echo $data_string; ?>
        ]);

        var options = {
            chartArea: {width: '90%'},
            height: 500,
            fontName: 'Titillium Web',
            hAxis: {
                title: '',
                minValue: 0,
                slantedText: false,
                maxAlternation: 1,
                maxTextLines: 1
            },
            vAxis: {
                title: '',
                viewWindow: {min: 0},
                minValue: 4,
            },
            legend: {position: 'top', maxLines: 3},
            colors: ['#ffa845', '#8ace5f'],
            
        };
        
        var chart = new google.visualization.LineChart(document.getElementById('cm_subs_over_time_chart_div'));
        chart.draw(data, options);
    }
</script></pre>



<!--  '#87c2db','#ebb293','#93bc94','#e69f9f','#cecece','#f0e4a5','#d6c4df','#e2a1c4','#8eb2cc','#b8d5e9'  -->
<!--  '#5fc1ce', '#a35fce', '#ce6c5f', '#8ace5f', '#5f8ace', '#ce5f8a', '#ffa845', '#8ace5f', '#c1ce5f', '#ce5fc1' -->
 
