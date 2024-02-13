<?php

/*

##################################################

Create 1 Taxonomy for 2 CPT.

*/
function build_taxonomies()
{
    register_taxonomy('career', array('courses', 'jobs'), 
        array(
            'hierarchical' => true, 
            'label' => 'Career', 
            'query_var' => true, 
            'rewrite' => true
        )
    );
}
add_action('init', 'build_taxonomies', 0);


/*

In WordPress, when you're on a taxonomy archive page, WordPress does not inherently know what post type is linked to the taxonomy. 
By default, WordPress displays all post types associated with the given taxonomy on the taxonomy archive page.

If you have two custom post types (CPTs) linked to a single taxonomy, and you visit the archive page for that taxonomy, WordPress will typically display posts from both of those post types that have terms assigned to that taxonomy. 
This is the default behavior, and it's done to provide a comprehensive view of the content associated with the taxonomy.

If you want to control which post types are displayed on a taxonomy archive page, you would need to use custom queries or filters. 
You can modify the main query using the code below.

*/

/*

################################################## 

Adjust the tax query based on the "post_type" parameter in the URL.

For posts from the "Courses" post type:
http://localhost:7777/career/information-technology/?post_type=courses

For posts from the "Jobs" post type:
http://localhost:7777/career/information-technology/?post_type=jobs

*/
function modify_tax_query_by_url_parameter($query)
{
    if (is_tax()) {
        $post_type = get_query_var('post_type');
        if ($post_type) {
          $query->set('post_type', $post_type);
        }
    }
}
add_action('pre_get_posts', 'modify_tax_query_by_url_parameter');


/*

################################################## 

Adjust the tax query based on the first URL segment.

For posts from the "Courses" post type:
http://localhost:7777/courses/career/information-technology/

For posts from the "Jobs" post type:
http://localhost:7777/jobs/career/information-technology/

Note: To have such URL structure you may use the plugin below.
Download: https://wordpress.org/plugins/custom-post-type-permalinks/
Source: https://github.com/torounit/custom-post-type-permalinks/

*/
function modify_tax_query_by_url_segment($query)
{
    if (is_tax()) {
        $current_url = $_SERVER['REQUEST_URI'];
        $url_segments = explode('/', trim($current_url, '/'));
        $post_types = array('courses', 'jobs');
        if (in_array($url_segments[0], $post_types)) {
            $query->set('post_type', $url_segments[0]);
        }
    }
}
add_action('pre_get_posts', 'modify_tax_query_by_url_segment');
