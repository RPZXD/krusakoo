<?php
/**
 * Lesson Controller
 */
require_once MODELS_PATH . '/Lesson.php';

class LessonController {
    private $lessonModel;
    
    public function __construct() {
        $this->lessonModel = new Lesson();
    }
    
    /**
     * Display all lessons
     */
    public function index() {
        $pageTitle = 'บทเรียนออนไลน์ | ' . SITE_NAME;
        $pageDescription = 'บทเรียนออนไลน์กลุ่มสาระสังคมศึกษา ศาสนาและวัฒนธรรม';
        $currentPage = 'lessons';
        
        $lessons = $this->lessonModel->getAll();
        $categories = $this->lessonModel->getCategories();
        $featuredLessons = $this->lessonModel->getFeatured();
        $totalLessons = $this->lessonModel->getTotalCount();
        $totalStudents = $this->lessonModel->getTotalStudents();
        
        // Include view
        include VIEWS_PATH . '/lessons/index.php';
    }
    
    /**
     * Display single lesson
     */
    public function show($id) {
        $lesson = $this->lessonModel->getById($id);
        
        if (!$lesson) {
            header('Location: ' . SITE_URL . '/lessons');
            exit;
        }
        
        $pageTitle = $lesson['title'] . ' | ' . SITE_NAME;
        $pageDescription = $lesson['description'];
        $currentPage = 'lessons';
        
        $relatedLessons = $this->lessonModel->getByCategory($lesson['category']);
        
        // Include view
        include VIEWS_PATH . '/lessons/show.php';
    }
    
    /**
     * Display single topic content
     */
    public function showTopic($lessonId, $topicIndex) {
        $lesson = $this->lessonModel->getById($lessonId);
        
        if (!$lesson || !isset($lesson['topics'][$topicIndex])) {
            header('Location: ' . SITE_URL . '/lessons/' . $lessonId);
            exit;
        }
        
        $topic = $lesson['topics'][$topicIndex];
        $topicNumber = $topicIndex + 1;
        
        // หา topic ก่อนหน้าและถัดไป
        $prevTopic = $topicIndex > 0 ? $topicIndex - 1 : null;
        $nextTopic = isset($lesson['topics'][$topicIndex + 1]) ? $topicIndex + 1 : null;
        
        $pageTitle = $topic . ' | ' . $lesson['title'] . ' | ' . SITE_NAME;
        $pageDescription = 'เนื้อหาบทเรียน: ' . $topic;
        $currentPage = 'lessons';
        
        // Include view
        include VIEWS_PATH . '/lessons/topic.php';
    }
}
