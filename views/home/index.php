<?php include VIEWS_PATH . '/layouts/header.php'; ?>
<?php include VIEWS_PATH . '/layouts/nav.php'; ?>

<!-- Hero Section -->
<section class="relative min-h-screen gradient-social overflow-hidden -mt-20 pt-20">
    <!-- Background Shapes -->
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
    
    <!-- Floating Emojis -->
    <div class="floating-emoji" style="top: 15%; left: 8%;" onclick="popEmoji(this)">📚</div>
    <div class="floating-emoji" style="top: 25%; right: 10%; animation-delay: 1s;" onclick="popEmoji(this)">🌏</div>
    <div class="floating-emoji" style="top: 60%; left: 5%; animation-delay: 2s;" onclick="popEmoji(this)">🏛️</div>
    <div class="floating-emoji" style="top: 70%; right: 8%; animation-delay: 0.5s;" onclick="popEmoji(this)">⛩️</div>
    <div class="floating-emoji" style="top: 40%; right: 5%; animation-delay: 1.5s;" onclick="popEmoji(this)">🙏</div>
    <div class="floating-emoji" style="bottom: 15%; left: 12%; animation-delay: 2.5s;" onclick="popEmoji(this)">🎓</div>
    
    <!-- Hero Content -->
    <div id="home" class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24">
        <div class="text-center">
            <!-- Welcome Badge -->
            <div class="inline-flex items-center glass px-6 py-3 rounded-full mb-8 animate-fade-in-down">
                <span class="text-2xl mr-2 animate-wiggle">👋</span>
                <span class="text-white font-medium">ยินดีต้อนรับสู่ห้องเรียน</span>
                <span class="text-2xl ml-2 animate-wiggle">✨</span>
            </div>
            
            <!-- Main Title -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 animate-fade-in-up">
                <span class="block">ครูจิรัฐิติกาล</span>
                <span class="text-gradient">พูลจ่าง</span>
            </h1>
            
            <!-- Teacher Avatar -->
            <div class="relative inline-block mb-8 animate-scale-in">
                <div class="w-48 h-48 md:w-56 md:h-56 rounded-full bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 p-1.5 glow animate-pulse-slow">
                    <div class="w-full h-full rounded-full bg-gradient-to-br from-blue-600 to-purple-700 flex items-center justify-center">
                        <span class="text-7xl md:text-8xl">👩‍🏫</span>
                    </div>
                </div>
                <!-- Decorative Emojis around avatar -->
                <div class="absolute -top-4 -right-4 text-4xl animate-float">⭐</div>
                <div class="absolute -bottom-2 -left-4 text-3xl animate-float" style="animation-delay: 0.5s;">🌟</div>
                <div class="absolute top-1/2 -right-8 text-3xl animate-float" style="animation-delay: 1s;">💫</div>
            </div>
            
            <!-- School Info -->
            <div class="glass-dark rounded-2xl p-6 md:p-8 max-w-3xl mx-auto mb-8 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="flex items-center justify-center mb-4">
                    <span class="text-4xl mr-3 animate-bounce-slow">🏫</span>
                    <h2 class="text-2xl md:text-3xl font-bold text-white"><?= SCHOOL_NAME ?></h2>
                </div>
                <div class="flex flex-wrap justify-center gap-4">
                    <span class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                        <span class="mr-2">🌏</span> กลุ่มสาระสังคมศึกษา
                    </span>
                    <span class="inline-flex items-center bg-gradient-to-r from-purple-500 to-purple-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                        <span class="mr-2">🙏</span> ศาสนา
                    </span>
                    <span class="inline-flex items-center bg-gradient-to-r from-pink-500 to-pink-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                        <span class="mr-2">🎭</span> วัฒนธรรม
                    </span>
                </div>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up" style="animation-delay: 0.5s;">
                <a href="<?= SITE_URL ?>/lessons.php" class="group relative px-8 py-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-bold rounded-full overflow-hidden ripple glow-hover transition-all duration-300 hover:scale-105">
                    <span class="relative z-10 flex items-center">
                        <span class="mr-2 text-xl group-hover:animate-wiggle">📚</span>
                        เข้าสู่บทเรียนออนไลน์
                    </span>
                </a>
                <a href="#contact" class="group px-8 py-4 glass text-white font-bold rounded-full transition-all duration-300 hover:scale-105 hover:bg-white/20">
                    <span class="flex items-center">
                        <span class="mr-2 text-xl group-hover:animate-wiggle">💬</span>
                        ติดต่อครู
                    </span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
        <div class="flex flex-col items-center text-white animate-bounce">
            <span class="text-sm mb-2">เลื่อนลง</span>
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gradient-to-b from-blue-900 to-indigo-900 relative overflow-hidden">
    <div class="bg-shapes">
        <div class="shape shape-2" style="background: #fbbf24; opacity: 0.05;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="text-5xl mb-4 block animate-bounce-slow">👩‍🏫</span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">เกี่ยวกับครูผู้สอน</h2>
            <p class="text-blue-200 text-lg"><?= TEACHER_NAME ?></p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Profile Card -->
            <div class="glass rounded-3xl p-8 card-hover animate-slide-in-left">
                <div class="flex flex-col items-center">
                    <div class="w-40 h-40 rounded-full bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 p-1 mb-6">
                        <div class="w-full h-full rounded-full bg-gradient-to-br from-blue-600 to-purple-700 flex items-center justify-center">
                            <span class="text-6xl">👩‍🏫</span>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2"><?= TEACHER_NAME ?></h3>
                    <p class="text-blue-200 mb-4">ครู<?= DEPARTMENT ?></p>
                    
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="w-12 h-12 glass rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition-all hover:scale-110">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 glass rounded-full flex items-center justify-center text-white hover:bg-green-500 transition-all hover:scale-110">
                            <i class="fab fa-line text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 glass rounded-full flex items-center justify-center text-white hover:bg-red-500 transition-all hover:scale-110">
                            <i class="fas fa-envelope text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Info Cards -->
            <div class="space-y-6 animate-slide-in-right">
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-start">
                        <span class="text-4xl mr-4">🎓</span>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-2">การศึกษา</h4>
                            <p class="text-blue-200">ปริญญาตรี สาขาสังคมศึกษา</p>
                        </div>
                    </div>
                </div>
                
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-start">
                        <span class="text-4xl mr-4">💼</span>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-2">ตำแหน่ง</h4>
                            <p class="text-blue-200">ครู<?= DEPARTMENT ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-start">
                        <span class="text-4xl mr-4">🏫</span>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-2">สถานที่ทำงาน</h4>
                            <p class="text-blue-200"><?= SCHOOL_NAME ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-start">
                        <span class="text-4xl mr-4">❤️</span>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-2">ปรัชญาการสอน</h4>
                            <p class="text-blue-200">"การเรียนรู้สังคมและวัฒนธรรม คือรากฐานของการเป็นพลเมืองที่ดี"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subjects Section -->
<section id="subjects" class="py-20 bg-gradient-to-b from-indigo-900 to-purple-900 relative overflow-hidden">
    <div class="bg-shapes">
        <div class="shape shape-1" style="background: #60a5fa; opacity: 0.08; left: -100px; right: auto;"></div>
        <div class="shape shape-3" style="background: #f093fb; opacity: 0.06;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="text-5xl mb-4 block animate-bounce-slow">📚</span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">วิชาที่สอน</h2>
            <p class="text-purple-200 text-lg">สาระการเรียนรู้ที่น่าสนใจ</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Subject Cards -->
            <div class="glass rounded-3xl p-8 card-hover group" onclick="showEmojiExplosion()">
                <div class="text-6xl mb-6 group-hover:animate-wiggle">🌏</div>
                <h3 class="text-2xl font-bold text-white mb-3">ภูมิศาสตร์</h3>
                <p class="text-purple-200 mb-4">เรียนรู้เกี่ยวกับโลก ภูมิประเทศ ภูมิอากาศ และความสัมพันธ์ของมนุษย์กับสิ่งแวดล้อม</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-blue-500/30 text-blue-200 px-3 py-1 rounded-full text-sm">🗺️ แผนที่</span>
                    <span class="bg-green-500/30 text-green-200 px-3 py-1 rounded-full text-sm">🌳 สิ่งแวดล้อม</span>
                </div>
            </div>
            
            <div class="glass rounded-3xl p-8 card-hover group" onclick="showEmojiExplosion()">
                <div class="text-6xl mb-6 group-hover:animate-wiggle">📜</div>
                <h3 class="text-2xl font-bold text-white mb-3">ประวัติศาสตร์</h3>
                <p class="text-purple-200 mb-4">ศึกษาประวัติศาสตร์ไทยและสากล เรียนรู้อดีตเพื่อเข้าใจปัจจุบัน</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-yellow-500/30 text-yellow-200 px-3 py-1 rounded-full text-sm">👑 กษัตริย์</span>
                    <span class="bg-orange-500/30 text-orange-200 px-3 py-1 rounded-full text-sm">⚔️ สงคราม</span>
                </div>
            </div>
            
            <div class="glass rounded-3xl p-8 card-hover group" onclick="showEmojiExplosion()">
                <div class="text-6xl mb-6 group-hover:animate-wiggle">🙏</div>
                <h3 class="text-2xl font-bold text-white mb-3">ศาสนา</h3>
                <p class="text-purple-200 mb-4">ศึกษาหลักธรรมทางศาสนา คุณธรรม จริยธรรม และการปฏิบัติตน</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-purple-500/30 text-purple-200 px-3 py-1 rounded-full text-sm">☸️ พุทธ</span>
                    <span class="bg-pink-500/30 text-pink-200 px-3 py-1 rounded-full text-sm">🕉️ ศาสนาอื่นๆ</span>
                </div>
            </div>
            
            <div class="glass rounded-3xl p-8 card-hover group" onclick="showEmojiExplosion()">
                <div class="text-6xl mb-6 group-hover:animate-wiggle">🎭</div>
                <h3 class="text-2xl font-bold text-white mb-3">วัฒนธรรม</h3>
                <p class="text-purple-200 mb-4">เรียนรู้ประเพณี ศิลปวัฒนธรรมไทย และความหลากหลายทางวัฒนธรรม</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-red-500/30 text-red-200 px-3 py-1 rounded-full text-sm">💃 ประเพณี</span>
                    <span class="bg-cyan-500/30 text-cyan-200 px-3 py-1 rounded-full text-sm">🎨 ศิลปะ</span>
                </div>
            </div>
            
            <div class="glass rounded-3xl p-8 card-hover group" onclick="showEmojiExplosion()">
                <div class="text-6xl mb-6 group-hover:animate-wiggle">⚖️</div>
                <h3 class="text-2xl font-bold text-white mb-3">หน้าที่พลเมือง</h3>
                <p class="text-purple-200 mb-4">เรียนรู้กฎหมาย สิทธิ หน้าที่ และการเป็นพลเมืองที่ดี</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-indigo-500/30 text-indigo-200 px-3 py-1 rounded-full text-sm">📋 กฎหมาย</span>
                    <span class="bg-teal-500/30 text-teal-200 px-3 py-1 rounded-full text-sm">🗳️ ประชาธิปไตย</span>
                </div>
            </div>
            
            <div class="glass rounded-3xl p-8 card-hover group" onclick="showEmojiExplosion()">
                <div class="text-6xl mb-6 group-hover:animate-wiggle">💰</div>
                <h3 class="text-2xl font-bold text-white mb-3">เศรษฐศาสตร์</h3>
                <p class="text-purple-200 mb-4">ศึกษาหลักเศรษฐศาสตร์เบื้องต้น การเงิน และการบริหารทรัพยากร</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-emerald-500/30 text-emerald-200 px-3 py-1 rounded-full text-sm">💵 การเงิน</span>
                    <span class="bg-lime-500/30 text-lime-200 px-3 py-1 rounded-full text-sm">📈 เศรษฐกิจ</span>
                </div>
            </div>
        </div>
        
        <!-- CTA to Lessons -->
        <div class="text-center mt-12">
            <a href="<?= SITE_URL ?>/lessons.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-full transition-all hover:scale-105 glow-hover">
                <span class="mr-2 text-xl">📚</span>
                ดูบทเรียนออนไลน์ทั้งหมด
                <i class="fas fa-arrow-right ml-3"></i>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 gradient-bg relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center glass rounded-2xl p-6 card-hover">
                <span class="text-4xl block mb-2 animate-bounce-slow">👨‍🎓</span>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="500">0</div>
                <p class="text-purple-200">นักเรียน</p>
            </div>
            <div class="text-center glass rounded-2xl p-6 card-hover">
                <span class="text-4xl block mb-2 animate-bounce-slow" style="animation-delay: 0.2s;">📖</span>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="20">0</div>
                <p class="text-purple-200">รายวิชา</p>
            </div>
            <div class="text-center glass rounded-2xl p-6 card-hover">
                <span class="text-4xl block mb-2 animate-bounce-slow" style="animation-delay: 0.4s;">🏆</span>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="15">0</div>
                <p class="text-purple-200">รางวัล</p>
            </div>
            <div class="text-center glass rounded-2xl p-6 card-hover">
                <span class="text-4xl block mb-2 animate-bounce-slow" style="animation-delay: 0.6s;">❤️</span>
                <div class="text-4xl font-bold text-white mb-2 counter" data-target="10">0</div>
                <p class="text-purple-200">ปีประสบการณ์</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-b from-purple-900 to-blue-900 relative overflow-hidden">
    <div class="bg-shapes">
        <div class="shape shape-2" style="background: #fbbf24; opacity: 0.05; right: -100px; left: auto;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="text-5xl mb-4 block animate-bounce-slow">📞</span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">ติดต่อครู</h2>
            <p class="text-purple-200 text-lg">ยินดีตอบคำถามและให้คำปรึกษา</p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="glass rounded-3xl p-8 md:p-12">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <h3 class="text-2xl font-bold text-white mb-6">📍 ข้อมูลติดต่อ</h3>
                        
                        <div class="flex items-center space-x-4 p-4 glass-dark rounded-xl card-hover">
                            <span class="text-3xl">🏫</span>
                            <div>
                                <p class="text-white font-medium">โรงเรียน</p>
                                <p class="text-blue-200"><?= SCHOOL_NAME ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4 p-4 glass-dark rounded-xl card-hover">
                            <span class="text-3xl">📧</span>
                            <div>
                                <p class="text-white font-medium">อีเมล</p>
                                <p class="text-blue-200"><?= TEACHER_EMAIL ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4 p-4 glass-dark rounded-xl card-hover">
                            <span class="text-3xl">📱</span>
                            <div>
                                <p class="text-white font-medium">โทรศัพท์</p>
                                <p class="text-blue-200"><?= TEACHER_PHONE ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4 p-4 glass-dark rounded-xl card-hover">
                            <span class="text-3xl">⏰</span>
                            <div>
                                <p class="text-white font-medium">เวลาทำการ</p>
                                <p class="text-blue-200">จันทร์ - ศุกร์ 08:00 - 16:00</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-6">🔗 ลิงก์ที่เกี่ยวข้อง</h3>
                        
                        <div class="space-y-4">
                            <a href="#" class="flex items-center p-4 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl text-white font-medium transition-all hover:scale-105 hover:shadow-lg">
                                <span class="text-2xl mr-4">🌐</span>
                                เว็บไซต์โรงเรียนพิชัย
                                <i class="fas fa-arrow-right ml-auto"></i>
                            </a>
                            
                            <a href="<?= SITE_URL ?>/lessons.php" class="flex items-center p-4 bg-gradient-to-r from-green-500 to-green-600 rounded-xl text-white font-medium transition-all hover:scale-105 hover:shadow-lg">
                                <span class="text-2xl mr-4">📚</span>
                                บทเรียนออนไลน์
                                <i class="fas fa-arrow-right ml-auto"></i>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl text-white font-medium transition-all hover:scale-105 hover:shadow-lg">
                                <span class="text-2xl mr-4">📝</span>
                                ส่งการบ้าน
                                <i class="fas fa-arrow-right ml-auto"></i>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl text-white font-medium transition-all hover:scale-105 hover:shadow-lg">
                                <span class="text-2xl mr-4">📊</span>
                                เช็คคะแนน
                                <i class="fas fa-arrow-right ml-auto"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include VIEWS_PATH . '/layouts/footer.php'; ?>
