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

		<header class="container pb-4 mb-4 border-bottom">
			<div class="row">
				<div class="col-12 pb-4 pt-4">
					<h1>
						<?php echo $wp_query->found_posts; ?>
						<span class="small text-muted">
							<?php _e('resultado(s) de busca para:', TEXT_DOMAIN);?>
						</span>
						<?php echo get_search_query(); ?>
					</h1>
				</div>

			</div>
		</header>
		<div class="container">
			<?php

// Start the Loop.
    while (have_posts()): the_post();
        //the_title();

        if ($post->post_type == 'autores') {
            get_template_part('template-parts/autor/content', 'lista-autor');
        }

        if ($post->post_type == 'obras') {
            get_template_part('template-parts/obra/content', 'cartao-obra');

        }
    endwhile;

// Previous/next page navigation.

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