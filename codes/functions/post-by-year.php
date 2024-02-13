<?php

/* 

################################################## 

Custom URL to display post by year

Before using the code: 
https://example.com/?post_type=news&year=2022 or http://localhost:8080/2022/?post_type=news

After using the code:
https://example.com/news/2022/

*/
function custom_rewrite_rules()
{
    add_rewrite_rule('^news/(\d{4})/page/(\d+)/?$', 'index.php?post_type=news&year=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule('^news/(\d{4})/?$', 'index.php?post_type=news&year=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_rules');
