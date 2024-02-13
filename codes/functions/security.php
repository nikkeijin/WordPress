<?php

/*

##################################################

Disable Login by Email in WordPress

*/
remove_filter('authenticate', 'wp_authenticate_email_password', 20);


/*

##################################################

Hide Login Errors in WordPress

*/
function no_wordpress_errors()
{
    return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );


/*

##################################################

Remove Welcome Panel from WordPress Dashboard

*/
remove_action('welcome_panel', 'wp_welcome_panel');


/*

##################################################

Show a Maintenance Message to Your Site Visitors

*/
function maintenance_message()
{
    if (current_user_can('edit_posts')) return;
    wp_die('<h1>Stay Pawsitive!</h1><br>Sorry, we\'re temporarily down for maintenance right meow.');
}
add_action('get_header', 'maintenance_message');


/*

##################################################

Hide Dashboard Menu Items from Non-Admin Users

*/
function hide_admin_menus()
{
    if (current_user_can( 'create_users' )) return;
    if (wp_get_current_user()->display_name == "Salman") return; 
    remove_menu_page('plugins.php'); 
    remove_menu_page('themes.php'); 
    remove_menu_page('tools.php'); 
    remove_menu_page('users.php'); 
    remove_menu_page('edit.php?post_type=page'); 
    remove_menu_page('options-general.php');
}
add_action( 'admin_menu', 'hide_admin_menus' );


/*

##################################################

Disable The “Please Update Now” Message On WordPress Dashboard

*/
if (!current_user_can('edit_users'))
{
    add_action('init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );"), 2);
    add_filter('pre_option_update_core', create_function( '$a', "return null;"));
}
