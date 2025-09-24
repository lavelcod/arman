<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش دسته‌بندی</title>
     <link rel="icon" type="image/png" href="{{ asset('storage/logo/etminansaf.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('storage/logo/etminansaf.jpg') }}">
    <style>
         * {
        box-sizing: border-box;
    }
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #000, #111, #b91c1c);
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container {
        background-color: #1a1a1a;
        border-radius: 20px;
        padding: 32px;
        width: 100%;
        max-width: 450px;
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
    input[type="text"] {
        padding: 12px;
        border: 1px solid #333;
        border-radius: 12px;
        width: 100%;
        background: #111;
        color: #f5f5f5;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    input[type="text"]:focus {
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

    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.8); }
        to { opacity: 1; transform: scale(1); }
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>ویرایش دسته‌بندی</h1>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name_fa">نام دسته (فارسی)</label>
                <input type="text" id="name_fa" name="name[fa]"
                       value="{{ $category->name['fa'] ?? '' }}">
            </div>

            <div>
                <label for="name_en">نام دسته (English)</label>
                <input type="text" id="name_en" name="name[en]"
                       value="{{ $category->name['en'] ?? '' }}">
            </div>

            <div>
                <label for="nameـar">نام دسته (العربية)</label>
                <input type="text" id="name_ar" name="name[ar]"
                       value="{{ $category->name['ar'] ?? '' }}">
            </div>

            <button type="submit">بروزرسانی دسته</button>
        </form>
    </div>
</body>
</html>
