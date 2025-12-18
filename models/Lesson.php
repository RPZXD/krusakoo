<?php
/**
 * Lesson Model
 * Manages lesson data from JSON file - สังคมศึกษา ม.1
 */
class Lesson {
    private $lessons = [];
    private $categories = [];
    private $subject = [];
    private $dataFile;
    
    public function __construct() {
        $this->dataFile = __DIR__ . '/../data/lessons.json';
        $this->loadData();
    }
    
    /**
     * Load data from JSON file
     */
    private function loadData() {
        if (file_exists($this->dataFile)) {
            $json = file_get_contents($this->dataFile);
            $data = json_decode($json, true);
            
            if ($data) {
                $this->lessons = $data['lessons'] ?? [];
                $this->categories = $data['categories'] ?? [];
                $this->subject = $data['subject'] ?? [];
            }
        }
    }
    
    /**
     * Save data to JSON file
     */
    public function saveData() {
        $data = [
            'subject' => $this->subject,
            'categories' => $this->categories,
            'lessons' => $this->lessons
        ];
        
        $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return file_put_contents($this->dataFile, $json);
    }
    
    /**
     * Get all lessons
     */
    public function getAll() {
        return $this->lessons;
    }
    
    /**
     * Get lesson by ID
     */
    public function getById($id) {
        foreach ($this->lessons as $lesson) {
            if ($lesson['id'] == $id) {
                return $lesson;
            }
        }
        return null;
    }
    
    /**
     * Get lessons by category
     */
    public function getByCategory($category) {
        return array_filter($this->lessons, function($lesson) use ($category) {
            return $lesson['category'] === $category;
        });
    }
    
    /**
     * Get lesson categories
     */
    public function getCategories() {
        return $this->categories;
    }
    
    /**
     * Get featured lessons
     */
    public function getFeatured($limit = 3) {
        $featured = array_filter($this->lessons, function($lesson) {
            return $lesson['is_new'] || $lesson['students'] > 200;
        });
        return array_slice($featured, 0, $limit);
    }
    
    /**
     * Get total lessons count
     */
    public function getTotalCount() {
        return count($this->lessons);
    }
    
    /**
     * Get total students count
     */
    public function getTotalStudents() {
        return array_sum(array_column($this->lessons, 'students'));
    }
    
    /**
     * Get subject info
     */
    public function getSubjectInfo() {
        return $this->subject;
    }
    
    /**
     * Add new lesson
     */
    public function add($lessonData) {
        // Generate new ID
        $maxId = 0;
        foreach ($this->lessons as $lesson) {
            if ($lesson['id'] > $maxId) {
                $maxId = $lesson['id'];
            }
        }
        $lessonData['id'] = $maxId + 1;
        
        $this->lessons[] = $lessonData;
        return $this->saveData();
    }
    
    /**
     * Update lesson by ID
     */
    public function update($id, $lessonData) {
        foreach ($this->lessons as $key => $lesson) {
            if ($lesson['id'] == $id) {
                $lessonData['id'] = $id;
                $this->lessons[$key] = $lessonData;
                return $this->saveData();
            }
        }
        return false;
    }
    
    /**
     * Delete lesson by ID
     */
    public function delete($id) {
        foreach ($this->lessons as $key => $lesson) {
            if ($lesson['id'] == $id) {
                unset($this->lessons[$key]);
                $this->lessons = array_values($this->lessons);
                return $this->saveData();
            }
        }
        return false;
    }
}
