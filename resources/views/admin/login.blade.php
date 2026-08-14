<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - لوحة التحكم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-container { max-width: 420px; width: 100%; margin: 0 auto; padding: 20px;}
        .card { 
            border: none; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1), 0 5px 15px rgba(0,0,0,0.05); 
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            overflow: hidden;
        }
        .card-body { padding: 3rem 2.5rem; }
        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e1e5eb;
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background-color: #fff;
            border-color: #4a90e2;
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
        }
        .btn-primary {
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            background: linear-gradient(135deg, #4a90e2 0%, #007aff 100%);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,122,255,0.3);
            background: linear-gradient(135deg, #007aff 0%, #006ce4 100%);
        }
        .brand-text {
            font-weight: 800;
            color: #1a1f36;
            letter-spacing: -0.5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-5">
                    <img src="{{ vasset('assets/img/logo-black.png') }}" alt="Logo" height="60" class="mb-3" onerror="this.src='https://placehold.co/150x60?text=JWC+Logo'">
                    <h3 class="brand-text">لوحة تحكم JWC</h3>
                    <p class="text-muted small">قم بتسجيل الدخول للوصول إلى لوحة الإدارة</p>
                </div>
                
                @if($errors->any())
                    <div class="alert alert-danger border-0 rounded-3 mb-4">
                        <ul class="mb-0 ps-3 small">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" placeholder="admin@jwc.sa" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="mb-5">
                        <label class="form-label fw-bold small text-muted">كلمة المرور</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 shadow-sm">تسجيل الدخول</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
