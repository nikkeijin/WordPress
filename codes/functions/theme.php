<?php

/* 

################################################## 

Taxonomy term with the link to redirect to the corresponding term archive page
Usage example: the_taxonomy_term('portfolio');

You may also customize the taxonomy term by page type adding a if with:
if (is_post_type_archive('job'))
if (is_tax('profession'))
if (is_singular('job'))

*/
function the_taxonomy_term($taxonomy) 
{
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $term_link = get_term_link($term, $taxonomy);
            if (!is_wp_error( $term_link )) {
                echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a><br>';
            }
        }
    }
}


/* 

################################################## 

Taxonomy term as option for select input
Usage example: the_taxonomy_term_select_option('portfolio');

*/
function the_taxonomy_term_select_option($taxonomy)
{
    $terms = get_terms( $taxonomy );   
    if ( !empty($terms) && ! is_wp_error($terms)) {
        foreach ($terms as $term) {
            echo '<option value="' . esc_attr( $term->term_id ) . '">' . esc_html( $term->name ) . '</option>';
        }
    }
}


/*

################################################## 

Taxonomy term as checkbox
Usage example: the_taxonomy_term_checkbox('portfolio');

*/
function the_taxonomy_term_checkbox($taxonomy)
{
    $terms = get_terms($taxonomy);
    if (!empty($terms) && !is_wp_error($terms)){
        foreach ($terms as $term) {
            echo '<input type="checkbox" name="' . esc_html($term->taxonomy) . '[]" value="' . esc_attr($term->term_id) . '">';
            echo '<label>' . esc_html($term->name) . '</label>';
            echo '<br />';
        }
    }
}
