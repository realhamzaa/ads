<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.rtl.min.css') }}">
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
    {{-- @auth
    <a href="{{ url('/dashboard') }}"
        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
        Dashboard
    </a>
    @else
    <a href="{{ route('login') }}"
        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Log in
    </a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}"
        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
        Register
    </a>
    @endif
    @endauth --}}
    <img src="" alt="">
    <h4>نموذج إرسال طلب تسجيل حساب مستخدم</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @method('POST')
        <div class="mb3 text-start">
            <label for="name" class="form-label">الإسم</label>
            <input type="text" class="form-control" name="name" id="name" required autofocus>
        </div>
        <div class="mb3 text-start">
            <label for="username" class="form-label">اسم المستخدم</label>
            <input type="text" class="form-control" name="username" id="username" required autofocus>
        </div>
        <div class="mb3 text-start">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="text" class="form-control" name="email" id="email" required autofocus>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">تأكيد كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        </div>
        <div class="mb-3 text-start">
            <label class="form-check-label" for="agreement">أوافق على شروط وسياسة الإستخدام</label>
            <input type="checkbox" id="agreement" name="agreement" value="" class="form-check-input">

        </div>
        <button type="submit" class="btn btn-danger w-100">إرسال طلب تسجيل</button>
    </form>
</body>

</html>