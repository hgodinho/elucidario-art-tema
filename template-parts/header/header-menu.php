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

 /**
  * @todo arrumar essa condicional que checa se o usuário está logado para corrigir a sobreposição da admin-bar no menu
  */
  /*
  if (is_admin_bar_showing()) {
    echo '<div class="container-flex fixed-top fixed-top-correcao bg-primary border-bottom shadow-lg">';
} else {
    echo '<div class="container-flex fixed-top bg-primary border-bottom shadow-lg">';
}
*/
?>
<div class="container-flex sticky-top bg-primary border-bottom shadow-lg ">
    <nav class="navbar navbar-expand-lg navbar-dark " role="navigation">
        <div class="container">
            <button class="navbar-toggler rounded-circle shadow-lg nav-bar-toggle-color" type="button" data-toggle="collapse" data-target="#menuWikiEma"
                aria-controls="menuWikiEma" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="mr-5"><a class="navbar-brand" href="/wiki-ema">Wiki-Ema</a><a href="https://github.com/hgodinho/wiki-ema-template/blob/master/README.md" class="badge badge-pill badge-light mt-2" style="font-size:11px">pré-alfa</a></span>
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

        </div>
    </nav>
</div>
