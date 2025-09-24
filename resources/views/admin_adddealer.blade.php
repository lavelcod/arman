<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>افزودن نمایندگی | پنل ادمین</title>
     <link rel="icon" type="image/png" href="{{ asset('storage/logo/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('storage/logo/etminansaf.jpg') }}">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #000, #111, #b91c1c);
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
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #f5f5f5;
        }
        input[type="text"],
        input[type="file"],
        textarea {
            padding: 12px;
            border: 1px solid #333;
            border-radius: 12px;
            width: 100%;
            background: #111;
            color: #f5f5f5;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, textarea:focus {
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
        .error {
            color: #f87171;
            font-size: 13px;
            margin-top: 4px;
        }
        .success {
            text-align: center;
            background: #065f46;
            color: #d1fae5;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        @media (max-width: 600px) {
            .container { padding: 24px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>➕ افزودن نمایندگی جدید</h1>

        <!-- پیام موفقیت -->
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.dealers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- نام نمایندگی سه‌زبانه -->
            <div>
                <label>نام نمایندگی</label>
                <input type="text" name="name[fa]" placeholder="نام (فارسی)" value="{{ old('name.fa') }}">
                <input type="text" name="name[en]" placeholder="Name (English)" value="{{ old('name.en') }}">
                <input type="text" name="name[ar]" placeholder="الاسم (عربي)" value="{{ old('name.ar') }}">
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- فروشنده -->
            <div>
                <label for="seller_name">نام فروشنده</label>
                <input type="text" id="seller_name" name="seller_name" value="{{ old('seller_name') }}">
                @error('seller_name') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- شهر سه‌زبانه -->
            <div>
                <label>شهر</label>
                <input type="text" name="city[fa]" placeholder="شهر (فارسی)" value="{{ old('city.fa') }}">
                <input type="text" name="city[en]" placeholder="City (English)" value="{{ old('city.en') }}">
                <input type="text" name="city[ar]" placeholder="المدينة (عربي)" value="{{ old('city.ar') }}">
                @error('city') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- آدرس سه‌زبانه -->
            <div>
                <label>آدرس</label>
                <textarea name="address[fa]" rows="2" placeholder="آدرس (فارسی)">{{ old('address.fa') }}</textarea>
                <textarea name="address[en]" rows="2" placeholder="Address (English)">{{ old('address.en') }}</textarea>
                <textarea name="address[ar]" rows="2" placeholder="العنوان (عربي)">{{ old('address.ar') }}</textarea>
                @error('address') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- موبایل -->
            <div>
                <label for="mobile">شماره موبایل</label>
                <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}">
                @error('mobile') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- تصویر -->
            <div>
                <label for="image">عکس فروشگاه</label>
                <input type="file" id="image" name="image">
                @error('image') <p class="error">{{ $message }}</p> @enderror
            </div>

            <button type="submit">ذخیره نمایندگی</button>
        </form>
    </div>
</body>
</html>
