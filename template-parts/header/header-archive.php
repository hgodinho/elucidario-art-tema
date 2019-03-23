<?php
/**
 * Header dos templates baseados em arquivos
 *
 * @version 0.4
 * @since 0.7
 * @author hgodinho.com
 */

/**
 * Header para archive obras
 */
if (is_post_type_archive('obras')) {?>
<div class="col-12 pt-4">
    <h1 class="display-3 text-primary">
        Obras do acervo
    </h1>
    <p class="lead text-muted">
        <?php
    if ($wp_query->found_posts > 1) {
        echo $wp_query->found_posts . ' itens';
    } else {
        echo $wp_query->found_posts . ' item';
    } 
    echo ' → ';
    ?>

        <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>

        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
} else {?>

    <?php
echo 'Página 1';
        echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
}?>
    <p>
        <?php echo term_description(); ?>
    </p>
</div>

<?php
}

/**
 * Header para archive autores
 */
if (is_post_type_archive('autores')) {?>
<div class="col-12 pt-4">
    <h1 class="display-3 text-primary">
        Autores no acervo
    </h1>
    <p class="lead text-muted">
        <?php
        if ($wp_query->found_posts > 1) {
            echo $wp_query->found_posts . ' autores';
        } else {
            echo $wp_query->found_posts . ' autor';
        } 
        echo ' → ';
        ?>

        <?php
    $paged = get_query_var('paged');
        if ($paged > 0) {?>

        <?php
    echo 'Página ' . $paged;
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    } else {?>

    <?php
    echo 'Página 1';
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    }?>
    <p>
        <?php echo term_description(); ?>
    </p>
</div>

<?php
}

/**
 * Header para single autores
 */
if (is_singular('autores')) {
    MB_Relationships_API::each_connected(array(
        'id' => 'obras_to_autores',
        'to' => $wp_query->posts,
    ));
    $fichatecnica_autor = get_field('ficha_tecnica');
    global $post;
    ?>
<div class="col-12 pt-4">
    <h1 class="display-3 text-primary">
        <?php the_title();?>
    </h1>
    <?php
if ($fichatecnica_autor['dataperiodo_inicial']) {?>
    <div class="col-12 px-0">
        <p class="text-muted">(
            <?php
echo $fichatecnica_autor['dataperiodo_inicial'];
    if ($fichatecnica_autor['dataperiodo_final']) {
        echo ' — ';
        echo $fichatecnica_autor['dataperiodo_final']; ?>
            )</p>
    </div>
    <?php
} else {?>
    )</p>
</div>
<?php
}
}
?>
<p class="lead text-muted">
    <?php
        if ( count($post->connected) > 1) {
            echo count( $post->connected ) . ' itens';
        } else {
            echo count( $post->connected ) . ' item';
        } 
        echo ' → ';
        ?>

    <?php
    $paged = get_query_var('paged');
        if ($paged > 0) {?>
    <?php
    echo 'Página ' . $paged;
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
</p>
<?php
    } else {?>
<?php
    echo 'Página 1';
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
</p>
<?php
    }?>
<p>
    <?php echo term_description(); ?>
</p>
</div>
<?php
}

/**
 * Header para obra_az
 */
if (is_tax('obra_az')) {?>
<div class="col-12 pt-4">
    <h1 class="display-3 text-primary">
        Obras com a letra:
        <?php
echo strtoupper(single_term_title('', false)); ?>
    </h1>

    <p>
        <?php echo term_description(); ?>
    </p>

    <p class="lead text-muted">
        <?php
        if ($wp_query->found_posts > 1) {
            echo $wp_query->found_posts . ' itens';
        } else {
            echo $wp_query->found_posts . ' item';
        } 
        echo ' → ';
        ?>

        <?php
    $paged = get_query_var('paged');
        if ($paged > 0) {?>

        <?php
    echo 'Página ' . $paged;
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    } else {?>

    <?php
    echo 'Página 1';
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    }?>

</div>
<?php
}

/**
 * Header para autor_az
 */
if (is_tax('autor_az')) {?>
<div class="col-12 pt-4">
    <h1 class="display-3 text-primary">
        Autores com a letra:
        <?php
echo strtoupper(single_term_title('', false)); ?>
    </h1>

    <p>
        <?php echo term_description(); ?>
    </p>

    <p class="lead text-muted">
        <?php
        if ($wp_query->found_posts > 1) {
            echo $wp_query->found_posts . ' autores';
        } else {
            echo $wp_query->found_posts . ' autor';
        } 
        echo ' → ';
        ?>

        <?php
    $paged = get_query_var('paged');
        if ($paged > 0) {?>

        <?php
    echo 'Página ' . $paged;
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    } else {?>

    <?php
    echo 'Página 1';
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    }?>

</div>
<?php
}

/**
 * Header para classificacao e nucleo
 */
if (is_tax(array('classificacao', 'nucleo'))) {?>
<div class="col-12 pt-4">
    <h1 class="display-3 text-primary">
        <?php
echo single_term_title('', false); ?>
    </h1>

    <p>
        <?php echo term_description(); ?>
    </p>

    <p class="lead text-muted">
        <?php
        if ($wp_query->found_posts > 1) {
            echo $wp_query->found_posts . ' itens';
        } else {
            echo $wp_query->found_posts . ' item';
        } 
        echo ' → ';
        ?>

        <?php
    $paged = get_query_var('paged');
        if ($paged > 0) {?>

        <?php
    echo 'Página ' . $paged;
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    } else {?>

    <?php
    echo 'Página 1';
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
    }?>

</div>
<?php
}

/**
 * Header para single ambiente
 */
if (is_tax(array('ambiente'))) {?>
<div class="row">
    <div class="col-12 col-lg-7 pt-4">
        <h1 class="display-3 text-primary">
            <?php
echo single_term_title('', false); ?>
        </h1>

        <p>
            <?php echo term_description(); ?>
        </p>
        <p class="lead text-muted">
            <?php
        if ($wp_query->found_posts > 1) {
            echo $wp_query->found_posts . ' itens';
        } else {
            echo $wp_query->found_posts . ' item';
        } 
        echo ' → ';
        ?>
            <?php
    $paged = get_query_var('paged');
        if ($paged > 0) {?>

            <?php
    echo 'Página ' . $paged;
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
        </p>
        <?php
    } else {?>
        <?php
    echo 'Página 1';
            echo ' de ' . $wp_query->max_num_pages . '.'; ?>
        </p>

        <?php
    }?>
    </div>

    <div class="col-12 col-lg-5 pt-4">
        <?php get_template_part('template-parts/carousel/carousel', 'ambiente');?>
    </div>
</div>
<?php
}

/**
 * Header para single ambiente
 */
if (is_single(array('ambientes', 'classificacoes', 'nucleos'))) {?>
<div class="row">
    <div class="col-12 pt-4">
        <h1 class="display-3 text-primary">
            <?php the_title(); ?>
        </h1>

        <p>
            <?php echo get_post_field('post_content', $post->ID); ?>
        </p>
    </div>
</div>
<?php
    }?>