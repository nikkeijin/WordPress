<?php

/*

################################################## 

Don't allow user to select more than one term from a taxonomy and enforce the selection of at least one term

*/
function enforce_single_term_selection($post_id)
{
    // Define taxonomies and their default terms
    $taxonomies_and_defaults = array(
        'news-category' => 'information',
        'works-category' => 'regular-programs',
    );

    foreach ($taxonomies_and_defaults as $taxonomy => $default_term_slug) {
        $selected_terms = wp_get_post_terms($post_id, $taxonomy);

        // Set a default term or handle the situation accordingly if no terms are selected.
        if (empty($selected_terms)) {
            // Set a default term or handle the situation, for example:
            $default_term = get_term_by('slug', $default_term_slug, $taxonomy);
            $default_term_id = ($default_term) ? $default_term->term_id : 0;
            wp_set_post_terms($post_id, $default_term_id, $taxonomy);
            return;
        }

        // If more than one term is selected, set the post terms to only include the first selected term.
        if (count($selected_terms) > 1) {
            wp_set_post_terms($post_id, $selected_terms[0]->term_id, $taxonomy);
        }
    }
}

add_action('save_post', 'enforce_single_term_selection');


/*

################################################## 

By default, when deleting a user in the WordPress Dashboard, you will be asked whether you want to delete all of that user's content or attribute it to another user. 
However, this option applies to the default post type, not custom post types (CPT). 
Nevertheless, this function also allows CPT to be either deleted or attributed to another user.

*/

function custom_delete_user_content($user_id, $reassign, $user)
{

    // Inspect if the user has posts of the specified custom post type
    $args = array(
        'post_type' => 'your_cpt',
        'author' => $user_id,
        'posts_per_page' => -1,
    );

    $user_posts = get_posts($args);

    if (count($user_posts) < 1) return;

    if ($reassign) {
        foreach ($user_posts as $post) {
            // Update the author of each post to the new user
            wp_update_post(
                array(
                    'ID' => $post->ID,
                    'post_author' => $reassign,
                )
            );
        }
        return;
    }

    foreach ($user_posts as $post) {
        wp_delete_post($post->ID, true);
    }

}
add_action('delete_user', 'custom_delete_user_content', 10, 3);
