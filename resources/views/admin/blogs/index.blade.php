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
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">الصورة</th>
                        <th width="40%">العنوان (عربي)</th>
                        <th width="15%">الحالة</th>
                        <th width="15%">تاريخ النشر</th>
                        <th width="15%" class="text-center">الإجراءات</th>
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
                            <td class="fw-semibold text-dark">{{ $blog->title_ar }}</td>
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
                            <td colspan="6" class="text-center py-5 text-muted">
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
@endsection
