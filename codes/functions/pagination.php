<?php

/*

##################################################

Pagination for the WordPress default loop

*/

// Posts per page for author.php
function user_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) return;
    if (is_author()) {
        $author = get_queried_object();
        $author_id = $author->ID;
        // the author has the 'school' role?
        if (user_has_role($author_id, 'school')) {
            $query->set('post_type', 'courses');
            $query->set('posts_per_page', 6);
        }
        // the author has the 'company' role?
        if (user_has_role($author_id, 'company')) {
            $query->set('post_type', 'jobs');
            $query->set('posts_per_page', 6);
        }

    }
}
add_action('pre_get_posts', 'user_posts_per_page');

function user_has_role($user_id, $role)
{
    $user = get_userdata($user_id);
    return in_array($role, (array) $user->roles);
}


// Posts per page for archive.php and taxonomy.php
function archive_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) return;
    $post_types_to_modify = array(
        'courses' => 12,
        'jobs' => 12,
    );
    foreach ($post_types_to_modify as $post_type => $posts_per_page) {
        if (is_post_type_archive($post_type) || is_tax(get_object_taxonomies($post_type))) {
            $query->set('post_type', $post_type);
            $query->set('posts_per_page', $posts_per_page);
            return;
        }
    }
}

add_action('pre_get_posts', 'archive_posts_per_page');


/*

##################################################

Designing Pagination for default loop and custom loop

Use the following code for the loop pagination:
<?php is_page() ? custom_pagination($query) : (is_archive() ? custom_pagination() : ''); ?>

*/

function custom_pagination($query = null)
{
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }
    $total_pages = $query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));
    $range = 2;
    $dots = '...';
    if ($total_pages > 1) {
        echo '<div>';
        echo '<nav>';
        echo '<ul class="flex gap-4">';
        // Previous
        if ($current_page > 1) {
            echo '<li>';
            echo '<a href="' . get_pagenum_link($current_page - 1) . '">';
            echo '<span>Previous</span>';
            echo '</a>';
            echo '</li>';
        }
        // Numbered
        $previous_dots = false;
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i <= $range || $i > $total_pages - $range || abs($i - $current_page) <= $range) {
                echo '<li>';
                echo '<a href="' . get_pagenum_link($i) . '">' . $i . '</a>';
                echo '</li>';
                $previous_dots = false;
            } else {
                if (!$previous_dots) {
                    echo '<li>';
                    echo '<span>' . $dots . '</span>';
                    echo '</li>';
                    $previous_dots = true;
                }
            }
        }
        // Next
        if ($current_page < $total_pages) {
            echo '<li>';
            echo '<a href="' . get_pagenum_link($current_page + 1) . '">';
            echo '<span>Next</span>';
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
    }
}
