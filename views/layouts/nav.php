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
    </div>
</div>

<!-- Spacer for fixed nav -->
<div class="h-20"></div>
