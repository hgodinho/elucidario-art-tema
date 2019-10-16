<?php
/**
 * Breadcrumbs
 *
 * @since 0.3
 * Original @author anwerashif
 * @source https://gist.github.com/anwerashif/ec4ac740047e2681e616fe2f1c63cbcf#file-functions-php
 *
 * Modifications @author hgodinho
 */

echo '<div class="container margin-top" id="breadcrumb-elucidario-art">';
echo '<div class="breadcrumb-wrap px-3">';
echo '<nav aria-label="breadcrumb">';
echo '<ol class="breadcrumb rounded-0 mb-0">';

if (!is_home()) {
    echo '<li class="breadcrumb-item"><a href="';
    echo get_site_url();
    echo '">';
    echo get_bloginfo('name');
    echo "</a></li>";

    if (is_singular('autores')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_post_type_archive_link('autores') . '">'; //@deprecated 0.15
        //echo get_permalink(get_page_by_path('autores', '', 'elucidario_art')) . '">';
        echo 'Autores</a>';
        if (is_single()) {
            echo "</li><li class='breadcrumb-item active'>";
            the_title();
            echo '</li>';
        }
    } elseif (is_singular('obras')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_post_type_archive_link('obras') . '">';
        echo 'Obras</a>';
        if (is_single()) {
            echo "</li><li class='breadcrumb-item active'>";
            if(function_exists('capitular')){
                capitular(get_the_title());
            }
            echo '</li>';
        }
    } elseif (is_tax('ambiente')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_permalink(get_page_by_path('ambientes', '', 'elucidario_art')) . '">';
        echo 'Ambiente</a>';
        if (is_tax('ambiente')) {
            echo '</li><li class="breadcrumb-item active">';
            single_term_title();
            echo '</li>';
        }
    } elseif (is_tax('classificacao')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_permalink(get_page_by_path('classificacoes', '', 'elucidario_art')) . '">';
        echo 'Classificação</a>';
        if (is_tax('classificacao')) {
            echo '</li><li class="breadcrumb-item active">';
            single_term_title();
            echo '</li>';
        }
    } elseif (is_tax('nucleo')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_permalink(get_page_by_path('nucleos', '', 'elucidario_art')) . '">';
        echo 'Núcleo</a>';
        if (is_tax('nucleo')) {
            echo '</li><li class="breadcrumb-item active">';
            single_term_title();
            echo '</li>';
        }
    } elseif (is_tax('obra_az')) {
        //var_dump($wp_query);
        echo '<li class="breadcrumb-item"><a href="';
        echo get_post_type_archive_link('obras');
        echo '">';
        echo 'Obras</a>';
        if (is_tax('obra_az')) {
            echo '</li><li class="breadcrumb-item active">';
            single_term_title();
            echo '</li>';
        }
    } elseif (is_tax('autor_az')) {
        //var_dump($wp_query);
        echo '<li class="breadcrumb-item"><a href="';
        echo get_post_type_archive_link('autores');
        echo '">';
        echo 'Autores</a>';
        if (is_tax('autor_az')) {
            echo '</li><li class="breadcrumb-item active">';
            single_term_title();
            echo '</li>';
        }
    } elseif (is_page()) {
        echo '<li class="breadcrumb-item">';
        echo the_title();
        echo '</li>';
    } elseif (is_singular('elucidario_art')) {
        echo "</li><li class='breadcrumb-item active'>";
        the_title();
        echo '</li>';
    } elseif (is_archive()) {
        echo "</li><li class='breadcrumb-item active'>";
        post_type_archive_title();
        echo "</li>";
    } elseif (is_search()) {
        $search_query = get_search_query();
        echo "</li><li class='breadcrumb-item active'>";
        echo "<i class='fas fa-search'></i> → " . $search_query;
        echo '</li>';
    }
}
echo '</ol>';
echo '</nav>';
echo '</div>';
echo '</div>';
