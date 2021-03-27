<?php
/**
 * Template para box que mostra obras do autor
 *
 * @version 0.2
 * @since 0.2
 *
 * @author hgod.in
 *
 */
//wp_reset_query();
global $post;
?>
<div class="container">
    <div class="row py-4">
        <div class="col">
            <div class="row">
                <div class="col-12 pb-4">
                    <h3>Obras na coleção:
                    </h3>
                </div>
            </div>

            <?php
$autor = get_the_ID();

$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$args = array(
    'post_type' => 'obras',
    'post_status' => 'any',
    'relationship' => array(
        'id' => 'obras_to_autores',
        'to' => $post->ID,
    ),
    'posts_per_page' => 12,
    'paged' => $paged,
);
$connected = new WP_Query($args);
?>
            <div class="row pb-4">
                <?php
if ($connected->have_posts()):
    while ($connected->have_posts()): $connected->the_post();
        get_template_part('template-parts/obra/content', 'cartao-obra');
    endwhile;
endif;
?>
            </div>

            <?php

/*
$temp_query = $wp_query;
$wp_query = null;
$wp_query = $connected;

wp_reset_postdata();
*/
if (function_exists('bootstrap_pagination')) {
bootstrap_pagination($connected, 'page');
}
/*

$wp_query = null;
$wp_query = $temp_query;
 */

//wp_reset_postdata();
//wp_reset_query(  );
?>
        </div>
    </div>
</div>