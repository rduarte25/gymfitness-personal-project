
<?php 
/**
* 
* 
* 
* 
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

<main class="contenedor pagina seccion no-sidebar">

	<div class="text-center">		
		<?php get_template_part( 'template-parts/page' ); ?>

		<?php gymfitness_lista_clases(); ?>
	</div>

</main>

<?php get_footer(); ?>