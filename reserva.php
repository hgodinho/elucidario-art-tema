<?php
$args = array(
    'post_type' => 'obras',
    'tax_query' => array(
        'taxonomy' => 'classificacao',
        'field' => 'slug',
        'terms' => $classificacao->slug,
    ),
    'posts_per_page' => 1,
);
$queryimage = new WP_Query($args);
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $thumbnail = get_the_post_thumbnail_url('medium_large');
        ?>
                    <img class="card-img-top" src="<?php esc_url($thumbnail)?>" alt="Card image cap">
                    <?php
wp_reset_postdata();
    }
}
?>