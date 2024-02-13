<?php

/*

################################################## 

Custom Fields for User Profile

*/
function update_profile_fields( $contactmethods )
{
    $contactmethods['tel'] = 'TEL';
    $contactmethods['cel'] = 'CEL';
    $contactmethods['address'] = 'ADDRESS';
    $contactmethods['map'] = 'MAP';
    return $contactmethods;
}
add_filter('user_contactmethods','update_profile_fields',10,1);


/*

################################################## 

Custom User with Author Role

*/
function add_custom_roles()
{
    add_role(
        'school',
        'School',
        get_role('author')->capabilities
    );

    add_role(
        'company',
        'Company',
        get_role('author')->capabilities
    );
}
add_action('init', 'add_custom_roles');


function remove_custom_author_role()
{
    $role_name = 'custom_author';
    if (get_role($role_name)) remove_role($role_name);
}
add_action('init', 'remove_custom_author_role');


/*

################################################## 

Custom URL for user

*/
function custom_author_base()
{
    global $wp_rewrite;
    $author_slug = 'school';
    $wp_rewrite->author_base = $author_slug;
}
add_action('init', 'custom_author_base');
