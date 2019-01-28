<?php
/**
 * template para taxonomia classificação sinle term
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 */

/**
 * Start
 */
get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
?>

<main role="main" class="container">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-4 mb-4">
                <h1>
                    <?php single_term_title();?>
                </h1>
                <p>
                    <?php echo term_description(); ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-7 pb-4">
                <h3>
                    Obras com esta Classificação:
                </h3>
            </div>
            <div class="col-12 col-sm-5 pb-4">
                <!-- formulario de busca -->
                <div class="col-12">
                    <form class="form-inline justify-content-end">
                        <div class="input-group input-group">
                            <input type="text" class="form-control" placeholder="encontre uma obra" aria-label="Encontre uma obra"
                                aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- // formulario de busca -->
            </div>

        </div>

        <!-- cartoes de obras -->
        <div class="row pb-4">

            <?php
if (have_posts()): while (have_posts()): the_post();

        get_template_part('template-parts/obra/content', 'cartao-obra');

    endwhile;

endif;

?>
        </div>
</main>

<?php
/**
 * End
 */
get_footer();
?>