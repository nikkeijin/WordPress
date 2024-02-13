<?php

/*

##################################################

Hide MW WP Form editor from pages menu

*/

function disable_visual_editor_in_page()
{
    global $typenow;
    if(in_array($typenow, array('page' ,'mw-wp-form'))){
            add_filter('user_can_richedit', 'disable_visual_editor_filter');
    }
}

function disable_visual_editor_filter()
{
    return false;
}

add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');


/*

##################################################

Change columns name

*/

/**
 * @param  array $columns (columns array)
 * @return array
 */
function my_mwform_inquiry_data_columns($columns)
{
    $columns['the_name'] = 'The Name';
    return $columns;
}
add_filter( 'mwform_inquiry_data_columns-mwf_XXX', 'my_mwform_inquiry_data_columns' );


/*

##################################################

Save emails informations to database only

*/

/**
 * @param  Mail  $Mail  (mail object)
 * @param  Array  $values  (data)
 * @param  MW_WP_Form_Data $data
 * @return  Mail  $mail  mail object
 */
function contact_db($Mail, $values, $Data)
{

    $Mail->body = 'You got an email

        Title: ' . $Data->get( 'Title' ) . '
        Content: ' . $Data->get( 'Content' ) . '

        Please login to admin panel to see the email detail:
        https://domain.com/wp-admin';

        return $Mail;
}
add_filter( 'mwform_admin_mail_mw-wp-form-XXX', 'contact_db', 10, 3 );


/*

##################################################

Mailing according to inquiry type
src: https://higezine.com/blog/front-end/wordpress/2018/08/25/493/

*/

// [mwform_select name="inquiry type" children="Human Resource Departament,Information Technology,Other"]

function contact_mail($Mail_raw, $values, $Data)
{

    if (
        $Data->get('inquiry type') == 'Human Resource Departament'){
        $Mail_raw->to = 'rh@domain.com';
    } else if (
        $Data->get('inquiry type') == 'Information Technology'){
        $Mail_raw->to = 'it@domain.com';
    } else if (
        $Data->get('inquiry type') == 'Other'){
        $Mail_raw->to = 'etc@domain.com';
    }

    return $Mail_raw;

}
add_filter( 'mwform_admin_mail_mw-wp-form-XXX', 'contact_mail', 10, 3 );
