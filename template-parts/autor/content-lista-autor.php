<?php
/**
 * Template part: Lista autor
 *
 * lista todos os autores no single-elucidario_art-autores.php
 *
 * @version 0.1
 * @since 0.4
 */

?>


<div class="list-group">

    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <span style="transform: rotate(0);">
            <a href="<?php the_permalink();?>" class="text-decoration-none stretched-link">
                <span>
                    <?php the_title();

                $fichatecnica_autor = get_field('ficha_tecnica');
                if ($fichatecnica_autor['dataperiodo_inicial']) {
                    echo ', <span class="text-muted">(';
                    echo $fichatecnica_autor['dataperiodo_inicial'];
                    if ($fichatecnica_autor['dataperiodo_final']) {
                        echo ' — ';
                        echo $fichatecnica_autor['dataperiodo_final'];
                        echo ')</span>';
                    } else {
                        echo ')</span>';
                    }
                }?>
                </span>

                <?php $obras_contagem = count($post->connected); ?>

                <span class="badge badge-secondary badge-pill">
                    <?php echo $obras_contagem; ?></span>
            </a>
        </span>
    </li>

    <?php wp_reset_postdata();?>
</div>