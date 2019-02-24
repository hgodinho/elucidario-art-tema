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
            <th scope="col">Nome</th>
            <th scope="col">Data inicial</th>
            <th scope="col">Data final</th>
            <th scope="col">Na coleção</th>
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
		            <?php $fichatecnica_autor = get_field('ficha_tecnica');?>
		            <td>
		                <?php
    if ($fichatecnica_autor['dataperiodo_inicial']) {
            echo $fichatecnica_autor['dataperiodo_inicial'];
        }
        ?>
		            </td>
		            <td>
		                <?php
    if ($fichatecnica_autor['dataperiodo_final']) {
            echo $fichatecnica_autor['dataperiodo_final'];
        }?>
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