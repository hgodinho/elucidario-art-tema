<?php
/**
 * Archive template para Obras
 *
 * responsável por exibir o arquivo de obras
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
$count = $wp_query->found_posts;
?>
<main role="main" class="container">
    <div class="container pb-4 mb-4 border-bottom">
        <div class="row">
            <div class="col-12 col-sm-7 pb-4 pt-4">
                <h1>
                    Todas as obras
                    <span class="small text-muted">
                        <?php
echo ' → ';
echo $count; ?> itens.
                    </span>
                </h1>
            </div>
            <div class="col-12 col-sm-5 pb-4">

                <!-- formulario de busca -->
                <div class="col-12 pt-4">
                    <?php get_search_form();?>
                </div>
                <!-- // formulario de busca -->
            </div>
        </div>
    </div>

    <div class="container">
        <!-- cartoes de obras -->
        <?php
if (class_exists('WP_Glossary_Bootstrap')) {
    $glossary = new WP_Glossary_Bootstrap(
        null,
        'obra_a_z',
        null,
        array('obras'),
        null,
        null,
        null
    );
    $glossary_menu = $glossary->glossary_menu_front_end(null, 'obra_a_z');
}
?>
        <div class="row pb-4">
            <?php
if (have_posts()): while (have_posts()): the_post();
        get_template_part('template-parts/obra/content', 'cartao-obra');
    endwhile;
endif;
?>
        </div>
    </div>
    <div class="cointainer">
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