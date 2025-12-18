<?php
/**
 * Lesson Admin Controller
 */
require_once MODELS_PATH . '/Lesson.php';

class LessonAdminController {
    private $lessonModel;
    
    public function __construct() {
        $this->lessonModel = new Lesson();
    }
    
    /**
     * Display admin dashboard for lessons
     */
    public function index() {
        $pageTitle = 'จัดการบทเรียน | ' . SITE_NAME;
        $pageDescription = 'หน้าจัดการบทเรียนออนไลน์';
        $currentPage = 'admin-lessons';
        
        $lessons = $this->lessonModel->getAll();
        $categories = $this->lessonModel->getCategories();
        $subjectInfo = $this->lessonModel->getSubjectInfo();
        
        include VIEWS_PATH . '/admin/lessons/index.php';
    }
}
