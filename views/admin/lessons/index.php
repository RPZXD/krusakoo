<?php include VIEWS_PATH . '/layouts/header.php'; ?>

<!-- Admin Main Content -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header -->
    <header class="bg-white/5 backdrop-blur-xl border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-white flex items-center gap-3">
                        <span class="text-4xl">📚</span>
                        จัดการบทเรียน
                    </h1>
                    <p class="text-blue-200 mt-1"><?= $subjectInfo['unit'] ?? '' ?></p>
                </div>
                <div class="flex gap-3 flex-wrap">
                    <a href="<?= SITE_URL ?>" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-all flex items-center gap-2">
                        <i class="fas fa-home"></i>
                        หน้าแรก
                    </a>
                    <a href="<?= SITE_URL ?>/lessons.php" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-all flex items-center gap-2">
                        <i class="fas fa-eye"></i>
                        ดูหน้าบทเรียน
                    </a>
                    <button onclick="openModal()" class="px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white rounded-lg transition-all flex items-center gap-2 shadow-lg">
                        <i class="fas fa-plus"></i>
                        เพิ่มบทเรียน
                    </button>
                    <a href="<?= SITE_URL ?>/logout.php" class="px-4 py-2 bg-red-500/20 hover:bg-red-500/40 text-red-300 rounded-lg transition-all flex items-center gap-2">
                        <i class="fas fa-sign-out-alt"></i>
                        ออกจากระบบ
                    </a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Stats -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/10">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📖</span>
                    <div>
                        <p class="text-2xl font-bold text-white" id="totalLessons"><?= count($lessons) ?></p>
                        <p class="text-blue-300 text-sm">บทเรียนทั้งหมด</p>
                    </div>
                </div>
            </div>
            <div class="bg-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/10">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🆕</span>
                    <div>
                        <p class="text-2xl font-bold text-white"><?= count(array_filter($lessons, fn($l) => $l['is_new'])) ?></p>
                        <p class="text-blue-300 text-sm">บทเรียนใหม่</p>
                    </div>
                </div>
            </div>
            <div class="bg-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/10">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍🎓</span>
                    <div>
                        <p class="text-2xl font-bold text-white"><?= array_sum(array_column($lessons, 'students')) ?></p>
                        <p class="text-blue-300 text-sm">นักเรียนทั้งหมด</p>
                    </div>
                </div>
            </div>
            <div class="bg-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/10">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📋</span>
                    <div>
                        <p class="text-2xl font-bold text-white"><?= array_sum(array_column($lessons, 'lessons_count')) ?></p>
                        <p class="text-blue-300 text-sm">หัวข้อทั้งหมด</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Lessons Table -->
        <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-white/10 bg-white/5">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-blue-200">บทเรียน</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-blue-200 hidden md:table-cell">ระดับความยาก</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-blue-200 hidden lg:table-cell">ระยะเวลา</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-blue-200 hidden lg:table-cell">หัวข้อ</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-blue-200 hidden md:table-cell">นักเรียน</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-blue-200">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody id="lessonsTableBody">
                        <?php foreach ($lessons as $lesson): ?>
                        <tr class="border-b border-white/5 hover:bg-white/5 transition-colors" data-id="<?= $lesson['id'] ?>">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-3xl"><?= $lesson['icon'] ?></span>
                                    <div>
                                        <p class="text-white font-medium"><?= $lesson['title'] ?></p>
                                        <p class="text-blue-300 text-sm truncate max-w-xs"><?= $lesson['description'] ?></p>
                                        <?php if ($lesson['is_new']): ?>
                                        <span class="inline-block mt-1 px-2 py-0.5 bg-yellow-500/20 text-yellow-300 text-xs rounded-full">ใหม่</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                <?php 
                                $diffClass = $lesson['difficulty'] === 'easy' ? 'bg-green-500/20 text-green-300' : 
                                            ($lesson['difficulty'] === 'medium' ? 'bg-yellow-500/20 text-yellow-300' : 'bg-red-500/20 text-red-300');
                                $diffText = $lesson['difficulty'] === 'easy' ? 'ง่าย' : 
                                           ($lesson['difficulty'] === 'medium' ? 'ปานกลาง' : 'ยาก');
                                ?>
                                <span class="px-3 py-1 rounded-full text-sm <?= $diffClass ?>"><?= $diffText ?></span>
                            </td>
                            <td class="px-6 py-4 text-blue-200 hidden lg:table-cell"><?= $lesson['duration'] ?></td>
                            <td class="px-6 py-4 text-blue-200 hidden lg:table-cell"><?= count($lesson['topics']) ?> หัวข้อ</td>
                            <td class="px-6 py-4 text-blue-200 hidden md:table-cell"><?= $lesson['students'] ?> คน</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="editLesson(<?= $lesson['id'] ?>)" class="p-2 bg-blue-500/20 hover:bg-blue-500/40 text-blue-300 rounded-lg transition-all" title="แก้ไข">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteLesson(<?= $lesson['id'] ?>, '<?= addslashes($lesson['title']) ?>')" class="p-2 bg-red-500/20 hover:bg-red-500/40 text-red-300 rounded-lg transition-all" title="ลบ">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="lessonModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="absolute inset-4 md:inset-10 lg:inset-20 bg-slate-800 rounded-2xl overflow-hidden flex flex-col">
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-white/5 border-b border-white/10 flex items-center justify-between">
            <h2 id="modalTitle" class="text-xl font-bold text-white">เพิ่มบทเรียนใหม่</h2>
            <button onclick="closeModal()" class="p-2 hover:bg-white/10 rounded-lg text-white transition-all">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="flex-1 overflow-y-auto p-6">
            <form id="lessonForm" class="space-y-6">
                <input type="hidden" id="lessonId" value="">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label class="block text-blue-200 text-sm mb-2">ชื่อบทเรียน *</label>
                        <input type="text" id="title" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-blue-300/50 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all" placeholder="เช่น กฎหมายคุ้มครองเด็ก">
                    </div>
                    
                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-blue-200 text-sm mb-2">คำอธิบาย</label>
                        <textarea id="description" rows="2" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-blue-300/50 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all resize-none" placeholder="คำอธิบายสั้นๆ เกี่ยวกับบทเรียน"></textarea>
                    </div>
                    
                    <!-- Icon -->
                    <div>
                        <label class="block text-blue-200 text-sm mb-2">ไอคอน (Emoji)</label>
                        <input type="text" id="icon" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-2xl focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all" placeholder="📚" value="📚">
                    </div>
                    
                    <!-- Difficulty -->
                    <div>
                        <label class="block text-blue-200 text-sm mb-2">ระดับความยาก</label>
                        <select id="difficulty" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all">
                            <option value="easy" class="bg-slate-800">ง่าย</option>
                            <option value="medium" class="bg-slate-800">ปานกลาง</option>
                            <option value="hard" class="bg-slate-800">ยาก</option>
                        </select>
                    </div>
                    
                    <!-- Duration -->
                    <div>
                        <label class="block text-blue-200 text-sm mb-2">ระยะเวลา</label>
                        <input type="text" id="duration" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-blue-300/50 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all" placeholder="45 นาที" value="30 นาที">
                    </div>
                    
                    <!-- Is New -->
                    <div>
                        <label class="block text-blue-200 text-sm mb-2">สถานะ</label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" id="isNew" class="w-5 h-5 rounded bg-white/5 border-white/20 text-green-500 focus:ring-green-500">
                            <span class="text-white">บทเรียนใหม่ (แสดงป้าย NEW)</span>
                        </label>
                    </div>
                    
                    <!-- Topics with Per-Topic Content -->
                    <div class="md:col-span-2">
                        <label class="block text-blue-200 text-sm mb-2">หัวข้อเนื้อหา (คลิกเพื่อแก้ไขเนื้อหาแต่ละหัวข้อ)</label>
                        <div id="topicsContainer" class="space-y-3 mb-3">
                            <!-- Topics will be added here -->
                        </div>
                        <button type="button" onclick="addTopic()" class="px-4 py-2 bg-blue-500/20 hover:bg-blue-500/40 text-blue-300 rounded-lg transition-all text-sm">
                            <i class="fas fa-plus mr-2"></i>เพิ่มหัวข้อ
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal Footer -->
        <div class="px-6 py-4 bg-white/5 border-t border-white/10 flex justify-end gap-3">
            <button onclick="closeModal()" class="px-6 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg transition-all">
                ยกเลิก
            </button>
            <button onclick="saveLesson()" class="px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white rounded-lg transition-all shadow-lg">
                <i class="fas fa-save mr-2"></i>บันทึก
            </button>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery (required for Summernote) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap (required for Summernote) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Summernote CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>

<style>
/* Dark theme for Summernote */
.note-editor.note-frame {
    border-color: rgba(255,255,255,0.2) !important;
    border-radius: 12px !important;
    overflow: hidden;
}
.note-editor .note-toolbar {
    background: rgba(30, 41, 59, 0.9) !important;
    border-bottom: 1px solid rgba(255,255,255,0.1) !important;
}
.note-editor .note-editing-area {
    background: rgba(30, 41, 59, 0.5) !important;
}
.note-editor .note-editable {
    background: transparent !important;
    color: #e2e8f0 !important;
    font-family: 'Kanit', sans-serif !important;
}
.note-editor .note-statusbar {
    background: rgba(30, 41, 59, 0.9) !important;
    border-top: 1px solid rgba(255,255,255,0.1) !important;
}
.note-btn {
    background-color: rgba(255,255,255,0.1) !important;
    border-color: rgba(255,255,255,0.2) !important;
    color: #e2e8f0 !important;
}
.note-btn:hover {
    background-color: rgba(255,255,255,0.2) !important;
}
.note-current-fontname, .note-recent-color {
    color: #e2e8f0 !important;
}
.dropdown-menu {
    background: #1e293b !important;
    border-color: rgba(255,255,255,0.2) !important;
}
.dropdown-item {
    color: #e2e8f0 !important;
}
.dropdown-item:hover {
    background: rgba(255,255,255,0.1) !important;
}
/* Fix z-index for Summernote dropdowns and modals */
.note-popover {
    z-index: 9999 !important;
}
.note-modal {
    z-index: 10050 !important;
}
.note-modal-backdrop {
    z-index: 10040 !important;
}
.dropdown-menu.show {
    z-index: 9999 !important;
}
.note-editor .dropdown-menu {
    z-index: 9999 !important;
    position: absolute !important;
}
</style>

<script>
// Fix: Prevent modal backdrop from capturing focus/clicks, allowing Summernote dropdowns to work
$(document).on('click', '.note-btn-group .dropdown-toggle, .note-btn-group .dropdown-menu', function(e) {
    e.stopPropagation();
});

// Fix Bootstrap modal focus trap blocking Summernote
$(document).on('focusin', function(e) {
    if ($(e.target).closest('.note-editable, .note-toolbar, .note-modal, .note-popover').length) {
        e.stopImmediatePropagation();
    }
});

// Initialize Summernote when document is ready
$(document).ready(function() {
    $('#content').summernote({
        height: 350,
        placeholder: 'พิมพ์เนื้อหาบทเรียนที่นี่...',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        fontNames: ['Kanit', 'Arial', 'Helvetica', 'Times New Roman', 'Courier New'],
        callbacks: {
            onChange: function(contents) {
                // Auto-save to hidden textarea
                $('#content').val(contents);
            }
        }
    });
});

// Helper functions to get/set Summernote content
function getSummernoteContent() {
    return $('#content').summernote('code');
}

function setSummernoteContent(content) {
    $('#content').summernote('code', content || '');
}

function resetSummernote() {
    $('#content').summernote('reset');
}
</script>

<script>
const API_URL = '<?= SITE_URL ?>/api/lessons.php';

// Modal functions
function openModal(isEdit = false) {
    document.getElementById('lessonModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = isEdit ? 'แก้ไขบทเรียน' : 'เพิ่มบทเรียนใหม่';
    if (!isEdit) {
        resetForm();
    }
}

function closeModal() {
    document.getElementById('lessonModal').classList.add('hidden');
}

function resetForm() {
    document.getElementById('lessonForm').reset();
    document.getElementById('lessonId').value = '';
    document.getElementById('topicsContainer').innerHTML = '';
    document.getElementById('icon').value = '📚';
    document.getElementById('duration').value = '30 นาที';
    // Reset topic counter and add one empty topic
    topicCounter = 0;
    addTopic();
}

// Topics management with per-topic content
let topicCounter = 0;

function addTopic(topicData = null) {
    const container = document.getElementById('topicsContainer');
    const index = topicCounter++;
    const name = topicData?.name || '';
    const content = topicData?.content || '';
    
    const div = document.createElement('div');
    div.className = 'topic-item bg-white/5 border border-white/10 rounded-xl overflow-hidden';
    div.dataset.index = index;
    div.innerHTML = `
        <div class="flex items-center gap-2 p-3">
            <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold topic-number">${container.children.length + 1}</span>
            <input type="text" class="topic-name flex-1 px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white placeholder-blue-300/50 focus:border-blue-500 outline-none text-sm" placeholder="ชื่อหัวข้อ" value="${escapeHtml(name)}">
            <button type="button" onclick="toggleTopicContent(${index})" class="px-3 py-2 bg-purple-500/20 hover:bg-purple-500/40 text-purple-300 rounded-lg transition-all text-sm" title="แก้ไขเนื้อหา">
                <i class="fas fa-edit"></i>
            </button>
            <button type="button" onclick="removeTopic(${index})" class="px-3 py-2 bg-red-500/20 hover:bg-red-500/40 text-red-300 rounded-lg transition-all text-sm">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div id="topicContent_${index}" class="hidden p-3 pt-0">
            <label class="block text-blue-200 text-xs mb-2">เนื้อหาหัวข้อนี้:</label>
            <textarea id="topicEditor_${index}" class="topic-content w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white placeholder-blue-300/50 focus:border-blue-500 outline-none text-sm font-mono min-h-[150px] resize-y" placeholder="<p>พิมพ์เนื้อหา HTML ที่นี่...</p>">${escapeHtml(content)}</textarea>
        </div>
    `;
    container.appendChild(div);
    updateTopicNumbers();
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function toggleTopicContent(index) {
    const contentDiv = document.getElementById(`topicContent_${index}`);
    if (contentDiv) {
        const wasHidden = contentDiv.classList.contains('hidden');
        contentDiv.classList.toggle('hidden');
        
        // Initialize Summernote when first opened
        if (wasHidden) {
            const editorId = `#topicEditor_${index}`;
            if (!$(editorId).hasClass('summernote-initialized')) {
                $(editorId).summernote({
                    height: 250,
                    placeholder: 'พิมพ์เนื้อหาหัวข้อนี้...',
                    dialogsInBody: true,
                    dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview']]
                    ],
                    callbacks: {
                        onChange: function(contents) {
                            $(editorId).val(contents);
                        }
                    }
                });
                $(editorId).addClass('summernote-initialized');
            }
        }
    }
}

function removeTopic(index) {
    const item = document.querySelector(`.topic-item[data-index="${index}"]`);
    if (item) {
        item.remove();
        updateTopicNumbers();
    }
}

function updateTopicNumbers() {
    const items = document.querySelectorAll('.topic-item');
    items.forEach((item, i) => {
        const numberEl = item.querySelector('.topic-number');
        if (numberEl) numberEl.textContent = i + 1;
    });
}

function getTopics() {
    const items = document.querySelectorAll('.topic-item');
    const topics = [];
    items.forEach(item => {
        const nameInput = item.querySelector('.topic-name');
        const contentInput = item.querySelector('.topic-content');
        if (nameInput && nameInput.value.trim()) {
            // Get content from Summernote if initialized, otherwise from textarea
            let content = '';
            if (contentInput) {
                const $editor = $(contentInput);
                if ($editor.hasClass('summernote-initialized')) {
                    content = $editor.summernote('code');
                } else {
                    content = contentInput.value;
                }
            }
            topics.push({
                name: nameInput.value.trim(),
                content: content
            });
        }
    });
    return topics;
}

// CRUD operations
async function saveLesson() {
    const id = document.getElementById('lessonId').value;
    const data = {
        title: document.getElementById('title').value,
        description: document.getElementById('description').value,
        icon: document.getElementById('icon').value || '📚',
        difficulty: document.getElementById('difficulty').value,
        duration: document.getElementById('duration').value || '30 นาที',
        is_new: document.getElementById('isNew').checked,
        topics: getTopics()
    };
    
    if (!data.title) {
        Swal.fire('ข้อผิดพลาด', 'กรุณากรอกชื่อบทเรียน', 'error');
        return;
    }
    
    try {
        const url = id ? `${API_URL}?id=${id}` : API_URL;
        const method = id ? 'PUT' : 'POST';
        
        const response = await fetch(url, {
            method: method,
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: id ? 'แก้ไขบทเรียนเรียบร้อยแล้ว' : 'เพิ่มบทเรียนเรียบร้อยแล้ว',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        } else {
            Swal.fire('ข้อผิดพลาด', result.error, 'error');
        }
    } catch (error) {
        Swal.fire('ข้อผิดพลาด', 'ไม่สามารถบันทึกข้อมูลได้', 'error');
    }
}

async function editLesson(id) {
    try {
        const response = await fetch(`${API_URL}?id=${id}`);
        const result = await response.json();
        
        if (result.success) {
            const lesson = result.data;
            document.getElementById('lessonId').value = lesson.id;
            document.getElementById('title').value = lesson.title;
            document.getElementById('description').value = lesson.description;
            document.getElementById('icon').value = lesson.icon;
            document.getElementById('difficulty').value = lesson.difficulty;
            document.getElementById('duration').value = lesson.duration;
            document.getElementById('isNew').checked = lesson.is_new;
            
            // Load topics with per-topic content
            document.getElementById('topicsContainer').innerHTML = '';
            topicCounter = 0;
            if (lesson.topics && lesson.topics.length > 0) {
                lesson.topics.forEach(topic => {
                    // Handle both old format (string) and new format (object)
                    if (typeof topic === 'string') {
                        addTopic({ name: topic, content: '' });
                    } else {
                        addTopic(topic);
                    }
                });
            } else {
                addTopic();
            }
            
            openModal(true);
        }
    } catch (error) {
        Swal.fire('ข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
    }
}

async function deleteLesson(id, title) {
    const result = await Swal.fire({
        title: 'ยืนยันการลบ?',
        html: `คุณต้องการลบบทเรียน "<strong>${title}</strong>" หรือไม่?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'ลบ',
        cancelButtonText: 'ยกเลิก'
    });
    
    if (result.isConfirmed) {
        try {
            const response = await fetch(`${API_URL}?id=${id}`, {
                method: 'DELETE'
            });
            
            const data = await response.json();
            
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'ลบเรียบร้อย!',
                    text: 'บทเรียนถูกลบแล้ว',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire('ข้อผิดพลาด', data.error, 'error');
            }
        } catch (error) {
            Swal.fire('ข้อผิดพลาด', 'ไม่สามารถลบข้อมูลได้', 'error');
        }
    }
}

// Close modal on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
});
</script>

<?php include VIEWS_PATH . '/layouts/footer.php'; ?>
