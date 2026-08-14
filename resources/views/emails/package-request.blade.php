<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب باقة تواصل</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            padding: 20px;
            direction: rtl;
        }

        .container {
            max-width: 640px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #0d6efd;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 16px;
        }

        .info p {
            margin: 6px 0;
        }

        .info strong {
            display: inline-block;
            min-width: 140px;
            color: #555;
        }

        .services {
            margin-top: 16px;
            background-color: #fff;
            padding: 12px 16px;
            border-radius: 6px;
            border-left: 4px solid #0d6efd;
        }

        .services ul {
            margin: 10px 0 0;
            padding: 0 20px 0 0;
        }

        .message {
            margin-top: 16px;
            background-color: #fff;
            padding: 12px 16px;
            border-radius: 6px;
            border-left: 4px solid #198754;
        }

        .footer {
            margin-top: 24px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>طلب باقة تواصل</h1>

        <div class="info">
            <p><strong>الاسم:</strong> {{ $data['name'] }}</p>
            <p><strong>رقم الجوال:</strong> {{ $data['phone'] }}</p>
            <p><strong>?????:</strong> {{ $data['entity'] ?? '' }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $data['email'] }}</p>
            <p><strong>الباقة المطلوبة:</strong> {{ $data['package_name'] }}</p>
            @if (!empty($data['package_category']))
                <p><strong>التصنيف:</strong> {{ $data['package_category'] }}</p>
            @endif
        </div>

        @php
            $services = array_filter(preg_split('/\\r?\\n/', $data['selected_services'] ?? ''));
        @endphp

        @if (!empty($services))
            <div class="services">
                <strong>الخدمات المختارة:</strong>
                <ul>
                    @foreach ($services as $service)
                        <li>{{ $service }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="message">
            <strong>الرسالة:</strong>
            <p>{{ $data['message'] }}</p>
        </div>

        <div class="footer">
            <p>تم إرسال هذا الطلب عبر موقع JWC.</p>
        </div>
    </div>
</body>

</html>
