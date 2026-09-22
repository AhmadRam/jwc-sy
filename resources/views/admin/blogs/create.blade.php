@extends('admin.layout')

@section('title', 'إضافة مقال جديد')

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    let activeTinyEditor = null;

    tinymce.init({
        selector: '.richtext',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link insertpdf image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        toolbar_mode: 'sliding',
        language: 'ar',
        directionality: 'rtl',
        images_upload_url: '{{ route("admin.blogs.uploadImage") }}',
        automatic_uploads: true,
        file_picker_types: 'file image media',
        images_upload_credentials: true,
        content_style: `
            body { font-family:Tajawal,Helvetica,Arial,sans-serif; font-size:16px; line-height: 1.8; color: #1e293b; }
            p:not([style*="text-align"]), li:not([style*="text-align"]), [style*="text-align: justify"], [style*="text-align:justify"] { text-align: justify; text-justify: inter-word; text-align-last: start; text-wrap: pretty; word-break: normal; overflow-wrap: break-word; }
            h1, h2, h3, h4, h5, h6 { text-align: start; text-wrap: balance; }
            .blog-pdf-card { display: flex; align-items: center; justify-content: space-between; gap: 16px; background: #f8fafc; border: 1px solid #e2e8f0; border-inline-start: 4px solid #ef4444; border-radius: 14px; padding: 14px 18px; margin: 20px 0; font-family: Tajawal, sans-serif; }
            .blog-pdf-card .pdf-info-wrap { display: flex; align-items: center; gap: 14px; min-width: 0; }
            .blog-pdf-card .pdf-badge { width: 44px; height: 44px; border-radius: 10px; background: #ef4444; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 13px; flex-shrink: 0; }
            .blog-pdf-card .pdf-title { font-weight: 700; font-size: 15px; color: #1e293b; margin-bottom: 2px; }
            .blog-pdf-card .pdf-meta { font-size: 12px; color: #64748b; }
            .blog-pdf-card .pdf-download-btn { display: inline-flex; align-items: center; gap: 6px; background: #ef4444; color: #ffffff !important; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 700; text-decoration: none !important; white-space: nowrap; }
            .blog-pdf-embed-wrapper { position: relative; width: 100%; height: 500px; margin: 20px 0; border-radius: 12px; overflow: hidden; border: 1px solid #cbd5e1; }
        `,
        file_picker_callback: function (callback, value, meta) {
            const isImage = meta.filetype === 'image';
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', isImage ? 'image/*' : '.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip');
            
            input.onchange = function () {
                const file = this.files[0];
                if (!file) return;

                const uploadUrl = isImage ? '{{ route("admin.blogs.uploadImage") }}' : '{{ route("admin.blogs.uploadFile") }}';
                const formData = new FormData();
                formData.append('file', file);

                fetch(uploadUrl, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: formData
                })
                .then(res => {
                    if (!res.ok) throw new Error('فشل الرفع (' + res.status + ')');
                    return res.json();
                })
                .then(data => {
                    if (data.location) {
                        if (isImage) {
                            callback(data.location, { alt: file.name });
                        } else {
                            callback(data.location, { text: data.filename || file.name, title: data.filename || file.name });
                        }
                    } else {
                        alert(data.message || data.error || 'فشل رفع الملف');
                    }
                })
                .catch(err => {
                    alert('حدث خطأ أثناء رفع الملف: ' + err.message);
                });
            };
            input.click();
        },
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
            editor.on('focus', function () {
                activeTinyEditor = editor;
            });
            editor.on('init', function () {
                if (!activeTinyEditor) activeTinyEditor = editor;
            });

            // Register custom PDF button
            editor.ui.registry.addIcon('pdf-icon', '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>');

            editor.ui.registry.addButton('insertpdf', {
                icon: 'pdf-icon',
                text: 'PDF',
                tooltip: 'إدراج ملف PDF في المقال',
                onAction: function () {
                    activeTinyEditor = editor;
                    openPdfModal();
                }
            });
        }
    });

    function openPdfModal() {
        // Dismiss any open TinyMCE popovers/floating toolbars
        document.querySelectorAll('.tox-pop').forEach(el => {
            el.style.display = 'none';
        });
        if (activeTinyEditor) {
            try { activeTinyEditor.fire('blur'); } catch (e) {}
        }

        const modalEl = document.getElementById('pdfInsertModal');
        const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
        document.getElementById('pdfModalForm').reset();
        document.getElementById('pdfProgressBar').style.width = '0%';
        document.getElementById('pdfProgressContainer').classList.add('d-none');
        document.getElementById('pdfUploadError').classList.add('d-none');
        document.getElementById('pdfSubmitBtn').disabled = false;
        modalInstance.show();
    }
    
    // Setup token for tinymce image upload
    window.addEventListener('load', function() {
        tinymce.overrideDefaults({
            images_upload_handler: function (blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '{{ route("admin.blogs.uploadImage") }}');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    
                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };
                    
                    xhr.onload = () => {
                        if (xhr.status === 403) {
                            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                            return;
                        }
                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }
                        const json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.location != 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        resolve(json.location);
                    };
                    xhr.onerror = () => {
                        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                    };
                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                });
            }
        });

        // Initialize PDF Modal handlers
        const fileInput = document.getElementById('pdfFileInput');
        const titleInput = document.getElementById('pdfFileTitle');
        if (fileInput && titleInput) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    if (!titleInput.value.trim()) {
                        const rawName = this.files[0].name.replace(/\.[^/.]+$/, "");
                        titleInput.value = rawName;
                    }
                }
            });
        }

        const modalForm = document.getElementById('pdfModalForm');
        if (modalForm) {
            modalForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const fInput = document.getElementById('pdfFileInput');
                if (!fInput.files || !fInput.files[0]) {
                    alert('يرجى اختيار ملف PDF');
                    return;
                }

                const file = fInput.files[0];
                const userTitle = document.getElementById('pdfFileTitle').value.trim() || file.name;
                const displayMode = document.querySelector('input[name="pdfDisplayMode"]:checked').value;

                const progressContainer = document.getElementById('pdfProgressContainer');
                const progressBar = document.getElementById('pdfProgressBar');
                const progressText = document.getElementById('pdfProgressText');
                const errorAlert = document.getElementById('pdfUploadError');
                const submitBtn = document.getElementById('pdfSubmitBtn');

                progressContainer.classList.remove('d-none');
                errorAlert.classList.add('d-none');
                submitBtn.disabled = true;
                progressBar.style.width = '0%';
                progressText.innerText = '0%';

                const formData = new FormData();
                formData.append('file', file);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route("admin.blogs.uploadFile") }}');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                xhr.upload.onprogress = function(e) {
                    if (e.lengthComputable) {
                        const percent = Math.round((e.loaded / e.total) * 100);
                        progressBar.style.width = percent + '%';
                        progressText.innerText = percent + '%';
                    }
                };

                xhr.onload = function() {
                    submitBtn.disabled = false;
                    if (xhr.status >= 200 && xhr.status < 300) {
                        let res;
                        try {
                            res = JSON.parse(xhr.responseText);
                        } catch (err) {
                            errorAlert.innerText = 'خطأ في معالجة استجابة السيرفر';
                            errorAlert.classList.remove('d-none');
                            return;
                        }

                        if (res.location) {
                            let htmlToInsert = '';
                            const fileUrl = res.location;
                            const fileSize = res.size || '';
                            const escapeHtml = (str) => {
                                return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
                            };
                            const safeTitle = escapeHtml(userTitle);

                            if (displayMode === 'card') {
                                htmlToInsert = `
                                    <div class="blog-pdf-card" dir="rtl">
                                        <div class="pdf-info-wrap">
                                            <div class="pdf-badge">PDF</div>
                                            <div>
                                                <div class="pdf-title">${safeTitle}</div>
                                                <div class="pdf-meta">ملف PDF مرفق ${fileSize ? '• ' + fileSize : ''}</div>
                                            </div>
                                        </div>
                                        <a href="${fileUrl}" target="_blank" rel="noopener noreferrer" class="pdf-download-btn">
                                            <svg style="width:16px;height:16px;fill:currentColor;display:inline-block;" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                                            <span>تحميل / قراءة</span>
                                        </a>
                                    </div>
                                `;
                            } else if (displayMode === 'embed') {
                                htmlToInsert = `
                                    <div class="blog-pdf-embed-wrapper">
                                        <iframe src="${fileUrl}#toolbar=1" width="100%" height="600px" style="border:none;"></iframe>
                                    </div>
                                    <div style="text-align: center; margin: 12px 0 16px 0;">
                                        <a href="${fileUrl}" target="_blank" rel="noopener noreferrer" class="pdf-download-btn" style="display:inline-flex;align-items:center;gap:6px;background:#ef4444;color:#fff;padding:8px 18px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:700;">
                                            <svg style="width:16px;height:16px;fill:currentColor;" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                                            <span>فتح أو تحميل ملف (${safeTitle})</span>
                                        </a>
                                    </div>
                                `;
                            } else {
                                htmlToInsert = `
                                    <p><a href="${fileUrl}" target="_blank" rel="noopener noreferrer" style="color:#ef4444;font-weight:700;text-decoration:underline;">
                                        📄 ${safeTitle} ${fileSize ? '(' + fileSize + ')' : ''}
                                    </a></p>
                                `;
                            }

                            let targetEd = activeTinyEditor || tinymce.activeEditor;
                            if (!targetEd) {
                                const textareas = document.querySelectorAll('.richtext');
                                if (textareas.length > 0 && textareas[0].id) {
                                    targetEd = tinymce.get(textareas[0].id);
                                }
                            }

                            if (targetEd) {
                                targetEd.insertContent(htmlToInsert);
                                targetEd.focus();
                            }

                            const modalInstance = bootstrap.Modal.getInstance(document.getElementById('pdfInsertModal'));
                            if (modalInstance) modalInstance.hide();
                        } else {
                            errorAlert.innerText = res.message || res.error || 'فشل في رفع الملف';
                            errorAlert.classList.remove('d-none');
                        }
                    } else {
                        let errorMsg = 'حدث خطأ أثناء الرفع (كود: ' + xhr.status + ')';
                        try {
                            const res = JSON.parse(xhr.responseText);
                            if (res.message) errorMsg = res.message;
                        } catch(e) {}
                        errorAlert.innerText = errorMsg;
                        errorAlert.classList.remove('d-none');
                    }
                };

                xhr.onerror = function() {
                    submitBtn.disabled = false;
                    errorAlert.innerText = 'حدث خطأ في الاتصال بالشبكة أثناء الرفع';
                    errorAlert.classList.remove('d-none');
                };

                xhr.send(formData);
            });
        }
    });
</script>
<style>
    .nav-tabs .nav-link {
        color: #64748b;
        border: none;
        border-bottom: 2px solid transparent;
        font-weight: 600;
        padding: 12px 20px;
    }
    .nav-tabs .nav-link:hover {
        border-color: transparent;
        color: var(--primary);
    }
    .nav-tabs .nav-link.active {
        color: var(--primary);
        background: transparent;
        border-color: var(--primary);
    }
    .nav-tabs { border-bottom: 1px solid #e2e8f0; }

    /* Ensure PDF modal and backdrop are always above TinyMCE toolbars & popovers */
    #pdfInsertModal {
        z-index: 99999 !important;
    }
    .modal-backdrop {
        z-index: 99990 !important;
    }
</style>
@endpush

@section('content')
<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <!-- Main Content Column -->
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header bg-white pt-4 pb-0 border-bottom-0">
                    <h5 class="fw-bold text-dark"><i class="bi bi-pencil-square text-primary me-2"></i> محتوى المقال</h5>
                </div>
                <div class="card-body p-4">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="ar-tab" data-bs-toggle="tab" data-bs-target="#ar" type="button" role="tab"><i class="bi bi-translate me-1"></i> العربية (الافتراضي)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab"><i class="bi bi-globe me-1"></i> الإنكليزية (اختياري)</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="ar" role="tabpanel">
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-muted">عنوان المقال (عربي) <span class="text-danger">*</span></label>
                                <input type="text" name="title_ar" class="form-control form-control-lg @error('title_ar') is-invalid @enderror" value="{{ old('title_ar') }}" placeholder="أدخل عنوان المقال هنا..." required>
                                @error('title_ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">محتوى المقال (عربي) <span class="text-danger">*</span></label>
                                <textarea id="content_ar" name="content_ar" class="form-control richtext @error('content_ar') is-invalid @enderror" rows="15">{{ old('content_ar') }}</textarea>
                                @error('content_ar') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="en" role="tabpanel" dir="ltr">
                            <div class="mb-4 text-start">
                                <label class="form-label fw-semibold text-muted">Title (English)</label>
                                <input type="text" name="title_en" class="form-control form-control-lg @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}" placeholder="Enter blog title here...">
                                @error('title_en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3 text-start">
                                <label class="form-label fw-semibold text-muted">Content (English)</label>
                                <textarea id="content_en" name="content_en" class="form-control richtext @error('content_en') is-invalid @enderror" rows="15">{{ old('content_en') }}</textarea>
                                @error('content_en') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar Column -->
        <div class="col-lg-4">
            <!-- Publish Card -->
            <div class="card mb-4">
                <div class="card-header bg-white pt-4 pb-0 border-bottom-0">
                    <h6 class="fw-bold text-dark"><i class="bi bi-gear-fill text-primary me-2"></i> النشر والإعدادات</h6>
                </div>
                <div class="card-body p-4">
                    <div class="form-check form-switch fs-5 mb-4 p-3 bg-light rounded-3 border">
                        <input class="form-check-input ms-0 me-3" type="checkbox" role="switch" id="is_published" name="is_published" checked style="float: right;">
                        <label class="form-check-label pt-1" for="is_published" style="margin-right: 3rem;">نشر المقال فوراً</label>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted">رابط المقال (Slug) <small class="text-muted">(اختياري)</small></label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="اتركه فارغاً للتوليد التلقائي..." dir="ltr">
                        <div class="form-text small">إذا تركته فارغاً سيتم إنشاء رابط نظيف تلقائياً بناءً على العنوان.</div>
                        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm"><i class="bi bi-cloud-arrow-up me-1"></i> حفظ المقال</button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-light text-muted">إلغاء والعودة</a>
                    </div>
                </div>
            </div>
            
            <!-- Image Card -->
            <div class="card">
                <div class="card-header bg-white pt-4 pb-0 border-bottom-0">
                    <h6 class="fw-bold text-dark"><i class="bi bi-image text-primary me-2"></i> الصورة البارزة</h6>
                </div>
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-cloud-upload text-muted" style="font-size: 3rem;"></i>
                    </div>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    <div class="form-text mt-2">يفضل أن تكون الصورة بصيغة JPG أو PNG وبحجم مناسب.</div>
                    @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal: Insert PDF / Document -->
<div class="modal fade" id="pdfInsertModal" tabindex="-1" aria-labelledby="pdfInsertModalLabel" aria-hidden="true" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow border-0 rounded-4">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold text-dark d-flex align-items-center gap-2" id="pdfInsertModalLabel">
                    <span class="badge bg-danger p-2 rounded-3"><i class="bi bi-file-earmark-pdf-fill fs-5"></i></span>
                    <span>إدراج ملف PDF في المقال</span>
                </h5>
                <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body p-4">
                <form id="pdfModalForm">
                    <!-- File input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">اختر ملف الـ PDF <span class="text-danger">*</span></label>
                        <input type="file" id="pdfFileInput" class="form-control form-control-lg" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip" required>
                        <div class="form-text small">الحد الأقصى للحجم 50 ميغابايت (الصيغ المدعومة: PDF والمستندات).</div>
                    </div>

                    <!-- File Title / Description -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">عنوان أو وصف الملف (اختياري)</label>
                        <input type="text" id="pdfFileTitle" class="form-control" placeholder="مثال: التقرير السنوي 2024">
                        <div class="form-text small">إذا تركته فارغاً سيتم استخدام اسم الملف المرفوع تلقائياً.</div>
                    </div>

                    <!-- Display Format -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">طريقة العرض داخل المقال</label>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2" type="radio" name="pdfDisplayMode" id="modeCard" value="card" checked style="float: right;">
                                <label class="form-check-label fw-bold text-dark" for="modeCard" style="margin-right: 2rem;">
                                    بطاقة تحميل مميزة (موصى بها) 📄
                                    <div class="text-muted fw-normal small mt-1">كارت أنيق يحتوي على أيقونة PDF واسم الملف وحجمه وزر تحميل/قراءة، ويعمل بامتياز على الهواتف والكمبيوتر.</div>
                                </label>
                            </div>
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2" type="radio" name="pdfDisplayMode" id="modeEmbed" value="embed" style="float: right;">
                                <label class="form-check-label fw-bold text-dark" for="modeEmbed" style="margin-right: 2rem;">
                                    عارض مدمج داخل المقال (PDF Viewer) 🖥️
                                    <div class="text-muted fw-normal small mt-1">إطار مدمج يتيح تصفح صفحات الـ PDF مباشرة داخل المقال مع زر للتحميل.</div>
                                </label>
                            </div>
                            <div class="form-check p-3 bg-light rounded-3 border">
                                <input class="form-check-input ms-0 me-2" type="radio" name="pdfDisplayMode" id="modeLink" value="link" style="float: right;">
                                <label class="form-check-label fw-bold text-dark" for="modeLink" style="margin-right: 2rem;">
                                    رابط نصي بسيط 🔗
                                    <div class="text-muted fw-normal small mt-1">رابط مباشر للتحميل مدمج داخل النص.</div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div id="pdfProgressContainer" class="mb-3 d-none">
                        <div class="d-flex justify-content-between text-muted small mb-1">
                            <span>جاري الرفع...</span>
                            <span id="pdfProgressText">0%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div id="pdfProgressBar" class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>

                    <!-- Error Alert -->
                    <div id="pdfUploadError" class="alert alert-danger py-2 small d-none" role="alert"></div>

                    <!-- Action buttons -->
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" id="pdfSubmitBtn" class="btn btn-danger px-4">
                            <i class="bi bi-cloud-arrow-up-fill me-1"></i> رفع وإدراج في المقال
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
