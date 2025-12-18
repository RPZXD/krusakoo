<?php
/**
 * Lesson Admin Page Entry Point
 */
require_once __DIR__ . '/../config/config.php';
require_once CONTROLLERS_PATH . '/LessonAdminController.php';

$controller = new LessonAdminController();
$controller->index();
