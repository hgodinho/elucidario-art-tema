<?php
/**
 * Template para páginas
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.3
 * @since 0.3
 * @author hgodinho.com
 */

/**
 * Start
 */
get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
?>
<section id="primary" class="content-area">
    <main role="main" class="container">
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <?php
get_search_form();?>
                </div>
                <div class="col-12 pb-4">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>
            </div>
        </div>
        <?php
if (have_posts()): while (have_posts()): the_post();
        ?>
        <div class="container">
        <?php the_content(); ?>
        </div>
        <?php
    endwhile;
else:echo '<div class="col"><p>Desculpe, nada para exibir</p></div>';
endif;
?>
    </main>
</section>

<?php
get_footer();