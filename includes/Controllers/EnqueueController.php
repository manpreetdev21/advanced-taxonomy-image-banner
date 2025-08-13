<?php 

namespace AdvancedTaxonomyImages\Controllers;

defined('ABSPATH') || exit;

class EnqueueController {

    private array $admin_style = [
        'backend-atib-plugin-style' => ['assets/backend/css/backend-style.css', [], null],
    ];

    private array $admin_script = [
        'backend-atib-plugin-script' => ['assets/backend/js/backend-script.js', ['jquery'], null],
    ];

    private array $frontend_style = [
        'frontend-atib-plugin-style' => ['assets/frontend/css/frontend-style.css', [], null],
    ];

    private array $frontend_script = [
        'frontend-atib-plugin-script' => ['assets/frontend/js/frontend-script.js', ['jquery'], null],
    ];

    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'atib_script_style_admin']);
        add_action('wp_enqueue_scripts', [$this, 'atib_script_style_frontend']);
    }
    
    public function atib_script_style_admin(): void {
        if (!defined('ADVANCED_TAXONOMY_IMAGES_PLUGIN_URL') || !defined('ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH')) {
            return;
        }

        // Enqueue WordPress media library for image upload functionality
        wp_enqueue_media();

        $this->enqueue_assets($this->admin_style, $this->admin_script);
    }

    public function atib_script_style_frontend(): void {
        if (!defined('ADVANCED_TAXONOMY_IMAGES_PLUGIN_URL') || !defined('ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH')) {
            return;
        }

        $this->enqueue_assets($this->frontend_style, $this->frontend_script);
    }

    private function enqueue_assets(array $styles, array $scripts): void {
        foreach ($styles as $key => $value) {
            $file_path = ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . $value[0];
            $version = $value[2] ?? (file_exists($file_path) ? filemtime($file_path) : null);
            wp_register_style($key, ADVANCED_TAXONOMY_IMAGES_PLUGIN_URL . $value[0], $value[1], $version);
            wp_enqueue_style($key);
        }

        foreach ($scripts as $key => $value) {
            $file_path = ADVANCED_TAXONOMY_IMAGES_PLUGIN_PATH . $value[0];
            $version = $value[2] ?? (file_exists($file_path) ? filemtime($file_path) : null);
            wp_register_script($key, ADVANCED_TAXONOMY_IMAGES_PLUGIN_URL . $value[0], $value[1], $version, true);
            wp_enqueue_script($key);
        }
    }

}
