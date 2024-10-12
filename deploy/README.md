## How to deploy WordPress Site to a Host

1. Update the following parameters in your wp-config.php file
        
```php
/** The name of the database for WordPress */
define('DB_NAME', 'database_name_here');
/** MySQL database username */
define('DB_USER', 'username_here');
/** MySQL database password */
define('DB_PASSWORD', 'password_here');
```

2. Export your database from your localhost

3. Create a MySQL database on your host

4. Import your saved database into your host

5. Update your MySQL database

- To ensure that your WordPress site functions correctly after the move, you need to update your MySQL database. 
- Use the following SQL queries to update your database:

```sql
UPDATE wp_options SET option_value = replace(option_value, 'https://x.co.jp', 'https://y.co.jp') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE wp_posts SET post_content = replace(post_content, 'https://x.co.jp', 'https://y.co.jp');
UPDATE wp_postmeta SET meta_value = replace(meta_value,'https://x.co.jp','https://y.co.jp');
```

6. Upload your website’s files to your host

7. Log in your Administrator Dashboard and update the `PERMALINKS`

## Troubleshooting

### Administrator Dashboard Path

- To fix issues related to the Administrator Dasboard path, modify the `wp-config.php` file with the following code:

```php
define( 'WP_HOME', 'http://y.co.jp' );
define( 'WP_SITEURL', 'http://y.co.jp' );
```

### Slow or Unresponsive Administrator Dashboard

- In some cases, if you're using `XSERVER.ne.jp`, you may also need to disable the 'Xアクセラレータ' which is a cache server that speeds up page loading by storing previously displayed content.
