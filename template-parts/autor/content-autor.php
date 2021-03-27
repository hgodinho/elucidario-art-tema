<?php
/**
 * sub template para conteúdo do autor - single
 *
 * @version 0.2
 * @since 0.2
 *
 * @author hgod.in
 */

$descricao = get_field('descricao');

?>


<div class="container py-4">
    <div class="col-12 px-3">
        <?php
get_search_form();?>
    </div>

    <div class="row">
        <div class="col-12">
            <?php
get_template_part('template-parts/header/header', 'archive');?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mb-2">
        <div class="col-12">
            <!-- descricao -->
            <?php if ($descricao) {?>
            <div class="col-12">
                <h4>Descrição:</h4>
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
</div>
<!-- // informação -->