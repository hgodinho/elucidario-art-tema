<?php
/**
 * Template para box que mostra obras do autor
 *
 * @version 0.1
 * @since 0.2
 *
 * @author hgodinho.com
 */
?>

<div class="row py-4 border-top">
    <div class="col">
        <div class="row">
            <!-- Título -->
            <div class="col-12 col-sm-7 pb-4">
                <h3>Obras na coleção:
                </h3>
            </div>
            <!-- // Título -->

            <!-- formulario de busca -->
            <div class="col-12 col-sm-5 pb-4">
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
            </div>
            <!-- // formulario de busca -->
        </div>

        <!-- cartoes de obras -->
        <div class="row pb-4">

            <?php
$connected = new WP_Query(
    array(
        'post_type' => 'obras',
        'relationship' => array(
            'id' => 'obras_to_autores',
            'to' => get_the_ID(),
            //'sibling' => true,
        ),
        'posts_per_page' => '6',
        'post__not_in' => array($post->ID),
    )
);

while ($connected->have_posts()): $connected->the_post();

    get_template_part('template-parts/obra/content', 'cartao-obra');

endwhile;

wp_reset_query();
?>

        </div>
    </div>
</div>