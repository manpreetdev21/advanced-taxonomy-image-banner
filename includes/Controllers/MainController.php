<?php 

namespace AdvancedTaxonomyImages\Controllers;
use AdvancedTaxonomyImages\Controllers\EnqueueController;
use AdvancedTaxonomyImages\Controllers\ImageFieldController;
use AdvancedTaxonomyImages\Controllers\BannerImageFieldController;
use AdvancedTaxonomyImages\Controllers\SettingController;

defined('ABSPATH') || exit;

class MainController{

    protected $enqueue_controller;
    protected $image_field_controller;
    protected $setting_controller;
    protected $banner_image_field_controller;

    public function __construct() {
        $this->MainInit();
    }

    private function MainInit(){
        $this->enqueue_controller = new EnqueueController();
        $this->image_field_controller = new ImageFieldController();
        $this->setting_controller = new SettingController();
        $this->banner_image_field_controller = new BannerImageFieldController();
    }
}
