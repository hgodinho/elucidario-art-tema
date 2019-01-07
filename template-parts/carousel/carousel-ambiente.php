<?php

$term = get_queried_object();

$imagem1 = get_field('imagem_1', $term);
$imagem2 = get_field('imagem_2', $term);
$imagem3 = get_field('imagem_3', $term);

$size = 'full';

if (!empty($imagem1) && !empty($imagem2) && !empty($imagem3)) {
    //header carousel
    echo '<div id="carouselImagensAmbiente" class="carousel slide" data-ride="carousel" data-touch="true">';
    // indicadores de posição
    echo '<ol class="carousel-indicators">';
    echo '<li data-target="#carouselImagensAmbiente" data-slide-to="0" class="active"></li>';
    echo '<li data-target="#carouselImagensAmbiente" data-slide-to="1"></li>';
    echo '<li data-target="#carouselImagensAmbiente" data-slide-to="2"></li>';
    echo '</ol>';
    // carousel-inner
    echo '<div class="carousel-inner">';

    //carousel item 1
    echo '<div class="carousel-item active">';
    //imagem
    echo '<img src="';
    echo $imagem1['url'];
    echo '" class="d-block w-100" alt="';
    echo $imagem1['alt'];
    echo '" />'; // fecha imagem
    //caption
    echo '<div class="carousel-caption d-none d-md-block">';
    echo '<h5>';
    echo $imagem1['name'];
    echo '</h5>';
    echo '<p>';
    echo $imagem1['description'];
    echo '</p>';
    echo '</div>'; // fecha caption
    echo '</div>'; //fecha carousel item 1

    //carousel item 2
    echo '<div class="carousel-item">';
    //imagem
    echo '<img src="';
    echo $imagem2['url'];
    echo '" class="d-block w-100" alt="';
    echo $imagem2['alt'];
    echo '" />'; // fecha imagem
    //caption
    echo '<div class="carousel-caption d-none d-md-block">';
    echo '<h5>';
    echo $imagem2['name'];
    echo '</h5>';
    echo '<p>';
    echo $imagem2['description'];
    echo '</p>';
    echo '</div>'; // fecha caption
    echo '</div>'; //fecha carousel item 1

    //carousel item 3
    echo '<div class="carousel-item">';
    //imagem
    echo '<img src="';
    echo $imagem3['url'];
    echo '" class="d-block w-100" alt="';
    echo $imagem3['alt'];
    echo '" />'; // fecha imagem
    //caption
    echo '<div class="carousel-caption d-none d-md-block">';
    echo '<h5>';
    echo $imagem3['name'];
    echo '</h5>';
    echo '<p>';
    echo $imagem3['description'];
    echo '</p>';
    echo '</div>'; // fecha caption
    echo '</div>'; //fecha carousel item 1

    echo '</div>'; //fecha inner
    ?>

    <a class="carousel-control-prev" href="#carouselImagensAmbiente" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselImagensAmbiente" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>

    <?php
    echo '</div>'; //fecha header
}

if (!empty($imagem1) && !empty($imagem2) && empty($imagem3)) {
    //header carousel
    echo '<div id="carouselImagensAmbiente" class="carousel slide" data-ride="carousel" data-touch="true">';
    // indicadores de posição
    echo '<ol class="carousel-indicators">';
    echo '<li data-target="#carouselImagensAmbiente" data-slide-to="0" class="active"></li>';
    echo '<li data-target="#carouselImagensAmbiente" data-slide-to="1"></li>';
    echo '</ol>';
    // carousel-inner
    echo '<div class="carousel-inner">';

    //carousel item 1
    echo '<div class="carousel-item active">';
    //imagem
    echo '<img src="';
    echo $imagem1['url'];
    echo '" class="d-block w-100" alt="';
    echo $imagem1['alt'];
    echo '" />'; // fecha imagem
    //caption
    echo '<div class="carousel-caption d-none d-md-block">';
    echo '<h5>';
    echo $imagem1['name'];
    echo '</h5>';
    echo '<p>';
    echo $imagem1['description'];
    echo '</p>';
    echo '</div>'; // fecha caption
    echo '</div>'; //fecha carousel item 1

    //carousel item 2
    echo '<div class="carousel-item">';
    //imagem
    echo '<img src="';
    echo $imagem2['url'];
    echo '" class="d-block w-100" alt="';
    echo $imagem2['alt'];
    echo '" />'; // fecha imagem
    //caption
    echo '<div class="carousel-caption d-none d-md-block">';
    echo '<h5>';
    echo $imagem2['name'];
    echo '</h5>';
    echo '<p>';
    echo $imagem2['description'];
    echo '</p>';
    echo '</div>'; // fecha caption
    echo '</div>'; //fecha carousel item 1

    echo '</div>'; //fecha inner
    ?>

    <a class="carousel-control-prev" href="#carouselImagensAmbiente" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselImagensAmbiente" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>

    <?php
    echo '</div>'; //fecha header
}

if (!empty($imagem1) && empty($imagem2) && empty($imagem3)) {
    //header carousel
    echo '<div id="carouselImagensAmbiente" class="carousel slide" data-ride="carousel" data-touch="true">';
    // indicadores de posição
    echo '<ol class="carousel-indicators">';
    echo '<li data-target="#carouselImagensAmbiente" data-slide-to="0" class="active"></li>';
    echo '</ol>';
    // carousel-inner
    echo '<div class="carousel-inner">';

    //carousel item 1
    echo '<div class="carousel-item active">';
    //imagem
    echo '<img src="';
    echo $imagem1['url'];
    echo '" class="d-block w-100" alt="';
    echo $imagem1['alt'];
    echo '" />'; // fecha imagem
    //caption
    echo '<div class="carousel-caption d-none d-md-block">';
    echo '<h5>';
    echo $imagem1['name'];
    echo '</h5>';
    echo '<p>';
    echo $imagem1['description'];
    echo '</p>';
    echo '</div>'; // fecha caption
    echo '</div>'; //fecha carousel item 1
    
    echo '</div>'; //fecha inner
    ?>

    <?php
    echo '</div>'; //fecha header
}

?>