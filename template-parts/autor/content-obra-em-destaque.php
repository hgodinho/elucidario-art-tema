<?php
/**
 * Template obra em destaque para single-autor
 *
 * @version 0.1
 * @since 0.2
 *
 * @author hgod.in
 */

$connected = new WP_Query(
    array(
        'post_type' => 'obras',
        'relationship' => array(
            'id' => 'obra_em_destaque',
            'from' => get_the_ID(),
        ),
        'posts_per_page' => '1',
    )
);
while ($connected->have_posts()): $connected->the_post();

    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium_large', array('class' => 'card-img-top img-fluid d-block mb-2'));
    $fichatecnica_obra = get_field('ficha_tecnica');
    $permalink = get_permalink();

    echo '<div class="col-md-4 mb-5">';
    echo '<div class="card" style="width: 18rem;">';
    echo $thumbnail;
    echo '<div class="card-body">';
    echo '<h5 class="card-title">';
    the_title();
    echo ', <small class="text-muted">';
    echo $fichatecnica_obra['dataperiodo'];
    echo '.</small>';
    echo '</h5>';
    echo '<dl class="row pt-2">';
    echo '<dt class="col-md-5 col-sm-12">Material:</dt>';
    echo '<dd class="col-md-7 col-sm-12">';
    echo $fichatecnica_obra['material'];
    echo '</dd>';
    echo '<dt class="col-md-5 col-sm-12">Medidas:</dt>';
    echo '<dd class="col-md-7 col-sm-12">';
    echo $fichatecnica_obra['dimensoes'];
    echo '</dd>';
    echo '<dt class="col-md-5 col-sm-12">Tombo:</dt>';
    echo '<dd class="col-md-7 col-sm-12">';
    echo $fichatecnica_obra['tombo'];
    echo '</dd>';
    echo '</dl>';
    echo '</div>';
    echo '<div class="card-footer">';
    echo '<a href="' . esc_url($permalink) . '" class="card-link">Ver obra</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

endwhile;
wp_reset_query();
