<?php

/*

################################################## 

Custom API endpoints basic sample

Endpoint: https://example.com/wp-json/sample-api/v1/cars

*/

function api_register_cars_routes()
{
    register_rest_route('sample-api/v1', '/cars', array(
        'methods' => 'GET',
        'callback' => 'api_get_cars',
    ));
}
add_action('rest_api_init', 'api_register_cars_routes');

function api_get_cars()
{
    $posts = array('car' => 'lamborghini');
    return rest_ensure_response( $posts );
}


/*

################################################## 

Custom API endpoints for CPT

Endpoint: https://example.com/wp-json/custom-api/v1/schools-posts

*/
function schools_posts_endpoint()
{
    register_rest_route(
        'custom-api/v1',
        '/schools-posts',
        array(
            'methods'  => 'GET',
            'callback' => 'get_schools_posts',
        )
    );
}
add_action('rest_api_init', 'schools_posts_endpoint');

function get_schools_posts()
{

    $posts_data = array();

    $args = array(
        'post_type'      => 'schools',
        'posts_per_page' => -1,
    );
    $custom_posts = new WP_Query($args);

    while ($custom_posts->have_posts()) {
        $custom_posts->the_post();
        $post_id = get_the_ID();

        // Retrieve post thumbnail URL
        $thumbnail_url = get_the_post_thumbnail_url($post_id);

        // Retrieve post excerpt
        $excerpt = get_the_excerpt($post_id);

        // Retrieve post date
        $post_date = get_the_date('Y-m-d', $post_id);

        // Retrieve custom taxonomy terms
        $taxonomy_term_areas = wp_get_post_terms($post_id, 'areas');
        $taxonomy_terms_courses = wp_get_post_terms($post_id, 'courses');
        $taxonomy_terms_prefectures = wp_get_post_terms($post_id, 'prefectures');

        $terms_data_areas = array();
        foreach ($taxonomy_term_areas as $term) {
            $terms_data_areas[] = array(
                'id'   => $term->term_id,
                'name' => $term->name,
                'slug' => $term->slug,
            );
        }

        $terms_data_courses = array();
        foreach ($taxonomy_terms_courses as $term) {
            $terms_data_courses[] = array(
                'id'   => $term->term_id,
                'name' => $term->name,
                'slug' => $term->slug,
            );
        }

        $terms_data_prefectures = array();
        foreach ($taxonomy_terms_prefectures as $term) {
            $terms_data_prefectures[] = array(
                'id'   => $term->term_id,
                'name' => $term->name,
                'slug' => $term->slug,
            );
        }

        // Retrieve custom fields
        $acf_zip = get_post_meta($post_id, 'zip', true);
        $acf_address = get_post_meta($post_id, 'address', true);
        $acf_tel = get_post_meta($post_id, 'tel', true);
        $acf_url = get_post_meta($post_id, 'url', true);

        $posts_data[] = array(
            'id'            => $post_id,
            'title'         => get_the_title($post_id),
            'content'       => get_the_content($post_id),
            'permalink'               => get_permalink($post_id),
            'thumbnail_url'           => $thumbnail_url,
            'excerpt'                 => $excerpt,
            'post_date'               => $post_date,
            'taxonomy_term_areas'     => $terms_data_areas,
            'taxonomy_term_courses'     => $terms_data_courses,
            'taxonomy_term_prefectures'     => $terms_data_prefectures,
            'acf_zip' => $acf_zip,
            'acf_address' => $acf_address,
            'acf_tel' => $acf_tel,
            'acf_url' => $acf_url,
        );
    }

    wp_reset_postdata();

    return $posts_data;
}


/*

################################################## 

Custom API endpoints for Taxonomy Terms

Endpoint: https://example.com//wp-json/custom-api/v1/schools-terms

*/

function schools_terms_endpoint()
{
    register_rest_route(
        'custom-api/v1',
        '/schools-terms',
        array(
            'methods'  => 'GET',
            'callback' => 'get_schools_terms',
        )
    );
}
add_action('rest_api_init', 'schools_terms_endpoint');

function get_schools_terms()
{

    $term_data = array();

    $terms = get_terms('areas');
    foreach ($terms as $term) {
        $term_data['areas'][] = array(
            'id'   => $term->term_id,
            'name' => $term->name,
            'slug' => $term->slug,
        );
    }

    $terms = get_terms('courses');
    foreach ($terms as $term) {
        $term_data['courses'][] = array(
            'id'   => $term->term_id,
            'name' => $term->name,
            'slug' => $term->slug,
        );
    }

    $terms = get_terms('prefectures');
    foreach ($terms as $term) {
        $term_data['prefectures'][] = array(
            'id'   => $term->term_id,
            'name' => $term->name,
            'slug' => $term->slug,
        );
    }

    return $term_data;

}
