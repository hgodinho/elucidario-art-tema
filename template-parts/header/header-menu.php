<?php
/**
 * Custom menu Wiki-Ema
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 *
 */

 /**
  * @todo arrumar essa condicional que checa que o usuário está logado para corrigir a sobreposição da admin-bar no menu
  */
  /*
  if (is_admin_bar_showing()) {
    echo '<div class="container-flex fixed-top fixed-top-correcao bg-primary border-bottom shadow-lg">';
} else {
    echo '<div class="container-flex fixed-top bg-primary border-bottom shadow-lg">';
}
*/
?>
<div class="container-flex fixed-top bg-primary border-bottom shadow-lg">

    <nav class="navbar navbar-expand-lg navbar-collapse navbar-light">
        <div class="container">
            <a class="navbar-brand text-white" href="index.html">Wiki-Ema</a>
            <button class="navbar-toggler rounded-circle border border-white shadow-lg" type="button" data-toggle="collapse"
                data-target="#menuWikiEma" aria-controls="menuWikiEma" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuWikiEma">

                <?php /*
            <!-- links -->
            <ul class="navbar-nav mr-auto">
                <!--Ema Klabin-->
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Ema Klabin</a>
                </li>
                <!--acervo-->
                <li class="nav-item">
                    <a class="nav-link text-white" href="acervo.html">Acervo</a>
                </li>
                <!--ambientes-->
                <li class="nav-item">
                    <a class="nav-link text-white" href="ambientes.html">Ambientes</a>
                </li>
                <!-- Institucional -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="dropdown-menu" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Institucional</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown-menu">
                        <a class="dropdown-item text-primary" href="#">Sobre a Casa-museu</a>
                        <a class="dropdown-item text-primary" href="#">Programação</a>
                        <a class="dropdown-item text-primary" href="#">Contato</a>
                    </div>
                </li>
            </ul>
            */?>

                <?php 
            $args = array(
                'theme_location' => 'primario',
                'menu_class' => 'navbar-nav mr-auto',
                'before' => '<li class="nav-item">',
                'after' => '</li>',
            );
            wp_nav_menu($args); ?>


                <!-- formulario de busca -->
                <div class="col-12">
                    <?php get_search_form(); ?>
                </div>
                <!-- // formulario de busca -->
            </div>
        </div>
    </nav>
</div>