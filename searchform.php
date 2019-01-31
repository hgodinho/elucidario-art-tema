<?php
/**
 * formulário simples de busca da wiki-ema
 */
?>

<form id="search" class="form-inline justify-content-end" method="get">
    <div class="input-group input-group">
        <input type="text" value="" name="s" id="s" class="form-control" placeholder="encontre uma obra" aria-label="Encontre uma obra"
            aria-describedby="button-addon2">
            <input type="hidden" value="obras" name="post_type" />
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>