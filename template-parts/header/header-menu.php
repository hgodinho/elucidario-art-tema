<?php
/**
 * Custom menu Wiki-Ema
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.3
 * @source https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 *
 */
?>
<div class="container-flex sticky-top bg-primary border-bottom shadow-lg" id="menu-wiki-ema">
	<nav class="navbar navbar-expand-lg navbar-dark" role="navigation">
		<div class="container">
			<span class="navbar-span">
				<a class="navbar-brand" href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo('name') ?></a>
				<a href="<?php echo get_site_url( )?>/sobre" class="badge badge-pill badge-light mt-2 " style="font-size:11px"><?php echo THEME_VERSION; ?></a>
			</span>
			<button class="navbar-toggler rounded-circle shadow-lg nav-bar-toggle-color border border-secondary"
				type="button" data-toggle="collapse" data-target="#menuWikiEma" aria-controls="menuWikiEma"
				aria-expanded="false" aria-label="Alternar navegação">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
				wp_nav_menu(array(
					'theme_location' => 'primario',
					'depth' => 2,
					'container' => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id' => 'menuWikiEma',
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
					'walker' => new WP_Bootstrap_Navwalker(),
				));
			?>
		</div>
	</nav>
</div>