jQuery(document).ready(function ($) {
    /**
     * Alphabetical Pagination Script
     */
    var alphabetical_pagination_fix = function () {
        var ww = document.body.clientWidth;
        var bootstrap_sm = 576;
        var bootstrap_md = 768;
        var bootstrap_lg = 992;
        if (ww < bootstrap_lg) {
            $('#alphabet-menu').addClass('btn-group-vertical').addClass('btn-group-sm').addClass('sticky-top').attr('style', 'top:80px; z-index:1');
            $('.btn-az-single').addClass('rounded-0');
            $('#alphabet-menu').show();
        } else {
            $('#alphabet-menu').removeClass('btn-group-vertical').removeClass('btn-group-sm');
            $('#alphabet-menu').addClass('btn-group').addClass('d-flex');
            $('#alphabet-menu').show();
        }
    }

    $(window).resize(function () {
        $('#alphabet-menu').hide();
        alphabetical_pagination_fix();
    })

    alphabetical_pagination_fix();

    /**
     * Ação de listar autores
     */
    $('.autor_az').on('click', function () {
        //alert('teste');
        //listarAutores();
        $('.autor_az').removeClass('active');
        $(this).addClass('active');
    })

    /**
     * Listar Autores ajax
     */
    var listarAutores = function () {

        $.ajax({
                url: wiki_ema.ajaxurl,
                type: 'GET',
                data: {
                    action: 'wiki_ema_listar_autores'
                },
                beforeSend: function () {
                    console.log('carregando lista de autores...');
                }
            })
            .done(function (resposta) {
                //console.log(resposta);
                $('#lista-autores').html(resposta);
            })
            .fail(function () {
                console.log('ops, listar posts deu errado');
            })
    }

    //listarAutores();

    /**
     * Cartoes Obras ajax
     */
    var cartoesObras = function () {

        $.ajax({
                url: wiki_ema.ajaxurl,
                type: 'GET',
                data: {
                    action: 'wiki_ema_cartoes_obras'
                },
                beforeSend: function () {
                    console.log('carregando cartoes obras...');
                }
            })
            .done(function (resposta) {
                console.log(resposta);
            })
            .fail(function () {
                console.log('ops, cartoes de obras deu errado');
            })
    }
    //cartoesObras();

    /**
     * Função do botão back-to-top
     */
    var topbutton = function () {
        var offset = 500;
        var speed = 250;
        var duration = 1000;
        $(window).scroll(function () {
            if ($(this).scrollTop() < offset) {
                $('.topbutton').fadeOut(duration);
            } else {
                $('.topbutton').fadeIn(duration);
            }
        });
        $('.topbutton').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, speed);
            return false;
        });
    }
    topbutton();


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
})