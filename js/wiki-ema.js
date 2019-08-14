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
})