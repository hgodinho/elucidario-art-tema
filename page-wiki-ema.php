<?php
/**
 * Home-page da Wiki-Ema
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
?>

<section id="primary" class="content-area">
	
	<?php get_template_part('template-parts/jumbotron', 'home');?>

	<main role="main" class="container-fluid">
		<div class="blog-main container">
			<?php get_template_part('template-parts/obra/content', 'obra-do-mes');?>
		</div>
	</main>

</section>

<?php
get_footer();
?>