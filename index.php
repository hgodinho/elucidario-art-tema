<?php get_header();?>

<!-- jumbtron descrubra a coleção ema klabin -->
<div class="jumbotron jumbotron-fluid margin-top-home text-center jumbotron-bg text-primary">
	<div class="container">
		<h1>Descubra a Coleção Ema Klabin!</h1>
		<!-- formulario de busca -->
		<div class="col-12">
			<form class="form-inline justify-content-center my-5">
				<div class="input-group input-group mb-3">
					<input type="text" class="form-control" style="width: 15rem" placeholder="encontre uma obra" aria-label="Encontre uma obra"
					 aria-describedby="button-addon2">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<!-- // formulario de busca -->
		<!-- features list -->
		<div class="row justify-content-start">
			<div class="col-lg-3"></div>
			<div class="col-lg-6 text-left">
				<ul>
					<li class="">Mais de 1600 itens na coleção</li>
					<li class="">
						<a href="" class="text-white">Artes Decorativas</a>,
						<a href="" class="text-white">Arte Africana</a>,
						<a href="" class="text-white">Arte Oriental</a>...</li>
					<li class="">
						<a href="" class="text-white">Lasar Segall</a>,
						<a href="" class="text-white">Tarsila do Amaral</a>,
						<a href="" class="text-white">Renoir,</a>
						<a href="" class="text-white">Rembrandt</a>...</li>
				</ul>
			</div>
			<div class="col-lg-3"></div>
		</div>
		<!-- // features list -->
		<!-- legenda obra jumbotron -->
		<div class="row-fluid mt-4 mb-0">
			<small class="">
				*Relógio de parede. Jacob Boucheret (maquinário) e oficina de André-Charles Boulle (caixa).
				França,
				c. 1710-1720. Foto: Henrique Luz. <a href="single-obra.html">Ver obra →</a>
			</small>
		</div>
		<!-- legenda obra jumbotron -->
	</div>
</div>
<!-- jumbotron descubra a coleção ema klabin -->

<div class="blog-main container">

	<?php
if (have_posts()) {
    $args = array(
        'post_type' => 'obras',
        'post_per_page' => 1
    );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts()): $loop->the_post();
    $fichatecnica = get_field('ficha_tecnica');
    $fotografo = get_field('fotografo');
    $descricao = get_field('descricao');

    $ambiente = get_the_terms( get_the_ID(), 'ambiente' );
    $ambiente_list = join(', ', wp_list_pluck($ambiente, 'name') );
    $ambiente_url = get_term_link( $ambiente_list, 'ambiente' );
    
    $nucleo = get_the_terms( get_the_ID(), 'nucleo' );
    $nucleo_list = join(', ', wp_list_pluck($nucleo, 'name'));
    $nucleo_url = get_term_link( $nucleo_list, 'nucleo' );

    $classificacao = get_the_terms( get_the_ID(), 'classificacao' );
    $classificacao_list = join(', ', wp_list_pluck($classificacao, 'name'));
    $classificacao_url = get_term_link( $classificacao_list, 'classificacao' );
    
    ?>

	<!-- abre obra do mês -->
	<div class="row pb-4">
		<div class="col mt-4">
			<h2>Obra do mês
				<p class="h5 text-muted">destaques selecionados mensalmente.</p>
			</h2>
		</div>
	</div>
	<!-- // abre obra do mês -->

	<!-- Obra do mês -->
	<div class="container blog-post">
		<!-- titulo obra -->
		<div class="row pb-2">
			<div class="col">
				<h3 class="blog-post-tutle">
                    <?php the_title();?>,  
					<small class="text-muted"> <?php echo $fichatecnica['dataperiodo']; ?></small>
				</h3>
			</div>
		</div>
		<!-- // titulo obra -->

		<!-- infos obra -->
		<div class="row pb-3 mb-2">
			<!-- imagem obra -->
			<div class="col-12 col-lg-7">
				<img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
			</div>
			<!-- // imagem obra -->

			<!-- detalhes -->
			<div class="col-12 col-lg-5">
				<!-- autor -->
				<div class="row my-4">
					<?php
                        $connected = new WP_Query(
                            array(
                                'relationships' => array(
                                    'id' => 'obras_to_autores',
                                    'from' => get_the_ID(),
                                    'sibling' => true,
                                ),
                                //'nopaging' => true,
                            )
                        );
                        while ($connected->have_posts()) : $connected->the_post();
                        ?>
					<div class="col-12">
						<div class="col-12 px-0">
							<h3>
								<?php the_title(); ?>
							</h3>
						</div>
						<div class="col-12 px-0">
							<p class="text-muted">(Vilna, 21 de julho de 1891
								<br>— São Paulo, 2 de agosto de 1957)</p>
						</div>
					</div>
					<div class="col-12">
						<p class="d-inline-flex d-lg-inline-flex"><a href="<?php the_permalink(); ?>">Mais deste
								autor →</a></p>
					</div>
					<?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
				</div>
				<!-- autor -->
				<!-- informações -->
				<div class="row">
					<div class="col-12">
						<dl class="row mt-2">
							<dt class="col-12 col-sm-5">Tombo:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $fichatecnica['tombo']; ?></dt>
							<dt class="col-12 col-sm-5">Origem:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $fichatecnica['origem']; ?></dd>
							<dt class="col-12 col-sm-5">Data:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $fichatecnica['dataperiodo']; ?></dt>
							<dt class="col-12 col-sm-5">Material:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $fichatecnica['material']; ?></dd>
							<dt class="col-12 col-sm-5">Medidas:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $fichatecnica['dimensoes']; ?></dd>
                            <dt class="col-12 col-sm-5">Classificação:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><a href="<?php echo $classificacao_url ?>"><?php echo $classificacao_list ?></a></dd>
                            <dt class="col-12 col-sm-5">Ambiente:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><a href="<?php echo $ambiente_url ?>"><?php echo $ambiente_list ?></a></dd>
							<dt class="col-12 col-sm-5">Núcleo:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><a href="<?php echo $nucleo_url ?>"><?php echo $nucleo_list ?></a></dd>
							<dt class="col-12 col-sm-5">Fotografia:</dt>
							<dd class="col-12 col-sm-7 blog-post-meta"><?php echo $fotografo ?></dd>
						</dl>
					</div>
				</div>
				<!-- // informações -->
			</div>
			<!-- //detalhes -->

			<!-- descrição -->
			<div class="col-12 mt-4">
				<h4>Descrição</h4>
				<p><?php echo $descricao ?>
				</p>
			</div>
			<!-- //descrição -->

		</div><!-- /.blog-post -->
	</div>

	<?php
endwhile;
}
?>

	<?php get_footer();?>