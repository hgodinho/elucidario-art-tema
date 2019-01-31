<?php
/**
 * Template para box que mostra obras do autor
 *
 * @version 0.1
 * @since 0.2
 *
 * @author hgodinho.com
 *
 */

?>

<div class="row py-4 border-top">
    <div class="col">
        <div class="row">
            <!-- Título -->
            <div class="col-12 col-sm-7 pb-4">
                <h3>Obras na coleção:
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
$autor = get_the_ID();
$args = array(
    'post_type' => 'obras',
    'post_status' => 'any',
    'relationship' => array(
        'id' => 'obras_to_autores',
        'to' => $post->ID,
    ),
    'posts_per_page' => 6,
    //'post__not_in' => array($post->ID),
);
$connected = new WP_Query($args);

//$connected[$found_posts];
//var_dump($connected);

while ($connected->have_posts()): $connected->the_post();
    get_template_part('template-parts/obra/content', 'cartao-obra');
endwhile;
?>

            <?php
if (function_exists('bootstrap_pagination')) {
    bootstrap_pagination($connected);
}
?>
        </div>
    </div>
</div>