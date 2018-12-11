<?php

function wikiema_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_register_style('font-awesome', 'https://use.fontawesome.com/releases/v5.4.1/css/all.css' );
    wp_register_style('estilos', get_template_directory_uri() . '/css/estilos.css' );
    $dependencies = array('bootstrap','font-awesome', 'estilos');
    wp_enqueue_style( 'wikiema-style', get_stylesheet_uri(), $dependencies ); 
}
function wikiema_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.6', true );
    wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.min.js', $dependencies, '1.12.9', true );
}

add_action( 'wp_enqueue_scripts', 'wikiema_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'wikiema_enqueue_scripts' );


function wikiema_wp_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' ); 
}
add_action( 'after_setup_theme', 'wikiema_wp_setup' );


?>