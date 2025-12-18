<?php
/**
 * Login Page - Standalone entry point
 * This file handles login when .htaccess rewriting is not available
 */

require_once __DIR__ . '/config/config.php';
require_once CONTROLLERS_PATH . '/AuthController.php';

$authController = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->login();
} else {
    $authController->showLogin();
}
