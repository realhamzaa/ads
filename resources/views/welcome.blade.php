<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>نظام تسهيل توزيع المساعدات</title>

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

    <img src="" alt="">
    <h4>نظام تسهيل توزيع المساعدات </h4>
    <div class="card">
          @auth
        <div class="mb3 card-body">
            <a href="{{ url('/dashboard') }}" class="text-center">
                Dashboard
            </a>
        </div>
    @else
        <div class="mb3 text-start">
            <a href="{{ route('login') }}">
                Log in
            </a>
        </div>

        {{-- @if (Route::has('register'))
            <div class="mb3">
                <a href="{{ route('register') }}">
                    Register
                </a></div>
        @endif --}}
    @endauth

    </div>
  
    
</body>

</html>