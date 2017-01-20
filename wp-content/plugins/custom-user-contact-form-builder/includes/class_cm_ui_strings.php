<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class works as a repository of all the string resources used in product UI
 * for easy translation and management. 
 *
 * @author CMSHelplive
 */
class CM_UI_Strings {

    public static function get($identifier) {

        switch ($identifier) {

            case 'MSG_BUY_PRO':
                return __('This feature (and a lot more...) is part of Silver Edition package.', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_INLINE':
                return __('<span class="cm_buy_pro_inline">To unlock this feature (and many more), please upgrade <a href="http://registrationmagic.com/?download_id=317&amp;edd_action=add_to_cart" target="blank">Click here</a></span>', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_INLINE_ATT':
                return __('<span class="cm_buy_pro_inline">View and Download <b>form attachments</b> at a single place by upgrading <a href="http://registrationmagic.com/?download_id=317&amp;edd_action=add_to_cart" target="blank">Click here</a></span>', 'custom-user-contact-form-builder');
                
            case 'MSG_BUY_PRO_BOTH_INLINE':
                return __('<span class="cm_buy_pro_inline">To unlock this feature (and many more), please upgrade <a href="https://registrationmagic.com/comparison/" target="blank">Click here</a></span>', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_GOLD_MULTIPAGE':
                return __('Multi-page feature (and many more) is part of <b>Gold Edition</b> package', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_GOLD_EMBED':
                return __('Embed code feature (and many more) is part of Gold Edition package', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_PRICE_FIELDS':
                return __('Multiple price type fields (and a lot more...) is part of Silver Edition package.', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_USER_ROLE':
                return __('You can assign user roles created here to registered users. Auto user role assignment through "Submission Form" or let user pick their role at the time of Submission (and a lot more...) is part of Silver Edition package.', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_FIELDS':
                return __('File, repeatable, map, address type fields (and a lot more...) is part of Silver Edition package.', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_SUB_MAN':
                return __('Export option (and a lot more...) is part of Silver Edition package.', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_SUB_VIEW':
                return __('&quot;Print as PDF&quot; and &quot;Add note&quot; option (and a lot more...) is part of Silver Edition package.', 'custom-user-contact-form-builder');

            case 'MSG_BUY_PRO_ATT_BROWSER':
                return __('Attachments browser allows you to easily view and download attachments sent by the users through forms.<br>This feature (and a lot more...) is part of Silver Edition package.', 'custom-user-contact-form-builder');

            case 'MSG_NO_FORM_SUB_MAN':
                return __('No Forms you have created yet.<br>Once you have created a form and submissions start coming, this area will show you a nice little table with all the submissions.', 'custom-user-contact-form-builder');

            case 'LABEL_UPGRADE_NOW':
                return __('UPGRADE NOW.', 'custom-user-contact-form-builder');
            case 'PH_USER_ROLE_DD':
                return __('Select User Role', 'custom-user-contact-form-builder');

            case 'TITLE_NEW_FORM_PAGE':
                return __('New Contact Form', 'custom-user-contact-form-builder');

            case 'SUBTITLE_NEW_FORM_PAGE':
                return __('Some options in this form will only work after you have created custom fields.', 'custom-user-contact-form-builder');

            case 'TITLE_EDIT_PAYPAL_FIELD_PAGE':
                return __('Edit Price Field', 'custom-user-contact-form-builder');

            case 'TITLE_USER_EDIT_PAGE':
                return __('Edit User', 'custom-user-contact-form-builder');

            case 'TITLE_NEW_PAYPAL_FIELD_PAGE':
                return __('New Price Field', 'custom-user-contact-form-builder');

            case 'TITLE_ATTACHMENT_PAGE':
                return __('Attachments', 'custom-user-contact-form-builder');

            case 'TITLE_SUBMISSION_MANAGER':
                return __('Submissions', 'custom-user-contact-form-builder');

            case 'HEADING_ADD_ROLE_FORM':
                return __('Add New Role', 'custom-user-contact-form-builder');

            case 'LABEL_TITLE':
                return __('Title', 'custom-user-contact-form-builder');

            case 'LABEL_UNIQUE_TOKEN_SHORT':
                return __('Unique Token No.', 'custom-user-contact-form-builder');

            case 'LABEL_NOTE_TEXT':
                return __('Note Text', 'custom-user-contact-form-builder');

            case 'LABEL_ADD_OTHER':
                return __('Allow Users to input custom value?', 'custom-user-contact-form-builder');

            case 'MAIL_REGISTRAR_DEF_SUB':
                return __('Your Submission', 'custom-user-contact-form-builder');

            case 'MAIL_NEW_USER_DEF_SUB':
                return __('New User', 'custom-user-contact-form-builder');

            case 'MSG_THEIR_ANS':
                return __('User Input', 'custom-user-contact-form-builder');

            case 'MSG_NO_FIELD_STAT_DATA':
                return __('No data recorded for this field to generate pie chart', 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_LABEL':
                return __('Field Label', 'custom-user-contact-form-builder');

            case 'LABEL_NOTE_COLOR':
                return __('Note Color', 'custom-user-contact-form-builder');

            case 'LABEL_MY_SUBS':
                return __('Submissions', 'custom-user-contact-form-builder');

            case 'LABEL_MY_SUB':
                return __('Submission', 'custom-user-contact-form-builder');

            case 'LABEL_OPT_IN_CB':
                return __('Show opt-in checkbox', 'custom-user-contact-form-builder');

            case 'HELP_OPT_IN_CB':
                return __('Display a checkbox, allowing users to opt-in for subscription.', 'custom-user-contact-form-builder');

            case 'LABEL_OPT_IN_CB_TEXT':
                return __('Opt-in checkbox text', 'custom-user-contact-form-builder');

            case 'MSG_NO_SUBMISSION_MATCHED':
                return __('No Submission matched your search.', 'custom-user-contact-form-builder');

            case 'HELP_OPT_IN_CB_TEXT':
                return __('This text will appear with the opt-in checkbox.', 'custom-user-contact-form-builder');

            case 'PH_NO_FORMS':
                return __('No Forms', 'custom-user-contact-form-builder');

            case 'LABEL_PAY_HISTORY':
                return __('Payment History', 'custom-user-contact-form-builder');

            case 'MSG_NOT_AUTHORIZED':
                return __('You are not authorized to view the contents of this page. Please log in to view the submissions', 'custom-user-contact-form-builder');

            case 'MSG_FORM_EXPIRY':
                return __('This Form has expired.', 'custom-user-contact-form-builder');

            case 'MSG_NO_FIELDS':
                return __('This Form has no fields.', 'custom-user-contact-form-builder');

            case 'LABEL_LOG_OFF':
                return __('Log Off', 'custom-user-contact-form-builder');

            case 'LABEL_PRINT':
                return __('Print', 'custom-user-contact-form-builder');

            case 'LABEL_VISIBLE_FRONT':
                return __('Visible to User on Front-End', 'custom-user-contact-form-builder');

            case 'LABEL_SELECT':
                return __('Select', 'custom-user-contact-form-builder');

            case 'LABEL_BACK':
                return __('Back', 'custom-user-contact-form-builder');

            case 'SELECT_FIELD_MULTI_OPTION':
                return __("Select options", 'custom-user-contact-form-builder');

            case 'LABEL_ADD_NOTE':
                return __('Add Note', 'custom-user-contact-form-builder');

            case 'LABEL_STATUS_PAYMENT':
                return __('Payment Status', 'custom-user-contact-form-builder');

            case 'MSG_SUBSCRIBE':
                return __('Subscribe for emails', 'custom-user-contact-form-builder');

            case 'LABEL_FAILED':
                return __('Failed', 'custom-user-contact-form-builder');

            case 'MSG_USER_PASS_NOT_SET':
                return __('User Password is not set.', 'custom-user-contact-form-builder');

            case 'LABEL_PAID_AMOUNT':
                return __('Paid Amount', 'custom-user-contact-form-builder');

            case 'LABEL_AMOUNT':
                return __('Amount', 'custom-user-contact-form-builder');

            case 'MSG_NO_DATA_FOR_EMAIL':
                return __('No submission data for this email.', 'custom-user-contact-form-builder');

            case 'LABEL_TXN_ID':
                return __('Transaction Id', 'custom-user-contact-form-builder');

            case 'LABEL_SUPPORT_EMAIL_LINK':
                return __('Email', 'custom-user-contact-form-builder');

            case 'LABEL_PREVIOUS':
                return __('Prev', 'custom-user-contact-form-builder');

            case 'LABEL_NEXT':
                return __('Next', 'custom-user-contact-form-builder');

            case 'LABEL_FIRST':
                return __('First', 'custom-user-contact-form-builder');

            case 'LABEL_LAST':
                return __('Last', 'custom-user-contact-form-builder');

            case 'LABEL_LAYOUT':
                return __('Layout', 'custom-user-contact-form-builder');

            case 'LABEL_LAYOUT_LABEL_LEFT':
                return __('Label left', 'custom-user-contact-form-builder');

            case 'LABEL_LAYOUT_LABEL_TOP':
                return __('Label top', 'custom-user-contact-form-builder');

            case 'LABEL_LAYOUT_TWO_COLUMNS':
                return __('Two columns', 'custom-user-contact-form-builder');


            case 'LABEL_NO_FORMS':
                return __('No forms.', 'custom-user-contact-form-builder');


            case 'MSG_DO_NOT_HAVE_ACCESS':
                return __('You do not have access to see this page.', 'custom-user-contact-form-builder');

            case 'LABEL_DATE_OF_PAYMENT':
                return __('Date Of Payment', 'custom-user-contact-form-builder');

            case 'MSG_INVALID_SUBMISSION_ID_FOR_EMAIL':
                return __('Invalid Submission Id', 'custom-user-contact-form-builder');

            case 'MSG_INVALID_SUBMISSION_ID':
                return __('Invalid Submission Id', 'custom-user-contact-form-builder');

            case 'MSG_NO_CUSTOM_FIELDS':
                return __('No custom field values available for this user.<br>This area displays fields marked by &quot;Add this field to User Account&quot;.', 'custom-user-contact-form-builder');

            case 'MSG_NO_SUBMISSIONS_USER':
                return __('This user has not submitted any forms yet.', 'custom-user-contact-form-builder');

            case 'MSG_NO_FORMS_ATTACHMENTS':
                return __('You have not created any form yet.<br>Once you have created a form and submissions start coming, this area will show all submitted attachments for the form.', 'custom-user-contact-form-builder');

            case 'MSG_NO_PAYMENTS_USER':
                return __('No payment records exist for this user.', 'custom-user-contact-form-builder');

            case 'LABEL_REGISTRATIONS':
                return __('Submissions', 'custom-user-contact-form-builder');

            case 'LABEL_INVOICE':
                return __('Payment Invoice', 'custom-user-contact-form-builder');

            case 'LABEL_TAXATION_ID':
                return __('Payment TXN ID', 'custom-user-contact-form-builder');

            case 'LABEL_CREATED_BY':
                return __('Created By', 'custom-user-contact-form-builder');

            case 'LABEL_TYPES':
                return __('Types', 'custom-user-contact-form-builder');

            case 'NO_SUBMISSION_FOR_FORM':
                return __('No Submissions for this form yet.', 'custom-user-contact-form-builder');

            case 'LABEL_TYPE':
                return __('Type', 'custom-user-contact-form-builder');

            case 'HELP_PRICE_FIELD':
                return __('Please Enter a value greater than zero.', 'custom-user-contact-form-builder');

            case 'HELP_PASSWORD_MIN_LENGTH':
                return __('Password must be at least 7 characters long.', 'custom-user-contact-form-builder');

            case 'MSG_NO_FORM_SUB_MAN':
                return __('No Forms you have created yet.<br>Once you have created a form and submissions start coming, this area will show you a nice little table with all the submissions.', 'custom-user-contact-form-builder');

            case 'FORM_ERR_INVALID':
                return __("%element% is invalid.", 'custom-user-contact-form-builder');

            case 'FORM_ERR_FILE_TYPE':
                return __("Invalid type of file uploaded in %element%.", 'custom-user-contact-form-builder');

            case 'FORM_ERR_INVALID_DATE':
                return __("%element% must contain a valid date.", 'custom-user-contact-form-builder');

            case 'FORM_ERR_INVALID_EMAIL':
                return __("%element% must contain a valid email address.", 'custom-user-contact-form-builder');

            case 'FORM_ERR_INVALID_NUMBER':
                return __("%element% must be numeric.", 'custom-user-contact-form-builder');

            case 'FORM_ERR_INVALID_REGEX':
                return __("%element% contains invalid charcters.", 'custom-user-contact-form-builder');

            case 'FORM_ERR_INVALID_URL':
                return __("%element% must contain a url (e.g. http://www.google.com).", 'custom-user-contact-form-builder');

            case 'LABEL_ROLE_DISPLAY_NAME':
                return __('Display Name For Role', 'custom-user-contact-form-builder');

            case 'LABEL_DESC':
                return __('Description', 'custom-user-contact-form-builder');

            case 'LABEL_NO_ATTACHMENTS':
                return __('No Attachments for this form yet.', 'custom-user-contact-form-builder');

            case 'LABEL_CUSTOM_FIELD':
                return __('Details', 'custom-user-contact-form-builder');

            case 'LABEL_DOWNLOAD_ALL':
                return __('Download All', 'custom-user-contact-form-builder');

            case 'LABEL_DOWNLOAD':
                return __('Download', 'custom-user-contact-form-builder');

            case 'LABEL_SR':
                return __('Sr.', 'custom-user-contact-form-builder');

            case 'LABEL_CREATE_WP_ACCOUNT':
                return __('Also create WP User account', 'custom-user-contact-form-builder');

            case 'LABEL_DO_ASGN_WP_USER_ROLE':
                return __('Automatically Assigned WP User Role', 'custom-user-contact-form-builder');

            case 'LABEL_LET_USER_PICK':
                return __('Or Let Users Pick Their Role', 'custom-user-contact-form-builder');

            case 'LABEL_USER_ROLE_FIELD':
                return __('WP User Role Field Label', 'custom-user-contact-form-builder');

            case 'LABEL_ALLOW_WP_ROLE':
                return __('Allow Role Selection from', 'custom-user-contact-form-builder');

            case 'LABEL_ROLE':
                return __('Role', 'custom-user-contact-form-builder');

            case 'LABEL_CONTENT_ABOVE':
                return __('Content Above The Form', 'custom-user-contact-form-builder');

            case 'LABEL_SUCC_MSG':
                return __('Success Message', 'custom-user-contact-form-builder');

            case 'LABEL_UNIQUE_TOKEN':
                return __('Show Unique Token Number', 'custom-user-contact-form-builder');

            case 'LABEL_USER_REDIRECT':
                return __('After Submission, Redirect User to', 'custom-user-contact-form-builder');

            case 'LABEL_PAGE':
                return __('Page', 'custom-user-contact-form-builder');

            case 'LABEL_URL':
                return __('URL', 'custom-user-contact-form-builder');

            case 'LABEL_AUTO_REPLY':
                return __('Auto-Reply the User', 'custom-user-contact-form-builder');

            case 'LABEL_AR_EMAIL_SUBJECT':
                return __('Auto-Reply Email Subject', 'custom-user-contact-form-builder');

            case 'LABEL_AR_EMAIL_BODY':
                return __('Auto-Reply Email Body', 'custom-user-contact-form-builder');

            case 'LABEL_SUBMIT_BTN':
                return __('Submit Button Label', 'custom-user-contact-form-builder');

            case 'LABEL_SUBMIT_BTN_COLOR':
                return __('Submit Button Label Color', 'custom-user-contact-form-builder');

            case 'MSG_NO_SUBMISSION_SUB_MAN':
                return __('No Submissions for this form yet.<br>Once submissions start coming, this area will show you a nice little table with all the submissions.', 'custom-user-contact-form-builder');

            case 'MSG_NO_SUBMISSION_SUB_MAN_INTERVAL':
                return __('No Submissions during the period.', 'custom-user-contact-form-builder');

            case 'LABEL_SUBMIT_BTN_COLOR_BCK':
                return __('Submit Button Background Color', 'custom-user-contact-form-builder');

            case 'LABEL_AUTO_EXPIRE':
                return __('Auto Expires', 'custom-user-contact-form-builder');

            case 'LABEL_EXPIRY':
                return __('Limits', 'custom-user-contact-form-builder');

            case 'LABEL_SUB_LIMIT':
                return __('Submissions Limit', 'custom-user-contact-form-builder');

            case 'LABEL_EXPIRY_DATE':
                return __('Date of Expiry', 'custom-user-contact-form-builder');

            case 'LABEL_EXPIRY_MSG':
                return __('Message', 'custom-user-contact-form-builder');

            case 'LABEL_SAVE':
                return __('Save', 'custom-user-contact-form-builder');

            case 'LABEL_CANCEL':
                return __('Cancel', 'custom-user-contact-form-builder');

            case 'LABEL_CREATE_WP_ACCOUNT_DESC':
                return __('This will add Username and Password fields to this form', 'custom-user-contact-form-builder');

            case 'TITLE_FORM_MANAGER':
                return __('All Forms', 'custom-user-contact-form-builder');

            case 'LABEL_ADD_NEW':
                return __('New Form', 'custom-user-contact-form-builder');

            case 'LABEL_ADD_NEW_FIELD':
                return __('New Field', 'custom-user-contact-form-builder');

            case 'LABEL_DUPLICATE':
                return __('Duplicate', 'custom-user-contact-form-builder');

            case 'LABEL_FILTERS':
                return __('Filters', 'custom-user-contact-form-builder');

            case 'LABEL_TIME':
                return __('Time', 'custom-user-contact-form-builder');

            case 'LABEL_SUBMISSIONS':
                return __('Submissions', 'custom-user-contact-form-builder');

            case 'LABEL_SEARCH':
                return __('Search', 'custom-user-contact-form-builder');

            case 'LABEL_BY_NAME':
                return __('By Name', 'custom-user-contact-form-builder');

            case 'LABEL_SORT':
                return __('Sort', 'custom-user-contact-form-builder');

            case 'LABEL_LAST_AT':
                return __('Last at', 'custom-user-contact-form-builder');

            case 'LABEL_FIELDS':
                return __('Fields', 'custom-user-contact-form-builder');

            case 'LABEL_SUCCESS_RATE':
                return __('Success rate', 'custom-user-contact-form-builder');

            case 'LABEL_LAST_MODIFIED_BY':
                return __('Last modified by', 'custom-user-contact-form-builder');

            case 'LABEL_EDIT':
                return __('Edit', 'custom-user-contact-form-builder');

            case 'LABEL_EDITED_BY':
                return __('Edited By', 'custom-user-contact-form-builder');

            case 'LABEL_PAYER_NAME':
                return __('Payer name', 'custom-user-contact-form-builder');

            case 'LABEL_PAYER_EMAIL':
                return __('Payer email', 'custom-user-contact-form-builder');

            case 'MSG_NO_FORMS':
                return __('No Forms Yet', 'custom-user-contact-form-builder');

            case 'MSG_NO_FORMS_FUNNY':
                return __('No Forms Yet! Why not create one.', 'custom-user-contact-form-builder');


            case 'LABEL_SUBMIT_BTN_COLOR_BCK_DSC':
                return __('Does not works with Classic form style', 'custom-user-contact-form-builder');

            case 'LABEL_SELECT_TYPE':
                return __('Select Type', 'custom-user-contact-form-builder');

            case 'TITLE_NEW_FIELD_PAGE':
                return __('New Field', 'custom-user-contact-form-builder');

            case 'LABEL_LABEL':
                return __('Label', 'custom-user-contact-form-builder');

            case 'LABEL_PLACEHOLDER_TEXT':
                return __('Placeholder text', 'custom-user-contact-form-builder');

            case 'LABEL_CSS_CLASS':
                return __('CSS Class Attribute', 'custom-user-contact-form-builder');

            case 'LABEL_MAX_LENGTH':
                return __('Maximum Length', 'custom-user-contact-form-builder');

            case 'TEXT_RULES':
                return __('Rules', 'custom-user-contact-form-builder');

            case 'LABEL_IS_REQUIRED':
                return __('Is Required', 'custom-user-contact-form-builder');

            case 'LABEL_SHOW_ON_USER_PAGE':
                return __('Add this field to User Account', 'custom-user-contact-form-builder');

            case 'LABEL_PARAGRAPF_TEXT':
                return __('Paragraph Text', 'custom-user-contact-form-builder');

            case 'LABEL_OPTIONS':
                return __('Options', 'custom-user-contact-form-builder');

            case 'LABEL_DROPDOWN_OPTIONS_DSC':
                return __('value seprated by comma ","', 'custom-user-contact-form-builder');

            case 'LABEL_DEFAULT_VALUE':
                return __('Default Value', 'custom-user-contact-form-builder');

            case 'LABEL_COLUMNS':
                return __('Columns', 'custom-user-contact-form-builder');

            case 'LABEL_VALUE':
                return __('Value', 'custom-user-contact-form-builder');

            case 'LABEL_ROWS':
                return __('Rows', 'custom-user-contact-form-builder');

            case 'LABEL_IS_READ_ONLY':
                return __('Is Read Only', 'custom-user-contact-form-builder');

            case 'LABEL_T_AND_C':
                return __('Terms & Conditions', 'custom-user-contact-form-builder');

            case 'LABEL_FILE_TYPES':
                return __('Define allowed file types (file extensions)', 'custom-user-contact-form-builder');

            case 'LABEL_FILE_TYPES_DSC':
                return __('For example PDF|JPEG|XLS', 'custom-user-contact-form-builder');

            case 'LABEL_PRICING_FIELD':
                return __('Price Field', 'custom-user-contact-form-builder');

            case 'LABEL_PRICE':
                return __('Price', 'custom-user-contact-form-builder');

            case 'VALUE_CLICK_TO_ADD':
                return __('Click to add more', 'custom-user-contact-form-builder');

            case 'TITLE_EDIT_FORM_PAGE':
                return __('Edit Form', 'custom-user-contact-form-builder');

            case 'TITLE_FORM_FIELD_PAGE':
                return __('Fields Manager', 'custom-user-contact-form-builder');

            case 'LABEL_ADD_FIELD':
                return __('Add Field', 'custom-user-contact-form-builder');

            case 'LABEL_FORM':
                return __('Form', 'custom-user-contact-form-builder');

            case 'LABEL_REMOVE':
                return __('Remove', 'custom-user-contact-form-builder');

            case 'LABEL_COMMON_FIELDS':
                return __('Common Fields', 'custom-user-contact-form-builder');

            case 'LABEL_SPECIAL_FIELDS':
                return __('Special Fields', 'custom-user-contact-form-builder');

            case 'LABEL_PROFILE_FIELDS':
                return __('Profile Fields', 'custom-user-contact-form-builder');

            case 'PH_SELECT_A_FIELD':
                return __('Select A Field', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_TEXT':
                return __('Text', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_PARAGRAPH':
                return __('Paragraph', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_HEADING':
                return __('Heading', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_DROPDOWN':
                return __('Drop Down', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_RADIO':
                return __('Radio Button', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_TEXTAREA':
                return __('Textarea', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_CHECKBOX':
                return __('Checkbox', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_DATE':
                return __('Date', 'custom-user-contact-form-builder');

            case 'LABEL_DATE' :
                return __('Date', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_EMAIL':
                return __('Email', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_NUMBER':
                return __('Number', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_COUNTRY':
                return __('Country', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_TIMEZONE':
                return __('Timezone', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_T_AND_C':
                return __('T&C Checkbox', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_FILE':
                return __('File Upload', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_PRICE':
                return __('Pricing', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_RAPEAT':
                return __('Repeatable Text', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_FNAME':
                return __('First Name', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_LNAME':
                return __('Last Name', 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_BINFO':
                return __('Biographical Info', 'custom-user-contact-form-builder');

            case 'LABEL_DELETE':
                return __('Delete', 'custom-user-contact-form-builder');


            case 'LABEL_BIO':
                return __('Bio', 'custom-user-contact-form-builder');

            case 'NO_FIELDS_MSG':
                return __('No fields for this form yet.', 'custom-user-contact-form-builder');

            case 'NO_PRICE_FIELDS_MSG':
                return __('You do not have any price field yet. Select a Field Type above to start creating price fields.<br>These fields can be later inserted into any form for accepting payment.', 'custom-user-contact-form-builder');

            case 'MSG_NO_FORM_SELECTED':
                return __('No form selected', 'custom-user-contact-form-builder');

            case 'TITLE_EDIT_FIELD_PAGE':
                return __('Edit Field', 'custom-user-contact-form-builder');

            case 'LABEL_ADD':
                return __('Add', 'custom-user-contact-form-builder');

            case 'LABEL_EMAIL':
                return __('Email', 'custom-user-contact-form-builder');

            case 'LABEL_STATUS':
                return __('Status', 'custom-user-contact-form-builder');

            case 'LABEL_NAME':
                return __('Name', 'custom-user-contact-form-builder');

            case 'LABEL_DEACTIVATED':
                return __('Deactivated', 'custom-user-contact-form-builder');

            case 'LABEL_ACTIVATED':
                return __('Activated', 'custom-user-contact-form-builder');

            case 'LABEL_MATCH_FIELD':
                return __('Match Field', 'custom-user-contact-form-builder');

            case 'MSG_CLICK_TO_ADD':
                return __('Click to add options', 'custom-user-contact-form-builder');

            case 'LABEL_HEADING_TEXT':
                return __('Heading Text', 'custom-user-contact-form-builder');

            case 'MSG_NO_FIELD_SELECTED':
                return __('No Field Selected', 'custom-user-contact-form-builder');

            case 'ALERT_DELETE_FORM':
                return __('You are going to delete this form(s). This will also delete all data assosiated with the form(s) including submissions and payment records. Users will not be deleted. Do you want to proceed?', 'custom-user-contact-form-builder');

            /* 9th March */
            case 'USER_MANAGER':
                return __('User Manager', 'custom-user-contact-form-builder');

            case 'NEW_USER':
                return __('New User', 'custom-user-contact-form-builder');

            case 'ACTIVATE':
                return __('Activate', 'custom-user-contact-form-builder');

            case 'DEACTIVATE':
                return __('Deactivate', 'custom-user-contact-form-builder');

            case 'IMAGE':
                return __('Image', 'custom-user-contact-form-builder');

            case 'FIRST_NAME':
                return __('First Name', 'custom-user-contact-form-builder');

            case 'LAST_NAME':
                return __('Last Name', 'custom-user-contact-form-builder');

            case 'DOB':
                return __('DOB', 'custom-user-contact-form-builder');

            case 'ACTION':
                return __('Action', 'custom-user-contact-form-builder');

            case 'VIEW':
                return __('View', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS':
                return __('Global Settings', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_GENERAL':
                return __('General Settings', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_GENERAL_EXCERPT':
                return __('Form look, Default pages, Attachment settings etc.', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_SECURITY':
                return __('Security', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_SECURITY_EXCERPT':
                return __('reCAPTCHA placement, Google reCAPTCHA keys', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_USER':
                return __('User Accounts', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_USER_EXCERPT':
                return __('Password behavior, Manual approvals etc.', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_EMAIL_NOTIFICATIONS':
                return __('Email Notifications', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_EMAIL_NOTIFICATIONS_EXCERPT':
                return __('Admin notifications, multiple email notifications, From email', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_EXTERNAL_INTEGRATIONS':
                return __('EXTERNAL INTEGRATION', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_EXTERNAL_INTEGRATIONS_EXCERPT':
                return __('MailChimp (more coming soon!)', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_PAYMENT':
                return __('Payments', 'custom-user-contact-form-builder');

            case 'LABEL_PAYMENTS':
                return __('Payments', 'custom-user-contact-form-builder');

            case 'LABEL_PAYMENT':
                return __('Payment', 'custom-user-contact-form-builder');

            case 'LABEL_FORM_TITLE':
                return __('Form Title', 'custom-user-contact-form-builder');

            case 'GLOBAL_SETTINGS_PAYMENT_EXCERPT':
                return __('Currency, Symbol Position, Checkout Page etc.', 'custom-user-contact-form-builder');

            case 'SETTINGS':
                return __('Settings', 'custom-user-contact-form-builder');

            case 'SELECT_PAGE':
                return __('Select Page', 'custom-user-contact-form-builder');

            case 'LABEL_NOT_APPLICABLE_ABB':
                return __('N/A', 'custom-user-contact-form-builder');

            case 'LABEL_FORM_STYLE':
                return __('Form Style:', 'custom-user-contact-form-builder');

            case 'LABEL_CAPTURE_INFO':
                return __('Capture IP and Browser Info:', 'custom-user-contact-form-builder');

            case 'ALLOWED_FILE_TYPES_HELP':
                return __('(file extensions) (For example PDF|JPEG|XLS)', 'custom-user-contact-form-builder');

            case 'LABEL_ALLOWED_FILE_TYPES':
                return __('Allowed File Types', 'custom-user-contact-form-builder');

            case 'LABEL_ALLOWED_MULTI_FILES':
                return __('Allow Multiple Attachments:', 'custom-user-contact-form-builder');

            case 'LABEL_DEFAULT_REGISTER_URL':
                return __('Default WP Submission Page:', 'custom-user-contact-form-builder');

            case 'LABEL_AFTER_LOGIN_URL':
                return __('After Login Redirect User to:', 'custom-user-contact-form-builder');

            case 'LABEL_ANTI_SPAM':
                return __('Anti Spam', 'custom-user-contact-form-builder');

            case 'LABEL_ENABLE_CAPTCHA':
                return __('Enable reCaptcha:', 'custom-user-contact-form-builder');

            case 'LABEL_CAPTCHA_LANG':
                return __('reCAPTCHA Language:', 'custom-user-contact-form-builder');

            case 'LABEL_CAPTCHA_AT_LOGIN':
                return __('reCAPTCHA under User Login:', 'custom-user-contact-form-builder');

            case 'LABEL_SITE_KEY':
                return __('Site Key:', 'custom-user-contact-form-builder');

            case 'LABEL_CAPTCHA_KEY':
                return __('Secret Key:', 'custom-user-contact-form-builder');

            case 'LABEL_CAPTCHA_METHOD':
                return __('Request Method:', 'custom-user-contact-form-builder');

            case 'LABEL_CAPTCHA_METHOD_HELP':
                return __('(Change this setting if your ReCaptcha is not working as expected.)', 'custom-user-contact-form-builder');

            case 'LABEL_AUTO_PASSWORD':
                return __('Auto Generated Password:', 'custom-user-contact-form-builder');

            case 'LABEL_SEND_PASS_EMAIL':
                return __('Send Username and Password To User Through Email:', 'custom-user-contact-form-builder');

            case 'LABEL_REGISTER_APPROVAL':
                return __('WP Submission Auto Approval', 'custom-user-contact-form-builder');

            case 'LABEL_USER_NOTIFICATION_FRONT_END':
                return __('Send Notification to the User for Front-End Notes:', 'custom-user-contact-form-builder');

            case 'LABEL_NOTIFICATIONS_TO_ADMIN':
                return __('Send Notification To Site Admin:', 'custom-user-contact-form-builder');

            case 'LABEL_ENABLE_SMTP':
                return __('Enable SMTP:', 'custom-user-contact-form-builder');

            case 'LABEL_SMTP_HOST':
                return __('SMTP Host:', 'custom-user-contact-form-builder');

            case 'LABEL_SMTP_PORT':
                return __('SMTP Port:', 'custom-user-contact-form-builder');

            case 'LABEL_SMTP_ENCTYPE':
                return __('Encryption type:', 'custom-user-contact-form-builder');

            case 'LABEL_SMTP_AUTH':
                return __('Authentication:', 'custom-user-contact-form-builder');

            case 'LABEL_SMTP_TESTMAIL':
                return __('Email address for testing:', 'custom-user-contact-form-builder');

            case 'LABEL_TEST':
                return __('Test', 'custom-user-contact-form-builder');

            case 'LABEL_ADD_EMAIL':
                return __('Add Fields', 'custom-user-contact-form-builder');

            case 'LABEL_FROM_EMAIL':
                return __('From Email', 'custom-user-contact-form-builder');

            case 'LABEL_FROM_EMAIL_DISP_NAME':
                return __('Display name for sender', 'custom-user-contact-form-builder');

            case 'LABEL_ADD_FORM':
                return __('Add Form', 'custom-user-contact-form-builder');

            case 'LABEL_FILTER_BY':
                return __('Filter by', 'custom-user-contact-form-builder');

            case 'LABEL_DISPLAYING_FOR':
                return __('Displaying for', 'custom-user-contact-form-builder');

            case 'LABEL_SELECT_RESIPIENTS':
                return __('Select recipients from', 'custom-user-contact-form-builder');

            case 'LABEL_LOGIN_FACEBOOK_OPTION':
                return __('Allow User to Login using Facebook:', 'custom-user-contact-form-builder');

            case 'LABEL_FACEBOOK_APP_ID':
                return __('Facebook App ID:', 'custom-user-contact-form-builder');

            case 'LABEL_FACEBOOK_SECRET':
                return __('Facebook App Secret', 'custom-user-contact-form-builder');

            case 'LABEL_MAILCHIMP_INTEGRATION':
                return __('MailChimp Integration:', 'custom-user-contact-form-builder');

            case 'LABEL_MAILCHIMP_API':
                return __('MailChimp API:', 'custom-user-contact-form-builder');

            case 'LABEL_PAYMENT_PROCESSOR':
                return __('Payment Processor:', 'custom-user-contact-form-builder');

            case 'LABEL_TEST_MODE':
                return __('Test Mode:', 'custom-user-contact-form-builder');

            case 'LABEL_PAYPAL_EMAIL':
                return __('PayPal Email:', 'custom-user-contact-form-builder');

            case 'LABEL_CURRENCY':
                return __('Currency:', 'custom-user-contact-form-builder');

            case 'LABEL_PAYPAL_STYLE':
                return __('PayPal Page Style:', 'custom-user-contact-form-builder');

            case 'LABEL_CURRENCY_SYMBOL':
                return __('Currency Symbol Position', 'custom-user-contact-form-builder');

            case 'LABEL_CURRENCY_SYMBOL_HELP':
                return __('Choose the location of the currency sign.', 'custom-user-contact-form-builder');

            case 'LABEL_RECIPIENTS_OPTION':
                return __('Define Recipients Manually', 'custom-user-contact-form-builder');

            case 'ERROR_FILE_FORMAT':
                return __('Uploaded files must be in allowed format.', 'custom-user-contact-form-builder');

            case 'ERROR_FILE_SIZE':
                return __('File is too large to upload.', 'custom-user-contact-form-builder');

            case 'ERROR_FILE_UPLOAD':
                return __('File upload was not successfull', 'custom-user-contact-form-builder');

            case 'ERROR_INVALID_RECAPTCHA':
                return __('The reCAPTCHA response provided was incorrect.  Please re-try.', 'custom-user-contact-form-builder');

            case 'OPTION_SELECT_LIST':
                return __('Select a List', 'custom-user-contact-form-builder');

            case 'LABEL_MAILCHIMP_LIST':
                return __('Send To MailChimp List', 'custom-user-contact-form-builder');

            case 'LABEL_USERNAME':
                return __('Username', 'custom-user-contact-form-builder');

            case 'LABEL_PASSWORD':
                return __('Password', 'custom-user-contact-form-builder');

            case 'LABEL_PASSWORD_AGAIN':
                return __('Enter password again', 'custom-user-contact-form-builder');

            case 'ERR_PW_MISMATCH':
                return __('Passwords do not match', 'custom-user-contact-form-builder');

            case 'LABEL_NONE':
                return __('None', 'custom-user-contact-form-builder');

            case 'LABEL_CONFIRM_PASSWORD':
                return __('Confirm Password', 'custom-user-contact-form-builder');

            case 'LABEL_LOGIN':
                return __('Login', 'custom-user-contact-form-builder');

            case 'ERROR_REQUIRED':
                return __('is a required field.', 'custom-user-contact-form-builder');

            case 'LOGGED_STATUS':
                return __('You are already logged in.', 'custom-user-contact-form-builder');

            case 'CM_LOGIN_HELP':
                return __('To show login box on a page, you can use Shortcode [CM_Login], or you can select it from the dropdown just like any other form.', 'custom-user-contact-form-builder');

            case 'LABEL_TODAY':
                return __('Today', 'custom-user-contact-form-builder');

            case 'LABEL_YESTERDAY':
                return __('Yesterday', 'custom-user-contact-form-builder');

            case 'LABEL_THIS_WEEK':
                return __('This Week', 'custom-user-contact-form-builder');

            case 'LABEL_LAST_WEEK':
                return __('Last Week', 'custom-user-contact-form-builder');

            case 'LABEL_THIS_MONTH':
                return __('This Month', 'custom-user-contact-form-builder');

            case 'LABEL_THIS_YEAR':
                return __('This Year', 'custom-user-contact-form-builder');

            case 'LABEL_PERIOD':
                return __('Specific Period', 'custom-user-contact-form-builder');

            case 'LABEL_ACTIVE':
                return __('Active', 'custom-user-contact-form-builder');

            case 'LABEL_PENDING':
                return __('Pending', 'custom-user-contact-form-builder');

            case 'LABEL_ROLE_AS':
                return __('Register As', 'custom-user-contact-form-builder');

            case 'MSG_REDIRECT_URL_INVALID':
                return __('After Submission redirect URL not given.', 'custom-user-contact-form-builder');

            case 'MSG_REDIRECT_PAGE_INVALID':
                return __('After submission redirect Page not given.', 'custom-user-contact-form-builder');

            case 'MSG_EXPIRY_LIMIT_INVALID':
                return __('Form expiry limit is invalid.', 'custom-user-contact-form-builder');

            case 'MSG_EXPIRY_DATE_INVALID':
                return __('Form expiry date is invalid.', 'custom-user-contact-form-builder');

            case 'MSG_FORM_EXPIRED':
                return __('<div class="form_expired">Form Expired</div>', 'custom-user-contact-form-builder');

            case 'MSG_EXPIRY_INVALID':
                return __('Please select a form expiration criterion (By Date, By Submissions etc.)', 'custom-user-contact-form-builder');

            case 'MSG_EXPIRY_BOTH_INVALID':
                return __('Please select both expiry criterion (By Date, By Submissions). ', 'custom-user-contact-form-builder');

            case 'MSG_NO_SUBMISSION':
                return __('Latest Submissions not available for this form.', 'custom-user-contact-form-builder');

            case 'MSG_NO_SUBMISSION_FRONT':
                return __('There are no submissions for this email right now.', 'custom-user-contact-form-builder');

            case 'USERNAME_EXISTS':
                return __("This user is already registered. Please try with different username or login.", 'custom-user-contact-form-builder');

            case 'P_FIELD_TYPE_FIXED':
                return __("Fixed", 'custom-user-contact-form-builder');

            case 'P_FIELD_TYPE_MULTISEL':
                return __("Multi Select", 'custom-user-contact-form-builder');

            case 'P_FIELD_TYPE_DROPDOWN':
                return __("DropDown", 'custom-user-contact-form-builder');

            case 'P_FIELD_TYPE_USERDEF':
                return __("User Defined", 'custom-user-contact-form-builder');

            case 'USEREMAIL_EXISTS':
                return __("This email is already associated with a user account. Please login to fill this form..", 'custom-user-contact-form-builder');

            case 'USER_EXISTS':
                return __("This user is already registered. Please try with different username or email.", 'custom-user-contact-form-builder');

            case 'LABEL_CREATE_FORM':
                return __("Create New Form", 'custom-user-contact-form-builder');

            case 'LABEL_NEWFORM_NOTIFICATION':
                return __("New Form Notification", 'custom-user-contact-form-builder');

            case 'TITLE_SUPPORT_PAGE':
                return __("Support, Feature Requests and Feedback", 'custom-user-contact-form-builder');

            case 'MAIL_BODY_NEW_USER_NOTIF':
                return __("Your account has been successfully created on %SITE_NAME%. You can now login using following credentials:<br>Username : %USER_NAME%<br>Password : %USER_PASS%", 'custom-user-contact-form-builder');

            case 'SUBTITLE_SUPPORT_PAGE':
                return __("For support, please fill in the support form with relevant details.", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_DELETED':
                return __("Form deleted", 'custom-user-contact-form-builder');

            case 'LABEL_SUPPORT_FORM':
                return __("SUPPORT FORM", 'custom-user-contact-form-builder');

            case 'LABEL_ROLE_NAME':
                return __("Role Name", 'custom-user-contact-form-builder');

            case 'LABEL_USER_ROLES':
                return __("User Roles", 'custom-user-contact-form-builder');

            case 'LABEL_ADD_ROLE':
                return __("Add Role", 'custom-user-contact-form-builder');

            case 'LABEL_EXPORT_ALL':
                return __("Export All", 'custom-user-contact-form-builder');

            case 'LABEL_USEREMAIL':
                return __("User Email", 'custom-user-contact-form-builder');

            case 'LABEL_PERMISSION_LEVEL':
                return __("Permission Level", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_CHAR':
                return __("Error: invalid chartacter!", 'custom-user-contact-form-builder');

            case 'LABEL_MAILCHIMP_MAP_EMAIL':
                return __("Map With MailChimp Email Field", 'custom-user-contact-form-builder');

            case 'LABEL_MAILCHIMP_MAP_FIRST_NAME':
                return __("Map With MailChimp First Name Field", 'custom-user-contact-form-builder');

            case 'LABEL_MAILCHIMP_MAP_LAST_NAME':
                return __("Map With MailChimp Last Name Field", 'custom-user-contact-form-builder');

            case 'SELECT_DEFAULT_OPTION':
                return __("Please select a value", 'custom-user-contact-form-builder');

            case 'MAILCHIMP_FIRST_NAME_ERROR':
                return __("Please select First Name field for mailchimp integration.", 'custom-user-contact-form-builder');

            case 'MAILCHIMP_LIST_ERROR':
                return __("Please select a mailchimp list.", 'custom-user-contact-form-builder');

            case 'TITLE_PAYPAL_FIELD_PAGE':
                return __("Price Fields", 'custom-user-contact-form-builder');

            case 'TITLE_USER_MANAGER':
                return __("Users Manager", 'custom-user-contact-form-builder');

            case 'ERROR_STAT_INSUFF_DATA':
                return __('Sorry, insufficient data captured for this form. Check back after few more submissions have been recorded or select another form from above dropdown.', 'custom-user-contact-form-builder');

            case 'LABEL_IP':
                return __("Visitor IP", 'custom-user-contact-form-builder');

            case 'LABEL_SUBMISSION_STATE':
                return __("Submission", 'custom-user-contact-form-builder');

            case 'LABEL_SUBMITTED_ON':
                return __("Submitted On", 'custom-user-contact-form-builder');

            case 'LABEL_VISITED_ON':
                return __("Time (UTC)", 'custom-user-contact-form-builder');

            case 'LABEL_SUCCESS':
                return __("Successful", 'custom-user-contact-form-builder');

            case 'LABEL_TIME_TAKEN':
                return __("Filling Time", 'custom-user-contact-form-builder');

            case 'LABEL_TIME_TAKEN_AVG':
                return __("Average Filling Time", 'custom-user-contact-form-builder');

            case 'LABEL_FAILURE_RATE':
                return __("Failure Rate", 'custom-user-contact-form-builder');

            case 'LABEL_SUBMISSION_RATE':
                return __("Submission Rate", 'custom-user-contact-form-builder');

            case 'LABEL_SUCCESS_RATE':
                return __("Success Rate", 'custom-user-contact-form-builder');

            case 'LABEL_TOTAL_VISITS':
                return __("Total Views", 'custom-user-contact-form-builder');

            case 'LABEL_CONVERSION':
                return __("Conversion", 'custom-user-contact-form-builder');

            case 'LABEL_CONV_BY_BROWSER':
                return __("Browser wise Conversion", 'custom-user-contact-form-builder');

            case 'LABEL_HITS':
                return __("Hits", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSERS_USED':
                return __("Browsers Used", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER':
                return __("Browser", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_OTHER':
                return __("Other", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_CHROME':
                return __("Chrome", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_IE':
            case 'LABEL_BROWSER_INTERNET EXPLORER':
                return __("Internet Explorer", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_FIREFOX':
                return __("Firefox", 'custom-user-contact-form-builder');
                
            case 'LABEL_BROWSER_EDGE':
                return __("Edge", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_ANDROID':
                return __("Android", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_IPHONE':
                return __("iPhone", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_SAFARI':
                return __("Safari", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_OPERA':
                return __("Opera", 'custom-user-contact-form-builder');

            case 'LABEL_BROWSER_BLACKBERRY':
                return __("BlackBerry", 'custom-user-contact-form-builder');

            case 'LABEL_RESET_STATS':
                return __("Reset All Stats", 'custom-user-contact-form-builder');

            case 'ALERT_STAT_RESET':
                return __("You are going to delete all stats for selected form. Do you want to proceed?", 'custom-user-contact-form-builder');

            case 'TITLE_FORM_STAT_PAGE':
                return __("Form Analytics", 'custom-user-contact-form-builder');

            case 'TITLE_FIELD_STAT_PAGE':
                return __("Field Analytics", 'custom-user-contact-form-builder');

            case 'ALERT_SUBMISSIOM_LIMIT':
                return __("Submission limit reached for this form, please try back after 24 hours.", 'custom-user-contact-form-builder');

            case 'LABEL_SUB_LIMIT_ANTISPAM':
                return __("Form submission limit for a device", 'custom-user-contact-form-builder');

            case 'LABEL_SUB_LIMIT_ANTISPAM_HELP':
                return __("Limits how many times a form can be submitted from a device within a day. Helpful to prevent spams. Set it to zero(0) to disable this feature.", 'custom-user-contact-form-builder');

            case 'LABEL_FAILED_SUBMISSIONS':
                return __("Not submitted", 'custom-user-contact-form-builder');

            case 'LABEL_BANNED_SUBMISSIONS':
                return __("Banned", 'custom-user-contact-form-builder');

            case 'MSG_AUTO_USER_ROLE_INVALID':
                return __("Please select either Automatically Assigned WP User Role or Pick user role manually.", 'custom-user-contact-form-builder');

            case 'LABEL_ALL':
                return __("All", 'custom-user-contact-form-builder');

            case 'MSG_WP_ROLE_LABEL_INVALID':
                return __("WP User Role Field Label is required.", 'custom-user-contact-form-builder');

            case 'MSG_ALLOWED_ROLES_INVALID':
                return __("Please select Allowed WP Roles for Users.", 'custom-user-contact-form-builder');

            case 'LABEL_ENTRY_ID':
                return __("Submission ID", 'custom-user-contact-form-builder');

            case 'LABEL_ENTRY_TYPE':
                return __("Submission Type", 'custom-user-contact-form-builder');

            case 'LABEL_USER_NAME':
                return __("User Name", 'custom-user-contact-form-builder');

            case 'LABEL_USER_ROLES':
                return __("User Roles", 'custom-user-contact-form-builder');

            case 'LABEL_SEND':
                return __("Send", 'custom-user-contact-form-builder');

            case 'MSG_AUTO_REPLY_CONTENT_INVALID':
                return __("Auto reply email body is invalid.", 'custom-user-contact-form-builder');

            case 'MSG_AUTO_REPLY_SUBJECT_INVALID':
                return __("Auto reply email subject is invalid", 'custom-user-contact-form-builder');

            case 'TITLE_INVITES':
                return __("Email Users", 'custom-user-contact-form-builder');

            case 'LABEL_QUEUE_IN_PROGRESS':
                return __("Queue in progress", 'custom-user-contact-form-builder');

            case 'LABEL_SENT':
                return __("Sent", 'custom-user-contact-form-builder');

            case 'LABEL_STARTED_ON':
                return __("Started on", 'custom-user-contact-form-builder');

            case 'MSG_QUEUE_RUNNING':
                return __("This form is already processing an email queue. You cannot add another queue, until this task is finished", 'custom-user-contact-form-builder');

            case 'ERROR_INVITE_NO_MAIL':
                return __("No email submissions found for this form.", 'custom-user-contact-form-builder');

            case 'ERROR_INVITE_NO_QUEUE':
                return __("No active queue. Select a form from dropdown to send emails.", 'custom-user-contact-form-builder');

            case 'LABEL_RESET':
                return __("Reset", 'custom-user-contact-form-builder');

            case 'LABEL_SHOW_ON_FORM':
                return __("Show on form", 'custom-user-contact-form-builder');

            case 'MSG_REDIRECTING_TO':
                return __("Redirecting you to", 'custom-user-contact-form-builder');

            case 'MSG_PAYMENT_SUCCESS':
                return __("Payment Successfull", 'custom-user-contact-form-builder');

            case 'MSG_PAYMENT_FAILED':
                return __("Payment Failed!", 'custom-user-contact-form-builder');

            case 'MSG_PAYMENT_PENDING':
                return __("Payment Pending.", 'custom-user-contact-form-builder');

            case 'MSG_PAYMENT_CANCEL':
                return __("Transaction Cancelled", 'custom-user-contact-form-builder');

            case 'LABEL_UNIQUE_TOKEN_EMAIL':
                return __("Unique Token", 'custom-user-contact-form-builder');

            case 'LABEL_DEFAULT_SELECT_OPTION':
                return __("Please select a value", 'custom-user-contact-form-builder');

            case 'LABEL_REMEMBER':
                return __("Remember me", 'custom-user-contact-form-builder');

            case 'TITLE_DASHBOARD_WIDGET':
                return __('Submission Activity', 'custom-user-contact-form-builder');

            case 'MSG_OTP_SUCCESS':
                return __("Success! an email with one time password (OTP) was sent to your email address.", 'custom-user-contact-form-builder');

            case 'LABEL_OTP':
                return __("One Time Password", 'custom-user-contact-form-builder');

            case 'OTP_MAIL':
                return __("Your One Time Password is ", 'custom-user-contact-form-builder');

            case 'MSG_EMAIL_NOT_EXIST':
                return __("Oops! We could not find this email address in our submissions database.", 'custom-user-contact-form-builder');

            case 'INVALID_EMAIL':
                return __("Invalid email format. Please correct and try again.", 'custom-user-contact-form-builder');

            case 'MSG_AFTER_OTP_LOGIN':
                return __("You have successfully logged in using OTP.", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_OTP':
                return __("The OTP you entered is invalid. Please enter correct OTP code from the email we sent you, or you can generate a new OTP.", 'custom-user-contact-form-builder');

            case 'MSG_NOTE_FROM_ADMIN':
                return __(" Admin added a note for you: <br><br>", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_TITLE':
                return __("Name of your form. Should be unique.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_DESC':
                return __("For your reference only. Not visible on front end.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_CREATE_WP_USER':
                return __("Selecting this will register the user in WP Users area.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_WP_USER_ROLE_AUTO':
                return __("Which user role will be assigned to the user.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_WP_USER_ROLE_PICK':
                return __("This will allow users to select a role themselves. A new field will appear on the form.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_ROLE_SELECTION_LABEL':
                return __("Label of the role selection field which will appear on the form.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_ALLOWED_USER_ROLE':
                return __("Only the checked roles will appear for selection on the form.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_CONTENT_ABOVE_FORM':
                return __("This content will be displayed above the fields in the form.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_SUCCESS_MSG':
                return __("Message to show to the user after the form is submitted successfully.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_UNIQUE_TOKEN':
                return __("A unique random number will be displayed to the user after form submission.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_REDIRECT_AFTER_SUB':
                return __("Redirect the user to a new page after submission (and success message).", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_REDIRECT_PAGE':
                return __("Select the page to which user is redirected after form submission.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_REDIRECT_URL':
                return __("Enter the URL where the user is redirected after form submission.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_RESPONDER':
                return __("Turns on auto responder email for the form. After successful submission an email is sent to the user.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_RESP_SUB':
                return __("Subject of the mail sent to the user.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_RESP_MSG':
                return __("Content of the email to be sent to the user. You can use rich text and values the user submitted in the form for a more personalized message. If you are creating a new form, Add Fields drop down will be empty. You can come back after adding fields to the form.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_SUB_BTN_LABEL':
                return __("Label for the button that will submit the form. Leave blank for default label.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_SUB_BTN_FG_COLOR':
                return __("Color of the text inside the submit button. Leave blank for default theme colors.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_SUB_BTN_BG_COLOR':
                return __("Color of the submit button. Leave blank for default theme colors.", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_BG_ALPHA':
                return __("Background transparency", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON_BG_ALPHA':
                return __("Change the opacity of icon's background", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_MC_LIST':
                return __("Required for connecting the form with a MailChimp List. To make it work, please set MailChimp in Global Settings &#8594; <a target='blank' class='cm_help_link' href='admin.php?page=cm_options_thirdparty'>External Integration</a>.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_MC_EMAIL':
                return __("Choose the form field which will be connected to MailChimp’s email field.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_MC_FNAME':
                return __("Choose the form field which will be connected to MailChimp’s First Name field.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_MC_LNAME':
                return __("Choose the form field which will be connected to MailChimp’s Last Name field.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_EXPIRE':
                return __("Select this if you want to auto unpublished the form after required number of submissions or reaching a specific date.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_EXPIRE_BY':
                return __("Select the condition for auto unpublishing the form", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_EXP_SUB_LIMIT':
                return __("The form will not be visible to the user after this number is reached. It can be reset later.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_EXP_TIME_LIMIT':
                return __("The form will not be visible to the user after this date. It can be reset later.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_EXP_MSG':
                return __("User will see this message when accessing the form if the form is in unpublished state after reaching submission limit or expiry date.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_SELECT_TYPE':
                return __("Select  or change type of the field if not already selected.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_LABEL':
                return __("The label of the field that will appear on the form.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_PLACEHOLDER':
                return __("Value or message that will appear inside the field before user fill it.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_CSS_CLASS':
                return __("Apply a CSS Class defined in the theme CSS file or in Appearance &#8594; Editor", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_MAX_LEN':
                return __("Maximum Allowed length (characters) of the user submitted value. Leave blank for no limit. ", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_IS_REQUIRED':
                return __("Make this field mandatory to be filled. Form will give user an error if he/ she tries to submit the form without filling this field", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_SHOW_ON_USERPAGE':
                return __("Show this field on the User Page inside Users section of GorillaForms. ", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_PARA_TEXT':
                return __("The text you want the user to see.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_HEADING_TEXT':
                return __("The text you want the user to see as heading.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_OPTIONS_SORTABLE':
                return __("Options for user to choose from. Drag and drop to arrange their order inside the list.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_DEF_VALUE':
                return __("This option will appear selected by default when form loads.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_COLS':
                return __("Width of the text area defined in terms of columns where each column is equivalent to one character.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_ROWS':
                return __("Height of the text area defined in terms of number of text lines.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_TnC_VAL':
                return __("Paste or insert your terms and conditions here.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_FILETYPE':
                return __("Limits the type of file allowed to be attached. If you will leave it blank then extensions defined in global settings will be used.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_PRICE_FIELD':
                return __("Select the payment option defined in “Price Fields” section of GorillaForms.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_OPTIONS_COMMASEP':
                return __("Options for drop down list. Separate multiple values with a comma(,).", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_BDATE_RANGE':
                return __("Enable this to force selection of date of birth from a certain range.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_PRIMARY_FIELD_EMAIL':
                return __("This is primary email field. Type of this field can not be changed.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_GEN_THEME':
                return __("Select visual style of the form", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_GEN_LAYOUT':
                return __("Select Label Position and layout of the form", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_GEN_FILETYPES':
                return __("Limit the type of file allowed to be attached. You will need to define extension of the file types here.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_GEN_FILE_MULTIPLE':
                return __("Allows users to attach multiple files to your single file field.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_GEN_REG_URL':
                return __("Choose which page you want to show to the user when he or she clicks on “Register” link on your site. Do make sure you have a registration form inserted inside the page you select.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_POST_SUB_REDIR':
                return __("Choose the page you want to redirect the user to after successful login.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ASPM_ENABLE_CAPTCHA':
                return __("Shows recaptcha above the submit button. It verifies if the user is human before accepting submission.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ASPM_SITE_KEY':
                return __("Required to make reCAPTCHA  work. You can generate site key from <a target='blank' class='cm_help_link' href='https://www.google.com/recaptcha/'>here</a>.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ASPM_SECRET_KEY':
                return __("Required to make reCAPTCHA  work. It will be provided when you generate site key.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_USER_AUTOGEN':
                return __("Creates and sends the users random password instead of allowing them to set one on the form. After selecting this, password field will not appear on the forms. ", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_USER_AUTOAPPROVAL':
                return __("Automatically activates user accounts after submission. Uncheck it if you want to manually activate each user. It can be done through user manager or by clicking activation link in admin email notification.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_NOTE_NOTIFS':
                return __("An email notification will be send to the user if you add a note to his/her submission and make it visible to him/her.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_ADMIN_NOTIFS':
                return __("An email notification will be sent to Admin of this site for every form submission.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_RESPS':
                return __("Add other people who you want to receive notifications for form submissions.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_ENABLE_SMTP':
                return __("Whether to use an external SMTP (Google, Yahoo! etc) instead of local mail server", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_SMTP_HOST':
                return __("Specify host address for SMTP.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_SMTP_PORT':
                return __("Specify port number for SMTP.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_SMTP_ENCTYPE':
                return __("Specify the type of encryption used by your SMTP service provider", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_SMTP_AUTH':
                return __("Please check this if authentication is required at SMTP server. Also, provide credential in the following fields.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_FROM_DISP_NAME':
                return __("A name to identify the sender. It will be shown as &quot;From: MY Blog &lt;me@myblog.com&gt;&quot;", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_ARESP_FROM_EMAIL':
                return __("The reply-to email in the header of messages that user or admin receives.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_FB_ENABLE':
                return __("A login using Facebook button will appear alongside the login form.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_FB_SECRET':
                return __("To make Facebook login work, you’ll need an App Secret. It will be provided when you generate and App ID.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_FB_APPID':
                return __("To make Facebook login work, you’ll need an App ID. More information <a target='blank' class='cm_help_link' href='https://developers.facebook.com/docs/apps/register'>here</a>.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_MC_ENABLE':
                return __("This will allow you to fetch your MailChimp lists in individual form settings and map selective fields to your MailChimp fields.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_MC_API':
                return __("You will need a MailChimp API to make integration work. More information <a target='blank' class='cm_help_link' href='http://kb.mailchimp.com/accounts/management/about-api-keys'>here</a>.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_PYMNT_PROCESSOR':
                return __("Select the payment system(s) you want to use for accepting payments. Make sure you configure them right.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_PYMNT_TESTMODE':
                return __("This will put GorillaForms payments on test mode. Useful for testing payment system.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_PYMNT_PP_EMAIL':
                return __("Your PayPal account email, to which you will accept the payments.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_PYMNT_CURRENCY':
                return __("Default Currency for accepting payments. Usually, this will be default currency in your PayPal or Stripe account.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_PYMNT_PP_PAGESTYLE':
                return __("If you have created checkout pages in your PayPal account and want to show a specific page, you can enter it’s name here.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_PRICE_FIELD_LABEL':
                return __("For your reference only. This name will be visible when you will add price field in a form.", 'custom-user-contact-form-builder');

            case 'HELP_ADD_PRICE_FIELD_SELECT_TYPE':
                return __("Select  or change type of the price field if not already selected.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_INVITES_SUB':
                return __("Subject for the message you are sending to the users.", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_INVITES_BODY':
                return __("Content of the message your are sending to the users of selected form. You can use values from form fields filled by the users from “Add Fields” dropdown for personalized message.", 'custom-user-contact-form-builder');

            //Admin menus
            case 'ADMIN_MENU_REG':
                return __("GorillaForms", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_NEWFORM':
                return __("New Form", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_NEWFORM_PT':
                return __("Add Form", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTINGS':
                return __("Global Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SUBS':
                return __("Submissions", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_FORM_STATS':
                return __("Form Analytics", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_FIELD_STATS':
                return __("Field Analytics", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_PRICE':
                return __("Price Fields", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_ATTS':
                return __("Attachments", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_INV':
                return __("Email Users", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_USERS':
                return __("User Manager", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_ROLES':
                return __("User Roles", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SUPPORT':
                return __("Support", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTING_GEN_PT':
                return __("General Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTING_AS_PT':
                return __("Anti Spam Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTING_UA_PT':
                return __("User Account Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTING_AR_PT':
                return __("Auto Responder Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTING_TP_PT':
                return __("Third Party Integration Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTING_PP_PT':
                return __("Payment Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_SETTING_SAVE_PT':
                return __("Save Settings", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_ADD_NOTE_PT':
                return __("Add Note", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_MNG_FIELDS_PT':
                return __("Manage Form Fields", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_ADD_FIELD_PT':
                return __("Add Field", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_ADD_PP_FIELD_PT':
                return __("Add PayPal Field", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_PP_PROC_PT':
                return __("PayPal processing", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_ATT_DL_PT':
                return __("Attachment Download", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_VIEW_SUB_PT':
                return __("View Submission", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_USER_ROLE_DEL_PT':
                return __("User Role Delete", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_REG_PT':
                return __("Registrant", 'custom-user-contact-form-builder');

            case 'MSG_LOST_PASS':
                return __("Lost your password?", 'custom-user-contact-form-builder');

            case 'SUPPORT_PAGE_NOTICE':
                return __("Note: If you wish to roll back to earlier version of GorillaForms due to broken upgrade, please <a href='http://registrationmagic.com/free/'>go here</a>. You will need to deactivate or uninstall this version and reinstall version 2.5. No data will be lost. If you want to resolve any issue with version 3.0, please use one of the links below to contact support.", 'custom-user-contact-form-builder');

            case 'LABEL_MY_DETAILS':
                return __("Personal Details", 'custom-user-contact-form-builder');

            case 'LABEL_ADMIN_NOTES':
                return __("Admin Notes", 'custom-user-contact-form-builder');

            case 'LABEL_SHOW_PROG_BAR':
                return __("Show expiry countdown above the form?", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_GEN_PROGRESS_BAR':
                return __("Shows form expiry status above the form when auto-expiry is turned on", 'custom-user-contact-form-builder');

            case 'MSG_REQUIRED_FIELD':
                return __("This is a required field", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_USER_SEND_PASS':
                return __("Sends user a mail about his/her user-name and password after registration.", 'custom-user-contact-form-builder');

            case 'MSG_CREATE_PRICE_FIELD':
                return __("First Create a price field from Price Fields > Add New", 'custom-user-contact-form-builder');

            case 'LABEL_EXPORT_TO_URL_CB':
                return __("Send Submitted Data to External URL", 'custom-user-contact-form-builder');

            case 'LABEL_EXPORT_URL':
                return __("URL", 'custom-user-contact-form-builder');

            case 'HELP_SEND_SUB_TO_URL':
                return __("URL to the script on external server which will handle the data", 'custom-user-contact-form-builder');

            case 'HELP_SEND_SUB_TO_URL_CB':
                return __("Posts submitted data to external server. This could be useful for maintaining another database for submissions.", 'custom-user-contact-form-builder');

            case 'ADMIN_SUBMENU_REG':
                return __("Forms", 'custom-user-contact-form-builder');

            case 'LABEL_STRIPE_API_KEY' :
                return __("Stripe API Key", 'custom-user-contact-form-builder');

            case 'LABEL_STRIPE_PUBLISH_KEY' :
                return __("Stripe Publishable Key", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_PYMNT_STRP_API_KEY' :
                return __("Secret and publishable keys are used to identify your Stripe account. You can grab the test and live API keys for your account under <a href='https://dashboard.stripe.com/account/apikeys' target='blank'>Your Account > API Keys</a>", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_PYMNT_STRP_PUBLISH_KEY' :
                return __("", 'custom-user-contact-form-builder');

            case 'SELECT_FIELD_FIRST_OPTION':
                return __("Select an option", 'custom-user-contact-form-builder');

            case 'MSG_CLICK_TO_REVIEW' :
                return __("Click here to review", 'custom-user-contact-form-builder');

            case 'MSG_LIKED_RM' :
                return __("Liked <span class='cm-brand'>GorillaForms </span>so far? Please rate it <span class='cm-bold'> 5 stars</span> on wordpress.org and help us keep it going!", 'custom-user-contact-form-builder');

            case 'LABEL_SELECT_PAYMENT_METHOD':
                return __("Select a payment method", 'custom-user-contact-form-builder');

            case 'LABEL_STRIPE_CARD_NUMBER':
                return __("Card Number", 'custom-user-contact-form-builder');

            case 'LABEL_STRIPE_CARD_MONTH':
                return __("Month", 'custom-user-contact-form-builder');

            case 'LABEL_STRIPE_CARD_YEAR':
                return __("Year", 'custom-user-contact-form-builder');

            case 'LABEL_STRIPE_CARD_CVC':
                return __("CVC/CVV", 'custom-user-contact-form-builder');

            case 'LABEL_CUSTOM_RANGE':
                return __("Specific Period", 'custom-user-contact-form-builder');

            case 'LABEL_CUSTOM_RANGE_FROM_DATE':
                return __("From", 'custom-user-contact-form-builder');

            case 'LABEL_CUSTOM_RANGE_UPTO_DATE':
                return __("Up to", 'custom-user-contact-form-builder');

            case 'CRIT_ERROR_TITLE':
                return __("Uh, oh! Looks like we've hit a road block", 'custom-user-contact-form-builder');

            case 'CRIT_ERROR_SUBTITLE':
                return __("Following requirement(s) are not met, I can not continue. :(", 'custom-user-contact-form-builder');

            case 'CRIT_ERR_XML':
                return __("PHP extension SimpleXML is not enabled on server.", 'custom-user-contact-form-builder');

            case 'CRIT_ERR_MCRYPT':
                return __("PHP extension mcrypt is not enabled on server.", 'custom-user-contact-form-builder');

            case 'CRIT_ERR_PHP_VERSION':
                return __("This plugin requires atleast php version 5.3. Older version found.", 'custom-user-contact-form-builder');

            case 'ERROR_NA_SEND_TO_URL_FEAT':
                return __("Feature not available. PHP extension CURL is not enabled on server.", 'custom-user-contact-form-builder');

            case 'CM_ERROR_EXTENSION_CURL':
                return __("PHP extension CURL is not enabled on server. Following features will not be available:<ul><li>Facebook Integration</li><li>Mailchimp Integration</li><li>Stripe Payment</li><li>Export submission to external URL</li></ul>", 'custom-user-contact-form-builder');

            case 'CM_ERROR_EXTENSION_ZIP':
                return __("PHP extension ZIP is not enabled on server. Following features will not be available:<ul><li>Downloading multiple attachments as zip</li></ul>", 'custom-user-contact-form-builder');


            case 'NEWSLETTER_SUB_MSG':
                return __("<span class='cm-newsletter-button'><a href='javascript:void(0)' onclick='cm_handle_newsletter_subscription_click(\"" . self::get('MSG_NEWSLETTER_SUBMITTED') . "\")'> Click here</a></span> to keep up with breakthroughs and innovations we are bringing to WordPress registration system. Also receive an instant 20% discount on popular Gold Bundle.", 'custom-user-contact-form-builder');

            case 'MAIL_ACTIVATE_USER_DEF_SUB':
                return __("Activate User", 'custom-user-contact-form-builder');

            case 'MAIL_NEW_USER1' :
                return __("A new user has been registered on %SITE_NAME%", 'custom-user-contact-form-builder');

            case 'MAIL_NEW_USER2' :
                return __("Please click on the button below to activate the user.", 'custom-user-contact-form-builder');

            case 'MAIL_NEW_USER3' :
                return __("If the above button is not working you can paste the following link to your browser", 'custom-user-contact-form-builder');

            case 'ACT_AJX_FAILED_DEL' :
                return __("Failed to upadte user information.Can not activate user", 'custom-user-contact-form-builder');

            case 'ACT_AJX_ACTIVATED' :
                return __("You have successfully activated the user.", 'custom-user-contact-form-builder');

            case 'ACT_AJX_ACTIVATED2' :
                return __("If the user is activated by mistake or you do not want to activate the user you can deactivate the user using dashboard.", 'custom-user-contact-form-builder');

            case 'ACT_AJX_ACTIVATE_FAIL' :
                return __("Unable to activate the user. Try activating the user using your dashboard.", 'custom-user-contact-form-builder');

            case 'ACT_AJX_NO_ACCESS' :
                return __("You are not authorized to perform this action.", 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_MAP' :
                return __("Map", 'custom-user-contact-form-builder');

            case 'LABEL_ST_ADDRESS' :
                return __("Street Address", 'custom-user-contact-form-builder');

            case 'LABEL_ADDR_CITY' :
                return __("City", 'custom-user-contact-form-builder');

            case 'LABEL_ADDR_STATE' :
                return __("State", 'custom-user-contact-form-builder');

            case 'LABEL_ADDR_COUNTRY' :
                return __("Country", 'custom-user-contact-form-builder');

            case 'LABEL_ADDR_ZIP' :
                return __("Zip Code", 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_ADDRESS' :
                return __("Address", 'custom-user-contact-form-builder');

            case 'PH_ENTER_ADDR':
                return __("Enter your address", 'custom-user-contact-form-builder');

            case 'LABEL_GOOGLE_API_KEY':
                return __("Google Maps API Key", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_GGL_API':
                return __("You will need a Google maps API to make 'Map' and 'Address' type fields work. To get API key <a target='blank' class='cm_help_link' href='https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true'>Click here</a>", 'custom-user-contact-form-builder');

            case 'MSG_FRONT_NO_GOOGLE_API_KEY':
                return __("No Google Maps API configured.Please set a valid API Key from GorillaForms &#8594; Global Settings &#8594; EXTERNAL INTEGRATION.", 'custom-user-contact-form-builder');

            case 'MSG_CM_NO_API_NOTICE':
                return __("Google Maps API Keys are required for this field.Please make sure you have configured a valid API key in Global Settings <span>&#8594;</span> EXTERNAL INTEGRATION.", 'custom-user-contact-form-builder');

            case 'MSG_NEWSLETTER_SUBMITTED':
                return __("Congratulations! You have subscribed the newsletter successfully.", 'custom-user-contact-form-builder');

            case 'MSG_USER_DELETED':
                return __("</em>User Deleted</em>", 'custom-user-contact-form-builder');

            case 'ERR_SESSION_DIR_NOT_WRITABLE':
                return __('Session directory is not writable, please contact your server support to enable write permission to following directory: <br>%s', 'custom-user-contact-form-builder');

            case 'MSG_GET_EMBED':
                return __('Get form embed code', 'custom-user-contact-form-builder');


            case 'LABEL_CUSTOM_RANGE':
                return __("Between following dates", 'custom-user-contact-form-builder');

            case 'LABEL_CUSTOM_RANGE_FROM_DATE':
                return __("From", 'custom-user-contact-form-builder');

            case 'LABEL_CUSTOM_RANGE_UPTO_DATE':
                return __("Up to", 'custom-user-contact-form-builder');

            case 'CRIT_ERROR_TITLE':
                return __("Uh, oh! Looks like we've hit a road block", 'custom-user-contact-form-builder');

            case 'CRIT_ERROR_SUBTITLE':
                return __("Following requirement(s) are not met, I can not continue. :(", 'custom-user-contact-form-builder');

            case 'CRIT_ERR_XML':
                return __("PHP extension SimpleXML is not enabled on server.", 'custom-user-contact-form-builder');

            case 'CRIT_ERR_MCRYPT':
                return __("PHP extension mcrypt is not enabled on server.", 'custom-user-contact-form-builder');

            case 'CRIT_ERR_PHP_VERSION':
                return __("This plugin requires atleast php version 5.3. Older version found.", 'custom-user-contact-form-builder');

            case 'ERROR_NA_SEND_TO_URL_FEAT':
                return __("Feature not available. PHP extension CURL is not enabled on server.", 'custom-user-contact-form-builder');

            case 'CM_ERROR_EXTENSION_CURL':
                return __("PHP extension CURL is not enabled on server. Following features will not be available:<ul><li>Facebook Integration</li><li>Mailchimp Integration</li><li>Stripe Payment</li><li>Export submission to external URL</li></ul>", 'custom-user-contact-form-builder');

            case 'CM_ERROR_EXTENSION_ZIP':
                return __("PHP extension ZIP is not enabled on server. Following features will not be available:<ul><li>Downloading multiple attachments as zip</li></ul>", 'custom-user-contact-form-builder');

            case 'NEWSLETTER_SUB_MSG':
                return __("Keep up with breakthroughs and innovations we are bringing to WordPress registration system. <a href='javascript:void(0)' onclick='cm_handle_newsletter_subscription_click()'> Click here</a> to subscribe to our newsletter.", 'custom-user-contact-form-builder');

            case 'MSG_USER_DELETED':
                return __("</em>User Deleted</em>", 'custom-user-contact-form-builder');

            case 'ERR_SESSION_DIR_NOT_WRITABLE':
                return __('Session directory is not writable, please contact your server support to enable write permission to following directory: <br>%s', 'custom-user-contact-form-builder');

            case 'MSG_BANNED':
                return __("Access Denied", 'custom-user-contact-form-builder');

            case 'MAIL_ACCOUNT_ACTIVATED' :
                return __('Hi,<br/><br/> Thank you for registering with <a href="%s">%s</a>. Your account is now active.<br/><br/>Regards.', 'custom-user-contact-form-builder');

            case 'MAIL_ACOOUNT_ACTIVATED_DEF_SUB' :
                return __('Account Activated', 'custom-user-contact-form-builder');

            case 'VALIDATION_ERROR_IP_ADDRESS':
                return __("Only numbers, dot(.) and wildcard(?) are allowed.", 'custom-user-contact-form-builder');

            case 'LABEL_BAN_IP_HELP':
                return __("Enter IP Address to ban, separate by space for multiple addresses. Wildcard(?) allowed. For example: 127.233.12?.01? will ban all IPs from 127.233.120.010 to 127.233.129.019", 'custom-user-contact-form-builder');

            case 'LABEL_BAN_IP':
                return __("Banned IP Addresses from accessing form.", 'custom-user-contact-form-builder');

            case 'LABEL_BAN_EMAIL_HELP':
                return __("Enter Email Addresses to ban, separate by space for multiple addresses. Wildcard(* and ?) allowed. For example: joh*@gmail.com will ban all submissions done using gmail domain and start with 'joh'", 'custom-user-contact-form-builder');

            case 'LABEL_BAN_USERNAME':
                return __("Blacklisted/reserved username", 'custom-user-contact-form-builder');

            case 'LABEL_BAN_USERNAME_HELP':
                return __("User will not be able to register using these usernames, separate multiple usernames using space or newline", 'custom-user-contact-form-builder');

            case 'LABEL_BAN_USERNAME_MSG':
                return __("This username can not be used", 'custom-user-contact-form-builder');

            case 'LABEL_BAN_EMAIL':
                return __("Banned Email Addresses from submitting form", 'custom-user-contact-form-builder');

            case 'LABEL_IS_REQUIRED_SCROLL':
                return __("Scrolling T&C is required", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_REQUIRED_SCROLL':
                return __("Force user to scroll past complete T&C before accepting.", 'custom-user-contact-form-builder');

            case 'LABEL_LOGOUT':
                return __("Logout", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_CONF':
                return __("Form Configuration", 'custom-user-contact-form-builder');

            case 'LABEL_F_GEN_SETT':
                return __("General Settings", 'custom-user-contact-form-builder');


            case 'LABEL_F_VIEW_SETT':
                return __("Edit Design", 'custom-user-contact-form-builder');


            case 'LABEL_F_ACC_SETT':
                return __("Accounts", 'custom-user-contact-form-builder');


            case 'LABEL_F_PST_SUB_SETT':
                return __("Post Submission", 'custom-user-contact-form-builder');


            case 'LABEL_F_AUTO_RESP_SETT':
                return __("Auto Responder", 'custom-user-contact-form-builder');


            case 'LABEL_F_LIM_SETT':
                return __("Limits", 'custom-user-contact-form-builder');


            case 'LABEL_F_MC_SETT':
                return __("MailChimp", 'custom-user-contact-form-builder');


            case 'LABEL_F_ACTRL_SETT':
                return __("Access Control", 'custom-user-contact-form-builder');


            case 'LABEL_F_GEN_SETT_DESC':
                return __("Name, description and general content", 'custom-user-contact-form-builder');


            case 'LABEL_F_VIEW_SETT_DESC':
                return __("Personalize this form and make it your own!", 'custom-user-contact-form-builder');


            case 'LABEL_F_ACC_SETT_DESC':
                return __("Define user account and role behavior", 'custom-user-contact-form-builder');


            case 'LABEL_F_PST_SUB_SETT_DESC':
                return __("Success message, redirections and external submissions", 'custom-user-contact-form-builder');


            case 'LABEL_F_AUTO_RESP_SETT_DESC':
                return __("Define auto responder settings with mail merge", 'custom-user-contact-form-builder');


            case 'LABEL_F_LIM_SETT_DESC':
                return __("Limit form submissions based specific conditions and message", 'custom-user-contact-form-builder');


            case 'LABEL_F_MC_SETT_DESC':
                return __("MailChimp Integration with advanced field mapping", 'custom-user-contact-form-builder');

            case 'LABEL_F_ACTRL_SETT_DESC':
                return __("Form access restrictions based on date, passphrase and role.", 'custom-user-contact-form-builder');

            case 'MSG_MC_KEY_NO_SET':
                return __("Mailchimp is not configured to work with this form. Please enter a valid mailchimp API key in Global Settings&#10148;External Integration&#10148;Mailchimp Api Key", 'custom-user-contact-form-builder');
            case 'MSG_FS_NOT_AUTHORIZED' :
                return __("You are not authorized to see this page.", 'custom-user-contact-form-builder');
            case 'SELECT_FIELD' :
                return __("Select a field.", 'custom-user-contact-form-builder');
            case 'SELECT_LIST' :
                return __("Select a list.", 'custom-user-contact-form-builder');

            case 'NOTICE_SILVER_ACTIVATION':
                return __("GorillaForms Gold edition is already activated. Please disable Gold to activate Silver edition.", 'custom-user-contact-form-builder');

            case 'NOTICE_BASIC_ACTIVATION':
                return __("GorillaForms Gold edition is already activated. Please disable Gold to activate Basic edition.", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRED':
                return __("Expired", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_ON':
                return __("Expires on", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_IN':
                return __("Expires in %d days", 'custom-user-contact-form-builder');

            case 'LABEL_HELP_TEXT':
                return __("Help text", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_HELP_TEXT':
                return __("It will be shown alongside the field, can be used as a guiding text for user.", 'custom-user-contact-form-builder');

            case 'LABEL_ENABLE_PW_RESTRICTIONS':
                return __("Enable custom password restrictions", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTRICTIONS':
                return __("Password rules", 'custom-user-contact-form-builder');
            case 'LABEL_PW_RESTS_PWR_UC':
                return __("Must contain uppercase letter", 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_PHONE':
                return __("Phone Number", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_PASSWORD':
                return __("Password", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_NICKNAME':
                return __("Nick Name", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_BDATE':
                return __("Birth Date", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SEMAIL':
                return __("Secondary email", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_GENDER':
                return __("Gender", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_LANGUAGE':
                return __("Language", 'custom-user-contact-form-builder');
            case 'LABEL_IS_REQUIRED_RANGE':
                return __("Limited range of birth date", 'custom-user-contact-form-builder');
            case 'LABEL_IS_REQUIRED_MAX_RANGE':
                return __("Maximum Date", 'custom-user-contact-form-builder');
            case 'LABEL_IS_REQUIRED_MIN_RANGE':
                return __("Minimum Date", 'custom-user-contact-form-builder');
            case 'TEXT_RANGE':
                return __("Range", 'custom-user-contact-form-builder');
            case 'LABEL_SECEMAIL':
                return __("Secondary Email", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_FACEBOOK':
                return __("Facebook", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_TWITTER':
                return __("Twitter", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_GOOGLE':
                return __("Google+", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_INSTAGRAM':
                return __("Instagram", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_LINKED':
                return __("Linked In", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_YOUTUBE':
                return __("Youtube", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_VKONTACTE':
                return __("VKontacte", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SKYPE':
                return __("Skype Id", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SOUNDCLOUD':
                return __("SoundCloud", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_TIME':
                return __("Time", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_IMAGE':
                return __("Image upload", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_MOBILE':
                return __("Mobile Number", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SHORTCODE':
                return __("Shortcode", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_DIVIDER':
                return __("Divider", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SPACING':
                return __("Spacing", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_MULTI_DROP_DOWN':
                return __("Multi-Dropdown", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_RATING':
                return __("Rating", 'custom-user-contact-form-builder');
            case 'FACEBOOK_ERROR':
                return __("Incorrect Format of Facebook Url", 'custom-user-contact-form-builder');
            case 'TWITTER_ERROR':
                return __("Incorrect Format of twitter Url", 'custom-user-contact-form-builder');
            case 'PHONE_ERROR':
                return __("Incorrect Format of Phone Number", 'custom-user-contact-form-builder');
            case 'GOOGLE_ERROR':
                return __("Incorrect Format of Google plus Url", 'custom-user-contact-form-builder');
            case 'INSTAGRAM_ERROR':
                return __("Incorrect Format of Instagram Url", 'custom-user-contact-form-builder');
            case 'LINKED_ERROR':
                return __("Incorrect Format of Linked in Url", 'custom-user-contact-form-builder');
            case 'YOUTUBE_ERROR':
                return __("Incorrect Format of Youtube Url", 'custom-user-contact-form-builder');
            case 'VKONTACTE_ERROR':
                return __("Incorrect Format of Vkontacte Url", 'custom-user-contact-form-builder');
            case 'SKYPE_ERROR':
                return __("Incorrect Format of Skype Id", 'custom-user-contact-form-builder');
            case 'SOUNDCLOUD_ERROR':
                return __("Incorrect Format of Sound cloud url", 'custom-user-contact-form-builder');
            case 'MOBILE_ERROR':
                return __("Incorrect Format of Mobile Number", 'custom-user-contact-form-builder');
            case 'LABEL_TIME_ZONE':
                return __("Timezone", 'custom-user-contact-form-builder');
            case 'HELP_ADD_FIELD_TIME_ZONE':
                return __("Timezone for the field.", 'custom-user-contact-form-builder');
            case 'LABEL_SHORTCODE_TEXT':
                return __("Shortcodes", 'custom-user-contact-form-builder');
            case 'HELP_ADD_FIELD_SHORTCODE_TEXT':
                return __("Enter shortcodes that will appear on the form.", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_WEBSITE':
                return __("Website", 'custom-user-contact-form-builder');
            case 'WEBSITE_ERROR':
                return __("Incorrect Format of Website Url", 'custom-user-contact-form-builder');
            case 'HELP_ADD_FIELD_IS_SHOW_ASTERIX':
                return __("Hide the red Asterisk(*) besides the label. Useful for marking required fields.", 'custom-user-contact-form-builder');

            case 'LABEL_IS_SHOW_ASTERIX':
                return __("Hide Asterisk", 'custom-user-contact-form-builder');

            case 'EMBED_CODE_INFO':
                return __("To use embed code X-Frame-Options must be set to 'ALLOWALL' on server or must be unset.", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_NUM':
                return __("Must contain numeral", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_SC':
                return __("Must contain special character", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MINLEN':
                return __("Minimum length", 'custom-user-contact-form-builder');

            case 'ERR_TITLE_CSTM_PW':
                return __("Error: Password must follow these rules:", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MINLEN_ERR':
                return __("Must not be shorter than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MAXLEN_ERR':
                return __("Must not be longer than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MAXLEN':
                return __("Maximum length", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_CUSTOM_PW_RESTS':
                return __("Force custom rules for password that user choose during registration. Does not appy on auto-generated passwords.", 'custom-user-contact-form-builder');


            case 'LABEL_RESET_PASS':
                return __("Reset Password", 'custom-user-contact-form-builder');

            case 'LABEL_OLD_PASS':
                return __("Old Password", 'custom-user-contact-form-builder');

            case 'LABEL_NEW_PASS':
                return __("New Password", 'custom-user-contact-form-builder');

            case 'LABEL_NEW_PASS_AGAIN':
                return __("Confirm new password", 'custom-user-contact-form-builder');

            case 'ERR_PASS_DOES_NOT_MATCH':
                return __("New password can not be confirmed.", 'custom-user-contact-form-builder');

            case 'ERR_WRONG_PASS':
                return __("Password you have entered is incorrect.", 'custom-user-contact-form-builder');

            case 'PASS_RESET_SUCCESSFUL':
                return __("Your password has been reset successfully. Redirecting you to the login page...", 'custom-user-contact-form-builder');

            case 'ACCOUNT_NOT_ACTIVE_YET':
                return __("Your account is not active yet.", 'custom-user-contact-form-builder');

            case 'LOGIN_AGAIN_AFTER_RESET':
                return __("Please login again with your new password.", 'custom-user-contact-form-builder');

            case 'LABEL_ERROR':
                return __("ERROR", 'custom-user-contact-form-builder');

            case 'PASS_RESET_SUCCESSFUL':
                return __("Password reset successfully.", 'custom-user-contact-form-builder');

            case 'PASS_RESET_SUCCESSFUL':
                return __("Password reset successfully.", 'custom-user-contact-form-builder');


            case 'LABEL_FORM_EXPIRED':
                return __("Expired", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_ON':
                return __("Expires on", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_IN':
                return __("Expires in %d days", 'custom-user-contact-form-builder');

            case 'LABEL_HELP_TEXT':
                return __("Help text", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_HELP_TEXT':
                return __("It will be shown alongside the field, can be used as a guiding text for user.", 'custom-user-contact-form-builder');

            case 'LABEL_ENABLE_PW_RESTRICTIONS':
                return __("Enable custom password restrictions", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTRICTIONS':
                return __("Password rules", 'custom-user-contact-form-builder');
            case 'LABEL_PW_RESTS_PWR_UC':
                return __("Must contain uppercase letter", 'custom-user-contact-form-builder');

            case 'EMBED_CODE_INFO':
                return __("To use embed code X-Frame-Options must be set to 'ALLOWALL' on server or must be unset.", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_NUM':
                return __("Must contain numeral", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_SC':
                return __("Must contain special character", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MINLEN':
                return __("Minimum length", 'custom-user-contact-form-builder');

            case 'ERR_TITLE_CSTM_PW':
                return __("Error: Password must follow these rules:", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MINLEN_ERR':
                return __("Must not be shorter than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MAXLEN_ERR':
                return __("Must not be longer than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MAXLEN':
                return __("Maximum length", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_CUSTOM_PW_RESTS':
                return __("Force custom rules for password that user choose during registration. Does not appy on auto-generated passwords.", 'custom-user-contact-form-builder');

            case 'LABEL_SUB_PDF_HEADER_IMG':
                return __("Logo for submission pdf", 'custom-user-contact-form-builder');

            case 'LABEL_SUB_PDF_HEADER_TEXT':
                return __("Text with logo on submission pdf", 'custom-user-contact-form-builder');

            case 'SUB_PDF_HEADER_IMG_HELP':
                return __("Logo for submission pdf", 'custom-user-contact-form-builder');

            case 'SUB_PDF_HEADER_TEXT_HELP':
                return __("Logo for submission pdf", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_CB':
                return __("Enable date based form access control", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_CB':
                return __("Enable passphrase based form access control", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_ROLE_CB':
                return __("Enable user role based form access control", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_DATE':
                return __("User will be asked to input a date before accessing form. Useful for setting age based restrictions.", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_PASS':
                return __("User will be asked to enter a passphrase before accessing form", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_ROLE':
                return __("Only users with specified roles will be able to view form", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_QUESTION':
                return __("Question for asking date", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_QUESTION':
                return __("Question for asking passphrase", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_QUESTION_DEF':
                return __("Enter your date of birth", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_QUESTION_DEF':
                return __("Enter the secret code", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_DATE_QSTN':
                return __("This question will be asked to user for entering a date", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_PASS_QSTN':
                return __("This question will be asked to user for entering passphrase", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_TYPE':
                return __("Limit type", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_LLIMIT':
                return __("Lower limit", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_ULIMIT':
                return __("Upper limit", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_TYPE_DIFF':
                return __("Age limit", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_TYPE_DATE':
                return __("Absolute dates", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_DATE_TYPE':
                return __("Type of the limits. User entered date must fall into the given date range or age range.", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_ROLE_ROLES':
                return __("Only users with these roles will be able to access form", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_ROLE_ROLES':
                return __("Select User Roles", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_PASS':
                return __("Passphrase", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_PASS_PASS':
                return __("The passphrase/secret code that user must enter to access the form", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_DATE_TYPE':
                return __("Invalid date limit type.", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_DATE_LIMIT':
                return __("Atleast one limit must be input", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_PASS_PASS':
                return __("Passphrase can not be empty", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_ROLES':
                return __("No user-roles selected.", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_FAIL_MSG':
                return __("Denial message", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_FAIL_MSG':
                return __("If user is not authorised to access the form this message will be displayed in place of form.", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_FAIL_MSG_DEF':
                return __("Sorry, you are not authorised to access this content.", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_CHANGE':
                return __("Change", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON':
                return __("Icon", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON':
                return __("Display an icon before the label of this field to add little pizzaz to your form. You can style the icon below.", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_FG_COLOR':
                return __("Icon color", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON_FG_COLOR':
                return __("Foreground color of the icon", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_BG_COLOR':
                return __("Background color", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON_BG_COLOR':
                return __("Background color of the icon", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_SHAPE':
                return __("Shape", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_CLOSE':
                return __("Close", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON_SHAPE':
                return __("Icon will be masked by this shape", 'custom-user-contact-form-builder');

            case 'FIELD_ICON_SHAPE_SQUARE':
                return __("Square", 'custom-user-contact-form-builder');

            case 'FIELD_ICON_SHAPE_ROUND':
                return __("Round", 'custom-user-contact-form-builder');

            case 'FIELD_ICON_SHAPE_STICKER':
                return __("Sticker", 'custom-user-contact-form-builder');

            case 'MSG_CAN_NOT_SAVE_FS_VIEW_AJX':
                return __("No data to be saved.", 'custom-user-contact-form-builder');

            case 'MSG_CAN_NOT_SAVE_FS_VIEW_AJX':
                return __("GorillaForms Gold edition is already activated. Please disable Gold to activate Basic edition.", 'custom-user-contact-form-builder');

            case 'MSG_CAN_NOT_SAVE_FS_VIEW_AJX':
                return __("GorillaForms Gold edition is already activated. Please disable Gold to activate Basic edition.", 'custom-user-contact-form-builder');

            case 'MSG_CAN_NOT_SAVE_FS_VIEW_AJX':
                return __("GorillaForms Gold edition is already activated. Please disable Gold to activate Basic edition.", 'custom-user-contact-form-builder');

            case 'MSG_CAN_NOT_SAVE_FS_VIEW_AJX':
                return __("GorillaForms Gold edition is already activated. Please disable Gold to activate Basic edition.", 'custom-user-contact-form-builder');

            case 'MSG_CAN_NOT_SAVE_FS_VIEW_AJX':
                return __("GorillaForms Gold edition is already activated. Please disable Gold to activate Basic edition.", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRED':
                return __("Expired", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_ON':
                return __("Expires on", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_IN':
                return __("Expires in %d days", 'custom-user-contact-form-builder');

            case 'LABEL_HELP_TEXT':
                return __("Help text", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_HELP_TEXT':
                return __("It will be shown alongside the field, can be used as a guiding text for user.", 'custom-user-contact-form-builder');

            case 'LABEL_ENABLE_PW_RESTRICTIONS':
                return __("Enable custom password restrictions", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTRICTIONS':
                return __("Password rules", 'custom-user-contact-form-builder');
            case 'LABEL_PW_RESTS_PWR_UC':
                return __("Must contain uppercase letter", 'custom-user-contact-form-builder');

            case 'EMBED_CODE_INFO':
                return __("To use embed code X-Frame-Options must be set to 'ALLOWALL' on server or must be unset.", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_NUM':
                return __("Must contain numeral", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_SC':
                return __("Must contain special character", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MINLEN':
                return __("Minimum length", 'custom-user-contact-form-builder');

            case 'ERR_TITLE_CSTM_PW':
                return __("Error: Password must follow these rules:", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MINLEN_ERR':
                return __("Must not be shorter than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MAXLEN_ERR':
                return __("Must not be longer than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MAXLEN':
                return __("Maximum length", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_CUSTOM_PW_RESTS':
                return __("Force custom rules for password that user choose during registration. Does not appy on auto-generated passwords.", 'custom-user-contact-form-builder');


            case 'LABEL_RESET_PASS':
                return __("Reset Password", 'custom-user-contact-form-builder');

            case 'LABEL_OLD_PASS':
                return __("Old Password", 'custom-user-contact-form-builder');

            case 'LABEL_NEW_PASS':
                return __("New Password", 'custom-user-contact-form-builder');

            case 'LABEL_NEW_PASS_AGAIN':
                return __("Confirm new password", 'custom-user-contact-form-builder');

            case 'ERR_PASS_DOES_NOT_MATCH':
                return __("New password can not be confirmed.", 'custom-user-contact-form-builder');

            case 'ERR_WRONG_PASS':
                return __("Password you have entered is incorrect.", 'custom-user-contact-form-builder');

            case 'PASS_RESET_SUCCESSFUL':
                return __("Your password has been reset successfully. Redirecting you to the login page...", 'custom-user-contact-form-builder');

            case 'ACCOUNT_NOT_ACTIVE_YET':
                return __("Your account is not active yet.", 'custom-user-contact-form-builder');

            case 'LOGIN_AGAIN_AFTER_RESET':
                return __("Please login again with your new password.", 'custom-user-contact-form-builder');

            case 'LABEL_ERROR':
                return __("ERROR", 'custom-user-contact-form-builder');

            case 'PASS_RESET_SUCCESSFUL':
                return __("Password reset successfully.", 'custom-user-contact-form-builder');

            case 'PASS_RESET_SUCCESSFUL':
                return __("Password reset successfully.", 'custom-user-contact-form-builder');


            case 'LABEL_FORM_EXPIRED':
                return __("Expired", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_ON':
                return __("Expires on", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_IN':
                return __("Expires in %d days", 'custom-user-contact-form-builder');

            case 'LABEL_HELP_TEXT':
                return __("Help text", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_HELP_TEXT':
                return __("It will be shown alongside the field, can be used as a guiding text for user.", 'custom-user-contact-form-builder');

            case 'LABEL_ENABLE_PW_RESTRICTIONS':
                return __("Enable custom password restrictions", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTRICTIONS':
                return __("Password rules", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_UC':
                return __("Must contain uppercase letter", 'custom-user-contact-form-builder');

            case 'LABEL_RESET_PASS':
                return __("Reset Password", 'custom-user-contact-form-builder');

            case 'LABEL_OLD_PASS':
                return __("Old Password", 'custom-user-contact-form-builder');

            case 'LABEL_NEW_PASS':
                return __("New Password", 'custom-user-contact-form-builder');

            case 'LABEL_NEW_PASS_AGAIN':
                return __("Confirm new password", 'custom-user-contact-form-builder');

            case 'ERR_PASS_DOES_NOT_MATCH':
                return __("New password can not be confirmed.", 'custom-user-contact-form-builder');

            case 'ERR_WRONG_PASS':
                return __("Password you have entered is incorrect.", 'custom-user-contact-form-builder');

            case 'PASS_RESET_SUCCESSFUL':
                return __("Your password has been reset successfully. Redirecting you to the login page...", 'custom-user-contact-form-builder');

            case 'ACCOUNT_NOT_ACTIVE_YET':
                return __("Your account is not active yet.", 'custom-user-contact-form-builder');

            case 'LOGIN_AGAIN_AFTER_RESET':
                return __("Please login again with your new password.", 'custom-user-contact-form-builder');

            case 'LABEL_ERROR':
                return __("ERROR", 'custom-user-contact-form-builder');

            case 'LABEL_CLICK_HERE':
                return __("Click Here", 'custom-user-contact-form-builder');

            case 'LABEL_REGISTER':
                return __("Register", 'custom-user-contact-form-builder');

            case 'LABEL_FLOATING_ICON_BCK_COLOR':
                return __("Floating Icon Background Color", 'custom-user-contact-form-builder');

            case 'LABEL_SHOW_FLOATING_ICON':
                return __("Show Magic Pop-up Button, Menu and Panels", 'custom-user-contact-form-builder');

            case 'HELP_SHOW_FLOATING_ICON':
                return __("Makes it easier to let your users to sign in, register and access their data WITHOUT going through process of setting up shortcodes and custom menu links!", 'custom-user-contact-form-builder');

            case 'HELP_FLOATING_ICON_BCK_COLOR':
                return __("Define accent of the front end buttons and panels. Match it to your theme or contrast it for better visibility. This can be edited live by visiting the front end!", 'custom-user-contact-form-builder');

            case 'LABEL_ICON':
                return __("Icon", 'custom-user-contact-form-builder');

            case 'LABEL_TEXT':
                return __("Text", 'custom-user-contact-form-builder');

            case 'LABEL_BOTH':
                return __("Both", 'custom-user-contact-form-builder');

            case 'LABEL_SHOW_FLOATING_BUTTON_AS':
                return __("Show floating button as", 'custom-user-contact-form-builder');

            case 'HELP_SHOW_FLOATING_BUTTON_AS':
                return __("", 'custom-user-contact-form-builder');

            case 'LABEL_FLOATING_BUTTON_TEXT':
                return __("Floating Button Text", 'custom-user-contact-form-builder');

            case 'HELP_FLOATING_BUTTON_TEXT':
                return __("", 'custom-user-contact-form-builder');

            case 'ADMIN_MENU_FRONTEND':
                return __("Frontend", 'custom-user-contact-form-builder');

            case 'NO_DEFAULT_FORM':
                return __("No Submission form is selected.<br/>(Click on the star on form card to select)", 'custom-user-contact-form-builder');

            case 'LABEL_SHOW_FLOATING_BUTTON_AS':
                return __("Both", 'custom-user-contact-form-builder');


            case 'LABEL_FORM_EXPIRED':
                return __("Expired", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_ON':
                return __("Expires on", 'custom-user-contact-form-builder');

            case 'LABEL_FORM_EXPIRES_IN':
                return __("Expires in %d days", 'custom-user-contact-form-builder');

            case 'LABEL_HELP_TEXT':
                return __("Help text", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FIELD_HELP_TEXT':
                return __("It will be shown alongside the field, can be used as a guiding text for user.", 'custom-user-contact-form-builder');


            case 'LABEL_PW_RESTS_PWR_NUM':
                return __("Must contain numeral", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_SC':
                return __("Must contain special character", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MINLEN':
                return __("Minimum length", 'custom-user-contact-form-builder');

            case 'ERR_TITLE_CSTM_PW':
                return __("Error: Password must follow these rules:", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MINLEN_ERR':
                return __("Must not be shorter than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_MAXLEN_ERR':
                return __("Must not be longer than %d characters", 'custom-user-contact-form-builder');

            case 'LABEL_PW_RESTS_PWR_MAXLEN':
                return __("Maximum length", 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_CUSTOM_PW_RESTS':
                return __("Force custom rules for password that user choose during registration. Does not appy on auto-generated passwords.", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_CB':
                return __("Enable date based form access control", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_CB':
                return __("Enable passphrase based form access control", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_ROLE_CB':
                return __("Enable user role based form access control", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_DATE':
                return __("User will be asked to input a date before accessing form. Useful for setting age based restrictions.", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_PASS':
                return __("User need to enter a passphrase before accessing form", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_ROLE':
                return __("Only users with specified roles will be able to view form", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_QUESTION':
                return __("Question for asking date", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_QUESTION':
                return __("Question for asking passphrase", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_QUESTION_DEF':
                return __("Enter your date of birth", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_QUESTION_DEF':
                return __("Enter the secret code", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_DATE_QSTN':
                return __("This question will be asked to user for entering a date", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_PASS_QSTN':
                return __("This question will be asked to user for entering passphrase", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_TYPE':
                return __("Limit type", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_LLIMIT':
                return __("Lower limit", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_ULIMIT':
                return __("Upper limit", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_TYPE_DIFF':
                return __("Age limit", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_DATE_TYPE_DATE':
                return __("Absolute dates", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_DATE_TYPE':
                return __("Type of the limits. User entered date must fall into the given date range or age range.", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_ROLE_ROLES':
                return __("Only users with these roles will be able to access form", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_ROLE_ROLES':
                return __("Select User Roles", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_PASS_PASS':
                return __("Passphrase", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_PASS_PASS':
                return __("The passphrase/secret code that user must enter to access the form", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_DATE_TYPE':
                return __("Invalid date limit type.", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_DATE_LIMIT':
                return __("Atleast one limit must be input", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_PASS_PASS':
                return __("Passphrase can not be empty", 'custom-user-contact-form-builder');

            case 'MSG_INVALID_ACTRL_ROLES':
                return __("No user-roles selected.", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_FAIL_MSG':
                return __("Denial message", 'custom-user-contact-form-builder');

            case 'HELP_FORM_ACTRL_FAIL_MSG':
                return __("If user is not authorised to access the form this message will be displayed in place of form.", 'custom-user-contact-form-builder');

            case 'LABEL_ACTRL_FAIL_MSG_DEF':
                return __("Sorry, you are not authorised to access this content.", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_CHANGE':
                return __("Change", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON':
                return __("Icon", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON':
                return __("Select a custom icon to be shown beside the field", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_FG_COLOR':
                return __("Icon color", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON_FG_COLOR':
                return __("Foreground color of the icon", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_BG_COLOR':
                return __("Background color", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON_BG_COLOR':
                return __("Background color of the icon", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_SHAPE':
                return __("Shape", 'custom-user-contact-form-builder');

            case 'LABEL_FIELD_ICON_CLOSE':
                return __("Close", 'custom-user-contact-form-builder');

            case 'HELP_FIELD_ICON_SHAPE':
                return __("Icon will be masked by this shape", 'custom-user-contact-form-builder');

            case 'FIELD_ICON_SHAPE_SQUARE':
                return __("Square", 'custom-user-contact-form-builder');

            case 'FIELD_ICON_SHAPE_ROUND':
                return __("Round", 'custom-user-contact-form-builder');

            case 'FIELD_ICON_SHAPE_STICKER':
                return __("Sticker", 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_PASSWORD':
                return __("Password", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_NICKNAME':
                return __("Nick Name", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_WEBSITE':
                return __("Website", 'custom-user-contact-form-builder');
            case 'WEBSITE_ERROR':
                return __("Incorrect Format of Website Url", 'custom-user-contact-form-builder');
            case 'HELP_ADD_FIELD_IS_SHOW_ASTERIX':
                return __("Show a astrix on the field label.", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_PHONE':
                return __("Phone Number", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_BDATE':
                return __("Birth Date", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SEMAIL':
                return __("Secondary email", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_GENDER':
                return __("Gender", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_LANGUAGE':
                return __("Language", 'custom-user-contact-form-builder');
            case 'LABEL_SECEMAIL':
                return __("Secondary Email", 'custom-user-contact-form-builder');

            case 'FIELD_TYPE_TIME':
                return __("Time", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_IMAGE':
                return __("Image upload", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_MOBILE':
                return __("Mobile Number", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SHORTCODE':
                return __("Shortcode", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_DIVIDER':
                return __("Divider", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_SPACING':
                return __("Spacing", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_MULTI_DROP_DOWN':
                return __("Multi-Dropdown", 'custom-user-contact-form-builder');
            case 'MOBILE_ERROR':
                return __("Incorrect Format of Mobile Number", 'custom-user-contact-form-builder');
            case 'LABEL_TIME_ZONE':
                return __("Timezone", 'custom-user-contact-form-builder');
            case 'HELP_ADD_FIELD_TIME_ZONE':
                return __("Timezone for the field.", 'custom-user-contact-form-builder');
            case 'LABEL_SHORTCODE_TEXT':
                return __("Shortcodes", 'custom-user-contact-form-builder');
            case 'HELP_ADD_FIELD_SHORTCODE_TEXT':
                return __("Enter shortcodes that will appear on the form.", 'custom-user-contact-form-builder');
            case 'FIELD_TYPE_WEBSITE':
                return __("Website", 'custom-user-contact-form-builder');
            case 'WEBSITE_ERROR':
                return __("Incorrect Format of Website Url", 'custom-user-contact-form-builder');
            case 'HELP_ADD_FIELD_IS_SHOW_ASTERIX':
                return __("Show a astrix on the field label.", 'custom-user-contact-form-builder');
            case 'LABEL_IS_SHOW_ASTERIX':
                return __("Show Asterix", 'custom-user-contact-form-builder');

            case 'MSG_PLEASE_LOGIN_FIRST':
                return __("Please login to view this page.", 'custom-user-contact-form-builder');

            case 'INFO_USERS_SELECTED_FOR_MAIL':
                return __('This Message will be sent to  <b>%d users</b> who have filled the form ', 'custom-user-contact-form-builder');

            case 'LABEL_AUTO_LOGIN':
                return __("Automatically log in user after registration", 'custom-user-contact-form-builder');

            case 'HELP_ADD_FORM_AUTO_LOGIN':
                return __("User will be logged in automatically on next page refresh after successfull account creation. You may set up auto-redirect after submission. Note that it will work only if auto-approval is enabled.", 'custom-user-contact-form-builder');

            case 'TITLE_EDIT_NOTE_PAGE':
                return __("Edit Note", 'custom-user-contact-form-builder');

            case 'TITLE_EDIT_NOTE_PAGE':
                return __("New Note", 'custom-user-contact-form-builder');

           
            case 'FIELD_HELP_TEXT_Textbox':
                return __('Simple single line text field.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_HTMLP':
                return __('This is a read only field which can be used to display formatted content inside the form. HTML is supported.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_HTMLH':
                return __('Large size read only text useful for creating custom headings.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Select':
                return __('Allows user to choose a value from multiple predefined options displayed as drop down list.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Radio':
                return __('Allows user to choose a value from multiple predefined options displayed as radio boxes.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Textarea':
                return __('This allows user to input multiple lines of text as value.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Checkbox':
                return __('Allows user to choose more than one value from multiple predefined options displayed as checkboxes.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_jQueryUIDate':
                return __('Allows users to pick a date from graphical calendar or enter manually.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Email':
                return __('An additional email field. Please note, primary email field always appears in the form and cannot be removed.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Number':
                return __('Allows user to input value in numbers.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Country':
                return __('A drop down list of all countries appears to the user for selection.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Timezone':
                return __('A drop down list of all time-zones appears to the user for selection.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Terms':
                return __('Useful for adding terms and conditions to the form. User must select the check box to continue with submission if you select “Is Required” below.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_File':
                return __('Display a field to the user for attaching files from his/ her computer to the form.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Price':
                return __('Adds payment to the form. Payment fields are separately defined in “Price Fields” section of GorillaForms. This field type allows you to insert one of the fields defined there.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Repeatable':
                return __('Allows user to add extra text field boxes to the form for submitting different values. Useful where a field requires multiple user input  values. ', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Map':
                return __('Displays a Map on the form with ability to search and mark an address.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Address':
                return __('Adds field set for entering an address with Google Geolocation autocomplete support', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Fname':
                return __('This field is connected directly to WordPress’ User area First Name field. ', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Lname':
                return __('This field is connected directly to WordPress’ User area Last Name field. ', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_BInfo':
                return __('This field is connected directly to WordPress’ User area Bio field. It allows inserting multiple lines of text. ', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Phone':
                return __('Adds a phone number field.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Mobile':
                return __('Adds a Mobile number field', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Password':
                return __('Add a field that masks entered value like password.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Nickname':
                return __('A Nickname field bound to WordPress’ default User field with same name.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Bdate':
                return __('A speciality date field that records date of birth', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_SecEmail':
                return __('A secondary email field, it will displayed on the user profile page.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Gender':
                return __('Gender/ Sex selection radio box', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Language':
                return __('Adds a drop down language selection field with common languages as options', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Facebook':
                return __('A speciality URL field for asking Facebook Profile page', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Twitter':
                return __('A speciality URL field for asking Twitter page', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Google':
                return __('A speciality URL field for asking Google+ Profile page', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Linked':
                return __('A speciality URL field for asking LinkedIn Profile page', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Youtube':
                return __('A speciality URL field for asking YouTube Channel or Video page', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_VKontacte':
                return __('A speciality URL field for asking VKontacte page', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Instagram':
                return __('Asks User his/ her Instagram Profile', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Skype':
                return __('Asks User his/ her Skype ID', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_SoundCloud':
                return __('A speciality URL field for asking SoundClound URL', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Time':
                return __('A field for entering time', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Image':
                return __('A speciality file upload field optimized for image upload', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Shortcode':
                return __('You can use this field to enter a WordPress plugin shortcode. ShortCode will be parsed and rendered automatically inside the form.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Divider':
                return __('Divider for separating fields.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Spacing':
                return __('Useful for adding space between fields', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Multi-Dropdown':
                return __('A dropdown field with a twist. Users can now select more than one option.', 'custom-user-contact-form-builder');

            case 'LABEL_FORM_PRESENTATION':
                return __("Edit Form Presentation", 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Rating':
                return __('A rating field asking users to rate something. It displays a stars that can be clicked from 1 star to 5 stars.', 'custom-user-contact-form-builder');

            case 'FIELD_HELP_TEXT_Website':
                return __('A website URL field bound to WordPress’ default User field with same name.', 'custom-user-contact-form-builder');
            ////////////////

            case 'LABEL_ADD_NEW_PRICE_FIELD':
                return __("New Field", 'custom-user-contact-form-builder');

            case 'MULTIPAGE_DEGRADE_WARNING':
                return __('This is a multi-page form created with Gold edition. Editing this form in this edition might cause issues!', 'custom-user-contact-form-builder');

            case 'LABEL_WELCOME':
                return __("Welcome", 'custom-user-contact-form-builder');

            case 'LABEL_SWITCH':
                return __("Switch", 'custom-user-contact-form-builder');

            case 'LABEL_LIGHT':
                return __("Light", 'custom-user-contact-form-builder');

            case 'LABEL_DARK':
                return __("Dark", 'custom-user-contact-form-builder');
                
            case 'DISCLAIMER_FORM_VIEW_SETTING':
                return __("<b>Note: This is not a 100% accurate representation of how the form will appear on the front end.<br>Front end presentation is influenced by multiple factors including your theme’s CSS.</b>", 'custom-user-contact-form-builder');
                
            case 'LABEL_F_FIELDS':
                return __("Custom Fields", 'custom-user-contact-form-builder');
                
            case 'LABEL_F_FIELDS_DESC':
                return __("Add, edit or modify various custom fields in this form", 'custom-user-contact-form-builder');

            case 'LABEL_IMPORT':
                return __("Import", 'custom-user-contact-form-builder');
                  
            case 'FIELD_TYPE_CUSTOM':
                return __("Custom field", 'custom-user-contact-form-builder');
            case 'LABEL_CONSTANT_CONTACT_OPTION':
                return __("Constant Contact ", 'custom-user-contact-form-builder');
                 
            case 'LABEL_F_ACTRL_CC_DESC':
                return __(" Constant Contact Integration with advanced field mapping.(Available in Gold bundle)", 'custom-user-contact-form-builder');
            case 'LABEL_AWEBER_OPTION':
                return __("Aweber", 'custom-user-contact-form-builder');  
                
            case 'LABEL_AWEBER_OPTION_INTEGRATION':
                return __("Aweber Integration", 'custom-user-contact-form-builder');  
            
            case 'LABEL_CONSTANT_CONTACT_OPTION_INTEGRATION':
                return __("Constant Contact Integration", 'custom-user-contact-form-builder');  
            
            case 'LABEL_EXPORT':
                return __("Export", 'custom-user-contact-form-builder');
                
            case 'UPLOAD_XML':
                return __("Upload Gorilla.xml ", 'custom-user-contact-form-builder');
                
            case 'UPLOAD_XML_HELP':
                return __("Upload the Gorilla.xml file to import all the form data.", 'custom-user-contact-form-builder');

            case 'CC_ERROR':
                return __("<div class='cmnotice'>Oops!! Something went wrong.<ul><li>Possible causes:-</li><li>Couldn't access your  constant contact account with the details you have provided in Gloabal settings->External Integrations.</li><li>You have not created any list in your constant contact account.</li></ul></div>", 'custom-user-contact-form-builder');

            case 'AW_ERROR':
                 return __("<div class='cmnotice'>Oops!! Something went wrong.<ul><li>Possible causes:-</li><li>Couldn't access your  aweber account with the details you have provided in Gloabal settings->External Integrations.</li><li>You have not created any list in your aweber account.</li></ul></div>", 'custom-user-contact-form-builder');

             case 'MC_ERROR':
                return __("<div class='cmnotice'>Oops!! Something went wrong.<ul><li>Possible causes:-</li><li>Couldn't access your  mailchimp account with the details you have provided in Gloabal settings->External Integrations.</li><li>You have not created any list in your mailchimp account.</li></ul></div>", 'custom-user-contact-form-builder');
            case 'MC_ERROR':
                return __("<div class='cmnotice'>Oops!! Something went wrong.<ul><li>Possible causes:-</li><li>Couldn't access your  mailchimp account with the details you have provided in Gloabal settings->External Integrations.</li><li>You have not created any list in your mailchimp account.</li></ul></div>", 'custom-user-contact-form-builder');
             
             case 'CM_ERROR_EXTENSION_CURL_CC':
                return __("PHP extension CURL is not enabled on server.So Constant Contact will not work.", 'custom-user-contact-form-builder');
                
             case 'CM_ERROR_PHP_4.5':
                return __("Constant Contact requires PHP version 5.4+.Please upgrade your php version to use constant contact", 'custom-user-contact-form-builder');
            
            case 'LABEL_F_ACTRL_AW_DESC':
                return __("Aweber Integration with basic field mapping.(Available in Gold bundle.)", 'custom-user-contact-form-builder');
            
            case 'LABEL_SHOW_PROG_BAR':
                return __("Show expiry countdown above the form?", 'custom-user-contact-form-builder');
           
            case 'HELP_OPTIONS_GEN_PROGRESS_BAR_GOLD':
                return __("Shows form expiry status above the form when auto-expiry is turned on.(Available in Gold bundle)", 'custom-user-contact-form-builder');
                
            case 'LABEL_YES':
                return __("Yes", 'custom-user-contact-form-builder');
 
            case 'LABEL_NO':
                return __("No", 'custom-user-contact-form-builder');
                 
            case 'LABEL_DEFAULT':
                return __("Default", 'custom-user-contact-form-builder');
                 
            case 'LABEL_SUB_LIMIT_ANTISPAM_HELP_GOLD':
                return __("Default", 'custom-user-contact-form-builder');
                  
            case 'LABEL_SUB_LIMIT_ANTISPAM_HELP_GOLD':
                return __("Limits how many times a form can be submitted from a device within a day. Helpful to prevent spams. Set it to zero(0) to disable this feature.(Part of GOLD Bundle)", 'custom-user-contact-form-builder');
                       
            case 'PART_GOLD':
                return __("Part of GOLD Bundle", 'custom-user-contact-form-builder');
                
            case 'LABEL_AW_LIST':
            return __("Select Aweber list.", 'custom-user-contact-form-builder');
                
            case 'HELP_ADD_FORM_AW_LIST':
            return __("Select the Aweber list in which you want add subscribers.", 'custom-user-contact-form-builder');
                
            case 'HELP_ADD_FIELD_FIELD':
            return __("Map you Aweber field with form field.", 'custom-user-contact-form-builder');
                
            case 'HELP_OPT_IN_CB_AW':
            return __("This will add a checkbox to form for subscribe aweber.", 'custom-user-contact-form-builder');
                
            case 'HELP_ADD_FIELD_CC':
                return __("This will map the selected field to the corresponding constant contact field.", 'custom-user-contact-form-builder');
                
            case 'LABEL_CC_LIST':
                return __("Constant contact list", 'custom-user-contact-form-builder');  
                
            case 'HELP_ADD_FORM_CC_LIST':
                return __("Select a Constant contact list", 'custom-user-contact-form-builder'); 
            
            case 'LABEL_T_AND_C_CB_LABEL':
                return __("Checkbox label", 'custom-user-contact-form-builder');            
                
            case 'HELP_ADD_FIELD_TnC_CB_LABEL':
                return __("This will appear along with the checkbox. You might want to set it up to something like &quot;I accept&quot;", 'custom-user-contact-form-builder');            
            
            case 'LABEL_SOCIAL_FIELDS':
                return __('Social Fields', 'custom-user-contact-form-builder'); 
            
            case 'LABEL_MNAME':
                return __("Middle Name", 'custom-user-contact-form-builder');
                
            case 'LABEL_COMPANY':
                return __("Company Name", 'custom-user-contact-form-builder');
                
            case 'LABEL_JOB_TILE':
                return __("Job Title", 'custom-user-contact-form-builder');
                
            case 'LABEL_WORK_PHONE':
                return __("Work Phone", 'custom-user-contact-form-builder');
                
            case 'LABEL_CELL_PHONE':
                return __("Cell Phone", 'custom-user-contact-form-builder');
                
            case 'LABEL_HOME_PHONE':
                return __("Home Phone", 'custom-user-contact-form-builder');
                
            case 'LABEL_FAX':
                return __("Fax", 'custom-user-contact-form-builder');
                
            case 'LABEL_ADDRESS':
                return __("Address", 'custom-user-contact-form-builder');
                
            case 'LABEL_CREATED_DATE':
                return __("Created date", 'custom-user-contact-form-builder');  
                
            case 'HELP_OPT_IN_CB_CC':
                return __("This option will allow user to choose for Constant contact subscription.", 'custom-user-contact-form-builder');
                
            case 'ADMIN_MENU_SETTING_FAB_PT':
                 return __("Magic Popup Button Setting", 'custom-user-contact-form-builder');
                
            case 'GLOBAL_SETTINGS_FAB':
                 return __("Magic Popup Button", 'custom-user-contact-form-builder');
                
            case 'GLOBAL_SETTINGS_FAB_EXCERPT':
                 return __("One button to rule them all!", 'custom-user-contact-form-builder');
                
            case 'LABEL_SELECT_FORM_TYPE':
                 return __("Select Form Type", 'custom-user-contact-form-builder');
                
            case 'LABEL_REG_FORM':
                 return __("WP Submission Form", 'custom-user-contact-form-builder');
                
            case 'LABEL_NON_REG_FORM':
                 return __("Non-WP Submission Form", 'custom-user-contact-form-builder');
                
            case 'HELP_SELECT_FORM_TYPE_REG':
                 return __("For those who want to create WP User accounts after form submission or Manual Approval.", 'custom-user-contact-form-builder');
                
            case 'HELP_SELECT_FORM_TYPE_NON_REG':
                 return __("For those who do not want to create WP User accounts with form submissions. Ideal for offline registration processes or using this form as simple contact/enquiry form.", 'custom-user-contact-form-builder');
                
            case 'LABEL_POST_EXP_ACTION':
                 return __("Post Expiry Action", 'custom-user-contact-form-builder');
                
            case 'HELP_POST_EXP_ACTION':
                 return __("Select action to perform after this form expires", 'custom-user-contact-form-builder');
                
            case 'LABEL_DISPLAY_MSG':
                 return __("Display a message", 'custom-user-contact-form-builder');
                
            case 'LABEL_SWITCH_FORM':
                 return __("Display another form", 'custom-user-contact-form-builder');
                
            case 'LABEL_SELECT_FORM':
                 return __("Select form", 'custom-user-contact-form-builder');
                
            case 'HELP_POST_EXP_FORM':
                 return __("This form will be displayed to user in place of the expired form.", 'custom-user-contact-form-builder');

            case 'LABEL_FAB_ICON':
                 return __("Icon On Magic Popup Button", 'custom-user-contact-form-builder');
 
            case 'LABEL_FAB_ICON_BTN':
                 return __("Select", 'custom-user-contact-form-builder');
 
            case 'TEXT_FAB_ICON_HELP':
                 return __("Display an image on Magic Popup Button instead of the default icon.", 'custom-user-contact-form-builder');
                
            case 'LABEL_HIDE_PREV_BUTTON':
                 return __("Do not show &quot;Previous&quot; button", 'custom-user-contact-form-builder');
                
            case 'HELP_HIDE_PREV_BUTTON':
                 return __("Enabling this will remove previous button from multi-page forms, thus prohibiting user from navigating back to already filled pages without reloading the form.", 'custom-user-contact-form-builder');
                
            case 'LABEL_IS_PAID_ROLE':
                 return __("Is paid role", 'custom-user-contact-form-builder');
                
        
            case 'HELP_IS_PAID_ROLE':
                return __("User will be charged for this role.(Make sure that you have configured payment option in Global Settings->Payments)", 'custom-user-contact-form-builder');

            case 'LABEL_ROLE_PRICE':
                return __("Role Charges", 'custom-user-contact-form-builder');

            case 'HELP_ROLE_PRICE':
                return __("This charge will be added to the form and user redirected to the payment when this role is auto assigned to the form.", 'custom-user-contact-form-builder');

            case 'LABEL_FAB_ICON_BTN_REM':
                 return __("Remove", 'custom-user-contact-form-builder');
                
            case 'TEXT_FROM':
                 return __("From", 'custom-user-contact-form-builder');
                
            case 'NOTE_MAGIC_PANEL_STYLING':
                return __("Magic Panels can be styled by logging in as admin and visiting site front end.", 'custom-user-contact-form-builder');
                
            case 'MSG_LOGIN_SUCCESS':
                return __("You have logged in successfully.",'custom-user-contact-form-builder');
                return __("Magic Panels can be styled by logging in as admin and visiting site front end.", 'custom-user-contact-form-builder');
            
            case 'LABEL_SUBMISSION_ON_CARD':
                 return __('Submission badge count on form card', 'custom-user-contact-form-builder');  
             
             case 'HELP_SUBMISSION_ON_CARD':
                 return __('The number on form card badge will count based on this criteria.', 'custom-user-contact-form-builder');  
           
            case 'USEREMAIL_EXISTS':
                return __("This user is already registered. Please try with different email.", 'custom-user-contact-form-builder');
    
            case 'LABEL_BLOCK_EMAIL':
                return __("Block Email", 'custom-user-contact-form-builder');    
                
            case 'LABEL_BLOCK_IP':
                return __("Block IP", 'custom-user-contact-form-builder'); 
           
            case 'LABEL_SHOW_FAB_LINK1':
                 return __("Custom Link #1", 'custom-user-contact-form-builder');
                
            case 'LABEL_SHOW_FAB_LINK2':
                 return __("Custom Link #2", 'custom-user-contact-form-builder');
            
             case 'LABEL_SHOW_FAB_LINK3':
                 return __("Custom Link #3", 'custom-user-contact-form-builder');
                 
            case 'HELP_SHO_FAB_LINK':
                 return __("Adds a custom link of your choice on the front-end Magic Popup menu.", 'custom-user-contact-form-builder');
            
            case 'LABEL_FAB_LINK_TYPE':
                 return __("Link Type", 'custom-user-contact-form-builder');
            
            case 'LABEL_VISIBILITY':
                 return __("Visible to", 'custom-user-contact-form-builder');
             
            case 'LABEL_FAB_URL_LABEL':
                 return __("Label of the URL", 'custom-user-contact-form-builder');
            
            case 'LABEL_SEND_MESSAGE':
                return __("Send Message", 'custom-user-contact-form-builder');    
           
            case 'LABEL_RELATED':
                return __("Related", 'custom-user-contact-form-builder');    
            
            case 'VALIDATION_REQUIRED':    
                return __("This field is required.", 'custom-user-contact-form-builder');
                
            case 'INVALID_EMAIL':    
                return __("Please enter a valid email address.", 'custom-user-contact-form-builder');
                
            case 'INVALID_URL':    
                return __("Please enter a valid URL.", 'custom-user-contact-form-builder');
                
            case 'INVALID_FORMAT':    
                return __("Invalid Format.", 'custom-user-contact-form-builder');
                
            case 'INVALID_NUMBER':    
                return __("Please enter a valid number.", 'custom-user-contact-form-builder'); 
                
            case 'INVALID_DIGITS':    
                return __("Please enter only digits.", 'custom-user-contact-form-builder');
                
            case 'LABEL_DEFAULT_STATE':    
                return __("Default State.", 'custom-user-contact-form-builder');
                
            case 'LABEL_CHECKED':    
                return __("Checked", 'custom-user-contact-form-builder');
                
            case 'LABEL_UNCHECKED':    
                return __("Unchecked", 'custom-user-contact-form-builder');
                
            case 'LABEL_UNREAD':
                return __("Unread", 'custom-user-contact-form-builder');
                
            case 'LABEL_IS_FIELD_EDITABLE':
                 return __("Allow users to edit this field after submission", 'custom-user-contact-form-builder');
            
            case 'HELP_LABEL_IS_FIELD_EDITABLE':
                 return __("If enabled user will be able to re-edit the value of this field after submission.", 'custom-user-contact-form-builder');
                
            case 'MSG_OPT_IN_DEFAULT_STATE':    
                return __("Default state of the opt in check box.", 'custom-user-contact-form-builder');

            case 'MSG_EDIT_SUBMISSION':    
                return __("Edit This Submission", 'custom-user-contact-form-builder');  
                
            case 'MSG_EDIT_YOUR_SUBMISSIONS':    
                return __("Edit Your Submissions", 'custom-user-contact-form-builder');  
                
            
            case 'LABEL_ALLOW_MULTILINE':    
                return __("Allow Multiline", 'custom-user-contact-form-builder');    

            case 'SUB_MESSAGE':
                return __("You've reached <span class='cm-submission-mark'>%d</span> submissions...", 'custom-user-contact-form-builder');    
            
            case 'USER_MESSAGE':
                return __("You've reached <span class='cm-submission-mark'>%d</span>  users on your website...", 'custom-user-contact-form-builder');    
            
            case 'REVIEW_MESSAGE_EVENT1':
                return __("You've reached <span class='cm-submission-mark'>10</span> submissions...", 'custom-user-contact-form-builder');    
            
            case 'REVIEW_MESSAGE_EVENT2':
                return __("You've reached <span class='cm-submission-mark'>10</span> users...", 'custom-user-contact-form-builder');    
            
            case 'REVIEW_MESSAGE_EVENT3':
                return __("You've reached <span class='cm-submission-mark'>100</span> submissions...", 'custom-user-contact-form-builder');    
            
            case 'REVIEW_MESSAGE_EVENT4':
                return __("You've reached <span class='cm-submission-mark'>100</span> users...", 'custom-user-contact-form-builder');    
            
            case 'REVIEW_MESSAGE_EVENT5':
                return __("You've reached <span class='cm-submission-mark'>1000</span> submissions...", 'custom-user-contact-form-builder');    
            
            case 'REVIEW_MESSAGE_EVENT6':
                return __("You've reached <span class='cm-submission-mark'>1000</span> users...", 'custom-user-contact-form-builder');    
            
            case 'LABEL_SHOW_ASTERIX':    
                return __("Show Asterisk on required fields", 'custom-user-contact-form-builder');
                
            case 'HELP_SHOW_ASTERIX':    
                return __("Show the red Asterisk(*) besides the label. Useful for marking required fields.", 'custom-user-contact-form-builder');
   
            case 'LABEL_SHOW_PAYMENT_TAB':    
                return __("Show payment tab.", 'custom-user-contact-form-builder');
                
            case 'LABEL_SHOW_SUBMISSION_TAB':    
                return __("Show submission tab", 'custom-user-contact-form-builder');
                
            case 'LABEL_SHOW_DETAILS_TAB':    
                return __("Show my details tab.", 'custom-user-contact-form-builder');
                
            case 'HELP_SHOW_SUBMISSION_TAB':    
                return __("This will show a tab on popup menu named Submissions.", 'custom-user-contact-form-builder');
                
            case 'HELP_SHOW_PAYMENT_TAB':    
                return __("This will show a tab on popup menu named Payments.", 'custom-user-contact-form-builder');
                
            case 'HELP_SHOW_DETAILS_TAB':    
                return __("This will show a tab on popup menu named My details.", 'custom-user-contact-form-builder');
            
            case 'LABEL_VISITS':
                 return __("Views", 'custom-user-contact-form-builder');
                
            case 'HELP_OPTIONS_THIRDPARTY_GP_CLIENT_ID':
                return __("To make Google+ login work, you’ll need an App ID. More information <a target='blank' class='cm_help_link' href='https://developers.google.com/identity/sign-in/web/devconsole-project'>here</a>.", 'custom-user-contact-form-builder');

            case 'LABEL_LOGIN_LINKEDIN_OPTION':
                return __('Allow User to Login using LinkedIn:', 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_LINKEDIN_ENABLE':
                return __("A login using LinkedIn button will appear alongside the login form.", 'custom-user-contact-form-builder');

            case 'LABEL_LIN_API_KEY':    
                return __("LinkedIn API Key", 'custom-user-contact-form-builder');
                
            case 'HELP_OPTIONS_THIRDPARTY_LIN_API_KEY':
                return __("To make LinkedIn login work, you’ll need an App ID. More information <a target='blank' class='cm_help_link' href='https://developer.linkedin.com/support/faq'>here</a>.", 'custom-user-contact-form-builder');

            case 'LABEL_LOGIN_WINDOWS_OPTION':
                return __('Allow User to Login using Windows', 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_WINDOWS_ENABLE':
                return __("A login using Windows button will appear alongside the login form.", 'custom-user-contact-form-builder');

            case 'LABEL_WIN_CLIENT_ID':    
                return __("Windows Client ID", 'custom-user-contact-form-builder');
                
            case 'HELP_OPTIONS_THIRDPARTY_WIN_CLIENT_ID':
                return __("To make Windows login work, you’ll need a Client ID. More information <a target='blank' class='cm_help_link' href='https://msdn.microsoft.com/en-in/library/bb676626.aspx'>here</a>.", 'custom-user-contact-form-builder');

            case 'FD_LABEL_ADD_NEW':
                return __("Add New", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_SWITCH_FORM':
                return __("Switch Form", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_PERMALINK':
                return __("Permalink", 'custom-user-contact-form-builder');
                
            case 'FD_MSG_HOW_FORM_DOING':
                return __("How's your form <b>doing?</b>", 'custom-user-contact-form-builder');
                
            case 'LABEL_INBOX':
                return __("Inbox", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_NOT_INSTALLED':
                return __("Not Installed", 'custom-user-contact-form-builder');
                
            case 'FD_MSG_LOOK_AND_FEEL':
                return __("<b>Look and Feel</b> of your form", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_DESIGN':
                return __("Design", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_FORM_FIELDS':
                return __("Pages and Fields", 'custom-user-contact-form-builder');
                
            case 'FD_THINGS_CAN_DO_WITH_FORM':
                return __("<b>Things you can do</b> with form data", 'custom-user-contact-form-builder');
                
            case 'FD_FINE_TUNE_FORM':
                return __("<b>Fine Tune</b> Your Form", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_LIMITED':
                return __("Limited", 'custom-user-contact-form-builder');
                
            case 'LABEL_F_OVERRIDES_SETT':
                return __("Global Overrides", 'custom-user-contact-form-builder');
                
            case 'FD_MULTISTEP_FORM':
                return __("Multi-Step Forms", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_COMINGSOON':
                return __("Coming Soon", 'custom-user-contact-form-builder');
                
            case 'FD_ADD_APPS_TO_FORM':
                return __("<b>Add Apps</b> To Your Form", 'custom-user-contact-form-builder');
                
            case 'NAME_CONSTANT_CONTACT':
                return __("Constant Contact", 'custom-user-contact-form-builder');
                
            case 'NAME_WOOCOMMERCE':
                return __("WooCommerce", 'custom-user-contact-form-builder');
                
            case 'FD_BADGE_NEW':
                return __("New", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_VIEW_ALL':
                return __("View All", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_FORM_SHORTCODE':
                return __("Shortcode", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_COPY':
                return __("Copy", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_FORM_VISIBILITY':
                return __("Visibility", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_FORM_CREATED_ON':
                return __("Created On", 'custom-user-contact-form-builder');
                
            case 'FD_FORM_PAGES':
                return __("Pages", 'custom-user-contact-form-builder');
                
            case 'FD_FORM_SUBMIT_BTN_LABEL':
                return __("Submit Label", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_VISITORS':
                return __("Visitors", 'custom-user-contact-form-builder');
                
            case 'FD_DOWNLOAD_REGISTRATIONS':
                return __("Download Records", 'custom-user-contact-form-builder');
                
            case 'FD_AVG_TIME':
                return __("Avg. Time", 'custom-user-contact-form-builder');
                
            case 'FD_AUTORESPONDER':
                return __("Auto-Responder", 'custom-user-contact-form-builder');
                
            case 'FD_WP_REG':
                return __("WP Submissions", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_REDIRECTION':
                return __("Redirection", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_AUTO_APPROVAL':
                return __("Auto Approval", 'custom-user-contact-form-builder');
                
            case 'FD_ISSUE_SUB_TOKEN':
                return __("Issue Token No", 'custom-user-contact-form-builder');
                
            case 'NAME_RECAPTCHA':
                return __("reCAPTCHA", 'custom-user-contact-form-builder');
                
            case 'FD_FORM_TOGGLE_PH':
                return __("Select a Form", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_STATS':
                return __("Stats", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_STATUS':
                return __("Status", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_CONTENT':
                return __("Content", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_QCK_TOGGLE':
                return __("Quick Toggles", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_PUBLIC':
                return __("Public", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_RESTRICTED':
                return __("Limited", 'custom-user-contact-form-builder');
            case 'LABEL_LOGIN_TWITTER_OPTION':
                return __('Allow User to Login using Twitter:', 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_TWITTER_ENABLE':
                return __("A login using Twitter button will appear alongside the login form.", 'custom-user-contact-form-builder');

            case 'LABEL_TW_CONSUMER_KEY':    
                return __("Twitter Consumer Key", 'custom-user-contact-form-builder');    
            
            case 'LABEL_TW_CONSUMER_SEC':    
                return __("Twitter Consumer Secret", 'custom-user-contact-form-builder');    
            
            case 'HELP_OPTIONS_THIRDPARTY_TW_CONSUMER_KEY':    
                return __("To make Twitter login work, you’ll need a Client ID. More information <a target='blank' class='cm_help_link' href='https://apps.twitter.com/'>here</a>.", 'custom-user-contact-form-builder');    
            
            case 'HELP_OPTIONS_THIRDPARTY_TW_CONSUMER_SEC':    
                return __("To make Twitter login work, you’ll need a Client ID. More information <a target='blank' class='cm_help_link' href='https://apps.twitter.com/'>here</a>.", 'custom-user-contact-form-builder');    
                
            
            case 'LABEL_LOGIN_INSTAGRAM_OPTION':
                return __('Allow User to Login using Instagram', 'custom-user-contact-form-builder');

            case 'HELP_OPTIONS_THIRDPARTY_INSTAGRAM_ENABLE':
                return __("A login using Instagram button will appear alongside the login form.", 'custom-user-contact-form-builder');

            case 'LABEL_INS_CLIENT_ID':    
                return __("Instagram Client ID", 'custom-user-contact-form-builder');
                
            case 'HELP_OPTIONS_THIRDPARTY_INS_CLIENT_ID':
                return __("To make Instagram login work, you’ll need a Client ID. More information <a target='blank' class='cm_help_link' href='https://www.instagram.com/developer/authentication/'>here</a>.", 'custom-user-contact-form-builder');

            case 'LABEL_MARK_ALL_READ':    
                return __("Mark all read", 'custom-user-contact-form-builder');

            case 'LABEL_SUBS_OVER_TIME':    
                return __("Submissions over time", 'custom-user-contact-form-builder');    
                
            case 'STAT_TIME_RANGES':    
                return __("Last %d days", 'custom-user-contact-form-builder');    
                
            case 'LABEL_SELECT_TIMERANGE':    
                return __("Show data for", 'custom-user-contact-form-builder');        
                
            case 'LABEL_F_GLOBAL_OVERRIDE_SETT':    
                return __("Global Overrides", 'custom-user-contact-form-builder');
                
            case 'MSG_NO_SUBMISSION_FD':
                return __('No Submissions for this form yet.<br>Once submissions start coming, this area will show the latest submissions.', 'custom-user-contact-form-builder');
                 
             case 'STAT_TIME_RANGES':    
                 return __("Last %d days", 'custom-user-contact-form-builder');    
                 
             case 'LABEL_SELECT_TIMERANGE':    
                 return __("Show data for", 'custom-user-contact-form-builder');
            
            case 'LABEL_ADD_DEFAULT_FORM':    
                return __("Add Default Form", 'custom-user-contact-form-builder');
                
            case 'LABEL_CHANGE_DEFAULT_FORM':    
                return __("Change Default Form", 'custom-user-contact-form-builder');
    
            case 'LABEL_NO_DEFAULT_FORM':    
                return __("", 'custom-user-contact-form-builder');
                
            case 'FD_LABEL_F_FIELDS':    
                return __("Fields", 'custom-user-contact-form-builder');
                
            case 'GLOBAL_OVERRIDES_NOTE':
                return __('Global Overrides provide an easy way for power users to override default Global Settings on individual forms. Once you have turned on the override, corresponding Global Setting values will have no effect on this form. ', 'custom-user-contact-form-builder');
                
            case 'NO_EMBED_CODE':    
                return __("Embed Code not available.", 'custom-user-contact-form-builder');
                
            case 'FD_BASIC_DASHBOARD':    
                return __("<b>Dashboard</b>", 'custom-user-contact-form-builder');
                
            case 'FD_TOGGLE_TOOLTIP':    
                return __("To toggle this setting you need to configure it first. <a href='%s'>Click here </a>to configure now.</span>", 'custom-user-contact-form-builder');
                
            case 'DASHBOARD_WIDGET_TABLE_CAPTION':    
                return __("Latest Submissions", 'custom-user-contact-form-builder');
                
            case 'TITLE_SENT_EMAILS_MANAGER':
                 return __('Sent Emails', 'custom-user-contact-form-builder');
             
             case 'MSG_NO_SENT_EMAILS_MAN':
                 return __('No sent emails yet.', 'custom-user-contact-form-builder');
                 
             case 'MSG_NO_SENT_EMAILS_USER':
                 return __('No email has been sent to this user yet.', 'custom-user-contact-form-builder');    
                 
             case 'LABEL_EMAIL_TO':
                 return __('To', 'custom-user-contact-form-builder');
                 
             case 'LABEL_EMAIL_SUB':
                 return __('Subject', 'custom-user-contact-form-builder');
                 
             case 'LABEL_EMAIL_BODY':
                 return __('Content', 'custom-user-contact-form-builder');
                 
             case 'LABEL_EMAIL_SENT_ON':
                 return __('Sent on', 'custom-user-contact-form-builder');
             
             case 'ADMIN_MENU_SENT_MAILS':
                 return __('Sent Emails', 'custom-user-contact-form-builder');
             
             case 'LABEL_SENT_EMAILS':
                 return __('Sent Emails', 'custom-user-contact-form-builder');
             
             case 'MSG_INVALID_SENT_EMAIL_ID':
                 return __('Invalid sent email id', 'custom-user-contact-form-builder');
                 
             case 'SEND_MAIL':
                 return __('Send a new email', 'custom-user-contact-form-builder');
                 
             case 'MSG_NO_REGISTERED_USERS':
                 return __('No Users are registered yet.', 'custom-user-contact-form-builder');
                 
             case 'MSG_NO_SENT_EMAIL_USER':
                 return __('No email sent yet', 'custom-user-contact-form-builder');   
             
             case 'MSG_NO_SENT_EMAIL_MATCHED':
                return __('No sent email matched your search.', 'custom-user-contact-form-builder');
                 
             case 'MSG_NO_SENT_EMAIL_INTERVAL':
                return __('No email sent during the period.', 'custom-user-contact-form-builder');
            
             case 'CM_SUB_LEFT_CAPTION' : 
                return __ ('%s submission slots remain', 'custom-user-contact-form-builder');
                 
             case 'MAIL_REGISTRAR_DEF_BODY' : 
                return __ ('Thank you for submission.', 'custom-user-contact-form-builder');
                 
             case 'LABEL_TOUR' : 
                return __ ('Tour', 'custom-user-contact-form-builder');
                 
             case 'INVALID_MAXLEN' : 
                return __ ('Please enter no more than {0} characters.', 'custom-user-contact-form-builder');
                 
             case 'INVALID_MINLEN' : 
                return __ ('Please enter at least {0} characters.', 'custom-user-contact-form-builder');
                 
             case 'INVALID_MAX' : 
                return __ ('Please enter a value less than or equal to {0}.', 'custom-user-contact-form-builder');
                 
             case 'INVALID_MIN' : 
                return __ ('Please enter a value greater than or equal to {0}', 'custom-user-contact-form-builder');


            default:
                return __('NO STRING FOUND', 'custom-user-contact-form-builder');

        }
    }

}

