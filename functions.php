<?php
/**
 * Funções do tema para Wiki-Ema
 *
 * @version 0.2
 * @since 0.1
 * @author hgodinho <henriquegodinho@emaklabin.org.br>
 */

/**
 * CSS
 *
 * @return void
 */
function wikiema_enqueue_styles()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_register_style('font-awesome', 'https://use.fontawesome.com/releases/v5.4.1/css/all.css');
    wp_register_style('estilos', get_template_directory_uri() . '/css/estilos.css');
    /**
     * @subpackage OwlCarousel
     */
    wp_register_style('owlcarousel', get_template_directory_uri() . '/inc/owl/owl.carousel.min.css');
    wp_register_style('owlcarousel2', get_template_directory_uri() . '/inc/owl/owl.theme.default.min.css');

    $dependencies = array('bootstrap', 'font-awesome', 'estilos', 'owlcarousel', 'owlcarousel2');
    wp_enqueue_style('wikiema-style', get_stylesheet_uri(), $dependencies);
}

/**
 * Scripts
 *
 * @return void
 */
function wikiema_enqueue_scripts()
{
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.6', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', $dependencies);

    /**
     * @subpackage OwlCarousel
     */
    wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/inc/owl/owl.carousel.min.js', $dependencies);
    wp_enqueue_script('owl-slide', get_template_directory_uri() . '/js/owl-slide.js', $dependencies);

}

/**
 * Configurações do tema
 *
 * @return void
 */
function wikiema_wp_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size( 'cartoes-thumb-obra', 300, 180, true);
    //add_image_size( 'cartoes-tete-obra', 180, 180);
    //set_post_thumbnail_size( 300, 180, true );
}

/**
 * 
 */
function tamanho_imagem_personalizado( $sizes ) {
    return array_merge( $sizes, array(
        'cartoes-thumb-obra' => __( 'Thumb Obra' ),
    ) );
}

/**
 * add_action
 */
add_action('wp_enqueue_scripts', 'wikiema_enqueue_styles');
add_action('wp_enqueue_scripts', 'wikiema_enqueue_scripts');
add_action('after_setup_theme', 'wikiema_wp_setup');

/**
 * add_filter
 */
add_filter( 'image_size_names_choose', 'tamanho_imagem_personalizado' );
 

