<?php include VIEWS_PATH . '/layouts/header.php'; ?>
<?php include VIEWS_PATH . '/layouts/nav.php'; ?>

<!-- Topic Content Section -->
<section class="relative gradient-lessons py-16 overflow-hidden -mt-20 pt-28 min-h-screen">
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <div class="mb-8 flex flex-wrap gap-2">
            <a href="<?= SITE_URL ?>/lessons.php" class="text-blue-300 hover:text-white transition-colors">
                บทเรียนออนไลน์
            </a>
            <span class="text-blue-400">/</span>
            <a href="<?= SITE_URL ?>/lessons.php?id=<?= $lesson['id'] ?>" class="text-blue-300 hover:text-white transition-colors">
                <?= $lesson['title'] ?>
            </a>
            <span class="text-blue-400">/</span>
            <span class="text-white">บทที่ <?= $topicNumber ?></span>
        </div>
        
        <!-- Topic Header -->
        <div class="glass rounded-3xl overflow-hidden mb-8">
            <div class="relative h-40 bg-gradient-to-br from-blue-600 to-purple-700 flex items-center justify-center">
                <div class="text-center">
                    <span class="text-6xl mb-2 block"><?= $lesson['icon'] ?></span>
                    <span class="bg-yellow-500 text-white px-4 py-2 rounded-full font-bold">บทที่ <?= $topicNumber ?></span>
                </div>
            </div>
            
            <div class="p-8 md:p-12">
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span class="px-4 py-2 rounded-full bg-blue-500/30 text-blue-200"><?= $lesson['category_name'] ?></span>
                    <span class="px-4 py-2 rounded-full bg-purple-500/30 text-purple-200"><?= $lesson['title'] ?></span>
                </div>
                
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-4"><?= $topic ?></h1>
                <p class="text-blue-200">เนื้อหาบทเรียน บทที่ <?= $topicNumber ?> จากทั้งหมด <?= count($lesson['topics']) ?> บท</p>
            </div>
        </div>
        
        <!-- Topic Content -->
        <div class="glass rounded-3xl p-8 md:p-12 mb-8">
            <div class="prose prose-invert prose-lg max-w-none">
                <div class="text-blue-100 leading-relaxed space-y-6">
                    <?php if (isset($topicContent) && !empty($topicContent)): ?>
                        <?= $topicContent ?>
                    <?php else: ?>
                        <div class="text-center py-12">
                            <span class="text-6xl mb-4 block">📝</span>
                            <h3 class="text-2xl font-bold text-white mb-4">เนื้อหากำลังจัดทำ</h3>
                            <p class="text-blue-200">เนื้อหาสำหรับหัวข้อ "<?= $topic ?>" กำลังอยู่ระหว่างการจัดทำ</p>
                            <p class="text-blue-300 mt-2">กรุณากลับมาตรวจสอบอีกครั้งในภายหลัง</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="flex flex-col sm:flex-row justify-between gap-4">
            <?php if ($prevTopic !== null): ?>
            <a href="<?= SITE_URL ?>/lessons.php?id=<?= $lesson['id'] ?>&topic=<?= $prevTopic ?>" 
               class="flex-1 glass-dark rounded-xl p-4 hover:bg-white/10 transition-colors group text-left">
                <div class="flex items-center">
                    <i class="fas fa-arrow-left text-blue-400 group-hover:text-yellow-300 mr-3"></i>
                    <div>
                        <p class="text-blue-300 text-sm">บทก่อนหน้า</p>
                        <p class="text-white font-medium group-hover:text-yellow-300 transition-colors truncate">
                            <?php $prevTopicData = $lesson['topics'][$prevTopic]; ?>
                            <?= is_array($prevTopicData) ? $prevTopicData['name'] : $prevTopicData ?>
                        </p>
                    </div>
                </div>
            </a>
            <?php else: ?>
            <div class="flex-1"></div>
            <?php endif; ?>
            
            <a href="<?= SITE_URL ?>/lessons.php?id=<?= $lesson['id'] ?>" 
               class="glass-dark rounded-xl p-4 hover:bg-white/10 transition-colors group text-center px-8">
                <i class="fas fa-list text-blue-400 group-hover:text-yellow-300 text-xl"></i>
                <p class="text-white text-sm mt-1">ดูทั้งหมด</p>
            </a>
            
            <?php if ($nextTopic !== null): ?>
            <a href="<?= SITE_URL ?>/lessons.php?id=<?= $lesson['id'] ?>&topic=<?= $nextTopic ?>" 
               class="flex-1 glass-dark rounded-xl p-4 hover:bg-white/10 transition-colors group text-right">
                <div class="flex items-center justify-end">
                    <div>
                        <p class="text-blue-300 text-sm">บทถัดไป</p>
                        <p class="text-white font-medium group-hover:text-yellow-300 transition-colors truncate">
                            <?php $nextTopicData = $lesson['topics'][$nextTopic]; ?>
                            <?= is_array($nextTopicData) ? $nextTopicData['name'] : $nextTopicData ?>
                        </p>
                    </div>
                    <i class="fas fa-arrow-right text-blue-400 group-hover:text-yellow-300 ml-3"></i>
                </div>
            </a>
            <?php else: ?>
            <div class="flex-1"></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include VIEWS_PATH . '/layouts/footer.php'; ?>
