<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسالة جديدة من موقع JWC</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            padding: 20px;
            direction: rtl;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0d6efd;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info strong {
            display: inline-block;
            width: 100px;
            color: #555;
        }
        .message {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #0d6efd;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>رسالة جديدة من موقع JWC</h1>

        <div class="info">
            <p><strong>الاسم:</strong> {{ $data['name'] }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $data['email'] }}</p>
            <p><strong>الموضوع:</strong> {{ $data['subject'] }}</p>
        </div>

        <div class="message">
            <p>{{ $data['message'] }}</p>
        </div>

        <div class="footer">
            <p>تم إرسال هذه الرسالة من نموذج الاتصال في موقع شركة الكلمات المترابطة للعلاقات العامة والاتصال</p>
        </div>
    </div>
</body>
</html>
