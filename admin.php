<?php
/**
 * Admin Page - Standalone entry point
 * This file handles admin panel when .htaccess rewriting is not available
 */

require_once __DIR__ . '/config/config.php';
require_once CONTROLLERS_PATH . '/AuthController.php';
require_once CONTROLLERS_PATH . '/LessonAdminController.php';

$authController = new AuthController();
$authController->requireAuth();

$lessonAdminController = new LessonAdminController();
$lessonAdminController->index();
