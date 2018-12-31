<?php

/**
 * ficha técnica => obra variaveis
 */
$fichatecnica_obra = get_field('ficha_tecnica');
$fotografo = get_field('fotografo');
$descricao = get_field('descricao');
$thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium_large', array('class' => 'img-fluid d-block'));
$linkobra = get_permalink();

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


	<!-- titulo obra -->
	<div class="row pb-2">
		<div class="col">
			<h3 class="blog-post-title">
				<?php the_title();?>,
				<small class="text-muted">
					<?php echo $fichatecnica_obra['dataperiodo'] . '. '; ?></small>

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

			<?php get_template_part('template-parts/obra/content', 'resumo_autor');?>

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
						<dd class="col-12 col-sm-7 blog-post-meta"><a href="<?php $classificacao_url;?>">
								<?php echo $classificacao_list; ?></a></dd>
						<dt class="col-12 col-sm-5">Ambiente:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta"><a href="<?php $ambiente_url;?>">
								<?php echo $ambiente_list; ?></a></dd>
						<dt class="col-12 col-sm-5">Núcleo:</dt>
						<dd class="col-12 col-sm-7 blog-post-meta"><a href="<?php $nucleo_url;?>">
								<?php echo $nucleo_list; ?></a></dd>
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

		<?php get_template_part('template-parts/obra/content', 'campos_clonaveis');?>



