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


<div class="container py-4">

    <div class="row">

        <div class="col-12 pb-4 border-bottom">
            <?php
get_search_form();?>
        </div>
        <div class="col-12 pb-4">
            <?php
get_template_part('template-parts/header/header', 'archive');?>
        </div>

    </div>
</div>


<?php
if ($fichatecnica_autor['dataperiodo_inicial']) {?>
<div class="col-12 px-0">
    <p class="text-muted">(
        <?php
echo $fichatecnica_autor['dataperiodo_inicial'];
    if ($fichatecnica_autor['dataperiodo_final']) {
        echo ' — ';
        echo $fichatecnica_autor['dataperiodo_final']; ?>
        )</p>
</div>
<?php
} else {?>
)</p>
</div>
<?php
}
}
?>

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