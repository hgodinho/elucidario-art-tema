<?php
/**
 * Template para página 'Classificação' no Custom-post elucidario_art
 *
 * responsável por exibir o arquivo de taxonomias classificação,
 * listando cada classificação criada na custom taxonomy
 *
 * @package WordPress
 * @subpackage Elucidário.art
 *
 * @version 0.3
 * @since 0.3
 *
 * @author hgod.in
 */

/**
 * Start
 */
get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
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
?>
<section id="primary" class="content-area">
    <main role="main" class="container">

        <?php
if (!empty($classificacoes) && !is_wp_error($classificacoes)) {
    ?>
        <div class="container pt-4">
            <div class="row">
                <div class="col-12">
                    <?php
get_search_form();?>
                </div>
                <div class="col-12 ">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row pt-2">
            <?php 
                 while ( have_posts() ) : the_post(); ?> 
                     <div class="entry-content-page container pb-4">
                         <p><?php the_content(); ?></p> 
                     </div>
                 <?php
                 endwhile; 
                 wp_reset_query(); 

foreach ($classificacoes as $classificacao) {
        $link = get_term_link($classificacao);

        $args = array(
            'posts_per_page' => '1',
            'post_type' => 'obras',
            'tax_query' => array(
                array(
                    'taxonomy' => 'classificacao',
                    'field' => 'name',
                    'terms' => $classificacao->name,
                ),
            ),
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $imagequery = get_posts($args);
        $image = get_the_post_thumbnail($imagequery[0]->ID, 'cartoes-thumb-obra');
        $imageurl = get_the_post_thumbnail_url($imagequery[0]->ID, 'cartoes-thumb-obra');
        $imageid = get_post_thumbnail_id($imagequery[0]->ID);
        $alt = get_post_meta($imageid, '_wp_attachment_image_alt', true);
//var_dump($imagequery);
        ?>
                <div class="col-md-4 mb-5 d-flex justify-content-center">

                    <div class="card d-flex w-100 shadow">
                        <img class="card-img-top" src="<?php echo $imageurl; ?>" alt="<?php echo $alt; ?>">

                        <div class="card-body">
                            <h5 class="card-title mb-0 titulo-cartao mb-3">
                                <?php echo mb_strtoupper($classificacao->name, 'UTF-8'); ?>
                            </h5>
                            <p class="card-text"><span class="text-muted">→
                                    <?php
if ($classificacao->count > 1) {
            echo $classificacao->count;?>
                                    itens</span>
                                <?php
} else {
            echo $classificacao->count;?>
                                item</span>
                                <?php
}?>
                            </p>
                        </div>

                        <a href="<?php echo $link; ?>" class="btn btn-secondary stretched-link">Saiba Mais</a>
                    </div>

                </div>

                <?php
}
}
?>
            </div>
        </div>
    </main>
</section>

<?php
/**
 * End
 */
get_footer();
?>