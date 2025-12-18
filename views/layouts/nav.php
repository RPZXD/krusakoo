<?php
$currentPage = $currentPage ?? 'home';
?>
<!-- Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50 glass">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="<?= SITE_URL ?>" class="flex items-center space-x-3">
                <div class="text-4xl animate-bounce-slow">📖</div>
                <div>
                    <h1 class="text-white font-bold text-xl">ห้องเรียนครูจิรัฐิติกาล</h1>
                    <p class="text-blue-200 text-sm">Social Studies Classroom</p>
                </div>
            </a>
            <div class="hidden md:flex items-center space-x-6">
                <a href="<?= SITE_URL ?>" class="nav-link <?= $currentPage === 'home' ? 'active' : '' ?>">
                    🏠 หน้าแรก
                </a>
                <a href="<?= SITE_URL ?>/lessons.php" class="nav-link <?= $currentPage === 'lessons' ? 'active' : '' ?>">
                    📚 บทเรียนออนไลน์
                </a>
                <a href="<?= SITE_URL ?>/#about" class="nav-link <?= $currentPage === 'about' ? 'active' : '' ?>">
                    👩‍🏫 เกี่ยวกับครู
                </a>
                <a href="<?= SITE_URL ?>/#subjects" class="nav-link <?= $currentPage === 'subjects' ? 'active' : '' ?>">
                    📖 วิชาที่สอน
                </a>
                <a href="<?= SITE_URL ?>/#contact" class="nav-link <?= $currentPage === 'contact' ? 'active' : '' ?>">
                    📞 ติดต่อ
                </a>
                <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
                <a href="<?= SITE_URL ?>/admin.php" class="px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white rounded-full font-medium hover:from-yellow-500 hover:to-orange-600 transition-all transform hover:scale-105 shadow-lg">
                    ⚙️ แอดมิน
                </a>
                <?php else: ?>
                <a href="<?= SITE_URL ?>/login.php" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-full font-medium transition-all border border-white/20">
                    🔐 เข้าสู่ระบบ
                </a>
                <?php endif; ?>
            </div>
            <button id="menuBtn" class="md:hidden text-white text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobileMenu" class="hidden md:hidden glass fixed top-20 left-0 right-0 z-50">
    <div class="px-4 py-4 space-y-3">
        <a href="<?= SITE_URL ?>" class="block text-white hover:text-yellow-300 py-2 <?= $currentPage === 'home' ? 'text-yellow-300' : '' ?>">
            🏠 หน้าแรก
        </a>
        <a href="<?= SITE_URL ?>/lessons.php" class="block text-white hover:text-yellow-300 py-2 <?= $currentPage === 'lessons' ? 'text-yellow-300' : '' ?>">
            📚 บทเรียนออนไลน์
        </a>
        <a href="<?= SITE_URL ?>/#about" class="block text-white hover:text-yellow-300 py-2">
            👩‍🏫 เกี่ยวกับครู
        </a>
        <a href="<?= SITE_URL ?>/#subjects" class="block text-white hover:text-yellow-300 py-2">
            📖 วิชาที่สอน
        </a>
        <a href="<?= SITE_URL ?>/#contact" class="block text-white hover:text-yellow-300 py-2">
            📞 ติดต่อ
        </a>
        <div class="pt-3 border-t border-white/20">
            <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
            <a href="<?= SITE_URL ?>/admin.php" class="block text-center py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white rounded-lg font-medium">
                ⚙️ แอดมิน
            </a>
            <?php else: ?>
            <a href="<?= SITE_URL ?>/login.php" class="block text-center py-2 bg-white/10 text-white rounded-lg font-medium border border-white/20">
                🔐 เข้าสู่ระบบ
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Spacer for fixed nav -->
<div class="h-20"></div>
