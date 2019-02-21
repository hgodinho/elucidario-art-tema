<?php
/**
 * Head do tema Wiki-Ema
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

	<?php get_template_part('template-parts/header/header','menu'); ?>

	<div class="container-fluid px-0 site-content" id="body-wiki-ema">