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
?>

<main role="main" class="container">
    <div class="container">

        <?php
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

/**
 * Loop
 */
if (!empty($terms) && !is_wp_error($terms)) {
    ?>
        <div class="row">
            <div class="col-12">
                <?php the_title('<h1>', '</h1>');?>
            </div>
        </div>
        <div class="row py-4">
            <?php
foreach ($terms as $term) {
        $imagem1 = get_field('imagem_1', $term);
        ?>
            <div class="col-md-4 mb-5 d-flex justify-content-center">
                <div class="card d-flex w-100">
                    <img class="card-img-top" src="<?php echo $imagem1['url']; ?>" alt="<?php echo $imagem1['alt']; ?>">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?php echo $term->name; ?>
                        </h3>
                        <p class="card-text">
                            <?php echo $term->description; ?>
                        </p>
                        <a href="<?php echo get_term_link($term); ?>" class="btn btn-outline-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <?php
}
}?>
        </div>
    </div>
</main>
<?php
get_footer();
?>