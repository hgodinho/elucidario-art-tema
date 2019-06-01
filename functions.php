<?php
/**
 * Funções do tema para Wiki-Ema
 *
 * @version 0.13
 * @since 0.1
 * @author hgodinho <ola@hgodinho.com>
 * 
 * Bootstrap @version 4.3.1
 */

require_once get_template_directory() . '/inc/numeric-pagination/wp-bootstrap4.1-pagination.php';
require_once get_template_directory() . '/inc/alphabetical-pagination/wp-bootstrap-alphabetical-pagination.php';
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker-master/class-wp-bootstrap-navwalker.php';

//include(get_template_directory() . '/ajax/ajax-cartoes-obras.php');
//include(get_template_directory() . '/ajax/ajax-lista-autores.php');

/**
 * CSS
 *
 * @return void
 */
$bootstrap_version = '4.3.1';
function wikiema_enqueue_styles()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/custom-bootstrap.min.css','', $bootstrap_version);
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
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', $dependencies, $bootstrap_version, true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', $dependencies);

    /**
     * @subpackage OwlCarousel
     */
    wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/inc/owl/owl.carousel.min.js', $dependencies);
    wp_enqueue_script('owl-slide', get_template_directory_uri() . '/js/owl-slide.js', $dependencies);

    /**
     * Ajax Insert
     */

    $versao = rand(0, 999);
    wp_enqueue_script('wiki-ema-app', get_template_directory_uri() . '/js/wiki-ema.js', null, $versao, false);
    $wp_wiki_ema_vars = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    );
    wp_localize_script('wiki-ema-app', 'wiki_ema', $wp_wiki_ema_vars);

}

/**
 * Configurações do tema
 *
 * @return void
 */
function wikiema_wp_setup()
{
    /**
     * funcionalidades do tema
     */
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    /**
     * tamanhos personalizados de imagem
     */
    add_image_size('cartoes-thumb-obra', 300, 180, array('left', 'top'));
    add_image_size('admin-thumbnail', 100, 100);

    /**
     * registra menu personalizado
     */
    register_nav_menu('primario', 'Primário');

    /**
     * Cria taxonomias para menu alfabético.
     */
    if (!taxonomy_exists('autor_az') && !taxonomy_exists('obra_az')) {
        if (class_exists('WP_Glossary_Bootstrap')) {
            $glossary = new WP_Glossary_Bootstrap(
                'autor_az',
                'obra_az',
                array('autores'),
                array('obras'),
                PLUGIN_SLUG . '/autor-a-z',
                PLUGIN_SLUG . '/obra-a-z',
                true
            );
            //add_action('save_post', array($glossary, 'auto_glossary_on_save'));

            /**
             * chamar actions seguintes somente 1 vez
             */
            //add_action('init', array($glossary, 'recursive_glossary_post_1'));
            //add_action('init', array($glossary, 'recursive_glossary_post_2'));
        }
    }
}

/**
 * Adiciona Formulário de buscas customizado no menu
 *
 */
function add_search_form($items, $args)
{
    if ($args->theme_location == 'primario') {
        $items .= '<li class="justify-content-end mx-md-4">' . get_search_form(false) . '</li>';
    }

    return $items;
}

/**
 *
 */
function tamanho_imagem_personalizado($sizes)
{
    return array_merge($sizes, array(
        'cartoes-thumb-obra' => __('Thumb Obra'),
    ));
}

/**
 * Ajuste na query principal dos arquivos
 *
 * @param $query
 * @since 0.4
 */
function query_arquivo_principal($query)
{
    if ($query->is_post_type_archive('obras') && !is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', '9');
    }

    if ($query->is_tax(array('classificacao', 'nucleo', 'ambiente')) && !is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', '9');
    }

    if ($query->is_tax(array('autor_az', 'obra_az')) && !is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', '9');
    }

    if ($query->is_post_type_archive('autores') && !is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', '20');
        $query->set('orderby', 'post_title');
        $query->set('order', 'ASC');
    }
}

/**
 * Pass in a taxonomy value that is supported by WP's `get_taxonomy`
 * and you will get back the url to the archive view.
 * @param $taxonomy string|int
 * @return string
 */
function get_taxonomy_archive_link(string $taxonomy = null)
{
    $tax = get_taxonomy($taxonomy);
    echo get_bloginfo('url') . '/' . $tax->rewrite['slug'];
}

/**
 * add_action
 */
add_action('wp_enqueue_scripts', 'wikiema_enqueue_styles');
add_action('wp_enqueue_scripts', 'wikiema_enqueue_scripts');
add_action('after_setup_theme', 'wikiema_wp_setup');
add_action('pre_get_posts', 'query_arquivo_principal');

/**
 * add_filter
 */
add_filter('image_size_names_choose', 'tamanho_imagem_personalizado');
//add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
