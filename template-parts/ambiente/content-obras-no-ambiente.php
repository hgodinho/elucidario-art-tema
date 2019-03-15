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
?>
<div class="row py-4">
    <div class="col">

        <!-- cartoes de obras -->
        <?php
$querybyterm = new WP_Query(
    array(
        'post_type' => 'obras',
        'tax_query' => array(
            array(
                'taxonomy' => 'ambiente',
                'field' => 'slug',
                'terms' => $term->slug,
            ),
        ),
        'posts_per_page' => '9',
        'paged' => $paged,
    )
);
?>
        <div class="row pb-4">
            <?php
get_template_part('template-parts/obra/content', 'cartao-obra');
?>
        </div>
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