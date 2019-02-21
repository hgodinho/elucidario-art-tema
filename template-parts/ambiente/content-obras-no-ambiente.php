<?php
/**
 * Template para box que mostra obras no ambiente
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 */
$term = get_queried_object();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

//echo $termslug;
?>

<div class="row py-4">
    <div class="col">
        <div class="row">
            <!-- Título -->
            <div class="col-12 col-sm-7 pb-4">
                <h3>Obras neste ambiente:
                </h3>
            </div>
            <!-- // Título -->

            <!-- formulario de busca -->
            <div class="col-12 col-sm-5 pb-4">
                <div class="col-12">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <!-- // formulario de busca -->
        </div>

        <!-- cartoes de obras -->
        <div class="row pb-4">

            <?php
$querybyterm = new WP_Query(
    array(
        'post_type' => 'obras',
        'tax_query' => array(
            array (
                'taxonomy' => 'ambiente',
                'field' => 'slug',
                'terms' => $term->slug,
            )
        ),
        'posts_per_page' => '6',
        'paged' => $paged,
    )
);

while ($querybyterm->have_posts()): $querybyterm->the_post();
get_template_part('template-parts/obra/content', 'cartao-obra');
endwhile;
?>
            <div class="cointainer mt-4">
                <?php
if (function_exists('bootstrap_pagination')) {
bootstrap_pagination($querybyterm);
}
?>
            </div>

            <?php
wp_reset_query();
?>

        </div>

    </div>

</div>
</div>