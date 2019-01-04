<?php
/**
 * sub template para conteúdo do autor - single
 *
 * @version 0.1
 * @since 0.2
 *
 * @author hgodinho.com
 */

$fichatecnica_autor = get_field('ficha_tecnica');
$descricao = get_field('descricao');

 ?>

<div class="col-md-8 mb-4">
    <div class="col-12 px-0">
        <h1>
            <?php the_title(); ?>
        </h1>
    </div>
    <div class="col-12 px-0">
        <p class="text-muted">(<?php echo $fichatecnica_autor['dataperiodo_inicial']; ?> — <?php echo $fichatecnica_autor['dataperiodo_final']; ?>)</p>
    </div>
    <!-- descricao -->
    <div class="col-12 mt-4">
        <h4 class="pt-4">Descrição:</h4>
        <p>
            <?php echo $descricao ?>
        </p>
    </div>
    <!-- // descricao -->

    <?php get_template_part('template-parts/autor/content', 'campos-clonaveis'); ?>

</div>
<!-- // informação -->