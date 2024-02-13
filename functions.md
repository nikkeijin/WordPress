# WordPress Functions

## Script and Style Registration
```php
wp_dequeue_script();
wp_dequeue_style();
wp_deregister_script();
wp_deregister_style();
wp_enqueue_script();
wp_enqueue_style();
wp_localize_script();
wp_register_script();
wp_register_style();
wp_script_is();
wp_style_is();
```

## Directory
```php
download_url();
get_admin_url();
get_home_url();
get_locale_stylesheet_uri();
get_site_url();
get_stylesheet();
get_stylesheet_directory();
get_stylesheet_directory_uri();
get_stylesheet_uri();
get_template();
get_template_directory();
get_template_directory();
get_template_directory_uri();
get_template_directory_uri();
get_theme_file_path();
get_theme_file_uri();
get_theme_roots();
get_theme_root();
get_theme_root_uri();
locale_stylesheet();
locate_template();
site_url();
```

## Include
```php
comments_template();
get_dirsize();
get_footer();
get_header();
get_search_form();
get_sidebar();
get_template_part();
recurse_dirsize();
```

## Shortlink
```php
the_shortlink();
wp_get_shortlink();
wp_shortlink_header();
wp_shortlink_wp_head();
```

## Template

Head
```php
wp_head();
```

Title
```php
single_cat_title();
single_month_title();
single_tag_title();
single_term_title();
the_search_query();
the_title_attribute();
wp_title();
```

Pages
```php
get_all_page_ids();
get_pages();
get_page(); //(deprecated)
get_page_by_path();
get_page_by_title();
get_page_children();
get_page_hierarchy();
get_page_link();
get_page_uri();
is_page();
page_uri_index(); //(method of class WP_Rewrite)
paginate_links();
wp_dropdown_pages();
wp_link_pages();
wp_list_pages();
wp_page_menu();
```

Navigation
```php
get_registered_nav_menus();
walk_nav_menu_tree();
wp_get_nav_menu();
wp_get_nav_menu_item();
wp_nav_menus();
wp_nav_menu();
```

Blog
```php
bloginfo('template_url');
bloginfo('charset');
bloginfo('description');
bloginfo('language');
bloginfo('name');
bloginfo('rss2_url');
bloginfo('rss_url');
bloginfo('stylesheet_url');
bloginfo('url');
bloginfo('version');
bloginfo_rss();
get_bloginfo_rss();
get_current_blog_id();
```

Post
```php
add_meta_box();
body_class();
get_adjacent_post();
get_archives_link();
get_boundary_post();
get_children();
get_delete_post_link();
get_edit_post_link();
get_extended();
get_next_posts_link();
get_next_post();
get_posts();
get_post();
get_post_ancestors();
get_post_field();
get_post_format();
get_post_mime_type();
get_post_status();
get_previous_posts_link();
get_previous_post();
get_the_author_posts();
get_the_content();
get_the_excerpt();
get_the_ID();
get_the_title();
has_excerpt();
has_post_format();
have_posts();
is_post(); //(deprecated)
next_image_link();
next_posts_link();
next_post_link();
next_post_link(' %link ');
posts_nav_link();
post_class();
post_exists();
post_password_required();
post_type_archive_title();
previous_image_link();
previous_posts_link();
previous_post_link('%link');
register_post_status();
remove_meta_box();
set_post_format();
single_post_title();
sticky_class();
the_content();
the_content_rss();
the_excerpt();
the_excerpt_rss();
the_ID();
the_meta();
the_post();
the_title();
the_title_attribute();
the_title_rss();
translate_user_role();
wp_delete_post();
wp_get_post_revisions();
wp_get_post_revision();
wp_get_recent_posts();
wp_get_single_post(); //(deprecated)
wp_insert_post();
wp_is_post_revision();
wp_link_pages();
wp_publish_post();
wp_trash_post();
wp_trim_excerpt();
wp_update_php_annotation();
wp_update_post();
```

Date and Time
```php
calendar_week_mod();
get_calendar();
get_the_date();
single_month_title();
the_date();
the_date_xml();
the_modified_date();
the_modified_time();
the_time();
```

Category
```php
category_description();
category_nicename();
cat_is_ancestor_of();
get_all_category_ids(); //(deprecated)
get_ancestors();
get_categories();
get_category();
get_category_by_path();
get_category_by_slug();
get_category_link();
get_category_parents();
get_cat_ID();
get_cat_name();
get_the_category();
get_the_category_by_ID();
get_the_category_list();
in_category();
is_category();
single_cat_title();
single_term_title();
the_category();
the_category_rss();
wp_category_checklist();
wp_create_category();
wp_delete_category();
wp_dropdown_categories();
wp_get_post_categories();
wp_insert_category();
wp_list_categories();
wp_set_post_categories();
```

Tags
```php
allowed_tags();
get_tags();
get_tag();
get_tag_link();
get_the_tags();
get_the_tag_list();
has_tag();
is_tag();
single_tag_title();
tag_description();
the_tags();
the_tags();
wp_generate_tag_cloud();
wp_get_post_tags();
wp_set_post_tags();
wp_tag_cloud();
```

Taxonomy
```php
get_edit_term_link();
get_object_taxonomies();
get_taxonomies();
get_taxonomy();
get_terms();
get_term();
get_term_by();
get_term_children();
get_term_link();
get_the_terms();
get_the_term_list();
is_taxonomy(); (deprecated)
is_taxonomy_hierarchical();
is_tax();
is_term(); (deprecated)
register_taxonomy();
register_taxonomy_for_object_type();
taxonomy_exists();
term_description();
term_exists();
the_taxonomies();
the_terms();
wp_count_terms();
wp_delete_term();
wp_get_object_terms();
wp_get_post_terms();
wp_insert_term();
wp_remove_object_terms();
wp_set_object_terms();
wp_set_post_terms();
wp_terms_checklist();
wp_update_term();
```

Author
```php
get_author_posts_url();
get_the_author();
get_the_author_link();
get_the_author_posts();
the_author();
the_author_aim();
the_author_description();
the_author_email();
the_author_firstname();
the_author_ID();
the_author_lastname();
the_author_link();
the_author_login();
the_author_meta();
the_author_nickname();
the_author_posts();
the_author_posts_link();
the_author_url();
the_author_yim();
the_modified_author();
wp_dropdown_users();
wp_list_authors();
```

Comment
```php
cancel_comment_reply_link();
comments_author_link();
comments_link();
comments_number();
comments_popup_link();
comments_popup_script();
comments_rss_link();
comment_author();
comment_author_email();
comment_author_email_link();
comment_author_IP();
comment_author_link();
comment_author_rss();
comment_author_url();
comment_author_url_link();
comment_class();
comment_date();
comment_excerpt();
comment_form();
comment_form_title();
comment_ID();
comment_id_fields();
comment_reply_link();
comment_text();
comment_text_rss();
comment_time();
comment_type();
get_avatar();
is_comments_popup();
next_comments_link();
paginate_comments_link();
permalink_comments_rss();
previous_comments_link();
previous_comments_rss();
wp_list_comments();
```

Permalink
```php
get_page_link();
get_permalink();
get_post_permalink();
get_search_link();
permalink_anchor();
permalink_single_rss();
post_permalink();
the_feed_link();
the_permalink();
```

Thumbnail
```php
get_post_thumbnail_id();
get_the_post_thumbnail();
has_post_thumbnail();
the_post_thumbnail();
```

Attachements
```php
get_attached_file();
get_attachment_link();
image_edit_before_change(); //(ported to WP_Image_Editor object)
image_resize(); //(deprecated)
is_attachment();
is_local_attachment();
set_post_thumbnail();
the_attachment_link();
update_attached_file();
wp_attachment_is_image();
wp_check_for_changed_slugs();
wp_count_posts();
wp_create_thumbnail(); //(deprecated)
wp_delete_attachment();
wp_generate_attachment_metadata();
wp_get_attachment_image();
wp_get_attachment_image_src();
wp_get_attachment_link();
wp_get_attachment_metadata();
wp_get_attachment_thumb_file();
wp_get_attachment_thumb_url();
wp_get_attachment_url();
wp_get_mime_types();
wp_insert_attachment();
wp_mime_type_icon();
wp_prepare_attachment_for_js();
wp_update_attachment_metadata();
```

Lists
```php
get_links_list();
wp_dropdown_pages();
wp_get_archives();
wp_list_cats();
wp_list_pages();
wp_page_menu();
wp_tag_cloud();
```

Edit Link
```php
edit_tag_link();
edit_post_link();
edit_comment_link();
edit_bookmark_link();
```

Bookmark
```php
edit_bookmark_link();
edit_comment_link();
edit_post_link();
edit_tag_link();
```

## Login
```php
is_user_logged_in();
wp_loginout();
wp_login_form();
wp_login_url();
wp_logout();
wp_logout_url();
wp_lostpassword_url();
wp_meta();
wp_register();
wp_registration_url();
wp_signon();
```

## Shortcut
```php
add_shortcode();
do_shortcode();
remove_all_shortcodes();
remove_shortcode();
shortcode_atts();
strip_shortcodes();
```

## Query
```php
get_posts();
the_search_query();
get_search_query();
query_posts();
rewind_posts();
wp_reset_query();
add_query_arg();
get_query_var();
is_main_query();
remove_query_arg();
```

## Custom Fields
```php
add_query_arg();
get_posts();
get_query_var();
get_search_query();
is_main_query();
query_posts();
remove_query_arg();
rewind_posts();
the_search_query();
wp_reset_query();
```

## Custom Post Type
```php
add_post_type_support();
get_post_types();
get_post_type();
get_post_type_archive_link();
get_post_type_capabilities();
get_post_type_labels();
get_post_type_object();
is_post_type_archive();
is_post_type_hierarchical();
post_type_archive_title();
post_type_exists();
post_type_supports();
register_post_status();
register_post_type();
remove_post_type_support();
set_post_type();
```

## Conditional
```php
comments_open();
has_excerpt();
has_nav_menu();
has_post_format();
has_tag();
has_term();
have_posts();
in_category();
in_the_loop();
is_404();
is_active_sidebar();
is_admin();
is_admin_bar_showing();
is_archive();
is_attachment();
is_author();
is_category();
is_child_theme();
is_comments_popup();
is_customize_preview();
is_date();
is_day();
is_dynamic_sidebar();
is_feed();
is_front_page();
is_home();
is_month();
is_object_in_term();
is_paged();
is_page();
is_page_template();
is_post(); //(deprecated)
is_preview();
is_search();
is_single();
is_singular();
is_sticky();
is_tag();
is_tax();
is_time();
is_trackback();
is_year();
pings_open();
pings_open();
```

## SQL
```php
get_meta_sql();
get_posts_by_author_sql();
get_tax_sql();
```

## Codex Function Reference
https://codex.wordpress.org/Function_Reference
