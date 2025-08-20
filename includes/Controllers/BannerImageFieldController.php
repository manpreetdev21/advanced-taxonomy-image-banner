<?php 

namespace AdvancedTaxonomyImages\Controllers;

defined('ABSPATH') || exit;

class BannerImageFieldController{

    public $term_id = '';
    public $banner_sliders = '';

    function __construct(){
        foreach ( $this->get_all_taxnomy_banner_slug() as $taxonomy) {
            if( ( $taxonomy != 'nav_menu' ) && ( $taxonomy != 'post_format' ) && ( $taxonomy != 'wp_theme' ) && ( $taxonomy != 'wp_template_part_area' ) && ( $taxonomy != 'wp_pattern_category' ) ){
                add_action( "{$taxonomy}_add_form_fields", array( $this, 'atib_add_taxonomy_banner_image_field' ) );
                add_action( "{$taxonomy}_edit_form_fields", array( $this, 'atib_edit_taxonomy_banner_image_field' ), 10, 2 );
                add_action( "created_{$taxonomy}", array( $this, 'atib_save_taxonomy_banner_image' ) );
                add_action( "edited_{$taxonomy}", array( $this, 'atib_save_taxonomy_banner_image' ) );
            }
        }
    }

    public function atib_add_taxonomy_banner_image_field($taxonomy) {
        include ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'includes/Views/Admin/add_taxonomy_banner_image.php';
    }

    public function atib_edit_taxonomy_banner_image_field($term, $taxonomy) {
        $this->term_id = $term->term_id;
        $this->banner_sliders = get_term_meta($term_id, 'taxonomy-banner-image-id', true);
        $this->banner_sliders = !empty($banner_sliders) ? $banner_sliders : array('');
        include ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'includes/Views/Admin/edit_taxonomy_banner_image.php';
    }

    public function atib_save_taxonomy_banner_image($term_id) {
        if (isset($_POST['taxonomy-banner-image-id'])) {
            delete_term_meta($term_id, 'taxonomy-banner-image-id');            
            foreach ($_POST['taxonomy-banner-image-id'] as $banner_slider) {
                if (!empty($banner_slider)) {
                    add_term_meta($term_id, 'taxonomy-banner-image-id', sanitize_text_field($banner_slider), false);
                }
            }
        }
    }

    public function get_all_taxnomy_banner_slug(){
        $data = get_option( 'get_taxnomies_slug' );
        $data = str_replace( ' ', '' , $data);;
        $data = explode( '|', $data );
        return $data;
    }
}