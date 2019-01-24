<?php
/**
 * template para taxonomia classificação sinle term
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

single_term_title('<h1>','</h1>');
echo '<br>teste';

get_footer();
?>