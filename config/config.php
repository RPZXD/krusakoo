<?php
/**
 * Application Configuration
 */

// Site Configuration
define('SITE_NAME', 'ห้องเรียนครูจิรัฐิติกาล พูลจ่าง');
define('SITE_DESCRIPTION', 'กลุ่มสาระสังคมศึกษา ศาสนาและวัฒนธรรม โรงเรียนพิชัย');
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
// Remove trailing slash if it exists (except for root)
$path = rtrim($scriptDir, '/\\');
define('SITE_URL', $protocol . '://' . $host . $path);

// Teacher Info
define('TEACHER_NAME', 'ครูจิรัฐิติกาล พูลจ่าง');
define('TEACHER_EMAIL', 'jiratitikarn@phichai.ac.th');
define('TEACHER_PHONE', 'xxx-xxx-xxxx');
define('SCHOOL_NAME', 'โรงเรียนพิชัย');
define('DEPARTMENT', 'กลุ่มสาระสังคมศึกษา ศาสนาและวัฒนธรรม');

// Admin Credentials
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'krusakoo2024');

// Path Configuration
define('BASE_PATH', dirname(__DIR__));
define('VIEWS_PATH', BASE_PATH . '/views');
define('CONTROLLERS_PATH', BASE_PATH . '/controllers');
define('MODELS_PATH', BASE_PATH . '/models');
define('ASSETS_PATH', SITE_URL . '/assets');

// Error Reporting (set to 0 in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Timezone
date_default_timezone_set('Asia/Bangkok');
