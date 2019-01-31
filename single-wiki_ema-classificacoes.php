<?php
/**
 * template para página 'Classificação' no Custom-post wiki_ema
 * 
 * @url wiki-ema/pag/classificacoes/
 * 
 * responsável por exibir o arquivo de taxonomias classificação,
 * listando cada classificação criada na custom taxonomy
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
$classificacoes = get_terms(
    array(
        'taxonomy' => 'classificacao',
        'hide_empty' => true,
        'orderby' => 'count',
        'order' => 'DESC',
        'parent' => 0,
    )
);

/**
 * Loop
 */
if (!empty($classificacoes) && !is_wp_error($classificacoes)) {

    ?>
        <div class="row">
            <div class="col-12">
                <?php the_title('<h1>', '</h1>');?>
            </div>
        </div>
        <div class="row py-4">
            <?php
    foreach ($classificacoes as $classificacao) {
            $link = get_term_link($classificacao);
            ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <?php
    /**
             * Imagem do cartão
             *
             * @todo arrumar query para conseguir pegar a imagem de uma obra presente
             * em alguma 'classificacao' para utilizar como imagem do cartão
             */
    /*
    $thumbnail = get_posts(
    array(
    'posts_per_page' => 1,
    'post_type' => 'obras',
    'tax_query' => array(
    'taxonomy' => 'classificacao',
    'field' => 'slug',
    'terms' => $classificacao->slug,
    ),
    )
    );
    // print_r($thumbnail);
    // echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'card-img-top' ) );
    wp_reset_postdata();
    */
            ?>

                        <div class="card-body">
                            <h2 class="card-title">
                                <?php echo $classificacao->name; ?>
                            </h2>
                            <p class="card-text"><span class="text-muted">→ 
                                    <?php echo $classificacao->count; ?> itens</span></p>
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

<?php
/**
 * End
 */
get_footer();
?>