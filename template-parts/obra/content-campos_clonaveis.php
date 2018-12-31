<?php
/**
 * Campos clonaveis da obra: Referências, Ligações Externas e Exposições.
 *
 * @package WordPress
 * @package Meta-Box
 * @source https://docs.metabox.io/fields/fieldset-text/
 * @subpackage Wiki-Ema
 * 
 * @version 0.2
 * @since 0.1
 */

$obraprefix = 'obra-metabox_';

$referencias = rwmb_meta($obraprefix . 'referencias');
$externos = rwmb_meta($obraprefix . 'externo');
$exposicoes = rwmb_meta($obraprefix . 'exposicoes');


if ($referencias[0]['titulo']) {
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

if ($externos[0]['titulo']) {
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

if ($exposicoes[0]['titulo']) {
 	echo '<div class="col-12 mt-4">';
	echo '<h4>Exposições</h4>';
	echo '<ol class="">';
		foreach ($exposicoes as $exposicao) {
        echo '<li><a href="' . $exposicao['url'] . '">' .
			$exposicao['titulo'] . ' <i class="fas fa-external-link-alt"></i></a> <span class="text-muted">' .
			$exposicao['local'] . ', ' . 
			$exposicao['ano'] . '.</span></li>';
		}
	echo '</ol>';
echo '</div>';
}
?>
