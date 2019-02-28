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
                <div class="row">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>
                <p>
                    <?php
echo term_description(); ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?php
get_search_form();?>
            </div>

        </div>

        <!-- cartoes de obras -->
        <div class="row pb-4">
            <?php
get_template_part('template-parts/obra/content', 'cartao-obra');
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