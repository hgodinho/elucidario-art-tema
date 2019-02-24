<?php
/**
 * Header dos templates baseados em arquivos
 *
 * @version 0.2
 * @since 0.7
 * @author hgodinho.com
 */

/**
 * Header para archive obras
 */
if (is_post_type_archive('obras')) {?>
<div class="col-12 pt-4">
    <h1>
        <?php
echo post_type_archive_title('', false); ?>
        <span class="small text-muted">
            <?php
echo ' → ';
    if ($wp_query->found_posts > 1) {
        echo $wp_query->found_posts . ' itens.';
    } else {
        echo $wp_query->found_posts . ' item.';
    } ?>
        </span>
    </h1>
    <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>
    <p class="lead">
        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
} else {?>
    <p class="lead">
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
    <h1>
        <?php
echo post_type_archive_title('', false); ?>
        <span class="small text-muted">
            <?php
echo ' → ';
    if ($wp_query->found_posts > 1) {
        echo $wp_query->found_posts . ' encontrados.';
    } else {
        echo $wp_query->found_posts . ' encontrado.';
    } ?>
        </span>
    </h1>

    <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>
    <p class="lead">
        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
} else {?>
    <p class="lead">
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
    <h1>
        <?php
echo strtoupper(single_term_title('', false)); ?>
        <span class="small text-muted">
            <?php
echo ' → ';
    if ($wp_query->found_posts > 1) {
        echo $wp_query->found_posts . ' obras.';
    } else {
        echo $wp_query->found_posts . ' obra.';
    } ?>
        </span>
    </h1>

    <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>
    <p class="lead">
        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
} else {?>
    <p class="lead">
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
 * Header para autor_az
 */
if (is_tax('autor_az')) {?>
<div class="col-12 pt-4">
    <h1>
        <?php
echo strtoupper(single_term_title('', false)); ?>
        <span class="small text-muted">
            <?php
echo ' → ';
    if ($wp_query->found_posts > 1) {
        echo $wp_query->found_posts . ' autores.';
    } else {
        echo $wp_query->found_posts . ' autor.';
    } ?>
        </span>
    </h1>

    <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>
    <p class="lead">
        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
} else {?>
    <p class="lead">
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
 * Header para classificacao, ambiente e nucleo
 */
if (is_tax(array('classificacao', 'ambiente', 'nucleo'))) {?>
<div class="col-12 pt-4">
    <h1>
        <?php
echo single_term_title('', false); ?>
        <span class="small text-muted">
            <?php
echo ' → ';
    if ($wp_query->found_posts > 1) {
        echo $wp_query->found_posts . ' itens.';
    } else {
        echo $wp_query->found_posts . ' item.';
    } ?>
        </span>
    </h1>

    <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>
    <p class="lead">
        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.'; ?>
    </p>
    <?php
} else {?>
    <p class="lead">
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