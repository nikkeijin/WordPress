<?php

/*

##################################################

Change Email Recipient Based On Subject

*/

function changeRecipientBasedOnSubject($contact_form)
{

    $submission = WPCF7_Submission::get_instance();
    $posted_data = $submission->get_posted_data();

    $recipient_email = 'a@a.com';

    if (in_array('General', $posted_data['your-subject'])) $recipient_email = 'x@a.com';    
    if (in_array('Media', $posted_data['your-subject'])) $recipient_email = 'y@a.com';
    if (in_array('Jobs', $posted_data['your-subject'])) $recipient_email = 'z@a.com';

    $mailProp = $contact_form->get_properties('mail');
    $mailProp['mail']['recipient'] = $recipient_email;

    $contact_form->set_properties(array('mail' => $mailProp['mail']));

}
add_action('wpcf7_before_send_mail', 'changeRecipientBasedOnSubject');
