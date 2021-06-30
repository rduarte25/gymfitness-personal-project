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

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>
    <title></title>
  </head>
  <body>
    <header class="site-header">
      <div class="contenedor">
        <div class="barra-navegacion">
          <div class="logo">
            <a href="<?php echo esc_url( site_url('/') ); ?>">
              <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="">
            </a>
          </div>

          <?php
            $args = array(
              'theme_location' => 'menu-principal',
              'container' => 'nav',
              'container_class' => 'menu-principal',
            );

            wp_nav_menu($args);

          ?>

        </div>
      </div>
    </header>
    <div class="site-contenedor" id="content">
