<?php
/**
 * Sub template para conteúdo da obra - single
 *
 * @version 0.4
 * @since 0.1
 *
 * @author hgodinho.com
 */

//var_dump($wp_query);
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
$googleac = get_field('google_a&c');
//var_dump($googleac);

$thumbnail = get_the_post_thumbnail(get_the_ID(), '', array('class' => 'image mx-auto d-block'));
$thumbnail_link = get_the_post_thumbnail_url(get_the_ID(), 'full');
$linkobra = get_permalink();
$meta = get_post_meta( get_the_ID());
//var_dump($meta['ficha_autor']);

/**
 * taxonomias obras variaveis
 */
$ambiente = get_the_terms(get_the_ID(), 'ambiente');
$nucleo = get_the_terms(get_the_ID(), 'nucleo');
$classificacao = get_the_terms(get_the_ID(), 'classificacao');
$last_classificacao = end($classificacao);
//var_dump($last_classificacao->name);
?>
<script type="application/ld+json">
	{
		"@context": "http://schema.org/",
		"@type": "VisualArtwork",
		"name": "<?php echo get_the_title(); ?>",
		"artMedium": "<?php echo $material_obj['value']; ?>",
		"artForm": "<?php echo $last_classificacao->name; ?>",
		"artist": "<?php echo end($meta['ficha_autor']); ?>",
		"dateCreated": "<?php echo $dataperiodo_obj['value']; ?>",
		"description": "<?php echo get_the_content(); ?>"
	}
</script>
<?php if (!is_front_page()) {?>
<div class="col-12 px-0 py-4">
	<?php
get_search_form();?>
</div>
<?php }?>

<!-- titulo obra -->
<div class="col py-4 pl-0">
	<h1 class="blog-post-title text-primary">
		<?php 
		if(function_exists('capitular')){
		capitular(get_the_title());
	}
		?>,
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
		<?php
if (is_front_page()) {
    ?>
		<a href="<?php echo $linkobra ?>">
			<div class="img-container">
				<?php echo $thumbnail; ?>
				<div class="img-overlay h-100 w-100">
					<i class="fas fa-search img-icon"></i>
				</div>
			</div>
		</a>
		<?php
} else {
    ?>
		<a href="<?php echo $thumbnail_link ?>" data-toggle="modal" data-target="#image-modal">
			<div class="img-container">
				<?php echo $thumbnail; ?>
				<div class="img-overlay h-100 w-100">
					<i class="fas fa-search img-icon"></i>
				</div>
			</div>
		</a>
		<?php
}?>
		<!-- // imagem obra -->

		<!-- grade de botoes de ações rápidas -->
		<?php if (!is_front_page()) {
    get_template_part('template-parts/obra/content', 'botoes-funcao');
}
?>
		<!-- //grade de botoes de ações rápidas -->
	</div>

	<!-- detalhes -->
	<div class="col-12 col-lg-5">
		<div class="row mb-4">
			<!-- autor -->
			<?php get_template_part('template-parts/autor/content', 'resumo_autor');?>
			<!-- // autor -->
		</div>

		<!-- informações tabela -->
		<div class="row">
			<div class="col-12">
				<table class="table table-striped container-fluid mb-0">
					<tbody>

						<?php if ($tombo_obj['value']): ?>
						<tr>
							<th scope="row" class="cartao-obra-row">Tombo</th>
							<td>
								<?php echo $tombo_obj['value']; ?>
							</td>
						</tr>
						<?php endif;?>

						<?php if ($origem_obj['value']): ?>
						<tr>
							<th scope="row" class="cartao-obra-row">Origem</th>
							<td>
								<?php echo $origem_obj['value']; ?>
							</td>
						</tr>
						<?php endif;?>

						<?php if ($dataperiodo_obj['value']): ?>
						<tr>
							<th scope="row" class="cartao-obra-row">Data</th>
							<td>
								<?php echo $dataperiodo_obj['value']; ?>
							</td>
						</tr>
						<?php endif;?>

						<?php if ($material_obj['value']): ?>
						<tr>
							<th scope="row" class="cartao-obra-row">Material<br>ou técnica</th>
							<td>
								<?php echo $material_obj['value']; ?>
							</td>
						</tr>
						<?php endif;?>

						<?php if ($dimensoes_obj['value']): ?>
						<tr>
							<th scope="row" class="cartao-obra-row">Medidas</th>
							<td>
								<?php echo $dimensoes_obj['value']; ?>
							</td>
						</tr>
						<?php endif;?>

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
    ?>
	<div class="col-12 mt-4">
		<h3>Descrição:</h4>
		<p>
			<?php echo $descricao_obj['value']; ?>
		</p>
	</div>
	<?php
} ?>

	<!-- Google A&C -->
	<?php
if ($googleac) {
    ?>
	<div class="col-12 mt-4">
		<h5>Google Arts&Culture (alta resolução):</h5>	
		<div class="embed-responsive embed-responsive-16by9 mt-4">
  <iframe class="embed-responsive-item" src="<?php echo esc_url($googleac)?>" allowfullscreen></iframe>
</div>
		</div>
	<?php
} ?>

<?php
/**
 * Image Modal
 */
?>
	<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image" aria-hidden="true">
		<?php get_template_part('template-parts/modal/modal', 'image');?>
	</div>