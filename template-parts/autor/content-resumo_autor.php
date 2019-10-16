<?php
/**
 * Template Resumo do autor
 *
 * Utilizado em diversos templates ao longo do tema.
 *
 * @package WordPress
 * @subpackage Elucidário.art
 * @since 0.1
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
    /**
     * ficha tecnica autor
     */
    $fichatecnica_autor = get_field('ficha_tecnica');
    ?>


	<div class="col-12">
        <small>autoria:</small>
	    <h3>
	        <?php the_title();?>
	    </h3>
	    <?php
    if (get_the_title() != 'Autor Desconhecido') {
        if ($fichatecnica_autor['dataperiodo_inicial']) {
            echo '<p class="text-muted h5">(';
            echo $fichatecnica_autor['dataperiodo_inicial'];
            if ($fichatecnica_autor['dataperiodo_final']) {
                echo ' — ';
                echo $fichatecnica_autor['dataperiodo_final'];
                echo ')</p>';
            } else {
                echo ')</p>';
            }
        }
        ?>
	    <span class="d-inline-flex d-lg-inline-flex"><a href="<?php the_permalink();?>">Mais deste
	            autor →</a></span>
	    <?php
    } else {
        ?>
	    <span class="d-inline-flex d-lg-inline-flex"><a href="<?php the_permalink();?>">Mais deste
	            autor →</a></span>
	    <?php
    }
    ?>

	</div>

	<?php
endwhile;
wp_reset_postdata();
?>