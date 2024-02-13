## Structure & Common Functions

```php
<?php

/*

################################################## 

header.php

*/

?>

<head>
    <?php wp_head(); ?>
    <title><?php if ( is_front_page() ) echo ('custom title'); else wp_title(''); ?></title>
</head>

<body <?php body_class(); ?>>

<header></header>

```

```php
<?php

/*

################################################## 

footer.php

*/

?>

<footer></footer>

<?php wp_footer(); ?>

</body>
```

```php
<?php

/*

################################################## 

archive.php, single.php, page.php, etc...

*/

?>

<?php get_header(); ?>

    <?php get_template_part('components/section'); ?>

<?php get_footer(); ?>

```

```php
<?php

/*

################################################## 

Common Functions

*/

?>

<!--
    WordPress Address (URL) = home_url();
-->
<a href="<?= esc_url(home_url()); ?>">Home</a>
<a href="<?= esc_url(home_url('service')); ?>">Service</a>

<!--
    Site Address (URL) = get_site_url();
-->
<a href="<?= esc_url(get_site_url()); ?>">Home</a>
<a href="<?= esc_url(get_site_url('landing-page')); ?>">Landing Page</a>


<!--
    Redirection
-->
<?php wp_redirect(home_url()); ?>


<!--
    Image
-->
<img src="<?= get_template_directory_uri(); ?>/img/hero.jpg" alt="hero" />
<img src="<?php the_post_thumbnail_url(); ?>" alt="thumbnail" />


<!--
    Display the current category or taxonomy term name from archive.php
-->
<?php single_cat_title(); ?>


<!--
    Display date (YYYY.MM.DD) for archive page
-->
<?= get_the_date('Y.n.j'); ?>


<!--
    Display date for single page
-->
<?php the_time('Y.n.j'); ?>
<?= date_i18n('Y年n月j日', strtotime(get_the_date())); ?>

```
