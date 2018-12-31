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
?>

<?php
// Start the loop.
while (have_posts()): the_post();

    /*
     * Include the post format-specific template for the content. If you want to
     * use this in a child theme, then include a file called called content-___.php
     * (where ___ is the post format) and that will be used instead.
     */
    ?>
	<div class="container blog-post">
		<?php get_template_part('template-parts/obra/content', 'obra'); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    /* 
    if (comments_open() || get_comments_number()):
		echo '<div class="col-12 mt-4">';
			comments_template();
		echo '</div>';
		endif;
    echo '<div class="col-12 mt-4">';
 */    ?>

		<?php
the_post_navigation(array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentyfifteen') . '</span> ' .
    '<span class="screen-reader-text">' . __('Next post:', 'twentyfifteen') . '</span> ' .
    '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentyfifteen') . '</span> ' .
    '<span class="screen-reader-text">' . __('Previous post:', 'twentyfifteen') . '</span> ' .
    '<span class="post-title">%title</span>',
));
?>
	</div>

</div>

<?php
// End the loop.
endwhile;

get_footer();

?>
