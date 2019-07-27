<?php
/**
 * Modal de Qr-Code
 * 
 * @author hgodinho.com
 * 
 * @version 0.1
 * @since 0.2
 * 
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
                <div class="col-6">
                    <img src="<?php 
  echo $qrcodetag->getQrCodeUrl($linkobra,180,'UTF-8','L',4,0); 
?>">
                </div>
                <div class="col-6">
                    <p>
                        Escaneie o <strong>Qr-code</strong> com seu celular para acessar essa página de obra.
                    </p>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>

    </div>
</div>