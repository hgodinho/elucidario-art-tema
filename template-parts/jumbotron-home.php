<?php
/**
 * Template para o Jumbotron da home page
 *
 * Inclui formulário de busca, features list e imagem de fundo
 *
 * @since 0.1
 */

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
$obra_do_mes = new WP_Query($args);
if ($obra_do_mes->have_posts()) {
    while ($obra_do_mes->have_posts()): $obra_do_mes->the_post();
        $fichatecnica_obra = get_field('ficha_tecnica');
		$fotografo = get_field('fotografo');
	    $thumbnail_obradomes = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
<div class="jumbotron jumbotron-fluid text-center text-secondary" style="background-image: url('<?php echo $thumbnail_obradomes ?>'); background-repeat: no-repeat; background-position: top center; background-size:cover;">


	<div class="container">
		<div class="row">
			<div class="col-12 order-first">
				<h1>Descubra a Coleção Ema Klabin!</h1>
			</div>
			<!-- legenda obra jumbotron -->
			<div class="col-12 order-last">
				<div class="row-fluid mt-4 mb-0">
					<small>
						<?php the_title();
        echo ' (';
        echo $fichatecnica_obra['dataperiodo'];
        echo '). ';

        $connected = new WP_Query(
            array(
                'relationship' => array(
                    'id' => 'obras_to_autores',
                    'from' => get_the_ID(),
                ),
                'nopaging' => true,
            )
        );
        while ($connected->have_posts()): $connected->the_post();
            the_title();
            echo '. ';
		endwhile;
		echo 'Fotografia: ';
		echo $fotografo;
        ?>
					</small>
				</div>
			</div>
			<!-- legenda obra jumbotron -->
			<?php
endwhile;
    wp_reset_query();
}
?>
			<!-- formulario de busca -->
			<div class="col-12 order-2">
				<div class="d-flex justify-content-center my-5">
					<?php get_search_form(true);?>
				</div>
				<p class="lead text-center">Mais de 1600 itens na coleção!</p>
			</div>
			<!-- // formulario de busca -->

			<!-- features list -->
			<div class="col-12 order-3">
				<div class="row justify-content-start">
					<div class="col-lg-3"></div>
					<div class="col-lg-6 text-left">
						<ul>
							<li>
								<?php
$exclude = get_term_by('slug', 'sem-localizacao', 'ambiente');
$ambiente = array(
    'taxonomy' => 'ambiente',
    'orderby' => 'name',
    'order' => 'DESC',
    'show_count' => false,
    'title_li' => '',
    'separator' => ', ',
    'style' => 'none',
    'number' => 2,
    'exclude' => $exclude->term_id,
);
wp_list_categories($ambiente);
?>
								<a href="<?php echo get_bloginfo('url') . '/pag/classificacoes' ?>">
									Todos os cômodos →
								</a>
							</li>
							<li>
								<?php
$exclude = get_term_by('slug', 'sem-nucleo', 'nucleo');
$nucleo = array(
    'taxonomy' => 'nucleo',
    'order' => 'ASC',
    'orderby' => 'slug',
    'show_count' => false,
    'title_li' => '',
    'separator' => ', ',
    'style' => 'none',
    'number' => 2,
    'exclude' => $exclude->term_id,
);
wp_list_categories($nucleo);?>
								<a href="<?php echo get_bloginfo('url') . '/pag/nucleos' ?>">
									Todo o acervo →
								</a>
							</li>
							<li>
								<?php
/**
 * lista autores no jumbotron
 */
$autores_loop = new WP_Query(
    array(
        'post_type' => 'autores',
        'posts_per_page' => 2,
        'posts_per_archive_page' => 2,
        'order' => 'DESC',
        'orderby' => 'rand',
    )
);
while ($autores_loop->have_posts()): $autores_loop->the_post();
    the_title('<a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a>, ');
endwhile;
wp_reset_query();
?>
								<a href="<?php echo get_post_type_archive_link('autores'); ?>">
									Todos os autores →
								</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-3"></div>
				</div>
			</div>
			<!-- // features list -->


		</div>
	</div>
</div>