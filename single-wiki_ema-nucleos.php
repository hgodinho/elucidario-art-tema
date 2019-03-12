<?php
/**
 * template para página 'Núcleos' no Custom-post wiki_ema
 *
 * @url wiki-ema/pag/nucleos/
 *
 * responsável por exibir o arquivo de taxonomias nucleos,
 * listando cada  nucleo criada na custom taxonomy
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.5
 *
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
        <div class="container">

            <?php
/**
 * Query principal
 */
$nucleos = get_terms(
    array(
        'taxonomy' => 'nucleo',
        'hide_empty' => true,
        'orderby' => 'count',
        'order' => 'DESC',
        'parent' => 0,
    )
);

/**
 * Loop
 */
if (!empty($nucleos) && !is_wp_error($nucleos)) {
    ?>
            <div class="row">
                <div class="col-12">
                    <?php the_title('<h1>', '</h1>');?>
                </div>
            </div>
            <div class="row py-4">
                <?php
foreach ($nucleos as $nucleo) {
        $link = get_term_link($nucleo);
        ?>
                <div class="col-md-4">
                    <div class="card mb-3">


                        <div class="card-body">
                            <h2 class="card-title">
                                <?php echo $nucleo->name; ?>
                            </h2>
                            <p class="card-text"><span class="text-muted">→
                                    <?php 
                                    echo $nucleo->count;

                                    /**
                                     * @todo arrumar contagem de itens 
                                     */
                                    /*
                                    $term_query = new WP_Query(
                                        array(
                                            'tax_query' => array(
                                                'taxonomy' => 'nucleo',
                                                'terms' => get_queried_object()->term_id,
                                            ),
                                        )
                                    )
                                    */
                                    ?>
                                    itens</span></p>
                            <a class="btn btn-primary" href="<?php echo $link ?>" role="button">Veja mais</a>
                        </div>
                    </div>
                </div>
                <?php
}
}
?>

            </div>
    </main>
</section>

<?php
/**
 * End
 */
get_footer();
?>