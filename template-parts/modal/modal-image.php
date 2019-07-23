<?php
/**
 * Modal de Ampliação da Imagem
 *
 * @author hgodinho.com
 *
 * @version 0.1
 * @since 0.4
 *
 */
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
                if($dataperiodo_obj['value']){?>,
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
            <ul class="list-group list-group-flush">
                <?php 
                if($descricao_obj['value']){ ?>
                    <li class="list-group-item">
                    <strong>Descrição:</strong> <?php echo $descricao_obj['value'];?>
                    </li>
                <?php
                }
                if($origem_obj['value']){
                    ?>
                    <li class="list-group-item">
                    <strong>Origem:</strong> <?php echo $origem_obj['value'];?>
                    </li>
                <?php
                }
                if($tombo_obj['value']){
                    ?>
                    <li class="list-group-item">
                    <strong>Nº de tombo:</strong> <?php echo $tombo_obj['value'];?>
                    </li>
                <?php
                }
                if($material_obj['value']){
                    ?>
                    <li class="list-group-item">
                    <strong>Material ou técnica:</strong> <?php echo $material_obj['value'];?>
                    </li>
                <?php
                }
                if($dimensoes_obj['value']){
                    ?>
                    <li class="list-group-item">
                    <strong>Dimensões:</strong> <?php echo $dimensoes_obj['value'];?>
                    </li>
                <?php
                }
                if($fotografo_obj['value']){
                    ?>
                    <li class="list-group-item">
                    <strong>Fotografia:</strong> <?php echo $fotografo_obj['value'];?>
                    </li>
                <?php
                }
                ?>
            </ul>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>

    </div>
</div>