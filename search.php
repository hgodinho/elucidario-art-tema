<?php
/**
 * Template para mostrar os resultados da busca
 *
 *
 * @package WordPress
 * @subpackage Wiki-ema
 *
 * @version
 * @since 0.4
 *
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php if (have_posts()) {?>

		<header class="container pb-4 mb-4">
			<div class="row">
				<div class="col-12 pb-4 pt-4">

					<h1>
						<?php
echo $wp_query->found_posts;
    if ($wp_query->found_posts == '1') { ?>
						<span class="small text-muted">
							<?php _e('resultado de busca para:', TEXT_DOMAIN);?>
						</span>
						<?php
} else {?>
						<span class="small text-muted">
							<?php _e('resultados de busca para:', TEXT_DOMAIN);?>
						</span>
						<?php }?>

						<?php echo get_search_query(); ?>
					</h1>
				</div>
			</div>
		</header>
		<div class="container">
			<table class="table table-hover table-responsive-md">
				<thead>
					<tr>
						<th scope="col">Nome</th>
						<th scope="col">Tipo</th>
					</tr>
				</thead>
				<tbody>
					<?php
while (have_posts()): the_post();
        ?>
						<tr>
							<td>
								<a href="<?php the_permalink();?>" class="text-decoration-none">
									<?php the_title();?>
								</a>
							</td>
							<?php $fichatecnica_autor = get_field('ficha_tecnica');?>
							<td>
								<?php
    if ($post->post_type == 'obras') {
            echo 'obra';
        }
        if ($post->post_type == 'autores') {
            echo 'autor';
        }
        ?>
							</td>
						</tr>
						<?php
endwhile;

    ?>
				</tbody>
			</table>
		</div>

		<?php

    if (function_exists('bootstrap_pagination')) {
        bootstrap_pagination();
    }
} else {
    get_template_part('template-parts/nada', 'encontrado');
}
?>
		</div>
	</main>
</section>

<?php
get_footer();