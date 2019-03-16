<?php
/**
 * Template de cartões de obras
 *
 * @version 0.2
 * @since 0.7
 * @author hgodinho.com
 */
?>
<?php
$thumbnail = get_the_post_thumbnail(get_the_ID(), 'cartoes-thumb-obra', array('class' => 'card-img-top img-fluid d-block rounded-0 mb-0'));
$permalink = get_permalink();
$dataperiodo = get_field_object('field_5bfd46cab4647');
$material = get_field_object('field_5bfd46fcb4648');
$dimensoes = get_field_object('field_5bfd47ebb4649');
$tombo = get_field_object('field_5bfd4663b4645');
?>
<div class="col col-md-10 col-lg-4">

    <div class="card mb-5 rounded-0 shadow">

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
                    <th scope="row" class="cartao-obra-row">Material ou Técnica</th>
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
</div>