<?php
/**
 * template para página 'Ambientes' no Custom-post wiki_ema
 *
 * @url wiki-ema/pag/ambientes/
 *
 * responsável por exibir o arquivo de taxonomias ambientes,
 * listando cada ambiente criado na custom taxonomy
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
/**
 * Query principal
 */
$terms = get_terms(
    array(
        'taxonomy' => 'ambiente',
        'hide_empty' => true,
        'orderby' => 'count',
        'order' => 'DESC',
        'parent' => 0,
    )
);
?>
<section id="primary" class="content-area">
    <main role="main" class="container">

        <?php
    if (!empty($terms) && !is_wp_error($terms)) {
    ?>

        <div class="container py-4">
            <div class="row">
                <div class="col-12 pb-4">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>
                <!--
                <div class="col-12">
                    <?php
get_search_form();?>
                </div>
                -->
            </div>
        </div>

        <div class="container">
            <div class="row py-4">
                <?php
foreach ($terms as $term) {
        $imagem1 = get_field('imagem_1', $term);
        $trecho = get_field('trecho_descricao', $term)
        ?>
                <div class="col-md-4 mb-5 d-flex justify-content-center">

                    <div class="card d-flex w-100 shadow">
                        <a href="<?php echo get_term_link($term) ?>">
                            <img class="card-img-top" src="<?php echo $imagem1['url']; ?>" alt="<?php echo $imagem1['alt']; ?>">
                        </a>

                        <div class="card-body">
                            <h5 class="card-title mb-0 titulo-cartao mb-3">
                                <?php echo mb_strtoupper($term->name,'UTF-8'); ?>
                            </h5>

                            <p class="card-text">
                                <?php echo $trecho; ?>
                            </p>
                        </div>

                        <a href="<?php echo get_term_link($term); ?>" class="btn btn-secondary">Saiba Mais</a>
                    </div>

                </div>
                <?php
}
}?>
            </div>
        </div>
    </main>
</section>
<?php
get_footer();
?>