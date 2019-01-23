<?php
/**
 * Snippet de obras relacionadas
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @since 0.2
 * @version 0.1
 *
 * @author hgodinho.com
 *
 */

//Get array of terms
$terms = get_the_terms($post->ID, 'classificacao', 'string');

//Pluck out the IDs to get an array of IDS
if(!empty($terms)){
    $term_slug = wp_list_pluck($terms, 'slug', 'id');
} 

print_r($term_slug);

$relacionado_query = new WP_Query(array(
    'post_type' => 'obras',
    'post_status' => 'any',
    'tax_query' => array(
        array(
            'taxonomy' => 'classificacao',
            'field' => 'slug',
            'terms' => $term_slug
           // 'operator' => 'IN', //Or 'AND' or 'NOT IN'
        )),
    'posts_per_page' => 5,
    //'ignore_sticky_posts' => 1,
    'orderby' => 'rand',
    //'order' => 'DESC',
    'post__not_in' => array($post->ID),
));
?>

<?php
if ($relacionado_query->have_posts()) {

    echo '<div class="container border-top m-3">';
    echo '<div class="row pt-3">';
    echo '<h3 class="pb-3">Obras Relacionadas:</h3>';
    echo '<div class="owl-carousel owl-theme py-2">';

    while ($relacionado_query->have_posts()): $relacionado_query->the_post();
    


        $thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium_large', array('class' => 'card-img-top img-fluid d-block mb-2'));
		$fichatecnica_obra = get_field('ficha_tecnica');
		$permalink = get_permalink();

        echo '<div class="card" style="width: 18rem;">';
        echo $thumbnail;
        echo '<div class="card-body">';
        echo '<h5 class="card-title">';
		the_title();
		echo ', <small class="text-muted">';
		echo $fichatecnica_obra['dataperiodo'];
		echo '.</small>';
        echo '</h5>';

        /**
         * ficha tecnica autor
         */
        $connected = new WP_Query(
            array(
                'relationship' => array(
                    'id' => 'obras_to_autores',
                    'from' => get_the_ID(),
                    //'sibling' => true,
                ),
                'nopaging' => true,
            )
        );
        while ($connected->have_posts()): $connected->the_post();
            $fichatecnica_autor = get_field('ficha_tecnica');
            echo '<h6 class="card-subtitle mb-2 text-muted">';
            the_title();
            echo '</h6>';
        endwhile;
		wp_reset_query();


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

    endwhile;
    wp_reset_query();
}
?>
</div>
</div>
</div>

