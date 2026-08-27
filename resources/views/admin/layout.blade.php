<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - @yield('title', 'الرئيسية')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-bg: #111827;
            --sidebar-hover: #1f2937;
            --sidebar-active: #3b82f6;
            --sidebar-text: #9ca3af;
            --sidebar-text-active: #ffffff;
            --bg-color: #f3f4f6;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --primary: #3b82f6;
        }
        body { 
            font-family: 'Tajawal', sans-serif; 
            background-color: var(--bg-color); 
            color: #1f2937;
        }
        /* Sidebar Styling */
        .sidebar { 
            min-height: 100vh; 
            background-color: var(--sidebar-bg); 
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        .sidebar .brand { 
            padding: 25px 20px; 
            font-size: 1.5rem; 
            font-weight: 800; 
            color: white;
            border-bottom: 1px solid rgba(255,255,255,0.05); 
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-menu { padding: 0 15px; }
        .sidebar a { 
            color: var(--sidebar-text); 
            text-decoration: none; 
            padding: 12px 20px; 
            display: flex; 
            align-items: center;
            gap: 15px;
            border-radius: 12px; 
            margin-bottom: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar a i { font-size: 1.25rem; transition: transform 0.2s ease;}
        .sidebar a:hover { 
            background-color: var(--sidebar-hover); 
            color: var(--sidebar-text-active); 
        }
        .sidebar a:hover i { transform: scale(1.1); }
        .sidebar a.active { 
            background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%);
            color: white; 
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Top Navbar */
        .navbar-admin { 
            background-color: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05); 
            padding: 15px 25px;
            border-radius: 16px;
            margin-bottom: 25px;
            position: sticky;
            top: 15px;
            z-index: 999;
        }
        .navbar-admin h4 { font-weight: 700; color: #111827; margin: 0; }
        
        .content { padding: 15px 25px 30px; }
        
        /* Card Styling */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            background: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-header {
            background: transparent;
            border-bottom: 1px solid #f3f4f6;
            padding: 20px 25px;
            font-weight: 700;
        }
        .card-body { padding: 25px; }

        /* Tables */
        .table { margin-bottom: 0; }
        .table th {
            border-top: none;
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px;
        }
        .table td {
            vertical-align: middle;
            padding: 15px;
            color: #334155;
            border-bottom-color: #f1f5f9;
        }
        .table tbody tr:hover { background-color: #f8fafc; }

        /* Buttons & Forms */
        .btn { border-radius: 10px; font-weight: 600; padding: 8px 16px; transition: all 0.2s; }
        .btn-primary { background: var(--primary); border: none; }
        .btn-primary:hover { background: #2563eb; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2); }
        .form-control { border-radius: 10px; padding: 10px 15px; border-color: #e2e8f0; }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
        
        /* Badges */
        .badge { padding: 6px 10px; border-radius: 6px; font-weight: 600; }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-auto col-md-3 col-xl-2 px-0 sidebar d-none d-md-block">
                <div class="brand">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 35px; height: 35px; font-size: 1.2rem;">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>
                    <span>JWC Admin</span>
                </div>
                <div class="sidebar-menu mt-3">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i> <span>الرئيسية</span>
                    </a>
                    <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-richtext"></i> <span>المقالات</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i> <span>المستخدمين</span>
                    </a>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col py-2 content">
                <!-- Mobile Toggle -->
                <div class="d-md-none mb-3 bg-white p-3 rounded-3 shadow-sm d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">JWC Admin</h5>
                    <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                </div>

                <!-- Top Navbar -->
                <div class="d-none d-md-flex justify-content-between align-items-center navbar-admin">
                    <h4>@yield('title')</h4>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center bg-light rounded-pill px-3 py-2 me-3 border">
                            <i class="bi bi-person-circle fs-5 me-2 text-primary"></i>
                            <span class="fw-bold">{{ auth()->user()?->name ?? 'مدير النظام' }}</span>
                        </div>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
                                <i class="bi bi-box-arrow-right me-1"></i> خروج
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Alerts -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar Offcanvas -->
    <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header border-bottom border-secondary">
            <h5 class="offcanvas-title fw-bold">JWC Admin</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body sidebar p-0">
            <div class="sidebar-menu mt-3">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i> <span>الرئيسية</span>
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-richtext"></i> <span>المقالات</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> <span>المستخدمين</span>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-4 px-3">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100"><i class="bi bi-box-arrow-right me-1"></i> تسجيل خروج</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
