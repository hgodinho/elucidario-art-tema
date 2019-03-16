<?php
/**
 * sub template para conteúdo do autor - single
 *
 * @version 0.1
 * @since 0.2
 *
 * @author hgodinho.com
 */

$descricao = get_field('descricao');

?>


<div class="container py-4">
    <div class="row">
        <div class="col-12 pb-4">
            <?php
get_template_part('template-parts/header/header', 'archive');?>
        </div>
        <div class="col-12 px-4">
            <?php
get_search_form();?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <!-- descricao -->
        <?php if ($descricao) {?>
        <div class="col-12 mt-4">
            <h4 class="pt-4">Descrição:</h4>
            <p>
                <?php echo $descricao ?>
            </p>
        </div>
        <?php
}?>
        <!-- // descricao -->

        <?php get_template_part('template-parts/autor/content', 'campos-clonaveis');?>

    </div>
</div>
<!-- // informação -->