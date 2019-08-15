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

function obra_relacionada(WP_Query $relacionado_query = null)
{
    global $wp_query;
    if ($relacionado_query == null) {
        $relacionado_query = $wp_query;
    }
    if ($relacionado_query->have_posts()) {
        while ($relacionado_query->have_posts()): $relacionado_query->the_post();
            $classificacao = get_the_terms(get_the_ID(  ), 'classificacao', 'string');
            $ambiente = get_the_terms(get_the_ID(  ), 'ambiente', 'string');
            

        endwhile;
    }

    if (!empty($classificacao)) {
        $classificacao_last = end($classificacao);
        if ($classificacao_last->count > 9) {
            $termo_slug = $classificacao_last->slug;
            $termo_name = $classificacao_last->name;
            $taxonomy = 'classificacao';
        } else {
            $ambiente_last = end($ambiente);
            $termo_slug = $ambiente_last->slug;
            $termo_name = $ambiente_last->name;
            $taxonomy = 'ambiente';
        }
    }

    $relacionado_query = new WP_Query(array(
        'post_type' => 'obras',
        'post_status' => 'any',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $termo_slug,
            ),
        ),
        'posts_per_page' => 9,
        'orderby' => 'relevance',
        'post__not_in' => array($relacionado_query->ID),
    ));
    ?>

<?php
if ($relacionado_query->have_posts()) {?>

<div class="container-fluid d-print-none">
    <div class="row pt-3">
        <div class="container mb-5">
            <?php
if (strcmp($taxonomy, 'classificacao') == 0) {?>
            <h3 class="ml-3"><span class="small text-muted">Obras classificadas em:
                </span><?php echo $termo_name; ?></h3>
            <?php
} else {?>
            <h3 class="ml-3"><span class="small text-muted">Obras na(o)
                </span><?php echo $termo_name; ?></h3>
            <?php
}?>
        </div>
        <div class="owl-carousel owl-theme">

            <?php
while ($relacionado_query->have_posts()): $relacionado_query->the_post();
            $thumbnail = get_the_post_thumbnail(get_the_ID(), 'cartoes-thumb-obra', array('class' => 'card-img-top img-fluid d-block mb-2'));
            $fichatecnica_obra = get_field('ficha_tecnica');
            $permalink = get_permalink();
            $dataperiodo = get_field_object('field_5bfd46cab4647');
            $material = get_field_object('field_5bfd46fcb4648');
            $dimensoes = get_field_object('field_5bfd47ebb4649');
            $tombo = get_field_object('field_5bfd4663b4645');
            $meta = get_post_meta(get_the_ID());
            ?>


		            <div class="card mb-5 rounded-0 shadow" style="width: 18rem;">
		                <?php echo $thumbnail; ?>

		                <div class="card-body">

		                    <h5 class="card-title mb-0 titulo-cartao">
		                        <?php echo mb_strtoupper(the_title('', '', false), 'UTF-8');
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
		                            <th scope="row" class="cartao-obra-row">Autor</th>
		                            <td>
		                                <?php echo end($meta['ficha_autor']); ?>
		                            </td>
		                        </tr>
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
		                <a href="<?php echo $permalink ?>" class="btn btn-secondary rounded-0 stretched-link">Ver obra →</a>

		            </div>
		            <?php
endwhile;
        wp_reset_query();
    }
    ?>

        </div>
    </div>
</div>
<?php
}
?>