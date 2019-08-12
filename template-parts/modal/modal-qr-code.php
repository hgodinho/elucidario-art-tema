<?php
/**
 * Modal de Qr-Code
 *
 * @author hgodinho.com
 *
 * @version 0.1
 * @since   0.2
 */
?>
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Qr-Code para esta obra:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <?php
$linkobra = get_permalink();
global $qrcodetag;
?>
            <div class="row">
                <div class="col-7">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=170x170&qzone=4&format=svg&data=<?php the_permalink();?>"
                        alt="QR:  <?php the_title();?>" />
                    <p>
                        <a href="https://api.qrserver.com/v1/create-qr-code/?size=170x170&qzone=4&format=svg&data=<?php the_permalink();?>"
                            download="<?php the_title();?>">
                            clique para baixar o Qr-Code.
                        </a>
                    </p>
                </div>
                <div class="col-5">
                    <p>
                        Utilize o <strong>Qr-code</strong> para acessar rapidamente esta página.
                    </p>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>

    </div>
</div>