<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.rtl.min.css') }}">
    <style>
        @font-face {
            font-family: iosfont;
            src: url({{ asset('assets/fonts/ios15semibold.ttf') }});
        }

        body {
            background-color: #f8f9fa;
            font-family: 'iosfont';
        }

        .card {
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-icon {
            font-size: 40px;
            color: #c00;
        }

        .card-title a {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card-title a:hover {
            color: #b30000;
        }

        /* زر تسجيل الخروج */
        .logout-btn {
            position: absolute;
            top: 20px;
            left: 20px; /* لأن RTL، اليسار سيكون يمين الصفحة عند العرض */
        }
    </style>
</head>

<body>
    <!-- زر تسجيل خروج -->
    <div class="row">
        <h4 class="text-start mb-5">مرحباً {{ Auth::user()->name }}</h4>
        
        <div class="logout-btn">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
        </form>
        
    </div></div>
    

    <div class="container py-5">
        <h2 class="text-center mb-5 text-danger">نظام إدارة بيانات الأشخاص - الهلال الأحمر</h2>
        <div class="row g-4">
            <div class="col-md-4 card text-center shadow-sm">
                <div class="card-body">
                    <div class="card-icon mb-3">🔧</div>
                </div>
                <h5 class="card-title"><a href="{{ route('settingsPage') }}">الإعدادات</a></h5>
                <p class="card-text">
                    رفع ملف , إدخال مخزون , تصدير بيانات
                </p>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm p-4">
                    <div class="card-icon mb-3">📊</div>
                    <h5 class="card-title"><a href="">عرض البيانات</a></h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm p-4">
                    <div class="card-icon mb-3">🔑</div>
                    <h5 class="card-title"><a href="{{ route('search') }}">الاستعلام</a></h5>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
