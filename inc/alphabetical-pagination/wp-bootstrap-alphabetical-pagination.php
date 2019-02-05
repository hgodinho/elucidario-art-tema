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
                return $post_types;
            }

        }

        public function auto_glossary_on_save()
        {
            // verify if this is an auto save routine.
            // If it is our form has not been submitted, so we dont want to do anything
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post_id;
            }

            //check location
            if (!in_array($_POST['post_type'], $post_types)) {
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
                'post_type' => array('autores','obras'),
                'posts_per_page' => -1,
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
            echo 'desenvolver front-end alphabetical menu ';
        }
    }
}
