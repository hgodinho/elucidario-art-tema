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
            <div class="col-12 pt-4">
                <h1>
                    <?php single_term_title();?>
                    <span class="small text-muted">
                        <?php
//var_dump($wp_query->found_posts);
echo ' → ';
echo $wp_query->found_posts; ?> itens.
                    </span>
                </h1>
                <p>
                    <?php echo term_description(); ?>
                </p>
            </div>
        </div>
    </div>


    <div class="container">
        <?php
if (class_exists('WP_Glossary_Bootstrap')) {
    $glossary = new WP_Glossary_Bootstrap;
    $glossary_menu = $glossary->glossary_menu_front_end('obra_az', null);
}
$wp_query->set('posts_per_page', -1);?>
        <div class="row pb-4">
            <?php
if (have_posts()): while (have_posts()): the_post();
        get_template_part('template-parts/obra/content', 'cartao-obra');
    endwhile;
endif;?>
        </div>
    </div>
</main>
<?php
/**
 * a mágina termina aqui
 */
get_footer();
?>