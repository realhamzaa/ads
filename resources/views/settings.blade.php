<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الإعدادات</title>
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

        .container h2 {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <!-- سطر العنوان + زر الرجوع -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('dashboard') }}" class="btn btn-danger">← رجوع</a>
            <h2 class="text-danger mb-0">صفحة الإعدادات - نظام إدارة بيانات الأشخاص</h2>
        </div>

        <div class="row g-4">
            <!-- إدارة الموظفين -->
            <div class="col-md-6">
                <div class="card text-center shadow-sm p-4">
                    <div class="card-icon mb-3">👥</div>
                    <h5 class="card-title">إدارة الموظفين</h5>
                    <a href="{{ route('employees.index') }}" class="btn btn-danger w-100">عرض / إضافة / تعديل</a>
                </div>
            </div>

            <!-- تصدير البيانات -->
            <div class="col-md-6">
                <div class="card text-center shadow-sm p-4">
                    <div class="card-icon mb-3">📥</div>
                    <h5 class="card-title">تصدير البيانات</h5>
                    <form action="{{ route('export.people') }}" method="GET">
                        <button type="submit" class="btn btn-danger w-100">تصدير</button>
                    </form>
                </div>
            </div>

            <!-- إدارة المخزون -->
            <div class="col-md-6">
                <div class="card text-center shadow-sm p-4">
                    <div class="card-icon mb-3">📦</div>
                    <h5 class="card-title">إدارة المخزون</h5>
                    <form action="{{ route('update.stock') }}" method="POST">
                        @csrf
                        <input type="text" name="item" placeholder="اسم المادة" class="form-control mb-2">
                        <input type="number" name="quantity" placeholder="الكمية" class="form-control mb-2">
                        <button type="submit" class="btn btn-danger w-100">تحديث المخزون</button>
                    </form>
                </div>
            </div>

            <!-- رفع قاعدة البيانات -->
            <div class="col-md-6">
                <div class="card text-center shadow-sm p-4">
                    <div class="card-icon mb-3">📤</div>
                    <h5 class="card-title">رفع قاعدة بيانات الأشخاص</h5>
                    <form action="{{ route('upload.people') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control mb-2" accept=".csv,.xlsx">
                        <button type="submit" class="btn btn-danger w-100">رفع الملف</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
