<?php include VIEWS_PATH . '/layouts/header.php'; ?>

<!-- Login Section -->
<section class="min-h-screen gradient-social flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    
    <div class="max-w-md w-full relative z-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-yellow-400 to-orange-500 mb-4 animate-bounce-slow">
                <span class="text-4xl">🔐</span>
            </div>
            <h2 class="text-3xl font-bold text-white">เข้าสู่ระบบ</h2>
            <p class="text-blue-200 mt-2">สำหรับผู้ดูแลระบบเท่านั้น</p>
        </div>
        
        <!-- Login Form -->
        <div class="glass rounded-2xl p-8">
            <?php if (!empty($error)): ?>
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-xl text-red-200 flex items-center gap-3">
                <span class="text-xl">⚠️</span>
                <span><?= $error ?></span>
            </div>
            <?php endif; ?>
            
            <form action="<?= SITE_URL ?>/login.php" method="POST" class="space-y-6">
                <input type="hidden" name="action" value="login">
                
                <!-- Username -->
                <div>
                    <label for="username" class="block text-blue-200 text-sm mb-2">
                        <i class="fas fa-user mr-2"></i>ชื่อผู้ใช้
                    </label>
                    <input type="text" id="username" name="username" required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300/50 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 outline-none transition-all"
                           placeholder="กรอกชื่อผู้ใช้">
                </div>
                
                <!-- Password -->
                <div>
                    <label for="password" class="block text-blue-200 text-sm mb-2">
                        <i class="fas fa-lock mr-2"></i>รหัสผ่าน
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300/50 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 outline-none transition-all pr-12"
                               placeholder="กรอกรหัสผ่าน">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-300 hover:text-white transition-colors">
                            <i id="passwordToggleIcon" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-bold rounded-xl hover:from-yellow-500 hover:to-orange-600 transition-all transform hover:scale-[1.02] shadow-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>เข้าสู่ระบบ
                </button>
            </form>
            
            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="<?= SITE_URL ?>" class="text-blue-300 hover:text-white transition-colors inline-flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    กลับหน้าแรก
                </a>
            </div>
        </div>
        
        <!-- Info -->
        <div class="mt-6 text-center text-blue-300/70 text-sm">
            <p>💡 หากลืมรหัสผ่าน กรุณาติดต่อผู้ดูแลระบบ</p>
        </div>
    </div>
</section>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('passwordToggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

<?php include VIEWS_PATH . '/layouts/footer.php'; ?>
