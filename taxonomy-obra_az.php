<?php
/**
 * template para taxonomia autor_az single term
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.5
 *
 * @author hgodinho.com
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');

$count = $wp_query->found_posts;
?>

<main role="main" class="container">
    <div class="container pb-4 mb-4 border-bottom">
        <!-- a magica inicia aqui -->
        <div class="row">
        <?php
get_template_part('template-parts/header/header', 'archive');?>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-2">
                <?php
if (class_exists('WP_Glossary_Bootstrap')) {
    $glossary = new WP_Glossary_Bootstrap;
    $glossary_menu = $glossary->glossary_menu_front_end(null, 'obra_az');
}?>
            </div>
            <div class="col col-md-12 col-10">
                <div class="row">
                    <?php
get_template_part('template-parts/obra/content', 'cartao-obra');
?>
                </div>
            </div>
        </div>
    </div>
    <div class="cointainer">

        <?php
if (function_exists('bootstrap_pagination')) {
    bootstrap_pagination();
}
?>

    </div>
</main>
<?php
/**
 * a mágina termina aqui
 */
get_footer();
?>