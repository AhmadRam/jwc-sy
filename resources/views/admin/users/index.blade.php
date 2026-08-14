@extends('admin.layout')

@section('title', 'إدارة المستخدمين')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold text-dark">قائمة المدراء والمستخدمين</h5>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-person-plus-fill me-1"></i> إضافة مستخدم
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="35%">الاسم</th>
                        <th width="30%">البريد الإلكتروني</th>
                        <th width="15%">تاريخ الإضافة</th>
                        <th width="15%" class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="text-muted fw-bold">{{ $user->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 40px; height: 40px;">
                                        {{ mb_substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="fw-semibold text-dark">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="text-muted"><i class="bi bi-envelope me-1"></i> {{ $user->email }}</td>
                            <td class="text-muted small"><i class="bi bi-calendar3 me-1"></i> {{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                @if(auth()->id() != $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-trash me-1"></i> حذف
                                        </button>
                                    </form>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill border">حسابك الحالي</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">لا يوجد مستخدمين</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
