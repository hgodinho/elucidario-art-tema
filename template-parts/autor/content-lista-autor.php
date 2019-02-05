<?php
/**
 * Template part: Lista autor
 *
 * lista todos os autores no single-wiki_ema-autores.php
 *
 * @version 0.1
 * @since 0.4
 */

?>


<div class="list-group">
<a href="<?php the_permalink();?>" class="">
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <?php the_title();
$obras_contagem = count($post->connected);
?>
            
            <span class="badge badge-secondary badge-pill">
                <?php echo $obras_contagem; ?></span>
    </li>
    </a>
    <?php wp_reset_postdata();?>
</div>