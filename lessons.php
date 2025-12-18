<?php
/**
 * Lessons Page Entry Point
 */
require_once __DIR__ . '/config/config.php';
require_once CONTROLLERS_PATH . '/LessonController.php';

$lessonController = new LessonController();
$id = $_GET['id'] ?? null;
$topicId = $_GET['topic'] ?? null;

if ($id && $topicId !== null) {
    // แสดงหน้า topic
    $lessonController->showTopic($id, $topicId);
} elseif ($id) {
    $lessonController->show($id);
} else {
    $lessonController->index();
}
