<?php
/**
 * Header das taxonomias A-Z
 *
 * @version 0.1
 * @since 0.7
 * @author hgodinho.com
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
    }?>
        </span>
    </h1>

    <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>
    <p class="lead">
        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.';?>
    </p>
    <?php
} else {?>
    <p class="lead">
        <?php
echo 'Página 1';
        echo ' de ' . $wp_query->max_num_pages . '.';?>
    </p>
    <?php
}?>
    <p>
        <?php echo term_description(); ?>
    </p>
</div>
<?php
}if (is_tax('autor_az')) {?>
<div class="col-12 pt-4">
    <h1>
        <?php
echo strtoupper(single_term_title('', false));?>
        <span class="small text-muted">
            <?php
echo ' → ';
    if ($wp_query->found_posts > 1) {
        echo $wp_query->found_posts . ' autores.';
    } else {
        echo $wp_query->found_posts . ' autor.';
    }?>
        </span>
    </h1>

    <?php
$paged = get_query_var('paged');
    if ($paged > 0) {?>
    <p class="lead">
        <?php
echo 'Página ' . $paged;
        echo ' de ' . $wp_query->max_num_pages . '.';?>
    </p>
    <?php
} else {?>
    <p class="lead">
        <?php
echo 'Página 1';
        echo ' de ' . $wp_query->max_num_pages . '.';?>
    </p>
    <?php
}?>
    <p>
        <?php echo term_description(); ?>
    </p>
</div>
<?php
}?>