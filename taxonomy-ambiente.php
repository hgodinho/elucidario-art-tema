<?php
/**
 * template para taxonomia ambiente single term
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
                <div class="col-12">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>
            </div>
        </div>

        <div class="border-top border-primary mx-3"></div>

        <div class="container pt-4">
            <?php get_template_part('template-parts/ambiente/content', 'obras-no-ambiente');?>
        </div>
    </main>
</section>

<?php
/**
 * a mágina termina aqui
 */
get_footer();
?>