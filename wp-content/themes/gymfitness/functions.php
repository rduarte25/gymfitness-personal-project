<?php


  /** Consultas reutilizables **/

  require get_template_directory().'/inc/queries.php';
  require get_template_directory().'/inc/shortcode.php';

  //Cuando el theme es activado.
  function gymfitness_setup() {

    //Habilitar imagenes destacadas.
    add_theme_support('post-thumbnails');

    //Titulos SEO

    add_theme_support( 'title-tag' );

    //Agregar imagenes de tamaños personalizados.
    add_image_size('square',350,350,true);
    add_image_size('portrait',350,724,true);
    add_image_size('cajas',400,375,true);
    add_image_size('mediano',700,400,true);
    add_image_size('blog',966,644,true);

  }

  add_action('after_setup_theme','gymfitness_setup');

  //Menu de navegación, agregar más utilizando arreglos.
  function gymfitness_menus() {
    register_nav_menus(array(
      'menu-principal' => __( 'Menu Principal', 'gymfitness' ),
    ));
  }

  add_action('init', 'gymfitness_menus');

  //Scripts y Styles.

  function gymfitness_scripts_styles() {
    //La de estilos normalize.
    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', array(), '8.0.1');
    //La hoja de estilos de slicknav.
    wp_enqueue_style('slicknavCSS', get_template_directory_uri().'/css/slicknav.min.css', array(), '1.0.0');

    //La hoja de estilos de lightbox.

    if (is_page('galeria')):
      wp_enqueue_style('lightboxCSS', get_template_directory_uri().'/css/lightbox.css', array(), '2.11.0');
    endif;

    //La hoja de estilos de liaflet.

    if (is_page('contacto')):
      wp_enqueue_style('leafletCSS', get_template_directory_uri().'/css/leaflet.css', array(), '1.5.1');
    endif;

     //La hoja de estilos de bxslider.

    if (is_page('inicio')):
      wp_enqueue_style('bxsliderCSS', get_template_directory_uri().'/css/jquery.bxslider.css', array(), '4.4.2.12');
    endif;


    //La hoja de estilos de fuentes de Open Sans.
    wp_enqueue_style('Open_Sans', get_template_directory_uri().'/fonts/Open_Sans.css', array(), '1.0.0');
    //La hoja de estilos de fuentes de Raleway
    wp_enqueue_style('Raleway', get_template_directory_uri().'/fonts/Raleway.css', array(), '1.0.0');
    //La hoja de estilos de fuentes de Staatliches
    wp_enqueue_style('Staatliches', get_template_directory_uri().'/fonts/Staatliches.css', array(), '1.0.0');

    //La hoja de stylos principal.
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'Open_Sans', 'Raleway', 'Staatliches'), '0.0.1');

     //El archivo js de slicknav.
    wp_enqueue_script('slicknavJS', get_template_directory_uri().'/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);

    //El archivo js de lightbox.
    if (is_page('galeria')):
      wp_enqueue_script('lightboxJS', get_template_directory_uri().'/js/lightbox.js', array('jquery',), '2.11.0', true);
    endif;

    //El archivo js de liaflet.
    if (is_page('contacto')):
      wp_enqueue_script('leafletJS', get_template_directory_uri().'/js/leaflet.js', array(), '1.5.1', true);
    endif;

    //El archivo js de bxslider.
    if (is_page('inicio')):
      wp_enqueue_script('bxsliderJS', get_template_directory_uri().'/js/jquery.bxslider.js', array('jquery'), '4.4.2.12', true);
    endif;

    //El archivo js del theme.
    wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true);    

  }

  add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

  //Defininir zona de widgets.

  function gymfitness_widgets() {
    /**
     * Creates a sidebar
     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
     */
    register_sidebar(array(
      'name'          => __( 'Sidebar 1', 'gymfitness' ),
      'id'            => 'sidebar_1',
      'description'   => 'Este es un sidebar',
      'class'         => 'widget',
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="text-center texto-primario">',
      'after_title'   => '</h3>',
    ));

    register_sidebar(array(
      'name'          => __( 'Sidebar 2', 'gymfitness' ),
      'id'            => 'sidebar_2',
      'description'   => 'Este es un sidebar',
      'class'         => 'widget',
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="text-center texto-primario">',
      'after_title'   => '</h3>',
    ));
    
  }

  add_action('widgets_init', 'gymfitness_widgets');

  /** Imagen Hero **/
  function gymfitness_hero_image() {
    //Obtener id
    $front_page_id = get_option('page_on_front');
    //Obtener
    $id_imagen = get_field('imagen_hero', $front_page_id);

    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];

    //Style CSS
    wp_register_style( 'custom', false);

    wp_enqueue_style( 'custom' );

    $imagen_destacada_css = "
      body.home .site-header {
        background-image: linear-gradient( rgba( 0, 0, 0, 0.75), rgba( 0, 0, 0, 0.75)), url($imagen);
      }

    ";

    wp_add_inline_style( 'custom', $imagen_destacada_css );
  }

  add_action('init', 'gymfitness_hero_image');

?>
