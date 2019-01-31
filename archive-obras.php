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
                <?php get_search_form(); ?>
                </div>
                <!-- // formulario de busca -->
            </div>
        </div>

        <!-- cartoes de obras -->
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