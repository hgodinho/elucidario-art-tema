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
	<nav class="navbar navbar-expand-lg navbar-dark " role="navigation">
		<div class="container">
			<span class="mr-5"><a class="navbar-brand" href="<?php echo get_site_url();?>">Wiki-Ema</a><a href="https://github.com/hgodinho/wiki-ema-template/blob/master/README.md"
				 class="badge badge-pill badge-light mt-2" target="blank" style="font-size:11px">pré-alfa</a></span>
			<?php
		wp_nav_menu( array(
			'theme_location'    => 'primario',
			'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse',
			'container_id'      => 'menuWikiEma',
			'menu_class'        => 'nav navbar-nav text-white',
			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			'walker'            => new WP_Bootstrap_Navwalker(),
		) );
		?>
			<button class="navbar-toggler rounded-circle shadow-lg nav-bar-toggle-color" type="button" data-toggle="collapse"
			 data-target="#menuWikiEma" aria-controls="menuWikiEma" aria-expanded="false" aria-label="Alternar navegação">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>
</div>