<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش نمایندگی</title>
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
        form { display: flex; flex-direction: column; gap: 16px; }
        label { margin-bottom: 6px; font-weight: 500; color: #f5f5f5; display: block; }
        input[type="text"], input[type="tel"], input[type="file"], textarea {
            padding: 12px; border: 1px solid #333; border-radius: 12px;
            width: 100%; background: #111; color: #f5f5f5;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        textarea { resize: vertical; min-height: 80px; }
        input:focus, textarea:focus {
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185,28,28,0.5);
            outline: none;
        }
        img.current-image {
            display: block; margin-top: 8px;
            border-radius: 12px; max-width: 100%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.4);
        }
        button {
            padding: 12px; border: none; border-radius: 16px;
            background: linear-gradient(to right, #b91c1c, #dc2626);
            color: white; font-size: 1rem; font-weight: bold;
            cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;
        }
        button:hover { transform: scale(1.05); box-shadow: 0 6px 15px rgba(0,0,0,0.5); }
        @keyframes zoomIn { from { opacity: 0; transform: scale(0.8); } to { opacity: 1; transform: scale(1); } }
        @media (max-width: 600px) { .container { padding: 24px; } }
    </style>
</head>
<body>
    <div class="container">
        <h1>✏️ ویرایش نمایندگی</h1>
        <form action="{{ route('admin.dealers.update', $dealer) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- نام سه‌زبانه -->
            <div>
                <label>نام نمایندگی</label>
                <input type="text" name="name[fa]" value="{{ old('name.fa', $dealer->getTranslatedName('fa')) }}" placeholder="نام (فارسی)">
                <input type="text" name="name[en]" value="{{ old('name.en', $dealer->getTranslatedName('en')) }}" placeholder="Name (English)">
                <input type="text" name="name[ar]" value="{{ old('name.ar', $dealer->getTranslatedName('ar')) }}" placeholder="الاسم (عربي)">
            </div>

            <!-- شهر سه‌زبانه -->
            <div>
                <label>شهر</label>
                <input type="text" name="city[fa]" value="{{ old('city.fa', $dealer->getTranslatedCity('fa')) }}" placeholder="شهر (فارسی)">
                <input type="text" name="city[en]" value="{{ old('city.en', $dealer->getTranslatedCity('en')) }}" placeholder="City (English)">
                <input type="text" name="city[ar]" value="{{ old('city.ar', $dealer->getTranslatedCity('ar')) }}" placeholder="المدينة (عربي)">
            </div>

            <!-- آدرس سه‌زبانه -->
            <div>
                <label>آدرس</label>
                <textarea name="address[fa]" rows="2" placeholder="آدرس (فارسی)">{{ old('address.fa', $dealer->getTranslatedAddress('fa')) }}</textarea>
                <textarea name="address[en]" rows="2" placeholder="Address (English)">{{ old('address.en', $dealer->getTranslatedAddress('en')) }}</textarea>
                <textarea name="address[ar]" rows="2" placeholder="العنوان (عربي)">{{ old('address.ar', $dealer->getTranslatedAddress('ar')) }}</textarea>
            </div>

            <!-- فروشنده -->
            <div>
                <label for="seller_name">نام فروشنده</label>
                <input type="text" id="seller_name" name="seller_name" value="{{ old('seller_name', $dealer->seller_name) }}">
            </div>

            <!-- موبایل -->
            <div>
                <label for="mobile">شماره موبایل</label>
                <input type="tel" id="mobile" name="mobile" value="{{ old('mobile', $dealer->mobile) }}">
            </div>

            <!-- تصویر -->
            <div>
                <label>عکس فعلی فروشگاه</label>
                @if($dealer->image)
                    <img src="{{ asset($dealer->image) }}" alt="عکس فروشگاه" class="current-image">
                @endif
                <input type="file" name="image">
            </div>

            <button type="submit">بروزرسانی نمایندگی</button>
        </form>
    </div>
</body>
</html>
