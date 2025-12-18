<?php
/**
 * Home Controller
 */
class HomeController {
    
    public function index() {
        $pageTitle = SITE_NAME;
        $pageDescription = SITE_DESCRIPTION;
        $currentPage = 'home';
        
        // Include view
        include VIEWS_PATH . '/home/index.php';
    }
}
