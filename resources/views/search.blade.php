<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الإستعلام</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.rtl.css') }}">
    <style>
           @font-face {
            font-family: iosfont;
            src: url({{ asset('assets/fonts/ios15semibold.ttf') }});
        }
        body {
            font-family: 'iosfont';
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="mb-4 text-center">الإستعلام عن الأشخاص</h3>
        <form id="searchForm" action="">
            <div class="mb-3">
                <label for="searchForm" class="form-label">نوع البحث</label>
                <select class="form-select" name="searchType" id="searchType" required>
                    <option value="serial">الرقم التسلسلي</option>
                    <option value="id">رقم الهوية</option>
                    <option value="name">الإسم</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="searchInput" class="form-label">أدخل قيمة البحث</label>
                <input type="text" class="form-control" id="searchInput" placeholder="اكتب هنا ..." required/>

            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary" type="submit">بحث</button>
               <button class="btn btn-secoundary" type="button" onclick="history.back()">رجوع</button>
             </div>
        </form>
    </div>

</body>

</html>