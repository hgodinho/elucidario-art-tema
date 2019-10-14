<?php
/**
 * Formulários simples de busca do Elucidário.art
 *
 * @since 0.6
 * @author hgodinho.com
 */

function elucidario_art_search_form(string $types = '', string $placeholder = '')
{?>

<form id="search" class="shadow-sm d-print-none" action="<?php echo get_site_url(); ?>" method="get">
    <div class="input-group input-group-lg">
        <input type="text" value="<?php the_search_query();?>" name="s" id="s" class="form-control rounded-0" placeholder="<?php echo $placeholder; ?>"
            aria-label="Buscar" aria-describedby="button-addon2">
        <input type="hidden" value="1" name="sentence" />
        <input type="hidden" value="<?php echo $types; ?>" name="post_type" />
        <div class="input-group-append">
            <button class="btn btn-secondary rounded-0" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>

<?php
}

/**
 * Formulário de busca para Home page Elucidário.art
 */
if (is_front_page(  )) {
    elucidario_art_search_form('autores, obras', 'buscar obra');
}

/**
 * Formulário de busca para Page
 */
if (is_page(  )) {
    elucidario_art_search_form('autores, obras', 'buscar obra');
}

/**
 * Formulário de busca para Arquivo de autores
 */
if (is_post_type_archive(array('autores')) or is_tax('autor_az')) {
    elucidario_art_search_form('obras, autores', 'buscar autor');
}

/**
 * Formulário de busca para Single Autores
 */
if (is_singular(array('autores'))) {
    elucidario_art_search_form('obras, autores', 'buscar autor');
}

/**
 * Formulário de busca para Single Obras
 */
if (is_singular(array('obras'))) {
    elucidario_art_search_form('obras, autores', 'buscar obra');
}

/**
 * Formulário de busca para Arquivo de Taxonomias (Ambientes, Núcleos e Classificações)
 */
if (is_single(array('Ambientes', 'Núcleos', 'Classificações', 'Ema Klabin'))) {
    elucidario_art_search_form('obras, autores', 'buscar obra');
}

/**
 * Formulário de busca para Single Taxonomy (ambientes, nucleos e classificacoes)
 */
if (is_tax(array('ambiente', 'nucleo', 'classificacao'))) {
    elucidario_art_search_form('obras, autores', 'buscar obra');
}

/**
 * Formulário de busca para arquivo de obras
 */
if (is_post_type_archive(array('obras')) or is_tax('obra_az')) {
    elucidario_art_search_form('', 'buscar obra');
}

/**
 * Formulário de busca SERP (search engine results page)
 */
if (is_search()) {
    elucidario_art_search_form('obras, autores', 'buscar obra');
}

?>