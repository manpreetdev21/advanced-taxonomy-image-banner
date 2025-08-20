<?php 

namespace AdvancedTaxonomyImages\Controllers;

defined('ABSPATH') || exit;

class ImageFieldController{

    public $taxonomies = '';
    public $image_id = '';

    function __construct(){
        $this->taxonomies = get_taxonomies();
        foreach ( $this->taxonomies as $taxonomy) {
            if( ( $taxonomy != 'nav_menu' ) && ( $taxonomy != 'post_format' ) && ( $taxonomy != 'wp_theme' ) && ( $taxonomy != 'wp_template_part_area' ) && ( $taxonomy != 'wp_pattern_category' ) ){
                add_action( "{$taxonomy}_add_form_fields", array( $this, 'atib_add_taxonomy_image_field' ) );
                add_action( "{$taxonomy}_edit_form_fields", array( $this, 'atib_edit_taxonomy_image_field' ), 10, 2 );
                add_action( "created_{$taxonomy}", array( $this, 'atib_save_taxonomy_image' ) );
                add_action( "edited_{$taxonomy}", array( $this, 'atib_save_taxonomy_image' ) );
                add_filter( "manage_edit-{$taxonomy}_columns", array( $this, 'atib_add_taxonomy_image_column' ) );
                add_filter( "manage_{$taxonomy}_custom_column", array( $this, 'atib_add_taxonomy_image_column_content' ), 10, 3);
            }
        }
    }

    function atib_add_taxonomy_image_field($taxonomy) {
        include ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'includes/Views/Admin/add_taxonomy_image.php';
    }

    function atib_edit_taxonomy_image_field($term, $taxonomy) {
        $this->image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true);
        include ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'includes/Views/Admin/edit_taxonomy_image.php';
    }

    function atib_save_taxonomy_image($term_id) {
        if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
            update_term_meta($term_id, 'taxonomy-image-id', absint($_POST['taxonomy-image-id']));
        } else {
            delete_term_meta($term_id, 'taxonomy-image-id');
        }
    }

    function atib_add_taxonomy_image_column($columns) {
        $columns['taxonomy-image'] = __('Image', 'advanced-taxonomy-image-banner');
        return $columns;
    }

    function atib_add_taxonomy_image_column_content($content, $column_name, $term_id) {
        if ($column_name === 'taxonomy-image') {
            $image_id = get_term_meta($term_id, 'taxonomy-image-id', true);
            if ($image_id) {
                $content = wp_get_attachment_image($image_id, array(50, 50));
            }
        }
        return $content;
    }
}