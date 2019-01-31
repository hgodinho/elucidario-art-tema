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
//$autor_id = get_the_ID();
//echo $autor_id;

/*
$args = array(
    'post_type' => 'obras',
    'relationships' => array(
        'id' => 'obras_to_autores',
        'to' => $autor_id,
        'sibling' => true,
    ),
    'posts_per_page' => 1,
);
$conectados = new WP_Query($args);
//var_dump($conectados);
/*
$conectados = MB_Relationships_API::each_connected(
    array(
    'id' => 'obras_to_autores',
    'from' => $wp_query->posts,
));
*/

//$obras_contagem = $conectados->found_posts;
?>          
              <!--  
            <span class="badge badge-secondary badge-pill">
                 echo $obras_contagem;</span>
                -->
        </p>
    </a>
</div>