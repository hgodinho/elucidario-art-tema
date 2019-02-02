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
    <a class="list-group-item list-group-item-action" href="<?php the_permalink();?>">
        <p class="h5">
            <?php the_title();?>
            <?php

MB_Relationships_API::each_connected(
    array(
    'id' => 'obras_to_autores',
    'to' => $wp_query->posts,
    )
);
if (have_posts()): while (have_posts()): the_post();
    foreach ( $post->connected as $post ) : setup_postdata( $post );
            the_title();
            count($post->connected);
            echo count($post->connected);
    endforeach;
    wp_reset_postdata(); // Set $post back to original post
    endwhile;
endif;
?>          
              <!--  
            <span class="badge badge-secondary badge-pill">
                 echo $obras_contagem;</span>
                -->
        </p>
    </a>
</div>


        
