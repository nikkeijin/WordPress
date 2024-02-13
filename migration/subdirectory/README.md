## Moving a Root install to its own directory

1. Move ALL of the WordPress core files into a subdirectory.
2. Copy the index.php and .htaccess file to the root.
3. Update MySQL DB.
        
```mysql
UPDATE wp_options SET option_value = replace(option_value, 'https://x.co.jp', 'https://y.co.jp') WHERE option_name = 'home';
UPDATE wp_options SET option_value = replace(option_value, 'https://x.co.jp', 'https://y.co.jp/subdirectory') WHERE option_name = 'siteurl';
UPDATE wp_posts SET post_content = replace(post_content, 'https://x.co.jp', 'https://y.co.jp/subdirectory');
UPDATE wp_postmeta SET meta_value = replace(meta_value,'https://x.co.jp','https://y.co.jp/subdirectory');
```
                
Note: Replace the `/subdirectory/` in the `MySQL query` above with your preferred directory, and also update the `/subdirectory/` in the `index.php` accordingly.
                          
For additional information and details, you can refer to the [WordPress Directory](https://wordpress.org/support/article/giving-wordpress-its-own-directory/) support article.
