<?php
/**
 * Cria paginação em ordem alfabetica com menus em letra em bootstrap.
 * @author hgodinho <ola@hgodinho.com>
 */

if (!class_exists('WP_Glossary_Bootstrap')) {

    class WP_Glossary_Bootstrap
    {
        /**
         * Cria taxonomia 'glossario' que vai hospedar as letras a-z
         *
         * @param array $post_types
         * @param string $slug_rewrite
         *
         */
        private $post_types;

        public function __construct(array $post_types = array('post'), string $slug_rewrite = null)
        {
            if (!taxonomy_exists('glossario')) {
                register_taxonomy(
                    'glossario',
                    $post_types,
                    array(
                        'public' => true,
                        'show_ui' => true,
                        'rewrite' => array('slug' => $slug_rewrite),
                        'hierarchical' => true,
                    )
                );
                add_action('save_post', array($this, 'auto_glossary_on_save'));
            }
        }

        public function auto_glossary_on_save( $post_id )
        {
            // verify if this is an auto save routine.
            // If it is our form has not been submitted, so we dont want to do anything
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post_id;
            }

            //check location
            if (!in_array($_POST['post_type'], $this->post_types)) {
                return $post_id;
            }

            // Check permissions
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }

            //set term as first letter of post title, lower case
            $letra = strtolower(substr($_POST['post_title'], 0, 1));

            wp_set_object_terms($post_id, $letra, 'glossario');

            //delete the transient that is storing the alphabet letters
            delete_transient('auto_glossary_on_save');
        }

        //create array from existing posts
        public function auto_recursive_glossary()
        {
            if (!has_term('', 'glossario')) {
            $taxonomy = 'glossario';
            $alphabet = array();

            $args = array(
                'post_type' => $this->post_types,
                'posts_per_page' => -1,
                //'show_ui' => true,
            );
            $posts = get_posts($args);
            
            foreach ($posts as $post):
                //set term as first letter of post title, lower case
                //echo $post->ID;
                $letra = strtolower(substr($post->post_title, 0, 1));
                wp_set_object_terms($post->ID, $letra, $taxonomy, true);
            endforeach;
            
            }
        }

        public function glossary_menu_front_end(){
            $taxonomy = 'glossary';

// save the terms that have posts in an array as a transient
if ( false === ( $alphabet = get_transient( 'kia_archive_alphabet' ) ) ) {
    // It wasn't there, so regenerate the data and save the transient
    $terms = get_terms($taxonomy);

    $alphabet = array();
    if($terms){
        foreach ($terms as $term){
            $alphabet[] = $term->slug;
        }
    }
    set_transient( 'kia_archive_alphabet', $alphabet );
}

?>

<div id="archive-menu" class="menu">

    <ul id="alphabet-menu">

        <?php

    foreach(range('a', 'z') as $i) :

        $current = ($i == get_query_var($taxonomy)) ? "current-menu-item" : "menu-item";

        if (in_array( $i, $alphabet )){
            printf( '<li class="az-char %s"><a href="%s">%s</a></li>', $current, get_term_link( $i, $taxonomy ), strtoupper($i) );
        } else {
            printf( '<li class="az-char %s">%s</li>', $current, strtoupper($i) );
        }

    endforeach;

    ?>
    </ul>

</div>
}
}
}