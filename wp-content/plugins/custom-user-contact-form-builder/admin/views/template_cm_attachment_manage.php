<?php
//s echo "<pre>", var_dump($data);
global $cm_env_requirements;
?>

<?php if (!($cm_env_requirements & CM_REQ_EXT_ZIP)){ ?>
 <div class="shortcode_notification"><p class="cm-notice-para"><?php echo CM_UI_Strings::get('CM_ERROR_EXTENSION_ZIP');?></p></div>
 <?php } ?>

<div class="cmagic">
    <div class="operationsbar">
        <!-- <div class="icons">
            <img alt="" src="<?php echo plugin_dir_url(dirname(dirname(__FILE__))) . 'images/supporticon.png'; ?>">>
        </div> -->
        <div class="cmtitle"><?php echo CM_UI_Strings::get('TITLE_ATTACHMENT_PAGE'); ?></div>
        <div class="nav">
                <ul>  
                    <li onclick="window.history.back()"><a href="javascript:void(0)"><?php echo CM_UI_Strings::get("LABEL_BACK"); ?></a></li>
                </ul>
    </div>
    </div>
    
        <!-- Plugin gold and silver edition banner-->
        <?php 
    $cm_promo_banner_title = "View and Download form attachments at a single place by upgrading";
    include CM_ADMIN_DIR.'views/template_cm_promo_banner_bottom.php';
    ?>

    </div>
