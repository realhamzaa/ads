<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام توزيع المساعدات</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('') }}">

    <style>
        @font-face {
            font-family: iosfont;
            src: url({{ asset('assets/fonts/ios15semibold.ttf') }});
        }

        body {
            background-color: #f5f5f5;
            font-family: 'iosfont';
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #c00;
        }

        .btn-danger {
            background-color: #c00;
            border: none;
        }
    </style>
</head>

<body class="login-container text-center">
    <img src="" alt="">
    <h4>نظام ادارة بيانات الأشخاص - الهلال الأحمر</h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        @method('POST')
        <div class="mb3 text-start">
            <label for="username" class="form-label">اسم المستخدم</label>
            <input type="text" class="form-control" name="email" id="email" required autofocus>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger w-100">تسجيل الدخول</button>
    </form>
</body>

</html>