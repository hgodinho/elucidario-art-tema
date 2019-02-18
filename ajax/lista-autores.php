<?php
/**
 * Função php chamada pelo ajax para gerar lista de autores
 * 
 * Utilizada em diversos templates
 * @todo listar todos os templates
 * 
 * @author hgodinho <ola@hgodinho.com>
 */

 function wiki_ema_listar_autores(){
    echo 'listar autores deu certo';
    wp_die();
 }

 add_action('wp_ajax_wiki_ema_listar_autores','wiki_ema_listar_autores');
 add_action('wp_ajax_nopriv_wiki_ema_listar_autores','wiki_ema_listar_autores');