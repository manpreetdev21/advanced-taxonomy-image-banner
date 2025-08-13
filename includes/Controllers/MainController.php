<?php 

namespace AdvancedTaxonomyImages\Controllers;
use AdvancedTaxonomyImages\Controllers\EnqueueController;

defined('ABSPATH') || exit;

class MainController{

    protected $enqueue_controller;

    public function __construct() {
        $this->MainInit();
    }

    private function MainInit(){
        $this->enqueue_controller = new EnqueueController();
    }
}
