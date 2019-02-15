<?php
/**
 * Archive template para Autores
 *
 * responsável por exibir o arquivo de autores
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.2
 * @since 0.3
 *
 * @author hgodinho.com
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');

MB_Relationships_API::each_connected(array(
    'id' => 'obras_to_autores',
    'to' => $wp_query->posts, // Set to $my_query.
));
?>

<main role="main" class="container">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-7 pb-4">
                <h1>
                    <?php post_type_archive_title();?>
                </h1>
            </div>
            <div class="col-12 col-sm-5 pb-4">

                <!-- formulario de busca -->
                <div class="col-12">
                    <?php get_search_form();?>
                </div>
                <!-- // formulario de busca -->
            </div>

        </div>

        
        <?php
if (class_exists('WP_Glossary_Bootstrap')) {
    $glossary = new WP_Glossary_Bootstrap(
        'autor_a_z',
        null,
        array('autores'),
        null,
        null,
        null,
        null
    );
    $glossary_menu = $glossary->glossary_menu_front_end( 'autor_a_z', NULL );
}

if (have_posts()): while (have_posts()): the_post();
        get_template_part('template-parts/autor/content', 'lista-autor');
    endwhile;
endif;
?>
    </div>
    <div class="cointainer mt-4">
        <?php
if (function_exists('bootstrap_pagination')) {
    bootstrap_pagination();
}
?>
    </div>
</main>
<?php
get_footer();
?>