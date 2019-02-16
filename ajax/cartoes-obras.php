<?php
/**
 * Função php chamada pelo ajax para gerar cartões de obras
 * 
 * Utilizada em diversos templates
 * @todo listar todos os templates
 * 
 * @author hgodinho <ola@hgodinho.com>
 */

 function cartoes_obras(){
    echo 'cartoes obras carregado';
    wp_die();
 }

 add_action('wp_ajax_cartoes_obras','cartoes_obras');
 add_action('wp_ajax_nopriv_cartoes_obras','cartoes_obras');