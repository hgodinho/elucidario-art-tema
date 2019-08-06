<?php
/**
 * Home-page da Wiki-Ema
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.2
 * @since 0.3
 *
 * @author hgodinho.com
 */
get_header();
include get_template_directory().'/template-parts/jumbotron-home.php';
include get_template_directory().'/template-parts/obra/content-obra-do-mes.php';

$args = array(
    'post_type' => 'obras',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key' => 'obra_domes',
            'compare' => '=',
            'value' => '1',
        ),
    ),
);
$obra_do_mes = new WP_Query($args);
?>

<section id="primary" class="content-area">
	
	<?php 
	if(function_exists('wiki_ema_jumbotron_home')){
		wiki_ema_jumbotron_home($obra_do_mes);
	}

	?>
<a href="<?php echo get_post_type_archive_link('autores'); ?>">Autores</a>
	<main role="main" class="container-fluid">
		<div class="blog-main container">
			<?php 
			if(function_exists('wiki_ema_destaque_home')){
				wiki_ema_destaque_home($obra_do_mes);
			}
			?>
		</div>
	</main>

</section>

<?php
get_footer();
?>