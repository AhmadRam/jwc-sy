@extends('admin.layout')

@section('title', 'إضافة مستخدم جديد')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-person-badge text-primary me-2"></i> بيانات المستخدم الجديد</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted">الاسم الكامل <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                            <input type="text" name="name" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="مثال: أحمد محمد" required>
                        </div>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted">البريد الإلكتروني <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                            <input type="email" name="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@example.com" required>
                        </div>
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-5">
                        <label class="form-label fw-semibold text-muted">كلمة المرور <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-key text-muted"></i></span>
                            <input type="password" name="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        </div>
                        <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i> يفضل استخدام كلمة مرور قوية تحتوي على أحرف وأرقام.</div>
                        @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2 border-top pt-4">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light px-4">إلغاء</a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-check2-circle me-1"></i> حفظ المستخدم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
