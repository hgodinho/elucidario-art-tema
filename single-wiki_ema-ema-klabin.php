<?php
/**
 * Template para página 'Classificação' no Custom-post wiki_ema
 *
 * @url wiki-ema/pag/classificacoes/
 *
 * responsável por exibir o arquivo de taxonomias classificação,
 * listando cada classificação criada na custom taxonomy
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.3
 * @since 0.3
 *
 * @author hgodinho.com
 */

/**
 * Start
 */
get_header();
get_template_part('template-parts/header/header', 'breadcrumb');
?>
<section id="primary" class="content-area">
    <main role="main" class="container">
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <?php
get_search_form();?>
                </div>
                <div class="col-12 pb-4">
                    <?php
get_template_part('template-parts/header/header', 'archive');?>
                </div>
            </div>
        </div>
        <?php
if (have_posts()): while (have_posts()): the_post();
$the_post_content = preg_split('/\r\n|\r|\n/', get_the_content());
$first_paragraph = trim(reset($the_post_content));
$first_paragraph_array = array($first_paragraph, '');
$result_array = array_diff($the_post_content, $first_paragraph_array); 
?>
        <?php $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
        <div class="container"
            style="background-image: url('<?php echo $img_url[0];?>'); background-repeat: no-repeat; background-position: center center; background-size:cover; height: 500px;">
            <div class="d-flex flex-wrap align-content-end" style="height:500px">
                <div class="col-md-6">
                    <p class="text-white">
                        <?php echo $first_paragraph;?>
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-secondary text-white p-4 text-justify">
            <?php
            foreach($result_array as $result){
                echo '<p class="pt-1">' . $result . '</p>';
                }   
            ?>
        </div>
        </div>

        <?php
    endwhile;
else:echo '<div class="col"><p>Desculpe, nada para exibir</p></div>';
endif;
?>
    </main>
</section>

<?php
get_footer();