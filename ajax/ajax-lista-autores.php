<?php
/**
 * Função php chamada pelo ajax para gerar lista de autores
 *
 * Utilizada em diversos templates
 * @todo listar todos os templates
 *
 * @author hgodinho <ola@hgodinho.com>
 */

function wiki_ema_listar_autores()
{
    global $post;
    ?>
<a href="<?php the_permalink();?>" class="text-decoration-none">
   <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
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

      <?php $obras_contagem = count($post->connected);?>

      <span class="badge badge-secondary badge-pill">
         <?php echo $obras_contagem; ?></span>
   </li>
</a>
<?php

    //wp_die();
    wp_reset_postdata();
    //echo 'listar autores deu certo';

}

add_action('wp_ajax_wiki_ema_listar_autores', 'wiki_ema_listar_autores');
add_action('wp_ajax_nopriv_wiki_ema_listar_autores', 'wiki_ema_listar_autores');