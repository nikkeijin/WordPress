<?php

/*

##################################################

Simple Custom Post Type

*/

function my_cpt()
{
    register_post_type('projects',
        array(
            'labels' => array('name' => 'Projects'),
            'public' => true,
            'menu_position' => 0,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-admin-site'
        )
    );
}
add_action('init','my_cpt');


/*

##################################################

Simple Taxonomy

*/

function my_taxonomy()
{
    register_taxonomy(
        'front_end',
        'projects',
        array(
            'labels' => array('name' => 'Front End'),
            'hierarchical' => true
        )
    );
}
add_action('init','my_taxonomy');
