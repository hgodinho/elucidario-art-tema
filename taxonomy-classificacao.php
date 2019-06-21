<?php
/**
 * template para taxonomia classificação sinle term
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.3
 * @since 0.3
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
<section id="primary" class="content-area">
    <main role="main" class="container">

        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <?php
get_search_form();?>
                </div>
                <div class="col-12 pb-4 pl-0">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php
get_template_part('template-parts/obra/content', 'cartao-obra');?>
            </div>

            <div class="cointainer">
                <?php
if (function_exists('bootstrap_pagination')) {
    bootstrap_pagination();
}?>
            </div>
        </div>
    </main>
</section>
<?php
get_footer();?>