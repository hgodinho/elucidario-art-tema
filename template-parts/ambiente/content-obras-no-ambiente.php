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
                    <form class="form-inline justify-content-end">
                        <div class="input-group input-group">
                            <input type="text" class="form-control" placeholder="encontre uma obra" aria-label="Encontre uma obra"
                                aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
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
    )
);

while ($querybyterm->have_posts()): $querybyterm->the_post();

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
?>

        </div>
    </div>
</div>