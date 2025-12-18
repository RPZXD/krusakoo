    <!-- Footer -->
    <footer class="py-8 bg-blue-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex justify-center space-x-2 mb-4">
                    <span class="text-2xl animate-wiggle">📚</span>
                    <span class="text-2xl animate-wiggle" style="animation-delay: 0.2s;">🌏</span>
                    <span class="text-2xl animate-wiggle" style="animation-delay: 0.4s;">🙏</span>
                    <span class="text-2xl animate-wiggle" style="animation-delay: 0.6s;">🎭</span>
                    <span class="text-2xl animate-wiggle" style="animation-delay: 0.8s;">⭐</span>
                </div>
                <p class="text-blue-300 mb-2"><?= TEACHER_NAME ?></p>
                <p class="text-blue-400 text-sm"><?= DEPARTMENT ?> | <?= SCHOOL_NAME ?></p>
                <p class="text-blue-500 text-xs mt-4">© <?= date('Y') ?> All Rights Reserved</p>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 w-14 h-14 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full shadow-lg hidden items-center justify-center hover:scale-110 transition-all z-50 glow">
        <span class="text-2xl">🚀</span>
    </button>
    
    <!-- Click Emoji Effect Container -->
    <div id="clickEmojiContainer" class="fixed inset-0 pointer-events-none z-50"></div>
    
    <script src="<?= SITE_URL ?>/assets/js/main.js"></script>
</body>
</html>
