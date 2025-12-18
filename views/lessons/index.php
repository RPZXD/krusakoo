<?php 
include VIEWS_PATH . '/layouts/header.php'; 
include VIEWS_PATH . '/layouts/nav.php';
$subjectInfo = (new Lesson())->getSubjectInfo();
?>

<!-- Hero Section -->
<section class="relative gradient-lessons py-16 overflow-hidden -mt-20 pt-28">
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center glass px-6 py-3 rounded-full mb-6 animate-fade-in-down">
                <span class="text-2xl mr-2 animate-wiggle">📚</span>
                <span class="text-white font-medium">วิชา<?= $subjectInfo['name'] ?> <?= $subjectInfo['level'] ?></span>
                <span class="text-2xl ml-2 animate-wiggle">✨</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up">
                <span class="text-gradient">⚖️ กฎหมายคุ้มครองสิทธิของบุคคล</span>
            </h1>
            <p class="text-xl text-blue-200 mb-4"><?= $subjectInfo['unit'] ?></p>
            <p class="text-base text-blue-300 max-w-3xl mx-auto mb-8"><?= $subjectInfo['description'] ?></p>
            
            <!-- Stats -->
            <div class="flex flex-wrap justify-center gap-6 mb-8">
                <div class="glass px-6 py-3 rounded-xl flex items-center">
                    <span class="text-2xl mr-2">📖</span>
                    <span class="text-white font-bold"><?= $totalLessons ?> บทเรียน</span>
                </div>
                <div class="glass px-6 py-3 rounded-xl flex items-center">
                    <span class="text-2xl mr-2">👨‍🎓</span>
                    <span class="text-white font-bold"><?= number_format($totalStudents) ?>+ นักเรียน</span>
                </div>
            </div>
            
            <!-- Search Box -->
            <div class="max-w-xl mx-auto">
                <input type="text" id="searchInput" placeholder="🔍 ค้นหาบทเรียน..."
                    class="w-full px-6 py-4 rounded-full bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    oninput="searchLessons(this.value)">
            </div>
        </div>
    </div>
</section>

<!-- Filter & Lessons Section -->
<section class="py-12 bg-gradient-to-b from-indigo-900 to-purple-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter -->
        <div class="mb-12">
            <div class="flex flex-wrap justify-center gap-3">
                <button onclick="filterLessons('all')" class="filter-btn active bg-blue-500 px-6 py-3 rounded-full text-white font-medium transition-all hover:scale-105">
                    📚 ทั้งหมด
                </button>
                <?php foreach ($categories as $category): ?>
                <button onclick="filterLessons('<?= $category['key'] ?>')" class="filter-btn bg-white/10 px-6 py-3 rounded-full text-white font-medium transition-all hover:scale-105">
                    <?= $category['icon'] ?> <?= $category['name'] ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- All Lessons Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="lessonsGrid">
            <?php foreach ($lessons as $lesson): ?>
            <a href="<?= SITE_URL ?>/lessons.php?id=<?= $lesson['id'] ?>" class="lesson-card glass-card rounded-2xl overflow-hidden group" data-category="<?= $lesson['category'] ?>">
                <div class="relative h-40 bg-gradient-to-br from-slate-700 to-slate-800 flex items-center justify-center">
                    <span class="text-7xl group-hover:scale-110 transition-transform"><?= $lesson['icon'] ?></span>
                    <?php if ($lesson['is_new']): ?>
                    <span class="lesson-badge">🆕 ใหม่!</span>
                    <?php endif; ?>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs px-3 py-1 rounded-full bg-white/10 text-blue-200"><?= $lesson['category_name'] ?></span>
                        <span class="text-xs px-3 py-1 rounded-full difficulty-<?= $lesson['difficulty'] ?> text-white">
                            <?= $lesson['difficulty'] === 'easy' ? 'ง่าย' : ($lesson['difficulty'] === 'medium' ? 'ปานกลาง' : 'ยาก') ?>
                        </span>
                    </div>
                    <h3 class="lesson-title text-lg font-bold text-white mb-2 group-hover:text-yellow-300"><?= $lesson['title'] ?></h3>
                    <p class="lesson-description text-blue-200 text-sm mb-4 line-clamp-2"><?= $lesson['description'] ?></p>
                    <div class="flex items-center justify-between text-xs text-blue-300">
                        <span><i class="fas fa-clock mr-1"></i> <?= $lesson['duration'] ?></span>
                        <span><i class="fas fa-users mr-1"></i> <?= $lesson['students'] ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include VIEWS_PATH . '/layouts/footer.php'; ?>
