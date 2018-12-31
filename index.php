<?php 
/**
 * Index da Wiki-ema
 * 
 * Jumbotrom de obra e Obras do mês
 * 
 * @package WordPress
 * @subpackage Wiki-Ema
 * @since 0.1
 */

get_header();
?>

<?php get_template_part('template-parts/jumbotron', 'home'); ?>

<div class="blog-main container">
	<?php get_template_part('template-parts/obra/content', 'obradomes'); ?>
</div>

<?php get_footer();?>