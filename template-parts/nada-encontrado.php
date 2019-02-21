<?php


?>
<header class="container pb-4 mb-4">
<div class="row">
    <div class="col-12 pb-4 pt-4">
        <h1>
            <span class="small text-muted">
                <?php _e('Não foi possivel encontrar nada com o termo:', TEXT_DOMAIN);?>
            </span>
            <?php echo get_search_query(); ?>
        </h1>
        <p class="lead">
            Tente voltar e refazer sua pesquisa.
        </p>
    </div>
</div>
</header>
