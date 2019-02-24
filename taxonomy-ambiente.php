<?php
/**
 * template para taxonomia ambiente single term
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
        <!-- a magica inicia aqui -->
        <div class="row">
            <div class="col-12 col-lg-7">
                <?php get_template_part('template-parts/carousel/carousel', 'ambiente');?>
            </div>
            <div class="col-12 col-lg-5 pt-4">
                <?php
get_template_part('template-parts/header/header', 'archive');?>
            </div>
            <p>
                <?php echo term_description(); ?>
            </p>
        </div>
    </div>
    </div>
</main>
<div class="container">
    <?php get_template_part('template-parts/ambiente/content', 'obras-no-ambiente');?>
</div>

<?php
/**
 * a mágina termina aqui
 */
get_footer();
?>