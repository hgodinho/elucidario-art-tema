<?php
/**
 * Função php chamada pelo ajax para gerar cartões de obras
 * 
 * Utilizada em diversos templates
 * @todo listar todos os templates
 * 
 * @author hgodinho <ola@hgodinho.com>
 */

 function wiki_ema_cartoes_obras(){
    echo 'cartoes obras carregado';
    wp_die();
 }

 add_action('wp_ajax_wiki_ema_cartoes_obras','wiki_ema_cartoes_obras');
 add_action('wp_ajax_nopriv_wiki_ema_cartoes_obras','wiki_ema_cartoes_obras');