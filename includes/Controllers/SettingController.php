<?php 

namespace AdvancedTaxonomyImages\Controllers;

defined('ABSPATH') || exit;

class SettingController{

    private $plugin_setting_page_slug = 'advanced-taxonomy-image-banner-setting';
    private $plugin_setting_page_text = 'Advanced Taxonomy Image';
    private $plugin_setting_link_text = 'Settings';
    public $get_taxnomies_slug = '';

    public function __construct() {
        add_filter( 'plugin_action_links', array( $this, 'atib_add_taxonomy_image_action_plugin' ), 10, 2 );
        add_action( 'admin_menu', array( $this, 'atib_add_taxonomy_image_setting_page' ) );
        add_action( 'admin_init', array( $this, 'atib_add_taxonomy_image_handle_settings_save' ) );
    }

    public function atib_add_taxonomy_image_action_plugin( $plugin_link, $plugin_file ){
        if ( $plugin_file != ADVANCED_TAXONOMY_IMAGES_PLUGIN_BASENAME ) {
			return $plugin_link;
		}			
		$settings_link = sprintf( __( "<a href='%s' target='_blank'>{$this->plugin_setting_link_text}</a>", 'advanced-taxonomy-image-banner' ), esc_url( admin_url( "options-general.php?page={$this->plugin_setting_page_slug}" ) ) );;
		array_unshift( $plugin_link, $settings_link );
		return $plugin_link;
    }

    public function atib_add_taxonomy_image_setting_page(){
        add_submenu_page(
			'options-general.php',
			$this->plugin_setting_page_text,
			$this->plugin_setting_page_text,
			'manage_options', 
			$this->plugin_setting_page_slug, 
			array( $this, 'atib_add_taxonomy_image_plugin_setting_callback' ),
			21
		);
    }

    public function atib_add_taxonomy_image_plugin_setting_callback(){
        
        if (!current_user_can('manage_options')) {
            return;
        }
        
        $this->get_taxnomies_slug = get_option('get_taxnomies_slug', 'category | post_tag');

        include ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'includes/Views/Admin/plugin_setting_page_taxonomy.php';
    }

    public function atib_add_taxonomy_image_handle_settings_save(){
        if ( !isset($_POST['ati_settings_nonce'] ) || !wp_verify_nonce($_POST['ati_settings_nonce'], 'ati_save_settings') ) {
            return;
        }

        if ( !current_user_can('manage_options') ) {
            return;
        }

        if ( isset( $_POST['get_taxnomies_slug'] ) ) {
            update_option('get_taxnomies_slug', sanitize_textarea_field( $_POST['get_taxnomies_slug'] ) );
        }

        add_settings_error(
            'ati_settings',
            'ati_settings_updated',
            __('Advanced Taxonomy Settings saved successfully.', 'advanced-taxonomy-image-banner'),
            'success'
        );
    }
}
