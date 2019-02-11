<?php
/**
 * template para taxonomia nucleo sinle term
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.5
 *
 * @author hgodinho.com
 */

/**
 * Start
 */
get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
$count = $wp_query->found_posts;
?>

<main role="main" class="container">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-4 mb-4">
                <h1>
                    <?php single_term_title();?>
                    <span class="small text-muted">
                        <?php 
                        echo ' → ';
                        echo $count; ?> itens.
                    </span>
                </h1>
                <p>
                    <?php echo term_description(); ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-7 pb-4">
                <h3>
                    Obras neste Núcleo
                </h3>
            </div>
            <div class="col-12 col-sm-5 pb-4">
                <!-- formulario de busca -->
                <div class="col-12">
                    <?php get_search_form(); ?>
                </div>
                <!-- // formulario de busca -->
            </div>

        </div>

        <!-- cartoes de obras -->
        <div class="row pb-4">
            <?php
            //var_dump($wp_query);
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