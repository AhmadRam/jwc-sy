@extends('admin.layout')

@section('title', 'تعديل المقال')

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.richtext',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        language: 'ar',
        directionality: 'rtl',
        images_upload_url: '{{ route("admin.blogs.uploadImage") }}',
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_credentials: true,
        content_style: 'body { font-family:Tajawal,Helvetica,Arial,sans-serif; font-size:16px }',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }
    });
    
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
                        if (xhr.status < 200 || xhr.status >= 300) { reject('HTTP Error: ' + xhr.status); return; }
                        const json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.location != 'string') { reject('Invalid JSON: ' + xhr.responseText); return; }
                        resolve(json.location);
                    };
                    xhr.onerror = () => { reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status); };
                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                });
            }
        });
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
</style>
@endpush

@section('content')
<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <!-- Main Content Column -->
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header bg-white pt-4 pb-0 border-bottom-0">
                    <h5 class="fw-bold text-dark"><i class="bi bi-pencil-square text-primary me-2"></i> تعديل محتوى المقال</h5>
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
                                <label class="form-label fw-semibold text-muted">العنوان (عربي) <span class="text-danger">*</span></label>
                                <input type="text" name="title_ar" class="form-control form-control-lg @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $blog->title_ar) }}" required>
                                @error('title_ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">المحتوى (عربي) <span class="text-danger">*</span></label>
                                <textarea name="content_ar" class="form-control richtext @error('content_ar') is-invalid @enderror" rows="15">{{ old('content_ar', $blog->content_ar) }}</textarea>
                                @error('content_ar') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="en" role="tabpanel" dir="ltr">
                            <div class="mb-4 text-start">
                                <label class="form-label fw-semibold text-muted">Title (English)</label>
                                <input type="text" name="title_en" class="form-control form-control-lg @error('title_en') is-invalid @enderror" value="{{ old('title_en', $blog->title_en) }}">
                                @error('title_en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3 text-start">
                                <label class="form-label fw-semibold text-muted">Content (English)</label>
                                <textarea name="content_en" class="form-control richtext @error('content_en') is-invalid @enderror" rows="15">{{ old('content_en', $blog->content_en) }}</textarea>
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
                        <input class="form-check-input ms-0 me-3" type="checkbox" role="switch" id="is_published" name="is_published" {{ $blog->is_published ? 'checked' : '' }} style="float: right;">
                        <label class="form-check-label pt-1" for="is_published" style="margin-right: 3rem;">تفعيل النشر</label>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted">رابط المقال (Slug)</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $blog->slug) }}" placeholder="أدخل الرابط المخصص..." dir="ltr">
                        <div class="form-text small">يمكنك تعديل الرابط أو كتابة رابط مخصص هنا.</div>
                        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm"><i class="bi bi-cloud-arrow-up me-1"></i> تحديث المقال</button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-light text-muted">إلغاء والعودة</a>
                    </div>
                </div>
            </div>

            <!-- Links & Share Card -->
            <div class="card mb-4">
                <div class="card-header bg-white pt-4 pb-0 border-bottom-0">
                    <h6 class="fw-bold text-dark"><i class="bi bi-share-fill text-primary me-2"></i> روابط المشاركة</h6>
                </div>
                <div class="card-body p-4">
                    @php
                        $shortUrl = route('blog.short', $blog->id);
                        $fullUrl = route('blog.show', $blog->slug);
                    @endphp
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted d-block">الرابط المختصر (للمشاركة السريعة):</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm bg-light" value="{{ $shortUrl }}" id="shortUrlInput" readonly dir="ltr">
                            <button type="button" class="btn btn-sm btn-outline-primary copy-input-btn" data-target="shortUrlInput" title="نسخ">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small fw-bold text-muted d-block">الرابط الكامل:</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm bg-light" value="{{ $fullUrl }}" id="fullUrlInput" readonly dir="ltr">
                            <button type="button" class="btn btn-sm btn-outline-primary copy-input-btn" data-target="fullUrlInput" title="نسخ">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <a href="{{ $fullUrl }}" target="_blank" class="btn btn-sm btn-light border text-primary w-100">
                            <i class="bi bi-box-arrow-up-right me-1"></i> معاينة المقال في الموقع
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Image Card -->
            <div class="card">
                <div class="card-header bg-white pt-4 pb-0 border-bottom-0">
                    <h6 class="fw-bold text-dark"><i class="bi bi-image text-primary me-2"></i> الصورة البارزة</h6>
                </div>
                <div class="card-body p-4 text-center">
                    @if($blog->image)
                        <div class="mb-3 position-relative d-inline-block">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="image" class="img-thumbnail rounded-3 shadow-sm" style="max-height: 200px; object-fit: cover;">
                        </div>
                    @else
                        <div class="mb-3">
                            <i class="bi bi-image text-muted opacity-25" style="font-size: 4rem;"></i>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    <div class="form-text mt-2">قم برفع صورة جديدة لاستبدال الحالية.</div>
                    @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.copy-input-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                if (input) {
                    input.select();
                    navigator.clipboard.writeText(input.value).then(() => {
                        const icon = this.querySelector('i');
                        icon.classList.remove('bi-clipboard');
                        icon.classList.add('bi-check-lg', 'text-success');
                        setTimeout(() => {
                            icon.classList.remove('bi-check-lg', 'text-success');
                            icon.classList.add('bi-clipboard');
                        }, 2000);
                    });
                }
            });
        });
    });
</script>
@endpush
@endsection
