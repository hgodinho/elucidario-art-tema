<?php
/**
 * template de cartão para obra
 * 
 * @since 0.4
 * @version 0.1
 */
$thumbnail = get_the_post_thumbnail(get_the_ID(), 'cartoes-thumb-obra', array('class' => 'card-img-top img-fluid d-block mb-2'));
$fichatecnica_obra = get_field('ficha_tecnica');
$permalink = get_permalink();

echo '<div class="col-md-4 mb-5">';
echo '<div class="card" style="width: 18rem;">';
echo '<a href="' . $permalink . '">';
echo $thumbnail;
echo '</a>';
echo '<div class="card-body">';
echo '<h5 class="card-title">';
the_title();
echo ', <small class="text-muted">';
echo $fichatecnica_obra['dataperiodo'];
echo '.</small>';
echo '</h5>';
echo '<dl class="row pt-2">';
echo '<dt class="col-md-5 col-sm-12">Material:</dt>';
echo '<dd class="col-md-7 col-sm-12">';
echo $fichatecnica_obra['material'];
echo '</dd>';
echo '<dt class="col-md-5 col-sm-12">Medidas:</dt>';
echo '<dd class="col-md-7 col-sm-12">';
echo $fichatecnica_obra['dimensoes'];
echo '</dd>';
echo '<dt class="col-md-5 col-sm-12">Tombo:</dt>';
echo '<dd class="col-md-7 col-sm-12">';
echo $fichatecnica_obra['tombo'];
echo '</dd>';
echo '</dl>';
echo '</div>';
echo '<div class="card-footer">';
echo '<a href="' . esc_url($permalink) . '" class="card-link">Ver obra</a>';
echo '</div>';
echo '</div>';
echo '</div>';
