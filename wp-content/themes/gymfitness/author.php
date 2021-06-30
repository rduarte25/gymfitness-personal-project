<?php 
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage GymFitnessFlexCssGrid
* @since 0.0.1
*/
get_header();?>

<main class="pagina seccion no-sidebar contenedor categorias">
	<?php $autor = get_queried_object();?>
	<h2 class="text-center texto-primario">Autor: <?php echo $autor->data->display_name;
	

	?></h2>

	<p class="text-center"><?php echo get_the_author_meta('description', $autor->data->ID); ?></p>

	<ul class="lista-blog">
		<?php while(have_posts()):the_post(); ?>
			<?php get_template_part( 'template-parts/loop', 'blog' ); ?>
		<?php endwhile; ?>
	</ul>
</main>

<?php get_footer(); ?>