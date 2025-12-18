<?php include VIEWS_PATH . '/layouts/header.php'; ?>
<?php include VIEWS_PATH . '/layouts/nav.php'; ?>

<!-- Lesson Detail Section -->
<section class="relative gradient-lessons py-16 overflow-hidden -mt-20 pt-28 min-h-screen">
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <div class="mb-8">
            <a href="<?= SITE_URL ?>/lessons.php" class="inline-flex items-center text-blue-300 hover:text-white transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                กลับไปหน้าบทเรียน
            </a>
        </div>
        
        <!-- Lesson Card -->
        <div class="glass rounded-3xl overflow-hidden mb-8">
            <!-- Header -->
            <div class="relative h-64 bg-gradient-to-br from-blue-600 to-purple-700 flex items-center justify-center">
                <span class="text-9xl animate-float"><?= $lesson['icon'] ?></span>
                <?php if ($lesson['is_new']): ?>
                <span class="absolute top-4 right-4 bg-yellow-500 text-white px-4 py-2 rounded-full font-bold">🆕 ใหม่!</span>
                <?php endif; ?>
            </div>
            
            <!-- Content -->
            <div class="p-8 md:p-12">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="px-4 py-2 rounded-full bg-blue-500/30 text-blue-200"><?= $lesson['category_name'] ?></span>
                    <span class="px-4 py-2 rounded-full difficulty-<?= $lesson['difficulty'] ?> text-white">
                        <?= $lesson['difficulty'] === 'easy' ? 'ง่าย' : ($lesson['difficulty'] === 'medium' ? 'ปานกลาง' : 'ยาก') ?>
                    </span>
                </div>
                
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4"><?= $lesson['title'] ?></h1>
                <p class="text-xl text-blue-200 mb-8"><?= $lesson['description'] ?></p>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="glass-dark rounded-xl p-4 text-center">
                        <span class="text-3xl block mb-2">⏱️</span>
                        <p class="text-white font-bold"><?= $lesson['duration'] ?></p>
                        <p class="text-blue-300 text-sm">ระยะเวลา</p>
                    </div>
                    <div class="glass-dark rounded-xl p-4 text-center">
                        <span class="text-3xl block mb-2">📖</span>
                        <p class="text-white font-bold"><?= $lesson['lessons_count'] ?> บท</p>
                        <p class="text-blue-300 text-sm">เนื้อหา</p>
                    </div>
                    <div class="glass-dark rounded-xl p-4 text-center">
                        <span class="text-3xl block mb-2">👨‍🎓</span>
                        <p class="text-white font-bold"><?= $lesson['students'] ?></p>
                        <p class="text-blue-300 text-sm">นักเรียน</p>
                    </div>
                    <div class="glass-dark rounded-xl p-4 text-center">
                        <span class="text-3xl block mb-2">⭐</span>
                        <p class="text-white font-bold">ฟรี</p>
                        <p class="text-blue-300 text-sm">ค่าเรียน</p>
                    </div>
                </div>
                
                <!-- CTA Button -->
                <div class="text-center">
                    <a href="#" class="inline-flex items-center px-10 py-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-bold text-xl rounded-full transition-all hover:scale-105 glow-hover">
                        <i class="fas fa-play mr-3"></i>
                        เริ่มเรียน
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Lesson Content -->
        <div class="glass rounded-3xl p-8 md:p-12 mb-8">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <span class="mr-3">📋</span> เนื้อหาบทเรียน
            </h2>
            <div class="space-y-4">
                <?php foreach ($lesson['topics'] as $index => $topicData): ?>
                <?php $topicName = is_array($topicData) ? $topicData['name'] : $topicData; ?>
                <a href="<?= SITE_URL ?>/lessons.php?id=<?= $lesson['id'] ?>&topic=<?= $index ?>" 
                   class="flex items-center p-4 glass-dark rounded-xl hover:bg-white/10 transition-colors cursor-pointer group">
                    <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold mr-4">
                        <?= $index + 1 ?>
                    </div>
                    <div class="flex-1">
                        <p class="text-white font-medium group-hover:text-yellow-300 transition-colors">
                            <?= $topicName ?>
                        </p>
                    </div>
                    <i class="fas fa-play-circle text-2xl text-blue-400 group-hover:text-yellow-300 transition-colors"></i>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Teacher Info -->
        <div class="glass rounded-3xl p-8 md:p-12">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <span class="mr-3">👩‍🏫</span> ครูผู้สอน
            </h2>
            <div class="flex items-center">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mr-6">
                    <span class="text-4xl">👩‍🏫</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white"><?= TEACHER_NAME ?></h3>
                    <p class="text-blue-200"><?= DEPARTMENT ?></p>
                    <p class="text-blue-300"><?= SCHOOL_NAME ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include VIEWS_PATH . '/layouts/footer.php'; ?>
