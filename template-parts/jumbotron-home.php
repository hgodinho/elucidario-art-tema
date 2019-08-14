<?php
/**
 * Template para o Jumbotron da home page
 *
 * Inclui formulário de busca, features list e imagem de fundo
 *
 * @since 0.1
 */
function wiki_ema_jumbotron_home(WP_Query $obra_do_mes = null)
{
    if ($obra_do_mes->have_posts()) {
        while ($obra_do_mes->have_posts()): $obra_do_mes->the_post();
            $fichatecnica_obra = get_field('ficha_tecnica');
            $fotografo = get_field('fotografo');
            $thumbnail_obradomes = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $obra_link = get_the_permalink( );
            ?>

<div class="jumbotrom-fluid d-flex text-center text-white "
    style="background-image: url('<?php echo $thumbnail_obradomes ?>'); background-repeat: no-repeat; background-position: center center; background-size:cover; height: 600px;">
    <div class="jumbotrom-overlay h-100 w-100"></div>

    <div class="container-fluid d-flex">

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="row align-items-center mt-5">
                    <div class="col-xl-12">
                        <div class="row justify-content-center align-self-center mt-5">
                            <h1 class="text-white display-4"><span
                                    class="text-shadow"><?php echo get_bloginfo('description'); ?></span>
                            </h1>
                            <!-- formulario de busca -->
                            <div class="col-12">
                                <div class="d-flex justify-content-center mt-5">
                                    <?php get_search_form();?>
                                </div>
                            </div>
                            <!-- // formulario de busca -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-end h-50">

                <div class="col-xl-12">
                    <div class="row-fluid mb-4">
                        <div class="">
                            <p class="lead text-left">
                                Obra do mês:
                            </p>
                            <p class="legenda-jumbotrom text-left">
                                <?php the_title();
                            echo ' (';
                            echo $fichatecnica_obra['dataperiodo'];
                            echo '). ';

                            $connected = new WP_Query(
                                array(
                                    'relationship' => array(
                                        'id' => 'obras_to_autores',
                                        'from' => get_the_ID(),
                                    ),
                                    'nopaging' => true,
                                )
                            );
                            while ($connected->have_posts()): $connected->the_post();
                                the_title();
                                echo '. ';
                            endwhile;
                            wp_reset_query(  );
                            if ($fotografo) {
                                echo 'Fotografia: ';
                                echo $fotografo . ' ';
                            }
                            ?>
                            <a href="<?php echo $obra_link;?>" class="text-secondary">Ver obra →</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
endwhile;
    }
    ?>
</div>
</div>
<?php
}
?>