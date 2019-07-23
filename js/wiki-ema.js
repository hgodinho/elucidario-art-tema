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
            $('#alphabet-menu').addClass('btn-group-vertical').addClass('btn-group-sm').attr('style', 'top:80px; z-index:1');
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
            if($(this).scrollTop() < offset) {
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

})