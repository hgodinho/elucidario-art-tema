<?php
/**
 * Template do single-autor
 *
 * exibe as informações de cada autor cadastrado
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.5
 * @since 0.1
 */
get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
?>

<section id="primary" class="content-area">
	<main role="main" class="container">

		<div class="row">
			<?php get_template_part('template-parts/autor/content', 'autor');?>
			<?php 
			//get_template_part('template-parts/autor/content', 'obra-em-destaque');
			?>
		</div>

		<?php get_template_part('template-parts/autor/content', 'obras-do-autor');?>

	</main>
</section>
<?php

get_footer();
?>