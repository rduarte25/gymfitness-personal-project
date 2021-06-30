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
?>

	</div>
	<footer class="site-footer contenedor">
	    <hr>
	    <div class="contenido-footer">
	    	<?php
	            $args = array(
	              'theme_location' => 'menu-principal',
	              'container' => 'nav',
	              'container_class' => 'menu-principal',
	            );

	            wp_nav_menu($args);

	          ?>

	          <p class="copyright">Todos los derechos reservados. <?php echo get_bloginfo('name') . ' ' . date('Y'); ?></p>
	    </div>
	 </footer>


	<?php wp_footer(); ?>
  </body>
</html>
