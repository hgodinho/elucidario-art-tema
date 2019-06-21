<?php
/**
 * sub template para conteúdo da obra - single
 *
 * @version 0.4
 * @since 0.1
 *
 * @author hgodinho.com
 */

/**
 * ficha técnica => obra variaveis
 */
//$fichatecnica_obra = get_field('ficha_tecnica');
$tombo_obj = get_field_object('field_5bfd4663b4645');
$origem_obj = get_field_object('field_5bfd46adb4646');
$dataperiodo_obj = get_field_object('field_5bfd46cab4647');
$material_obj = get_field_object('field_5bfd46fcb4648');
$dimensoes_obj = get_field_object('field_5bfd47ebb4649');
$fotografo_obj = get_field_object('field_5c0ec52b96602');
$descricao_obj = get_field_object('field_5bfdeeb084777');

$thumbnail = get_the_post_thumbnail(get_the_ID(), '', array('class' => 'img-thumbnail mx-auto d-block', 'style' => 'width: 100%; height: 100%; object-fit: cover;'));
$thumbnail_link = get_the_post_thumbnail_url(get_the_ID(), 'full');
$linkobra = get_permalink();

/**
 * taxonomias obras variaveis
 */
$ambiente = get_the_terms(get_the_ID(), 'ambiente');
$nucleo = get_the_terms(get_the_ID(), 'nucleo');
$classificacao = get_the_terms(get_the_ID(), 'classificacao');
?>


<div class="col-12 px-0 py-4">
	<?php
get_search_form();?>
</div>

<!-- titulo obra -->
<div class="col py-4 pl-0">
	<h1 class="blog-post-title text-primary">
		<?php the_title();?>,
		<small class="text-muted">
			<?php echo $dataperiodo_obj['value'] . '. '; ?>
		</small>
	</h1>
</div>
<!-- // titulo obra -->

<!-- infos obra -->
<div class="row pb-3 mb-2">
	<div class="col-12 col-lg-7 mb-4">
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
		<div class="row mb-4">
			<!-- autor -->
			<?php get_template_part('template-parts/obra/content', 'resumo_autor');?>
			<!-- // autor -->
		</div>

		<!-- informações tabela -->
		<div class="row">
			<div class="col-12">
				<table class="table table-striped container-fluid mb-0">
					<tbody>
						<tr>
							<th scope="row" class="cartao-obra-row">Tombo</th>
							<td>
								<?php echo $tombo_obj['value']; ?>
							</td>
						</tr>
						<tr>
							<th scope="row" class="cartao-obra-row">Origem</th>
							<td>
								<?php echo $origem_obj['value']; ?>
							</td>
						</tr>
						<tr>
							<th scope="row" class="cartao-obra-row">Data</th>
							<td>
								<?php echo $dataperiodo_obj['value']; ?>
							</td>
						</tr>
						<tr>
							<th scope="row" class="cartao-obra-row">Material<br>ou técnica</th>
							<td>
								<?php echo $material_obj['value']; ?>
							</td>
						</tr>
						<tr>
							<th scope="row" class="cartao-obra-row">Medidas</th>
							<td>
								<?php echo $dimensoes_obj['value']; ?>
							</td>
						</tr>
						<?php
if ($classificacao) {?>
						<tr>
							<th scope="row" class="cartao-obra-row">Classificação</th>
							<td>
								<?php
foreach ($classificacao as $classi_single) {
    $classi_link = get_term_link($classi_single);
    echo '<a href="' . esc_url($classi_link) . '">' . $classi_single->name . '.</a> ';
}?>
							</td>
						</tr>
						<?php
}
if ($ambiente) {?>
						<tr>
							<th scope="row" class="cartao-obra-row">Ambiente</th>
							<td>
								<?php
foreach ($ambiente as $ambiente_single) {
    $ambiente_link = get_term_link($ambiente_single);
    echo '<a href="' . esc_url($ambiente_link) . '">' . $ambiente_single->name . '.</a> ';
}?>
							</td>
						</tr>
						<?php
}
if ($nucleo) {?>
						<tr>
							<th scope="row" class="cartao-obra-row">Núcleo</th>
							<td>
								<?php
foreach ($nucleo as $nucleo_single) {
    $nucleo_link = get_term_link($nucleo_single);
    echo '<a href="' . esc_url($nucleo_link) . '">' . $nucleo_single->name . '.</a> ';
}?>
							</td>
						</tr>
						<?php
}
if ($fotografo_obj['value']) {?>
						<tr>
							<th scope="row" class="cartao-obra-row">Fotografia</th>
							<td>
								<?php echo $fotografo_obj['value']; ?>
							</td>
						</tr>
						<?php
}?>

					</tbody>
				</table>
			</div>
		</div>
		<!-- // informações tabela -->
	</div>

	<!-- descrição -->
	<?php
if ($descricao_obj['value']) {
    echo '<div class="col-12 mt-4">';
    echo '<h4>Descrição:</h4>';
    echo '<p>';
    echo $descricao_obj['value'];
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
		<?php get_template_part('template-parts/modal/modal', 'image');?>
	</div>