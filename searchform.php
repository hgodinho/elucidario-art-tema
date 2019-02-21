<?php
/**
 * formulário simples de busca da wiki-ema
 */
?>

<?php 

    if(is_post_type_archive( array('obras', 'autores') )){
?>

<form id="search" class="form-inline justify-content-end" method="get">
    <div class="input-group input-group">
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="form-control" placeholder="buscar uma obra ou artista" aria-label="Buscar"
            aria-describedby="button-addon2">

        <input type="hidden" value="1" name="sentence" />
        <input type="hidden" value="obras,autores" name="post_type" />
        
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>

<?php
    }
?>
