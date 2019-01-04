<?php
/**
 * grade de botões de funções rápidas
 * 
 * @version 0.1
 * @since 0.2
 */
?>
<div class="btn-group w-100 content-box" role="group" aria-label="botões de funções">

    <div class="btn-group w-25 content-box" role="group">
        <button id="sharebuttons" type="button" class="btn btn-outline-primary dropdown-toggle w-100 grade-botoes content-box"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-share-alt"></i></button>
        <div class="dropdown-menu text-center content-box" aria-labelledby="sharebuttons">
            <!-- facebook -->
            <a class="dropdown-item" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a>

            <!-- twitter -->
            <a class="dropdown-item" href="#"><i class="fab fa-twitter"></i></a>

            <!-- whatsapp -->
            <a class="dropdown-item" href="#"><i class="fab fa-whatsapp"></i></a>

            <!-- linkedin -->
            <a class="dropdown-item" href="#"><i class="fab fa-linkedin-in"></i></a>

            <!-- email -->
            <a class="dropdown-item" href="#"><i class="far fa-envelope"></i></a>
        </div>
    </div>

    <button type="button" class="btn btn-outline-primary w-25 content-box" data-toggle="modal" data-target="#download-modal"><i
            class="fas fa-download"></i></button>
    <button type="button" class="btn btn-outline-primary w-25 content-box" onclick="printFunction()"><i class="fas fa-print"></i></button>
    <button type="button" class="btn btn-outline-primary w-25 grade-botoes content-box" data-toggle="modal" data-target="#informacoes-modal"><i class="fas fa-copy"></i></button>
</div>

<?php
/**
 * Modal download
 */
?>
<div class="modal fade" id="download-modal" tabindex="-1" role="dialog" aria-labelledby="download" aria-hidden="true">
    <?php get_template_part('template-parts/modal/modal', 'download'); ?>
</div>

<?php
/**
 * Modal copiar informações
 */
?>
<div class="modal fade" id="informacoes-modal" tabindex="-1" role="dialog" aria-labelledby="copiar informações" aria-hidden="true">
    <?php get_template_part('template-parts/modal/modal', 'copiar-informacoes'); ?>
</div>

<?php
/**
 * Função para imprimir página
 */
?>
<script>
function printFunction() {
  window.print();
}
</script>

