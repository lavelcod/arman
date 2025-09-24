<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش محصول</title>
     <link rel="icon" type="image/png" href="{{ asset('/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('/etminansaf.jpg') }}">
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
            color: #f3f4f6;
        }
        .container {
            background-color: #1a1a1a;
            border-radius: 20px;
            padding: 32px;
            width: 100%;
            max-width: 600px;
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
            gap: 16px;
        }
        label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #f5f5f5;
            display: block;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            padding: 12px;
            border: 1px solid #333;
            border-radius: 12px;
            background: #111;
            color: #f5f5f5;
            transition: border-color 0.2s, box-shadow 0.2s;
            width: 100%;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185,28,28,0.5);
            outline: none;
        }
        textarea { resize: vertical; }

        img.current-image {
            display: block;
            margin-top: 8px;
            border-radius: 12px;
            max-width: 100%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.4);
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
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✏️ ویرایش محصول</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- نام محصول چندزبانه --}}
            <div>
                <label>نام محصول (فارسی)</label>
                <input type="text" name="name[fa]" value="{{ old('name.fa', $product->name['fa'] ?? '') }}">
            </div>
            <div>
                <label>نام محصول (انگلیسی)</label>
                <input type="text" name="name[en]" value="{{ old('name.en', $product->name['en'] ?? '') }}">
            </div>
            <div>
                <label>نام محصول (عربی)</label>
                <input type="text" name="name[ar]" value="{{ old('name.ar', $product->name['ar'] ?? '') }}">
            </div>

            {{-- دسته‌بندی --}}
            <div>
                <label for="category">دسته‌بندی</label>
                <select id="category" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @if(old('category_id', $product->category_id) == $category->id) selected @endif>
                            {{ $category->name['fa'] ?? $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- قیمت چندواحدی --}}
            <div>
                <label>قیمت (تومان)</label>
               <input type="number" name="price[toman]" value="{{ old('price.toman', $product->price['toman'] ?? '') }}">
            </div>
            <div>
                <label>Price (USD)</label>
                <input type="number" name="price[dollar]" value="{{ old('price.dollar', $product->price['dollar'] ?? '') }}">
            </div>

            {{-- توضیحات چندزبانه --}}
            <div>
                <label>توضیحات (فارسی)</label>
                <textarea name="description[fa]" rows="4">{{ old('description.fa', $product->description['fa'] ?? '') }}</textarea>
            </div>
            <div>
                <label>Description (English)</label>
                <textarea name="description[en]" rows="4">{{ old('description.en', $product->description['en'] ?? '') }}</textarea>
            </div>
            <div>
                <label>الوصف (العربية)</label>
                <textarea name="description[ar]" rows="4">{{ old('description.ar', $product->description['ar'] ?? '') }}</textarea>
            </div>

            {{-- تصویر --}}
            <div>
                <label for="image">تصویر جدید</label>
                <input type="file" name="image" id="image">
            </div>
            <div>
                <small>تصویر فعلی:</small>
                @if($product->images->first())
                    <img src="{{ asset($product->images->first()->image) }}" alt="{{ $product->name['fa'] ?? '' }}" class="current-image">
                @endif
            </div>

            <button type="submit">بروزرسانی محصول</button>
        </form>
    </div>
</body>
</html>
