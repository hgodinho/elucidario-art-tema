<?php
/**
 * Formulários simples de busca da wiki-ema
 *
 * @version 0.2
 * @since 0.6
 * @author hgodinho.com
 */

function wiki_ema_search_form(string $post_types = null, string $placeholder = null)
{?>
<form id="search" class="shadow-sm" method="get">
    <div class="input-group input-group-lg">
        <input type="text" value="<?php the_search_query();?>" name="s" id="s" class="form-control rounded-0" placeholder="<?php echo $placeholder; ?>"
            aria-label="Buscar" aria-describedby="button-addon2">
        <input type="hidden" value="1" name="sentence" />
        <input type="hidden" value="<?php echo $post_types; ?>" name="post_type" />

        <div class="input-group-append">
            <button class="btn btn-primary rounded-0" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<?php
}

/**
 * Formulário de busca para Home page Wiki-Ema
 */
if (is_singular()) {
    wiki_ema_search_form('obras,autores', 'buscar obra');
}

/**
 * Formulário de busca para Arquivo de autores
 */
if (is_post_type_archive(array('autores')) or is_tax('autor_az')) {
    wiki_ema_search_form('obras,autores', 'buscar autor');
}

/**
 * Formulário de busca para arquivo de obras
 */
if (is_post_type_archive(array('obras')) or is_tax('obra_az')) {
    wiki_ema_search_form('obras,autores', 'buscar obra');
}
?>