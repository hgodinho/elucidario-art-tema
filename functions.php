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
    $dependencies = array('bootstrap', 'font-awesome', 'estilos');
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
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', $dependencies, '1.12.9', true);
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
}

/**
 * Breadcrumbs
 *
 * @since 0.2
 * Original @author anwerashif
 * @source https://gist.github.com/anwerashif/ec4ac740047e2681e616fe2f1c63cbcf#file-functions-php
 *
 * Modifications @author hgodinho
 */
function get_breadcrumb()
{
    echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_option('home');
        echo '">';
        echo 'Wiki-ema';
        echo "</a></li>";
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-item">';
            the_category(' </li><li class="breadcrumb-item"> ');
            if (is_single()) {
                echo "</li><li class='breadcrumb-item active'>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item">';
            echo the_title();
            echo '</li>';
        }
    } elseif (is_tag()) {single_tag_title();} elseif (is_day()) {echo "<li class='breadcrumb-item'>Archive for ";
        the_time('F jS, Y');
        echo '</li>';} elseif (is_month()) {echo "<li class='breadcrumb-item'>Archive for ";
        the_time('F, Y');
        echo '</li>';} elseif (is_year()) {echo "<li class='breadcrumb-item'>Archive for ";
        the_time('Y');
        echo '</li>';} elseif (is_author()) {echo "<li class='breadcrumb-item'>Author Archive";
        echo '</li>';} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives";
        echo '</li>';} elseif (is_search()) {echo "<li class='breadcrumb-item'>Search Results";
        echo '</li>';}
    echo '</ol>';
}

/**
 * add_action
 *
 */
add_action('wp_enqueue_scripts', 'wikiema_enqueue_styles');
add_action('wp_enqueue_scripts', 'wikiema_enqueue_scripts');
add_action('after_setup_theme', 'wikiema_wp_setup');
