<?php

$term = get_queried_object();

$imagem1 = get_field('imagem_1', $term);
$imagem2 = get_field('imagem_2', $term);
$imagem3 = get_field('imagem_3', $term);

$size = 'full';

if (!empty($imagem1) && !empty($imagem2) && !empty($imagem3)) {
    ?>
<div id="carouselImagensAmbiente" class="carousel slide" data-ride="carousel" data-touch="true">

    <ol class="carousel-indicators">
        <li data-target="#carouselImagensAmbiente" data-slide-to="0" class="active"></li>
        <li data-target="#carouselImagensAmbiente" data-slide-to="1"></li>
        <li data-target="#carouselImagensAmbiente" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo $imagem1['url']; ?>" class="d-block w-100" alt="<?php echo $imagem1['alt'] ?>" />
            <div class="carousel-caption d-none d-md-block">
                <div class="legenda-carousel">
                    <h5>
                        <?php echo $imagem1['title']; ?>
                    </h5>
                    <p class="small">
                        <?php echo $imagem1['description']; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="<?php echo $imagem2['url']; ?>" class="d-block w-100" alt="<?php echo $imagem2['alt']; ?>" />
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    <?php echo $imagem2['title'];?>
                </h5>
                <p class="small">
                    <?php echo $imagem2['description'];?>
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo $imagem3['url']; ?>" class="d-block w-100" alt="<?php echo $imagem3['alt']; ?>" />
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    <?php echo $imagem3['title']; ?>
                </h5>
                <p class="small">
                    <?php echo $imagem3['description']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php 
} ?>

<?php
if (!empty($imagem1) && !empty($imagem2) && empty($imagem3)) {
    ?>
<div id="carouselImagensAmbiente" class="carousel slide" data-ride="carousel" data-touch="true">
    <ol class="carousel-indicators">
        <li data-target="#carouselImagensAmbiente" data-slide-to="0" class="active"></li>
        <li data-target="#carouselImagensAmbiente" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo $imagem1['url'];?>" class="d-block w-100" alt="<?php echo $imagem1['alt']; ?>" />
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    <?php echo $imagem1['title'];?>
                </h5>
                <p class="small">
                    <?php echo $imagem1['description']; ?>
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo $imagem2['url']; ?>" class="d-block w-100" alt="<?php echo $imagem2['alt']; ?>" />
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    <?php echo $imagem2['title']; ?>
                </h5>
                <p class="small">
                    <?php echo $imagem2['description']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
}

if (!empty($imagem1) && empty($imagem2) && empty($imagem3)) {
    ?>
<div id="carouselImagensAmbiente" class="carousel slide" data-ride="carousel" data-touch="true">
    <ol class="carousel-indicators">
        <li data-target="#carouselImagensAmbiente" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo $imagem1['url'];?>" class="d-block w-100" alt="<?php echo $imagem1['alt']; ?>" />
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    <?php echo $imagem1['title']; ?>
                </h5>
                <p class="small">
                    <?php echo $imagem1['description']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
}
?>