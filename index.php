<?php
/**
 * Main Router / Entry Point
 * Routes requests to appropriate controllers
 */

// Load configuration
require_once __DIR__ . '/config/config.php';

// Load controllers
require_once CONTROLLERS_PATH . '/HomeController.php';
require_once CONTROLLERS_PATH . '/LessonController.php';
require_once CONTROLLERS_PATH . '/AuthController.php';
require_once CONTROLLERS_PATH . '/LessonAdminController.php';

// Get the page parameter or parse from REQUEST_URI
$page = $_GET['page'] ?? '';

// If no page parameter, try to parse from URL path
if (empty($page)) {
    $requestUri = $_SERVER['REQUEST_URI'];
    // Get the script directory dynamically
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
    $basePath = $scriptDir !== '/' ? $scriptDir : '';
    
    // Remove base path from URI
    $path = str_replace($basePath, '', $requestUri);
    $path = strtok($path, '?'); // Remove query string
    $path = trim($path, '/');
    
    // Parse path segments
    $segments = $path ? explode('/', $path) : [];
    
    $controller = $segments[0] ?? '';
    $action = $segments[1] ?? '';
    $subAction = $segments[2] ?? '';
} else {
    // Using query string routing: ?page=lessons or ?page=lessons&id=1
    $segments = explode('/', $page);
    $controller = $segments[0] ?? '';
    $action = $_GET['id'] ?? ($segments[1] ?? '');
    $subAction = $segments[2] ?? '';
}

// Route the request
switch ($controller) {
    case '':
    case 'home':
    case 'index.php':
        // Home page
        $homeController = new HomeController();
        $homeController->index();
        break;
        
    case 'lessons':
        $lessonController = new LessonController();
        $topicId = $_GET['topic'] ?? null;
        
        if (!empty($action) && $topicId !== null) {
            // Show specific topic
            $lessonController->showTopic($action, $topicId);
        } else if (empty($action)) {
            // Show all lessons
            $lessonController->index();
        } else {
            // Show single lesson
            $lessonController->show($action);
        }
        break;
    
    case 'login':
        $authController = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->showLogin();
        }
        break;
    
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    
    case 'admin':
        $authController = new AuthController();
        $authController->requireAuth();
        
        switch ($action) {
            case '':
            case 'lessons':
            default:
                $lessonAdminController = new LessonAdminController();
                $lessonAdminController->index();
                break;
        }
        break;
        
    default:
        // 404 - Page not found
        http_response_code(404);
        echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>404</title></head><body style="font-family: sans-serif; text-align: center; padding: 50px;">';
        echo '<h1>404 - Page Not Found</h1>';
        echo '<p><a href="' . SITE_URL . '">กลับหน้าแรก</a></p>';
        echo '</body></html>';
        break;
}

