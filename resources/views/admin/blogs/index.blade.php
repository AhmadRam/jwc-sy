@extends('admin.layout')

@section('title', 'إدارة المقالات')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold text-dark">قائمة المقالات</h5>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> مقال جديد
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="8%">الصورة</th>
                        <th width="32%">العنوان (عربي)</th>
                        <th width="20%">الرابط المختصر للمشاركة</th>
                        <th width="10%">الحالة</th>
                        <th width="12%">تاريخ النشر</th>
                        <th width="13%" class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td class="text-muted fw-bold">{{ $blog->id }}</td>
                            <td>
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="image" width="48" height="48" class="rounded-3 shadow-sm" style="object-fit: cover;">
                                @else
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted shadow-sm" style="width: 48px; height: 48px;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-semibold text-dark">
                                <div class="text-truncate" style="max-width: 320px;" title="{{ $blog->title_ar }}">
                                    {{ $blog->title_ar }}
                                </div>
                            </td>
                            <td>
                                @php
                                    $shortUrl = route('blog.short', $blog->id);
                                @endphp
                                <div class="d-flex align-items-center gap-1">
                                    <code class="bg-light px-2 py-1 rounded text-primary small user-select-all" style="direction: ltr; font-size: 0.82rem;">
                                        {{ str_replace(['https://', 'http://'], '', $shortUrl) }}
                                    </code>
                                    <button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2 admin-copy-btn" data-url="{{ $shortUrl }}" title="نسخ الرابط المختصر">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                @if($blog->is_published)
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill"><i class="bi bi-check-circle me-1"></i> منشور</span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill"><i class="bi bi-clock me-1"></i> مسودة</span>
                                @endif
                            </td>
                            <td class="text-muted small">
                                <i class="bi bi-calendar3 me-1"></i> {{ $blog->created_at->format('Y-m-d') }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group shadow-sm" role="group">
                                    <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-sm btn-light text-info border" title="معاينة المقال">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-light text-primary border" title="تعديل">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟ لا يمكن التراجع عن هذه الخطوة.')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-light text-danger border" title="حذف">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                لا توجد مقالات مضافة حتى الآن.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $blogs->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.admin-copy-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                const icon = this.querySelector('i');
                navigator.clipboard.writeText(url).then(function() {
                    icon.classList.remove('bi-clipboard');
                    icon.classList.add('bi-check-lg', 'text-success');
                    setTimeout(function() {
                        icon.classList.remove('bi-check-lg', 'text-success');
                        icon.classList.add('bi-clipboard');
                    }, 2000);
                });
            });
        });
    });
</script>
@endpush
@endsection
