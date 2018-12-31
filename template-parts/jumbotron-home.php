<?php
/**
 * Template para o Jumbotron da home page
 * 
 * Inclui formulário de busca, features list e imagem de fundo
 * 
 * @since 0.1
 */
?>

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
			<p class="lead text-center">Mais de 1600 itens na coleção!</p>
		</div>
		<!-- // formulario de busca -->

		<!-- features list -->
		<div class="row justify-content-start">
			<div class="col-lg-3"></div>
			<div class="col-lg-6 text-left">
			
				<?php 
		$classificacao = array(
			'taxonomy' => 'classificacao',
			'orderby' => 'name',
			'show_count' => false,
			'pad_counts' => false,
			'title_li' => '',
			'separator' => ', ',
			'style' => 'none',
			'number' => 3,
		);
		$nucleo = array(
			'taxonomy' => 'nucleo',
			'orderby' => 'name',
			'show_count' => false,
			'pad_counts' => false,
			'title_li' => '',
			'separator' => ', ',
			'style' => 'none',
			'number' => 3,
		);
		?>
				<ul>
					<li>
						<?php wp_list_categories($classificacao); ?> ...</li>
					<li>
						<?php wp_list_categories($nucleo); ?> ...</li>
					<li>
						<?php
						/**
						 * lista autores no jumbotron
						 */ 
				$autores_loop = new WP_Query(
					array(
						'post_type' => 'autores',
						'post_per_page' => 3,
						'order' => 'ASC',
						'orderby' => 'name',
					)
					);
					while ( $autores_loop->have_posts()) : $autores_loop->the_post();
					the_title('<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>, ' );
				endwhile;
					?>...
					</li>
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