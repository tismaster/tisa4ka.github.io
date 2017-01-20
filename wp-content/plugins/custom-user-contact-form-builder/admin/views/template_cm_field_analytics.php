<div class="cmagic">
    <div class="operationsbar">
        <!-- <div class="icons">
            <img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/supporticon.png'; ?>">

        </div> -->
        <div class="cmtitle"><?php echo CM_UI_Strings::get('TITLE_FIELD_STAT_PAGE'); ?></div>
  <div class="nav">
                <ul>  
                    <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
                </ul>
    </div>
    </div>
    <?php 
    $cm_promo_banner_title = "Unlock the power of Field Analytics by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>       

    </div>