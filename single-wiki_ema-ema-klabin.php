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
        <div class="container">
            <div class="row pb-4">
                <?php
if (have_posts()): while (have_posts()): the_post();
        /* CONTINUAR DAQUI, ONDE PAREI
        $the_post_content = preg_split('/\r\n|\r|\n/', get_the_content());
        $first_paragraph = trim(reset($the_post_content));
        $first_paragraph_array = array($first_paragraph, '');
        $result_array = array_diff($the_post_content, $first_paragraph_array);
        foreach($result_array as $result){
            echo '<p>' . $result . '</p>';
        }    
        */
?>
                <div class="col-md-5">
                    <?php $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
                    <img src="<?php echo $img_url[0];?>" class="img-fluid mb-4"/>
                </div>
                <div class="col-md-7 text-justify">
                    <?php the_content(); ?>
                </div>

                <?php
    endwhile;
else:echo '<div class="col"><p>Desculpe, nada para exibir</p></div>';
endif;
?>
            </div>
        </div>
    </main>
</section>

<?php
get_footer();