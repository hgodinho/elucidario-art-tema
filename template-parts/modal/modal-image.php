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
$fichatecnica_obra = get_field('ficha_tecnica');
$fotografo = get_field('fotografo');
$descricao = get_field('descricao');
$thumbnail = get_the_post_thumbnail(get_the_ID(), '', array('class' => 'fluid mx-auto d-block', 'style' => 'width: 100%; height: 100%; object-fit: cover;'));
$thumbnail_link = get_the_post_thumbnail_url(get_the_ID(),'full');
$linkobra = get_permalink();
?>
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="imagetitle">
                <?php the_title();?>,
                <small class="text-muted">
                    <?php echo $fichatecnica_obra['dataperiodo'] . '. '; ?>
                </small>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
        <?php echo $thumbnail; ?>

        Acrescentar legenda da imagem

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>

    </div>
</div>