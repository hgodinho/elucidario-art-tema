<?php
/**
 * Template part: Tabela autor
 *
 * tabela de todos os autores no single-wiki_ema-autores.php
 *
 * @version 0.1
 * @since 0.7
 */

if (have_posts()) {
    ?>
<table class="table table-hover table-responsive-md">
    <thead>
        <tr>
            <th scope="col-3">Nome</th>
            <th scope="col-3">Acervo</th>
            <th scope="col-3">Data inicial</th>
            <th scope="col-3">Data final</th>
        </tr>
    </thead>
    <tbody>
        <?php
while (have_posts()): the_post();
        ?>
        <tr>
            <td>
                <a href="<?php the_permalink();?>" class="text-decoration-none">
                    <?php the_title();?>
                </a>
            </td>
            <td>
                <?php $obras_contagem = count($post->connected);?>
                <?php
    echo $obras_contagem;
        if ($obras_contagem == '1') {
            echo ' <small>obra</small>';
        } else {
            echo ' <small>obras</small>';
        }
        ?>
            </td>
            <?php $fichatecnica_autor_inicio = get_field_object('field_5bfdfe04be13f');?>
            <?php $fichatecnica_autor_final = get_field_object('field_5bfdfe43be140');?>
            <td>
                <?php
                //var_dump($fichatecnica_autor_inicio);
                //var_dump($fichatecnica_autor_final);
    if ($fichatecnica_autor_inicio['value']) {
            echo $fichatecnica_autor_inicio['value'];
        }
        ?>
            </td>
            <td>
                <?php
    if ($fichatecnica_autor_final['value']) {
            echo $fichatecnica_autor_final['value'];
        }?>
            </td>
        </tr>
        <?php
endwhile;

    ?>
    </tbody>
</table>
<?php
} else{
    echo 'nenhum autor encontrado';
}
?>