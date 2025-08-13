<?php 

namespace AdvancedTaxonomyImages\Controllers;
use AdvancedTaxonomyImages\Controllers\EnqueueController;
use AdvancedTaxonomyImages\Controllers\ImageFieldController;

defined('ABSPATH') || exit;

class MainController{

    protected $enqueue_controller;
    protected $image_field_controller;

    public function __construct() {
        $this->MainInit();
    }

    private function MainInit(){
        $this->enqueue_controller = new EnqueueController();
        $this->image_field_controller = new ImageFieldController();
    }
}
