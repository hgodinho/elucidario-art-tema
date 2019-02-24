<?php
/**
 * template para taxonomia autor_az single term
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');

MB_Relationships_API::each_connected(array(
    'id' => 'obras_to_autores',
    'to' => $wp_query->posts, // Set to $my_query.
));
$count = $wp_query->found_posts;
?>

<main role="main" class="container">
    <div class="container pb-4 mb-4 border-bottom">
        <!-- a magica inicia aqui -->
        <div class="row">
        <?php
        get_template_part('template-parts/header/header', 'archive');
        ?>
        </div>
    </div>
</main>
<div class="container">
    <div class="row">
        <div class="col col-md-12 col-2">

            <?php
if (class_exists('WP_Glossary_Bootstrap')) {
    $glossary = new WP_Glossary_Bootstrap;
    $glossary_menu = $glossary->glossary_menu_front_end('autor_az', null);
}
?>
        </div>
        <?php $wp_query->set('posts_per_page', -1); ?>

        <div class="col col-md-12 col-10">
            <?php
if (!function_exists('wiki_ema_listar_autores')) {
    get_template_part('template-parts/autor/content', 'tabela-autor');
} else {
    if (have_posts()): while (have_posts()): the_post();
            ?>
            <div class="list-group" id="lista-autores">
                <?php wiki_ema_listar_autores();?>
            </div>
            <?php
    endwhile;
    endif;
}
?>
        </div>
        
    </div>
</div>

<?php
/**
 * a mágina termina aqui
 */
get_footer();
?>