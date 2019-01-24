<?php
/**
 * template para página 'Classificação' no Custom-post wiki_ema
 * 
 * responsável por exibir o arquivo de taxonomias classificação, 
 * listando cada classificação criada na custom taxonomy
 * 
 * @package WordPress
 * @subpackage Wiki-Ema
 * 
 * @version 0.1
 * @since 0.3
 * 
 * @author hgodinho.com
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');

the_title();

echo 'pagina que lista autores';



get_footer();
?>