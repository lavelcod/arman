<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش اسلاید | پنل ادمین</title>
     <link rel="icon" type="image/png" href="{{ asset('/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('/etminansaf.jpg') }}">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            min-height: 100vh;
            display: flex; justify-content: center; align-items: center;
            background: linear-gradient(to right, #000, #111, #b91c1c);
            color: #f3f4f6;
        }
        .container {
            background-color: #1a1a1a;
            border-radius: 20px;
            padding: 32px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.6);
            animation: zoomIn 0.5s ease-in-out;
        }
        h1 {
            text-align: center;
            margin-bottom: 24px;
            color: #f87171;
            font-size: 1.5rem;
        }
        a.back-btn {
            display: inline-block;
            margin-bottom: 16px;
            background: linear-gradient(to right, #b91c1c, #dc2626);
            color: white;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: bold;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        a.back-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.5);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        input[type="text"],
        input[type="file"] {
            padding: 12px;
            border: 1px solid #333;
            border-radius: 12px;
            background: #111;
            color: #f5f5f5;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus {
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185,28,28,0.5);
            outline: none;
        }
        button {
            padding: 12px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(to right, #b91c1c, #dc2626);
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.5);
        }
        .error-box {
            background: #ef4444;
            color: #fff;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 16px;
            font-size: 0.9rem;
        }
        img.current-image {
            display: block;
            margin-top: 8px;
            border-radius: 12px;
            max-width: 100%;
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>✏️ ویرایش اسلاید</h1>
    <a href="{{ route('admin.sliders.index') }}" class="back-btn">⬅️ بازگشت</a>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" placeholder="عنوان (اختیاری)" value="{{ old('title', $slider->title) }}">
        <div>
            <label>تصویر جدید</label>
            <input type="file" name="image">
        </div>
        <div>
            <small>عکس فعلی:</small>
            <img src="{{ asset($slider->image) }}" class="current-image" alt="">
        </div>

        <button type="submit">بروزرسانی اسلاید</button>
    </form>
</div>

</body>
</html>
