jQuery(document).ready(function ($) {


    if($(window).width() < 720){
        $('#alphabet-menu').addClass('btn-group-vertical').removeClass('btn-group').removeClass('d-flex');
    } else{
        $('#alphabet-menu').addClass('btn-group').removeClass('btn-group-vertical');
    }   

    /**
     * Ação de listar autores
     */
    $('.autor_az').on('click', function(){
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
            beforeSend: function (){
                console.log('carregando lista de autores...');
            }
        })
        .done(function(resposta){
            //console.log(resposta);
            $('#lista-autores').html(resposta);
        })
        .fail(function(){
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
            beforeSend: function (){
                console.log('carregando cartoes obras...');
            }
        })
        .done(function(resposta){
            console.log(resposta);
        })
        .fail(function(){
            console.log('ops, cartoes de obras deu errado');
        })
    }
    //cartoesObras();
    

})