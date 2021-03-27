<?php
/**
 * Template de cartões de obras
 *
 * @version 0.2
 * @since 0.7
 * @author hgod.in
 */
?>
<?php
$thumbnail = get_the_post_thumbnail(get_the_ID(), 'cartoes-thumb-obra', array('class' => 'card-img-top img-fluid d-block mb-2 rounded-0'));
$permalink = get_permalink();
$dataperiodo = get_field_object('field_5bfd46cab4647');
$material = get_field_object('field_5bfd46fcb4648');
$dimensoes = get_field_object('field_5bfd47ebb4649');
$tombo = get_field_object('field_5bfd4663b4645');
?>
<div class="col col-md-10 col-lg-4">

    <div class="card mb-4 rounded-0">

        <a href="<?php echo $permalink ?>">
            <?php echo $thumbnail; ?>
        </a>
        <div class="card-body">
            <h5 class="card-title">

                <?php the_title();
                echo ', ';
                ?>
                <small class="text-muted">

                    <?php echo $dataperiodo['value']; 
                    echo '. ';
                    ?>

                </small>
            </h5>
            <dl class="row pt-2">

                <?php if ($material['value'] != '') {?>
                <dt class="col-md-5 col-sm-12">Material / Técnica:</dt>
                <dd class="col-md-7 col-sm-12">
                    <?php echo $material['value']; ?>
                </dd>
                <?php }?>

                <?php if ($dimensoes['value'] != '') {?>
                <dt class="col-md-5 col-sm-12">Medidas:</dt>
                <dd class="col-md-7 col-sm-12">
                    <?php echo $dimensoes['value']; ?>
                </dd>
                <?php }?>

                <dt class="col-md-5 col-sm-12">Tombo:</dt>
                <dd class="col-md-7 col-sm-12">
                    <?php echo $tombo['value']; ?>
                </dd>

            </dl>
        </div>
        <div class="card-footer">

            <a href="<?php echo $permalink ?>" class="card-link">Ver obra →</a>

        </div>
    </div>
</div>