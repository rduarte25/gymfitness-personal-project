
<?php 
/**
* 
* Template Name: Template para las clases
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

<main class="contenedor pagina seccion con-sidebar">

	<div class="contenido-principal">		
		<?php get_template_part( 'template-parts/page' ); ?>
	</div>

	<?php get_sidebar('clases');?>

</main>

<?php get_footer(); ?>