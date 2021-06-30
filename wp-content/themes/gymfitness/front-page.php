
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
get_header('front');?>

<section class="bienvenida text-center seccion">
	<h2 class="texto-primario"><?php the_field('encabezado_bienvenida'); ?></h2>
	<p><?php the_field('texto_bienvenida'); ?></p>
</section>

<div class="seccion-areas">
	<ul class="contenedor-areas">
		<li class="area">
			<?php 
				$area1 = get_field('area_1');
				$imagen = wp_get_attachment_image_src( $area1['area_imagen'], 'mediano')[0];
			?>

			<img src="<?php echo esc_attr( $imagen ); ?>" alt="">
			<p><?php echo esc_html( $area1['area_texto'] ); ?></p>
		</li>

		<li class="area">
			<?php 
				$area2 = get_field('area_2');
				$imagen = wp_get_attachment_image_src( $area2['area_imagen'], 'mediano')[0];
			?>

			<img src="<?php echo esc_attr( $imagen ); ?>" alt="">
			<p><?php echo esc_html( $area2['area_texto'] ); ?></p>
		</li>

		<li class="area">
			<?php 
				$area3 = get_field('area_3');
				$imagen = wp_get_attachment_image_src( $area3['area_imagen'], 'mediano')[0];
			?>

			<img src="<?php echo esc_attr( $imagen ); ?>" alt="">
			<p><?php echo esc_html( $area3['area_texto'] ); ?></p>
		</li>

		<li class="area">
			<?php 
				$area4 = get_field('area_4');
				$imagen = wp_get_attachment_image_src( $area4['area_imagen'], 'mediano')[0];
			?>

			<img src="<?php echo esc_attr( $imagen ); ?>" alt="">
			<p><?php echo esc_html( $area4['area_texto'] ); ?></p>
		</li>
	</ul>
</div>

<section class="clases">
	
	<div class="contenedor seccion">
		
		<h2 class="text-center texto-primario">Nuestras Clases</h2>
		<?php gymfitness_lista_clases(4); ?>

		<div class="contenedor-boton">
			<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Nuestras Clases' ) ) );?>" class="boton boton-primario">
				Ver todas la clases
			</a>
		</div>
	</div>
</section>

<section class="instructores">
	<div class="contenedor seccion">
		<h2 class="text-center texto-primario">
			Nuestros Instructores
		</h2>
		<p class="text-center">
			Intructores profesionales que te ayudarán a logran tus objetivos
		</p>

		<ul class="listado-instructores">
			<?php 
				$args = array(
					'post_type' => 'instructores',
					'posts_per_page' => 10,
				);

				$instructores = new WP_Query($args);

				while ($instructores->have_posts()) {
					$instructores->the_post();
			?>
					<li class="instructor">
						<?php the_post_thumbnail('mediano'); ?>
						<div class="contenido text-center">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?></p>
							<div class="especialidad">
								<?php 
									$especialidad = get_field('especialidad');
									foreach($especialidad as $key => $value) {
								?>
										<span class="etiqueta"><?php echo esc_html( $value ); ?></span>
								<?php
									}
								?>
							</div>
						</div>

					</li>

			<?php
				}
				wp_reset_postdata();
			?>
		</ul>
	</div>
</section>

<section class="testimoniales">
	<h2 class="text-center texto-blanco">Testimoniales</h2>
	<div class="contenedor-testimoniales">
		<ul class="listado-testimoniales">
			<?php 
				$args = array(
					'post_type' => 'testimoniales',
					'posts_per_page' => 10,
				);

				$testimoniales = new WP_Query($args);
				while ($testimoniales->have_posts()) {
					$testimoniales->the_post();
			?>
				<li class="testimonial text-center">
					<blockquote>
						<?php the_content() ?>
					</blockquote>

					<footer class="testimonial-footer">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
						<p><?php the_title(); ?></p>
					</footer>
				</li>
			<?php
				}
				wp_reset_postdata();
			?>
		</ul>
	</div>
</section>

<section class="blog contenedor seccion">
	<h2 class="text-center texto-primario">Nuestro Blog</h2>
	<p class="text-center">Aprende tips de nuestros instructures expertos</p>
	<ul class="lista-blog">	
		<?php 

			$args = array(
				'post_type' => 'post', 
				'posts_per_page' => 4,
			);
			$blog = new WP_Query($args);
			while($blog->have_posts()){
				$blog->the_post();
		?>
				<?php get_template_part( 'template-parts/loop', 'blog' ); ?>

		<?php
			}
			wp_reset_postdata();
		?>
	</ul>
</section>


<?php get_footer(); ?>
