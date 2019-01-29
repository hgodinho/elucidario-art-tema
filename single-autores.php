<?php
/**
 * Template do single-autor
 *
 * exibe as informações de cada autor cadastrado
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.3
 * @since 0.1
 */
get_header();

?>

<?php
while (have_posts()): the_post();
    ?>
<!-- Breadcrumb @since 0.2 -->
<?php get_template_part('template-parts/header/header', 'breadcrumb');?>

<div class="container">

    <!-- a mágica inicia aqui -->
    <!-- Autor -->
    <div class="row">
        <?php get_template_part('template-parts/autor/content', 'autor'); ?>
        <?php get_template_part('template-parts/autor/content', 'obra-em-destaque'); ?>
    </div>
    <!-- // Autor -->

    <?php get_template_part('template-parts/autor/content', 'obras-do-autor'); ?>

    <!-- a mágica termina aqui -->


    <?php
endwhile;
get_footer();
?>