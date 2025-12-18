<?php
/**
 * Lessons REST API
 * Handles CRUD operations for lessons
 */
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config/config.php';
require_once MODELS_PATH . '/Lesson.php';

$lessonModel = new Lesson();
$method = $_SERVER['REQUEST_METHOD'];

// Get JSON input for POST/PUT
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        // Get all lessons or single lesson
        if (isset($_GET['id'])) {
            $lesson = $lessonModel->getById($_GET['id']);
            if ($lesson) {
                echo json_encode(['success' => true, 'data' => $lesson], JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(['success' => false, 'error' => 'Lesson not found'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $lessons = $lessonModel->getAll();
            echo json_encode(['success' => true, 'data' => $lessons], JSON_UNESCAPED_UNICODE);
        }
        break;
        
    case 'POST':
        // Create new lesson
        if (!$input) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Invalid input'], JSON_UNESCAPED_UNICODE);
            break;
        }
        
        $lessonData = [
            'title' => $input['title'] ?? '',
            'description' => $input['description'] ?? '',
            'category' => $input['category'] ?? 'law',
            'category_name' => $input['category_name'] ?? 'กฎหมาย',
            'icon' => $input['icon'] ?? '📚',
            'difficulty' => $input['difficulty'] ?? 'easy',
            'duration' => $input['duration'] ?? '30 นาที',
            'lessons_count' => intval($input['lessons_count'] ?? 1),
            'students' => intval($input['students'] ?? 0),
            'video_url' => $input['video_url'] ?? '#',
            'is_new' => $input['is_new'] ?? true,
            'content' => $input['content'] ?? '',
            'topics' => $input['topics'] ?? []
        ];
        
        if ($lessonModel->add($lessonData)) {
            echo json_encode(['success' => true, 'message' => 'Lesson created successfully'], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Failed to create lesson'], JSON_UNESCAPED_UNICODE);
        }
        break;
        
    case 'PUT':
        // Update lesson
        if (!isset($_GET['id']) || !$input) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Invalid input'], JSON_UNESCAPED_UNICODE);
            break;
        }
        
        $id = $_GET['id'];
        $existingLesson = $lessonModel->getById($id);
        
        if (!$existingLesson) {
            http_response_code(404);
            echo json_encode(['success' => false, 'error' => 'Lesson not found'], JSON_UNESCAPED_UNICODE);
            break;
        }
        
        $lessonData = [
            'title' => $input['title'] ?? $existingLesson['title'],
            'description' => $input['description'] ?? $existingLesson['description'],
            'category' => $input['category'] ?? $existingLesson['category'],
            'category_name' => $input['category_name'] ?? $existingLesson['category_name'],
            'icon' => $input['icon'] ?? $existingLesson['icon'],
            'difficulty' => $input['difficulty'] ?? $existingLesson['difficulty'],
            'duration' => $input['duration'] ?? $existingLesson['duration'],
            'lessons_count' => intval($input['lessons_count'] ?? $existingLesson['lessons_count']),
            'students' => intval($input['students'] ?? $existingLesson['students']),
            'video_url' => $input['video_url'] ?? $existingLesson['video_url'],
            'is_new' => $input['is_new'] ?? $existingLesson['is_new'],
            'content' => $input['content'] ?? $existingLesson['content'],
            'topics' => $input['topics'] ?? $existingLesson['topics']
        ];
        
        if ($lessonModel->update($id, $lessonData)) {
            echo json_encode(['success' => true, 'message' => 'Lesson updated successfully'], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Failed to update lesson'], JSON_UNESCAPED_UNICODE);
        }
        break;
        
    case 'DELETE':
        // Delete lesson
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Lesson ID required'], JSON_UNESCAPED_UNICODE);
            break;
        }
        
        $id = $_GET['id'];
        
        if ($lessonModel->delete($id)) {
            echo json_encode(['success' => true, 'message' => 'Lesson deleted successfully'], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Failed to delete lesson'], JSON_UNESCAPED_UNICODE);
        }
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['success' => false, 'error' => 'Method not allowed'], JSON_UNESCAPED_UNICODE);
}
