<?php
/**
 * Snippet de obras relacionadas
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @since 0.3
 * @version 0.1
 *
 * @author hgodinho.com
 *
 */

$terms = get_the_terms($post->ID, 'classificacao', 'string');

if(!empty($terms)){
    $term_slug = wp_list_pluck($terms, 'slug', 'id');
} 

$relacionado_query = new WP_Query(array(
    'post_type' => 'obras',
    'post_status' => 'any',
    'tax_query' => array(
        array(
            'taxonomy' => 'classificacao',
            'field' => 'slug',
            'terms' => $term_slug
        )),
    'posts_per_page' => 5,
    'orderby' => 'rand',
    'post__not_in' => array($post->ID),
));
?>

<?php
if ($relacionado_query->have_posts()) {?>

<div class="container m-3">
    <div class="row pt-3">
        <h3 class="pb-3">Obras Relacionadas:</h3>
        <div class="owl-carousel owl-theme py-2">

            <?php
    while ($relacionado_query->have_posts()): $relacionado_query->the_post();
        $thumbnail = get_the_post_thumbnail(get_the_ID(), 'cartoes-thumb-obra', array('class' => 'card-img-top img-fluid d-block mb-2'));
		$fichatecnica_obra = get_field('ficha_tecnica');
        $permalink = get_permalink();
        $dataperiodo = get_field_object('field_5bfd46cab4647');
        $material = get_field_object('field_5bfd46fcb4648');
        $dimensoes = get_field_object('field_5bfd47ebb4649');
        $tombo = get_field_object('field_5bfd4663b4645');
        ?>


            <div class="card mb-5 rounded-0 shadow" style="width: 18rem;">

                <a href="<?php echo $permalink ?>">
                    <?php echo $thumbnail; ?>
                </a>

                <div class="card-body">

                    <h5 class="card-title mb-0 titulo-cartao">
                        <?php echo mb_strtoupper(the_title('','', false),'UTF-8');
        echo ', ';
        ?>
                        <small class="text-muted">
                            <?php echo $dataperiodo['value']; 
            echo '. ';
            ?>
                        </small>
                    </h5>

                </div>
                <table class="table table-striped container-fluid mb-0">
                    <tbody>
                        <tr>
                            <th scope="row" class="cartao-obra-row">Material<br>ou técnica</th>
                            <td>
                                <?php echo $material['value']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="cartao-obra-row">Medidas</th>
                            <td>
                                <?php echo $dimensoes['value']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="cartao-obra-row">Tombo</th>
                            <td>
                                <?php echo $tombo['value']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?php echo $permalink ?>" class="btn btn-secondary rounded-0">Ver obra →</a>

            </div>
            <?php
            endwhile;
            wp_reset_query();
            }
            ?>

        </div>
    </div>
</div>