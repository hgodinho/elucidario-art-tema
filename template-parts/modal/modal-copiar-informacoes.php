<?php
/**
 * Modal para copiar informações para citação
 * 
 * @author hgodinho.com
 * 
 * @version 0.1
 * @since 0.2 
 */
//include get_template_directory() . '/js/copiar-informacoes-script.js';
 function copiar_informacoes($nome_autor = null){
    $descricao_obj = get_field_object('field_5bfdeeb084777');
    $origem_obj = get_field_object('field_5bfd46adb4646');
    $dataperiodo_obj = get_field_object('field_5bfd46cab4647');
    $dimensoes_obj = get_field_object('field_5bfd47ebb4649');
?>
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Citação</h5>
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
            $colecao = 'Coleção Fundação Ema Klabin. ';

            ?>
            <p class="lead">
                Pretende citar esta página em algum artigo científico?
            </p>
            <p>
                Copie as informações do campo abaixo e cole nas Referências do seu artigo.
            </p>
            <div class="input-group mb-3">
                <?php
            $value = trim(mb_strtoupper($first_word, $encoding));
            if(!empty($result_array)){
                $value .= ' ' . trim($result_string);
            }
            if($descricao_obj['value']){
                $value .= ': ' . strip_tags(trim($descricao_obj['value']));
            }
            if($nome_autor){
                $value .= '. ' . $nome_autor . '. ';
            }
            if($origem_obj['value']){
                $value .= $origem_obj['value'] . ', ';
            }
            if($dataperiodo_obj['value']){
                $value .= $dataperiodo_obj['value'] . '. ';
            } else{
                $value .= 'Data desconhecida. ';
            }
            if($dimensoes_obj['value']){
                $value .= $dimensoes_obj['value'] . '. ';
            }
            $value .= $colecao;
            $value .= 'Acesso em ' . strftime('%d/%m/%Y', strtotime('today')) . '. ';
        ?>
                <textarea id="text_area_copy" rows="5" class="form-control"
                    aria-label="Copiar Informações"><?php echo $value;?></textarea>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="copiar_infos">Copiar</button>
                </div>
            </div>
            <div class="alert alert-danger" id="msg" role="alert">Copie as informações.
            </div>
            <p class="small">
                Nos envie uma cópia para que possamos
                arquivar em nosso banco de dados. <a href="mailto:pesquisa@emaklabin.org.br?subject=Citação%20de%20obra">pesquisa@emaklabin.org.br</a>
            </p>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Pronto, já copiei!</button>
        </div>

    </div>
</div>

<script type="application/javascript">
    jQuery(document).ready(function ($) {
        /**
         * Scripts para copiar informações no modal-copiar-informacoes.php
         */
        document.getElementById("copiar_infos").addEventListener("click", function () {
            copyToClipboardMsg(document.getElementById("text_area_copy"), "msg");
        });

        function copyToClipboardMsg(elem, msgElem) {
            var succeed = copyToClipboard(elem);
            var msg;
            $('#msg').addClass('alert-danger');
            if (!succeed) {
                msg =
                    "Função de copiar não suportada. Pressione Ctrl+C para copiar, ou copie com o botão direito do mouse."
            } else {
                msg = "Informações copiadas com sucesso"
            }
            if (typeof msgElem === "string") {
                msgElem = document.getElementById(msgElem);
            }
            msgElem.innerHTML = msg;
            $('#msg').removeClass('alert-danger');
            $('#msg').addClass('alert-success');
        }

        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch (e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
    })
</script>
<?php
}
?>