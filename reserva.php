<!-- features list -->
            <!--
            <div class="col-12 order-3">
                <div class="row justify-content-start">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-left">
                        <ul class="jumbotron-list">
                            <li>
                            <?php
$exclude = get_term_by('slug', 'sem-localizacao', 'ambiente');
    $ambiente = array(
        'taxonomy' => 'ambiente',
        'orderby' => 'name',
        'order' => 'DESC',
        'show_count' => false,
        'title_li' => '',
        'separator' => ', ',
        'style' => 'none',
        'number' => 2,
        'exclude' => $exclude->term_id,
    );
    wp_list_categories($ambiente);
    ?>
                                <a href="<?php echo get_bloginfo('url') . '/pag/classificacoes' ?>">
                                    Todos os cômodos →
                                </a>
                            </li>
                            <li>
                                <?php
$exclude = get_term_by('slug', 'sem-nucleo', 'nucleo');
    $nucleo = array(
        'taxonomy' => 'nucleo',
        'order' => 'ASC',
        'orderby' => 'slug',
        'show_count' => false,
        'title_li' => '',
        'separator' => ', ',
        'style' => 'none',
        'number' => 2,
        'exclude' => $exclude->term_id,
    );
    wp_list_categories($nucleo);?>
                                <a href="<?php echo get_bloginfo('url') . '/pag/nucleos' ?>">
                                    Todo o acervo →
                                </a>
                            </li>
                            <li>
                                <?php
/**
     * lista autores no jumbotron
     */
    $autores_loop = new WP_Query(
        array(
            'post_type' => 'autores',
            'posts_per_page' => 2,
            'posts_per_archive_page' => 2,
            'order' => 'DESC',
            'orderby' => 'rand',
        )
    );
    while ($autores_loop->have_posts()): $autores_loop->the_post();
        the_title('<a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a>, ');
    endwhile;
    wp_reset_query();
    ?>
                                <a href="<?php echo get_post_type_archive_link('autores'); ?>">
                                    Todos os autores →
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>