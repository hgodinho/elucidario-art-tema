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

echo '<div class="container margin-top">';
echo '<div class="breadcrumb-wrap">';
echo '<nav aria-label="breadcrumb">';
echo '<ol class="breadcrumb">';

if (!is_home()) {
    echo '<li class="breadcrumb-item"><a href="';
    echo get_option('home') . '/wiki-ema';
    echo '">';
    echo 'Wiki-ema';
    echo "</a></li>";

    if (is_singular('autores')) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_post_type_archive_link('autores') . '">';
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
    } elseif (is_page()) {
        echo '<li class="breadcrumb-item">';
        echo the_title();
        echo '</li>';
    }
} elseif (is_tag()) {
    single_tag_title();} elseif (is_day()) {
    echo "<li class='breadcrumb-item'>Archive for ";
    the_time('F jS, Y');
    echo '</li>';} elseif (is_month()) {echo "<li class='breadcrumb-item'>Archive for ";
    the_time('F, Y');
    echo '</li>';} elseif (is_year()) {echo "<li class='breadcrumb-item'>Archive for ";
    the_time('Y');
    echo '</li>';} elseif (is_author()) {echo "<li class='breadcrumb-item'>Author Archive";
    echo '</li>';} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives";
    echo '</li>';} elseif (is_search()) {echo "<li class='breadcrumb-item'>Search Results";
    echo '</li>';}

echo '</ol>';
echo '</nav>';
echo '</div>';
echo '</div>';
