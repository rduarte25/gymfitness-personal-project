
<?php 
/**
*
* Template Name: Template para galeria.
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

<main class="contenedor pagina seccion">

	<div class="contenido-principal">		
		<?php while (have_posts()): the_post();?>
			<h1 class="text-center texto-primario"><?php the_title(); ?></h1>

			<?php 
				$galeria = get_post_gallery( get_the_ID(), false);
				
				$galeria_imagenes_ID = explode(',', $galeria['ids']);
			?>

			<ul class="galeria-imagenes">
				<?php 
					$i = 1;
					foreach ($galeria_imagenes_ID as $id => $valor) {
						$size = ($i == 4 || $i == 6 )? 'portrait' : 'square';
					$imagen_Thumb = wp_get_attachment_image_src($valor,$size)[0];
					$imagen_Full = wp_get_attachment_image_src($valor,'full')[0];
				?>					
					<li>
						<a href="<?php echo $imagen_Full;?>" data-lightbox="galeria">
						<img src="<?php echo $imagen_Thumb; ?>" alt="imagen">
						</a>
					</li>					
									

				<?php
					$i++;
		
					} 
				?>
			</ul>


	<?php endwhile; ?>
	</div>
	

</main>

<?php get_footer(); ?>
