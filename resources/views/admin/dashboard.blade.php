@extends('admin.layout')

@section('title', 'الرئيسية')

@section('content')
<div class="row g-4 mb-4">
    <!-- Blogs Stat Card -->
    <div class="col-md-6 col-lg-4">
        <div class="card bg-white border-0 shadow-sm h-100 overflow-hidden stat-card">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-muted fw-bold mb-0">إجمالي المقالات</h6>
                    <div class="icon-shape bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-journal-text fs-4"></i>
                    </div>
                </div>
                <h2 class="display-5 fw-bold mb-0 text-dark">{{ $blogsCount }}</h2>
                
                <div class="mt-4">
                    <a href="{{ route('admin.blogs.index') }}" class="text-primary fw-semibold text-decoration-none d-flex align-items-center">
                        <span>إدارة المقالات</span>
                        <i class="bi bi-arrow-left-short fs-5 ms-1"></i>
                    </a>
                </div>
            </div>
            <!-- Decorative gradient line -->
            <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, var(--primary), #60a5fa);"></div>
        </div>
    </div>
    
    <!-- Users Stat Card -->
    <div class="col-md-6 col-lg-4">
        <div class="card bg-white border-0 shadow-sm h-100 overflow-hidden stat-card">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-muted fw-bold mb-0">إجمالي المستخدمين</h6>
                    <div class="icon-shape bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                </div>
                <h2 class="display-5 fw-bold mb-0 text-dark">{{ $usersCount }}</h2>
                
                <div class="mt-4">
                    <a href="{{ route('admin.users.index') }}" class="text-success fw-semibold text-decoration-none d-flex align-items-center">
                        <span>إدارة المستخدمين</span>
                        <i class="bi bi-arrow-left-short fs-5 ms-1"></i>
                    </a>
                </div>
            </div>
            <!-- Decorative gradient line -->
            <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #10b981, #34d399);"></div>
        </div>
    </div>
</div>

<style>
    .stat-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection
