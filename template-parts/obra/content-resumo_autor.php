<?php
/**
 * Template Resumo do autor
 * 
 * Utilizado em diversos templates ao longo do tema.
 * 
 * @package WordPress
 * @subpackage Wiki-Ema
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
	<div class="col-12 px-0">
		<h3>
			<?php the_title();?>
		</h3>
		<p class="text-muted h5">
			(<?php echo $fichatecnica_autor['dataperiodo_inicial'] ?> —
			<?php echo $fichatecnica_autor['dataperiodo_final'] ?>)
		</p>
		<span class="d-inline-flex d-lg-inline-flex"><a href="<?php the_permalink();?>">Mais deste
				autor →</a></span>
	</div>
</div>
<?php
endwhile;
wp_reset_postdata();
?>