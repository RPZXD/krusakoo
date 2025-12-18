<?php
/**
 * Logout - Standalone entry point
 */

require_once __DIR__ . '/config/config.php';
require_once CONTROLLERS_PATH . '/AuthController.php';

$authController = new AuthController();
$authController->logout();
