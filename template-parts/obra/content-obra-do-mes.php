<?php
/**
 * Template da Obra do mês
 *
 * utilizada na home page
 *
 * @since 0.1
 *
 */

if (have_posts()) {
    $args = array(
        'post_type' => 'obras',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => 'obra_domes',
                'compare' => '=',
                'value' => '1',
            ),
        ),
    );

    $loop = new WP_Query($args);

    while ($loop->have_posts()): $loop->the_post();
        ?>

	<!-- abre obra do mês -->
	<div class="row pb-4">
		<div class="col mt-4">
			<h2>Obra do mês
				<p class="h5 text-muted">destaque selecionado mensalmente.</p>
			</h2>
		</div>
	</div>
	<!-- // abre obra do mês -->

        <a href="<?php the_permalink(); ?>">Ver obra →</a>
			<?php
    get_template_part('template-parts/obra/content', 'obra');

    endwhile;
}
?>

</div>
