<?php
/**
 * Modal para copiar informações para citação
 * 
 * @author hgodinho.com
 * 
 * @version 0.1
 * @since 0.2 
 */
 function copiar_informacoes($nome_autor = null){
    $descricao_obj = get_field_object('field_5bfdeeb084777');
    $origem_obj = get_field_object('field_5bfd46adb4646');
    $dataperiodo_obj = get_field_object('field_5bfd46cab4647');
    $dimensoes_obj = get_field_object('field_5bfd47ebb4649');
?>
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Copie as informações de citação desta obra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <?php
            $encoding = get_bloginfo( 'charset' );
            $obra_fix = explode(' ', get_the_title());
            $first_word = trim(reset($obra_fix));
            $first_word_array = array($first_word);
            $result_array = array_diff($obra_fix, $first_word_array);
            $result_string = implode(' ', $result_array);
            ?>

            <div class="input-group mb-3">
                <?php
            $value = trim(mb_strtoupper($first_word, $encoding));
            //echo trim(mb_strtoupper($first_word, $encoding));
            if(!empty($result_array)){
                //echo ' ' . trim($result_string);
                $value .= ' ' . trim($result_string);
            }
            if($descricao_obj['value']){
                //echo ': ' . strip_tags(trim($descricao_obj['value']));
                $value .= ': ' . strip_tags(trim($descricao_obj['value']));
            }
            if($nome_autor){
                //echo '. ' . $nome_autor . '. ';
                $value .= '. ' . $nome_autor . '. ';
            }
            if($origem_obj['value']){
                //echo $origem_obj['value'] . '. ';
                $value .= $origem_obj['value'] . '. ';
            }
            if($dimensoes_obj['value']){
                //echo $dimensoes_obj['value'] . '. ';
                $value .= $dimensoes_obj['value'] . '. ';
            }
        ?>
                <textarea id="text_area_copy" class="form-control"
                    aria-label="Copiar Informações"><?php echo $value;?></textarea>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="copiar_infos">Copiar</button>
                </div>
            </div>
            <div class="alert alert-danger" id="msg" role="alert">Copie as informações.
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Pronto, já copiei!</button>
        </div>

    </div>
</div>

<?php
}
?>