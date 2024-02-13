<!-- 

################################################## 

The Loop is PHP code used by WordPress to display all your posts

-->

<!-- Default Loop -->
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
		the_title();
	endwhile;
endif;
wp_reset_postdata();
?>


<!-- Default Loop with Else and Pagination -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_title(); ?>
<?php endwhile; else: ?>
	<!-- no post output -->
<?php endif; wp_reset_postdata(); ?>
<!-- pagination -->
<?php the_posts_pagination(); ?>


<!-- Custom Loop -->
<?php
	$args = array('post_type' => 'portfolio' );
	$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : while($query->have_posts()): $query->the_post(); ?>
	<?php the_title(); ?>
	<?php endwhile; else: ?>
	<!-- no post output -->
<?php endif; wp_reset_postdata(); ?>
