<?php
/**
 * Modal de Ampliação da Imagem
 *
 * @author hgod.in
 *
 * @version 0.1
 * @since 0.4
 *
 */
//global $wp_query;
$tombo_obj = get_field_object('field_5bfd4663b4645');
$origem_obj = get_field_object('field_5bfd46adb4646');
$dataperiodo_obj = get_field_object('field_5bfd46cab4647');
$material_obj = get_field_object('field_5bfd46fcb4648');
$dimensoes_obj = get_field_object('field_5bfd47ebb4649');
$fotografo_obj = get_field_object('field_5c0ec52b96602');
$descricao_obj = get_field_object('field_5bfdeeb084777');

$thumbnail = get_the_post_thumbnail(get_the_ID(), '', array('class' => 'fluid mx-auto d-block', 'style' => 'width: 100%; height: 100%; object-fit: cover;'));
$thumbnail_link = get_the_post_thumbnail_url(get_the_ID(), 'full');
$linkobra = get_permalink();
?>
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="imagetitle">
                <?php the_title();
if ($dataperiodo_obj['value']) {?>,
                <small class="text-muted">
                    <?php echo $dataperiodo_obj['value'] . '. '; ?>
                </small>
                <?php } else {echo '.';}?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <?php echo $thumbnail; ?>
            <table class="table table-striped container-fluid mb-0">
                <tbody>
                    <?php if ($tombo_obj['value']): ?>
                    <tr>
                        <th scope="row" class="cartao-obra-row">Tombo</th>
                        <td>
                            <?php echo $tombo_obj['value']; ?>
                        </td>
                    </tr>
                    <?php endif;?>

                    <?php if ($origem_obj['value']): ?>
                    <tr>
                        <th scope="row" class="cartao-obra-row">Origem</th>
                        <td>
                            <?php echo $origem_obj['value']; ?>
                        </td>
                    </tr>
                    <?php endif;?>

                    <?php if ($dataperiodo_obj['value']): ?>
                    <tr>
                        <th scope="row" class="cartao-obra-row">Data</th>
                        <td>
                            <?php echo $dataperiodo_obj['value']; ?>
                        </td>
                    </tr>
                    <?php endif;?>

                    <?php if ($material_obj['value']): ?>
                    <tr>
                        <th scope="row" class="cartao-obra-row">Material<br>ou técnica</th>
                        <td>
                            <?php echo $material_obj['value']; ?>
                        </td>
                    </tr>
                    <?php endif;?>

                    <?php if ($dimensoes_obj['value']): ?>
                    <tr>
                        <th scope="row" class="cartao-obra-row">Medidas</th>
                        <td>
                            <?php echo $dimensoes_obj['value']; ?>
                        </td>
                    </tr>
                    <?php endif;?>

                    <?php if ($fotografo_obj['value']) {?>
                    <tr>
                        <th scope="row" class="cartao-obra-row">Fotografia</th>
                        <td>
                            <?php echo $fotografo_obj['value']; ?>
                        </td>
                    </tr>
                    <?php
}?>

                </tbody>
            </table>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>

    </div>
</div>