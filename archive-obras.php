<?php
/**
 * Archive template para Obras
 *
 * Responsável por exibir o arquivo de obras
 *
 * @package WordPress
 * @subpackage Elucidário.art
 *
 * @version 0.2
 * @since 0.3
 *
 * @author hgod.in
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
$count = $wp_query->found_posts;
?>
<section id="primary" class="content-area">
    <main role="main" class="container">

        <div class="container py-4">

            <div class="row">
                <div class="col-12">
                    <?php
get_search_form();?>
                </div>
                <div class="col-12 pl-0">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col col-lg-12 col-2 mb-5">
                    <?php
                    /**
                     * Menu para ordem alfabética
                     */
if (class_exists('WP_Glossary_Bootstrap')) {
    $glossary = new WP_Glossary_Bootstrap;
    $glossary_menu = $glossary->glossary_menu_front_end(null, 'obra_az');
}?>
                </div>
                <div class="col col-lg-12 col-10">
                    <div class="row">
                        <?php
                        /**
                         * Template de cartões de obras
                         */
get_template_part('template-parts/obra/content', 'cartao-obra');
?>
                    </div>
                </div>
            </div>
            <div class="cointainer mt-4" id="pagination-wraper">
                <?php
if (function_exists('bootstrap_pagination')) {
    bootstrap_pagination();
}?>
            </div>
        </div>
    </main>
</section>

<?php
get_footer();
?>