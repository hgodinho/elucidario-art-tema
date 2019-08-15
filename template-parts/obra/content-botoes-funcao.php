<?php
/**
 * grade de botões de funções rápidas
 *
 * @version 0.1
 * @since 0.2
 */
$casa_museu = ' - Casa-museu Ema Klabin';
include get_template_directory() . '/template-parts/modal/modal-copiar-informacoes.php';
?>
<div class="btn-group w-100 content-box btn-size-fix d-print-none" role="group" aria-label="botões de funções">

    <div class="btn-group w-25 content-box" role="group">
        <button id="sharebuttons" type="button"
            class="btn btn-outline-primary dropdown-toggle w-100 grade-botoes content-box" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fas fa-share-alt"></i></button>
        <div class="dropdown-menu text-center content-box" aria-labelledby="sharebuttons">
            <?php
$connected = new WP_Query(
    array(
        'relationship' => array(
            'id' => 'obras_to_autores',
            'from' => get_the_ID(),
        ),
        'nopaging' => true,
    )
);
while ($connected->have_posts()): $connected->the_post();
    $nome_artista = get_the_title();
endwhile;
wp_reset_query();?>
            <!-- facebook -->
            <?php
$facebook_link = 'https://www.facebook.com/sharer/sharer.php?u=';
$facebook_link .= get_the_permalink();
?>
            <a class="fb-share dropdown-item" href="<?php echo $facebook_link; ?>" target="_blank"><i
                    class="fab fa-facebook-f"></i></a>

            <!-- twitter -->
            <?php
$twitter_link = 'https://twitter.com/intent/tweet';
$twitter_link .= '?text=' . get_the_title() . ', ' . $nome_artista . $casa_museu;
$twitter_link .= '&via=' . 'emaklabin';
$twitter_link .= '&url=' . get_the_permalink();
?>
            <a class="dropdown-item" href="<?php echo $twitter_link; ?>" target="_blank"><i
                    class="fab fa-twitter"></i></a>

            <!-- whatsapp -->
            <?php
$whatsapp_link = 'https://wa.me/?text=';
$whatsapp_link .= get_the_title() . ', ' . $nome_artista . $casa_museu;
$whatsapp_link .= ' ' . get_the_permalink();
?>
            <a class="dropdown-item" href="<?php echo $whatsapp_link; ?>" data-action="share/whatsapp/share"
                target="_blank"><i class="fab fa-whatsapp"></i></a>

            <!-- linkedin -->
            <?php
/*
$linkedin_link = 'https://www.linkedin.com/shareArticle?mini=true&url=';
$linkedin_link .= get_the_permalink();
//$linkedin_link .= '&title=' . get_the_title() . ', ' . $nome_artista . $casa_museu;
//$linkedin_link .= '&summary=' . 'Confira esta obra:' . get_the_title() . ', ' . $nome_artista . $casa_museu;
?>
            <a class="dropdown-item" href="<?php echo $linkedin_link; ?>" target="_blank"><i
                    class="fab fa-linkedin-in"></i></a>
            */
            ?>

            <!-- email -->
            <?php
$email_link = 'mailto:?subject=';
$email_link .= get_the_title() . ', ' . $nome_artista . $casa_museu;
$email_link .= '&amp;body=Confira essa obra da Casa-museu Ema Klabin: ';
$email_link .= get_the_permalink();
?>
            <a class="dropdown-item" href="<?php echo $email_link; ?>" target="_blank"><i
                    class="far fa-envelope"></i></a>
        </div>
    </div>
    <button type="button" class="btn btn-outline-primary w-25 grade-botoes content-box" data-toggle="modal"
        data-target="#informacoes-modal"><i class="fas fa-copy"></i></button>
    <button type="button" class="btn btn-outline-primary w-25 content-box" data-toggle="modal"
        data-target="#qr-code-modal"><i class="fas fa-qrcode"></i></button>
    <button type="button" class="btn btn-outline-primary w-25 content-box" onclick="printFunction()"><i
            class="fas fa-print"></i></button>
</div>

<?php
/**
 * Modal download
 */
?>
<div class="modal fade" id="qr-code-modal" tabindex="-1" role="dialog" aria-labelledby="qr-code" aria-hidden="true">
    <?php get_template_part('template-parts/modal/modal', 'qr-code');?>
</div>

<?php
/**
 * Modal copiar informações
 */
?>
<div class="modal fade" id="informacoes-modal" tabindex="-1" role="dialog" aria-labelledby="copiar informações"
    aria-hidden="true">
    <?php
if (function_exists('copiar_informacoes')) {
    copiar_informacoes($nome_artista);
}
?>
</div>


<?php
/**
 * Modal Facebook Sharer
 */
?>
<div class="modal fade" id="facebook-sharer-modal" tabindex="-1" role="dialog" aria-labelledby="facebook-sharer"
    aria-hidden="true">
    <?php get_template_part('template-parts/modal/modal', 'facebook-sharer');?>
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