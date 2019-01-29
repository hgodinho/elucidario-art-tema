<?php
/**
 * sub template para conteúdo da obra - single
 *
 * @version 0.2
 * @since 0.1
 *
 * @author hgodinho.com
 */

/**
 * ficha técnica => obra variaveis
 */
$fichatecnica_obra = get_field('ficha_tecnica');
$fotografo = get_field('fotografo');
$descricao = get_field('descricao');
$thumbnail = get_the_post_thumbnail(get_the_ID(), '', array('class' => 'img-thumbnail mx-auto d-block', 'style' => 'width: 100%; height: 100%; object-fit: cover;'));
$thumbnail_link = get_the_post_thumbnail_url(get_the_ID(),'full');
$linkobra = get_permalink();

/**
 * taxonomias obras variaveis
 */
$ambiente = get_the_terms(get_the_ID(), 'ambiente');
$nucleo = get_the_terms(get_the_ID(), 'nucleo');
$classificacao = get_the_terms(get_the_ID(), 'classificacao');

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

	<div class="col-12 col-lg-7">
		<!-- imagem obra -->
		<div style="max-height:480px; height: 480px;">
			<a href="<?php echo $thumbnail_link ?>" data-toggle="modal" data-target="#image-modal">
				<?php echo $thumbnail; ?>
			</a>
		</div>
		<!-- // imagem obra -->

		<!-- grade de botoes de ações rápidas -->
		<?php get_template_part('template-parts/obra/content', 'botoes-funcao');?>
		<!-- //grade de botoes de ações rápidas -->
	</div>

	<!-- detalhes -->
	<div class="col-12 col-lg-5">

		<div class="row my-4">
			<!-- autor -->
			<?php get_template_part('template-parts/obra/content', 'resumo_autor');?>
			<!-- // autor -->
		</div>

		<!-- informações tabela -->
		<div class="row">
			<div class="col-12">
				<dl class="row mt-2">

					<dt class="col-12 col-sm-5">Tombo:</dt>
					<dd class="col-12 col-sm-7 blog-post-meta">
						<?php echo $fichatecnica_obra['tombo']; ?>
					</dd>

					<dt class="col-12 col-sm-5">Origem:</dt>
					<dd class="col-12 col-sm-7 blog-post-meta">
						<?php echo $fichatecnica_obra['origem']; ?>
					</dd>

					<dt class="col-12 col-sm-5">Data:</dt>
					<dd class="col-12 col-sm-7 blog-post-meta">
						<?php echo $fichatecnica_obra['dataperiodo']; ?>
					</dd>

					<dt class="col-12 col-sm-5">Material:</dt>
					<dd class="col-12 col-sm-7 blog-post-meta">
						<?php echo $fichatecnica_obra['material']; ?>
					</dd>

					<dt class="col-12 col-sm-5">Medidas:</dt>
					<dd class="col-12 col-sm-7 blog-post-meta">
						<?php echo $fichatecnica_obra['dimensoes']; ?>
					</dd>

					<?php
if ($classificacao) {
    echo '<dt class="col-12 col-sm-5">Classificação:</dt>';
    echo '<dd class="col-12 col-sm-7 blog-post-meta">';
    foreach ($classificacao as $classi_single) {
        $classi_link = get_term_link($classi_single);
        echo '<a href="' . esc_url($classi_link) . '">' . $classi_single->name . '.</a> ';
    }
    echo '</dd>';
}

if ($ambiente) {
    echo '<dt class="col-12 col-sm-5">Ambiente:</dt>';
    echo '<dd class="col-12 col-sm-7 blog-post-meta">';
    foreach ($ambiente as $ambiente_single) {
        $ambiente_link = get_term_link($ambiente_single);
        echo '<a href="' . esc_url($ambiente_link) . '">' . $ambiente_single->name . '.</a> ';
    }
    echo '</dd>';
}

if ($nucleo) {
    echo '<dt class="col-12 col-sm-5">Núcleo:</dt>';
    echo '<dd class="col-12 col-sm-7 blog-post-meta">';
    foreach ($nucleo as $nucleo_single) {
        $nucleo_link = get_term_link($nucleo_single);
        echo '<a href="' . esc_url($nucleo_link) . '">' . $nucleo_single->name . '.</a> ';
    }
    echo '</dd>';
}

if ($fotografo) {
    echo '<dt class="col-12 col-sm-5">Fotografia:</dt>';
    echo '<dd class="col-12 col-sm-7 blog-post-meta">';
    echo $fotografo;
    echo '</dd>';
}
?>
				</dl>
			</div>
		</div>
		<!-- // informações tabela -->
	</div>

	<!-- descrição -->
	<?php
if ($descricao) {
    echo '<div class="col-12 mt-4">';
    echo '<h4>Descrição:</h4>';
    echo '<p>';
    echo $descricao;
    echo '</p>';
    echo '</div>';
}
?>

<?php
/**
 * Image Modal
 */
?>
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image" aria-hidden="true">
    <?php get_template_part('template-parts/modal/modal', 'image'); ?>
</div>