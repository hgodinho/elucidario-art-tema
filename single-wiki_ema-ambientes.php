<?php
/**
 * template para página 'Ambientes' no Custom-post wiki_ema
 *
 * responsável por exibir o arquivo de taxonomias ambientes,
 * listando cada ambiente criado na custom taxonomy
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 */

$terms = get_terms(
    array(
        'taxonomy' => 'ambiente',
        'hide_empty' => false,
    )
);

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
?>

<div class="container">
<div class="row">
<?php

foreach ($terms as $term) {
    echo '<div class="col-lg-6 col-md-12">';
    echo '<div class="jumbotron">';
    echo '<h2 class="display-4">';
    echo $term->name;
    echo '</h2>';
    echo '<p class="lead">';
    //Lorem ipsum dolor sit amet,
    echo '</p>';
    echo '<hr class="my-4"><p>';
    //Alfredo Ernesto Becker - Arquiteto
    echo '</p>';
    echo '<a class="btn btn-primary btn-lg" href="';
    $termlink = get_term_link($term);
    echo $termlink;
    echo '" role="button">Saiba mais</a>';
    echo '</div>';
    echo '</div>';
}
?>
</div>
</div>

<?php
get_footer();
?>