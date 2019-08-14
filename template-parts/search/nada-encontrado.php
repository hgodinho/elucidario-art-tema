<?php


?>
<header class="container py-4">
    <div class="row">
        <div class="col-12">
            <?php
get_search_form();?>
        </div>
        <div class="col-12 pb-4 pt-4">
            <h1>
                <span class="small text-muted">
                    <?php _e('Não encontramos nada com o termo:', TEXT_DOMAIN);?>
                </span>
                <?php echo get_search_query(); ?>
            </h1>

            <p class="lead">
                Tente refazer sua pesquisa.
            </p>
        </div>
    </div>
</header>