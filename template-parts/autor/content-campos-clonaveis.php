<?php
/**
 * Campos clonaveis do auto: Referências e Ligações Externas.
 *
 * @package WordPress
 * @package Meta-Box
 * @source https://docs.metabox.io/fields/fieldset-text/
 * @subpackage Wiki-Ema
 * 
 * @version 0.2
 * @since 0.2
 */


$autorprefix = 'autor-metabox_';
$referencias = rwmb_meta($autorprefix . 'referencias');
$externos = rwmb_meta($autorprefix . 'externo');



if (!empty($referencias) && $referencias[0]['titulo'] != '') {
    echo '<div class="col-12 mt-4">';
    echo '<h4>Referências</h4>';
    echo '<ol class="">';
    foreach ($referencias as $referencia) {
		echo '<li><a href="' . $referencia['url'] . '">' . 
			$referencia['titulo'] . ' <i class="fas fa-external-link-alt"></i></a> <span class="text-muted">Consultado em ' . 
			$referencia['data-de-consulta'] . '.</span></li>';
    }
    echo '</ol>';
    echo '</div>';
}

if (!empty($externos) && $externos[0]['titulo'] != '') {
    echo '<div class="col-12 mt-4">';
    echo '<h4>Ligações Externas</h4>';
    echo '<ol class="">';
    foreach ($externos as $externo) {
        echo '<li><a href="' . $externo['url'] . '">' .
            $externo['titulo'] . ' <i class="fas fa-external-link-alt"></i></a> <span class="text-muted"> por ' .
            $externo['autor'] . ', ' .
            $externo['ano'] . '.</span></li>';
    }
    echo '</ol>';
    echo '</div>';
}