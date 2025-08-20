<?php
/**
 * Plugin Name: Advanced Taxonomy Image and Banner images
 * Plugin URI: https://github.com/manpreetdev21/advanced-taxonomy-image-banner.git
 * Description: Advanced Taxonomy Image and Banner images option for the wordpress.
 * Version: 1.0.0
 * Author: Manpreet Singh
 * Text Domain: advanced-taxonomy-image-banner
 * Domain Path: /languages
 * Requires at least: 5.6
 * Requires PHP: 7.4
 */

namespace AdvancedTaxonomyImages;

defined('ABSPATH') || exit;

define( 'ADVANCED_TAXONOMY_IMAGES_PLUGIN_FILE', __FILE__ );
define( 'ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH', plugin_dir_path( __FILE__) );
define( 'ADVANCED_TAXONOMY_IMAGES_PLUGIN_URL', plugin_dir_url( __FILE__) );
define( 'ADVANCED_TAXONOMY_IMAGES_PLUGIN_BASENAME', plugin_basename( ADVANCED_TAXONOMY_IMAGES_PLUGIN_FILE ) );
define( 'ADVANCED_TAXONOMY_IMAGES_VERSION', '1.0.0' );

// Autoload classes
require_once ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . 'vendor/autoload.php';

// Check for required PHP version
if (version_compare(PHP_VERSION, '7.0', '<')) {
    add_action('admin_notices', function() {
        echo '<div class="error"><p>';
        printf(
            __('Advanced Taxonomy Images requires PHP 7.4 or higher. Your server is running PHP %s. Please upgrade.', 'advanced-taxonomy-image-banner'),
            PHP_VERSION
        );
        echo '</p></div>';
    });
    return;
}

class AdvancedTaxonomyImages {
    private static $instance = null;

    public static function get_instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {        
        $this->init();
    }

    public function init() {
        // Load text domain
        load_plugin_textdomain(
            'advanced-taxonomy-images',
            false,
            dirname(plugin_basename(__FILE__)) . '/languages'
        );
        
        $this->init_services();
        $this->register_hooks();
    }

    protected function init_services() {
        new \AdvancedTaxonomyImages\Controllers\MainController();
    }

    protected function register_hooks(){
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
    }

    public function activate() {        
        flush_rewrite_rules();
    }

    public function deactivate() {
        flush_rewrite_rules();
    }
}

AdvancedTaxonomyImages::get_instance();