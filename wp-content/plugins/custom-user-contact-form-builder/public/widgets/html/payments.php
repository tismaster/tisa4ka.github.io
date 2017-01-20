<?php
foreach ($payments as $payment) {
    ?><div class="cm-submission-card cm-white-box">
        <div class="cm-transaction-title cm-pad-10 cm-grey-box dbfl"><?php echo $payment->form_name; ?></div>
        <div class="cm-transaction-card-content cm-pad-10 dbfl">
            <!----<div class="cm-submission-icon difl">
             <img src="<?php echo CM_IMG_URL; ?>submission-clock.png">
             </div>---->
            <div class="cm-transaction-details cm-pad-10 dbfl"><b>Amount</b><br/><?php echo $payment->total_amount; ?><span class="cm_txn_status cm-transaction-<?php echo $payment->status; ?> difr cm-rounded-corners"><?php echo $payment->status; ?></span></div>
            <div class="cm-transaction-details cm-pad-10 dbfl"><b><?php echo CM_UI_Strings::get('LABEL_DATE_OF_PAYMENT'); ?></b><br/><?php echo $payment->posted_date; ?></div>
            <div class="cm-transaction-details cm-pad-10 dbfl"><b><?php echo CM_UI_Strings::get('LABEL_INVOICE'); ?></b><br/><?php echo $payment->invoice; ?></div>
            <div class="cm-transaction-details cm-pad-10 dbfl"><b><?php echo CM_UI_Strings::get('LABEL_TAXATION_ID'); ?></b><br/><?php echo $payment->txn_id; ?></div>
        </div>
    </div>
<?php } ?>
