<?php get_header();?>

<?php
	while (have_posts()): the_post();
?>
	<div>
		
		<h1><?php the_title(); ?></h1>


	</div>
	
	<div>
		
		<p><?php the_content(); ?></p>

	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
