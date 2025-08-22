<?php 

namespace AdvancedTaxonomyImages\Controllers;

defined('ABSPATH') || exit;

class BannerImageFieldController{

    public $term_id = '';
    public $banner_sliders = array();

    function __construct(){
        foreach ( $this->get_all_taxnomy_banner_slug() as $taxonomy) {
            add_action( "{$taxonomy}_add_form_fields", array( $this, 'atib_add_taxonomy_banner_image_field' ) );
            add_action( "{$taxonomy}_edit_form_fields", array( $this, 'atib_edit_taxonomy_banner_image_field' ), 10, 2 );
            add_action( "created_{$taxonomy}", array( $this, 'atib_save_taxonomy_banner_image' ) );
            add_action( "edited_{$taxonomy}", array( $this, 'atib_save_taxonomy_banner_image' ) );
        }
    }

    public function atib_add_taxonomy_banner_image_field($taxonomy) {
        include ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'includes/Views/Admin/add_taxonomy_banner_image.php';
    }

    public function atib_edit_taxonomy_banner_image_field($term, $taxonomy) {
        $this->term_id = $term->term_id;
        $this->banner_sliders = get_term_meta( $this->term_id, 'taxonomy-banner-image-id', true);
        
        // Ensure we always have an array, even if empty
        if (empty($this->banner_sliders) || !is_array($this->banner_sliders)) {
            $this->banner_sliders = array('');
        }
        
        include ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'includes/Views/Admin/edit_taxonomy_banner_image.php';
    }

    public function atib_save_taxonomy_banner_image($term_id) {
        // Security checks
        if (!isset($_POST['taxonomy-banner-image-id']) || 
            !current_user_can('edit_term', $term_id) ||
            !wp_verify_nonce($_POST['_wpnonce'], "update-tag_{$term_id}")) {
            return;
        }
        
        // Process banner images
        $banner_images = array();
        
        foreach ($_POST['taxonomy-banner-image-id'] as $banner_img_id) {
            $clean_id = sanitize_text_field($banner_img_id);
            if (!empty($clean_id) && is_numeric($clean_id)) {
                $banner_images[] = $clean_id;
            }
        }
        
        // Remove empty values and update meta
        $banner_images = array_filter($banner_images);
        
        if (!empty($banner_images)) {
            update_term_meta($term_id, 'taxonomy-banner-image-id', $banner_images);
        } else {
            delete_term_meta($term_id, 'taxonomy-banner-image-id');
        }
    }

    public function get_all_taxnomy_banner_slug(){
        $data = get_option( 'get_banner_taxonomies_slug', 'category | post_tag' );        
        $data = str_replace( ' ', '', $data );
        $data = explode( '|', $data );
        return $data;
    }
}