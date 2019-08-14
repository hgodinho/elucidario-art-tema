/**
 * Scripts para copiar informações no modal-copiar-informacoes.php
 */
jQuery(document).ready(function ($) {
            function copiar_informacoes_script() {
                document.getElementById("copiar_infos").addEventListener("click", function () {
                    copyToClipboardMsg(document.getElementById("text_area_copy"), "msg");
                });

                function copyToClipboardMsg(elem, msgElem) {
                    var succeed = copyToClipboard(elem);
                    var msg;
                    $('#msg').addClass('alert-danger');
                    if (!succeed) {
                        msg = "Função de copiar não suportada. Pressione Ctrl+C para copiar, ou copie com o botão direito do mouse."
                    } else {
                        msg = "Informações copiadas com sucesso"
                    }
                    if (typeof msgElem === "string") {
                        msgElem = document.getElementById(msgElem);
                    }
                    msgElem.innerHTML = msg;
                    $('#msg').removeClass('alert-danger');
                    $('#msg').addClass('alert-success');
                    setTimeout(function () {
                        msgElem.innerHTML = "Copie as informações.";
                        $('#msg').removeClass('alert-success');
                        $('#msg').addClass('alert-danger');
                    }, 4000);
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
            }
        }