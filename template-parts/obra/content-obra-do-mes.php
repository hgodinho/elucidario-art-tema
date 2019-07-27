<?php
/**
 * Template da Obra do mês
 *
 * utilizada na home page
 *
 * @version 0.2
 * @since 0.1
 */

function wiki_ema_destaque_home(WP_Query $obra_do_mes = null)
{
    if (have_posts()) {
        while ($obra_do_mes->have_posts()): $obra_do_mes->the_post();
            ?>
		<div class="row pb-4">
			<div class="col mt-4">
				<h2>Obra do mês
				</h2>
			</div>
		</div>
	        <a href="<?php the_permalink();?>">Ver obra →</a>
				<?php
    get_template_part('template-parts/obra/content', 'obra');
        endwhile;
	}
    ?>
</div>
<?php
}
?>