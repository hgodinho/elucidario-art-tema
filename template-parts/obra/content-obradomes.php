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
		'tax_query' => array(
			array(
				'taxonomy' => 'classificacao',
				'field' => 'slug',
				'terms' => 'obra-do-mes',
			),
		),
		'order' => 'ASC',
		'posts_per_page' => 1,
    );
    $loop = new WP_Query($args);
    while ($loop->have_posts()): $loop->the_post();

        /**
         * ficha técnica => obra variaveis
         * ficha técnica 'ACF' => obra
         */
        $fichatecnica_obra = get_field('ficha_tecnica');
        $fotografo = get_field('fotografo');
        $descricao = get_field('descricao');
		$thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium_large', array('class' => 'img-fluid d-block'));
		$linkobra = get_permalink();

<<<<<<< HEAD:template-parts/obra/content-obradomes.php
        /**
         * taxonomias obras variaveis
         */
        /**
         * ambientes
         */
        $ambiente = get_the_terms(get_the_ID(), 'ambiente');
        $ambiente_list = join(', ', wp_list_pluck($ambiente, 'name'));
        $ambiente_url = get_term_link($ambiente_list, 'ambiente');
        /**
         * nucleos
         */
        $nucleo = get_the_terms(get_the_ID(), 'nucleo');
        $nucleo_list = join(', ', wp_list_pluck($nucleo, 'name'));
        $nucleo_url = get_term_link($nucleo_list, 'nucleo');
        /**
         * classificacao
         */
        $classificacao = get_the_terms(get_the_ID(), 'classificacao');
        $classificacao_list = join(', ', wp_list_pluck($classificacao, 'name'));
        $classificacao_url = get_term_link($classificacao_list, 'classificacao');

        ?>
=======
        /** taxonomias obras */
        /** ambientes */
		$ambiente = get_the_term_list( get_the_ID(), 'ambiente', '' , ', ' , '');

        /** nucleos */
		$nucleo = get_the_term_list( get_the_ID(), 'nucleo', '' , ', ' , '');

        /** classificacao */
		$classificacao = get_the_term_list( get_the_ID(), 'classificacao', '' , ', ' , '');

		?>
>>>>>>> acb16f3ca5fc64b4cbb0d110743ffcdcd49bcd5e:template-parts/content-obradomes.php

<!-- abre obra do mês -->
<div class="row pb-4">
	<div class="col mt-4">
		<h2>Obra do mês
			<p class="h5 text-muted">destaque selecionado mensalmente.</p>
		</h2>
	</div>
</div>
<!-- // abre obra do mês -->

<!-- Obra do mês -->
<div class="container blog-post">
	<!-- titulo obra -->
	<div class="row pb-2">
		<div class="col">
			<h3 class="blog-post-title">
				<?php the_title();?>,
				<small class="text-muted">
					<?php echo $fichatecnica_obra['dataperiodo'] .'. '; ?>
					<span style="font-size:80%"><a href="<?php the_permalink();?>">Ver obra →</a></span>
					</small>

			</h3>
		</div>
	</div>
	<!-- // titulo obra -->

	<!-- infos obra -->
	<div class="row pb-3 mb-2">
		<!-- imagem obra -->
		<div class="col-12 col-lg-7">
			<?php echo $thumbnail; ?>
		</div>
		<!-- // imagem obra -->

		<!-- detalhes -->
		<div class="col-12 col-lg-5">

			<div class="row my-4">

				<?php
				/**
				 * Autor
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
					</div>
					<div class="col-12 px-0">
						<p class="text-muted">
							(<?php echo $fichatecnica_autor['dataperiodo_inicial'] ?>
							—
							<?php echo $fichatecnica_autor['dataperiodo_final'] ?>)
						</p>
					</div>
				</div>
				<div class="col-12">
					<p class="d-inline-flex d-lg-inline-flex"><a href="<?php the_permalink();?>">Mais deste
							autor →</a></p>
				</div>
				<?php
    endwhile;
        wp_reset_postdata();
		?>

			</div>

			<!-- informações -->
			<div class="row">
				<div class="col-12">
					<dl class="row mt-2">
						<dt class="col-12 col-sm-5">Tombo:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta">
							<?php echo $fichatecnica_obra['tombo']; ?></dt>
						<dt class="col-12 col-sm-5">Origem:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta">
							<?php echo $fichatecnica_obra['origem']; ?>
						</dd>
						<dt class="col-12 col-sm-5">Data:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta">
							<?php echo $fichatecnica_obra['dataperiodo']; ?></dt>
						<dt class="col-12 col-sm-5">Material:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta">
							<?php echo $fichatecnica_obra['material']; ?>
						</dd>
						<dt class="col-12 col-sm-5">Medidas:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta">
							<?php echo $fichatecnica_obra['dimensoes']; ?>
						</dd>
						<dt class="col-12 col-sm-5">Classificação:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $classificacao; ?></dd>
						<dt class="col-12 col-sm-5">Ambiente:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $ambiente; ?></dd>
						<dt class="col-12 col-sm-5">Núcleo:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $nucleo; ?></dd>
						<dt class="col-12 col-sm-5">Fotografia:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta">
							<?php echo $fotografo; ?>
						</dd>
					</dl>
				</div>
			</div>
			<!-- // informações -->
		</div>

		<!-- descrição -->
		<div class="col-12 mt-4">
			<h4>Descrição</h4>
			<p>
				<?php echo $descricao ?>
			</p>
		</div>
		<!-- //descrição -->

		<?php
endwhile;
}
?>

</div>
