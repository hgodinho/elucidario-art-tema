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
    if ($wp_query->found_posts == '1') {
        ?>
						<span class="small text-muted">
							<?php _e('resultado de busca para:', TEXT_DOMAIN);?>
						</span>
						<?php
} else {
        ?>
						<span class="small text-muted">
							<?php _e('resultados de busca para:', TEXT_DOMAIN);?>
						</span>
						<?php }
    ?>

						<?php echo get_search_query(); ?>
					</h1>
				</div>
			</div>
		</header>

		<div class="container">
			<?php
if ($post->post_type == 'autores') {
        get_template_part('template-parts/autor/content', 'tabela-autor');
    }

    if ($post->post_type == 'obras') {
        get_template_part('template-parts/obra/content', 'cartao-obra');
    }

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