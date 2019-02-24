<?php
/**
 * Template da single-obra
 *
 * exibe as informações de cada obra cadastrada
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.2
 * @since 0.1
 */

get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
?>

<?php
while (have_posts()): the_post();?>
	<div class="container blog-post">
	    <?php
    $post_object = get_post_meta($post->ID);?>
	    <?php get_template_part('template-parts/obra/content', 'obra');?>

	    <?php get_template_part('template-parts/obra/content', 'campos_clonaveis');?>

	    <?php get_template_part('template-parts/obra/content', 'obras-relacionadas');?>
	    <?php
    the_post_navigation(
        array(
            'next_text' => '

	        <span class="meta-nav" aria-hidden="true">' .
            __('Next', 'twentyfifteen') .
            '</span> ' .
            '<span class="screen-reader-text">' .
            __('Next post:', 'twentyfifteen') .
            '</span> ' .
            '<span class="post-title">%title</span>',

            'prev_text' => '
	        <span class="meta-nav" aria-hidden="true">'
            . __('Previous', 'twentyfifteen') .
            '</span> ' .
            '<span class="screen-reader-text">' .
            __('Previous post:', 'twentyfifteen') .
            '</span> ' .
            '<span class="post-title">%title</span>',
        ));?>
	</div>
	</div>

	<?php
endwhile;?>

<?php
get_footer();?>