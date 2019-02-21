<?php
/**
 * Breadcrumbs
 *
 * @since 0.2
 * Original @author anwerashif
 * @source https://gist.github.com/anwerashif/ec4ac740047e2681e616fe2f1c63cbcf#file-functions-php
 *
 * Modifications @author hgodinho
 */

echo '<div class="container margin-top" id="breadcrumb-wiki-ema">';
echo '<div class="breadcrumb-wrap">';
echo '<nav aria-label="breadcrumb">';
echo '<ol class="breadcrumb">';

if (!is_home()) {
    echo '<li class="breadcrumb-item"><a href="';
    echo get_option('home') . '/wiki-ema';
    echo '">';
    echo 'Wiki-Ema';
    echo "</a></li>";

    if (is_singular('autores')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_post_type_archive_link('autores') . '">'; //@deprecated 0.15
        //echo get_permalink(get_page_by_path('autores', '', 'wiki_ema')) . '">';
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
            the_title();
            echo '</li>';
        }
    } elseif (is_tax('ambiente')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_permalink(get_page_by_path('ambientes', '', 'wiki_ema')) . '">';
        echo 'Ambiente</a>';
        if (is_tax('ambiente')) {
            echo '</li><li class="breadcrumb-item active">';
            single_term_title();
            echo '</li>';
        }
    } elseif (is_tax('classificacao')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_permalink(get_page_by_path('classificacoes', '', 'wiki_ema')) . '">';
        echo 'Classificação</a>';
        if (is_tax('classificacao')) {
            echo '</li><li class="breadcrumb-item active">';
            single_term_title();
            echo '</li>';
        }
    } elseif (is_tax('nucleo')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_permalink(get_page_by_path('nucleos', '', 'wiki_ema')) . '">';
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
    } elseif (is_singular('wiki_ema')) {
        echo "</li><li class='breadcrumb-item active'>";
        the_title();
        echo '</li>';
    } elseif (is_archive()){
        echo "</li><li class='breadcrumb-item active'>";
        post_type_archive_title();
        echo "</li>";
    }


} elseif (is_tag()) {
    single_tag_title();
} elseif (is_day()) {
    echo "<li class='breadcrumb-item'>Archive for ";
    the_time('F jS, Y');
    echo '</li>';
} elseif (is_month()) {
    echo "<li class='breadcrumb-item'>Archive for ";
    the_time('F, Y');
    echo '</li>';
} elseif (is_year()) {
    echo "<li class='breadcrumb-item'>Archive for ";
    the_time('Y');
    echo '</li>';
} elseif (is_author()) {
    echo "<li class='breadcrumb-item'>Author Archive";
    echo '</li>';
} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
    echo "<li>Blog Archives";
    echo '</li>';
} elseif (is_search()) {
    echo "<li class='breadcrumb-item'>Search Results";
    echo '</li>';
}

echo '</ol>';
echo '</nav>';
echo '</div>';
echo '</div>';
