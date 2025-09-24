<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>افزودن محصول | پنل ادمین</title>
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
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            padding: 12px;
            border: 1px solid #333;
            border-radius: 12px;
            width: 100%;
            background: #111;
            color: #f5f5f5;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185,28,28,0.5);
            outline: none;
        }
        textarea {
            resize: vertical;
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
        <h1>➕ افزودن محصول جدید</h1>

        <!-- پیام موفقیت -->
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

       <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- 🔹 نام محصول -->
    <div>
        <label for="name_fa">نام محصول (فارسی)</label>
        <input type="text" id="name_fa" name="name[fa]" value="{{ old('name.fa') }}">
        @error('name.fa') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="name_en">نام محصول (English)</label>
        <input type="text" id="name_en" name="name[en]" value="{{ old('name.en') }}">
        @error('name.en') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="name_ar">نام المنتج (العربية)</label>
        <input type="text" id="name_ar" name="name[ar]" value="{{ old('name.ar') }}">
        @error('name.ar') <p class="error">{{ $message }}</p> @enderror
    </div>

    <!-- 🔹 دسته‌بندی -->
    <div>
        <label for="category">دسته‌بندی</label>
        <select id="category" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                    {{ $category->name[app()->getLocale()] ?? $category->name['fa'] }}
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="error">{{ $message }}</p> @enderror
    </div>

    <!-- 🔹 قیمت -->
    <div>
        <label for="price_toman">قیمت (تومان)</label>
        <input type="number" id="price_toman" name="price[toman]" value="{{ old('price.toman') }}">
        @error('price.toman') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="price_dollar">قیمت ($)</label>
        <input type="number" id="price_dollar" name="price[dollar]" value="{{ old('price.dollar') }}">
        @error('price.dollar') <p class="error">{{ $message }}</p> @enderror
    </div>

    <!-- 🔹 توضیحات -->
    <div>
        <label for="description_fa">توضیحات (فارسی)</label>
        <textarea id="description_fa" name="description[fa]" rows="4">{{ old('description.fa') }}</textarea>
        @error('description.fa') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description_en">Description (English)</label>
        <textarea id="description_en" name="description[en]" rows="4">{{ old('description.en') }}</textarea>
        @error('description.en') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description_ar">الوصف (العربية)</label>
        <textarea id="description_ar" name="description[ar]" rows="4">{{ old('description.ar') }}</textarea>
        @error('description.ar') <p class="error">{{ $message }}</p> @enderror
    </div>

    <!-- 🔹 تصاویر -->
    <div>
        <label>تصاویر محصول</label>
        <input type="file" name="images[]" multiple>
        @error('images') <p class="error">{{ $message }}</p> @enderror
    </div>

    <button type="submit">ذخیره محصول</button>
</form>

    </div>
</body>
</html>
