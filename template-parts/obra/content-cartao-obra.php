<?php
/**
 * Template de cartões de obras
 *
 * @version 0.3
 * @since 0.4
 * @author hgodinho.com
 */

if (have_posts()) {
    if (is_singular('autores')) {
        get_template_part('template-parts/obra/content', 'cartao-obra-no-loop');

    } else {
        while (have_posts()): the_post();
            get_template_part('template-parts/obra/content', 'cartao-obra-no-loop');
        endwhile;
    }
}
