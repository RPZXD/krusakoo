// ============================================
// Mobile Menu Toggle
// ============================================
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');

if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}

// ============================================
// Back to Top Button
// ============================================
const backToTopBtn = document.getElementById('backToTop');

if (backToTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            backToTopBtn.classList.remove('hidden');
            backToTopBtn.classList.add('flex');
        } else {
            backToTopBtn.classList.add('hidden');
            backToTopBtn.classList.remove('flex');
        }
    });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// ============================================
// Counter Animation
// ============================================
const counters = document.querySelectorAll('.counter');
const counterSpeed = 200;

const animateCounter = (counter) => {
    const target = +counter.getAttribute('data-target');
    const count = +counter.innerText;
    const increment = target / counterSpeed;

    if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(() => animateCounter(counter), 10);
    } else {
        counter.innerText = target + '+';
    }
};

// Intersection Observer for counters
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

counters.forEach(counter => counterObserver.observe(counter));

// ============================================
// Falling Emoji Rain
// ============================================
const emojis = ['📚', '🌏', '🙏', '🎭', '⭐', '✨', '💫', '🏛️', '📖', '🎓', '❤️', '🌟'];
const emojiContainer = document.getElementById('emojiContainer');

function createFallingEmoji() {
    if (!emojiContainer) return;

    const emoji = document.createElement('div');
    emoji.className = 'falling-emoji';
    emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
    emoji.style.left = Math.random() * 100 + 'vw';
    emoji.style.fontSize = (Math.random() * 1.5 + 1) + 'rem';
    emoji.style.animationDuration = (Math.random() * 3 + 4) + 's';
    emoji.style.opacity = Math.random() * 0.5 + 0.3;

    emojiContainer.appendChild(emoji);

    setTimeout(() => emoji.remove(), 7000);
}

setInterval(createFallingEmoji, 800);

// ============================================
// Emoji Pop Effect
// ============================================
window.popEmoji = function (element) {
    const rect = element.getBoundingClientRect();
    const emoji = element.textContent;

    for (let i = 0; i < 8; i++) {
        const pop = document.createElement('div');
        pop.textContent = emoji;
        pop.style.cssText = `
            position: fixed;
            left: ${rect.left + rect.width / 2}px;
            top: ${rect.top + rect.height / 2}px;
            font-size: 2rem;
            pointer-events: none;
            z-index: 9999;
            animation: popOut 0.8s ease-out forwards;
        `;

        const angle = (i / 8) * Math.PI * 2;
        const distance = 100 + Math.random() * 50;

        pop.style.setProperty('--tx', `${Math.cos(angle) * distance}px`);
        pop.style.setProperty('--ty', `${Math.sin(angle) * distance}px`);

        document.body.appendChild(pop);
        setTimeout(() => pop.remove(), 800);
    }
};

// Add keyframes for pop effect
const popStyle = document.createElement('style');
popStyle.textContent = `
    @keyframes popOut {
        0% { transform: translate(0, 0) scale(1); opacity: 1; }
        100% { transform: translate(var(--tx), var(--ty)) scale(0); opacity: 0; }
    }
`;
document.head.appendChild(popStyle);

// ============================================
// Emoji Explosion on Card Click
// ============================================
window.showEmojiExplosion = function () {
    const container = document.getElementById('clickEmojiContainer');
    if (!container) return;

    const explosionEmojis = ['🎉', '✨', '⭐', '💫', '🌟', '❤️', '🎊', '🎆'];

    for (let i = 0; i < 15; i++) {
        const emoji = document.createElement('div');
        emoji.textContent = explosionEmojis[Math.floor(Math.random() * explosionEmojis.length)];
        emoji.style.cssText = `
            position: absolute;
            left: 50%;
            top: 50%;
            font-size: ${Math.random() * 2 + 1}rem;
            animation: explode ${Math.random() * 0.5 + 0.5}s ease-out forwards;
        `;

        const angle = Math.random() * Math.PI * 2;
        const distance = 100 + Math.random() * 200;

        emoji.style.setProperty('--ex', `${Math.cos(angle) * distance}px`);
        emoji.style.setProperty('--ey', `${Math.sin(angle) * distance - 100}px`);

        container.appendChild(emoji);
        setTimeout(() => emoji.remove(), 1000);
    }
};

// Add keyframes for explosion
const explosionStyle = document.createElement('style');
explosionStyle.textContent = `
    @keyframes explode {
        0% { transform: translate(-50%, -50%) scale(0); opacity: 1; }
        100% { transform: translate(calc(-50% + var(--ex)), calc(-50% + var(--ey))) scale(1); opacity: 0; }
    }
`;
document.head.appendChild(explosionStyle);

// ============================================
// Click Effect anywhere (disabled on admin pages)
// ============================================
if (!window.location.href.includes('admin')) {
    document.addEventListener('click', (e) => {
        const clickEmoji = document.createElement('div');
        clickEmoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
        clickEmoji.style.cssText = `
            position: fixed;
            left: ${e.clientX}px;
            top: ${e.clientY}px;
            font-size: 2rem;
            pointer-events: none;
            z-index: 9999;
            animation: clickFloat 1s ease-out forwards;
            transform: translate(-50%, -50%);
        `;

        document.body.appendChild(clickEmoji);
        setTimeout(() => clickEmoji.remove(), 1000);
    });
}

// Add keyframes for click float
const clickStyle = document.createElement('style');
clickStyle.textContent = `
    @keyframes clickFloat {
        0% { transform: translate(-50%, -50%) scale(0); opacity: 1; }
        50% { transform: translate(-50%, -100%) scale(1.5); opacity: 1; }
        100% { transform: translate(-50%, -150%) scale(1); opacity: 0; }
    }
`;
document.head.appendChild(clickStyle);

// ============================================
// Particle Background
// ============================================
const canvas = document.getElementById('particles');
if (canvas) {
    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const particles = [];
    const particleCount = 50;

    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 3 + 1;
            this.speedX = Math.random() * 0.5 - 0.25;
            this.speedY = Math.random() * 0.5 - 0.25;
            this.opacity = Math.random() * 0.5 + 0.1;
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;

            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
            ctx.fill();
        }
    }

    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }

    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();

            // Connect nearby particles
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < 150) {
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(255, 255, 255, ${0.1 * (1 - distance / 150)})`;
                    ctx.lineWidth = 0.5;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }

        requestAnimationFrame(animateParticles);
    }

    animateParticles();

    // Resize canvas
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
}

// ============================================
// Smooth Scroll
// ============================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            // Close mobile menu if open
            if (mobileMenu) {
                mobileMenu.classList.add('hidden');
            }
        }
    });
});

// ============================================
// Scroll Animation Observer
// ============================================
const scrollObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in-up');
            entry.target.style.opacity = '1';
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.card-hover, .lesson-card').forEach(card => {
    card.style.opacity = '0';
    scrollObserver.observe(card);
});

// ============================================
// Lesson Search & Filter (for lessons page)
// ============================================
window.filterLessons = function (category) {
    const lessons = document.querySelectorAll('.lesson-card');
    const buttons = document.querySelectorAll('.filter-btn');

    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-blue-500');
        btn.classList.add('bg-white/10');
    });

    event.target.classList.remove('bg-white/10');
    event.target.classList.add('active', 'bg-blue-500');

    lessons.forEach(lesson => {
        if (category === 'all' || lesson.dataset.category === category) {
            lesson.style.display = 'block';
            lesson.classList.add('animate-fade-in-up');
        } else {
            lesson.style.display = 'none';
        }
    });
};

window.searchLessons = function (query) {
    const lessons = document.querySelectorAll('.lesson-card');
    const searchTerm = query.toLowerCase();

    lessons.forEach(lesson => {
        const title = lesson.querySelector('.lesson-title').textContent.toLowerCase();
        const description = lesson.querySelector('.lesson-description').textContent.toLowerCase();

        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            lesson.style.display = 'block';
        } else {
            lesson.style.display = 'none';
        }
    });
};
