<?php
/**
 * Auth Controller
 * Handles login and logout functionality
 */

class AuthController {
    
    /**
     * Display login page
     */
    public function showLogin() {
        // If already logged in, redirect to admin
        if ($this->isLoggedIn()) {
            header('Location: ' . SITE_URL . '/admin.php');
            exit;
        }
        
        $pageTitle = 'เข้าสู่ระบบ | ' . SITE_NAME;
        $pageDescription = 'เข้าสู่ระบบจัดการบทเรียน';
        $currentPage = 'login';
        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);
        
        include VIEWS_PATH . '/auth/login.php';
    }
    
    /**
     * Process login
     */
    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            header('Location: ' . SITE_URL . '/admin.php');
            exit;
        } else {
            $_SESSION['login_error'] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
            header('Location: ' . SITE_URL . '/login.php');
            exit;
        }
    }
    
    /**
     * Process logout
     */
    public function logout() {
        unset($_SESSION['admin_logged_in']);
        unset($_SESSION['admin_username']);
        header('Location: ' . SITE_URL);
        exit;
    }
    
    /**
     * Check if user is logged in
     */
    public function isLoggedIn() {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }
    
    /**
     * Require authentication - redirect to login if not authenticated
     */
    public function requireAuth() {
        if (!$this->isLoggedIn()) {
            $_SESSION['login_error'] = 'กรุณาเข้าสู่ระบบก่อน';
            header('Location: ' . SITE_URL . '/login.php');
            exit;
        }
    }
}
